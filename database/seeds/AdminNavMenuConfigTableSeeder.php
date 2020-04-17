<?php

use Illuminate\Database\Seeder;

class AdminNavMenuConfigTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('admin_nav_menu_config')->delete();

        \DB::table('admin_nav_menu_config')->insert(array(
            0 =>
                array(
                    'created_at' => '2020-04-11 16:17:57',
                    'id' => 1,
                    'name' => '导航站',
                    'order' => 1,
                    'path' => 'navigation',
                    'target' => 0,
                    'updated_at' => '2020-04-11 18:25:18',
                ),
            1 =>
                array(
                    'created_at' => '2020-04-11 16:18:15',
                    'id' => 2,
                    'name' => '知识库',
                    'order' => 2,
                    'path' => 'wiki',
                    'target' => 0,
                    'updated_at' => '2020-04-11 18:25:25',
                ),
            2 =>
                array(
                    'created_at' => '2020-04-11 16:18:42',
                    'id' => 3,
                    'name' => '博客',
                    'order' => 3,
                    'path' => 'blog',
                    'target' => 0,
                    'updated_at' => '2020-04-11 18:25:31',
                ),
        ));


    }
}
