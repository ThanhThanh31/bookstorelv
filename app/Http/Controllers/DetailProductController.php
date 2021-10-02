<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Session;
use Auth;
use Validator;
use Intervention\Image\Facades\Image as Image;
use App\Model\Photo;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class DetailProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function pro($id)
    {

        $imagg = DB::table('anh')
        ->join('san_pham', 'san_pham.sp_id', 'anh.sp_id')
        ->where('anh.sp_id', $id)
        ->get();

        $pro = DB::table('san_pham')
        ->join('linh_vuc', 'linh_vuc.lv_id', 'san_pham.lv_id')
        ->join('tac_gia', 'tac_gia.tg_id', 'san_pham.tg_id')
        ->join('nha_xuatban', 'nha_xuatban.nxb_id', 'san_pham.nxb_id')
        ->join('congty_phathanh', 'congty_phathanh.cty_id', 'san_pham.cty_id')
        ->join('the_loai', 'the_loai.tl_id', 'san_pham.tl_id')
        ->join('loai_bia', 'loai_bia.lb_id', 'san_pham.lb_id')
        ->join('anh', 'anh.sp_id', 'san_pham.sp_id')
        ->where('san_pham.sp_id', $id)
        ->first();

        return view('client.user.detail_product.index', compact('pro', 'imagg'));
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
