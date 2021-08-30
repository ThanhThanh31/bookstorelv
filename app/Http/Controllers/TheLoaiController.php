<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Illuminate\Http\Request;

class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $listCate = DB::table('the_loai')->get();
        return view('admin.category.index', compact('listCate'));  
    }

    public function addform(){
        return view('admin.category.add');
    }

    public function add(Request $request){
        $theloai = $request->theloai;
        $insert = DB::table('the_loai')->insert(
            [
                'tl_ten' => $theloai,
            ]
            );
            return redirect()->route('cate.index');
    }

    public function delete($id){
        $del = DB::table('the_loai')->where('tl_id',$id)->delete();
        return redirect()->back();
    }

    public function edit($id){
        $category = DB::table('the_loai')->where('tl_id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $theloai = $request->theloai;
        $update = DB::table('the_loai')->where('tl_id', $id)->update(
            [
                'tl_ten' => $theloai,
            ]
            );
            return redirect()->route('cate.index');
    }
}
