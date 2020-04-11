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
        
        \DB::table('admin_nav_menu_config')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '导航站',
                'path' => 'navigation',
                'order' => 1,
                'target' => 0,
                'created_at' => '2020-04-11 16:17:57',
                'updated_at' => '2020-04-11 18:25:18',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '知识库',
                'path' => 'wiki',
                'order' => 2,
                'target' => 0,
                'created_at' => '2020-04-11 16:18:15',
                'updated_at' => '2020-04-11 18:25:25',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '博客',
                'path' => 'blog',
                'order' => 3,
                'target' => 0,
                'created_at' => '2020-04-11 16:18:42',
                'updated_at' => '2020-04-11 18:25:31',
            ),
        ));
        
        
    }
}