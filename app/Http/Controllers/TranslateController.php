<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class TranslateController extends Controller
{
    public static function translate($str)
    {
        $languages = session()->get('locate');
        $salt = rand(1, 100);

        $black_list = Cache::get('language_blacklist', []);

        foreach ($languages as $lang) {
            if (in_array($lang, $black_list)) {
                continue;
            }

            $cache_key = 'language_' . $lang . '_' . $str;

            if (Cache::has($cache_key)) {
                return Cache::get($cache_key);
            }

            $app_id = config('baiduTranslate.app_id');
            $sign = $app_id . $str . $salt . config('baiduTranslate.app_key');
            $sign = md5($sign);
            $res = Http::asForm()->post('https://fanyi-api.baidu.com/api/trans/vip/translate', [
                'q' => urlencode($str),
                'from' => 'auto',
                'to' => $lang,
                'appid' => $app_id,
                'salt' => $salt,
                'sign' => $sign
            ])->json();


            if (isset($res['error_code'])) {
                if ($res['error_code'] == '58001') {
                    // 加入语言黑名单（不支持翻译的语言）
                    array_push($black_list, $lang);
                    Cache::forever('language_blacklist', $black_list);
                    continue;
                } elseif ($res['error_code'] != '52000') {
                    break;
                    return $str;
                }
            } else {
                $dst = $res['trans_result'][0]['dst'];
                Cache::forever($cache_key, $dst);
                return $dst;
            }
        }
    }
}