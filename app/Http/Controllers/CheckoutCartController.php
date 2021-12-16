<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Session;
use Auth;
use Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckoutCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subtotal = Cart::subtotal(0);
        $tp = DB::table('tinh_thanhpho')
        ->orderby('ttp_id','asc')->get();
        return view('client.user.checkout.index', compact('subtotal', 'tp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProvinceByCity ($id){
        $province = DB::table('quan_huyen')->where('ttp_id', $id)->orderby('qh_id','asc')->get();
        return response()->json($province, 200);
    }

    public function getWardByProvince ($id){
        $ward = DB::table('xa_phuong')->where('qh_id', $id)->orderby('xp_id','asc')->get();
        return response()->json($ward, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
        $subtotal = Cart::subtotal(0);
        $thanhpho = $request->thanhpho;
        $quanhuyen = $request->quanhuyen;
        $xaphuong = $request->xaphuong;
        $diachi = $request->diachi;
        $phuongthuc = $request->phuongthuc;
        $ghichu = $request->ghichu;

        $nd = Auth::guard('nguoi_dung')->user()->nd_id;
        $ch = DB::table('nguoi_dung')->where('nd_id', $nd)->first();

        $insert_dh = DB::table('don_hang')->insertGetId(
            [
                'dh_phuongthuc' => $phuongthuc,
                'dh_ghichu' => $ghichu,
                'dh_tongtien' => $subtotal,
                'dh_diachi' => $diachi,
                'ttp_id' => $thanhpho,
                'qh_id' => $quanhuyen,
                'xp_id' => $xaphuong,
                'nd_id' => $ch->nd_id,
                'dh_ngaylap' => Carbon::now('Asia/Ho_Chi_Minh')->toDateString()
            ]
            );

            foreach(Cart::content() as $key => $val) {
                $insert = DB::table('donhang_chitiet')->insert(
                    [
                        'dh_id' => $insert_dh,
                        'sp_id' => $val->id,
                        'so_luong' => $val->qty,
                        'don_gia' => $val->price,
                    ]
                    );
                }
            Cart::destroy();
        Session::flash("feedback", "Thanh toán đơn hàng thành công !");
        return redirect()->route('checkout.index');
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
