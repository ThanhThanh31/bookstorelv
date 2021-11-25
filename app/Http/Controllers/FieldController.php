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
        ->orderby('lv_id','desc')->paginate(6);
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
