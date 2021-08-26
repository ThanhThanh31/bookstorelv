<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Illuminate\Http\Request;

class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $danhSachLoai = DB::table('loai_sanpham')->get();
        return view('admin.loai_sp.index', compact('danhSachLoai'));
    }

    public function them(){
        return view('admin.loai_sp.them');
    }

    public function themLoai(Request $request){
        $Loaisp = $request->Loaisp;
        $insert = DB::table('loai_sanpham')->insert(
            [
                'l_ten' => $Loaisp,
            ]
            );
            return redirect()->route('loaisp.index');
    }

    public function xoaLoai($id){
        $del = DB::table('loai_sanpham')->where('l_id',$id)->delete();
        return redirect()->back();
    }

    public function edit($id){
        $category = DB::table('loai_sanpham')->where('l_id', $id)->first();
        return view('admin.loai_sp.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $Loaisp = $request->Loaisp;
        $update = DB::table('loai_sanpham')->where('l_id', $id)->update(
            [
                'l_ten' => $Loaisp,
            ]
            );
            return redirect()->route('loaisp.index');
    }
}
