<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Session;
use Illuminate\Http\Request;

class NhaXuatBanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = DB::table('nha_xuatban')->get();
        return view('admin.publisher.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.publisher.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function increased(Request $request)
    {
        $xuatban = $request->xuatban;
        $insert = DB::table('nha_xuatban')->insert(
            [
                'nxb_ten' => $xuatban,
            ]
            );
            Session::flash("publisher", "Thêm nhà xuât bản thành công !");
            return redirect()->route('publisher.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modified($id)
    {
        $editor = DB::table('nha_xuatban')->where('nxb_id', $id)->first();
        return view('admin.publisher.edit', compact('editor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updating(Request $request, $id)
    {
        $xuatban = $request->xuatban;
        $up = DB::table('nha_xuatban')->where('nxb_id', $id)->update(
            [
                'lb_ten' => $xuatban,
            ]
            );
            Session::flash("publisher", "Chỉnh sửa nhà xuât bản thành công !");
            return redirect()->route('publisher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eradicate($id)
    {
        $era = DB::table('nha_xuatban')->where('nxb_id',$id)->delete();
        Session::flash("publisher", "Xóa nhà xuât bản thành công !");
        return redirect()->back();
    }
}
