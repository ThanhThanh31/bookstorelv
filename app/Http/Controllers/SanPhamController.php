<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function index(){
        $danhSach = DB::table('loai_sanpham')->get();
        return view('admin\sanpham\them_sp', compact('danhSach'));
    }

    public function Listsp(){
        $danhSachSP = DB::table('san_pham1')
        ->join('loai_sanpham', 'loai_sanpham.l_id', 'san_pham1.l_id')
        ->get();
        return view('admin\sanpham\list_sp', compact('danhSachSP'));
    }

    public function themSanPham(Request $request){
        $tensp = $request->tensp;
        $mota = $request->mota;
        $cachdung = $request->cachdung;
        $trangthai = $request->trangthai;
        $LoaiSanPham = $request->LoaiSanPham;
        $insert = DB::table('san_pham1')->insert(
            [
                'sp1_ten' => $tensp,
                'sp1_mota' => $mota,
                'sp1_cachdung' => $cachdung,
                'sp1_trangthai' => $trangthai,
                'l_id' => $LoaiSanPham,
            ]
            );
        echo('Thêm sản phẩm thành công !');
    }
}
