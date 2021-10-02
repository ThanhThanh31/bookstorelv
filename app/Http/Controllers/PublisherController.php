<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Session;
use Auth;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kh = Auth::guard('nguoi_dung')->user()->nd_id;
        $cs = DB::table('cua_hang')->where('nd_id', $kh)->first();


        $editor = DB::table('nhaxuatban_cuahang')
        ->join('nha_xuatban', 'nhaxuatban_cuahang.nxb_id', 'nha_xuatban.nxb_id')
        ->join('cua_hang', 'nhaxuatban_cuahang.ch_id', 'cua_hang.ch_id')
        ->where('nhaxuatban_cuahang.ch_id', $cs->ch_id)
        ->get();
        return view('client.store.publisher.index', compact('editor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function roll()
    {
        $checkEditor = DB::table('nha_xuatban')->get();
        return view('client.store.publisher.add', compact('checkEditor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function select(Request $request)
    {
        $creator = $request->creator; //lấy list category vừa check vào checkbox có tên = creator []
        $cus = Auth::guard('nguoi_dung')->user()->nd_id; //lấy id user login store
        $sh = DB::table('cua_hang')->where('nd_id', $cus)->first(); //lấy id store theo id user

        // vòng lặp mảng thể loại mỗi lần thêm vào
        foreach ($creator as $item){
            DB::table('nhaxuatban_cuahang')->insert([
                'nxb_id' => $item,
                'ch_id' => $sh->ch_id,
            ]);
        }
        Session::flash("editor", "Thêm nhà xuất bản thành công !");
        return redirect()->route('editor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminate($idstorefront, $ideditor)
    {
        $eliminate = DB::table('nhaxuatban_cuahang')->where('ch_id', $idstorefront)->where('nxb_id', $ideditor)->delete();
        Session::flash("editor", "Xóa nhà xuất bản thành công !");
        return redirect()->back();
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
