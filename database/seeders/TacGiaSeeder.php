<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class TacGiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author = [
            [
                'tg_ten' => 'Nhiều Tác Giả',
            ],
            [
                'tg_ten' => 'Mặc Hương Đồng Khứu',
            ],
            [
                'tg_ten' => 'Khốn Ỷ Nguy Lâu',
            ],
            [
                'tg_ten' => 'Tĩnh Thủy Biên',
            ],
            [
                'tg_ten' => 'Cửu Lộ Phi Hương',
            ],
            [
                'tg_ten' => 'Nhĩ Nhã',
            ],
            [
                'tg_ten' => 'Cố Tây Tước',
            ],
            [
                'tg_ten' => 'Tạ Hà Như Bình',
            ],
            [
                'tg_ten' => 'Mạc Bảo Phi Bảo',
            ],
            [
                'tg_ten' => 'Vãn Tình',
            ],
            [
                'tg_ten' => 'Nhị Hy',
            ],
            [
                'tg_ten' => 'Đinh Mặc',
            ],
            [
                'tg_ten' => 'J. D. Salinger',
            ],
            [
                'tg_ten' => 'Gari',
            ],
            [
                'tg_ten' => 'Patrick Suskind',
            ],
            [
                'tg_ten' => 'Annie Pietri',
            ],
        ];
        $insert = DB::table('tac_gia')->insert($author);
    }
}
