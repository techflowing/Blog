<?php

use Illuminate\Database\Seeder;

class AdminPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('admin_permissions')->delete();

        \DB::table('admin_permissions')->insert(array(
            0 =>
                array(
                    'created_at' => NULL,
                    'http_method' => '',
                    'http_path' => '*',
                    'id' => 1,
                    'name' => 'All permission',
                    'slug' => '*',
                    'updated_at' => NULL,
                ),
            1 =>
                array(
                    'created_at' => NULL,
                    'http_method' => 'GET',
                    'http_path' => '/',
                    'id' => 2,
                    'name' => 'Dashboard',
                    'slug' => 'dashboard',
                    'updated_at' => NULL,
                ),
            2 =>
                array(
                    'created_at' => NULL,
                    'http_method' => '',
                    'http_path' => '/auth/login
/auth/logout',
                    'id' => 3,
                    'name' => 'Login',
                    'slug' => 'auth.login',
                    'updated_at' => NULL,
                ),
            3 =>
                array(
                    'created_at' => NULL,
                    'http_method' => 'GET,PUT',
                    'http_path' => '/auth/setting',
                    'id' => 4,
                    'name' => 'User setting',
                    'slug' => 'auth.setting',
                    'updated_at' => NULL,
                ),
            4 =>
                array(
                    'created_at' => NULL,
                    'http_method' => '',
                    'http_path' => '/auth/roles
/auth/permissions
/auth/menu
/auth/logs',
                    'id' => 5,
                    'name' => 'Auth management',
                    'slug' => 'auth.management',
                    'updated_at' => NULL,
                ),
            5 =>
                array(
                    'created_at' => '2020-04-13 23:16:14',
                    'http_method' => '',
                    'http_path' => '/media*',
                    'id' => 6,
                    'name' => 'Media manager',
                    'slug' => 'ext.media-manager',
                    'updated_at' => '2020-04-13 23:16:14',
                ),
            6 =>
                array(
                    'created_at' => '2020-04-14 01:04:54',
                    'http_method' => '',
                    'http_path' => '/config*',
                    'id' => 10,
                    'name' => 'Admin Config',
                    'slug' => 'ext.config',
                    'updated_at' => '2020-04-14 01:04:54',
                ),
        ));


    }
}
