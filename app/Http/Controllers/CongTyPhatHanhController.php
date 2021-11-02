<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Session;
use Illuminate\Http\Request;

class CongTyPhatHanhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = DB::table('congty_phathanh')->orderby('cty_id','desc')->paginate(6);
        return view('admin.company.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.add');
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
    public function padded(Request $request)
    {
        $congty = $request->congty;
        $insert = DB::table('congty_phathanh')->insert(
            [
                'cty_ten' => $congty,
            ]
            );
            Session::flash("company", "Thêm công ty phát hành thành công !");
            return redirect()->route('company.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function command($id)
    {
        $comm = DB::table('congty_phathanh')->where('cty_id', $id)->first();
        return view('admin.company.edit', compact('comm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upgraded(Request $request, $id)
    {
        $congty = $request->congty;
        $up = DB::table('congty_phathanh')->where('cty_id', $id)->update(
            [
                'cty_ten' => $congty,
            ]
            );
            Session::flash("company", "Chỉnh sửa công ty phát hành thành công !");
            return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        $des = DB::table('congty_phathanh')->where('cty_id',$id)->delete();
        Session::flash("fish", "Xóa công ty phát hành thành công !");
        return redirect()->back();
    }
}
