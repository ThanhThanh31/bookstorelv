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
        $author = DB::table('tac_gia')->orderby('tg_id','desc')->paginate(10);
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

        $messages = [
            'tacgia.required' => 'Tên tác giả không được để trống !',
            'tacgia.min' => 'Tên tác giả ít nhất phải 3 ký tự trở lên !',
             'tacgia.unique' => 'Tên tác giả này đã tồn tại. Vui lòng nhập tên khác !',
        ];

        $this->validate($request,[

            'tacgia' => 'required|min:3|unique:tac_gia,tg_ten',
        ], $messages);

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

        $messages = [
            'tacgia.required' => 'Tên tác giả không được để trống !',
            'tacgia.min' => 'Tên tác giả ít nhất phải 3 ký tự trở lên !',
        ];

        $this->validate($request,[

            'tacgia' => 'required|min:3',
        ], $messages);

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
