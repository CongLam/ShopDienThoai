<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'cate_name'=>'iPhone',
                'cate_slug'=>Str::slug('iPhone')
            ],
            [
                'cate_name'=>'SamSung',
                'cate_slug'=>Str::slug('iPhone')
            ],
        ];

        DB::table('tbl_categories')->insert($data);
    }
}
