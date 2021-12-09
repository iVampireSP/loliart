<?php

namespace Database\Seeders;

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
        

        \DB::table('language_black_lists')->delete();
        
        \DB::table('language_black_lists')->insert(array (
            0 => 
            array (
                'created_at' => '2021-12-02 13:17:19',
                'id' => 1,
                'language' => 'zh-cn',
                'updated_at' => '2021-12-02 13:17:19',
            ),
            1 => 
            array (
                'created_at' => '2021-12-02 13:17:20',
                'id' => 2,
                'language' => 'zh-hans',
                'updated_at' => '2021-12-02 13:17:20',
            ),
        ));
        
        
    }
}