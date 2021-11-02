<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class NhaXuatBanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publisher = [
            [
                'nxb_ten' => 'Nhà Xuất Bản Khoa Học Xã Hội',
            ],
            [
                'nxb_ten' => 'Nhà Xuất Bản Dân Trí',
            ],
            [
                'nxb_ten' => 'Nhà Xuất Bản Thanh Niên',
            ],
            [
                'nxb_ten' => 'Nhà Xuất Bản Phụ Nữ',
            ],
            [
                'nxb_ten' => 'Nhà Xuất Bản Chính Trị Quốc Gia Sự Thật',
            ],
            [
                'nxb_ten' => 'Nhà Xuất Bản Thanh Niên',
            ],
            [
                'nxb_ten' => 'Nhà Xuất Bản Đại Học Quốc Gia Hà Nội',
            ],
            [
                'nxb_ten' => 'Nhà Xuất Bản Giáo Dục',
            ],
            [
                'nxb_ten' => 'Nhà Xuất Bản Tri Thức',
            ],
            [
                'nxb_ten' => 'Nhà Xuất Bản Hàng Hải',
            ],
            [
                'nxb_ten' => 'Nhà Xuất Bản Xây Dựng',
            ],
            [
                'nxb_ten' => 'Nhà Xuất Bản Bão',
            ],
            [
                'nxb_ten' => 'Nhà Xuất Bản Y Học',
            ],
            [
                'nxb_ten' => 'Nhà Xuất Bản Đà Nẵng',
            ],
            [
                'nxb_ten' => 'Nhà Xuất Bản Thế Giới Tuyển Dụng',
            ],
            [
                'nxb_ten' => 'Nhà Xuất Bản Thông Tin & Truyền Thông',
            ],
            [
                'nxb_ten' => 'Nhà Xuất Bản Thế Giới',
            ],
            [
                'nxb_ten' => 'Nhà Xuất Bản Trẻ',
            ],
            [
                'nxb_ten' => 'Nhà Xuất Bản Kim Đồng',
            ],
            [
                'nxb_ten' => 'Nhà Xuất Bản Văn Học',
            ],
            [
                'nxb_ten' => 'Nhà Xuất Bản Hà Nội',
            ],
        ];
        $insert = DB::table('nha_xuatban')->insert($publisher);
    }
}
