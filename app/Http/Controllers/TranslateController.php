<?php

namespace App\Http\Controllers;

use App\Models\LanguageBlackList;
use App\Models\LanguageTranslate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class TranslateController extends Controller
{
    public static function translate($str)
    {
        $languages = session()->get('locate');

        if (strpos($languages[0], 'en') !== false) {
            return $str;
        }

        $salt = rand(1, 100);

        $language_blacklist = new LanguageBlackList();
        $language_translates = new LanguageTranslate();

        $black_list = Cache::has('language_blacklist') ?? $language_blacklist->get();
        if (Cache::has('language_blacklist')) {
            $black_list = Cache::get('language_blacklist');
        } else {
            $black_list = $language_blacklist->get();
            $temp_arr = [];
            foreach ($black_list as $block) {
                array_push($temp_arr, $block->language);
            }
            $black_list = $temp_arr;
            unset($temp_arr);
            Cache::put('language_blacklist', $black_list, 600);
        }

        foreach ($languages as $lang) {
            if (in_array($lang, $black_list)) {
                continue;
            }

            // Search cache
            $cache_key = 'language_' . $lang . '_' . md5($str);
            if (Cache::has($cache_key)) {
                return Cache::get($cache_key);
            } else {
                // Search str from language list
                $output = $language_translates->where('sign', $cache_key)->first();
                if (!is_null($output)) {
                    Cache::add($cache_key, $output->output, 600);
                    return $output->output;
                }
            }

            $app_id = config('baiduTranslate.app_id');
            $sign = $app_id . $str . $salt . config('baiduTranslate.app_key');
            $sign = md5($sign);

            $arr = [
                'q' => $str,
                'from' => 'auto',
                'to' => $lang,
                'appid' => $app_id,
                'salt' => $salt,
                'sign' => $sign
            ];

            $res = Http::asForm()->post('https://fanyi-api.baidu.com/api/trans/vip/translate', $arr)->json();

            if (isset($res['error_code'])) {
                if ($res['error_code'] == '58001') {
                    // 加入语言黑名单（不支持翻译的语言）
                    array_push($black_list, $lang);
                    Cache::forever('language_blacklist', $black_list);
                    $language_blacklist->language = $lang;
                    $language_blacklist->save();
                    continue;
                } else {
                    return $str;
                }
            } else {
                $dst = $res['trans_result'][0]['dst'];

                // Save the language translation
                $language_translates->language = $lang;
                $language_translates->string = $str;
                $language_translates->output = $dst;
                $language_translates->sign = $cache_key;
                $language_translates->save();

                return $dst;
            }
        }
    }
}