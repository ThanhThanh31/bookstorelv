<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Session;
use Auth;
// use File;
use Validator;
use Illuminate\Http\Request;

class AdminInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = DB::table('thong_tin')->where('tt_id', 1)->get();
        return view('admin.information.index', compact('contact'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $tieude = $request->tieude;
        $noidung = $request->noidung;
        $map = $request->map;
        $lienhe = $request->lienhe;
        $fanpage = $request->fanpage;
        $insert = DB::table('thong_tin')->insert(
            [
                'tt_tieude' => $tieude,
                'tt_noidung' => $noidung,
                'tt_bando' => $map,
                'tt_fanpage' => $fanpage,
                'tt_lienhe' => $lienhe,
            ]
            );
        // Session::flash("author", "Thêm tác giả thành công !");
        //     return redirect()->route('author.index');
        return view('admin.information.add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tieude = $request->tieude;
        $noidung = $request->noidung;
        $map = $request->map;
        $lienhe = $request->lienhe;
        $fanpage = $request->fanpage;

        if($tieude == "" || $tieude == null){
            Session::flash("no", "Tiêu đề thông tin website không được để trống !");
            return redirect()->back();
        }
        if($noidung == "" || $noidung == null){
            Session::flash("no", "Nội dung giới thiệu không được để trống !");
            return redirect()->back();
        }
        if($map == "" || $map == null){
            Session::flash("no", "Bản đồ không được để trống !");
            return redirect()->back();
        }
        if($fanpage == "" || $fanpage == null){
            Session::flash("no", "Fanpage website không được để trống !");
            return redirect()->back();
        }
        if($lienhe == "" || $lienhe == null){
            Session::flash("no", "Thông tin liên hệ không được để trống !");
            return redirect()->back();
        }

        $up = DB::table('thong_tin')->where('tt_id', $id)->update(
            [
                'tt_tieude' => $tieude,
                'tt_noidung' => $noidung,
                'tt_bando' => $map,
                'tt_fanpage' => $fanpage,
                'tt_lienhe' => $lienhe,
            ]
            );
            Session::flash("yes", "Chỉnh sửa thông tin trang website thành công !");
            return redirect()->route('admin.information');
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
