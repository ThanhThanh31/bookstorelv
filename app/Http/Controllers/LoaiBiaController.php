<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Session;
use Illuminate\Http\Request;

class LoaiBiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = DB::table('loai_bia')->get();
        return view('admin.cover.index', compact('type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cover.add'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $loaibia = $request->loaibia;
        $insert = DB::table('loai_bia')->insert(
            [
                'lb_ten' => $loaibia,
            ]
            );
            Session::flash("fish", "Thêm loại bìa thành công !");
            return redirect()->route('cover.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = DB::table('loai_bia')->where('lb_id', $id)->first();
        return view('admin.cover.edit', compact('edit'));
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
        $loaibia = $request->loaibia;
        $up = DB::table('loai_bia')->where('lb_id', $id)->update(
            [
                'lb_ten' => $loaibia,
            ]
            );
            Session::flash("fish", "Chỉnh sửa loại bìa thành công !");
            return redirect()->route('cover.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $des = DB::table('loai_bia')->where('lb_id',$id)->delete();
        Session::flash("fish", "Xóa loại bìa thành công !");
        return redirect()->back();
    }
}
