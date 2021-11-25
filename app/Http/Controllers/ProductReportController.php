<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Session;
use Auth;
use Validator;
use Illuminate\Http\Request;

class ProductReportController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request, $id) 
    {
        $noidungvipham = $request->noidungvipham;
        $idsanpham = DB::table('san_pham')->where('sp_id', $id)->first(); 

        $nd = Auth::guard('nguoi_dung')->user()->nd_id;
        $db = DB::table('nguoi_dung')->where('nd_id', $nd)->first();

        $insert = DB::table('baocao_sanpham')->insert(
            [
                'bp_noidung' => $noidungvipham,
                'nd_id' => $db->nd_id,
                'sp_id' => $idsanpham->sp_id,
            ]
            );

        $baocao = DB::table('baocao_sanpham')
        ->select('sp_id', DB::raw('count(*) as total'))->groupBy('sp_id')->get();

        foreach($baocao as $itemp => $key){
            if($key->total >= 3){
                $updates = DB::table('san_pham')->where('sp_id', $key->sp_id)->update(
                    [
                        'sp_tinhtrang' => 2,
                    ]
                    );
            }
        }
        Session::flash("report", "Báo cáo vi phạm thành công !");
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
