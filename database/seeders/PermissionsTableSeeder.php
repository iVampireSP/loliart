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
                'id' => 8,
                'name' => 'wings.accounts.edit',
                'display_name' => 'Wings Accounts edit',
                'guard_name' => 'web',
                'created_at' => '2021-12-09 02:39:29',
                'updated_at' => '2021-12-09 02:39:29',
            ),
            6 => 
            array (
                'id' => 11,
                'name' => 'wings.locations.edit',
                'display_name' => 'Wings Locations edit',
                'guard_name' => 'web',
                'created_at' => '2021-12-11 19:09:19',
                'updated_at' => '2021-12-11 19:09:19',
            ),
            7 => 
            array (
                'id' => 12,
                'name' => 'wings.nodes.edit',
                'display_name' => 'Wings Nodes edit',
                'guard_name' => 'web',
                'created_at' => '2021-12-11 19:09:24',
                'updated_at' => '2021-12-11 19:09:24',
            ),
            8 => 
            array (
                'id' => 13,
                'name' => 'wings.servers.edit',
                'display_name' => 'Wings Servers Edit',
                'guard_name' => 'web',
                'created_at' => '2021-12-11 19:09:29',
                'updated_at' => '2021-12-11 19:09:29',
            ),
            9 => 
            array (
                'id' => 14,
                'name' => 'wings.nodes.show',
                'display_name' => 'Wings Nodes show config',
                'guard_name' => 'web',
                'created_at' => '2021-12-11 19:11:20',
                'updated_at' => '2021-12-11 19:11:20',
            ),
            10 => 
            array (
                'id' => 15,
                'name' => 'admin',
                'display_name' => NULL,
                'guard_name' => 'web',
                'created_at' => '2021-12-11 19:31:30',
                'updated_at' => '2021-12-11 19:31:30',
            ),
        ));
        
        
    }
}