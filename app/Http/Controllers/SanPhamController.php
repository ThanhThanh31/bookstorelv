<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function index(){
        $listPro = DB::table('the_loai')
        ->join('san_pham', 'san_pham.tl_id', 'the_loai.tl_id')
        ->get();
        return view('admin.product.index', compact('listPro'));
    }

    public function addForm(){
        $add = DB::table('the_loai')->get();
        return view('admin.product.add', compact('add'));
    }

    public function addPro(Request $request){
        $tensp = $request->tensp;
        $theloai = $request->theloai;
        $soluong = $request->soluong;
        $mota = $request->mota;
        $chitiet = $request->chitiet;
        $insert = DB::table('san_pham')->insert(
            [
                'sp_ten' => $tensp,
                'tl_id' => $theloai,
                'sp_soluong' => $soluong,
                'sp_mota' => $mota,
                'sp_chitiet' => $chitiet,
            ]
            );
            return redirect()->route('pro.index');
    }

    public function deletePro($id){
        $dell = DB::table('san_pham')->where('sp_id',$id)->delete();
        return redirect()->back();
    }

    public function editPro($id){
        $edit_product = DB::table('the_loai')
        ->join('san_pham', 'san_pham.tl_id', 'the_loai.tl_id')
        ->where('san_pham.sp_id', $id) 
        ->first();

        $list_cate = DB::table('the_loai')->get();
        return view('admin.product.edit', compact('edit_product', 'list_cate'));
    }

    public function updatePro(Request $request, $id){
        $tensp = $request->tensp;
        $theloai = $request->theloai;
        $soluong = $request->soluong;
        $mota = $request->mota;
        $chitiet = $request->chitiet;
        $update = DB::table('san_pham')->where('sp_id', $id)->update(
            [
                'sp_ten' => $tensp,
                'tl_id' => $theloai,
                'sp_soluong' => $soluong,
                'sp_mota' => $mota,
                'sp_chitiet' => $chitiet,
            ]
            );
            return redirect()->route('pro.index');
    }

}
