<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class CongTyPhatHanhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $issuer = [
            [
                'cty_ten' => 'VanLangBooks',
            ],
            [
                'cty_ten' => 'Văn Việt',
            ],
            [
                'cty_ten' => 'Minh Long',
            ],
            [
                'cty_ten' => 'Nhà Sách Minh Thắng',
            ],
            [
                'cty_ten' => 'Công Ty Văn Hóa Minh Lâm',
            ],
            [
                'cty_ten' => 'Công Ty TNHH TM - DV Chính Thông',
            ],
            [
                'cty_ten' => 'Công Ty TNHH TM & DV Văn Hóa Hương Trang',
            ],
            [
                'cty_ten' => 'Công Ty TNHH Văn Hóa Minh Lâm',
            ],
            [
                'cty_ten' => 'Công Ty TNHH Văn Hóa Minh Lâm',
            ],
            [
                'cty_ten' => 'First News - Trí Việt',
            ],
            [
                'cty_ten' => 'Huy Hoàng Booksrore',
            ],
            [
                'cty_ten' => 'Công Ty Văn Hóa Hương Trang',
            ],
            [
                'cty_ten' => 'Công Ty TNHH VnBooks',
            ],
            [
                'cty_ten' => 'Nhân Trí Việt',
            ],
            [
                'cty_ten' => 'Thái Hà',
            ],
            [
                'cty_ten' => 'Hồng Ân',
            ],
            [
                'cty_ten' => 'Tân Việt',
            ],
            [
                'cty_ten' => 'AZ Việt Nam',
            ],
            [
                'cty_ten' => 'Bách Việt',
            ],
            [
                'cty_ten' => 'Quảng Văn',
            ],
            [
                'cty_ten' => 'Saigon Books',
            ],
            [
                'cty_ten' => 'Khang Việt Books',
            ],
            [
                'cty_ten' => 'Công Ty Cổ Phần Tri Thức Văn Hóa Sách Việt Nam',
            ],
            [
                'cty_ten' => 'Công Ty Cổ Phần Văn Hóa Đông Á',
            ],
            [
                'cty_ten' => 'Công Ty CP Truyền Thông Sáo Diều',
            ],
            [
                'cty_ten' => 'Công Ty Cp Văn Hóa Nhân Văn',
            ],
            [
                'cty_ten' => 'Hộ Kinh Doanh Nhà Sách Mười Chín',
            ],
            [
                'cty_ten' => 'Nhà Sách Lao Động',
            ],
            [
                'cty_ten' => 'Nhà Sách Minh Nguyệt',
            ],
            [
                'cty_ten' => 'TT Giới Thiệu Sách TP.HCM',
            ],
            [
                'cty_ten' => 'AMUN',
            ],
            [
                'cty_ten' => 'MCBOOKS',
            ],
            [
                'cty_ten' => 'BIZBOOKS',
            ],
            [
                'cty_ten' => '1980 Books',
            ],
            [
                'cty_ten' => 'Nhã Nam',
            ],
            [
                'cty_ten' => 'Phương Nam Book',
            ],
            [
                'cty_ten' => 'Alphabooks',
            ],
            [
                'cty_ten' => 'Pandabooks',
            ],
            [
                'cty_ten' => 'Cẩm Phong Books',
            ],
            [
                'cty_ten' => 'Nhiều Công Ty Phát Hành',
            ],
        ];
        $insert = DB::table('congty_phathanh')->insert($issuer);
    }
}
