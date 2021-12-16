<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Auth;
use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postList = DB::table('bai_viet')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'bai_viet.nd_id')
        ->select('nguoi_dung.*', 'bai_viet.*');

        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by=='latest'){
                $showPost = $postList
                ->orderby('bv_id','desc')->paginate(10)->appends(request()->query());
            }elseif($sort_by=='oldest'){
                $showPost = $postList
                ->orderby('bv_id','asc')->paginate(10)->appends(request()->query());
            }elseif($sort_by=='title_A_Z'){
                $showPost = $postList
                ->orderby('bv_tieude','asc')->paginate(10)->appends(request()->query());
            }elseif($sort_by=='title_Z_A'){
                $showPost = $postList
                ->orderby('bv_tieude','desc')->paginate(10)->appends(request()->query());
            }
        } else {
            $showPost = $postList->orderby('bv_id','desc')->paginate(2);
        }

        return view('client.user.post.index', compact('showPost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function post($id)
    {
        $post = DB::table('bai_viet')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'bai_viet.nd_id')
        ->select('nguoi_dung.*', 'bai_viet.*')
        ->where('bai_viet.bv_id', $id)
        ->first();

        $parent = DB::table('binh_luan')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'binh_luan.nd_id')
        ->select('nguoi_dung.*', 'binh_luan.*')
        ->where('bv_id', $id)
        ->where('bl_id_reply', null)
        ->get();

        $idParent = $parent->pluck('bl_id')->toArray();

        $child = DB::table('binh_luan')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'binh_luan.nd_id')
        ->select('nguoi_dung.*', 'binh_luan.*')
        ->whereIn('bl_id_reply', $idParent)
        ->orderBy('bl_id', 'asc')
        ->get();


        return view('client.user.post_detail.index', compact('post', 'parent', 'child'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        $keyword = $request->keyword;
        $search_post = DB::table('bai_viet')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'bai_viet.nd_id')
        ->where('bv_tieude','like','%'.$keyword.'%')->orWhere('bv_tomtat','like','%'.$keyword.'%')->orWhere('bv_noidung','like','%'.$keyword.'%')
        ->orWhere('username','like','%'.$keyword.'%')
        ->take(10)->orderby('bv_id','desc')->paginate(10);

        return view('client.user.search_post.index', compact('search_post', 'keyword'));
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
