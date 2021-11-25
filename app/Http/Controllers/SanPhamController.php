<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Session;
use Auth;
// use File;
use Validator;
use Intervention\Image\Facades\Image as Image;
use App\Model\Photo;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function index(){
        $n = Auth::guard('nguoi_dung')->user()->nd_id;
        $h = DB::table('nguoi_dung')->where('nd_id', $n)->first();

        $show = DB::table('san_pham')
        ->join('linh_vuc', 'linh_vuc.lv_id', 'san_pham.lv_id')
        ->join('the_loai', 'the_loai.tl_id', 'linh_vuc.tl_id')
        ->where('nd_id', $h->nd_id)
        ->orderby('sp_id','desc')->paginate(3);
        return view('client.page.product.index', compact('show'));
    }

    public function addForm(){

        $tg = DB::table('tac_gia')
        ->orderby('tg_id','desc')->get();

        $cty = DB::table('congty_phathanh')
        ->orderby('cty_id','desc')->get();

        $lb = DB::table('loai_bia')
        ->orderby('lb_id','desc')->get();

        $nxb = DB::table('nha_xuatban')
        ->orderby('nxb_id','desc')->get();

        $tl = DB::table('the_loai')
        ->orderby('tl_id','desc')->get();

        $tp = DB::table('tinh_thanhpho')
        ->orderby('ttp_id','asc')->get();

        return view('client.page.product.add', compact('tl', 'tg', 'cty', 'lb', 'nxb', 'tp'));
    }

    public function getProductTypeByCat ($id){
        // $idUser =  Auth::guard('nguoi_dung')->user()->nd_id;
        // $idStore = DB::table('nguoi_dung')->where('nd_id', $idUser)->first();
        // $li = DB::table('linh_vuc')->where('tl_id', $id)->where('nd_id', $idStore->nd_id)->get();
        $li = DB::table('linh_vuc')->where('tl_id', $id)->orderby('lv_id','desc')->get();
        return response()->json($li, 200);
    }

    public function getProvinceByCity ($id){
        $province = DB::table('quan_huyen')->where('ttp_id', $id)->orderby('qh_id','asc')->get();
        return response()->json($province, 200);
    }

    public function getWardByProvince ($id){
        $ward = DB::table('xa_phuong')->where('qh_id', $id)->orderby('xp_id','asc')->get();
        return response()->json($ward, 200);
    }

    public function addPro(Request $request){
        $ten = $request->ten;
        $trangthai = $request->trangthai;
        $sotrang = $request->sotrang;
        $kichthuoc = $request->kichthuoc;
        $gia = $request->gia;
        $mota = $request->mota;
        $linhvuc = $request->linhvuc;
        $theloai = $request->theloai;
        $thanhpho = $request->thanhpho;
        $quanhuyen = $request->quanhuyen;
        $xaphuong = $request->xaphuong;
        $nhaxuatban = $request->nhaxuatban;
        $loaibia = $request->loaibia;
        $congty = $request->congty;
        $tacgia = $request->tacgia;

        $messages = [
            'anh.required' => 'Vui lòng chọn hình ảnh cho sản phẩm !',
            'anh.image' => 'Chỉ chấp nhận hình ảnh cho sản phẩm với đuôi .jpg .jpeg .png .gif !',
            'ten.required' => 'Tên sản phẩm không được để trống !',
            'ten.min' => 'Tên sản phẩm phải có ít nhất 2 ký tự !',
            'trangthai.required' => 'Vui lòng chọn trạng thái sản phẩm !',
            'sotrang.required' => 'Số trang sản phẩm không được để trống !',
            'sotrang.alpha_num' => 'Số trang nhập vào phải là số !',
            'sotrang.gt' => 'Số trang sản phẩm phải lớn hơn 0 !',
            'kichthuoc.required' => 'Kích thước sản phẩm không được để trống !',
            'gia.required' => 'Giá sản phẩm không được để trống !',
            'gia.alpha_num' => 'Giá nhập vào phải là số !',
            'gia.min' => 'Giá sản phẩm phải có ít nhất 4 số !',
            'mota.required' => 'Mô tả sản phẩm không được để trống !',
            'mota.min' => 'Mô tả sản phẩm có ít nhất 50 ký tự !',
            'linhvuc.required' => 'Vui lòng chọn lĩnh vực cho sản phẩm !',
            'theloai.required' => 'Vui lòng chọn thể loại cho sản phẩm !',
            'thanhpho.required' => 'Vui lòng chọn tỉnh thành phố !',
            'quanhuyen.required' => 'Vui lòng chọn quận huyện !',
            'xaphuong.required' => 'Vui lòng chọn xã phường !',
            'nhaxuatban.required' => 'Vui lòng chọn nhà xuất bản cho sản phẩm !',
            'loaibia.required' => 'Vui lòng chọn loại bìa cho sản phẩm !',
            'congty.required' => 'Vui lòng chọn công ty phát hành cho sản phẩm !',
            'tacgia.required' => 'Vui lòng chọn tác giả cho sản phẩm !',
        ];

        $this->validate($request,[
            'anh' => 'required|image',
            'ten' => 'required|min:2',
            'theloai' => 'required',
            'linhvuc' => 'required',
            'loaibia' => 'required',
            'tacgia' => 'required',
            'sotrang' => 'required|alpha_num|gt:0',
            'kichthuoc' => 'required',
            'gia' => 'required|alpha_num|min:4',
            'trangthai' => 'required',
            'nhaxuatban' => 'required',
            'congty' => 'required',
            'thanhpho' => 'required',
            'quanhuyen' => 'required',
            'xaphuong' => 'required',
            'mota' => 'required|min:30',
        ], $messages);

        // $errors = $validate->errors();
        // Ràng buộc dữ liệu

        $nd = Auth::guard('nguoi_dung')->user()->nd_id;
        $ch = DB::table('nguoi_dung')->where('nd_id', $nd)->first();
        if($request->hasFile('anh')){
            $anh = $request->file('anh');
            $tenanh = $anh->getClientOriginalName();
            $anh->move(public_path('anh-san-pham/'), $tenanh);
            $insert = DB::table('san_pham')->insertGetId(
                [
                    'sp_ten' => $ten,
                    'sp_trangthai' => $trangthai,
                    'sp_sotrang' => $sotrang,
                    'sp_kichthuoc' => $kichthuoc,
                    'sp_gia' => $gia,
                    'sp_mota' => $mota,
                    'lv_id' => $linhvuc,
                    'ttp_id' => $thanhpho,
                    'qh_id' => $quanhuyen,
                    'xp_id' => $xaphuong,
                    'nxb_id' => $nhaxuatban,
                    'lb_id' => $loaibia,
                    'cty_id' => $congty,
                    'tg_id' => $tacgia,
                    'nd_id' => $ch->nd_id,
                    'sp_hinhanh' => 'anh-san-pham/'.$tenanh,
                ]
                );
        }

           if ($request->hasFile('anhlink')) {
           // Define upload path
                $anhlink = $request->file('anhlink');
                foreach($anhlink as $img) {
            // Upload Orginal Image
                if(isset($img)){
                    $anhh = $img->getClientOriginalName();
                    $img->move(public_path('anh-link/'), $anhh);
                    $add = DB::table('anh')->insert(
                        [
                            'sp_id' => $insert,
                            'a_duongdan' => 'anh-link/'.$anhh
                        ]
                        );
                }
            }
            }

            Session::flash("make", "Thêm sản phẩm thành công !");
            return redirect()->route('pro.index');
    }

    public function delete(Request $request, $id){
        $dell = DB::table('san_pham')->where('sp_id', $id)->delete();
        $de = DB::table('anh')->where('sp_id', $id)->delete();

        // $anh = $request->anh;
        // if(File::exists($anh)){
        //     File::delete($anh);
        //     }
        Session::flash("make", "Xóa sản phẩm thành công !");
        return redirect()->back();
    }

    public function revised($id){
        $a = Auth::guard('nguoi_dung')->user()->nd_id;
        $b = DB::table('nguoi_dung')->where('nd_id', $a)->first();

        $category = DB::table('the_loai')
        ->orderby('tl_id','desc')->get();

        $field = DB::table('linh_vuc')
        ->orderby('lv_id','desc')->get();

        $type = DB::table('loai_bia')
        ->orderby('lb_id','desc')->get();

        $editor = DB::table('nha_xuatban')
        ->orderby('nxb_id','desc')->get();

        $company = DB::table('congty_phathanh')
        ->orderby('cty_id','desc')->get();

        $author = DB::table('tac_gia')
        ->orderby('tg_id','desc')->get();

        $image = DB::table('anh')
        ->join('san_pham', 'san_pham.sp_id', 'anh.sp_id')
        ->where('anh.sp_id', $id)
        ->orderby('a_id','desc')->get();

        $city = DB::table('tinh_thanhpho')
        ->orderby('ttp_id','asc')->get();

        $provin = DB::table('quan_huyen')
        ->orderby('qh_id','asc')->get();

        $wards = DB::table('xa_phuong')
        ->orderby('xp_id','asc')->get();

        $product = DB::table('san_pham')
        ->join('linh_vuc', 'linh_vuc.lv_id', 'san_pham.lv_id')
        ->join('quan_huyen', 'quan_huyen.qh_id', 'san_pham.qh_id')
        ->join('xa_phuong', 'xa_phuong.xp_id', 'san_pham.xp_id')
        ->join('anh', 'anh.sp_id', 'san_pham.sp_id')
        ->where('san_pham.sp_id', $id)
        ->first();

        return view('client.page.product.edit', compact('category', 'product', 'field', 'type', 'editor', 'company', 'author', 'image', 'city', 'provin', 'wards'));
    }

    public function amend(Request $request, $id){
        $ten = $request->ten;
        $trangthai = $request->trangthai;
        $sotrang = $request->sotrang;
        $kichthuoc = $request->kichthuoc;
        $gia = $request->gia;
        $mota = $request->mota;
        $theloai = $request->theloai;
        $linhvuc = $request->linhvuc;
        $thanhpho = $request->thanhpho;
        $quanhuyen = $request->quanhuyen;
        $xaphuong = $request->xaphuong;
        $nhaxuatban = $request->nhaxuatban;
        $loaibia = $request->loaibia;
        $congty = $request->congty;
        $tacgia = $request->tacgia;
        $link = $request->link;
        $anh_edit = $request->anh_edit;

        // $messages = [
        //     'anh_edit.image' => 'Chỉ chấp nhận hình ảnh cho sản phẩm với đuôi .jpg .jpeg .png .gif !',
        //     'ten.required' => 'Tên sản phẩm không được để trống !',
        //     'ten.min' => 'Tên sản phẩm phải có ít nhất 2 ký tự !',
        //     'sotrang.required' => 'Số trang sản phẩm không được để trống !',
        //     'sotrang.alpha_num' => 'Số trang nhập vào phải là số !',
        //     'sotrang.gt' => 'Số trang sản phẩm phải lớn hơn 0 !',
        //     'kichthuoc.required' => 'Kích thước sản phẩm không được để trống !',
        //     'gia.required' => 'Giá sản phẩm không được để trống !',
        //     'gia.alpha_num' => 'Giá nhập vào phải là số !',
        //     'gia.min' => 'Giá sản phẩm phải có ít nhất 4 số !',
        //     'mota.required' => 'Mô tả sản phẩm không được để trống !',
        //     'mota.min' => 'Mô tả sản phẩm có ít nhất 50 ký tự !',
        //     'thanhpho.required' => 'Vui lòng chọn tỉnh thành phố !',
        //     'quanhuyen.required' => 'Vui lòng chọn quận huyện !',
        //     'xaphuong.required' => 'Vui lòng chọn xã phường !',
        // ];

        // $this->validate($request,[
        //     'anh_edit' => 'image',
        //     'ten' => 'required|min:2',
        //     'sotrang' => 'required|alpha_num|gt:0',
        //     'kichthuoc' => 'required',
        //     'gia' => 'required|alpha_num|min:4',
        //     'thanhpho' => 'required',
        //     'quanhuyen' => 'required',
        //     'xaphuong' => 'required',
        //     'mota' => 'required|min:30',
        // ], $messages);

        // $errors = $validate->errors();
        // Ràng buộc dữ liệu

        if($request->hasFile('anh_edit')){
            $anh_edit = $request->file('anh_edit');
            $filename = $anh_edit->getClientOriginalName();
            Image::make($anh_edit)->resize(300, 300)->save( public_path('anh-san-pham/' . $filename));

            $product = DB::table('san_pham')->where('sp_id', $id)->update(
                [
                    'sp_hinhanh' => 'anh-san-pham/'. $filename,
                ]
            );
            $anh = $request->anh;
                if(!empty($anh)){
                    File::delete($anh);
                }
        }

            $update = DB::table('san_pham')->where('sp_id', $id)->update(
                [
                    'sp_ten' => $ten,
                    'sp_trangthai' => $trangthai,
                    'sp_sotrang' => $sotrang,
                    'sp_kichthuoc' => $kichthuoc,
                    'sp_gia' => $gia,
                    'sp_mota' => $mota,
                    'lv_id' => $linhvuc,
                    'ttp_id' => $thanhpho,
                    'qh_id' => $quanhuyen,
                    'xp_id' => $xaphuong,
                    'nxb_id' => $nhaxuatban,
                    'lb_id' => $loaibia,
                    'cty_id' => $congty,
                    'tg_id' => $tacgia,
                ]
                );

                if ($request->hasFile('link')) {
                    // Define upload path
                    $link = $request->file('link');
                     // Upload Orginal Image
                    $moral = $link->getClientOriginalName();
                    $link->move(public_path('anh-link/'), $moral);
                    $insertImage = DB::table('anh')->insert(
                        [
                            'sp_id' => $id,
                            'a_duongdan' => 'anh-link/'.$moral
                        ]
                        );
                    return redirect()->back();
                }
            Session::flash("make", "Chỉnh sửa sản phẩm thành công !");
            return redirect()->route('pro.index');
    }

    public function erase($id){
        $dele = DB::table('anh')->where('a_id', $id)->delete();
        return redirect()->back();
    }

    public function rope(){
        $id_nd = Auth::guard('nguoi_dung')->user()->nd_id;
        $tb_nd = DB::table('nguoi_dung')->where('nd_id', $id_nd)->first();

        $rope = DB::table('san_pham')
        ->where('nd_id', $tb_nd->nd_id)->where('sp_tinhtrang', 2)
        ->orderby('sp_id','desc')->paginate(4);
        return view('client.page.report_product.index', compact('rope'));
    }

    public function historyProduct(){
        $id_nd = Auth::guard('nguoi_dung')->user()->nd_id;
        $t_nd = DB::table('nguoi_dung')->where('nd_id', $id_nd)->first();

        $pro_history = DB::table('baocao_sanpham')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'baocao_sanpham.nd_id')
        ->join('san_pham', 'san_pham.sp_id', 'baocao_sanpham.sp_id')
        ->where('nguoi_dung.nd_id', $t_nd->nd_id)->orderby('bp_id','desc')
        ->paginate(6);

        return view('client.page.history_product.index', compact('pro_history'));
    }


}
