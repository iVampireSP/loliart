<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'created_at' => '2021-12-01 03:03:38',
                'display_name' => 'User from invitation',
                'guard_name' => 'web',
                'id' => 1,
                'name' => 'team.invitations.access',
                'updated_at' => '2021-12-01 03:03:38',
            ),
            1 => 
            array (
                'created_at' => '2021-12-01 23:50:22',
                'display_name' => 'Edit team settings',
                'guard_name' => 'web',
                'id' => 3,
                'name' => 'team.edit',
                'updated_at' => '2021-12-01 23:50:22',
            ),
            2 => 
            array (
                'created_at' => '2021-12-02 02:46:45',
                'display_name' => 'Show role permissions',
                'guard_name' => 'web',
                'id' => 4,
                'name' => 'role.show',
                'updated_at' => '2021-12-02 02:46:45',
            ),
            3 => 
            array (
                'created_at' => '2021-12-02 02:47:27',
                'display_name' => 'Edit role',
                'guard_name' => 'web',
                'id' => 5,
                'name' => 'role.edit',
                'updated_at' => '2021-12-02 02:47:27',
            ),
        ));
        
        
    }
}