<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Session;
use Illuminate\Http\Request;

class AdminPostReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = DB::table('bai_viet')
        ->where('bv_tinhtrang', 2)
        ->orderby('bv_id','desc')
        ->paginate(10);
        return view('admin.post_report.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function highlight(Request $request, $id)
    {
        $list = DB::table('baocao_baiviet')
        ->join('bai_viet', 'bai_viet.bv_id', 'baocao_baiviet.bv_id')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'baocao_baiviet.nd_id')
        ->where('bai_viet.bv_id', $id)
        ->get();
        return view('admin.post_report.detail', compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pendent(Request $request, $id)
    {
        $admin = Auth::guard('quan_tri')->user()->qt_id;
        $baiviet = DB::table('bai_viet')->where('bv_id', $id)->update([
            'bv_tinhtrang' => 1,
            'qt_id' => $admin,
        ]);
            Session::flash("pendent", "Bài viết đã kiểm tra và mở khóa thành công !");
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function professed($id)
    {
        $shows = DB::table('bai_viet')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'bai_viet.nd_id')
        ->select('nguoi_dung.*', 'bai_viet.*')
        ->where('bai_viet.bv_id', $id)
        ->first();

        return view('admin.post_report.detail_post', compact('shows'));
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
