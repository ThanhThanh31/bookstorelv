<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Session;
use Illuminate\Http\Request;

class TacGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = DB::table('tac_gia')->get();
        return view('admin.author.index', compact('author'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.add');
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
    public function add(Request $request)
    {
        $tacgia = $request->tacgia;
        $insert = DB::table('tac_gia')->insert(
            [
                'tg_ten' => $tacgia,
            ]
            );
            Session::flash("author", "Thêm tác giả thành công !");
            return redirect()->route('author.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manipulate($id)
    {
        $show = DB::table('tac_gia')->where('tg_id', $id)->first();
        return view('admin.author.edit', compact('show'));
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
        $tacgia = $request->tacgia;
        $up = DB::table('tac_gia')->where('tg_id', $id)->update(
            [
                'tg_ten' => $tacgia,
            ]
            );
            Session::flash("author", "Chỉnh sửa tác giả thành công !");
            return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $delete = DB::table('tac_gia')->where('tg_id',$id)->delete();
        Session::flash("author", "Xóa tác giả thành công !");
        return redirect()->back();
    }
}
