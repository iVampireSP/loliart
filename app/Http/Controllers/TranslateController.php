<?php

namespace App\Http\Controllers;

use App\Models\LanguageBlackList;
use App\Models\LanguageTranslate;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class TranslateController extends Controller
{
    public $locate;
    public $black_list;
    protected $language_translates;
    protected $language_blacklist;
    public $cache_key;
    public $cache_data;

    public function __construct()
    {
        $this->prepare();
    }

    public function prepare()
    {
        $prepare = session('lang_prepared');
        
        // dd($prepare);
        if ($prepare) {
            $this->locate = $prepare[0];
            $this->black_list = $prepare[1];
            $this->language_translates = $prepare[2];
            $this->language_blacklist = $prepare[3];
            $this->cache_key = $prepare[4];
            $this->cache_data = $prepare[5];

            return true;
        }
        // dd(1);
        $language_blacklist = new LanguageBlackList();
        $this->language_translates = new LanguageTranslate();
        $this->language_blacklist = $language_blacklist;

        if (is_null($this->locate)) {
            $this->locate = $languages = session()->get('locate');
        } else {
            $languages = $this->locate;
        }

        if (strpos($languages[0], 'en') !== false) {
            $this->locate = 0;
        } else {
            if (is_null($this->black_list)) {
                $this->black_list = Cache::has('language_blacklist') ?? $language_blacklist->get();
                if (Cache::has('language_blacklist')) {
                    $this->black_list = Cache::get('language_blacklist');
                } else {
                    $this->black_list = $language_blacklist->get();
                    $temp_arr = [];
                    foreach ($this->black_list as $block) {
                        array_push($temp_arr, $block->language);
                    }
                    $this->black_list = $temp_arr;
                    unset($temp_arr);
                    Cache::put('language_blacklist', $this->black_list, 1800);
                }
            }

            foreach ($languages as $lang) {
                if (in_array($lang, $this->black_list)) {
                    continue;
                }

                $this->cache_key = 'language_' . $lang;
                $this->cache_data = Cache::get($this->cache_key, false);
                if (!$this->cache_data) {
                    $langs = LanguageTranslate::where('language', $lang)->get()->toArray();
                    $arr = [];
                    foreach ($langs as $lang) {
                        $arr[$lang['sign']] = $lang['output'];
                    }

                    Cache::put($this->cache_key, $arr, 1800);

                }

                break;
            }
        }

        $this->freshSession();

        return 1;
    }

    protected function freshSession()
    {
        session()->put('lang_prepared', [$this->locate, $this->black_list, $this->language_translates, $this->language_blacklist, $this->cache_key, $this->cache_data]);
        return 1;
    }

    public function translate($str)
    {
        if (is_null($str) || empty($str)) {
            return $str;
        }

        $languages = $this->locate;

        if (!$this->locate) {
            return $str;
        }

        $language_translates = $this->language_translates;
        $language_blacklist = $this->language_blacklist;

        $salt = rand(1, 100);

        foreach ($languages as $lang) {
            if (in_array($lang, $this->black_list)) {
                continue;
            }

            // Search cache
            if (is_null($this->cache_key) && is_null($this->cache_data)) {
                $this->cache_key = 'language_' . $lang;
                $this->cache_data = Cache::get($this->cache_key, []);
            }

            $cache_key = $this->cache_key;
            $cache_data = $this->cache_data;

            $str_md5 = $cache_key . '_' . md5($str);
            if (isset($cache_data[$str_md5])) {
                return $cache_data[$str_md5];
            } else {
                // Search str from language list
                $output = $language_translates->where('sign', $str_md5)->first();
                if (!is_null($output)) {
                    $cache_data[$str_md5] = $output->output;
                    $this->cache_data = $cache_data;
                    $this->freshSession();

                    Cache::put($cache_key, $cache_data, 1800);
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
                'sign' => $sign,
            ];

            $res = Http::asForm()->post('https://fanyi-api.baidu.com/api/trans/vip/translate', $arr)->json();

            if (isset($res['error_code'])) {
                if ($res['error_code'] == '54000') {
                    // 加入语言黑名单（不支持翻译的语言）
                    array_push($this->black_list, $lang);
                    Cache::forever('language_blacklist', $this->black_list);
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
                $language_translates->sign = $str_md5;
                $language_translates->save();

                session()->put('lang_prepared', 0);

                return $dst;
            }
        }

        return $str;
    }
}
