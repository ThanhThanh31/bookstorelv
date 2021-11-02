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
        return view('client.user.product.index');
    }
    public function pro($id)
    {

        $imagg = DB::table('anh')
        ->join('san_pham', 'san_pham.sp_id', 'anh.sp_id')
        ->where('anh.sp_id', $id)
        ->get();

        $pro = DB::table('san_pham')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'san_pham.nd_id')
        ->join('linh_vuc', 'linh_vuc.lv_id', 'san_pham.lv_id')
        ->join('the_loai', 'the_loai.tl_id', 'linh_vuc.tl_id')
        ->join('tac_gia', 'tac_gia.tg_id', 'san_pham.tg_id')
        ->join('nha_xuatban', 'nha_xuatban.nxb_id', 'san_pham.nxb_id')
        ->join('congty_phathanh', 'congty_phathanh.cty_id', 'san_pham.cty_id')
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
    public function cate($id)
    {
        $list_field = DB::table('the_loai')
        ->join('linh_vuc', 'linh_vuc.tl_id', 'the_loai.tl_id')
        ->where('the_loai.tl_id', $id)
        ->orderby('lv_id','desc')->get();

        $pro_field = DB::table('the_loai')
        ->join('linh_vuc', 'linh_vuc.tl_id', 'the_loai.tl_id')
        ->join('san_pham', 'san_pham.lv_id', 'linh_vuc.lv_id')
        ->where('the_loai.tl_id', $id)
        ->orderby('sp_id','desc')->paginate(6);
        $name_Cate = DB::table('the_loai')
        ->where('the_loai.tl_id', $id)
        ->get();

        return view('client.user.detail_field.index', compact('list_field', 'pro_field', 'name_Cate'));
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
