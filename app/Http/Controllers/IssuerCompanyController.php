<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Session;
use Auth;
use Illuminate\Http\Request;

class IssuerCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employer = Auth::guard('nguoi_dung')->user()->nd_id;
        $place = DB::table('cua_hang')->where('nd_id', $employer)->first();


        $ds = DB::table('congty_cuahang')
        ->join('congty_phathanh', 'congty_cuahang.cty_id', 'congty_phathanh.cty_id')
        ->join('cua_hang', 'congty_cuahang.ch_id', 'cua_hang.ch_id')
        ->where('congty_cuahang.ch_id', $place->ch_id)
        ->get();
        return view('client.store.company.index', compact('ds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function namlist()
    {
        $checkIssuer = DB::table('congty_phathanh')->get();
        return view('client.store.company.add', compact('checkIssuer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pick(Request $request)
    {
        $iss = $request->iss; //lấy list category vừa check vào checkbox có tên = checkType []
        $patronage = Auth::guard('nguoi_dung')->user()->nd_id; //lấy id user login store
        $mall = DB::table('cua_hang')->where('nd_id', $patronage)->first(); //lấy id store theo id user

        // vòng lặp mảng thể loại mỗi lần thêm vào
        foreach ($iss as $item){
            DB::table('congty_cuahang')->insert([
                'cty_id' => $item,
                'ch_id' => $mall->ch_id,
            ]);
        }
        Session::flash("issuer", "Thêm công ty phát hành thành công !");
        return redirect()->route('issuer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function berlin($iddepartment, $idissuer)
    {
        $berlin = DB::table('congty_cuahang')->where('ch_id', $iddepartment)->where('cty_id', $idissuer)->delete();
        Session::flash("issuer", "Xóa công ty phát hành thành công !");
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
