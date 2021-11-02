<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function list(){
        $roll = DB::table('nguoi_dung')
        ->orderby('nd_id','desc')->paginate(6);
        return view('admin.user.index', compact('roll'));
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
            return redirect()->back();
    }

}
