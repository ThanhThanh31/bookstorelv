<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Session;
use Illuminate\Http\Request;

class AdminProductReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $report = DB::table('san_pham')
        ->where('sp_tinhtrang', 2)
        ->orderby('sp_id','asc')
        ->paginate(6);
        return view('admin.pro_report.index', compact('report'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail_report(Request $request, $id)
    {
        $li = DB::table('baocao_sanpham')
        ->join('san_pham', 'san_pham.sp_id', 'baocao_sanpham.sp_id')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'baocao_sanpham.nd_id')
        ->where('san_pham.sp_id', $id)
        ->get();
        return view('admin.pro_report.detail', compact('li'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function overt($id)
    {
            $admin = Auth::guard('quan_tri')->user()->qt_id;
            $sanpham = DB::table('san_pham')->where('sp_id', $id)->update([
                'sp_tinhtrang' => 1,
                'qt_id' => $admin,
            ]);
            Session::flash("overt", "Sản phẩm đã kiểm tra và mở khóa thành công !");
            return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail_pro(Request $request, $id)
    {
        $image = DB::table('anh')
        ->join('san_pham', 'san_pham.sp_id', 'anh.sp_id')
        ->where('anh.sp_id', $id)
        ->get();

        $show = DB::table('san_pham')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'san_pham.nd_id')
        ->join('tinh_thanhpho', 'tinh_thanhpho.ttp_id', 'san_pham.ttp_id')
        ->join('linh_vuc', 'linh_vuc.lv_id', 'san_pham.lv_id')
        ->join('the_loai', 'the_loai.tl_id', 'linh_vuc.tl_id')
        ->join('tac_gia', 'tac_gia.tg_id', 'san_pham.tg_id')
        ->join('nha_xuatban', 'nha_xuatban.nxb_id', 'san_pham.nxb_id')
        ->join('congty_phathanh', 'congty_phathanh.cty_id', 'san_pham.cty_id')
        ->join('loai_bia', 'loai_bia.lb_id', 'san_pham.lb_id')
        ->join('anh', 'anh.sp_id', 'san_pham.sp_id')
        ->where('san_pham.sp_id', $id)
        ->first();

        return view('admin.pro_report.detail_pro', compact('show', 'image'));
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
