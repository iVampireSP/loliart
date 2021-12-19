<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class LanguageBlackListsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('language_black_lists')->delete();

        DB::table('language_black_lists')->insert(array (
            0 =>
            array (
                'id' => 1,
                'language' => 'zh-cn',
                'created_at' => '2021-12-02 13:17:19',
                'updated_at' => '2021-12-02 13:17:19',
            ),
            1 =>
            array (
                'id' => 2,
                'language' => 'zh-hans',
                'created_at' => '2021-12-02 13:17:20',
                'updated_at' => '2021-12-02 13:17:20',
            ),
        ));


    }
}
