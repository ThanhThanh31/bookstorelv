<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class QuyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quyen = [
            [
                'q_ten' => 'Quản trị',
            ],
            [
                'q_ten' => 'Chủ cửa hàng',
            ],
            [
                'q_ten' => 'Khách hàng',
            ],
        ];
        $insert = DB::table('quyen')->insert($quyen);
    }
}
