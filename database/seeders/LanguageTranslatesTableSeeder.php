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
                'id' => 1,
                'language' => 'zh',
                'string' => 'Set up your password',
                'output' => '设置您的密码',
                'sign' => 'language_zh_639e821263d734872445272b566a118c',
                'created_at' => '2021-11-30 06:43:46',
                'updated_at' => '2021-11-30 06:43:46',
            ),
            1 => 
            array (
                'id' => 2,
                'language' => 'zh',
                'string' => 'Your new password.',
                'output' => '你的新密码。',
                'sign' => 'language_zh_d944419f46dfed6d9d05e4cf2e6be826',
                'created_at' => '2021-11-30 06:43:48',
                'updated_at' => '2021-11-30 06:43:48',
            ),
            2 => 
            array (
                'id' => 3,
                'language' => 'zh',
                'string' => 'Login or register',
                'output' => '登录或注册',
                'sign' => 'language_zh_29a34a523cac49d597a04deab2f0717f',
                'created_at' => '2021-11-30 06:57:37',
                'updated_at' => '2021-11-30 06:57:37',
            ),
            3 => 
            array (
                'id' => 4,
                'language' => 'zh',
                'string' => 'Setting up your password',
                'output' => '设置密码',
                'sign' => 'language_zh_2be9f61b3355876b25e8a0a174e78b0a',
                'created_at' => '2021-11-30 06:57:42',
                'updated_at' => '2021-11-30 06:57:42',
            ),
            4 => 
            array (
                'id' => 5,
                'language' => 'zh',
                'string' => 'All permissions',
                'output' => '所有权限',
                'sign' => 'language_zh_5ead42d210060cf78a1aecf5d251e6a8',
                'created_at' => '2021-11-30 07:04:12',
                'updated_at' => '2021-11-30 07:04:12',
            ),
            5 => 
            array (
                'id' => 6,
                'language' => 'zh',
                'string' => 'Role name: ',
                'output' => '角色名称：',
                'sign' => 'language_zh_23adeec257655f5518eaf77b4075da1f',
                'created_at' => '2021-11-30 07:04:17',
                'updated_at' => '2021-11-30 07:04:17',
            ),
            6 => 
            array (
                'id' => 7,
                'language' => 'zh',
                'string' => 'Team super admin.',
                'output' => '团队超级管理员。',
                'sign' => 'language_zh_85d9ed9fcba79f35fc9df1a15e9120b1',
                'created_at' => '2021-11-30 07:04:19',
                'updated_at' => '2021-11-30 07:04:19',
            ),
            7 => 
            array (
                'id' => 8,
                'language' => 'zh',
                'string' => 'Invirations',
                'output' => '邀请',
                'sign' => 'language_zh_072498675e01a8243c1b089555b16330',
                'created_at' => '2021-11-30 07:12:00',
                'updated_at' => '2021-11-30 07:12:00',
            ),
            8 => 
            array (
                'id' => 9,
                'language' => 'zh',
                'string' => 'Roles and Permissions',
                'output' => '角色和权限',
                'sign' => 'language_zh_b4f33b9221acc1497ed446a58d7c225d',
                'created_at' => '2021-11-30 07:12:03',
                'updated_at' => '2021-11-30 07:12:03',
            ),
            9 => 
            array (
                'id' => 10,
                'language' => 'zh',
                'string' => 'Log out',
                'output' => '注销',
                'sign' => 'language_zh_4394c8d8e63c470de62ced3ae85de5ae',
                'created_at' => '2021-11-30 07:12:03',
                'updated_at' => '2021-11-30 07:12:03',
            ),
            10 => 
            array (
                'id' => 11,
                'language' => 'zh',
                'string' => 'Password reset',
                'output' => '密码重置',
                'sign' => 'language_zh_11f581ede2d21a7f2c9c8f6fdc9eb754',
                'created_at' => '2021-11-30 07:12:04',
                'updated_at' => '2021-11-30 07:12:04',
            ),
            11 => 
            array (
                'id' => 12,
                'language' => 'zh',
                'string' => 'Invite User',
                'output' => '邀请用户',
                'sign' => 'language_zh_440a99b2eaa355d9eae5eb9dd810e6f7',
                'created_at' => '2021-11-30 07:12:06',
                'updated_at' => '2021-11-30 07:12:06',
            ),
            12 => 
            array (
                'id' => 13,
                'language' => 'zh',
                'string' => 'Teams',
                'output' => '团队',
                'sign' => 'language_zh_1fe1b6cf4f52930c301b03e5a69c42c2',
                'created_at' => '2021-11-30 07:12:14',
                'updated_at' => '2021-11-30 07:12:14',
            ),
            13 => 
            array (
                'id' => 14,
                'language' => 'zh',
                'string' => 'Unable to request.',
                'output' => '无法请求。',
                'sign' => 'language_zh_cba0b22a74b56c5d8e12564319a755ad',
                'created_at' => '2021-11-30 07:12:17',
                'updated_at' => '2021-11-30 07:12:17',
            ),
            14 => 
            array (
                'id' => 15,
                'language' => 'zh',
                'string' => 'Manage or Switch teams',
                'output' => '管理或交换团队',
                'sign' => 'language_zh_f51c03b57decf9b43ad9eb0471bc839e',
                'created_at' => '2021-11-30 08:42:02',
                'updated_at' => '2021-11-30 08:42:02',
            ),
            15 => 
            array (
                'id' => 16,
                'language' => 'zh',
                'string' => 'New Team',
                'output' => '新团队',
                'sign' => 'language_zh_bf181e574976fbfd530e6fe5df34b485',
                'created_at' => '2021-11-30 08:42:04',
                'updated_at' => '2021-11-30 08:42:04',
            ),
            16 => 
            array (
                'id' => 17,
                'language' => 'zh',
                'string' => 'Team invites',
                'output' => '团队邀请',
                'sign' => 'language_zh_1ff26527d37752828e3f3b8c7936d859',
                'created_at' => '2021-11-30 08:42:06',
                'updated_at' => '2021-11-30 08:42:06',
            ),
            17 => 
            array (
                'id' => 18,
                'language' => 'zh',
                'string' => 'AFK session',
                'output' => 'AFK会议',
                'sign' => 'language_zh_bd6f4169dad4666f989edd93e5173daa',
                'created_at' => '2021-11-30 08:42:08',
                'updated_at' => '2021-11-30 08:42:08',
            ),
            18 => 
            array (
                'id' => 19,
                'language' => 'zh',
                'string' => 'Your team has been switched.',
                'output' => '你的队伍被调换了。',
                'sign' => 'language_zh_11748c55c5894a6376d1eda17715cbf6',
                'created_at' => '2021-11-30 09:32:49',
                'updated_at' => '2021-11-30 09:32:49',
            ),
            19 => 
            array (
                'id' => 20,
                'language' => 'zh',
                'string' => '你的队伍被调换了。',
                'output' => '你的队伍被调换了。',
                'sign' => 'language_zh_f4491ca1c0842856e5478884b49b7524',
                'created_at' => '2021-11-30 09:32:50',
                'updated_at' => '2021-11-30 09:32:50',
            ),
            20 => 
            array (
                'id' => 21,
                'language' => 'zh',
                'string' => 'Team users of:',
                'output' => '团队用户：',
                'sign' => 'language_zh_2d0e285e6b6a4fd41d69e0d3433ab7d7',
                'created_at' => '2021-11-30 09:39:27',
                'updated_at' => '2021-11-30 09:39:27',
            ),
            21 => 
            array (
                'id' => 22,
                'language' => 'zh',
                'string' => 'Super Admin',
                'output' => '超级管理员',
                'sign' => 'language_zh_dbf36ff3e3827639223983ee8ac47b42',
                'created_at' => '2021-11-30 09:39:33',
                'updated_at' => '2021-11-30 09:39:33',
            ),
            22 => 
            array (
                'id' => 23,
                'language' => 'zh',
                'string' => 'Invitations',
                'output' => '请柬',
                'sign' => 'language_zh_1e04092a6e406cad54c23d67448e492b',
                'created_at' => '2021-11-30 09:39:35',
                'updated_at' => '2021-11-30 09:39:35',
            ),
            23 => 
            array (
                'id' => 24,
                'language' => 'zh',
                'string' => 'Home page',
                'output' => '主页',
                'sign' => 'language_zh_7b19b37e7fc3dfe3c3e1ad5b84c7f565',
                'created_at' => '2021-11-30 10:06:40',
                'updated_at' => '2021-11-30 10:06:40',
            ),
            24 => 
            array (
                'id' => 25,
                'language' => 'zh',
                'string' => 'Nice and powerful Worktable',
                'output' => '漂亮有力的工作台',
                'sign' => 'language_zh_54b759e2aaad56d254a24d8d26d34cf2',
                'created_at' => '2021-11-30 10:07:12',
                'updated_at' => '2021-11-30 10:07:12',
            ),
            25 => 
            array (
                'id' => 26,
                'language' => 'zh',
                'string' => 'Confirm password',
                'output' => '确认密码',
                'sign' => 'language_zh_4c231e0da3eaaa6a9752174f7f9cfb31',
                'created_at' => '2021-11-30 10:10:41',
                'updated_at' => '2021-11-30 10:10:41',
            ),
            26 => 
            array (
                'id' => 27,
                'language' => 'zh',
                'string' => 'Go on',
                'output' => '继续',
                'sign' => 'language_zh_aeda0cf567efee986c3b45c73339042b',
                'created_at' => '2021-11-30 10:10:42',
                'updated_at' => '2021-11-30 10:10:42',
            ),
            27 => 
            array (
                'id' => 28,
                'language' => 'zh',
                'string' => 'Roles',
                'output' => '角色',
                'sign' => 'language_zh_a5cd3ed116608dac017f14c046ea56bf',
                'created_at' => '2021-11-30 10:38:27',
                'updated_at' => '2021-11-30 10:38:27',
            ),
            28 => 
            array (
                'id' => 29,
                'language' => 'zh',
                'string' => 'User Permissions',
                'output' => '用户权限',
                'sign' => 'language_zh_795341de32faec18616b60b81b2bc2dd',
                'created_at' => '2021-11-30 10:38:28',
                'updated_at' => '2021-11-30 10:38:28',
            ),
            29 => 
            array (
                'id' => 30,
                'language' => 'zh',
                'string' => 'Create Role',
                'output' => '创建角色',
                'sign' => 'language_zh_670610147aff3f08b58a6c53cb5936dd',
                'created_at' => '2021-11-30 10:38:29',
                'updated_at' => '2021-11-30 10:38:29',
            ),
            30 => 
            array (
                'id' => 31,
                'language' => 'zh',
                'string' => 'Permissions Book',
                'output' => '权限书',
                'sign' => 'language_zh_6f9c3d6199b31a35f645cdd061b5fec4',
                'created_at' => '2021-11-30 10:48:37',
                'updated_at' => '2021-11-30 10:48:37',
            ),
            31 => 
            array (
                'id' => 32,
                'language' => 'zh',
                'string' => 'Role permissions',
                'output' => '角色权限',
                'sign' => 'language_zh_faf952e256294fc00409331e303a6ebf',
                'created_at' => '2021-11-30 10:55:50',
                'updated_at' => '2021-11-30 10:55:50',
            ),
            32 => 
            array (
                'id' => 33,
                'language' => 'zh',
                'string' => 'Remove this role',
                'output' => '删除此角色',
                'sign' => 'language_zh_c4bdca770c2cb60650b3b5f2a05bb2af',
                'created_at' => '2021-11-30 10:55:51',
                'updated_at' => '2021-11-30 10:55:51',
            ),
            33 => 
            array (
                'id' => 34,
                'language' => 'zh',
                'string' => 'Add Permission',
                'output' => '添加权限',
                'sign' => 'language_zh_747faa21010d9989bbe96c65aa65a005',
                'created_at' => '2021-11-30 10:56:03',
                'updated_at' => '2021-11-30 10:56:03',
            ),
            34 => 
            array (
                'id' => 35,
                'language' => 'zh',
                'string' => 'You must provid password to continue',
                'output' => '您必须提供密码才能继续',
                'sign' => 'language_zh_d4c7ee996d539e7df24db4907800a4d4',
                'created_at' => '2021-11-30 11:10:52',
                'updated_at' => '2021-11-30 11:10:52',
            ),
            35 => 
            array (
                'id' => 36,
                'language' => 'zh',
                'string' => 'You are doing a dangerous action, for security reasons, please provid your password to continue.',
                'output' => '您正在执行危险操作，出于安全原因，请提供密码以继续。',
                'sign' => 'language_zh_80dcccee3156cfb53a56dd2fb4e00ab5',
                'created_at' => '2021-11-30 11:11:00',
                'updated_at' => '2021-11-30 11:11:00',
            ),
            36 => 
            array (
                'id' => 37,
                'language' => 'zh',
                'string' => 'Your password',
                'output' => '你的密码',
                'sign' => 'language_zh_45e37dc42e288221084fc298cd93c8bb',
                'created_at' => '2021-11-30 11:11:00',
                'updated_at' => '2021-11-30 11:11:00',
            ),
            37 => 
            array (
                'id' => 38,
                'language' => 'zh',
                'string' => 'The password field is required.',
                'output' => '密码字段是必需的。',
                'sign' => 'language_zh_37f4793228117f0a7304bc52ebe5c77e',
                'created_at' => '2021-11-30 11:11:03',
                'updated_at' => '2021-11-30 11:11:03',
            ),
            38 => 
            array (
                'id' => 39,
                'language' => 'zh',
                'string' => 'Confirm',
                'output' => '证实',
                'sign' => 'language_zh_70d9be9b139893aa6c69b5e77e614311',
                'created_at' => '2021-11-30 11:11:07',
                'updated_at' => '2021-11-30 11:11:07',
            ),
            39 => 
            array (
                'id' => 40,
                'language' => 'zh',
                'string' => 'My Invirations',
                'output' => '我的邀请',
                'sign' => 'language_zh_ead7a674c2a88cbd917f0b4a2c0038cf',
                'created_at' => '2021-11-30 11:15:47',
                'updated_at' => '2021-11-30 11:15:47',
            ),
            40 => 
            array (
                'id' => 41,
                'language' => 'zh',
                'string' => 'Your Invirations',
                'output' => '你的邀请',
                'sign' => 'language_zh_4dda2851fa9529679dd67def26c52c47',
                'created_at' => '2021-11-30 11:17:51',
                'updated_at' => '2021-11-30 11:17:51',
            ),
            41 => 
            array (
                'id' => 42,
                'language' => 'zh',
                'string' => 'You are offline now!',
                'output' => '你现在离线了！',
                'sign' => 'language_zh_3573e3404a688b4ef7da9f018b1bd5fc',
                'created_at' => '2021-11-30 11:25:16',
                'updated_at' => '2021-11-30 11:25:16',
            ),
            42 => 
            array (
                'id' => 43,
                'language' => 'zh',
                'string' => 'Your team does not exist, please create or select a team.',
                'output' => '您的团队不存在，请创建或选择一个团队。',
                'sign' => 'language_zh_65f4595885be6a14c729bf15e5e40da8',
                'created_at' => '2021-11-30 11:28:42',
                'updated_at' => '2021-11-30 11:28:42',
            ),
            43 => 
            array (
                'id' => 44,
                'language' => 'zh',
                'string' => 'Deny',
                'output' => '否认',
                'sign' => 'language_zh_3682d1665cf331373000c20680732d3a',
                'created_at' => '2021-11-30 11:40:05',
                'updated_at' => '2021-11-30 11:40:05',
            ),
            44 => 
            array (
                'id' => 45,
                'language' => 'zh',
                'string' => 'Accept',
                'output' => '接受',
                'sign' => 'language_zh_c4408d335012a56ff58937d78050efad',
                'created_at' => '2021-11-30 11:43:06',
                'updated_at' => '2021-11-30 11:43:06',
            ),
            45 => 
            array (
                'id' => 46,
                'language' => 'zh',
                'string' => 'Accepted',
                'output' => '认可的',
                'sign' => 'language_zh_382ab522931673c11e398ead1b7b1678',
                'created_at' => '2021-11-30 12:25:06',
                'updated_at' => '2021-11-30 12:25:06',
            ),
            46 => 
            array (
                'id' => 47,
                'language' => 'zh',
                'string' => 'Edit Team',
                'output' => '编辑团队',
                'sign' => 'language_zh_02c3d88c68288350ace8cb58a6fc3a9b',
                'created_at' => '2021-11-30 13:35:30',
                'updated_at' => '2021-11-30 13:35:30',
            ),
            47 => 
            array (
                'id' => 48,
                'language' => 'zh',
                'string' => 'Delete Team',
                'output' => '删除团队',
                'sign' => 'language_zh_bf9309455c36184baecb9d97ab8e4270',
                'created_at' => '2021-11-30 13:35:33',
                'updated_at' => '2021-11-30 13:35:33',
            ),
            48 => 
            array (
                'id' => 49,
                'language' => 'zh',
                'string' => 'The password is incorrect.',
                'output' => '密码不正确。',
                'sign' => 'language_zh_5d6a78f37b0d4828209cd7f986e789b7',
                'created_at' => '2021-12-01 07:30:36',
                'updated_at' => '2021-12-01 07:30:36',
            ),
            49 => 
            array (
                'id' => 50,
                'language' => 'zh',
                'string' => 'Permission name: ',
                'output' => '权限名称：',
                'sign' => 'language_zh_7f4d73a3554f220bc1fd3be5964523a5',
                'created_at' => '2021-12-01 07:31:25',
                'updated_at' => '2021-12-01 07:31:25',
            ),
            50 => 
            array (
                'id' => 51,
                'language' => 'zh',
                'string' => 'Click to edit.',
                'output' => '单击以进行编辑。',
                'sign' => 'language_zh_d9704de932fb6d7311ec7fa2109f6f17',
                'created_at' => '2021-12-01 12:19:41',
                'updated_at' => '2021-12-01 12:19:41',
            ),
            51 => 
            array (
                'id' => 52,
                'language' => 'de',
                'string' => 'Team users of:',
                'output' => 'Teamnutzer von:',
                'sign' => 'language_de_2d0e285e6b6a4fd41d69e0d3433ab7d7',
                'created_at' => '2021-12-01 12:58:27',
                'updated_at' => '2021-12-01 12:58:27',
            ),
            52 => 
            array (
                'id' => 53,
                'language' => 'de',
                'string' => 'Log out',
                'output' => 'Loggen Sie sich',
                'sign' => 'language_de_4394c8d8e63c470de62ced3ae85de5ae',
                'created_at' => '2021-12-01 12:58:28',
                'updated_at' => '2021-12-01 12:58:28',
            ),
            53 => 
            array (
                'id' => 54,
                'language' => 'de',
                'string' => 'Roles and Permissions',
                'output' => 'Funktionen und Berechtigungen',
                'sign' => 'language_de_b4f33b9221acc1497ed446a58d7c225d',
                'created_at' => '2021-12-01 12:58:30',
                'updated_at' => '2021-12-01 12:58:30',
            ),
            54 => 
            array (
                'id' => 55,
                'language' => 'de',
                'string' => 'Super Admin',
                'output' => 'Super Admin',
                'sign' => 'language_de_dbf36ff3e3827639223983ee8ac47b42',
                'created_at' => '2021-12-01 12:58:38',
                'updated_at' => '2021-12-01 12:58:38',
            ),
            55 => 
            array (
                'id' => 56,
                'language' => 'de',
                'string' => 'Teams',
                'output' => 'Teams',
                'sign' => 'language_de_1fe1b6cf4f52930c301b03e5a69c42c2',
                'created_at' => '2021-12-01 12:58:40',
                'updated_at' => '2021-12-01 12:58:40',
            ),
            56 => 
            array (
                'id' => 57,
                'language' => 'de',
                'string' => 'Click to edit.',
                'output' => 'Klicken Sie zum Bearbeiten.',
                'sign' => 'language_de_d9704de932fb6d7311ec7fa2109f6f17',
                'created_at' => '2021-12-01 12:58:43',
                'updated_at' => '2021-12-01 12:58:43',
            ),
            57 => 
            array (
                'id' => 58,
                'language' => 'de',
                'string' => 'Password reset',
                'output' => 'Passwort zurücksetzen',
                'sign' => 'language_de_11f581ede2d21a7f2c9c8f6fdc9eb754',
                'created_at' => '2021-12-01 12:58:44',
                'updated_at' => '2021-12-01 12:58:44',
            ),
            58 => 
            array (
                'id' => 59,
                'language' => 'de',
                'string' => 'Invitations',
                'output' => 'Einladungen',
                'sign' => 'language_de_1e04092a6e406cad54c23d67448e492b',
                'created_at' => '2021-12-01 12:58:47',
                'updated_at' => '2021-12-01 12:58:47',
            ),
            59 => 
            array (
                'id' => 60,
                'language' => 'de',
                'string' => 'Delete Team',
                'output' => 'Team löschen',
                'sign' => 'language_de_bf9309455c36184baecb9d97ab8e4270',
                'created_at' => '2021-12-01 12:58:52',
                'updated_at' => '2021-12-01 12:58:52',
            ),
            60 => 
            array (
                'id' => 61,
                'language' => 'pt',
                'string' => 'Team users of:',
                'output' => 'Utilizadores de equipa de:',
                'sign' => 'language_pt_2d0e285e6b6a4fd41d69e0d3433ab7d7',
                'created_at' => '2021-12-01 12:59:37',
                'updated_at' => '2021-12-01 12:59:37',
            ),
            61 => 
            array (
                'id' => 62,
                'language' => 'pt',
                'string' => 'Click to edit.',
                'output' => 'Clique para editar.',
                'sign' => 'language_pt_d9704de932fb6d7311ec7fa2109f6f17',
                'created_at' => '2021-12-01 12:59:38',
                'updated_at' => '2021-12-01 12:59:38',
            ),
            62 => 
            array (
                'id' => 63,
                'language' => 'pt',
                'string' => 'Invitations',
                'output' => 'Convites',
                'sign' => 'language_pt_1e04092a6e406cad54c23d67448e492b',
                'created_at' => '2021-12-01 12:59:39',
                'updated_at' => '2021-12-01 12:59:39',
            ),
            63 => 
            array (
                'id' => 64,
                'language' => 'pt',
                'string' => 'Log out',
                'output' => 'Cair fora',
                'sign' => 'language_pt_4394c8d8e63c470de62ced3ae85de5ae',
                'created_at' => '2021-12-01 12:59:40',
                'updated_at' => '2021-12-01 12:59:40',
            ),
            64 => 
            array (
                'id' => 65,
                'language' => 'pt',
                'string' => 'Password reset',
                'output' => 'Reposição da senha',
                'sign' => 'language_pt_11f581ede2d21a7f2c9c8f6fdc9eb754',
                'created_at' => '2021-12-01 12:59:41',
                'updated_at' => '2021-12-01 12:59:41',
            ),
            65 => 
            array (
                'id' => 66,
                'language' => 'pt',
                'string' => 'Super Admin',
                'output' => 'Super administração',
                'sign' => 'language_pt_dbf36ff3e3827639223983ee8ac47b42',
                'created_at' => '2021-12-01 12:59:45',
                'updated_at' => '2021-12-01 12:59:45',
            ),
            66 => 
            array (
                'id' => 67,
                'language' => 'pt',
                'string' => 'Teams',
                'output' => 'Equipas',
                'sign' => 'language_pt_1fe1b6cf4f52930c301b03e5a69c42c2',
                'created_at' => '2021-12-01 12:59:47',
                'updated_at' => '2021-12-01 12:59:47',
            ),
            67 => 
            array (
                'id' => 68,
                'language' => 'pt',
                'string' => 'Delete Team',
                'output' => 'Excluir a Equipe',
                'sign' => 'language_pt_bf9309455c36184baecb9d97ab8e4270',
                'created_at' => '2021-12-01 12:59:50',
                'updated_at' => '2021-12-01 12:59:50',
            ),
            68 => 
            array (
                'id' => 69,
                'language' => 'zh',
                'string' => 'Users',
                'output' => '用户',
                'sign' => 'language_zh_f9aae5fda8d810a29f12d1e61b4ab25f',
                'created_at' => '2021-12-01 13:16:31',
                'updated_at' => '2021-12-01 13:16:31',
            ),
            69 => 
            array (
                'id' => 70,
                'language' => 'zh',
                'string' => 'User\'s role and permissions',
                'output' => '用户的角色和权限',
                'sign' => 'language_zh_26fe2d529d98539155014d377a264aac',
                'created_at' => '2021-12-01 13:30:58',
                'updated_at' => '2021-12-01 13:30:58',
            ),
            70 => 
            array (
                'id' => 71,
                'language' => 'zh',
                'string' => 'Permissions',
                'output' => '权限',
                'sign' => 'language_zh_d08ccf52b4cdd08e41cfb99ec42e0b29',
                'created_at' => '2021-12-01 13:35:39',
                'updated_at' => '2021-12-01 13:35:39',
            ),
            71 => 
            array (
                'id' => 72,
                'language' => 'zh',
                'string' => 'Assign a role',
                'output' => '分配角色',
                'sign' => 'language_zh_3f4fb5bf409c65d0cdc07e16e971923b',
                'created_at' => '2021-12-01 13:36:42',
                'updated_at' => '2021-12-01 13:36:42',
            ),
            72 => 
            array (
                'id' => 73,
                'language' => 'zh',
                'string' => 'Give permission',
                'output' => '准许',
                'sign' => 'language_zh_6c1b12fe5efcd9534650daa9bfb81a82',
                'created_at' => '2021-12-01 13:36:51',
                'updated_at' => '2021-12-01 13:36:51',
            ),
            73 => 
            array (
                'id' => 74,
                'language' => 'zh',
                'string' => 'Delete',
                'output' => '删去',
                'sign' => 'language_zh_f2a6c498fb90ee345d997f888fce3b18',
                'created_at' => '2021-12-01 13:57:18',
                'updated_at' => '2021-12-01 13:57:18',
            ),
            74 => 
            array (
                'id' => 75,
                'language' => 'zh',
                'string' => '\'s role and permissions',
                'output' => '的角色和权限',
                'sign' => 'language_zh_3685917be25019c2a744bb81d8bf6030',
                'created_at' => '2021-12-01 14:03:29',
                'updated_at' => '2021-12-01 14:03:29',
            ),
            75 => 
            array (
                'id' => 76,
                'language' => 'zh',
                'string' => 'The user from invitation',
                'output' => '从邀请中删除用户',
                'sign' => 'language_zh_4f0866261fc4ac3ade011cf6fe45b7ec',
                'created_at' => '2021-12-02 02:51:12',
                'updated_at' => '2021-12-02 02:51:12',
            ),
            76 => 
            array (
                'id' => 77,
                'language' => 'zh',
                'string' => 'Edit team settings',
                'output' => '编辑团队设置',
                'sign' => 'language_zh_c5b713161f22734c01268c66e14350ed',
                'created_at' => '2021-12-02 02:52:10',
                'updated_at' => '2021-12-02 02:52:10',
            ),
            77 => 
            array (
                'id' => 78,
                'language' => 'zh',
                'string' => 'Show role permissions',
                'output' => '显示角色权限',
                'sign' => 'language_zh_e9fd496c377f4f483fc52615b33e9326',
                'created_at' => '2021-12-02 02:52:14',
                'updated_at' => '2021-12-02 02:52:14',
            ),
            78 => 
            array (
                'id' => 79,
                'language' => 'zh',
                'string' => 'Edit role',
                'output' => '编辑角色',
                'sign' => 'language_zh_cfffe646d822ee76c2bd24b1f4c4d1a8',
                'created_at' => '2021-12-02 02:52:17',
                'updated_at' => '2021-12-02 02:52:17',
            ),
            79 => 
            array (
                'id' => 80,
                'language' => 'zh',
                'string' => 'User from invitation',
                'output' => '来自邀请的用户',
                'sign' => 'language_zh_8bd2069167169043aaf46524a9d1c847',
                'created_at' => '2021-12-02 02:52:55',
                'updated_at' => '2021-12-02 02:52:55',
            ),
            80 => 
            array (
                'id' => 81,
                'language' => 'zh',
                'string' => 'Leave Team',
                'output' => '离队',
                'sign' => 'language_zh_da7b564d6de974966ab2db193907693e',
                'created_at' => '2021-12-02 04:18:13',
                'updated_at' => '2021-12-02 04:18:13',
            ),
            81 => 
            array (
                'id' => 82,
                'language' => 'zh',
                'string' => 'Team not found.',
                'output' => '找不到工作组。',
                'sign' => 'language_zh_d4760de4d36a62c2945e7b1def4fcdc3',
                'created_at' => '2021-12-02 05:33:18',
                'updated_at' => '2021-12-02 05:33:18',
            ),
            82 => 
            array (
                'id' => 83,
                'language' => 'zh',
                'string' => 'You',
                'output' => '你',
                'sign' => 'language_zh_cae8d14edd025e72c59dbab6f378c95a',
                'created_at' => '2021-12-02 07:45:38',
                'updated_at' => '2021-12-02 07:45:38',
            ),
            83 => 
            array (
                'id' => 84,
                'language' => 'zh',
                'string' => 'Play list',
                'output' => '播放列表',
                'sign' => 'language_zh_368b6d005d97e3c8ce87cc9ed0a10f0d',
                'created_at' => '2021-12-02 11:58:41',
                'updated_at' => '2021-12-02 11:58:41',
            ),
            84 => 
            array (
                'id' => 85,
                'language' => 'zh',
                'string' => 'Wings',
                'output' => '翅膀',
                'sign' => 'language_zh_703e7b3b4e2a07715552e466e0d231bd',
                'created_at' => '2021-12-04 11:51:13',
                'updated_at' => '2021-12-04 11:51:13',
            ),
            85 => 
            array (
                'id' => 86,
                'language' => 'zh',
                'string' => 'App Containers',
                'output' => '应用程序容器',
                'sign' => 'language_zh_dc09197cc6a4e163d408ec176ea83cc8',
                'created_at' => '2021-12-04 12:17:15',
                'updated_at' => '2021-12-04 12:17:15',
            ),
            86 => 
            array (
                'id' => 87,
                'language' => 'zh',
                'string' => 'Game Containers',
                'output' => '游戏容器',
                'sign' => 'language_zh_843a7c706cea92708b62e898d4eae7ca',
                'created_at' => '2021-12-04 12:17:46',
                'updated_at' => '2021-12-04 12:17:46',
            ),
            87 => 
            array (
                'id' => 88,
                'language' => 'zh',
                'string' => 'Donnnnnnnnnnnnnn \'t paste any code hereeeeeeeeee! It\'s very dangerous dangerous may cause security issues!',
                'output' => '不要在这里粘贴任何代码！这非常危险，可能会导致安全问题！',
                'sign' => 'language_zh_7ffce28cd1bc6096e94417784f49c266',
                'created_at' => '2021-12-04 12:44:38',
                'updated_at' => '2021-12-04 12:44:38',
            ),
            88 => 
            array (
                'id' => 89,
                'language' => 'zh',
                'string' => 'Donnnnnnnnnnnnnn \'t paste any code hereeeeeeeeee! It\'s very dangerous dangerous and also may cause security issues!',
                'output' => '不要在这里粘贴任何代码！这是非常危险的，也可能导致安全问题！',
                'sign' => 'language_zh_53a21a91aaa10b435e049c0f8efcf41a',
                'created_at' => '2021-12-04 12:47:49',
                'updated_at' => '2021-12-04 12:47:49',
            ),
            89 => 
            array (
                'id' => 90,
                'language' => 'zh',
                'string' => 'Panel Management',
                'output' => '面板用户与服务器',
                'sign' => 'language_zh_72da7d504d474a30a724ca874a93d8e7',
                'created_at' => '2021-12-04 14:53:12',
                'updated_at' => '2021-12-04 14:53:12',
            ),
            90 => 
            array (
                'id' => 91,
                'language' => 'zh',
                'string' => 'Allocations',
                'output' => '分配',
                'sign' => 'language_zh_c86faccd14b93b47f677628325301982',
                'created_at' => '2021-12-04 14:53:13',
                'updated_at' => '2021-12-04 14:53:13',
            ),
            91 => 
            array (
                'id' => 92,
                'language' => 'zh',
                'string' => 'Servers',
                'output' => '服务器',
                'sign' => 'language_zh_ac659513b2353187192e88c5d1988228',
                'created_at' => '2021-12-04 14:53:14',
                'updated_at' => '2021-12-04 14:53:14',
            ),
            92 => 
            array (
                'id' => 93,
                'language' => 'zh',
                'string' => 'Locations',
                'output' => '位置',
                'sign' => 'language_zh_eebd338ddbd547e41e4a1296de82963a',
                'created_at' => '2021-12-04 14:53:16',
                'updated_at' => '2021-12-04 14:53:16',
            ),
            93 => 
            array (
                'id' => 94,
                'language' => 'zh',
                'string' => 'Nodes',
                'output' => '节点',
                'sign' => 'language_zh_187c6ad3a74cc93ac6c2229d398e383e',
                'created_at' => '2021-12-04 14:53:17',
                'updated_at' => '2021-12-04 14:53:17',
            ),
            94 => 
            array (
                'id' => 95,
                'language' => 'zh',
                'string' => 'Nests',
                'output' => 'Nests',
                'sign' => 'language_zh_973eb5893eda60d8fc89f526c8be88cd',
                'created_at' => '2021-12-04 14:53:19',
                'updated_at' => '2021-12-04 14:53:19',
            ),
            95 => 
            array (
                'id' => 96,
                'language' => 'zh',
                'string' => 'Server Management',
                'output' => '服务器管理',
                'sign' => 'language_zh_dbe2f531b708e04461a8223e6d2ab65c',
                'created_at' => '2021-12-04 14:53:41',
                'updated_at' => '2021-12-04 14:53:41',
            ),
            96 => 
            array (
                'id' => 97,
                'language' => 'zh',
                'string' => 'All Servers',
                'output' => '所有服务器',
                'sign' => 'language_zh_caeea2a98d3e5e3f2ea69919a2d4f672',
                'created_at' => '2021-12-04 14:59:43',
                'updated_at' => '2021-12-04 14:59:43',
            ),
            97 => 
            array (
                'id' => 98,
                'language' => 'zh',
                'string' => 'Create Server',
                'output' => '创建服务器',
                'sign' => 'language_zh_6ce3eac1fd1b4d48b4027e0ee08c96ed',
                'created_at' => '2021-12-04 14:59:45',
                'updated_at' => '2021-12-04 14:59:45',
            ),
            98 => 
            array (
                'id' => 99,
                'language' => 'zh',
                'string' => 'Browser Servers',
                'output' => '浏览器服务器',
                'sign' => 'language_zh_4eeafa1dc8aa458054819f34d384d2dd',
                'created_at' => '2021-12-04 14:59:47',
                'updated_at' => '2021-12-04 14:59:47',
            ),
            99 => 
            array (
                'id' => 100,
                'language' => 'zh',
                'string' => 'Browse Servers',
                'output' => '浏览服务器',
                'sign' => 'language_zh_4ade44d8b0ce8d0003609a09e6f7204a',
                'created_at' => '2021-12-04 15:00:01',
                'updated_at' => '2021-12-04 15:00:01',
            ),
            100 => 
            array (
                'id' => 101,
                'language' => 'zh',
                'string' => 'Panel Accounts',
                'output' => '面板账号',
                'sign' => 'language_zh_d3b2855462eb4812e21eefedc5072fa6',
                'created_at' => '2021-12-05 02:32:59',
                'updated_at' => '2021-12-05 02:32:59',
            ),
            101 => 
            array (
                'id' => 102,
                'language' => 'zh',
                'string' => 'Your account has been logged out.',
                'output' => '您的帐户已注销。',
                'sign' => 'language_zh_dd5ca398ae18d828101d8843e1bcf80f',
                'created_at' => '2021-12-05 03:07:10',
                'updated_at' => '2021-12-05 03:07:10',
            ),
            102 => 
            array (
                'id' => 103,
                'language' => 'zh',
                'string' => 'New Location',
                'output' => '新位置',
                'sign' => 'language_zh_a1f64b88ccb1007db877708bc842a3ab',
                'created_at' => '2021-12-06 03:02:15',
                'updated_at' => '2021-12-06 03:02:15',
            ),
            103 => 
            array (
                'id' => 104,
                'language' => 'zh',
                'string' => 'Description',
                'output' => '描述',
                'sign' => 'language_zh_b5a7adde1af5c87d7fd797b6245c2a39',
                'created_at' => '2021-12-06 03:02:16',
                'updated_at' => '2021-12-06 03:02:16',
            ),
            104 => 
            array (
                'id' => 105,
                'language' => 'zh',
                'string' => 'Name',
                'output' => '名称',
                'sign' => 'language_zh_49ee3087348e8d44e1feda1917443987',
                'created_at' => '2021-12-06 03:02:19',
                'updated_at' => '2021-12-06 03:02:19',
            ),
            105 => 
            array (
                'id' => 106,
                'language' => 'zh',
                'string' => 'Queue',
                'output' => '队列',
                'sign' => 'language_zh_722ad2d05ecf4868b00c5484b82fd808',
                'created_at' => '2021-12-06 05:24:43',
                'updated_at' => '2021-12-06 05:24:43',
            ),
            106 => 
            array (
                'id' => 107,
                'language' => 'zh',
                'string' => 'Please wait for process.',
                'output' => '请等待处理。',
                'sign' => 'language_zh_a941a5e1c4dc91d864904bb754665dd1',
                'created_at' => '2021-12-06 06:42:07',
                'updated_at' => '2021-12-06 06:42:07',
            ),
            107 => 
            array (
                'id' => 108,
                'language' => 'zh',
                'string' => 'Creating',
                'output' => '创建',
                'sign' => 'language_zh_a6fff580feaafda7ffe5c5d61e0ab6a7',
                'created_at' => '2021-12-06 06:43:18',
                'updated_at' => '2021-12-06 06:43:18',
            ),
            108 => 
            array (
                'id' => 109,
                'language' => 'zh',
                'string' => 'Deleting location...',
                'output' => '正在删除位置。。。',
                'sign' => 'language_zh_15ab04e3772bc5a08a7c2af866afda0c',
                'created_at' => '2021-12-06 08:18:03',
                'updated_at' => '2021-12-06 08:18:03',
            ),
            109 => 
            array (
                'id' => 110,
                'language' => 'zh',
                'string' => 'Deleting location',
                'output' => '删除位置',
                'sign' => 'language_zh_c97c973bcfb3644b012f70cd34ebfeab',
                'created_at' => '2021-12-06 09:00:05',
                'updated_at' => '2021-12-06 09:00:05',
            ),
            110 => 
            array (
                'id' => 111,
                'language' => 'zh',
                'string' => 'You can leave this page',
                'output' => '你可以离开这一页',
                'sign' => 'language_zh_466e137bdf1baf453fa4d958fc51baaa',
                'created_at' => '2021-12-06 09:00:10',
                'updated_at' => '2021-12-06 09:00:10',
            ),
            111 => 
            array (
                'id' => 112,
                'language' => 'zh',
                'string' => 'You can leave this page.',
                'output' => '你可以离开这一页。',
                'sign' => 'language_zh_13335ba3c2a900aa843d1b73ef8dea58',
                'created_at' => '2021-12-06 09:00:42',
                'updated_at' => '2021-12-06 09:00:42',
            ),
            112 => 
            array (
                'id' => 113,
                'language' => 'zh',
                'string' => 'New Node',
                'output' => '新节点',
                'sign' => 'language_zh_5dcc789309178a5fe7a67f14cbd732e1',
                'created_at' => '2021-12-07 04:16:45',
                'updated_at' => '2021-12-07 04:16:45',
            ),
            113 => 
            array (
                'id' => 114,
                'language' => 'zh',
                'string' => 'Node Name',
                'output' => '节点名',
                'sign' => 'language_zh_b42e7e9f43276548d600d26ad21cd252',
                'created_at' => '2021-12-07 04:51:38',
                'updated_at' => '2021-12-07 04:51:38',
            ),
            114 => 
            array (
                'id' => 115,
                'language' => 'zh',
                'string' => 'Your node need a name.',
                'output' => '您的节点需要一个名称。',
                'sign' => 'language_zh_99d26fb7b8de403e736aef0c9a81dddf',
                'created_at' => '2021-12-07 04:52:40',
                'updated_at' => '2021-12-07 04:52:40',
            ),
            115 => 
            array (
                'id' => 116,
                'language' => 'zh',
                'string' => 'Where is your new node?',
                'output' => '你的新节点在哪里？',
                'sign' => 'language_zh_817cf40ce9b42a39cbeedef5e557b74e',
                'created_at' => '2021-12-07 04:54:01',
                'updated_at' => '2021-12-07 04:54:01',
            ),
            116 => 
            array (
                'id' => 117,
                'language' => 'zh',
                'string' => 'Node Visibility',
                'output' => '节点可见性',
                'sign' => 'language_zh_bf645a57a9a48a29ee602b543065ccc0',
                'created_at' => '2021-12-07 04:56:21',
                'updated_at' => '2021-12-07 04:56:21',
            ),
            117 => 
            array (
                'id' => 118,
                'language' => 'zh',
                'string' => 'If checked, the node will be visible.',
                'output' => '如果选中，该节点将可见。',
                'sign' => 'language_zh_1b7d6f5c1dfb75210d1c2ba6e5e6d567',
                'created_at' => '2021-12-07 04:57:17',
                'updated_at' => '2021-12-07 04:57:17',
            ),
            118 => 
            array (
                'id' => 119,
                'language' => 'zh',
                'string' => 'FQDN',
                'output' => 'FQDN',
                'sign' => 'language_zh_d36eca5e0bf1dfff485d4978d6d506b6',
                'created_at' => '2021-12-07 04:57:43',
                'updated_at' => '2021-12-07 04:57:43',
            ),
            119 => 
            array (
                'id' => 120,
                'language' => 'zh',
                'string' => '
Please enter domain name (e.g node.example.com) to be used for connecting to the daemon.',
                'output' => '请输入用于连接到守护进程的域名（例如node.example.com）。',
                'sign' => 'language_zh_76bad0b021b78e6584a88eabcb14b8d3',
                'created_at' => '2021-12-07 04:58:00',
                'updated_at' => '2021-12-07 04:58:00',
            ),
            120 => 
            array (
                'id' => 121,
                'language' => 'zh',
            'string' => 'Please enter domain name (e.g node.example.com) to be used for connecting to the daemon.',
                'output' => '请输入用于连接到守护进程的域名（例如node.example.com）。',
                'sign' => 'language_zh_be541e824e71faa213b9f69cd20dd277',
                'created_at' => '2021-12-07 05:00:31',
                'updated_at' => '2021-12-07 05:00:31',
            ),
            121 => 
            array (
                'id' => 122,
                'language' => 'zh',
                'string' => 'Behind Proxy',
                'output' => '背后的代理',
                'sign' => 'language_zh_ca5f3d7e75fd2107d51b5ea64bab9988',
                'created_at' => '2021-12-07 05:00:34',
                'updated_at' => '2021-12-07 05:00:34',
            ),
            122 => 
            array (
                'id' => 123,
                'language' => 'zh',
                'string' => 'If you are running the daemon behind a proxy such as Cloudflare, checked this to have the daemon skip looking for certificates on boot.',
                'output' => '如果您在代理（如Cloudflare）后面运行守护程序，请选中此选项，使守护程序在启动时跳过寻找证书。',
                'sign' => 'language_zh_5a4022c002a6beffc666713e23a29f2d',
                'created_at' => '2021-12-07 05:00:36',
                'updated_at' => '2021-12-07 05:00:36',
            ),
            123 => 
            array (
                'id' => 124,
                'language' => 'zh',
                'string' => 'Behind Proxy?',
                'output' => '背后的代理？',
                'sign' => 'language_zh_720307a2d13d2f57f288d7e3d6ce14bb',
                'created_at' => '2021-12-07 05:00:45',
                'updated_at' => '2021-12-07 05:00:45',
            ),
            124 => 
            array (
                'id' => 125,
                'language' => 'zh',
                'string' => 'Basic Details',
                'output' => '基本细节',
                'sign' => 'language_zh_04c6c8975207e4dedc7aac89404b5602',
                'created_at' => '2021-12-07 05:02:47',
                'updated_at' => '2021-12-07 05:02:47',
            ),
            125 => 
            array (
                'id' => 126,
                'language' => 'zh',
                'string' => 'Configuration',
                'output' => '配置',
                'sign' => 'language_zh_254f642527b45bc260048e30704edb39',
                'created_at' => '2021-12-07 05:03:02',
                'updated_at' => '2021-12-07 05:03:02',
            ),
            126 => 
            array (
                'id' => 127,
                'language' => 'zh',
                'string' => 'Daemon Server File Directory',
                'output' => '守护进程服务器文件目录',
                'sign' => 'language_zh_4cea7336a5d8c737e57869c4f79b3da5',
                'created_at' => '2021-12-07 06:12:41',
                'updated_at' => '2021-12-07 06:12:41',
            ),
            127 => 
            array (
                'id' => 128,
                'language' => 'zh',
                'string' => 'If you dont know, please dont change this.',
                'output' => '如果你不知道，请不要改变这个。',
                'sign' => 'language_zh_3e672710a728ffcf252aec4996f3f46d',
                'created_at' => '2021-12-07 06:12:44',
                'updated_at' => '2021-12-07 06:12:44',
            ),
            128 => 
            array (
                'id' => 129,
                'language' => 'zh',
                'string' => 'Total Memory',
                'output' => '总内存',
                'sign' => 'language_zh_afd0162eeb8c640994bfbf9da53c8ce6',
                'created_at' => '2021-12-07 06:13:40',
                'updated_at' => '2021-12-07 06:13:40',
            ),
            129 => 
            array (
                'id' => 130,
                'language' => 'zh',
                'string' => 'Unit: MB',
                'output' => '单位：MB',
                'sign' => 'language_zh_36517404aa459c33315cf738b720ab37',
                'created_at' => '2021-12-07 06:14:04',
                'updated_at' => '2021-12-07 06:14:04',
            ),
            130 => 
            array (
                'id' => 131,
                'language' => 'zh',
                'string' => 'Enter the directory where server files should be stored. If you use OVH you should check your partition scheme. You may need to use /home/daemon-data to have enough space.',
                'output' => '输入服务器文件应存储的目录。如果使用OVH，则应检查分区方案。您可能需要使用/home/daemon数据来获得足够的空间。',
                'sign' => 'language_zh_f26bc907c9ae55b7c016e092368f71ae',
                'created_at' => '2021-12-07 06:33:30',
                'updated_at' => '2021-12-07 06:33:30',
            ),
            131 => 
            array (
                'id' => 132,
                'language' => 'zh',
                'string' => 'Memory Over-Allocation',
                'output' => '内存过度分配',
                'sign' => 'language_zh_75f722fee0adf6e214ed6dd77eeb0009',
                'created_at' => '2021-12-07 06:35:39',
                'updated_at' => '2021-12-07 06:35:39',
            ),
            132 => 
            array (
                'id' => 133,
                'language' => 'zh',
                'string' => 'Enter the total amount of memory available for new servers. If you would like to allow overallocation of memory enter the percentage that you want to allow. To disable checking for overallocation enter -1 into the field. Entering 0 will prevent creating new servers if it would put the node over the limit.',
                'output' => '输入新服务器的可用内存总量。如果要允许内存过度分配，请输入要允许的百分比。要禁用对超额分配的检查，请在字段中输入-1。如果输入0会使节点超出限制，则将阻止创建新服务器。',
                'sign' => 'language_zh_ddcdbef5f4f9570e9b8d8cb3eae2246b',
                'created_at' => '2021-12-07 06:37:03',
                'updated_at' => '2021-12-07 06:37:03',
            ),
            133 => 
            array (
                'id' => 134,
                'language' => 'zh',
                'string' => 'Unit: %',
                'output' => '单位：%',
                'sign' => 'language_zh_0563e5dc1bb24db7995c5aabe617f4aa',
                'created_at' => '2021-12-07 06:37:48',
                'updated_at' => '2021-12-07 06:37:48',
            ),
            134 => 
            array (
                'id' => 136,
                'language' => 'zh',
                'string' => 'Disk Over-Allocation',
                'output' => '磁盘过度分配',
                'sign' => 'language_zh_fab26663a03e53e3691f7d4d7b90968f',
                'created_at' => '2021-12-07 06:40:29',
                'updated_at' => '2021-12-07 06:40:29',
            ),
            135 => 
            array (
                'id' => 137,
                'language' => 'zh',
                'string' => 'Total Disk Space',
                'output' => '总磁盘空间',
                'sign' => 'language_zh_94a7823f910f294c5c8b09bec1f34983',
                'created_at' => '2021-12-07 06:41:27',
                'updated_at' => '2021-12-07 06:41:27',
            ),
            136 => 
            array (
                'id' => 138,
                'language' => 'zh',
                'string' => 'Enter the total amount of disk space available for new servers. If you would like to allow overallocation of disk space enter the percentage that you want to allow. To disable checking for overallocation enter -1 into the field. Entering 0 will prevent creating new servers if it would put the node over the limit.',
                'output' => '输入可用于新服务器的磁盘空间总量。如果要允许磁盘空间过度分配，请输入要允许的百分比。要禁用对超额分配的检查，请在字段中输入-1。如果输入0会使节点超出限制，则将阻止创建新服务器。',
                'sign' => 'language_zh_87e4e9b99d64711bb243a33f72521f08',
                'created_at' => '2021-12-07 06:42:05',
                'updated_at' => '2021-12-07 06:42:05',
            ),
            137 => 
            array (
                'id' => 139,
                'language' => 'zh',
                'string' => 'Daemon Port',
                'output' => '守护程序端口',
                'sign' => 'language_zh_62ec40f7ff5f4bbef25827bd2390dec2',
                'created_at' => '2021-12-07 06:44:43',
                'updated_at' => '2021-12-07 06:44:43',
            ),
            138 => 
            array (
                'id' => 140,
                'language' => 'zh',
                'string' => 'Daemon SFTP Port',
                'output' => '守护进程SFTP端口',
                'sign' => 'language_zh_296ca36a1ae01e7c892026057ccaa457',
                'created_at' => '2021-12-07 06:44:46',
                'updated_at' => '2021-12-07 06:44:46',
            ),
            139 => 
            array (
                'id' => 141,
                'language' => 'zh',
                'string' => 'The daemon runs its own SFTP management container and does not use the SSHd process on the main physical server. Do not use the same port that you have assigned for your physical server\'s SSH process. If you will be running the daemon behind CloudFlare® you should set the daemon port to 8443 to allow websocket proxying over SSL.',
                'output' => '守护进程运行自己的SFTP管理容器，不在主物理服务器上使用SSHd进程。不要使用为物理服务器的SSH进程分配的相同端口。如果要在CloudFlare®后面运行守护程序，则应将守护程序端口设置为8443，以允许websocket通过SSL代理。',
                'sign' => 'language_zh_186165161287ccbf3304e91acb06768b',
                'created_at' => '2021-12-07 06:44:49',
                'updated_at' => '2021-12-07 06:44:49',
            ),
            140 => 
            array (
                'id' => 142,
                'language' => 'zh',
                'string' => 'Create Node',
                'output' => '创建节点',
                'sign' => 'language_zh_a8c0815bac7d0d7e2b7eca4fe9a10676',
                'created_at' => '2021-12-07 06:47:01',
                'updated_at' => '2021-12-07 06:47:01',
            ),
            141 => 
            array (
                'id' => 143,
                'language' => 'zh',
                'string' => 'You are offline !',
                'output' => '你离线了！',
                'sign' => 'language_zh_3994fa254c553f28ceb0f1b04f764b61',
                'created_at' => '2021-12-07 07:42:05',
                'updated_at' => '2021-12-07 07:42:05',
            ),
            142 => 
            array (
                'id' => 144,
                'language' => 'zh',
                'string' => 'can not run if you are offline.',
                'output' => '脱机时无法运行。',
                'sign' => 'language_zh_9bc23404ed4002fde1691b830daa0110',
                'created_at' => '2021-12-07 07:43:44',
                'updated_at' => '2021-12-07 07:43:44',
            ),
            143 => 
            array (
                'id' => 145,
                'language' => 'zh',
                'string' => 'Waiting for network',
                'output' => '等待网络',
                'sign' => 'language_zh_1ed19dfe60604b6a4b6433804d61758e',
                'created_at' => '2021-12-07 07:56:35',
                'updated_at' => '2021-12-07 07:56:35',
            ),
            144 => 
            array (
                'id' => 146,
                'language' => 'zh',
                'string' => 'Location does not exist.',
                'output' => '位置不存在。',
                'sign' => 'language_zh_bcc4809d41c39ee2829de96068b1b3b4',
                'created_at' => '2021-12-07 08:10:36',
                'updated_at' => '2021-12-07 08:10:36',
            ),
            145 => 
            array (
                'id' => 147,
                'language' => 'zh',
                'string' => 'Maximum Web Upload Filesize',
                'output' => '最大Web上载文件大小',
                'sign' => 'language_zh_5d137c621542a51c641f361fc553bd0a',
                'created_at' => '2021-12-07 11:01:32',
                'updated_at' => '2021-12-07 11:01:32',
            ),
            146 => 
            array (
                'id' => 148,
                'language' => 'zh',
                'string' => 'Disk space allocated',
                'output' => '已分配的磁盘空间',
                'sign' => 'language_zh_254d95c9ff7e8a9395d2e985d20ff806',
                'created_at' => '2021-12-07 12:14:52',
                'updated_at' => '2021-12-07 12:14:52',
            ),
            147 => 
            array (
                'id' => 149,
                'language' => 'zh',
                'string' => 'Memory allocated',
                'output' => '内存分配',
                'sign' => 'language_zh_4778ad9ad7c5835c9843b96bc317140b',
                'created_at' => '2021-12-07 12:14:54',
                'updated_at' => '2021-12-07 12:14:54',
            ),
            148 => 
            array (
                'id' => 150,
                'language' => 'zh',
                'string' => 'Access team',
                'output' => '访问团队',
                'sign' => 'language_zh_4d6e58f74834670015cfdf9df12588b3',
                'created_at' => '2021-12-07 14:37:41',
                'updated_at' => '2021-12-07 14:37:41',
            ),
            149 => 
            array (
                'id' => 151,
                'language' => 'zh',
                'string' => 'Edit node data',
                'output' => '编辑节点数据',
                'sign' => 'language_zh_1bf0deaf24fcc97a2466968e9936682d',
                'created_at' => '2021-12-07 14:38:51',
                'updated_at' => '2021-12-07 14:38:51',
            ),
            150 => 
            array (
                'id' => 152,
                'language' => 'zh',
                'string' => 'pending',
                'output' => '挂起',
                'sign' => 'language_zh_7c6c2e5d48ab37a007cbf70d3ea25fa4',
                'created_at' => '2021-12-07 23:21:44',
                'updated_at' => '2021-12-07 23:21:44',
            ),
            151 => 
            array (
                'id' => 153,
                'language' => 'zh',
                'string' => 'wait to refresh',
                'output' => '等待刷新',
                'sign' => 'language_zh_cd53ed6ebe68aa0f2e6c31381162eca8',
                'created_at' => '2021-12-07 23:22:09',
                'updated_at' => '2021-12-07 23:22:09',
            ),
            152 => 
            array (
                'id' => 154,
                'language' => 'zh',
                'string' => 'Edit Node',
                'output' => '编辑节点',
                'sign' => 'language_zh_ce481f9edcceb01d07fead53a3a51515',
                'created_at' => '2021-12-08 01:49:01',
                'updated_at' => '2021-12-08 01:49:01',
            ),
            153 => 
            array (
                'id' => 155,
                'language' => 'zh',
                'string' => 'Update Node',
                'output' => '更新节点',
                'sign' => 'language_zh_7c8a48fcee5f9f51ccd405a7d3febe7c',
                'created_at' => '2021-12-08 01:52:29',
                'updated_at' => '2021-12-08 01:52:29',
            ),
            154 => 
            array (
                'id' => 156,
                'language' => 'zh',
                'string' => 'Reset Daemon Master Key',
                'output' => '重置守护进程主密钥',
                'sign' => 'language_zh_d1b8861f2c6dd5605b9baad8b405e3c0',
                'created_at' => '2021-12-08 01:55:39',
                'updated_at' => '2021-12-08 01:55:39',
            ),
            155 => 
            array (
                'id' => 157,
                'language' => 'zh',
                'string' => 'Check to reset secret',
                'output' => '勾选以重置密钥',
                'sign' => 'language_zh_6761536ee89013af1afeaf4bb0d22586',
                'created_at' => '2021-12-08 01:56:18',
                'updated_at' => '2021-12-08 01:56:18',
            ),
            156 => 
            array (
                'id' => 158,
                'language' => 'zh',
                'string' => 'Checked to reset secret',
                'output' => '勾选以重置密钥',
                'sign' => 'language_zh_d805aac275790c707609b77c2d4b632b',
                'created_at' => '2021-12-08 01:56:33',
                'updated_at' => '2021-12-08 01:56:33',
            ),
            157 => 
            array (
                'id' => 159,
                'language' => 'zh',
                'string' => 'Node Info',
                'output' => '节点信息',
                'sign' => 'language_zh_3119fca100096625bf31b504a305f5ac',
                'created_at' => '2021-12-08 03:26:14',
                'updated_at' => '2021-12-08 03:26:14',
            ),
            158 => 
            array (
                'id' => 160,
                'language' => 'zh',
                'string' => '切换锁定',
                'output' => '切换锁定',
                'sign' => 'language_zh_a908108db6f8759dae5bae5dd6d07f38',
                'created_at' => '2021-12-08 03:29:54',
                'updated_at' => '2021-12-08 03:29:54',
            ),
            159 => 
            array (
                'id' => 161,
                'language' => 'zh',
                'string' => 'Maintenance Mode',
                'output' => '维护模式',
                'sign' => 'language_zh_295c54be6a83de7aa3b31efc81ad2604',
                'created_at' => '2021-12-08 04:45:12',
                'updated_at' => '2021-12-08 04:45:12',
            ),
            160 => 
            array (
                'id' => 162,
                'language' => 'zh',
                'string' => 'If the node is marked as \'Under Maintenance\' users won\'t be able to access servers that are on this node.',
                'output' => '如果节点标记为“正在维护”，则用户将无法访问此节点上的服务器。',
                'sign' => 'language_zh_833555003bbf7dad4f342b262a22a780',
                'created_at' => '2021-12-08 04:45:19',
                'updated_at' => '2021-12-08 04:45:19',
            ),
            161 => 
            array (
                'id' => 163,
                'language' => 'zh',
                'string' => 'Node Configuration',
                'output' => '节点配置',
                'sign' => 'language_zh_fd7403e95eeb36aa9f5d1a8a78e5b107',
                'created_at' => '2021-12-08 04:57:48',
                'updated_at' => '2021-12-08 04:57:48',
            ),
            162 => 
            array (
                'id' => 164,
                'language' => 'zh',
                'string' => 'Configuration File',
                'output' => '配置文件',
                'sign' => 'language_zh_85c7e8fde73fc8d874286b5edd8cf793',
                'created_at' => '2021-12-08 05:02:20',
                'updated_at' => '2021-12-08 05:02:20',
            ),
            163 => 
            array (
                'id' => 165,
                'language' => 'zh',
            'string' => 'This file should be placed in your daemon\'s root directory (usually /etc/pterodactyl) in a file called config.yml.',
                'output' => '这个文件应该放在守护进程的根目录（通常是/etc/pterodactyl）中的config.yml文件中。',
                'sign' => 'language_zh_9c91f8c2467b2dce732ce09957ce9042',
                'created_at' => '2021-12-08 05:02:24',
                'updated_at' => '2021-12-08 05:02:24',
            ),
            164 => 
            array (
                'id' => 166,
                'language' => 'zh',
                'string' => 'Delete Node',
                'output' => '删除节点',
                'sign' => 'language_zh_96d3b86c25b21836268c2bc5a6731b70',
                'created_at' => '2021-12-08 07:21:55',
                'updated_at' => '2021-12-08 07:21:55',
            ),
            165 => 
            array (
                'id' => 167,
                'language' => 'zh',
                'string' => 'New User',
                'output' => '新用户',
                'sign' => 'language_zh_19a093af0cee2a1d0f8bb6ac14d79843',
                'created_at' => '2021-12-08 11:51:23',
                'updated_at' => '2021-12-08 11:51:23',
            ),
            166 => 
            array (
                'id' => 168,
                'language' => 'zh',
                'string' => 'Email',
                'output' => '电子邮件',
                'sign' => 'language_zh_ce8ae9da5b7cd6c3df2929543a9af92d',
                'created_at' => '2021-12-08 11:53:02',
                'updated_at' => '2021-12-08 11:53:02',
            ),
            167 => 
            array (
                'id' => 169,
                'language' => 'zh',
                'string' => 'Accounts',
                'output' => '账户',
                'sign' => 'language_zh_9b945efebb006547a94415eadaa12921',
                'created_at' => '2021-12-08 11:53:23',
                'updated_at' => '2021-12-08 11:53:23',
            ),
            168 => 
            array (
                'id' => 170,
                'language' => 'zh',
                'string' => 'New Account',
                'output' => '新帐户',
                'sign' => 'language_zh_254d94c90482938c3d54e3e26e7db8ba',
                'created_at' => '2021-12-08 11:53:26',
                'updated_at' => '2021-12-08 11:53:26',
            ),
            169 => 
            array (
                'id' => 171,
                'language' => 'zh',
                'string' => 'Username',
                'output' => '用户名',
                'sign' => 'language_zh_f6039d44b29456b20f8f373155ae4973',
                'created_at' => '2021-12-08 11:53:28',
                'updated_at' => '2021-12-08 11:53:28',
            ),
            170 => 
            array (
                'id' => 172,
                'language' => 'zh',
                'string' => 'Username should be unique.',
                'output' => '用户名应该是唯一的。',
                'sign' => 'language_zh_5a471f238f492388e6c1a0637540c5fa',
                'created_at' => '2021-12-08 11:55:34',
                'updated_at' => '2021-12-08 11:55:34',
            ),
            171 => 
            array (
                'id' => 173,
                'language' => 'zh',
                'string' => 'First Name',
                'output' => '名字',
                'sign' => 'language_zh_bc910f8bdf70f29374f496f05be0330c',
                'created_at' => '2021-12-08 11:55:35',
                'updated_at' => '2021-12-08 11:55:35',
            ),
            172 => 
            array (
                'id' => 174,
                'language' => 'zh',
                'string' => 'Email should be unique.',
                'output' => '电子邮件应该是唯一的。',
                'sign' => 'language_zh_a2ed0d7a2390c0b821d44f3d79fede8a',
                'created_at' => '2021-12-08 11:55:38',
                'updated_at' => '2021-12-08 11:55:38',
            ),
            173 => 
            array (
                'id' => 175,
                'language' => 'zh',
                'string' => 'Last Name',
                'output' => '姓',
                'sign' => 'language_zh_77587239bf4c54ea493c7033e1dbf636',
                'created_at' => '2021-12-08 11:55:40',
                'updated_at' => '2021-12-08 11:55:40',
            ),
            174 => 
            array (
                'id' => 176,
                'language' => 'zh',
                'string' => 'Create',
                'output' => '创建',
                'sign' => 'language_zh_686e697538050e4664636337cc3b834f',
                'created_at' => '2021-12-08 11:56:27',
                'updated_at' => '2021-12-08 11:56:27',
            ),
            175 => 
            array (
                'id' => 177,
                'language' => 'zh',
                'string' => 'Password',
                'output' => '密码',
                'sign' => 'language_zh_dc647eb65e6711e155375218212b3964',
                'created_at' => '2021-12-08 12:01:18',
                'updated_at' => '2021-12-08 12:01:18',
            ),
            176 => 
            array (
                'id' => 178,
                'language' => 'zh',
                'string' => 'Save',
                'output' => '保存',
                'sign' => 'language_zh_c9cc8cce247e49bae79f15173ce97354',
                'created_at' => '2021-12-09 00:45:03',
                'updated_at' => '2021-12-09 00:45:03',
            ),
            177 => 
            array (
                'id' => 179,
                'language' => 'zh',
                'string' => 'Enter password if you want to change it.',
                'output' => '如果要更改密码，请输入密码。',
                'sign' => 'language_zh_c7b8524f7f484b21453f5a04007ccdd4',
                'created_at' => '2021-12-09 00:54:58',
                'updated_at' => '2021-12-09 00:54:58',
            ),
            178 => 
            array (
                'id' => 180,
                'language' => 'zh',
                'string' => 'Enter new password if you want to change it.',
                'output' => '如果要更改密码，请输入新密码。',
                'sign' => 'language_zh_7f050d7456fb03b3f1d99e5f2b95d602',
                'created_at' => '2021-12-09 00:55:06',
                'updated_at' => '2021-12-09 00:55:06',
            ),
            179 => 
            array (
                'id' => 181,
                'language' => 'zh',
                'string' => 'Lock/Unlock',
                'output' => '锁定/解锁',
                'sign' => 'language_zh_3295f0c71920d2f15bdf8aeb1da0cca3',
                'created_at' => '2021-12-09 02:46:15',
                'updated_at' => '2021-12-09 02:46:15',
            ),
            180 => 
            array (
                'id' => 182,
                'language' => 'zh',
                'string' => 'Eggs',
                'output' => 'Eggs',
                'sign' => 'language_zh_9890f06976131702b942e59eda2f750a',
                'created_at' => '2021-12-09 16:04:30',
                'updated_at' => '2021-12-09 16:04:30',
            ),
            181 => 
            array (
                'id' => 183,
                'language' => 'zh',
                'string' => 'Egg unavailable.',
                'output' => 'Egg 不可用。',
                'sign' => 'language_zh_7eab3832d0d215c11078b849b1e87d74',
                'created_at' => '2021-12-09 16:51:55',
                'updated_at' => '2021-12-09 16:51:55',
            ),
            182 => 
            array (
                'id' => 184,
                'language' => 'zh',
                'string' => 'For a long time, Minecraft server owners have had a dream that encompasses a free, easy, and reliable way to connect multiple Minecraft servers together. BungeeCord is the answer to said dream. Whether you are a small server wishing to string multiple game-modes together, or the owner of the ShotBow Network, BungeeCord is the ideal solution for you. With the help of BungeeCord, you will be able to unlock your community\'s full potential.',
                'output' => '很长一段时间以来，Minecraft服务器所有者一直有一个梦想，那就是用一种免费、简单、可靠的方式将多台Minecraft服务器连接在一起。蹦极绳是上述梦的答案。无论您是希望将多种游戏模式串联在一起的小型服务器，还是ShotBow网络的所有者，BungeeCord都是您的理想解决方案。在蹦极绳的帮助下，您将能够充分发挥社区的潜力。',
                'sign' => 'language_zh_867044134a33f5fee158c677a9586b3d',
                'created_at' => '2021-12-09 16:52:45',
                'updated_at' => '2021-12-09 16:52:45',
            ),
            183 => 
            array (
                'id' => 185,
                'language' => 'zh',
                'string' => 'This egg is temporarily unavailable.',
                'output' => '这个 Egg 暂时不可用。',
                'sign' => 'language_zh_c8e56fc90eecf1c743ca33eca1b8d176',
                'created_at' => '2021-12-09 16:56:11',
                'updated_at' => '2021-12-09 16:56:11',
            ),
            184 => 
            array (
                'id' => 186,
                'language' => 'zh',
            'string' => 'Minecraft Forge Server. Minecraft Forge is a modding API (Application Programming Interface), which makes it easier to create mods, and also make sure mods are compatible with each other.',
                'output' => 'Minecraft Forge服务器。Minecraft Forge是一个modding API（应用程序编程接口），它使创建mod变得更容易，也确保mod彼此兼容。',
                'sign' => 'language_zh_6da4f47f1efedaeaece78bf2d7307361',
                'created_at' => '2021-12-09 16:56:45',
                'updated_at' => '2021-12-09 16:56:45',
            ),
            185 => 
            array (
                'id' => 187,
                'language' => 'zh',
                'string' => 'High performance Spigot fork that aims to fix gameplay and mechanics inconsistencies.',
                'output' => '高性能插口叉，旨在解决游戏性和机械不一致的问题。',
                'sign' => 'language_zh_2d759b7774199d631c872add93eb0c9d',
                'created_at' => '2021-12-09 16:56:48',
                'updated_at' => '2021-12-09 16:56:48',
            ),
            186 => 
            array (
                'id' => 188,
                'language' => 'zh',
                'string' => 'SpongeVanilla is the SpongeAPI implementation for Vanilla Minecraft.',
                'output' => 'SpongeVanilla是Vanilla Minecraft的SpongeAPI实现。',
                'sign' => 'language_zh_967eef34277474949a41fcea725e4539',
                'created_at' => '2021-12-09 16:56:50',
                'updated_at' => '2021-12-09 16:56:50',
            ),
            187 => 
            array (
                'id' => 189,
                'language' => 'zh',
                'string' => 'Minecraft is a game about placing blocks and going on adventures. Explore randomly generated worlds and build amazing things from the simplest of homes to the grandest of castles. Play in Creative Mode with unlimited resources or mine deep in Survival Mode, crafting weapons and armor to fend off dangerous mobs. Do all this alone or with friends.',
                'output' => 'Minecraft是一款关于放置积木和冒险的游戏。探索随机生成的世界，从最简单的家到最宏伟的城堡，建造令人惊叹的东西。使用无限资源在创造性模式下游戏，或者在生存模式下深挖地雷，制造武器和盔甲来抵御危险的暴徒。独自或与朋友一起做这一切。',
                'sign' => 'language_zh_afd723e495178c1f2eacd3df0890581c',
                'created_at' => '2021-12-09 16:56:52',
                'updated_at' => '2021-12-09 16:56:52',
            ),
            188 => 
            array (
                'id' => 190,
                'language' => 'zh',
                'string' => 'Mumble is an open source, low-latency, high quality voice chat software primarily intended for use while gaming.',
                'output' => 'Mumble是一款开源、低延迟、高质量的语音聊天软件，主要用于玩游戏。',
                'sign' => 'language_zh_b0208c0bcbb53fc38b8e99056c914ea9',
                'created_at' => '2021-12-10 21:21:52',
                'updated_at' => '2021-12-10 21:21:52',
            ),
            189 => 
            array (
                'id' => 191,
                'language' => 'zh',
                'string' => 'VoIP software designed with security in mind, featuring crystal clear voice quality, endless customization options, and scalabilty up to thousands of simultaneous users.',
                'output' => 'VoIP软件的设计考虑到了安全性，具有清晰的语音质量、无休止的定制选项和可扩展性，可同时容纳数千名用户。',
                'sign' => 'language_zh_ea7d803be1dd3fb3535940acdf780899',
                'created_at' => '2021-12-10 21:21:52',
                'updated_at' => '2021-12-10 21:21:52',
            ),
            190 => 
            array (
                'id' => 192,
                'language' => 'zh',
                'string' => 'Server Version',
                'output' => '服务器版本',
                'sign' => 'language_zh_4b2bc079be74adb23d9e72a04c0c69f2',
                'created_at' => '2021-12-10 21:21:54',
                'updated_at' => '2021-12-10 21:21:54',
            ),
            191 => 
            array (
                'id' => 193,
                'language' => 'zh',
                'string' => 'The Teamspeak file transfer port',
                'output' => 'Teamspeak文件传输端口',
                'sign' => 'language_zh_5fbc2ad938f1ca12abaf90c5f623bc92',
                'created_at' => '2021-12-10 21:21:55',
                'updated_at' => '2021-12-10 21:21:55',
            ),
            192 => 
            array (
                'id' => 194,
                'language' => 'zh',
                'string' => 'Query Port',
                'output' => '查询端口',
                'sign' => 'language_zh_76edc629d864cdf7a18de3d820cd6c0c',
                'created_at' => '2021-12-10 21:21:56',
                'updated_at' => '2021-12-10 21:21:56',
            ),
            193 => 
            array (
                'id' => 195,
                'language' => 'zh',
                'string' => 'Server Jar File',
                'output' => '服务器Jar文件',
                'sign' => 'language_zh_4475728b71f97a99bc18808e8639daf0',
                'created_at' => '2021-12-10 21:24:49',
                'updated_at' => '2021-12-10 21:24:49',
            ),
            194 => 
            array (
                'id' => 196,
                'language' => 'zh',
                'string' => 'Minecraft Version',
                'output' => 'Minecraft 版本',
                'sign' => 'language_zh_b04a34ed97fd40bc65eb693cb9f51e1c',
                'created_at' => '2021-12-10 21:24:50',
                'updated_at' => '2021-12-10 21:24:50',
            ),
            195 => 
            array (
                'id' => 197,
                'language' => 'zh',
                'string' => 'Build Type',
                'output' => '构建类型',
                'sign' => 'language_zh_bb1daa12070bd7c99d5a64effd9c8bbe',
                'created_at' => '2021-12-10 21:24:51',
                'updated_at' => '2021-12-10 21:24:51',
            ),
            196 => 
            array (
                'id' => 198,
                'language' => 'zh',
                'string' => 'The name of the Jarfile to use when running Forge version below 1.17.',
                'output' => '运行低于1.17的Forge版本时要使用的JAR文件的名称。',
                'sign' => 'language_zh_55e09743542a1287f393ab7e0567d67d',
                'created_at' => '2021-12-10 21:26:11',
                'updated_at' => '2021-12-10 21:26:11',
            ),
            197 => 
            array (
                'id' => 199,
                'language' => 'zh',
                'string' => 'Forge Version',
                'output' => 'Forge 版本',
                'sign' => 'language_zh_5184db10bc59f79c30a9626bcff5c2c6',
                'created_at' => '2021-12-10 21:26:12',
                'updated_at' => '2021-12-10 21:26:12',
            ),
            198 => 
            array (
                'id' => 200,
                'language' => 'zh',
                'string' => 'Services',
                'output' => '服务',
                'sign' => 'language_zh_992a0f0542384f1ee5ef51b7cf4ae6c4',
                'created_at' => '2021-12-11 18:56:29',
                'updated_at' => '2021-12-11 18:56:29',
            ),
            199 => 
            array (
                'id' => 201,
                'language' => 'zh',
                'string' => '我的世界',
                'output' => 'Minecraft',
                'sign' => 'language_zh_575d0689b7dbbc83301b774b07d337ed',
                'created_at' => '2021-12-11 18:56:51',
                'updated_at' => '2021-12-11 18:56:51',
            ),
            200 => 
            array (
                'id' => 202,
                'language' => 'zh',
                'string' => 'Rust - A game where you must fight to survive.',
                'output' => 'Rust - 一个游戏，你必须战斗生存。',
                'sign' => 'language_zh_31890b28bef1adb31278b758bf8d559b',
                'created_at' => '2021-12-11 18:56:52',
                'updated_at' => '2021-12-11 18:56:52',
            ),
            201 => 
            array (
                'id' => 203,
                'language' => 'zh',
                'string' => 'Includes support for most Source Dedicated Server games.',
                'output' => '包括对大多数源代码专用服务器游戏的支持。',
                'sign' => 'language_zh_5118591c67636c8ab7727cb7c88411ad',
                'created_at' => '2021-12-11 18:57:55',
                'updated_at' => '2021-12-11 18:57:55',
            ),
            202 => 
            array (
                'id' => 204,
                'language' => 'zh',
                'string' => 'Voice servers such as Mumble and Teamspeak 3.',
                'output' => '语音服务器，如Mumble和Teamspeak 3。',
                'sign' => 'language_zh_201b957ad4b9a6c6b206b3a20bb6a947',
                'created_at' => '2021-12-11 19:02:16',
                'updated_at' => '2021-12-11 19:02:16',
            ),
            203 => 
            array (
                'id' => 205,
                'language' => 'zh',
                'string' => 'Wings Accounts edit',
                'output' => 'Wings帐户编辑',
                'sign' => 'language_zh_04d4d3fe9d06fa32eb5ae84ee015b556',
                'created_at' => '2021-12-11 19:46:53',
                'updated_at' => '2021-12-11 19:46:53',
            ),
            204 => 
            array (
                'id' => 206,
                'language' => 'zh',
                'string' => 'Wings Servers Edit',
                'output' => 'Wings服务器编辑',
                'sign' => 'language_zh_7ad8118b49fc95ee163ecbb78db9af9c',
                'created_at' => '2021-12-11 19:46:54',
                'updated_at' => '2021-12-11 19:46:54',
            ),
            205 => 
            array (
                'id' => 207,
                'language' => 'zh',
                'string' => 'Wings Locations edit',
                'output' => '机翼位置编辑',
                'sign' => 'language_zh_8e7a5bbf07cc4375ebad8a268e0e2d87',
                'created_at' => '2021-12-11 19:47:52',
                'updated_at' => '2021-12-11 19:47:52',
            ),
            206 => 
            array (
                'id' => 208,
                'language' => 'zh',
                'string' => 'Wings Nodes edit',
                'output' => '翅膀节点编辑',
                'sign' => 'language_zh_02f5b7a481991f2a7a1051cf4b45643d',
                'created_at' => '2021-12-11 19:48:12',
                'updated_at' => '2021-12-11 19:48:12',
            ),
            207 => 
            array (
                'id' => 209,
                'language' => 'zh',
                'string' => 'Wings Nodes show config',
                'output' => 'Wings节点显示配置',
                'sign' => 'language_zh_a2a72d9d3bf9d22312060b0131108095',
                'created_at' => '2021-12-11 19:49:03',
                'updated_at' => '2021-12-11 19:49:03',
            ),
            208 => 
            array (
                'id' => 210,
                'language' => 'zh',
                'string' => 'SCP秘密实验室',
                'output' => 'SCP秘密实验室',
                'sign' => 'language_zh_cee2fee47dfadf29012755d6a5709393',
                'created_at' => '2021-12-11 20:02:45',
                'updated_at' => '2021-12-11 20:02:45',
            ),
            209 => 
            array (
                'id' => 211,
                'language' => 'zh',
                'string' => 'Online',
                'output' => '在线 的',
                'sign' => 'language_zh_54f664c70c22054ea0d8d26fc3997ce7',
                'created_at' => '2021-12-11 20:15:18',
                'updated_at' => '2021-12-11 20:15:18',
            ),
            210 => 
            array (
                'id' => 212,
                'language' => 'zh',
                'string' => 'Real IP Address',
                'output' => '真实IP地址',
                'sign' => 'language_zh_44373c3f20c7990c41f263b59f0d7e61',
                'created_at' => '2021-12-11 20:15:20',
                'updated_at' => '2021-12-11 20:15:20',
            ),
            211 => 
            array (
                'id' => 213,
                'language' => 'zh',
                'string' => 'About',
                'output' => '关于',
                'sign' => 'language_zh_8f7f4c1ce7a4f933663d10543562b096',
                'created_at' => '2021-12-11 20:15:44',
                'updated_at' => '2021-12-11 20:15:44',
            ),
            212 => 
            array (
                'id' => 214,
                'language' => 'zh',
                'string' => 'Daemon Version',
                'output' => '守护程序版本',
                'sign' => 'language_zh_08e88c65e83ca76ff421d61cf8e311a6',
                'created_at' => '2021-12-11 20:15:45',
                'updated_at' => '2021-12-11 20:15:45',
            ),
            213 => 
            array (
                'id' => 215,
                'language' => 'zh',
                'string' => 'DISK SPACE ALLOCATED',
                'output' => '已分配的磁盘空间',
                'sign' => 'language_zh_817f696241224e8842f3d63e0b8910bc',
                'created_at' => '2021-12-11 20:15:47',
                'updated_at' => '2021-12-11 20:15:47',
            ),
            214 => 
            array (
                'id' => 216,
                'language' => 'zh',
                'string' => 'This field should be security sensitive, Please use ',
                'output' => '此字段应是安全敏感的，请使用',
                'sign' => 'language_zh_dd68b0daeb6faf79b67a396c4bb9f417',
                'created_at' => '2021-12-11 20:15:48',
                'updated_at' => '2021-12-11 20:15:48',
            ),
            215 => 
            array (
                'id' => 217,
                'language' => 'zh',
                'string' => 'IP Alias',
                'output' => 'IP别名',
                'sign' => 'language_zh_2ae46d9c9f46ecda3ba25f34a30b518e',
                'created_at' => '2021-12-11 20:15:49',
                'updated_at' => '2021-12-11 20:15:49',
            ),
            216 => 
            array (
                'id' => 218,
                'language' => 'zh',
                'string' => 'Settings',
                'output' => '设置',
                'sign' => 'language_zh_f4f70727dc34561dfde1a3c529b6205c',
                'created_at' => '2021-12-11 20:18:07',
                'updated_at' => '2021-12-11 20:18:07',
            ),
            217 => 
            array (
                'id' => 219,
                'language' => 'zh',
                'string' => 'MEMORY ALLOCATED',
                'output' => '内存分配',
                'sign' => 'language_zh_e561c298ee208cd6aacc133069f087b8',
                'created_at' => '2021-12-11 20:18:08',
                'updated_at' => '2021-12-11 20:18:08',
            ),
            218 => 
            array (
                'id' => 220,
                'language' => 'zh',
                'string' => 'Existing Allocations',
                'output' => '现有分配',
                'sign' => 'language_zh_de0e84f68f073b7873e225ebb325e2cc',
                'created_at' => '2021-12-11 20:18:09',
                'updated_at' => '2021-12-11 20:18:09',
            ),
            219 => 
            array (
                'id' => 221,
                'language' => 'zh',
                'string' => 'Port',
                'output' => '端口',
                'sign' => 'language_zh_60aaf44d4b562252c04db7f98497e9aa',
                'created_at' => '2021-12-11 20:18:10',
                'updated_at' => '2021-12-11 20:18:10',
            ),
            220 => 
            array (
                'id' => 222,
                'language' => 'zh',
                'string' => 'Next page',
                'output' => '下一页',
                'sign' => 'language_zh_374bea6cf8bd1e8fd64570b629cc6562',
                'created_at' => '2021-12-11 20:18:11',
                'updated_at' => '2021-12-11 20:18:11',
            ),
            221 => 
            array (
                'id' => 223,
                'language' => 'zh',
                'string' => 'Information',
                'output' => '信息',
                'sign' => 'language_zh_a82be0f551b8708bc08eb33cd9ded0cf',
                'created_at' => '2021-12-11 20:18:31',
                'updated_at' => '2021-12-11 20:18:31',
            ),
            222 => 
            array (
                'id' => 224,
                'language' => 'zh',
                'string' => 'TOTAL SERVERS',
                'output' => '服务器总数',
                'sign' => 'language_zh_6f630e84a5d63ec9b20ca4a1a49fff38',
                'created_at' => '2021-12-11 20:18:32',
                'updated_at' => '2021-12-11 20:18:32',
            ),
            223 => 
            array (
                'id' => 225,
                'language' => 'zh',
                'string' => 'Assigned To Server',
                'output' => '分配给服务器',
                'sign' => 'language_zh_9a1f56422a5d9f3e2e181356b777d427',
                'created_at' => '2021-12-11 20:18:34',
                'updated_at' => '2021-12-11 20:18:34',
            ),
            224 => 
            array (
                'id' => 226,
                'language' => 'zh',
                'string' => 'System Information',
                'output' => '系统信息',
                'sign' => 'language_zh_79bc8ea9cb24f51bf41148643f0b4309',
                'created_at' => '2021-12-11 20:18:44',
                'updated_at' => '2021-12-11 20:18:44',
            ),
            225 => 
            array (
                'id' => 227,
                'language' => 'zh',
                'string' => 'IP Address',
                'output' => 'IP地址',
                'sign' => 'language_zh_5b8c99dad1893a85076709b2d3c2d2d0',
                'created_at' => '2021-12-11 20:18:45',
                'updated_at' => '2021-12-11 20:18:45',
            ),
            226 => 
            array (
                'id' => 228,
                'language' => 'zh',
                'string' => 'Total CPU Threads',
                'output' => 'CPU线程总数',
                'sign' => 'language_zh_0f43dcca7ecbe48715806e85850b7ef9',
                'created_at' => '2021-12-11 20:19:00',
                'updated_at' => '2021-12-11 20:19:00',
            ),
            227 => 
            array (
                'id' => 229,
                'language' => 'zh',
                'string' => 'to copy the configuration.',
                'output' => '复制配置。',
                'sign' => 'language_zh_ca7d7a52a10ea65409efb91692cbbae8',
                'created_at' => '2021-12-11 20:19:05',
                'updated_at' => '2021-12-11 20:19:05',
            ),
            228 => 
            array (
                'id' => 230,
                'language' => 'zh',
                'string' => 'Previous page',
                'output' => '上一页',
                'sign' => 'language_zh_16ded2dc32322d80ce2362a47f4d7ef4',
                'created_at' => '2021-12-11 20:19:07',
                'updated_at' => '2021-12-11 20:19:07',
            ),
            229 => 
            array (
                'id' => 231,
                'language' => 'zh',
                'string' => 'Bedrock Dedicated Server',
                'output' => '基岩专用服务器',
                'sign' => 'language_zh_94378dff0299e92307602dcce9bdd911',
                'created_at' => '2021-12-11 20:31:52',
                'updated_at' => '2021-12-11 20:31:52',
            ),
            230 => 
            array (
                'id' => 232,
                'language' => 'zh',
                'string' => 'Variables',
                'output' => '变量',
                'sign' => 'language_zh_03df896fc71cd516fdcf44aa699c4933',
                'created_at' => '2021-12-11 20:31:54',
                'updated_at' => '2021-12-11 20:31:54',
            ),
            231 => 
            array (
                'id' => 233,
                'language' => 'zh',
                'string' => 'Bungeecord Jar File',
                'output' => '橡皮筋Jar文件',
                'sign' => 'language_zh_0ad9dd854e65a085791e809d913e36d4',
                'created_at' => '2021-12-11 20:31:55',
                'updated_at' => '2021-12-11 20:31:55',
            ),
            232 => 
            array (
                'id' => 234,
                'language' => 'zh',
                'string' => 'Edge Standing',
                'output' => '灵境边缘',
                'sign' => 'language_zh_5aa7cdf4dfa01a9fedf6140f755940b4',
                'created_at' => '2021-12-11 20:33:13',
                'updated_at' => '2021-12-11 20:33:13',
            ),
            233 => 
            array (
                'id' => 235,
                'language' => 'zh',
                'string' => 'Bungeecord Version',
                'output' => '橡皮筋版',
                'sign' => 'language_zh_c9d4b20f1f4ed86b092cb364434325ff',
                'created_at' => '2021-12-11 20:56:30',
                'updated_at' => '2021-12-11 20:56:30',
            ),
            234 => 
            array (
                'id' => 236,
                'language' => 'zh',
                'string' => 'The version of Bungeecord to download and use.',
                'output' => '下载并使用Bungeecord的版本。',
                'sign' => 'language_zh_2ceea5a92115ef12b842b20ad84868c0',
                'created_at' => '2021-12-11 20:56:31',
                'updated_at' => '2021-12-11 20:56:31',
            ),
            235 => 
            array (
                'id' => 237,
                'language' => 'zh',
                'string' => 'The version of Teamspeak 3 to use when running the server.',
                'output' => '运行服务器时要使用的Teamspeak 3版本。',
                'sign' => 'language_zh_056bd7f56075c59575cb56abca73a72c',
                'created_at' => '2021-12-11 22:25:24',
                'updated_at' => '2021-12-11 22:25:24',
            ),
            236 => 
            array (
                'id' => 238,
                'language' => 'zh',
                'string' => 'The Teamspeak Query Port',
                'output' => 'Teamspeak查询端口',
                'sign' => 'language_zh_390083dd1a563044a75e7f0a702a22df',
                'created_at' => '2021-12-11 22:25:25',
                'updated_at' => '2021-12-11 22:25:25',
            ),
            237 => 
            array (
                'id' => 239,
                'language' => 'zh',
                'string' => 'New Server',
                'output' => '新服务器',
                'sign' => 'language_zh_d9d5734a2379a059a3163eed52ecb95b',
                'created_at' => '2021-12-11 22:31:43',
                'updated_at' => '2021-12-11 22:31:43',
            ),
            238 => 
            array (
                'id' => 240,
                'language' => 'zh',
                'string' => 'Core Details',
                'output' => '核心细节',
                'sign' => 'language_zh_0ae16e8426577ccdcc09823f94c92faa',
                'created_at' => '2021-12-11 22:33:17',
                'updated_at' => '2021-12-11 22:33:17',
            ),
            239 => 
            array (
                'id' => 241,
                'language' => 'zh',
                'string' => 'Server Name',
                'output' => '服务器名',
                'sign' => 'language_zh_637e29e8db23b0832fae80848e4d4733',
                'created_at' => '2021-12-12 12:30:52',
                'updated_at' => '2021-12-12 12:30:52',
            ),
            240 => 
            array (
                'id' => 242,
                'language' => 'zh',
                'string' => 'Your server need a name.',
                'output' => '您的服务器需要一个名称。',
                'sign' => 'language_zh_ae3592284246fa254c7a32cc4391f0a5',
                'created_at' => '2021-12-12 12:31:57',
                'updated_at' => '2021-12-12 12:31:57',
            ),
            241 => 
            array (
                'id' => 243,
                'language' => 'zh',
                'string' => 'Owner',
                'output' => '物主',
                'sign' => 'language_zh_b6f4a2ec6356bbd56d49f2096bf9d3d3',
                'created_at' => '2021-12-12 12:32:01',
                'updated_at' => '2021-12-12 12:32:01',
            ),
            242 => 
            array (
                'id' => 244,
                'language' => 'zh',
                'string' => 'Who is the owner of this server?',
                'output' => '谁是此服务器的所有者？',
                'sign' => 'language_zh_7c824fe8ed229ff980fb029d6fbb886e',
                'created_at' => '2021-12-12 12:33:34',
                'updated_at' => '2021-12-12 12:33:34',
            ),
            243 => 
            array (
                'id' => 245,
                'language' => 'zh',
                'string' => 'Allocation Management',
                'output' => '分配管理',
                'sign' => 'language_zh_adc5a257b8e1079a453f0fc94836eff8',
                'created_at' => '2021-12-12 12:35:01',
                'updated_at' => '2021-12-12 12:35:01',
            ),
            244 => 
            array (
                'id' => 246,
                'language' => 'zh',
                'string' => 'Node',
                'output' => '节点',
                'sign' => 'language_zh_6c3a6944a808a7c0bbb6788dbec54a9f',
                'created_at' => '2021-12-12 12:38:28',
                'updated_at' => '2021-12-12 12:38:28',
            ),
            245 => 
            array (
                'id' => 247,
                'language' => 'zh',
                'string' => 'The node which this server will be deployed to.',
                'output' => '此服务器将部署到的节点。',
                'sign' => 'language_zh_2f42d01c878f599e573f8e57ed13f19e',
                'created_at' => '2021-12-12 12:38:44',
                'updated_at' => '2021-12-12 12:38:44',
            ),
            246 => 
            array (
                'id' => 248,
                'language' => 'zh',
                'string' => 'Default Allocation',
                'output' => '默认分配',
                'sign' => 'language_zh_87eb42a1560902bdf781608892605cf8',
                'created_at' => '2021-12-12 12:40:06',
                'updated_at' => '2021-12-12 12:40:06',
            ),
            247 => 
            array (
                'id' => 249,
                'language' => 'zh',
                'string' => 'Additional allocations to assign to this server on creation.',
                'output' => '创建时分配给此服务器的其他分配。',
                'sign' => 'language_zh_254afe781c1f41a363eb19a043e2dbc6',
                'created_at' => '2021-12-12 12:40:07',
                'updated_at' => '2021-12-12 12:40:07',
            ),
            248 => 
            array (
                'id' => 250,
                'language' => 'zh',
                'string' => 'The main allocation that will be assigned to this server.',
                'output' => '将分配给此服务器的主分配。',
                'sign' => 'language_zh_454a9787b6359b1c8fac1b38c917614b',
                'created_at' => '2021-12-12 12:40:44',
                'updated_at' => '2021-12-12 12:40:44',
            ),
            249 => 
            array (
                'id' => 251,
                'language' => 'zh',
            'string' => 'Additional Allocation(s)',
                'output' => '额外端口',
                'sign' => 'language_zh_9c56c6513802d64536476ea946658f12',
                'created_at' => '2021-12-12 12:40:50',
                'updated_at' => '2021-12-12 12:40:50',
            ),
            250 => 
            array (
                'id' => 252,
                'language' => 'zh',
                'string' => 'Additional allocations can be assigned to this server after the server created.',
                'output' => '创建服务器后，可以将其他端口分配到该服务器。',
                'sign' => 'language_zh_b962d363efb2a247da2e8977dab2f49f',
                'created_at' => '2021-12-12 12:43:28',
                'updated_at' => '2021-12-12 12:43:28',
            ),
            251 => 
            array (
                'id' => 253,
                'language' => 'zh',
                'string' => 'Application Feature Limits',
                'output' => '应用程序功能限制',
                'sign' => 'language_zh_a28189da2f17c4cdf0a4f76345a4d341',
                'created_at' => '2021-12-12 12:45:07',
                'updated_at' => '2021-12-12 12:45:07',
            ),
            252 => 
            array (
                'id' => 254,
                'language' => 'zh',
                'string' => 'Database Limit',
                'output' => '数据库限制',
                'sign' => 'language_zh_2a3f4384a0950ea9b3727d5c3e391f95',
                'created_at' => '2021-12-12 12:45:49',
                'updated_at' => '2021-12-12 12:45:49',
            ),
            253 => 
            array (
                'id' => 255,
                'language' => 'zh',
                'string' => 'The total number of databases a user is allowed to create for this server.',
                'output' => '允许用户为此服务器创建的数据库总数。',
                'sign' => 'language_zh_8a868f914587a39393a6d9172f1189a7',
                'created_at' => '2021-12-12 12:46:00',
                'updated_at' => '2021-12-12 12:46:00',
            ),
            254 => 
            array (
                'id' => 256,
                'language' => 'zh',
                'string' => 'Allocation Limit',
                'output' => '分配限额',
                'sign' => 'language_zh_6193980ebf424a28d0199de0cda9f171',
                'created_at' => '2021-12-12 12:48:21',
                'updated_at' => '2021-12-12 12:48:21',
            ),
            255 => 
            array (
                'id' => 257,
                'language' => 'zh',
                'string' => 'Backup Limit',
                'output' => '备份限制',
                'sign' => 'language_zh_5a5b472ce125fdccaad19d75f27845b1',
                'created_at' => '2021-12-12 12:48:21',
                'updated_at' => '2021-12-12 12:48:21',
            ),
            256 => 
            array (
                'id' => 258,
                'language' => 'zh',
                'string' => 'The total number of allocations a user is allowed to create for this server.',
                'output' => '允许用户为此服务器创建的分配总数。',
                'sign' => 'language_zh_052bf1fd91a74e4568a9dce224595ed7',
                'created_at' => '2021-12-12 12:49:52',
                'updated_at' => '2021-12-12 12:49:52',
            ),
            257 => 
            array (
                'id' => 259,
                'language' => 'zh',
                'string' => 'The total number of backups that can be created for this server.',
                'output' => '可以为此服务器创建的备份总数。',
                'sign' => 'language_zh_ff49412e9bec872e15d629df31ec98b5',
                'created_at' => '2021-12-12 12:50:34',
                'updated_at' => '2021-12-12 12:50:34',
            ),
            258 => 
            array (
                'id' => 260,
                'language' => 'zh',
                'string' => 'Resource Management',
                'output' => '资源管理',
                'sign' => 'language_zh_cb39ac09dca88d69876f8730b7461b4d',
                'created_at' => '2021-12-12 13:00:58',
                'updated_at' => '2021-12-12 13:00:58',
            ),
            259 => 
            array (
                'id' => 261,
                'language' => 'zh',
                'string' => 'CPU Limit',
                'output' => 'CPU限制',
                'sign' => 'language_zh_52f06b9c0f09359559d8a151e4039c71',
                'created_at' => '2021-12-12 13:01:28',
                'updated_at' => '2021-12-12 13:01:28',
            ),
            260 => 
            array (
                'id' => 262,
                'language' => 'zh',
                'string' => 'Disk',
                'output' => '磁盘',
                'sign' => 'language_zh_380dbc8d9d2c8a17f6ebb0b2c62d3e85',
                'created_at' => '2021-12-12 13:13:35',
                'updated_at' => '2021-12-12 13:13:35',
            ),
            261 => 
            array (
                'id' => 263,
                'language' => 'zh',
                'string' => 'Disk Space',
                'output' => '磁盘空间',
                'sign' => 'language_zh_0ce787990a7625ab58adb48b3628b7ba',
                'created_at' => '2021-12-12 13:13:52',
                'updated_at' => '2021-12-12 13:13:52',
            ),
            262 => 
            array (
                'id' => 264,
                'language' => 'zh',
                'string' => 'Memory',
                'output' => '记忆力',
                'sign' => 'language_zh_4789f23283b3a61f858b641a1bef19a3',
                'created_at' => '2021-12-12 13:13:55',
                'updated_at' => '2021-12-12 13:13:55',
            ),
            263 => 
            array (
                'id' => 265,
                'language' => 'zh',
                'string' => 'Memory Limit',
                'output' => '内存限制',
                'sign' => 'language_zh_d33cede8bbb38cb235c8504868b76385',
                'created_at' => '2021-12-12 13:14:05',
                'updated_at' => '2021-12-12 13:14:05',
            ),
            264 => 
            array (
                'id' => 266,
                'language' => 'zh',
                'string' => 'Nest Configuration',
                'output' => 'Nest 配置',
                'sign' => 'language_zh_17878673889d4f753bd83ece8302bc79',
                'created_at' => '2021-12-12 14:34:33',
                'updated_at' => '2021-12-12 14:34:33',
            ),
            265 => 
            array (
                'id' => 267,
                'language' => 'zh',
                'string' => 'Build Configuration',
                'output' => '构建配置',
                'sign' => 'language_zh_ff5946076693d73b78a9ee83dfefc3c0',
                'created_at' => '2021-12-12 14:44:51',
                'updated_at' => '2021-12-12 14:44:51',
            ),
            266 => 
            array (
                'id' => 268,
                'language' => 'zh',
                'string' => 'Docker Image',
                'output' => 'Docker 镜像',
                'sign' => 'language_zh_7cb93c0372fbdc99ef93b830edfe2fee',
                'created_at' => '2021-12-12 14:44:52',
                'updated_at' => '2021-12-12 14:44:52',
            ),
            267 => 
            array (
                'id' => 269,
                'language' => 'zh',
                'string' => 'Nest',
                'output' => '巢',
                'sign' => 'language_zh_fe60251dcd22da35121fa717b142baa0',
                'created_at' => '2021-12-12 14:45:09',
                'updated_at' => '2021-12-12 14:45:09',
            ),
        ));
        
        
    }
}