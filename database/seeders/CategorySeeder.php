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
                'tl_ten' => 'Văn Học - Viễn Tưởng',
            ],
            [
                'tl_ten' => 'Sách Thiếu Nhi',
            ],
            [
                'tl_ten' => 'Sách Kỹ Năng Sống',
            ],
            [
                'tl_ten' => 'Sách Kinh Tế - Kinh Doanh',
            ],
            [
                'tl_ten' => 'Văn Hóa – Địa Lý – Du Lịch',
            ],
            [
                'tl_ten' => 'Điện Ảnh – Nhạc – Họa',
            ],
            [
                'tl_ten' => 'Sách Học Ngoại Ngữ',
            ],
            [
                'tl_ten' => 'Sách Tham Khảo',
            ],
            [
                'tl_ten' => 'Sách Tâm Lý - Giới Tính',
            ],
            [
                'tl_ten' => 'Sách Thường Thức - Gia Đình',
            ],
            [
                'tl_ten' => 'Từ Điển',
            ],
            [
                'tl_ten' => 'Sách Chính Trị - Pháp Lý',
            ],
            [
                'tl_ten' => 'Sách Mẹ Và Bé',
            ],
            [
                'tl_ten' => 'Sách Lịch Sử',
            ],
            [
                'tl_ten' => 'Truyện Tranh, Manga, Comic',
            ],
            [
                'tl_ten' => 'Sách Giáo Khoa - Giáo Trình',
            ],
            [
                'tl_ten' => 'Sách Kiến Thức Tổng Hợp',
            ],
            [
                'tl_ten' => 'Sách Công Nghệ Thông Tin',
            ],
        ];
        $insert = DB::table('the_loai')->insert($category);
    }
}
