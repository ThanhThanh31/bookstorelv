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
        $h = DB::table('cua_hang')->where('nd_id', $n)->first();

        $show = DB::table('san_pham')
        ->join('linh_vuc', 'linh_vuc.lv_id', 'san_pham.lv_id')
        ->join('the_loai', 'the_loai.tl_id', 'san_pham.tl_id')
        ->where('san_pham.ch_id', $h->ch_id)
        ->get();
        return view('client.store.product.index', compact('show'));
    }

    public function addForm(){
        $id = Auth::guard('nguoi_dung')->user()->nd_id;
        $idd = DB::table('cua_hang')->where('nd_id', $id)->first();

        $tg = DB::table('tacgia_cuahang')
        ->join('tac_gia', 'tacgia_cuahang.tg_id', 'tac_gia.tg_id')
        ->join('cua_hang', 'tacgia_cuahang.ch_id', 'cua_hang.ch_id')
        ->where('tacgia_cuahang.ch_id', $idd->ch_id)
        ->get();

        $cty = DB::table('congty_cuahang')
        ->join('congty_phathanh', 'congty_cuahang.cty_id', 'congty_phathanh.cty_id')
        ->join('cua_hang', 'congty_cuahang.ch_id', 'cua_hang.ch_id')
        ->where('congty_cuahang.ch_id', $idd->ch_id)
        ->get();

        $lb = DB::table('loaibia_cuahang')
        ->join('loai_bia', 'loaibia_cuahang.lb_id', 'loai_bia.lb_id')
        ->join('cua_hang', 'loaibia_cuahang.ch_id', 'cua_hang.ch_id')
        ->where('loaibia_cuahang.ch_id', $idd->ch_id)
        ->get();

        $nxb = DB::table('nhaxuatban_cuahang')
        ->join('nha_xuatban', 'nhaxuatban_cuahang.nxb_id', 'nha_xuatban.nxb_id')
        ->join('cua_hang', 'nhaxuatban_cuahang.ch_id', 'cua_hang.ch_id')
        ->where('nhaxuatban_cuahang.ch_id', $idd->ch_id)
        ->get();

        $mix = DB::table('linh_vuc')
        ->join('the_loai', 'linh_vuc.tl_id', 'the_loai.tl_id')
        ->join('cua_hang', 'linh_vuc.ch_id', 'cua_hang.ch_id')
        ->where('linh_vuc.ch_id', $idd->ch_id)
        ->get();

        return view('client.store.product.add', compact('mix', 'tg', 'cty', 'lb', 'nxb'));
    }

    public function getProductTypeByCat ($id){
        $idUser =  Auth::guard('nguoi_dung')->user()->nd_id;
        $idStore = DB::table('cua_hang')->where('nd_id', $idUser)->first();
        $li = DB::table('linh_vuc')->where('tl_id', $id)->where('ch_id', $idStore->ch_id)->get();
        return response()->json($li, 200);
    }

    public function addPro(Request $request){
        $ten = $request->ten;
        $soluong = $request->soluong;
        $sotrang = $request->sotrang;
        $kichthuoc = $request->kichthuoc;
        $gia = $request->gia;
        $mota = $request->mota;
        $theloai = $request->theloai;
        $linhvuc = $request->linhvuc;
        $nhaxuatban = $request->nhaxuatban;
        $loaibia = $request->loaibia;
        $congty = $request->congty;
        $tacgia = $request->tacgia;

        // Trường bắt buộc
        // echo "<pre>";
        //     print_r($request->all());
        // echo "</pre>";

        // $messages = [
        //     'tensp.required' => 'Tên sản phẩm không được để trống !',
        //     'gia.required' => 'Giá sản phẩm không được để trống !',
        //     'soluong.required' => 'Số lượng sản phẩm không được để trống !',
        //     'mota.required' => 'Mô tả sản phẩm không được để trống !',
        //     'chitiet.required' => 'Thông tin chi tiết không được để trống !'
        // ];

        // $this->validate($request,[
        //     'tensp'=>'required',
        //     'gia'=>'required',
        //     'soluong'=>'required',
        //     'mota'=>'required',
        //     'chitiet'=>'required'
        // ], $messages);

        // $errors = $validate->errors();
        // Trường bắt buộc

        $nd = Auth::guard('nguoi_dung')->user()->nd_id;
        $ch = DB::table('cua_hang')->where('nd_id', $nd)->first();
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
                    'tl_id' => $theloai,
                    'lv_id' => $linhvuc,
                    'nxb_id' => $nhaxuatban,
                    'lb_id' => $loaibia,
                    'cty_id' => $congty,
                    'tg_id' => $tacgia,
                    'ch_id' => $ch->ch_id,
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
        $b = DB::table('cua_hang')->where('nd_id', $a)->first();

        $category = DB::table('theloai_cuahang')
        ->join('the_loai', 'theloai_cuahang.tl_id', 'the_loai.tl_id')
        ->join('cua_hang', 'theloai_cuahang.ch_id', 'cua_hang.ch_id')
        ->where('theloai_cuahang.ch_id', $b->ch_id)
        ->get();

        $field = DB::table('linh_vuc')
        ->join('the_loai', 'the_loai.tl_id', 'linh_vuc.tl_id')
        ->where('linh_vuc.ch_id', $b->ch_id)
        ->get();

        $type = DB::table('loaibia_cuahang')
        ->join('loai_bia', 'loaibia_cuahang.lb_id', 'loai_bia.lb_id')
        ->join('cua_hang', 'loaibia_cuahang.ch_id', 'cua_hang.ch_id')
        ->where('loaibia_cuahang.ch_id', $b->ch_id)
        ->get();

        $editor = DB::table('nhaxuatban_cuahang')
        ->join('nha_xuatban', 'nhaxuatban_cuahang.nxb_id', 'nha_xuatban.nxb_id')
        ->join('cua_hang', 'nhaxuatban_cuahang.ch_id', 'cua_hang.ch_id')
        ->where('nhaxuatban_cuahang.ch_id', $b->ch_id)
        ->get();

        $company = DB::table('congty_cuahang')
        ->join('congty_phathanh', 'congty_cuahang.cty_id', 'congty_phathanh.cty_id')
        ->join('cua_hang', 'congty_cuahang.ch_id', 'cua_hang.ch_id')
        ->where('congty_cuahang.ch_id', $b->ch_id)
        ->get();

        $author = DB::table('tacgia_cuahang')
        ->join('tac_gia', 'tacgia_cuahang.tg_id', 'tac_gia.tg_id')
        ->join('cua_hang', 'tacgia_cuahang.ch_id', 'cua_hang.ch_id')
        ->where('tacgia_cuahang.ch_id', $b->ch_id)
        ->get();

        $image = DB::table('anh')
        ->join('san_pham', 'san_pham.sp_id', 'anh.sp_id')
        ->where('anh.sp_id', $id)
        ->get();

        $product = DB::table('san_pham')
        ->join('linh_vuc', 'linh_vuc.lv_id', 'san_pham.lv_id')
        ->join('anh', 'anh.sp_id', 'san_pham.sp_id')
        ->where('san_pham.sp_id', $id)
        ->first();

        return view('client.store.product.edit', compact('category', 'product', 'field', 'type', 'editor', 'company', 'author', 'image'));
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
        $nhaxuatban = $request->nhaxuatban;
        $loaibia = $request->loaibia;
        $congty = $request->congty;
        $tacgia = $request->tacgia;

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
                    'tl_id' => $theloai,
                    'lv_id' => $linhvuc,
                    'nxb_id' => $nhaxuatban,
                    'lb_id' => $loaibia,
                    'cty_id' => $congty,
                    'tg_id' => $tacgia,
                ]
                );
            Session::flash("make", "Chỉnh sửa sản phẩm thành công !");
            return redirect()->route('pro.index');
    }

    public function link(){
        $idU = Auth::guard('nguoi_dung')->user()->nd_id;
        $idS = DB::table('cua_hang')->where('nd_id', $idU)->first();

        $i = DB::table('san_pham')
        ->join('anh', 'anh.sp_id', 'san_pham.sp_id')
        ->where('san_pham.ch_id', $idS->ch_id)
        ->get();
        return view('client.store.image_link.index', compact('i'));
    }

    public function erase($id){
    $dele = DB::table('anh')->where('a_id', $id)->delete();
        Session::flash("pulloff", "Xóa hình ảnh thành công !");
        return redirect()->back();
    }


}
