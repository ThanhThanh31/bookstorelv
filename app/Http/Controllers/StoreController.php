<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class StoreController extends Controller
{
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

    // public function DSLoaisp(){
    //     $danhSachLoai = DB::table('loai_sanpham')->get();
    //     // view thuộc file blade
    //     return view('admin.loai_sp.list_lsp', compact('danhSachLoai'));
    // }

    // public function danhSach(){
    //     $danhSachTinh = DB::table('tinh_thanhpho')->get();
    //     // view thuộc file blade
    //     return view('danh_sach', compact('danhSachTinh'));
    // }
    // public function store(Request $request){
    //     $tenTinh = $request->tenTinh;
    //     $insert = DB::table('tinh_thanhpho')->insert(
    //         [
    //             'ttp_ten' => $tenTinh,
    //         ]
    //         );
    //     dd('Thêm thành công');
    // }


}
