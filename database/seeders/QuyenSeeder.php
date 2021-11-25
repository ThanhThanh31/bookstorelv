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
                'q_ten' => 'Người dùng',
            ],
            [
                'q_ten' => 'Người dùng đã bị khóa',
            ],
        ];
        $insert = DB::table('quyen')->insert($quyen);
    }
}
