<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Session;
use Auth;
use Illuminate\Http\Request;

class BookJacketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nd = Auth::guard('nguoi_dung')->user()->nd_id;
        $h = DB::table('nguoi_dung')->where('nd_id', $nd)->first();


        $cover = DB::table('loaibia_nguoidung')
        ->join('loai_bia', 'loaibia_nguoidung.lb_id', 'loai_bia.lb_id')
        ->join('nguoi_dung', 'loaibia_nguoidung.nd_id', 'nguoi_dung.nd_id')
        ->where('loaibia_nguoidung.nd_id', $h->nd_id)
        ->get();
        return view('client.store.cover.index', compact('cover'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checklist()
    {
        $checkCover = DB::table('loai_bia')->get();
        return view('client.store.cover.add', compact('checkCover'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function adoption(Request $request)
    {
        $checkType = $request->checkType; //lấy list category vừa check vào checkbox có tên = checkType []
        $us = Auth::guard('nguoi_dung')->user()->nd_id; //lấy id user login store
        $store = DB::table('nguoi_dung')->where('nd_id', $us)->first(); //lấy id store theo id user

        // vòng lặp mảng thể loại mỗi lần thêm vào
        foreach ($checkType as $item){
            DB::table('loaibia_nguoidung')->insert([
                'lb_id' => $item,
                'nd_id' => $store->nd_id,
            ]);
        }
        Session::flash("cover", "Thêm loại bìa thành công !");
        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function erased($idshop, $idcover)
    {
        $erased = DB::table('loaibia_nguoidung')->where('nd_id', $idshop)->where('lb_id', $idcover)->delete();
        Session::flash("cover", "Xóa loại bìa thành công !");
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
