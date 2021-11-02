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
                'tl_ten' => 'Sách Chính Trị - Pháp Lý',
                'tl_mota' => 'Những tác phẩm hội tụ những nguyên tắc làm nền móng cho pháp Lý nói chung và chính trị học nói riêng.',
            ],
            [
                'tl_ten' => 'Sách Mẹ Và Bé',
                'tl_mota' => 'Thông qua các phương pháp khoa học của thế giới, kinh nghiệm nuôi con thực tế cùng giọng văn dí dỏm, cuốn sách muốn giúp các bạn đang là mẹ, chuẩn làm mẹ có những giây phút nuôi con, ngập tràn tiếng cười.',
            ],
            [
                'tl_ten' => 'Sách Lịch Sử',
                'tl_mota' => 'Những câu chuyện, tác phẩm khoa học nghiên cứu về quá khứ, đặc biệt là những sự kiện liên quan đến con người.',
            ],
            [
                'tl_ten' => 'Sách Giáo Khoa - Giáo Trình',
                'tl_mota' => 'Cung cấp kiến thức, được biên soạn với mục đích dạy và học tại trường học. Sách giáo khoa - giáo trình được phân loại dựa theo đối tượng sử dụng hoặc chủ đề của sách.',
            ],
            [
                'tl_ten' => 'Sách Kiến Thức Tổng Hợp',
                'tl_mota' => 'Tất cả kiến thức thuộc nhiều ngành và lĩnh vực khác nhau về mọi phương diện.',
            ],
            [
                'tl_ten' => 'Sách Công Nghệ Thông Tin',
                'tl_mota' => 'Những kiến thức hữu ích về cách sử dụng máy tính và phần mềm máy tính để chuyển đổi, lưu trữ, bảo vệ xử lý và truyền tải thông tin.',
            ],
            [
                'tl_ten' => 'Sách Thiếu Nhi',
                'tl_mota' => 'Những câu chuyện, sách, tạp chí và bài thơ dành cho trẻ em.',
            ],
            [
                'tl_ten' => 'Sách Kỹ Năng Sống',
                'tl_mota' => 'Những bài học được truyền tải lại cho con người những kỹ năng sống cần thiết khi phải đối mạt với nguy hiểm, giảm thiểu rủi ro.',
            ],
            [
                'tl_ten' => 'Sách Kinh Tế - Kinh Doanh',
                'tl_mota' => 'Những lĩnh vực trong kinh tế học ứng dụng trong đó sử dụng lý thuyết kinh tế và phương pháp định lượng để phân tích doanh nghiệp và những yếu tố góp phần vào sự đa dạng của cơ cấu tổ chức và mối quan hệ của các công ty với lao động, vốn, và thị trường.',
            ],
            [
                'tl_ten' => 'Văn Hóa – Địa Lý – Du Lịch',
                'tl_mota' => 'Những câu chuyện kể về các chuyến đi tới những nền văn hoá thuộc một quốc gia hoặc vùng miền, đặc biệt là lối sống của người dân ở những khu vực địa lý, lịch sử của những người đó, nghệ thuật, kiến ​​trúc và cách sống của họ.',
            ],
            [
                'tl_ten' => 'Sách Học Ngoại Ngữ',
                'tl_mota' => 'Những cuốn sách tổng hợp tất cả kiến thức về nhiều loại ngôn ngữ của các quốc gia.',
            ],
            [
                'tl_ten' => 'Sách Tham Khảo',
                'tl_mota' => 'Những cuốn sách đề cập đến tác phẩm của một tác giả hoặc lĩnh vực kiến thức cụ thể, bao gồm những tác phẩm được trích dẫn, sử dụng và đề cập trong bài giảng luận văn, luận án, khóa luận, bài báo...',
            ],
            [
                'tl_ten' => 'Sách Thường Thức - Gia Đình',
                'tl_mota' => 'Những mẫu chuyện nhỏ chia sẻ kiến thức về các mẹo vặt hằng ngày trong gia đình như khi dọn dẹp, làm bếp hay để chăm sóc gia đình tốt hơn.',
            ],
            [
                'tl_ten' => 'Truyện Tranh, Manga, Comic',
                'tl_mota' => 'Là một phương tiện được sử dụng để thể hiện ý tưởng bằng hình ảnh, thường kết hợp với các văn bản hoặc thông tin hình ảnh khác.',
            ],
            [
                'tl_ten' => 'Từ Điển',
                'tl_mota' => 'Những cuốn sách nói về là danh sách các từ, ngữ được sắp xếp thành các từ vị chuẩn (lemma). Cách xem hiểu và vận dụng chính xác một từ, ngữ, thuật ngữ, thành ngữ, khái niệm, phạm trù hay một vấn đề cụ thể.',
            ],
            [
                'tl_ten' => 'Điện Ảnh – Nhạc – Họa',
                'tl_mota' => 'Những tác phẩm viết về các bản nhạc nổi tiếng và cuộc đời của các nhà soạn nhạc. Về những kỹ thuật vẽ cơ bản, cách chọn giấy vẽ, bút, cọ trong hội họa. Về các yếu tố nghệ thuật tạo hình, dàn dựng cảnh, chọn lọc âm thanh trong điện ảnh.',
            ],
            [
                'tl_ten' => 'Văn Học - Viễn Tưởng',
                'tl_mota' => 'Những tác phẩm văn học (chủ yếu là văn xuôi – truyện, tiểu thuyết) lấy viễn tưởng làm phương thức xây dựng hình tượng và tổ chức cốt truyện.',
            ],
        ];
        $insert = DB::table('the_loai')->insert($category);
    }
}
