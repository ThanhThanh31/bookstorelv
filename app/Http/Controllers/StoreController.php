<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(){
        return view('admin\loai_sp\them_lsp');
    }

    public function DSLoaisp(){
        $danhSachLoai = DB::table('loai_sanpham')->get();
        // view thuộc file blade
        return view('admin\loai_sp\list_lsp', compact('danhSachLoai'));
    }

    public function themLoai(Request $request){
        $loaisp = $request->loaisp;
        $insert = DB::table('loai_sanpham')->insert(
            [
                'l_ten' => $loaisp,
            ]
            );
        echo('Thêm loại sản phẩm thành công !');
    }

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
