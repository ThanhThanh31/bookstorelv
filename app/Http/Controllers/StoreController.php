<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function list(){
        $listStore = DB::table('nguoi_dung')
        ->join('cua_hang', 'cua_hang.nd_id', 'nguoi_dung.nd_id')
        ->get();
        return view('admin.store.list', compact('listStore'));
    }

    public function browse($id)
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

    public function lock($id)
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

    public function open($id)
    {
            $upQuyen = DB::table('nguoi_dung')
            ->join('cua_hang', 'cua_hang.nd_id', 'nguoi_dung.nd_id')
            ->where('cua_hang.ch_id', $id)->update([
                'q_id' => 2, // chu cua hang
            ]);
            $idQuanTri = Auth::guard('quan_tri')->user()->qt_id;
            $update = DB::table('cua_hang')->where('ch_id', $id)->update([
                'ch_trangthai' => 1, // chu cua hang
                'qt_id' => $idQuanTri,
            ]);
            return redirect()->back();
    }

}
