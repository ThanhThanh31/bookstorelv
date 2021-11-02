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

        $mix = DB::table('the_loai')
        ->orderby('tl_id','desc')->get();

        return view('client.page.product.add', compact('mix', 'tg', 'cty', 'lb', 'nxb'));
    }

    public function getProductTypeByCat ($id){
        // $idUser =  Auth::guard('nguoi_dung')->user()->nd_id;
        // $idStore = DB::table('nguoi_dung')->where('nd_id', $idUser)->first();
        // $li = DB::table('linh_vuc')->where('tl_id', $id)->where('nd_id', $idStore->nd_id)->get();
        $li = DB::table('linh_vuc')->where('tl_id', $id)->orderby('lv_id','desc')->get();
        return response()->json($li, 200);
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

        $product = DB::table('san_pham')
        ->join('linh_vuc', 'linh_vuc.lv_id', 'san_pham.lv_id')
        ->join('anh', 'anh.sp_id', 'san_pham.sp_id')
        ->where('san_pham.sp_id', $id)
        ->first();

        return view('client.page.product.edit', compact('category', 'product', 'field', 'type', 'editor', 'company', 'author', 'image'));
    }

    public function amend(Request $request, $id){
        $ten = $request->ten;
        $trangthai = $request->trangthai;
        $sotrang = $request->sotrang;
        $kichthuoc = $request->kichthuoc;
        $gia = $request->gia;
        $mota = $request->mota;
        $linhvuc = $request->linhvuc;
        $nhaxuatban = $request->nhaxuatban;
        $loaibia = $request->loaibia;
        $congty = $request->congty;
        $tacgia = $request->tacgia;
        $link = $request->link;

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


}
