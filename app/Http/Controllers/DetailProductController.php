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

    public function index(Request $request)
    {
        $city = DB::table('tinh_thanhpho')->orderby('ttp_id','asc')->get();
        $theloai = DB::table('the_loai')->orderby('tl_id','desc')->get();
        $sanpham = DB::table('san_pham')
        ->join('tinh_thanhpho', 'tinh_thanhpho.ttp_id', 'san_pham.ttp_id')
        ->join('linh_vuc', 'linh_vuc.lv_id', 'san_pham.lv_id')
        ->join('the_loai', 'the_loai.tl_id', 'linh_vuc.tl_id')
        ->orderby('sp_id','desc')->paginate(9);

        $min_price = DB::table('san_pham')->min('sp_gia');
        $max_price = DB::table('san_pham')->max('sp_gia');

        $min_price_range = $min_price;
        $max_price_range = $max_price + 10000;

        if($request->id_city){
            $id_city = $request->id_city;
            $sanpham = DB::table('san_pham')->where('ttp_id', $id_city)->orderby('sp_id','desc')->paginate(9)->appends(request()->query());
        }elseif(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by=='prices_decrease'){
                $sanpham = DB::table('san_pham')->orderby('sp_gia','desc')->paginate(9)->appends(request()->query());
            }elseif($sort_by=='prices_increase'){
                $sanpham = DB::table('san_pham')->orderby('sp_gia','asc')->paginate(9)->appends(request()->query());
            }elseif($sort_by=='name_A_Z'){
                $sanpham = DB::table('san_pham')->orderby('sp_ten','asc')->paginate(9)->appends(request()->query());
            }elseif($sort_by=='name_Z_A'){
                $sanpham = DB::table('san_pham')->orderby('sp_ten','desc')->paginate(9)->appends(request()->query());
            }
        }elseif(isset($_GET['start_price']) && $_GET['end_price']){
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];
            $sanpham = DB::table('san_pham')->whereBetween('sp_gia',[$min_price,$max_price])
            ->orderBy('sp_gia','ASC')->paginate(9)->appends(request()->query());
        }
        return view('client.user.product.index', compact('city', 'theloai', 'sanpham', 'min_price', 'max_price', 'min_price_range', 'max_price_range'));
    }

    public function cate(Request $request, $id)
    {
        $list_field = DB::table('the_loai')
        ->join('linh_vuc', 'linh_vuc.tl_id', 'the_loai.tl_id')
        ->where('the_loai.tl_id', $id)
        ->orderby('lv_id','desc')->get();

        $pro_field = DB::table('the_loai')
        ->join('linh_vuc', 'linh_vuc.tl_id', 'the_loai.tl_id')
        ->join('san_pham', 'san_pham.lv_id', 'linh_vuc.lv_id')
        ->where('the_loai.tl_id', $id)
        ->orderby('sp_id','desc')->paginate(9);
        $name_Cate = DB::table('the_loai')
        ->where('the_loai.tl_id', $id)
        ->get();

        $city = DB::table('tinh_thanhpho')->orderby('ttp_id','asc')->get();
        $min_price = DB::table('san_pham')->min('sp_gia');
        $max_price = DB::table('san_pham')->max('sp_gia');

        $min_price_range = $min_price;
        $max_price_range = $max_price + 10000;

        if($request->id_city){
            $id_city = $request->id_city;
            $pro_field = DB::table('san_pham')->where('ttp_id', $id_city)->orderby('sp_id','desc')->paginate(9)->appends(request()->query());
        }elseif(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by=='prices_decrease'){
                $pro_field = DB::table('san_pham')->orderby('sp_gia','desc')->paginate(9)->appends(request()->query());
            }elseif($sort_by=='prices_increase'){
                $pro_field = DB::table('san_pham')->orderby('sp_gia','asc')->paginate(9)->appends(request()->query());
            }elseif($sort_by=='name_A_Z'){
                $pro_field = DB::table('san_pham')->orderby('sp_ten','asc')->paginate(9)->appends(request()->query());
            }elseif($sort_by=='name_Z_A'){
                $pro_field = DB::table('san_pham')->orderby('sp_ten','desc')->paginate(9)->appends(request()->query());
            }
        }elseif(isset($_GET['start_price']) && $_GET['end_price']){
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];
            $pro_field = DB::table('san_pham')->whereBetween('sp_gia',[$min_price,$max_price])
            ->orderBy('sp_gia','ASC')->paginate(9)->appends(request()->query());
        }

        return view('client.user.detail_field.index', compact('list_field', 'pro_field', 'name_Cate', 'city', 'min_price', 'max_price', 'min_price_range', 'max_price_range'));
    }

    public function pro($id)
    {
        $imagg = DB::table('anh')
        ->join('san_pham', 'san_pham.sp_id', 'anh.sp_id')
        ->select('san_pham.*', 'anh.*')
        ->where('anh.sp_id', $id)
        ->orderby('a_id','desc')
        ->get();

        $pro = DB::table('san_pham')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'san_pham.nd_id')
        ->join('tinh_thanhpho', 'tinh_thanhpho.ttp_id', 'san_pham.ttp_id')
        ->join('quan_huyen', 'quan_huyen.qh_id', 'san_pham.qh_id')
        ->join('xa_phuong', 'xa_phuong.xp_id', 'san_pham.xp_id')
        ->join('linh_vuc', 'linh_vuc.lv_id', 'san_pham.lv_id')
        ->join('the_loai', 'the_loai.tl_id', 'linh_vuc.tl_id')
        ->join('tac_gia', 'tac_gia.tg_id', 'san_pham.tg_id')
        ->join('nha_xuatban', 'nha_xuatban.nxb_id', 'san_pham.nxb_id')
        ->join('congty_phathanh', 'congty_phathanh.cty_id', 'san_pham.cty_id')
        ->join('loai_bia', 'loai_bia.lb_id', 'san_pham.lb_id')
        ->where('san_pham.sp_id', $id)
        ->first();

        $parent = DB::table('binhluan_sanpham')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'binhluan_sanpham.nd_id')
        ->select('nguoi_dung.*', 'binhluan_sanpham.*')
        ->where('sp_id', $id)
        ->where('bs_id_reply', null)
        ->get();

        $idParent = $parent->pluck('bs_id')->toArray();

        $child = DB::table('binhluan_sanpham')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'binhluan_sanpham.nd_id')
        ->select('nguoi_dung.*', 'binhluan_sanpham.*')
        ->whereIn('bs_id_reply', $idParent)
        ->orderBy('bs_id', 'asc')
        ->get();

        //show theo linh vuc
        $same_field = DB::table('san_pham')
        ->join('linh_vuc', 'linh_vuc.lv_id', 'san_pham.lv_id')
        ->where('linh_vuc.lv_id', $pro->lv_id)->where('sp_id', '<>', $pro->sp_id)->orderby('sp_id','desc')->get();

        //show theo the loai
        $same = DB::table('san_pham')
        ->join('linh_vuc', 'linh_vuc.lv_id', 'san_pham.lv_id')
        ->join('the_loai', 'the_loai.tl_id', 'linh_vuc.tl_id')
        ->where('the_loai.tl_id', $pro->tl_id)->where('sp_id', '<>', $pro->sp_id)->orderby('sp_id','desc')->get();

        return view('client.user.detail_product.index', compact('pro', 'imagg', 'same', 'parent', 'child'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

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
