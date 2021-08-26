<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Auth;
use Illuminate\Http\Request;

class CuaHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registerStore()
    {
        return view('client.store.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addStore(Request $request)
    {
        if (Auth::guard('nguoi_dung')->check()){
            $idUser = Auth::guard('nguoi_dung')->user()->nd_id;
            $insert = DB::table('cua_hang')->insert([
                'ch_diachi' => $request->diaChi,
                'ch_tencuahang' => $request-> tenCuaHang,
                'ch_trangthai' => 0,
                'nd_id' => $idUser,
            ]);
            dd('Đã đăng ký thành công. Chờ duyệt');
        }else{
            return view('client.store.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pageStore()
    {
        return view('client.store.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
