<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Session;
use Auth;
use Carbon\Carbon;
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
        ->orderby('sp_id','desc')->paginate(10);
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
        $soluong = $request->soluong;
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
            'anh.required' => 'Vui l??ng ch???n h??nh ???nh cho s???n ph???m !',
            'anh.image' => 'Ch??? ch???p nh???n h??nh ???nh cho s???n ph???m v???i ??u??i .jpg .jpeg .png .gif !',
            'ten.required' => 'T??n s???n ph???m kh??ng ???????c ????? tr???ng !',
            'ten.min' => 'T??n s???n ph???m ph???i c?? ??t nh???t 2 k?? t??? !',
            'soluong.required' => 'S??? l?????ng s???n ph???m kh??ng ???????c ????? tr???ng !',
            'soluong.alpha_num' => 'S??? l?????ng nh???p v??o ph???i l?? s??? !',
            'soluong.gt' => 'S??? l?????ng ph???i l???n h??n 0 !',
            'sotrang.required' => 'S??? trang s???n ph???m kh??ng ???????c ????? tr???ng !',
            'sotrang.alpha_num' => 'S??? trang nh???p v??o ph???i l?? s??? !',
            'sotrang.gt' => 'S??? trang s???n ph???m ph???i l???n h??n 0 !',
            'kichthuoc.required' => 'K??ch th?????c s???n ph???m kh??ng ???????c ????? tr???ng !',
            'gia.required' => 'Gi?? s???n ph???m kh??ng ???????c ????? tr???ng !',
            'gia.alpha_num' => 'Gi?? nh???p v??o ph???i l?? s??? !',
            'gia.min' => 'Gi?? s???n ph???m ph???i c?? ??t nh???t 4 s??? !',
            'mota.required' => 'M?? t??? s???n ph???m kh??ng ???????c ????? tr???ng !',
            'mota.min' => 'M?? t??? s???n ph???m c?? ??t nh???t 50 k?? t??? !',
            'linhvuc.required' => 'Vui l??ng ch???n l??nh v???c cho s???n ph???m !',
            'theloai.required' => 'Vui l??ng ch???n th??? lo???i cho s???n ph???m !',
            'thanhpho.required' => 'Vui l??ng ch???n t???nh th??nh ph??? !',
            'quanhuyen.required' => 'Vui l??ng ch???n qu???n huy???n !',
            'xaphuong.required' => 'Vui l??ng ch???n x?? ph?????ng !',
            'nhaxuatban.required' => 'Vui l??ng ch???n nh?? xu???t b???n cho s???n ph???m !',
            'loaibia.required' => 'Vui l??ng ch???n lo???i b??a cho s???n ph???m !',
            'congty.required' => 'Vui l??ng ch???n c??ng ty ph??t h??nh cho s???n ph???m !',
            'tacgia.required' => 'Vui l??ng ch???n t??c gi??? cho s???n ph???m !',
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
            'soluong' => 'required|alpha_num|gt:0',
            'nhaxuatban' => 'required',
            'congty' => 'required',
            'thanhpho' => 'required',
            'quanhuyen' => 'required',
            'xaphuong' => 'required',
            'mota' => 'required|min:30',
        ], $messages);

        // $errors = $validate->errors();
        // R??ng bu???c d??? li???u

        $nd = Auth::guard('nguoi_dung')->user()->nd_id;
        $ch = DB::table('nguoi_dung')->where('nd_id', $nd)->first();
        if($request->hasFile('anh')){
            $anh = $request->file('anh');
            $tenanh = $anh->getClientOriginalName();
            $anh->move(public_path('anh-san-pham/'), $tenanh);
            $insert = DB::table('san_pham')->insertGetId(
                [
                    'sp_ten' => $ten,
                    'sp_soluong' => $soluong,
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
                    'created_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateString()
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

            Session::flash("make", "Th??m s???n ph???m th??nh c??ng !");
            return redirect()->route('pro.index');
    }

    public function delete(Request $request, $id){
        $dell = DB::table('san_pham')->where('sp_id', $id)->delete();
        $de = DB::table('anh')->where('sp_id', $id)->delete();

        // $anh = $request->anh;
        // if(File::exists($anh)){
        //     File::delete($anh);
        //     }
        Session::flash("make", "X??a s???n ph???m th??nh c??ng !");
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
        ->where('san_pham.sp_id', $id)
        ->first();

        return view('client.page.product.edit', compact('category', 'product', 'field', 'type', 'editor', 'company', 'author', 'image', 'city', 'provin', 'wards'));
    }

    public function amend(Request $request, $id){
        $ten = $request->ten;
        $soluong = $request->soluong;
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

        $messages = [
            'anh_edit.image' => 'Ch??? ch???p nh???n h??nh ???nh cho s???n ph???m v???i ??u??i .jpg .jpeg .png .gif !',
            'ten.required' => 'T??n s???n ph???m kh??ng ???????c ????? tr???ng !',
            'ten.min' => 'T??n s???n ph???m ph???i c?? ??t nh???t 2 k?? t??? !',
            'soluong.required' => 'S??? l?????ng s???n ph???m kh??ng ???????c ????? tr???ng !',
            'soluong.alpha_num' => 'S??? l?????ng nh???p v??o ph???i l?? s??? !',
            'soluong.gt' => 'S??? l?????ng ph???i l???n h??n 0 !',
            'sotrang.required' => 'S??? trang s???n ph???m kh??ng ???????c ????? tr???ng !',
            'sotrang.alpha_num' => 'S??? trang nh???p v??o ph???i l?? s??? !',
            'sotrang.gt' => 'S??? trang s???n ph???m ph???i l???n h??n 0 !',
            'kichthuoc.required' => 'K??ch th?????c s???n ph???m kh??ng ???????c ????? tr???ng !',
            'gia.required' => 'Gi?? s???n ph???m kh??ng ???????c ????? tr???ng !',
            'gia.alpha_num' => 'Gi?? nh???p v??o ph???i l?? s??? !',
            'gia.min' => 'Gi?? s???n ph???m ph???i c?? ??t nh???t 4 s??? !',
            'mota.required' => 'M?? t??? s???n ph???m kh??ng ???????c ????? tr???ng !',
            'mota.min' => 'M?? t??? s???n ph???m c?? ??t nh???t 50 k?? t??? !',
            'thanhpho.required' => 'Vui l??ng ch???n t???nh th??nh ph??? !',
            'quanhuyen.required' => 'Vui l??ng ch???n qu???n huy???n !',
            'xaphuong.required' => 'Vui l??ng ch???n x?? ph?????ng !',
        ];

        $this->validate($request,[
            'anh_edit' => 'image',
            'ten' => 'required|min:2',
            'soluong' => 'required|alpha_num|gt:0',
            'sotrang' => 'required|alpha_num|gt:0',
            'kichthuoc' => 'required',
            'gia' => 'required|alpha_num|min:4',
            'thanhpho' => 'required',
            'quanhuyen' => 'required',
            'xaphuong' => 'required',
            'mota' => 'required|min:30',
        ], $messages);
        // R??ng bu???c d??? li???u

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
                    'sp_soluong' => $soluong,
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
            Session::flash("make", "Ch???nh s???a s???n ph???m th??nh c??ng !");
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

    public function find_products(Request $request){
        $id_nd = Auth::guard('nguoi_dung')->user()->nd_id;
        $tb_nd = DB::table('nguoi_dung')->where('nd_id', $id_nd)->first();

        $key = $request->key;
        $find_products = DB::table('san_pham')
        ->join('linh_vuc', 'linh_vuc.lv_id', 'san_pham.lv_id')
        ->join('the_loai', 'the_loai.tl_id', 'linh_vuc.tl_id')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'san_pham.nd_id')
        ->where('san_pham.nd_id', $tb_nd->nd_id)
        ->where('sp_ten','like','%'.$key.'%')
        ->orderby('sp_id','desc')->get();

        return view('client.page.search_product.index', compact('find_products', 'key'));
    }


}
