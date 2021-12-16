<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Session;
use Auth;
use Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $n = Auth::guard('nguoi_dung')->user()->nd_id;
        $h = DB::table('nguoi_dung')->where('nd_id', $n)->first();

        $show = DB::table('don_hang')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'don_hang.dh_id')
        ->join('donhang_chitiet', 'donhang_chitiet.dh_id', 'don_hang.dh_id')
        ->join('san_pham', 'san_pham.sp_id', 'donhang_chitiet.sp_id')
        ->where('san_pham.nd_id', $h->nd_id)
        ->select('don_hang.*', 'nguoi_dung.*')
        ->groupBy('don_hang.dh_id')
        ->get();

        return view('client.page.order.index', compact('show'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail_order($id)
    {
        $n = Auth::guard('nguoi_dung')->user()->nd_id;
        $h = DB::table('nguoi_dung')->where('nd_id', $n)->first();

        $shows = DB::table('donhang_chitiet')
        ->join('don_hang', 'don_hang.dh_id', 'donhang_chitiet.dh_id')
        ->join('san_pham', 'san_pham.sp_id', 'donhang_chitiet.sp_id')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'don_hang.dh_id')
        ->join('trangthai_donhang', 'trangthai_donhang.tt_id', 'don_hang.tt_id')
        ->where('san_pham.nd_id', $h->nd_id)
        ->get();

        $a = DB::table('don_hang')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'don_hang.dh_id')
        ->join('donhang_chitiet', 'donhang_chitiet.dh_id', 'don_hang.dh_id')
        ->join('san_pham', 'san_pham.sp_id', 'donhang_chitiet.sp_id')
        ->join('trangthai_donhang', 'trangthai_donhang.tt_id', 'don_hang.tt_id')
        ->join('tinh_thanhpho', 'tinh_thanhpho.ttp_id', 'don_hang.ttp_id')
        ->join('quan_huyen', 'quan_huyen.qh_id', 'don_hang.qh_id')
        ->join('xa_phuong', 'xa_phuong.xp_id', 'don_hang.xp_id')
        ->where('don_hang.dh_id', $id)
        ->groupBy('don_hang.dh_id')
        ->get();
        return view('client.page.order_detail.index', compact('shows', 'a'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delivery(Request $request, $id)
    {
        $trangthai = $request->trangthai;

        $updateDelivery = DB::table('don_hang')->where('dh_id', $id)->update([
            'tt_id' => $trangthai,
        ]);
        Session::flash("order", "Thay đổi trạng thái đơn hàng thành công !");
        return redirect()->route('order.index');
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
