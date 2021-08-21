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
                'l_ten' => 'Văn phòng phẩm',
            ],
            [
                'l_ten' => 'Quần áo',
            ],
            [
                'l_ten' => 'Gia dụng',
            ],
            [
                'l_ten' => 'Thiết bị điện tử',
            ],
        ];
        $insert = DB::table('loai_sanpham')->insert($category);
    }
}
