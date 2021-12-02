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
        
        
        
    }
}