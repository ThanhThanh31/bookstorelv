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
        $listCate = DB::table('the_loai')->orderby('tl_id','desc')->paginate(10);
        return view('admin.category.index', compact('listCate'));
    }

    public function addform(){
        return view('admin.category.add');
    }

    public function add(Request $request){
        $theloai = $request->theloai;
        $moTa = $request->moTa;

        $messages = [
            'theloai.required' => 'Tên thể loại sản phẩm không được để trống !',
            'theloai.min' => 'Tên thể loại sản phẩm ít nhất phải 3 ký tự trở lên !',
            'theloai.max' => 'Tên thể loại sản phẩm tối đa chỉ 30 ký tự !',
            'theloai.unique' => 'Tên thể loại sản phẩm này đã tồn tại. Vui lòng nhập tên khác !',
            'moTa.required' => 'Mô tả thể loại không được để trống !',
            'moTa.min' => 'Mô tả thể loại sản phẩm phải có ít nhất 50 ký tự !',
        ];

        $this->validate($request,[

            'theloai' => 'required|min:3|max:30|unique:the_loai,tl_ten', //tên table the_loai
            'moTa' => 'required|min:50',
        ], $messages);

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

        $messages = [
            'theloai.required' => 'Tên thể loại sản phẩm không được để trống !',
            'theloai.min' => 'Tên thể loại sản phẩm ít nhất phải 3 ký tự trở lên !',
            'theloai.max' => 'Tên thể loại sản phẩm tối đa chỉ 30 ký tự !',
            'moTa.required' => 'Mô tả thể loại không được để trống !',
            'moTa.min' => 'Mô tả thể loại sản phẩm phải có ít nhất 50 ký tự !',
        ];

        $this->validate($request,[

            'theloai' => 'required|min:3|max:30',
            'moTa' => 'required|min:50',
        ], $messages);

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
