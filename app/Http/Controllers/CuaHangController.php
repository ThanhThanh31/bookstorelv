<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Session;
use Auth;
use Illuminate\Http\Request;

class CuaHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function registerStore()
    // {
    //     return view('client.store.user.create');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function addStore(Request $request)
    // {
    //     if (Auth::guard('nguoi_dung')->check()){
    //         $idUser = Auth::guard('nguoi_dung')->user()->nd_id;
    //         $insert = DB::table('cua_hang')->insert([
    //             'ch_diachi' => $request->diaChi,
    //             'ch_tencuahang' => $request-> tenCuaHang,
    //             'ch_trangthai' => 0,
    //             'nd_id' => $idUser,
    //         ]);
    //         Session::flash("fine", "Đăng ký cửa hàng thành công. Chờ duyệt !");
    //             return redirect()->back();
    //     }else{
    //         Session::flash("un", "Đăng ký cửa hàng thất bại !");
    //         return redirect()->back();
    //         // return view('client.store.create');
    //     }
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function page()
    {
        $check = Auth::guard('nguoi_dung')->user()->nd_id;
        $checks = DB::table('nguoi_dung')->where('nd_id', $check)->first();

        $bai_viet = DB::table('bai_viet')->where('nd_id', $checks->nd_id)->get()->count();
        $san_pham = DB::table('san_pham')->where('nd_id', $checks->nd_id)->get()->count();
        $don_hang = DB::table('don_hang')->where('dh_id', $checks->nd_id)->get()->count();
        return view('client.page.index', compact('bai_viet', 'san_pham', 'don_hang'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function listCate()
    // {
    //     $id = Auth::guard('nguoi_dung')->user()->nd_id;
    //     $idd = DB::table('nguoi_dung')->where('nd_id', $id)->first();


    //     $listt = DB::table('theloai_nguoidung')
    //     ->join('the_loai', 'theloai_nguoidung.tl_id', '=', 'the_loai.tl_id')
    //     ->join('nguoi_dung', 'theloai_nguoidung.nd_id', '=', 'nguoi_dung.nd_id')
    //     ->where('theloai_nguoidung.nd_id', $idd->nd_id)
    //     // ->select('theloai_cuahang.tl_id', 'the_loai.tl_ten', 'cua_hang.ch_tencuahang')
    //     ->get();
    //     return view('client.store.category.index', compact('listt'));
    // }

    // public function show()
    // {
    //     $checkCate = DB::table('the_loai')->get();
    //     return view('client.store.category.add', compact('checkCate'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function choose(Request $request)
    // {
    //     $checkloai = $request->checkloai; //lấy list category vừa check vào checkbox có tên = checkloai []
    //     $idcheck = Auth::guard('nguoi_dung')->user()->nd_id; //lấy id user login store
    //     $idUser = DB::table('nguoi_dung')->where('nd_id', $idcheck)->first(); //lấy id store theo id user

    //     // vòng lặp mảng thể loại mỗi lần thêm vào
    //     foreach ($checkloai as $item){
    //         DB::table('theloai_nguoidung')->insert([
    //             'tl_id' => $item,
    //             'nd_id' => $idUser->nd_id,
    //         ]);
    //     }
    //     Session::flash("succ", "Thêm thể loại thành công !");
    //     return redirect()->route('store.category');
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function dele($idstore, $idCat)
    // {
    //     $dele = DB::table('theloai_nguoidung')->where('nd_id', $idstore)->where('tl_id', $idCat)->delete();
    //     Session::flash("succ", "Xóa thể loại thành công !");
    //     return redirect()->back();
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::guard('nguoi_dung')->logout();
        return redirect()->route('client.form');
    }

    // public function info(){
    //     $nd = Auth::guard('nguoi_dung')->user()->nd_id;
    //     $st = DB::table('cua_hang')->where('nd_id', $nd)->first();
    //     return view('client.store.user.edit', compact('st'));
    // }

    // public function refresh(Request $request, $id)
    // {
    //     $tenCuaHang = $request->tenCuaHang;
    //     $diaChi = $request->diaChi;
    //     $update = DB::table('cua_hang')->where('ch_id', $id)->update(
    //         [
    //             'ch_tencuahang' => $tenCuaHang,
    //             'ch_diachi' => $diaChi,
    //         ]
    //         );
    //         Session::flash("yeah", "Chỉnh sửa thông tin người dùng thành công !");
    //         return redirect()->route('store.info');
    // }

}
