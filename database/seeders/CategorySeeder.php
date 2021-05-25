<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        DB::table('categories')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'parent_id' => NULL,
                    'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
                    'name' => '',
                    'created_at' => '2020-03-07 15:10:58',
                    'updated_at' => '2020-03-07 15:10:58',
                ),
            1 =>
                array (
                    'id' => 2,
                    'parent_id' => NULL,
                    'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
                    'name' => 'MainCategory1',
                    'created_at' => '2020-03-07 15:10:58',
                    'updated_at' => '2020-03-07 15:10:58',
                ),
            2 =>
                array (
                    'id' => 3,
                    'parent_id' => NULL,
                    'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
                    'name' => 'MainCategory2',
                    'created_at' => '2020-03-07 15:10:58',
                    'updated_at' => '2020-03-07 15:10:58',
                ),
            3 =>
                array (
                    'id' => 4,
                    'parent_id' => 1,
                    'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
                    'name' => 'MainCategory3',
                    'created_at' => '2020-03-07 15:10:58',
                    'updated_at' => '2020-03-07 15:10:58',
                ),
            4 =>
                array (
                    'id' => 5,
                    'parent_id' => 1,
                    'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
                    'name' => 'subcategory1-1',
                    'created_at' => '2020-03-07 15:11:36',
                    'updated_at' => '2020-03-07 15:11:36',
                ),
            5 =>
                array (
                    'id' => 6,
                    'parent_id' => 1,
                    'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
                    'name' => 'subcategory2-1',
                    'created_at' => '2020-03-14 10:02:06',
                    'updated_at' => '2020-03-14 10:02:06',
                ),
            6 =>
                array (
                    'id' => 7,
                    'parent_id' => 1,
                    'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
                    'name' => 'subcategory3-1',
                    'created_at' => '2020-03-14 10:02:28',
                    'updated_at' => '2020-03-14 10:02:41',
                ),
            7 =>
                array (
                    'id' => 8,
                    'parent_id' => 2,
                    'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
                    'name' => 'subcategory1-2',
                    'created_at' => '2020-03-14 10:03:54',
                    'updated_at' => '2020-03-14 10:03:54',
                ),
            8 =>
                array (
                    'id' => 9,
                    'parent_id' => 2,
                    'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
                    'name' => 'subcategory2-2',
                    'created_at' => '2020-03-14 11:52:14',
                    'updated_at' => '2020-03-14 11:52:14',
                ),
            9 =>
                array (
                    'id' => 10,
                    'parent_id' => 3,
                    'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
                    'name' => 'subcategory1-3',
                    'created_at' => '2020-03-14 11:52:14',
                    'updated_at' => '2020-03-14 11:52:14',
                ),
        ));
    }
}
