<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Auth;
use Session;
use Intervention\Image\Facades\Image as Image;
use App\Model\Photo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AllSearchAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function seek_category(Request $request)
    {
        $key_cate = $request->key_cate;
        $search_category = DB::table('the_loai')
        ->where('tl_ten','like','%'.$key_cate.'%')->orWhere('tl_id','like','%'.$key_cate.'%')
        ->take(10)->orderby('tl_id','desc')->get();

        return view('admin.search_category.index', compact('search_category', 'key_cate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function seek_field(Request $request)
    {
        $key_field = $request->key_field;
        $search_field = DB::table('linh_vuc')
        ->join('the_loai', 'the_loai.tl_id', 'linh_vuc.tl_id')
        ->where('lv_ten','like','%'.$key_field.'%')->orWhere('lv_id','like','%'.$key_field.'%')
        ->orWhere('tl_ten','like','%'.$key_field.'%')
        ->orderby('lv_id','desc')->get();

        return view('admin.search_field.index', compact('search_field', 'key_field'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function seek_author(Request $request)
    {
        $key_author = $request->key_author;
        $search_author = DB::table('tac_gia')
        ->where('tg_ten','like','%'.$key_author.'%')->orWhere('tg_id','like','%'.$key_author.'%')
        ->orderby('tg_id','desc')->get();

        return view('admin.search_author.index', compact('search_author', 'key_author'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function seek_publisher(Request $request)
    {
        $key_publisher = $request->key_publisher;
        $search_publisher = DB::table('nha_xuatban')
        ->where('nxb_ten','like','%'.$key_publisher.'%')->orWhere('nxb_id','like','%'.$key_publisher.'%')
        ->orderby('nxb_id','desc')->get();

        return view('admin.search_publisher.index', compact('search_publisher', 'key_publisher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function seek_cover(Request $request)
    {
        $key_cover = $request->key_cover;
        $search_cover = DB::table('loai_bia')
        ->where('lb_ten','like','%'.$key_cover.'%')->orWhere('lb_id','like','%'.$key_cover.'%')
        ->orderby('lb_id','desc')->get();

        return view('admin.search_cover.index', compact('search_cover', 'key_cover'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function seek_company(Request $request)
    {
        $key_company = $request->key_company;
        $search_company = DB::table('congty_phathanh')
        ->where('cty_ten','like','%'.$key_company.'%')->orWhere('cty_id','like','%'.$key_company.'%')
        ->orderby('cty_id','desc')->get();

        return view('admin.search_company.index', compact('search_company', 'key_company'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function seek_user(Request $request)
    {
        $key_user = $request->key_user;
        $search_user = DB::table('nguoi_dung')
        ->where('username','like','%'.$key_user.'%')->orWhere('nd_id','like','%'.$key_user.'%')->orWhere('email','like','%'.$key_user.'%')
        ->orderby('nd_id','desc')->get();

        return view('admin.search_user.index', compact('search_user', 'key_user'));
    }

    public function seek_post(Request $request)
    {
        $key_post = $request->key_post;
        $search_post = DB::table('bai_viet')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'bai_viet.nd_id')
        ->where('bv_tieude','like','%'.$key_post.'%')->orWhere('bv_id','like','%'.$key_post.'%')->orWhere('username','like','%'.$key_post.'%')
        ->orderby('bv_id','desc')->get();

        return view('admin.search_post.index', compact('search_post', 'key_post'));
    }

    public function seek_product(Request $request)
    {
        $key_product = $request->key_product;
        $search_product = DB::table('san_pham')
        ->join('linh_vuc', 'linh_vuc.lv_id', 'san_pham.lv_id')
        ->join('the_loai', 'the_loai.tl_id', 'linh_vuc.tl_id')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'san_pham.nd_id')
        ->where('sp_ten','like','%'.$key_product.'%')->orWhere('sp_id','like','%'.$key_product.'%')
        ->orWhere('tl_ten','like','%'.$key_product.'%')->orWhere('lv_ten','like','%'.$key_product.'%')
        ->orWhere('username','like','%'.$key_product.'%')
        ->orderby('sp_id','desc')->get();

        return view('admin.search_product.index', compact('search_product', 'key_product'));
    }
}
