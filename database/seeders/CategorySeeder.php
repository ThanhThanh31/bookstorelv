<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            [
                'tl_ten' => 'Giày dép',
            ],
            [
                'tl_ten' => 'Nội thất',
            ],
            [
                'tl_ten' => 'Gia dụng',
            ],
            [
                'tl_ten' => 'Mỹ phẩm',
            ],
        ];
        $insert = DB::table('the_loai')->insert($category);
    }
}
