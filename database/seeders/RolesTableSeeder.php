<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'created_at' => '2021-12-01 15:03:53',
                'display_name' => 'Super Admin',
                'guard_name' => 'web',
                'id' => 16,
                'name' => 'Super Admin',
                'team_id' => NULL,
                'updated_at' => '2021-12-01 15:03:53',
            ),
        ));
        
        
    }
}