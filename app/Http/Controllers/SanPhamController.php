<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    // public function index(){
    //     $danhSach = DB::table('loai_sanpham')->get();
    //     return view('admin.sanpham.index', compact('danhSach'));
    // }
    public function index(){
        $danhSachSP = DB::table('loai_sanpham')
        ->join('san_pham1', 'san_pham1.l_id', 'loai_sanpham.l_id')
        ->get();
        return view('admin.sanpham.index', compact('danhSachSP'));
    }

    public function themSP(){
        $danhSach = DB::table('loai_sanpham')->get();
        return view('admin.sanpham.themsp', compact('danhSach'));
    }

    public function themSanPham(Request $request){
        $tensp = $request->tensp;
        $LoaiSanPham = $request->LoaiSanPham;
        $trangthai = $request->trangthai;
        $mota = $request->mota;
        $cachdung = $request->cachdung;
        $insert = DB::table('san_pham1')->insert(
            [
                'sp1_ten' => $tensp,
                'l_id' => $LoaiSanPham,
                'sp1_trangthai' => $trangthai,
                'sp1_mota' => $mota,
                'sp1_cachdung' => $cachdung,
            ]
            );
            return redirect()->route('sanpham.index');
    }

    public function xoaSanPham($id){
        $dell = DB::table('san_pham1')->where('sp1_id',$id)->delete();
        return redirect()->back();
    }

    public function editP($id){
        $edit_product = DB::table('loai_sanpham')
        ->join('san_pham1', 'san_pham1.l_id', 'loai_sanpham.l_id')
        ->where('san_pham1.sp1_id', $id)
        ->first();

        $list_cate = DB::table('loai_sanpham')->get();
        return view('admin.sanpham.editsp', compact('edit_product', 'list_cate'));
    }

    public function updateP(Request $request, $id){
        $tensp = $request->tensp;
        $LoaiSanPham = $request->LoaiSanPham;
        $trangthai = $request->trangthai;
        $mota = $request->mota;
        $cachdung = $request->cachdung;
        $update = DB::table('san_pham1')->where('sp1_id', $id)->update(
            [
                'sp1_ten' => $tensp,
                'l_id' => $LoaiSanPham,
                'sp1_trangthai' => $trangthai,
                'sp1_mota' => $mota,
                'sp1_cachdung' => $cachdung,
            ]
            );
            return redirect()->route('sanpham.index');
    }

    // public function Listsp(){
    //     $danhSachSP = DB::table('san_pham1')
    //     ->join('loai_sanpham', 'loai_sanpham.l_id', 'san_pham1.l_id')
    //     ->get();
    //     return view('admin\sanpham\list_sp', compact('danhSachSP'));
    // }
}
