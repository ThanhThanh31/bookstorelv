<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Session;
use Auth;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function article(Request $request, $id)
    {
        $vipham = $request->vipham;
        $baiviet = DB::table('bai_viet')->where('bv_id', $id)->first();

        $nd = Auth::guard('nguoi_dung')->user()->nd_id;
        $db = DB::table('nguoi_dung')->where('nd_id', $nd)->first();

        if($vipham == "" || $vipham == null){
            Session::flash("danger", "Nội dung báo cáo vi phạm không hợp lệ !");
            return redirect()->back();
        }

        $insert = DB::table('baocao_baiviet')->insert(
            [
                'bb_noidung' => $vipham,
                'nd_id' => $db->nd_id,
                'bv_id' => $baiviet->bv_id,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateString()
            ]
            );

        $notify = DB::table('baocao_baiviet')
        ->select('bv_id', DB::raw('count(*) as total'))->groupBy('bv_id')->get();

        foreach($notify as $itemp => $key){
            if($key->total >= 3){
                $up = DB::table('bai_viet')->where('bv_id', $key->bv_id)->update(
                    [
                        'bv_tinhtrang' => 2,
                    ]
                    );
            }
        }
        Session::flash("article", "Báo cáo vi phạm thành công !");
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
