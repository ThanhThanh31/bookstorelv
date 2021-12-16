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

        $messages = [
            'tieude.required' => 'Tiêu đề giới thiệu website không được để trống !',
            'lienhe.required' => 'Nội dung liên hệ không được để trống !',
            'map.required' => 'Bản đồ website không được để trống !',
            'noidung.required' => 'Nội dung giới thiệu không được để trống !',
            'noidung.min' => 'Nội dung giới thiệu có ít nhất 50 ký tự !',
            'fanpage.required' => 'Địa chỉ fanpage không được để trống !',
        ];

        $this->validate($request,[
            'tieude' => 'required',
            'lienhe' => 'required',
            'map' => 'required',
            'noidung' => 'required|min:30',
            'fanpage' => 'required',
        ], $messages);

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
