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
                'output' => '使用者',
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
        ));
        
        
    }
}