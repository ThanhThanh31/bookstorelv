<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Session;
use Illuminate\Http\Request;

class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $listCate = DB::table('the_loai')->orderby('tl_id','desc')->paginate(6);
        return view('admin.category.index', compact('listCate'));
    }

    public function addform(){
        return view('admin.category.add');
    }

    public function add(Request $request){
        $theloai = $request->theloai;
        $moTa = $request->moTa;
        $insert = DB::table('the_loai')->insert(
            [
                'tl_ten' => $theloai,
                'tl_mota' => $moTa,
            ]
            );
            Session::flash("get", "Thêm thể loại thành công !");
            return redirect()->route('cate.index');
    }

    public function delete($id){
        $del = DB::table('the_loai')->where('tl_id',$id)->delete();
        Session::flash("get", "Xóa thể loại thành công !");
        return redirect()->back();
    }

    public function edit($id){
        $category = DB::table('the_loai')->where('tl_id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $theloai = $request->theloai;
        $moTa = $request->moTa;
        $update = DB::table('the_loai')->where('tl_id', $id)->update(
            [
                'tl_ten' => $theloai,
                'tl_mota' => $moTa,
            ]
            );
            Session::flash("get", "Chỉnh sửa thể loại thành công !");
            return redirect()->route('cate.index');
    }
}
