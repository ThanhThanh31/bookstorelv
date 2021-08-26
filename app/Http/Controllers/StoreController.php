<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function list(){
        $quantri = DB::table('cua_hang')
        ->join('quan_tri', 'quan_tri.qt_id', 'cua_hang.ch_id')
        ->get();

        $listStore = DB::table('cua_hang')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'cua_hang.ch_id')
        ->get();
        return view('admin.cuahang.list', compact('quantri', 'listStore'));
    }

    public function duyet($id)
    {
            $upQuyen = DB::table('nguoi_dung')
            ->join('cua_hang', 'cua_hang.nd_id', 'nguoi_dung.nd_id')
            ->where('cua_hang.ch_id', $id)->update([
                'q_id' => 2, // chu cua hang
            ]);

            $idQuanTri = Auth::guard('quan_tri')->user()->qt_id;
            $update = DB::table('cua_hang')->where('ch_id', $id)->update([
                'ch_trangthai' => 1,  // da duyet cua hang
                'qt_id' => $idQuanTri,
            ]);
            return redirect()->back();
    }

    public function khoa($id)
    {
            $khoaQuyen = DB::table('nguoi_dung')
            ->join('cua_hang', 'cua_hang.nd_id', 'nguoi_dung.nd_id')
            ->where('cua_hang.ch_id', $id)->update([
                'q_id' => 1,  //khach hang
            ]);

            $idQuanTri = Auth::guard('quan_tri')->user()->qt_id;
            $update = DB::table('cua_hang')->where('ch_id', $id)->update([
                'ch_trangthai' => 2, // khoa
                'qt_id' => $idQuanTri,
            ]);
            return redirect()->back();
    }

    public function mo($id)
    {
            $idQuanTri = Auth::guard('quan_tri')->user()->qt_id;
            $update = DB::table('cua_hang')->where('ch_id', $id)->update([
                'ch_trangthai' => 1, // chu cua hang
                'qt_id' => $idQuanTri,
            ]);
            return redirect()->back();
    }

}
