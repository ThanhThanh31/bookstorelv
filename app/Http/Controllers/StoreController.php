<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Session;
use Auth;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function list(){
        $roll = DB::table('nguoi_dung')
        ->orderby('nd_id','desc')->paginate(6);
        return view('admin.user.index', compact('roll'));
    }

    public function align(){
        $align = DB::table('san_pham')
        ->join('linh_vuc', 'linh_vuc.lv_id', 'san_pham.lv_id')
        ->join('the_loai', 'the_loai.tl_id', 'linh_vuc.tl_id')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'san_pham.nd_id')
        ->select('nguoi_dung.*', 'san_pham.*', 'linh_vuc.*', 'the_loai.*')
        ->orderby('sp_id','desc')->paginate(5);
        return view('admin.product.index', compact('align'));
    }

    public function embattle(){
        $embattle = DB::table('bai_viet')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'bai_viet.nd_id')
        ->select('nguoi_dung.*', 'bai_viet.*')
        ->orderby('bv_id','desc')->paginate(4);
        return view('admin.post.index', compact('embattle'));
    }

    public function lock($id)
    {
            $khoaQuyen = DB::table('nguoi_dung')
            // ->join('cua_hang', 'cua_hang.nd_id', 'nguoi_dung.nd_id')
            ->where('nguoi_dung.nd_id', $id)->update([
                'q_id' => 2,  //cho duyet quyen
            ]);

            $idQuanTri = Auth::guard('quan_tri')->user()->qt_id;
            $update = DB::table('nguoi_dung')->where('nd_id', $id)->update([
                'nd_trangthai' => 2, // khoa tai khoan
                'qt_id' => $idQuanTri,
            ]);
            Session::flash("acc", "Khóa tài khoản người dùng thành công !");
            return redirect()->back();
    }

    public function open($id)
    {
            $upQuyen = DB::table('nguoi_dung')
            // ->join('cua_hang', 'cua_hang.nd_id', 'nguoi_dung.nd_id')
            ->where('nguoi_dung.nd_id', $id)->update([
                'q_id' => 1, // khach hang
            ]);
            $idQuanTri = Auth::guard('quan_tri')->user()->qt_id;
            $update = DB::table('nguoi_dung')->where('nd_id', $id)->update([
                'nd_trangthai' => 1, // dang hoat dong
                'qt_id' => $idQuanTri,
            ]);
            Session::flash("acc", "Mở khóa tài khoản người dùng thành công !");
            return redirect()->back();
    }

}
