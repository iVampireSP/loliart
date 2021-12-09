<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LanguageTranslatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('language_translates')->delete();
        
        \DB::table('language_translates')->insert(array (
            0 => 
            array (
                'created_at' => '2021-11-30 06:43:46',
                'id' => 1,
                'language' => 'zh',
                'output' => '设置您的密码',
                'sign' => 'language_zh_639e821263d734872445272b566a118c',
                'string' => 'Set up your password',
                'updated_at' => '2021-11-30 06:43:46',
            ),
            1 => 
            array (
                'created_at' => '2021-11-30 06:43:48',
                'id' => 2,
                'language' => 'zh',
                'output' => '你的新密码。',
                'sign' => 'language_zh_d944419f46dfed6d9d05e4cf2e6be826',
                'string' => 'Your new password.',
                'updated_at' => '2021-11-30 06:43:48',
            ),
            2 => 
            array (
                'created_at' => '2021-11-30 06:57:37',
                'id' => 3,
                'language' => 'zh',
                'output' => '登录或注册',
                'sign' => 'language_zh_29a34a523cac49d597a04deab2f0717f',
                'string' => 'Login or register',
                'updated_at' => '2021-11-30 06:57:37',
            ),
            3 => 
            array (
                'created_at' => '2021-11-30 06:57:42',
                'id' => 4,
                'language' => 'zh',
                'output' => '设置密码',
                'sign' => 'language_zh_2be9f61b3355876b25e8a0a174e78b0a',
                'string' => 'Setting up your password',
                'updated_at' => '2021-11-30 06:57:42',
            ),
            4 => 
            array (
                'created_at' => '2021-11-30 07:04:12',
                'id' => 5,
                'language' => 'zh',
                'output' => '所有权限',
                'sign' => 'language_zh_5ead42d210060cf78a1aecf5d251e6a8',
                'string' => 'All permissions',
                'updated_at' => '2021-11-30 07:04:12',
            ),
            5 => 
            array (
                'created_at' => '2021-11-30 07:04:17',
                'id' => 6,
                'language' => 'zh',
                'output' => '角色名称：',
                'sign' => 'language_zh_23adeec257655f5518eaf77b4075da1f',
                'string' => 'Role name: ',
                'updated_at' => '2021-11-30 07:04:17',
            ),
            6 => 
            array (
                'created_at' => '2021-11-30 07:04:19',
                'id' => 7,
                'language' => 'zh',
                'output' => '团队超级管理员。',
                'sign' => 'language_zh_85d9ed9fcba79f35fc9df1a15e9120b1',
                'string' => 'Team super admin.',
                'updated_at' => '2021-11-30 07:04:19',
            ),
            7 => 
            array (
                'created_at' => '2021-11-30 07:12:00',
                'id' => 8,
                'language' => 'zh',
                'output' => '邀请',
                'sign' => 'language_zh_072498675e01a8243c1b089555b16330',
                'string' => 'Invirations',
                'updated_at' => '2021-11-30 07:12:00',
            ),
            8 => 
            array (
                'created_at' => '2021-11-30 07:12:03',
                'id' => 9,
                'language' => 'zh',
                'output' => '角色和权限',
                'sign' => 'language_zh_b4f33b9221acc1497ed446a58d7c225d',
                'string' => 'Roles and Permissions',
                'updated_at' => '2021-11-30 07:12:03',
            ),
            9 => 
            array (
                'created_at' => '2021-11-30 07:12:03',
                'id' => 10,
                'language' => 'zh',
                'output' => '注销',
                'sign' => 'language_zh_4394c8d8e63c470de62ced3ae85de5ae',
                'string' => 'Log out',
                'updated_at' => '2021-11-30 07:12:03',
            ),
            10 => 
            array (
                'created_at' => '2021-11-30 07:12:04',
                'id' => 11,
                'language' => 'zh',
                'output' => '密码重置',
                'sign' => 'language_zh_11f581ede2d21a7f2c9c8f6fdc9eb754',
                'string' => 'Password reset',
                'updated_at' => '2021-11-30 07:12:04',
            ),
            11 => 
            array (
                'created_at' => '2021-11-30 07:12:06',
                'id' => 12,
                'language' => 'zh',
                'output' => '邀请用户',
                'sign' => 'language_zh_440a99b2eaa355d9eae5eb9dd810e6f7',
                'string' => 'Invite User',
                'updated_at' => '2021-11-30 07:12:06',
            ),
            12 => 
            array (
                'created_at' => '2021-11-30 07:12:14',
                'id' => 13,
                'language' => 'zh',
                'output' => '团队',
                'sign' => 'language_zh_1fe1b6cf4f52930c301b03e5a69c42c2',
                'string' => 'Teams',
                'updated_at' => '2021-11-30 07:12:14',
            ),
            13 => 
            array (
                'created_at' => '2021-11-30 07:12:17',
                'id' => 14,
                'language' => 'zh',
                'output' => '无法请求。',
                'sign' => 'language_zh_cba0b22a74b56c5d8e12564319a755ad',
                'string' => 'Unable to request.',
                'updated_at' => '2021-11-30 07:12:17',
            ),
            14 => 
            array (
                'created_at' => '2021-11-30 08:42:02',
                'id' => 15,
                'language' => 'zh',
                'output' => '管理或交换团队',
                'sign' => 'language_zh_f51c03b57decf9b43ad9eb0471bc839e',
                'string' => 'Manage or Switch teams',
                'updated_at' => '2021-11-30 08:42:02',
            ),
            15 => 
            array (
                'created_at' => '2021-11-30 08:42:04',
                'id' => 16,
                'language' => 'zh',
                'output' => '新团队',
                'sign' => 'language_zh_bf181e574976fbfd530e6fe5df34b485',
                'string' => 'New Team',
                'updated_at' => '2021-11-30 08:42:04',
            ),
            16 => 
            array (
                'created_at' => '2021-11-30 08:42:06',
                'id' => 17,
                'language' => 'zh',
                'output' => '团队邀请',
                'sign' => 'language_zh_1ff26527d37752828e3f3b8c7936d859',
                'string' => 'Team invites',
                'updated_at' => '2021-11-30 08:42:06',
            ),
            17 => 
            array (
                'created_at' => '2021-11-30 08:42:08',
                'id' => 18,
                'language' => 'zh',
                'output' => 'AFK会议',
                'sign' => 'language_zh_bd6f4169dad4666f989edd93e5173daa',
                'string' => 'AFK session',
                'updated_at' => '2021-11-30 08:42:08',
            ),
            18 => 
            array (
                'created_at' => '2021-11-30 09:32:49',
                'id' => 19,
                'language' => 'zh',
                'output' => '你的队伍被调换了。',
                'sign' => 'language_zh_11748c55c5894a6376d1eda17715cbf6',
                'string' => 'Your team has been switched.',
                'updated_at' => '2021-11-30 09:32:49',
            ),
            19 => 
            array (
                'created_at' => '2021-11-30 09:32:50',
                'id' => 20,
                'language' => 'zh',
                'output' => '你的队伍被调换了。',
                'sign' => 'language_zh_f4491ca1c0842856e5478884b49b7524',
                'string' => '你的队伍被调换了。',
                'updated_at' => '2021-11-30 09:32:50',
            ),
            20 => 
            array (
                'created_at' => '2021-11-30 09:39:27',
                'id' => 21,
                'language' => 'zh',
                'output' => '团队用户：',
                'sign' => 'language_zh_2d0e285e6b6a4fd41d69e0d3433ab7d7',
                'string' => 'Team users of:',
                'updated_at' => '2021-11-30 09:39:27',
            ),
            21 => 
            array (
                'created_at' => '2021-11-30 09:39:33',
                'id' => 22,
                'language' => 'zh',
                'output' => '超级管理员',
                'sign' => 'language_zh_dbf36ff3e3827639223983ee8ac47b42',
                'string' => 'Super Admin',
                'updated_at' => '2021-11-30 09:39:33',
            ),
            22 => 
            array (
                'created_at' => '2021-11-30 09:39:35',
                'id' => 23,
                'language' => 'zh',
                'output' => '请柬',
                'sign' => 'language_zh_1e04092a6e406cad54c23d67448e492b',
                'string' => 'Invitations',
                'updated_at' => '2021-11-30 09:39:35',
            ),
            23 => 
            array (
                'created_at' => '2021-11-30 10:06:40',
                'id' => 24,
                'language' => 'zh',
                'output' => '主页',
                'sign' => 'language_zh_7b19b37e7fc3dfe3c3e1ad5b84c7f565',
                'string' => 'Home page',
                'updated_at' => '2021-11-30 10:06:40',
            ),
            24 => 
            array (
                'created_at' => '2021-11-30 10:07:12',
                'id' => 25,
                'language' => 'zh',
                'output' => '漂亮有力的工作台',
                'sign' => 'language_zh_54b759e2aaad56d254a24d8d26d34cf2',
                'string' => 'Nice and powerful Worktable',
                'updated_at' => '2021-11-30 10:07:12',
            ),
            25 => 
            array (
                'created_at' => '2021-11-30 10:10:41',
                'id' => 26,
                'language' => 'zh',
                'output' => '确认密码',
                'sign' => 'language_zh_4c231e0da3eaaa6a9752174f7f9cfb31',
                'string' => 'Confirm password',
                'updated_at' => '2021-11-30 10:10:41',
            ),
            26 => 
            array (
                'created_at' => '2021-11-30 10:10:42',
                'id' => 27,
                'language' => 'zh',
                'output' => '继续',
                'sign' => 'language_zh_aeda0cf567efee986c3b45c73339042b',
                'string' => 'Go on',
                'updated_at' => '2021-11-30 10:10:42',
            ),
            27 => 
            array (
                'created_at' => '2021-11-30 10:38:27',
                'id' => 28,
                'language' => 'zh',
                'output' => '角色',
                'sign' => 'language_zh_a5cd3ed116608dac017f14c046ea56bf',
                'string' => 'Roles',
                'updated_at' => '2021-11-30 10:38:27',
            ),
            28 => 
            array (
                'created_at' => '2021-11-30 10:38:28',
                'id' => 29,
                'language' => 'zh',
                'output' => '用户权限',
                'sign' => 'language_zh_795341de32faec18616b60b81b2bc2dd',
                'string' => 'User Permissions',
                'updated_at' => '2021-11-30 10:38:28',
            ),
            29 => 
            array (
                'created_at' => '2021-11-30 10:38:29',
                'id' => 30,
                'language' => 'zh',
                'output' => '创建角色',
                'sign' => 'language_zh_670610147aff3f08b58a6c53cb5936dd',
                'string' => 'Create Role',
                'updated_at' => '2021-11-30 10:38:29',
            ),
            30 => 
            array (
                'created_at' => '2021-11-30 10:48:37',
                'id' => 31,
                'language' => 'zh',
                'output' => '权限书',
                'sign' => 'language_zh_6f9c3d6199b31a35f645cdd061b5fec4',
                'string' => 'Permissions Book',
                'updated_at' => '2021-11-30 10:48:37',
            ),
            31 => 
            array (
                'created_at' => '2021-11-30 10:55:50',
                'id' => 32,
                'language' => 'zh',
                'output' => '角色权限',
                'sign' => 'language_zh_faf952e256294fc00409331e303a6ebf',
                'string' => 'Role permissions',
                'updated_at' => '2021-11-30 10:55:50',
            ),
            32 => 
            array (
                'created_at' => '2021-11-30 10:55:51',
                'id' => 33,
                'language' => 'zh',
                'output' => '删除此角色',
                'sign' => 'language_zh_c4bdca770c2cb60650b3b5f2a05bb2af',
                'string' => 'Remove this role',
                'updated_at' => '2021-11-30 10:55:51',
            ),
            33 => 
            array (
                'created_at' => '2021-11-30 10:56:03',
                'id' => 34,
                'language' => 'zh',
                'output' => '添加权限',
                'sign' => 'language_zh_747faa21010d9989bbe96c65aa65a005',
                'string' => 'Add Permission',
                'updated_at' => '2021-11-30 10:56:03',
            ),
            34 => 
            array (
                'created_at' => '2021-11-30 11:10:52',
                'id' => 35,
                'language' => 'zh',
                'output' => '您必须提供密码才能继续',
                'sign' => 'language_zh_d4c7ee996d539e7df24db4907800a4d4',
                'string' => 'You must provid password to continue',
                'updated_at' => '2021-11-30 11:10:52',
            ),
            35 => 
            array (
                'created_at' => '2021-11-30 11:11:00',
                'id' => 36,
                'language' => 'zh',
                'output' => '您正在执行危险操作，出于安全原因，请提供密码以继续。',
                'sign' => 'language_zh_80dcccee3156cfb53a56dd2fb4e00ab5',
                'string' => 'You are doing a dangerous action, for security reasons, please provid your password to continue.',
                'updated_at' => '2021-11-30 11:11:00',
            ),
            36 => 
            array (
                'created_at' => '2021-11-30 11:11:00',
                'id' => 37,
                'language' => 'zh',
                'output' => '你的密码',
                'sign' => 'language_zh_45e37dc42e288221084fc298cd93c8bb',
                'string' => 'Your password',
                'updated_at' => '2021-11-30 11:11:00',
            ),
            37 => 
            array (
                'created_at' => '2021-11-30 11:11:03',
                'id' => 38,
                'language' => 'zh',
                'output' => '密码字段是必需的。',
                'sign' => 'language_zh_37f4793228117f0a7304bc52ebe5c77e',
                'string' => 'The password field is required.',
                'updated_at' => '2021-11-30 11:11:03',
            ),
            38 => 
            array (
                'created_at' => '2021-11-30 11:11:07',
                'id' => 39,
                'language' => 'zh',
                'output' => '证实',
                'sign' => 'language_zh_70d9be9b139893aa6c69b5e77e614311',
                'string' => 'Confirm',
                'updated_at' => '2021-11-30 11:11:07',
            ),
            39 => 
            array (
                'created_at' => '2021-11-30 11:15:47',
                'id' => 40,
                'language' => 'zh',
                'output' => '我的邀请',
                'sign' => 'language_zh_ead7a674c2a88cbd917f0b4a2c0038cf',
                'string' => 'My Invirations',
                'updated_at' => '2021-11-30 11:15:47',
            ),
            40 => 
            array (
                'created_at' => '2021-11-30 11:17:51',
                'id' => 41,
                'language' => 'zh',
                'output' => '你的邀请',
                'sign' => 'language_zh_4dda2851fa9529679dd67def26c52c47',
                'string' => 'Your Invirations',
                'updated_at' => '2021-11-30 11:17:51',
            ),
            41 => 
            array (
                'created_at' => '2021-11-30 11:25:16',
                'id' => 42,
                'language' => 'zh',
                'output' => '你现在离线了！',
                'sign' => 'language_zh_3573e3404a688b4ef7da9f018b1bd5fc',
                'string' => 'You are offline now!',
                'updated_at' => '2021-11-30 11:25:16',
            ),
            42 => 
            array (
                'created_at' => '2021-11-30 11:28:42',
                'id' => 43,
                'language' => 'zh',
                'output' => '您的团队不存在，请创建或选择一个团队。',
                'sign' => 'language_zh_65f4595885be6a14c729bf15e5e40da8',
                'string' => 'Your team does not exist, please create or select a team.',
                'updated_at' => '2021-11-30 11:28:42',
            ),
            43 => 
            array (
                'created_at' => '2021-11-30 11:40:05',
                'id' => 44,
                'language' => 'zh',
                'output' => '否认',
                'sign' => 'language_zh_3682d1665cf331373000c20680732d3a',
                'string' => 'Deny',
                'updated_at' => '2021-11-30 11:40:05',
            ),
            44 => 
            array (
                'created_at' => '2021-11-30 11:43:06',
                'id' => 45,
                'language' => 'zh',
                'output' => '接受',
                'sign' => 'language_zh_c4408d335012a56ff58937d78050efad',
                'string' => 'Accept',
                'updated_at' => '2021-11-30 11:43:06',
            ),
            45 => 
            array (
                'created_at' => '2021-11-30 12:25:06',
                'id' => 46,
                'language' => 'zh',
                'output' => '认可的',
                'sign' => 'language_zh_382ab522931673c11e398ead1b7b1678',
                'string' => 'Accepted',
                'updated_at' => '2021-11-30 12:25:06',
            ),
            46 => 
            array (
                'created_at' => '2021-11-30 13:35:30',
                'id' => 47,
                'language' => 'zh',
                'output' => '编辑团队',
                'sign' => 'language_zh_02c3d88c68288350ace8cb58a6fc3a9b',
                'string' => 'Edit Team',
                'updated_at' => '2021-11-30 13:35:30',
            ),
            47 => 
            array (
                'created_at' => '2021-11-30 13:35:33',
                'id' => 48,
                'language' => 'zh',
                'output' => '删除团队',
                'sign' => 'language_zh_bf9309455c36184baecb9d97ab8e4270',
                'string' => 'Delete Team',
                'updated_at' => '2021-11-30 13:35:33',
            ),
            48 => 
            array (
                'created_at' => '2021-12-01 07:30:36',
                'id' => 49,
                'language' => 'zh',
                'output' => '密码不正确。',
                'sign' => 'language_zh_5d6a78f37b0d4828209cd7f986e789b7',
                'string' => 'The password is incorrect.',
                'updated_at' => '2021-12-01 07:30:36',
            ),
            49 => 
            array (
                'created_at' => '2021-12-01 07:31:25',
                'id' => 50,
                'language' => 'zh',
                'output' => '权限名称：',
                'sign' => 'language_zh_7f4d73a3554f220bc1fd3be5964523a5',
                'string' => 'Permission name: ',
                'updated_at' => '2021-12-01 07:31:25',
            ),
            50 => 
            array (
                'created_at' => '2021-12-01 12:19:41',
                'id' => 51,
                'language' => 'zh',
                'output' => '单击以进行编辑。',
                'sign' => 'language_zh_d9704de932fb6d7311ec7fa2109f6f17',
                'string' => 'Click to edit.',
                'updated_at' => '2021-12-01 12:19:41',
            ),
            51 => 
            array (
                'created_at' => '2021-12-01 12:58:27',
                'id' => 52,
                'language' => 'de',
                'output' => 'Teamnutzer von:',
                'sign' => 'language_de_2d0e285e6b6a4fd41d69e0d3433ab7d7',
                'string' => 'Team users of:',
                'updated_at' => '2021-12-01 12:58:27',
            ),
            52 => 
            array (
                'created_at' => '2021-12-01 12:58:28',
                'id' => 53,
                'language' => 'de',
                'output' => 'Loggen Sie sich',
                'sign' => 'language_de_4394c8d8e63c470de62ced3ae85de5ae',
                'string' => 'Log out',
                'updated_at' => '2021-12-01 12:58:28',
            ),
            53 => 
            array (
                'created_at' => '2021-12-01 12:58:30',
                'id' => 54,
                'language' => 'de',
                'output' => 'Funktionen und Berechtigungen',
                'sign' => 'language_de_b4f33b9221acc1497ed446a58d7c225d',
                'string' => 'Roles and Permissions',
                'updated_at' => '2021-12-01 12:58:30',
            ),
            54 => 
            array (
                'created_at' => '2021-12-01 12:58:38',
                'id' => 55,
                'language' => 'de',
                'output' => 'Super Admin',
                'sign' => 'language_de_dbf36ff3e3827639223983ee8ac47b42',
                'string' => 'Super Admin',
                'updated_at' => '2021-12-01 12:58:38',
            ),
            55 => 
            array (
                'created_at' => '2021-12-01 12:58:40',
                'id' => 56,
                'language' => 'de',
                'output' => 'Teams',
                'sign' => 'language_de_1fe1b6cf4f52930c301b03e5a69c42c2',
                'string' => 'Teams',
                'updated_at' => '2021-12-01 12:58:40',
            ),
            56 => 
            array (
                'created_at' => '2021-12-01 12:58:43',
                'id' => 57,
                'language' => 'de',
                'output' => 'Klicken Sie zum Bearbeiten.',
                'sign' => 'language_de_d9704de932fb6d7311ec7fa2109f6f17',
                'string' => 'Click to edit.',
                'updated_at' => '2021-12-01 12:58:43',
            ),
            57 => 
            array (
                'created_at' => '2021-12-01 12:58:44',
                'id' => 58,
                'language' => 'de',
                'output' => 'Passwort zurücksetzen',
                'sign' => 'language_de_11f581ede2d21a7f2c9c8f6fdc9eb754',
                'string' => 'Password reset',
                'updated_at' => '2021-12-01 12:58:44',
            ),
            58 => 
            array (
                'created_at' => '2021-12-01 12:58:47',
                'id' => 59,
                'language' => 'de',
                'output' => 'Einladungen',
                'sign' => 'language_de_1e04092a6e406cad54c23d67448e492b',
                'string' => 'Invitations',
                'updated_at' => '2021-12-01 12:58:47',
            ),
            59 => 
            array (
                'created_at' => '2021-12-01 12:58:52',
                'id' => 60,
                'language' => 'de',
                'output' => 'Team löschen',
                'sign' => 'language_de_bf9309455c36184baecb9d97ab8e4270',
                'string' => 'Delete Team',
                'updated_at' => '2021-12-01 12:58:52',
            ),
            60 => 
            array (
                'created_at' => '2021-12-01 12:59:37',
                'id' => 61,
                'language' => 'pt',
                'output' => 'Utilizadores de equipa de:',
                'sign' => 'language_pt_2d0e285e6b6a4fd41d69e0d3433ab7d7',
                'string' => 'Team users of:',
                'updated_at' => '2021-12-01 12:59:37',
            ),
            61 => 
            array (
                'created_at' => '2021-12-01 12:59:38',
                'id' => 62,
                'language' => 'pt',
                'output' => 'Clique para editar.',
                'sign' => 'language_pt_d9704de932fb6d7311ec7fa2109f6f17',
                'string' => 'Click to edit.',
                'updated_at' => '2021-12-01 12:59:38',
            ),
            62 => 
            array (
                'created_at' => '2021-12-01 12:59:39',
                'id' => 63,
                'language' => 'pt',
                'output' => 'Convites',
                'sign' => 'language_pt_1e04092a6e406cad54c23d67448e492b',
                'string' => 'Invitations',
                'updated_at' => '2021-12-01 12:59:39',
            ),
            63 => 
            array (
                'created_at' => '2021-12-01 12:59:40',
                'id' => 64,
                'language' => 'pt',
                'output' => 'Cair fora',
                'sign' => 'language_pt_4394c8d8e63c470de62ced3ae85de5ae',
                'string' => 'Log out',
                'updated_at' => '2021-12-01 12:59:40',
            ),
            64 => 
            array (
                'created_at' => '2021-12-01 12:59:41',
                'id' => 65,
                'language' => 'pt',
                'output' => 'Reposição da senha',
                'sign' => 'language_pt_11f581ede2d21a7f2c9c8f6fdc9eb754',
                'string' => 'Password reset',
                'updated_at' => '2021-12-01 12:59:41',
            ),
            65 => 
            array (
                'created_at' => '2021-12-01 12:59:45',
                'id' => 66,
                'language' => 'pt',
                'output' => 'Super administração',
                'sign' => 'language_pt_dbf36ff3e3827639223983ee8ac47b42',
                'string' => 'Super Admin',
                'updated_at' => '2021-12-01 12:59:45',
            ),
            66 => 
            array (
                'created_at' => '2021-12-01 12:59:47',
                'id' => 67,
                'language' => 'pt',
                'output' => 'Equipas',
                'sign' => 'language_pt_1fe1b6cf4f52930c301b03e5a69c42c2',
                'string' => 'Teams',
                'updated_at' => '2021-12-01 12:59:47',
            ),
            67 => 
            array (
                'created_at' => '2021-12-01 12:59:50',
                'id' => 68,
                'language' => 'pt',
                'output' => 'Excluir a Equipe',
                'sign' => 'language_pt_bf9309455c36184baecb9d97ab8e4270',
                'string' => 'Delete Team',
                'updated_at' => '2021-12-01 12:59:50',
            ),
            68 => 
            array (
                'created_at' => '2021-12-01 13:16:31',
                'id' => 69,
                'language' => 'zh',
                'output' => '用户',
                'sign' => 'language_zh_f9aae5fda8d810a29f12d1e61b4ab25f',
                'string' => 'Users',
                'updated_at' => '2021-12-01 13:16:31',
            ),
            69 => 
            array (
                'created_at' => '2021-12-01 13:30:58',
                'id' => 70,
                'language' => 'zh',
                'output' => '用户的角色和权限',
                'sign' => 'language_zh_26fe2d529d98539155014d377a264aac',
                'string' => 'User\'s role and permissions',
                'updated_at' => '2021-12-01 13:30:58',
            ),
            70 => 
            array (
                'created_at' => '2021-12-01 13:35:39',
                'id' => 71,
                'language' => 'zh',
                'output' => '权限',
                'sign' => 'language_zh_d08ccf52b4cdd08e41cfb99ec42e0b29',
                'string' => 'Permissions',
                'updated_at' => '2021-12-01 13:35:39',
            ),
            71 => 
            array (
                'created_at' => '2021-12-01 13:36:42',
                'id' => 72,
                'language' => 'zh',
                'output' => '分配角色',
                'sign' => 'language_zh_3f4fb5bf409c65d0cdc07e16e971923b',
                'string' => 'Assign a role',
                'updated_at' => '2021-12-01 13:36:42',
            ),
            72 => 
            array (
                'created_at' => '2021-12-01 13:36:51',
                'id' => 73,
                'language' => 'zh',
                'output' => '准许',
                'sign' => 'language_zh_6c1b12fe5efcd9534650daa9bfb81a82',
                'string' => 'Give permission',
                'updated_at' => '2021-12-01 13:36:51',
            ),
            73 => 
            array (
                'created_at' => '2021-12-01 13:57:18',
                'id' => 74,
                'language' => 'zh',
                'output' => '删去',
                'sign' => 'language_zh_f2a6c498fb90ee345d997f888fce3b18',
                'string' => 'Delete',
                'updated_at' => '2021-12-01 13:57:18',
            ),
            74 => 
            array (
                'created_at' => '2021-12-01 14:03:29',
                'id' => 75,
                'language' => 'zh',
                'output' => '的角色和权限',
                'sign' => 'language_zh_3685917be25019c2a744bb81d8bf6030',
                'string' => '\'s role and permissions',
                'updated_at' => '2021-12-01 14:03:29',
            ),
            75 => 
            array (
                'created_at' => '2021-12-02 02:51:12',
                'id' => 76,
                'language' => 'zh',
                'output' => '从邀请中删除用户',
                'sign' => 'language_zh_4f0866261fc4ac3ade011cf6fe45b7ec',
                'string' => 'The user from invitation',
                'updated_at' => '2021-12-02 02:51:12',
            ),
            76 => 
            array (
                'created_at' => '2021-12-02 02:52:10',
                'id' => 77,
                'language' => 'zh',
                'output' => '编辑团队设置',
                'sign' => 'language_zh_c5b713161f22734c01268c66e14350ed',
                'string' => 'Edit team settings',
                'updated_at' => '2021-12-02 02:52:10',
            ),
            77 => 
            array (
                'created_at' => '2021-12-02 02:52:14',
                'id' => 78,
                'language' => 'zh',
                'output' => '显示角色权限',
                'sign' => 'language_zh_e9fd496c377f4f483fc52615b33e9326',
                'string' => 'Show role permissions',
                'updated_at' => '2021-12-02 02:52:14',
            ),
            78 => 
            array (
                'created_at' => '2021-12-02 02:52:17',
                'id' => 79,
                'language' => 'zh',
                'output' => '编辑角色',
                'sign' => 'language_zh_cfffe646d822ee76c2bd24b1f4c4d1a8',
                'string' => 'Edit role',
                'updated_at' => '2021-12-02 02:52:17',
            ),
            79 => 
            array (
                'created_at' => '2021-12-02 02:52:55',
                'id' => 80,
                'language' => 'zh',
                'output' => '来自邀请的用户',
                'sign' => 'language_zh_8bd2069167169043aaf46524a9d1c847',
                'string' => 'User from invitation',
                'updated_at' => '2021-12-02 02:52:55',
            ),
            80 => 
            array (
                'created_at' => '2021-12-02 04:18:13',
                'id' => 81,
                'language' => 'zh',
                'output' => '离队',
                'sign' => 'language_zh_da7b564d6de974966ab2db193907693e',
                'string' => 'Leave Team',
                'updated_at' => '2021-12-02 04:18:13',
            ),
            81 => 
            array (
                'created_at' => '2021-12-02 05:33:18',
                'id' => 82,
                'language' => 'zh',
                'output' => '找不到工作组。',
                'sign' => 'language_zh_d4760de4d36a62c2945e7b1def4fcdc3',
                'string' => 'Team not found.',
                'updated_at' => '2021-12-02 05:33:18',
            ),
            82 => 
            array (
                'created_at' => '2021-12-02 07:45:38',
                'id' => 83,
                'language' => 'zh',
                'output' => '你',
                'sign' => 'language_zh_cae8d14edd025e72c59dbab6f378c95a',
                'string' => 'You',
                'updated_at' => '2021-12-02 07:45:38',
            ),
            83 => 
            array (
                'created_at' => '2021-12-02 11:58:41',
                'id' => 84,
                'language' => 'zh',
                'output' => '播放列表',
                'sign' => 'language_zh_368b6d005d97e3c8ce87cc9ed0a10f0d',
                'string' => 'Play list',
                'updated_at' => '2021-12-02 11:58:41',
            ),
            84 => 
            array (
                'created_at' => '2021-12-04 11:51:13',
                'id' => 85,
                'language' => 'zh',
                'output' => '翅膀',
                'sign' => 'language_zh_703e7b3b4e2a07715552e466e0d231bd',
                'string' => 'Wings',
                'updated_at' => '2021-12-04 11:51:13',
            ),
            85 => 
            array (
                'created_at' => '2021-12-04 12:17:15',
                'id' => 86,
                'language' => 'zh',
                'output' => '应用程序容器',
                'sign' => 'language_zh_dc09197cc6a4e163d408ec176ea83cc8',
                'string' => 'App Containers',
                'updated_at' => '2021-12-04 12:17:15',
            ),
            86 => 
            array (
                'created_at' => '2021-12-04 12:17:46',
                'id' => 87,
                'language' => 'zh',
                'output' => '游戏容器',
                'sign' => 'language_zh_843a7c706cea92708b62e898d4eae7ca',
                'string' => 'Game Containers',
                'updated_at' => '2021-12-04 12:17:46',
            ),
            87 => 
            array (
                'created_at' => '2021-12-04 12:44:38',
                'id' => 88,
                'language' => 'zh',
                'output' => '不要在这里粘贴任何代码！这非常危险，可能会导致安全问题！',
                'sign' => 'language_zh_7ffce28cd1bc6096e94417784f49c266',
                'string' => 'Donnnnnnnnnnnnnn \'t paste any code hereeeeeeeeee! It\'s very dangerous dangerous may cause security issues!',
                'updated_at' => '2021-12-04 12:44:38',
            ),
            88 => 
            array (
                'created_at' => '2021-12-04 12:47:49',
                'id' => 89,
                'language' => 'zh',
                'output' => '不要在这里粘贴任何代码！这是非常危险的，也可能导致安全问题！',
                'sign' => 'language_zh_53a21a91aaa10b435e049c0f8efcf41a',
                'string' => 'Donnnnnnnnnnnnnn \'t paste any code hereeeeeeeeee! It\'s very dangerous dangerous and also may cause security issues!',
                'updated_at' => '2021-12-04 12:47:49',
            ),
            89 => 
            array (
                'created_at' => '2021-12-04 14:53:12',
                'id' => 90,
                'language' => 'zh',
                'output' => '面板用户与服务器',
                'sign' => 'language_zh_72da7d504d474a30a724ca874a93d8e7',
                'string' => 'Panel Management',
                'updated_at' => '2021-12-04 14:53:12',
            ),
            90 => 
            array (
                'created_at' => '2021-12-04 14:53:13',
                'id' => 91,
                'language' => 'zh',
                'output' => '分配',
                'sign' => 'language_zh_c86faccd14b93b47f677628325301982',
                'string' => 'Allocations',
                'updated_at' => '2021-12-04 14:53:13',
            ),
            91 => 
            array (
                'created_at' => '2021-12-04 14:53:14',
                'id' => 92,
                'language' => 'zh',
                'output' => '服务器',
                'sign' => 'language_zh_ac659513b2353187192e88c5d1988228',
                'string' => 'Servers',
                'updated_at' => '2021-12-04 14:53:14',
            ),
            92 => 
            array (
                'created_at' => '2021-12-04 14:53:16',
                'id' => 93,
                'language' => 'zh',
                'output' => '位置',
                'sign' => 'language_zh_eebd338ddbd547e41e4a1296de82963a',
                'string' => 'Locations',
                'updated_at' => '2021-12-04 14:53:16',
            ),
            93 => 
            array (
                'created_at' => '2021-12-04 14:53:17',
                'id' => 94,
                'language' => 'zh',
                'output' => '节点',
                'sign' => 'language_zh_187c6ad3a74cc93ac6c2229d398e383e',
                'string' => 'Nodes',
                'updated_at' => '2021-12-04 14:53:17',
            ),
            94 => 
            array (
                'created_at' => '2021-12-04 14:53:19',
                'id' => 95,
                'language' => 'zh',
                'output' => 'Nests',
                'sign' => 'language_zh_973eb5893eda60d8fc89f526c8be88cd',
                'string' => 'Nests',
                'updated_at' => '2021-12-04 14:53:19',
            ),
            95 => 
            array (
                'created_at' => '2021-12-04 14:53:41',
                'id' => 96,
                'language' => 'zh',
                'output' => '服务器管理',
                'sign' => 'language_zh_dbe2f531b708e04461a8223e6d2ab65c',
                'string' => 'Server Management',
                'updated_at' => '2021-12-04 14:53:41',
            ),
            96 => 
            array (
                'created_at' => '2021-12-04 14:59:43',
                'id' => 97,
                'language' => 'zh',
                'output' => '所有服务器',
                'sign' => 'language_zh_caeea2a98d3e5e3f2ea69919a2d4f672',
                'string' => 'All Servers',
                'updated_at' => '2021-12-04 14:59:43',
            ),
            97 => 
            array (
                'created_at' => '2021-12-04 14:59:45',
                'id' => 98,
                'language' => 'zh',
                'output' => '创建服务器',
                'sign' => 'language_zh_6ce3eac1fd1b4d48b4027e0ee08c96ed',
                'string' => 'Create Server',
                'updated_at' => '2021-12-04 14:59:45',
            ),
            98 => 
            array (
                'created_at' => '2021-12-04 14:59:47',
                'id' => 99,
                'language' => 'zh',
                'output' => '浏览器服务器',
                'sign' => 'language_zh_4eeafa1dc8aa458054819f34d384d2dd',
                'string' => 'Browser Servers',
                'updated_at' => '2021-12-04 14:59:47',
            ),
            99 => 
            array (
                'created_at' => '2021-12-04 15:00:01',
                'id' => 100,
                'language' => 'zh',
                'output' => '浏览服务器',
                'sign' => 'language_zh_4ade44d8b0ce8d0003609a09e6f7204a',
                'string' => 'Browse Servers',
                'updated_at' => '2021-12-04 15:00:01',
            ),
            100 => 
            array (
                'created_at' => '2021-12-05 02:32:59',
                'id' => 101,
                'language' => 'zh',
                'output' => '面板账号',
                'sign' => 'language_zh_d3b2855462eb4812e21eefedc5072fa6',
                'string' => 'Panel Accounts',
                'updated_at' => '2021-12-05 02:32:59',
            ),
            101 => 
            array (
                'created_at' => '2021-12-05 03:07:10',
                'id' => 102,
                'language' => 'zh',
                'output' => '您的帐户已注销。',
                'sign' => 'language_zh_dd5ca398ae18d828101d8843e1bcf80f',
                'string' => 'Your account has been logged out.',
                'updated_at' => '2021-12-05 03:07:10',
            ),
            102 => 
            array (
                'created_at' => '2021-12-06 03:02:15',
                'id' => 103,
                'language' => 'zh',
                'output' => '新位置',
                'sign' => 'language_zh_a1f64b88ccb1007db877708bc842a3ab',
                'string' => 'New Location',
                'updated_at' => '2021-12-06 03:02:15',
            ),
            103 => 
            array (
                'created_at' => '2021-12-06 03:02:16',
                'id' => 104,
                'language' => 'zh',
                'output' => '描述',
                'sign' => 'language_zh_b5a7adde1af5c87d7fd797b6245c2a39',
                'string' => 'Description',
                'updated_at' => '2021-12-06 03:02:16',
            ),
            104 => 
            array (
                'created_at' => '2021-12-06 03:02:19',
                'id' => 105,
                'language' => 'zh',
                'output' => '名称',
                'sign' => 'language_zh_49ee3087348e8d44e1feda1917443987',
                'string' => 'Name',
                'updated_at' => '2021-12-06 03:02:19',
            ),
            105 => 
            array (
                'created_at' => '2021-12-06 05:24:43',
                'id' => 106,
                'language' => 'zh',
                'output' => '队列',
                'sign' => 'language_zh_722ad2d05ecf4868b00c5484b82fd808',
                'string' => 'Queue',
                'updated_at' => '2021-12-06 05:24:43',
            ),
            106 => 
            array (
                'created_at' => '2021-12-06 06:42:07',
                'id' => 107,
                'language' => 'zh',
                'output' => '请等待处理。',
                'sign' => 'language_zh_a941a5e1c4dc91d864904bb754665dd1',
                'string' => 'Please wait for process.',
                'updated_at' => '2021-12-06 06:42:07',
            ),
            107 => 
            array (
                'created_at' => '2021-12-06 06:43:18',
                'id' => 108,
                'language' => 'zh',
                'output' => '创建',
                'sign' => 'language_zh_a6fff580feaafda7ffe5c5d61e0ab6a7',
                'string' => 'Creating',
                'updated_at' => '2021-12-06 06:43:18',
            ),
            108 => 
            array (
                'created_at' => '2021-12-06 08:18:03',
                'id' => 109,
                'language' => 'zh',
                'output' => '正在删除位置。。。',
                'sign' => 'language_zh_15ab04e3772bc5a08a7c2af866afda0c',
                'string' => 'Deleting location...',
                'updated_at' => '2021-12-06 08:18:03',
            ),
            109 => 
            array (
                'created_at' => '2021-12-06 09:00:05',
                'id' => 110,
                'language' => 'zh',
                'output' => '删除位置',
                'sign' => 'language_zh_c97c973bcfb3644b012f70cd34ebfeab',
                'string' => 'Deleting location',
                'updated_at' => '2021-12-06 09:00:05',
            ),
            110 => 
            array (
                'created_at' => '2021-12-06 09:00:10',
                'id' => 111,
                'language' => 'zh',
                'output' => '你可以离开这一页',
                'sign' => 'language_zh_466e137bdf1baf453fa4d958fc51baaa',
                'string' => 'You can leave this page',
                'updated_at' => '2021-12-06 09:00:10',
            ),
            111 => 
            array (
                'created_at' => '2021-12-06 09:00:42',
                'id' => 112,
                'language' => 'zh',
                'output' => '你可以离开这一页。',
                'sign' => 'language_zh_13335ba3c2a900aa843d1b73ef8dea58',
                'string' => 'You can leave this page.',
                'updated_at' => '2021-12-06 09:00:42',
            ),
            112 => 
            array (
                'created_at' => '2021-12-07 04:16:45',
                'id' => 113,
                'language' => 'zh',
                'output' => '新节点',
                'sign' => 'language_zh_5dcc789309178a5fe7a67f14cbd732e1',
                'string' => 'New Node',
                'updated_at' => '2021-12-07 04:16:45',
            ),
            113 => 
            array (
                'created_at' => '2021-12-07 04:51:38',
                'id' => 114,
                'language' => 'zh',
                'output' => '节点名',
                'sign' => 'language_zh_b42e7e9f43276548d600d26ad21cd252',
                'string' => 'Node Name',
                'updated_at' => '2021-12-07 04:51:38',
            ),
            114 => 
            array (
                'created_at' => '2021-12-07 04:52:40',
                'id' => 115,
                'language' => 'zh',
                'output' => '您的节点需要一个名称。',
                'sign' => 'language_zh_99d26fb7b8de403e736aef0c9a81dddf',
                'string' => 'Your node need a name.',
                'updated_at' => '2021-12-07 04:52:40',
            ),
            115 => 
            array (
                'created_at' => '2021-12-07 04:54:01',
                'id' => 116,
                'language' => 'zh',
                'output' => '你的新节点在哪里？',
                'sign' => 'language_zh_817cf40ce9b42a39cbeedef5e557b74e',
                'string' => 'Where is your new node?',
                'updated_at' => '2021-12-07 04:54:01',
            ),
            116 => 
            array (
                'created_at' => '2021-12-07 04:56:21',
                'id' => 117,
                'language' => 'zh',
                'output' => '节点可见性',
                'sign' => 'language_zh_bf645a57a9a48a29ee602b543065ccc0',
                'string' => 'Node Visibility',
                'updated_at' => '2021-12-07 04:56:21',
            ),
            117 => 
            array (
                'created_at' => '2021-12-07 04:57:17',
                'id' => 118,
                'language' => 'zh',
                'output' => '如果选中，该节点将可见。',
                'sign' => 'language_zh_1b7d6f5c1dfb75210d1c2ba6e5e6d567',
                'string' => 'If checked, the node will be visible.',
                'updated_at' => '2021-12-07 04:57:17',
            ),
            118 => 
            array (
                'created_at' => '2021-12-07 04:57:43',
                'id' => 119,
                'language' => 'zh',
                'output' => 'FQDN',
                'sign' => 'language_zh_d36eca5e0bf1dfff485d4978d6d506b6',
                'string' => 'FQDN',
                'updated_at' => '2021-12-07 04:57:43',
            ),
            119 => 
            array (
                'created_at' => '2021-12-07 04:58:00',
                'id' => 120,
                'language' => 'zh',
                'output' => '请输入用于连接到守护进程的域名（例如node.example.com）。',
                'sign' => 'language_zh_76bad0b021b78e6584a88eabcb14b8d3',
                'string' => '
Please enter domain name (e.g node.example.com) to be used for connecting to the daemon.',
                'updated_at' => '2021-12-07 04:58:00',
            ),
            120 => 
            array (
                'created_at' => '2021-12-07 05:00:31',
                'id' => 121,
                'language' => 'zh',
                'output' => '请输入用于连接到守护进程的域名（例如node.example.com）。',
                'sign' => 'language_zh_be541e824e71faa213b9f69cd20dd277',
            'string' => 'Please enter domain name (e.g node.example.com) to be used for connecting to the daemon.',
                'updated_at' => '2021-12-07 05:00:31',
            ),
            121 => 
            array (
                'created_at' => '2021-12-07 05:00:34',
                'id' => 122,
                'language' => 'zh',
                'output' => '背后的代理',
                'sign' => 'language_zh_ca5f3d7e75fd2107d51b5ea64bab9988',
                'string' => 'Behind Proxy',
                'updated_at' => '2021-12-07 05:00:34',
            ),
            122 => 
            array (
                'created_at' => '2021-12-07 05:00:36',
                'id' => 123,
                'language' => 'zh',
                'output' => '如果您在代理（如Cloudflare）后面运行守护程序，请选中此选项，使守护程序在启动时跳过寻找证书。',
                'sign' => 'language_zh_5a4022c002a6beffc666713e23a29f2d',
                'string' => 'If you are running the daemon behind a proxy such as Cloudflare, checked this to have the daemon skip looking for certificates on boot.',
                'updated_at' => '2021-12-07 05:00:36',
            ),
            123 => 
            array (
                'created_at' => '2021-12-07 05:00:45',
                'id' => 124,
                'language' => 'zh',
                'output' => '背后的代理？',
                'sign' => 'language_zh_720307a2d13d2f57f288d7e3d6ce14bb',
                'string' => 'Behind Proxy?',
                'updated_at' => '2021-12-07 05:00:45',
            ),
            124 => 
            array (
                'created_at' => '2021-12-07 05:02:47',
                'id' => 125,
                'language' => 'zh',
                'output' => '基本细节',
                'sign' => 'language_zh_04c6c8975207e4dedc7aac89404b5602',
                'string' => 'Basic Details',
                'updated_at' => '2021-12-07 05:02:47',
            ),
            125 => 
            array (
                'created_at' => '2021-12-07 05:03:02',
                'id' => 126,
                'language' => 'zh',
                'output' => '配置',
                'sign' => 'language_zh_254f642527b45bc260048e30704edb39',
                'string' => 'Configuration',
                'updated_at' => '2021-12-07 05:03:02',
            ),
            126 => 
            array (
                'created_at' => '2021-12-07 06:12:41',
                'id' => 127,
                'language' => 'zh',
                'output' => '守护进程服务器文件目录',
                'sign' => 'language_zh_4cea7336a5d8c737e57869c4f79b3da5',
                'string' => 'Daemon Server File Directory',
                'updated_at' => '2021-12-07 06:12:41',
            ),
            127 => 
            array (
                'created_at' => '2021-12-07 06:12:44',
                'id' => 128,
                'language' => 'zh',
                'output' => '如果你不知道，请不要改变这个。',
                'sign' => 'language_zh_3e672710a728ffcf252aec4996f3f46d',
                'string' => 'If you dont know, please dont change this.',
                'updated_at' => '2021-12-07 06:12:44',
            ),
            128 => 
            array (
                'created_at' => '2021-12-07 06:13:40',
                'id' => 129,
                'language' => 'zh',
                'output' => '总内存',
                'sign' => 'language_zh_afd0162eeb8c640994bfbf9da53c8ce6',
                'string' => 'Total Memory',
                'updated_at' => '2021-12-07 06:13:40',
            ),
            129 => 
            array (
                'created_at' => '2021-12-07 06:14:04',
                'id' => 130,
                'language' => 'zh',
                'output' => '单位：MB',
                'sign' => 'language_zh_36517404aa459c33315cf738b720ab37',
                'string' => 'Unit: MB',
                'updated_at' => '2021-12-07 06:14:04',
            ),
            130 => 
            array (
                'created_at' => '2021-12-07 06:33:30',
                'id' => 131,
                'language' => 'zh',
                'output' => '输入服务器文件应存储的目录。如果使用OVH，则应检查分区方案。您可能需要使用/home/daemon数据来获得足够的空间。',
                'sign' => 'language_zh_f26bc907c9ae55b7c016e092368f71ae',
                'string' => 'Enter the directory where server files should be stored. If you use OVH you should check your partition scheme. You may need to use /home/daemon-data to have enough space.',
                'updated_at' => '2021-12-07 06:33:30',
            ),
            131 => 
            array (
                'created_at' => '2021-12-07 06:35:39',
                'id' => 132,
                'language' => 'zh',
                'output' => '内存过度分配',
                'sign' => 'language_zh_75f722fee0adf6e214ed6dd77eeb0009',
                'string' => 'Memory Over-Allocation',
                'updated_at' => '2021-12-07 06:35:39',
            ),
            132 => 
            array (
                'created_at' => '2021-12-07 06:37:03',
                'id' => 133,
                'language' => 'zh',
                'output' => '输入新服务器的可用内存总量。如果要允许内存过度分配，请输入要允许的百分比。要禁用对超额分配的检查，请在字段中输入-1。如果输入0会使节点超出限制，则将阻止创建新服务器。',
                'sign' => 'language_zh_ddcdbef5f4f9570e9b8d8cb3eae2246b',
                'string' => 'Enter the total amount of memory available for new servers. If you would like to allow overallocation of memory enter the percentage that you want to allow. To disable checking for overallocation enter -1 into the field. Entering 0 will prevent creating new servers if it would put the node over the limit.',
                'updated_at' => '2021-12-07 06:37:03',
            ),
            133 => 
            array (
                'created_at' => '2021-12-07 06:37:48',
                'id' => 134,
                'language' => 'zh',
                'output' => '单位：%',
                'sign' => 'language_zh_0563e5dc1bb24db7995c5aabe617f4aa',
                'string' => 'Unit: %',
                'updated_at' => '2021-12-07 06:37:48',
            ),
            134 => 
            array (
                'created_at' => '2021-12-07 06:40:29',
                'id' => 136,
                'language' => 'zh',
                'output' => '磁盘过度分配',
                'sign' => 'language_zh_fab26663a03e53e3691f7d4d7b90968f',
                'string' => 'Disk Over-Allocation',
                'updated_at' => '2021-12-07 06:40:29',
            ),
            135 => 
            array (
                'created_at' => '2021-12-07 06:41:27',
                'id' => 137,
                'language' => 'zh',
                'output' => '总磁盘空间',
                'sign' => 'language_zh_94a7823f910f294c5c8b09bec1f34983',
                'string' => 'Total Disk Space',
                'updated_at' => '2021-12-07 06:41:27',
            ),
            136 => 
            array (
                'created_at' => '2021-12-07 06:42:05',
                'id' => 138,
                'language' => 'zh',
                'output' => '输入可用于新服务器的磁盘空间总量。如果要允许磁盘空间过度分配，请输入要允许的百分比。要禁用对超额分配的检查，请在字段中输入-1。如果输入0会使节点超出限制，则将阻止创建新服务器。',
                'sign' => 'language_zh_87e4e9b99d64711bb243a33f72521f08',
                'string' => 'Enter the total amount of disk space available for new servers. If you would like to allow overallocation of disk space enter the percentage that you want to allow. To disable checking for overallocation enter -1 into the field. Entering 0 will prevent creating new servers if it would put the node over the limit.',
                'updated_at' => '2021-12-07 06:42:05',
            ),
            137 => 
            array (
                'created_at' => '2021-12-07 06:44:43',
                'id' => 139,
                'language' => 'zh',
                'output' => '守护程序端口',
                'sign' => 'language_zh_62ec40f7ff5f4bbef25827bd2390dec2',
                'string' => 'Daemon Port',
                'updated_at' => '2021-12-07 06:44:43',
            ),
            138 => 
            array (
                'created_at' => '2021-12-07 06:44:46',
                'id' => 140,
                'language' => 'zh',
                'output' => '守护进程SFTP端口',
                'sign' => 'language_zh_296ca36a1ae01e7c892026057ccaa457',
                'string' => 'Daemon SFTP Port',
                'updated_at' => '2021-12-07 06:44:46',
            ),
            139 => 
            array (
                'created_at' => '2021-12-07 06:44:49',
                'id' => 141,
                'language' => 'zh',
                'output' => '守护进程运行自己的SFTP管理容器，不在主物理服务器上使用SSHd进程。不要使用为物理服务器的SSH进程分配的相同端口。如果要在CloudFlare®后面运行守护程序，则应将守护程序端口设置为8443，以允许websocket通过SSL代理。',
                'sign' => 'language_zh_186165161287ccbf3304e91acb06768b',
                'string' => 'The daemon runs its own SFTP management container and does not use the SSHd process on the main physical server. Do not use the same port that you have assigned for your physical server\'s SSH process. If you will be running the daemon behind CloudFlare® you should set the daemon port to 8443 to allow websocket proxying over SSL.',
                'updated_at' => '2021-12-07 06:44:49',
            ),
            140 => 
            array (
                'created_at' => '2021-12-07 06:47:01',
                'id' => 142,
                'language' => 'zh',
                'output' => '创建节点',
                'sign' => 'language_zh_a8c0815bac7d0d7e2b7eca4fe9a10676',
                'string' => 'Create Node',
                'updated_at' => '2021-12-07 06:47:01',
            ),
            141 => 
            array (
                'created_at' => '2021-12-07 07:42:05',
                'id' => 143,
                'language' => 'zh',
                'output' => '你离线了！',
                'sign' => 'language_zh_3994fa254c553f28ceb0f1b04f764b61',
                'string' => 'You are offline !',
                'updated_at' => '2021-12-07 07:42:05',
            ),
            142 => 
            array (
                'created_at' => '2021-12-07 07:43:44',
                'id' => 144,
                'language' => 'zh',
                'output' => '脱机时无法运行。',
                'sign' => 'language_zh_9bc23404ed4002fde1691b830daa0110',
                'string' => 'can not run if you are offline.',
                'updated_at' => '2021-12-07 07:43:44',
            ),
            143 => 
            array (
                'created_at' => '2021-12-07 07:56:35',
                'id' => 145,
                'language' => 'zh',
                'output' => '等待网络',
                'sign' => 'language_zh_1ed19dfe60604b6a4b6433804d61758e',
                'string' => 'Waiting for network',
                'updated_at' => '2021-12-07 07:56:35',
            ),
            144 => 
            array (
                'created_at' => '2021-12-07 08:10:36',
                'id' => 146,
                'language' => 'zh',
                'output' => '位置不存在。',
                'sign' => 'language_zh_bcc4809d41c39ee2829de96068b1b3b4',
                'string' => 'Location does not exist.',
                'updated_at' => '2021-12-07 08:10:36',
            ),
            145 => 
            array (
                'created_at' => '2021-12-07 11:01:32',
                'id' => 147,
                'language' => 'zh',
                'output' => '最大Web上载文件大小',
                'sign' => 'language_zh_5d137c621542a51c641f361fc553bd0a',
                'string' => 'Maximum Web Upload Filesize',
                'updated_at' => '2021-12-07 11:01:32',
            ),
            146 => 
            array (
                'created_at' => '2021-12-07 12:14:52',
                'id' => 148,
                'language' => 'zh',
                'output' => '已分配的磁盘空间',
                'sign' => 'language_zh_254d95c9ff7e8a9395d2e985d20ff806',
                'string' => 'Disk space allocated',
                'updated_at' => '2021-12-07 12:14:52',
            ),
            147 => 
            array (
                'created_at' => '2021-12-07 12:14:54',
                'id' => 149,
                'language' => 'zh',
                'output' => '内存分配',
                'sign' => 'language_zh_4778ad9ad7c5835c9843b96bc317140b',
                'string' => 'Memory allocated',
                'updated_at' => '2021-12-07 12:14:54',
            ),
            148 => 
            array (
                'created_at' => '2021-12-07 14:37:41',
                'id' => 150,
                'language' => 'zh',
                'output' => '访问团队',
                'sign' => 'language_zh_4d6e58f74834670015cfdf9df12588b3',
                'string' => 'Access team',
                'updated_at' => '2021-12-07 14:37:41',
            ),
            149 => 
            array (
                'created_at' => '2021-12-07 14:38:51',
                'id' => 151,
                'language' => 'zh',
                'output' => '编辑节点数据',
                'sign' => 'language_zh_1bf0deaf24fcc97a2466968e9936682d',
                'string' => 'Edit node data',
                'updated_at' => '2021-12-07 14:38:51',
            ),
            150 => 
            array (
                'created_at' => '2021-12-07 23:21:44',
                'id' => 152,
                'language' => 'zh',
                'output' => '挂起',
                'sign' => 'language_zh_7c6c2e5d48ab37a007cbf70d3ea25fa4',
                'string' => 'pending',
                'updated_at' => '2021-12-07 23:21:44',
            ),
            151 => 
            array (
                'created_at' => '2021-12-07 23:22:09',
                'id' => 153,
                'language' => 'zh',
                'output' => '等待刷新',
                'sign' => 'language_zh_cd53ed6ebe68aa0f2e6c31381162eca8',
                'string' => 'wait to refresh',
                'updated_at' => '2021-12-07 23:22:09',
            ),
            152 => 
            array (
                'created_at' => '2021-12-08 01:49:01',
                'id' => 154,
                'language' => 'zh',
                'output' => '编辑节点',
                'sign' => 'language_zh_ce481f9edcceb01d07fead53a3a51515',
                'string' => 'Edit Node',
                'updated_at' => '2021-12-08 01:49:01',
            ),
            153 => 
            array (
                'created_at' => '2021-12-08 01:52:29',
                'id' => 155,
                'language' => 'zh',
                'output' => '更新节点',
                'sign' => 'language_zh_7c8a48fcee5f9f51ccd405a7d3febe7c',
                'string' => 'Update Node',
                'updated_at' => '2021-12-08 01:52:29',
            ),
            154 => 
            array (
                'created_at' => '2021-12-08 01:55:39',
                'id' => 156,
                'language' => 'zh',
                'output' => '重置守护进程主密钥',
                'sign' => 'language_zh_d1b8861f2c6dd5605b9baad8b405e3c0',
                'string' => 'Reset Daemon Master Key',
                'updated_at' => '2021-12-08 01:55:39',
            ),
            155 => 
            array (
                'created_at' => '2021-12-08 01:56:18',
                'id' => 157,
                'language' => 'zh',
                'output' => '勾选以重置密钥',
                'sign' => 'language_zh_6761536ee89013af1afeaf4bb0d22586',
                'string' => 'Check to reset secret',
                'updated_at' => '2021-12-08 01:56:18',
            ),
            156 => 
            array (
                'created_at' => '2021-12-08 01:56:33',
                'id' => 158,
                'language' => 'zh',
                'output' => '勾选以重置密钥',
                'sign' => 'language_zh_d805aac275790c707609b77c2d4b632b',
                'string' => 'Checked to reset secret',
                'updated_at' => '2021-12-08 01:56:33',
            ),
            157 => 
            array (
                'created_at' => '2021-12-08 03:26:14',
                'id' => 159,
                'language' => 'zh',
                'output' => '节点信息',
                'sign' => 'language_zh_3119fca100096625bf31b504a305f5ac',
                'string' => 'Node Info',
                'updated_at' => '2021-12-08 03:26:14',
            ),
            158 => 
            array (
                'created_at' => '2021-12-08 03:29:54',
                'id' => 160,
                'language' => 'zh',
                'output' => '切换锁定',
                'sign' => 'language_zh_a908108db6f8759dae5bae5dd6d07f38',
                'string' => '切换锁定',
                'updated_at' => '2021-12-08 03:29:54',
            ),
            159 => 
            array (
                'created_at' => '2021-12-08 04:45:12',
                'id' => 161,
                'language' => 'zh',
                'output' => '维护模式',
                'sign' => 'language_zh_295c54be6a83de7aa3b31efc81ad2604',
                'string' => 'Maintenance Mode',
                'updated_at' => '2021-12-08 04:45:12',
            ),
            160 => 
            array (
                'created_at' => '2021-12-08 04:45:19',
                'id' => 162,
                'language' => 'zh',
                'output' => '如果节点标记为“正在维护”，则用户将无法访问此节点上的服务器。',
                'sign' => 'language_zh_833555003bbf7dad4f342b262a22a780',
                'string' => 'If the node is marked as \'Under Maintenance\' users won\'t be able to access servers that are on this node.',
                'updated_at' => '2021-12-08 04:45:19',
            ),
            161 => 
            array (
                'created_at' => '2021-12-08 04:57:48',
                'id' => 163,
                'language' => 'zh',
                'output' => '节点配置',
                'sign' => 'language_zh_fd7403e95eeb36aa9f5d1a8a78e5b107',
                'string' => 'Node Configuration',
                'updated_at' => '2021-12-08 04:57:48',
            ),
            162 => 
            array (
                'created_at' => '2021-12-08 05:02:20',
                'id' => 164,
                'language' => 'zh',
                'output' => '配置文件',
                'sign' => 'language_zh_85c7e8fde73fc8d874286b5edd8cf793',
                'string' => 'Configuration File',
                'updated_at' => '2021-12-08 05:02:20',
            ),
            163 => 
            array (
                'created_at' => '2021-12-08 05:02:24',
                'id' => 165,
                'language' => 'zh',
                'output' => '这个文件应该放在守护进程的根目录（通常是/etc/pterodactyl）中的config.yml文件中。',
                'sign' => 'language_zh_9c91f8c2467b2dce732ce09957ce9042',
            'string' => 'This file should be placed in your daemon\'s root directory (usually /etc/pterodactyl) in a file called config.yml.',
                'updated_at' => '2021-12-08 05:02:24',
            ),
            164 => 
            array (
                'created_at' => '2021-12-08 07:21:55',
                'id' => 166,
                'language' => 'zh',
                'output' => '删除节点',
                'sign' => 'language_zh_96d3b86c25b21836268c2bc5a6731b70',
                'string' => 'Delete Node',
                'updated_at' => '2021-12-08 07:21:55',
            ),
            165 => 
            array (
                'created_at' => '2021-12-08 11:51:23',
                'id' => 167,
                'language' => 'zh',
                'output' => '新用户',
                'sign' => 'language_zh_19a093af0cee2a1d0f8bb6ac14d79843',
                'string' => 'New User',
                'updated_at' => '2021-12-08 11:51:23',
            ),
            166 => 
            array (
                'created_at' => '2021-12-08 11:53:02',
                'id' => 168,
                'language' => 'zh',
                'output' => '电子邮件',
                'sign' => 'language_zh_ce8ae9da5b7cd6c3df2929543a9af92d',
                'string' => 'Email',
                'updated_at' => '2021-12-08 11:53:02',
            ),
            167 => 
            array (
                'created_at' => '2021-12-08 11:53:23',
                'id' => 169,
                'language' => 'zh',
                'output' => '账户',
                'sign' => 'language_zh_9b945efebb006547a94415eadaa12921',
                'string' => 'Accounts',
                'updated_at' => '2021-12-08 11:53:23',
            ),
            168 => 
            array (
                'created_at' => '2021-12-08 11:53:26',
                'id' => 170,
                'language' => 'zh',
                'output' => '新帐户',
                'sign' => 'language_zh_254d94c90482938c3d54e3e26e7db8ba',
                'string' => 'New Account',
                'updated_at' => '2021-12-08 11:53:26',
            ),
            169 => 
            array (
                'created_at' => '2021-12-08 11:53:28',
                'id' => 171,
                'language' => 'zh',
                'output' => '用户名',
                'sign' => 'language_zh_f6039d44b29456b20f8f373155ae4973',
                'string' => 'Username',
                'updated_at' => '2021-12-08 11:53:28',
            ),
            170 => 
            array (
                'created_at' => '2021-12-08 11:55:34',
                'id' => 172,
                'language' => 'zh',
                'output' => '用户名应该是唯一的。',
                'sign' => 'language_zh_5a471f238f492388e6c1a0637540c5fa',
                'string' => 'Username should be unique.',
                'updated_at' => '2021-12-08 11:55:34',
            ),
            171 => 
            array (
                'created_at' => '2021-12-08 11:55:35',
                'id' => 173,
                'language' => 'zh',
                'output' => '名字',
                'sign' => 'language_zh_bc910f8bdf70f29374f496f05be0330c',
                'string' => 'First Name',
                'updated_at' => '2021-12-08 11:55:35',
            ),
            172 => 
            array (
                'created_at' => '2021-12-08 11:55:38',
                'id' => 174,
                'language' => 'zh',
                'output' => '电子邮件应该是唯一的。',
                'sign' => 'language_zh_a2ed0d7a2390c0b821d44f3d79fede8a',
                'string' => 'Email should be unique.',
                'updated_at' => '2021-12-08 11:55:38',
            ),
            173 => 
            array (
                'created_at' => '2021-12-08 11:55:40',
                'id' => 175,
                'language' => 'zh',
                'output' => '姓',
                'sign' => 'language_zh_77587239bf4c54ea493c7033e1dbf636',
                'string' => 'Last Name',
                'updated_at' => '2021-12-08 11:55:40',
            ),
            174 => 
            array (
                'created_at' => '2021-12-08 11:56:27',
                'id' => 176,
                'language' => 'zh',
                'output' => '创建',
                'sign' => 'language_zh_686e697538050e4664636337cc3b834f',
                'string' => 'Create',
                'updated_at' => '2021-12-08 11:56:27',
            ),
            175 => 
            array (
                'created_at' => '2021-12-08 12:01:18',
                'id' => 177,
                'language' => 'zh',
                'output' => '密码',
                'sign' => 'language_zh_dc647eb65e6711e155375218212b3964',
                'string' => 'Password',
                'updated_at' => '2021-12-08 12:01:18',
            ),
            176 => 
            array (
                'created_at' => '2021-12-09 00:45:03',
                'id' => 178,
                'language' => 'zh',
                'output' => '保存',
                'sign' => 'language_zh_c9cc8cce247e49bae79f15173ce97354',
                'string' => 'Save',
                'updated_at' => '2021-12-09 00:45:03',
            ),
            177 => 
            array (
                'created_at' => '2021-12-09 00:54:58',
                'id' => 179,
                'language' => 'zh',
                'output' => '如果要更改密码，请输入密码。',
                'sign' => 'language_zh_c7b8524f7f484b21453f5a04007ccdd4',
                'string' => 'Enter password if you want to change it.',
                'updated_at' => '2021-12-09 00:54:58',
            ),
            178 => 
            array (
                'created_at' => '2021-12-09 00:55:06',
                'id' => 180,
                'language' => 'zh',
                'output' => '如果要更改密码，请输入新密码。',
                'sign' => 'language_zh_7f050d7456fb03b3f1d99e5f2b95d602',
                'string' => 'Enter new password if you want to change it.',
                'updated_at' => '2021-12-09 00:55:06',
            ),
            179 => 
            array (
                'created_at' => '2021-12-09 02:46:15',
                'id' => 181,
                'language' => 'zh',
                'output' => '锁定/解锁',
                'sign' => 'language_zh_3295f0c71920d2f15bdf8aeb1da0cca3',
                'string' => 'Lock/Unlock',
                'updated_at' => '2021-12-09 02:46:15',
            ),
            180 => 
            array (
                'created_at' => '2021-12-09 16:04:30',
                'id' => 182,
                'language' => 'zh',
                'output' => 'Eggs',
                'sign' => 'language_zh_9890f06976131702b942e59eda2f750a',
                'string' => 'Eggs',
                'updated_at' => '2021-12-09 16:04:30',
            ),
            181 => 
            array (
                'created_at' => '2021-12-09 16:51:55',
                'id' => 183,
                'language' => 'zh',
                'output' => '没有鸡蛋。',
                'sign' => 'language_zh_7eab3832d0d215c11078b849b1e87d74',
                'string' => 'Egg unavailable.',
                'updated_at' => '2021-12-09 16:51:55',
            ),
            182 => 
            array (
                'created_at' => '2021-12-09 16:52:45',
                'id' => 184,
                'language' => 'zh',
                'output' => '很长一段时间以来，Minecraft服务器所有者一直有一个梦想，那就是用一种免费、简单、可靠的方式将多台Minecraft服务器连接在一起。蹦极绳是上述梦的答案。无论您是希望将多种游戏模式串联在一起的小型服务器，还是ShotBow网络的所有者，BungeeCord都是您的理想解决方案。在蹦极绳的帮助下，您将能够充分发挥社区的潜力。',
                'sign' => 'language_zh_867044134a33f5fee158c677a9586b3d',
                'string' => 'For a long time, Minecraft server owners have had a dream that encompasses a free, easy, and reliable way to connect multiple Minecraft servers together. BungeeCord is the answer to said dream. Whether you are a small server wishing to string multiple game-modes together, or the owner of the ShotBow Network, BungeeCord is the ideal solution for you. With the help of BungeeCord, you will be able to unlock your community\'s full potential.',
                'updated_at' => '2021-12-09 16:52:45',
            ),
            183 => 
            array (
                'created_at' => '2021-12-09 16:56:11',
                'id' => 185,
                'language' => 'zh',
                'output' => '这个 Egg 暂时不可用。',
                'sign' => 'language_zh_c8e56fc90eecf1c743ca33eca1b8d176',
                'string' => 'This egg is temporarily unavailable.',
                'updated_at' => '2021-12-09 16:56:11',
            ),
            184 => 
            array (
                'created_at' => '2021-12-09 16:56:45',
                'id' => 186,
                'language' => 'zh',
                'output' => 'Minecraft Forge服务器。Minecraft Forge是一个modding API（应用程序编程接口），它使创建mod变得更容易，也确保mod彼此兼容。',
                'sign' => 'language_zh_6da4f47f1efedaeaece78bf2d7307361',
            'string' => 'Minecraft Forge Server. Minecraft Forge is a modding API (Application Programming Interface), which makes it easier to create mods, and also make sure mods are compatible with each other.',
                'updated_at' => '2021-12-09 16:56:45',
            ),
            185 => 
            array (
                'created_at' => '2021-12-09 16:56:48',
                'id' => 187,
                'language' => 'zh',
                'output' => '高性能插口叉，旨在解决游戏性和机械不一致的问题。',
                'sign' => 'language_zh_2d759b7774199d631c872add93eb0c9d',
                'string' => 'High performance Spigot fork that aims to fix gameplay and mechanics inconsistencies.',
                'updated_at' => '2021-12-09 16:56:48',
            ),
            186 => 
            array (
                'created_at' => '2021-12-09 16:56:50',
                'id' => 188,
                'language' => 'zh',
                'output' => 'SpongeVanilla是Vanilla Minecraft的SpongeAPI实现。',
                'sign' => 'language_zh_967eef34277474949a41fcea725e4539',
                'string' => 'SpongeVanilla is the SpongeAPI implementation for Vanilla Minecraft.',
                'updated_at' => '2021-12-09 16:56:50',
            ),
            187 => 
            array (
                'created_at' => '2021-12-09 16:56:52',
                'id' => 189,
                'language' => 'zh',
                'output' => 'Minecraft是一款关于放置积木和冒险的游戏。探索随机生成的世界，从最简单的家到最宏伟的城堡，建造令人惊叹的东西。使用无限资源在创造性模式下游戏，或者在生存模式下深挖地雷，制造武器和盔甲来抵御危险的暴徒。独自或与朋友一起做这一切。',
                'sign' => 'language_zh_afd723e495178c1f2eacd3df0890581c',
                'string' => 'Minecraft is a game about placing blocks and going on adventures. Explore randomly generated worlds and build amazing things from the simplest of homes to the grandest of castles. Play in Creative Mode with unlimited resources or mine deep in Survival Mode, crafting weapons and armor to fend off dangerous mobs. Do all this alone or with friends.',
                'updated_at' => '2021-12-09 16:56:52',
            ),
        ));
        
        
    }
}