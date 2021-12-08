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
                'id' => 1,
                'name' => 'team.invitations.access',
                'display_name' => 'User from invitation',
                'guard_name' => 'web',
                'created_at' => '2021-12-01 03:03:38',
                'updated_at' => '2021-12-01 03:03:38',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'team.edit',
                'display_name' => 'Edit team settings',
                'guard_name' => 'web',
                'created_at' => '2021-12-01 23:50:22',
                'updated_at' => '2021-12-01 23:50:22',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'role.show',
                'display_name' => 'Show role permissions',
                'guard_name' => 'web',
                'created_at' => '2021-12-02 02:46:45',
                'updated_at' => '2021-12-02 02:46:45',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'role.edit',
                'display_name' => 'Edit role',
                'guard_name' => 'web',
                'created_at' => '2021-12-02 02:47:27',
                'updated_at' => '2021-12-02 02:47:27',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'team.access',
                'display_name' => 'Access team',
                'guard_name' => 'web',
                'created_at' => '2021-12-07 14:37:13',
                'updated_at' => '2021-12-07 14:37:13',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'node.edit',
                'display_name' => 'Edit node data',
                'guard_name' => 'web',
                'created_at' => '2021-12-07 14:38:29',
                'updated_at' => '2021-12-07 14:38:29',
            ),
        ));
        
        
    }
}