<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Auth;
use Session;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show = DB::table('linh_vuc')
        ->join('the_loai', 'the_loai.tl_id', 'linh_vuc.tl_id')
        ->orderby('lv_id','desc')->paginate(10);
        return view('admin.field.index', compact('show'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cateList = DB::table('the_loai')->orderby('tl_id','desc')
        ->get();
        return view('admin.field.add', compact('cateList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function season(Request $request)
    {
        $tenlinhVuc = $request->tenlinhVuc;
        $theloai = $request->theloai;

        $messages = [
            'tenlinhVuc.required' => 'Tên lĩnh vực sản phẩm không được để trống !',
            'tenlinhVuc.min' => 'Tên lĩnh vực sản phẩm ít nhất phải 3 ký tự trở lên !',
            'tenlinhVuc.unique' => 'Tên lĩnh vực này đã tồn tại. Vui lòng nhập tên lĩnh vực khác !',
            'theloai.required' => 'Vui lòng chọn thể loại cho lĩnh vực sản phẩm !',
        ];

        $this->validate($request,[

            'tenlinhVuc' => 'required|min:3|unique:linh_vuc,lv_ten',
            'theloai' => 'required',
        ], $messages);

        $insert = DB::table('linh_vuc')->insert(
            [
                'lv_ten' => $tenlinhVuc,
                'tl_id' => $theloai,
            ]
            );
            Session::flash("as", "Thêm lĩnh vực thành công !");
            return redirect()->route('field.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function efface($id)
    {
        $del = DB::table('linh_vuc')->where('lv_id',$id)->delete();
        Session::flash("as", "Xóa lĩnh vực thành công !");
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function wipe($id)
    {
        $categorys = DB::table('the_loai')
        ->get();

        $fields = DB::table('linh_vuc')->where('lv_id', $id)->first();
        return view('admin.field.edit', compact('fields', 'categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function uphold(Request $request, $id)
    {
        $tenlinhVuc = $request->tenlinhVuc;
        $theloai = $request->theloai;

        $messages = [
            'tenlinhVuc.required' => 'Tên lĩnh vực sản phẩm không được để trống !',
            'tenlinhVuc.min' => 'Tên lĩnh vực sản phẩm ít nhất phải 3 ký tự trở lên !',
            'theloai.required' => 'Vui lòng chọn thể loại cho lĩnh vực sản phẩm !',
        ];

        $this->validate($request,[

            'tenlinhVuc' => 'required|min:3',
            'theloai' => 'required',
        ], $messages);

        $update = DB::table('linh_vuc')->where('lv_id', $id)->update(
            [
                'lv_ten' => $tenlinhVuc,
                'tl_id' => $theloai,
            ]
            );
            Session::flash("as", "Chỉnh sửa lĩnh vực thành công !");
            return redirect()->route('field.index');
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
