<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Auth;
use Illuminate\Http\Request;

class LinhVucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idi = Auth::guard('nguoi_dung')->user()->nd_id;
        $iidd = DB::table('cua_hang')->where('nd_id', $idi)->first();

        $showfield = DB::table('linh_vuc')
        ->join('the_loai', 'the_loai.tl_id', '=', 'linh_vuc.tl_id')
        ->where('linh_vuc.ch_id', $iidd->ch_id)
        ->get();
        return view('client.store.field.index', compact('showfield'));
        // dd($showfield);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formfield()
    {
        $id = Auth::guard('nguoi_dung')->user()->nd_id;
        $idd = DB::table('cua_hang')->where('nd_id', $id)->first();

        $addd = DB::table('theloai_cuahang')
        ->join('the_loai', 'theloai_cuahang.tl_id', '=', 'the_loai.tl_id')
        ->join('cua_hang', 'theloai_cuahang.ch_id', '=', 'cua_hang.ch_id')
        ->where('theloai_cuahang.ch_id', $idd->ch_id)
        ->get();
        return view('client.store.field.add', compact('addd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $tenLinhvuc = $request->tenLinhvuc;
        $theLoai = $request->theLoai;
        $iid = Auth::guard('nguoi_dung')->user()->nd_id;
        $iidd = DB::table('cua_hang')->where('nd_id', $iid)->first();

        $insert = DB::table('linh_vuc')->insert(
            [
                'lv_ten' => $tenLinhvuc,
                'tl_id' => $theLoai,
                'ch_id' => $iidd->ch_id,
            ]
            );
            return redirect()->route('store.field');
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
        $ii = Auth::guard('nguoi_dung')->user()->nd_id;
        $dd = DB::table('cua_hang')->where('nd_id', $ii)->first();

        $list_category = DB::table('theloai_cuahang')
        ->join('the_loai', 'theloai_cuahang.tl_id', '=', 'the_loai.tl_id')
        ->join('cua_hang', 'theloai_cuahang.ch_id', '=', 'cua_hang.ch_id')
        ->where('theloai_cuahang.ch_id', $dd->ch_id)
        ->get();

        $edit_field = DB::table('linh_vuc')
        ->join('the_loai', 'the_loai.tl_id', '=', 'linh_vuc.tl_id')
        ->where('linh_vuc.lv_id', $id)
        ->first();
        return view('client.store.field.edit', compact('edit_field', 'list_category'));
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
        $tenLinhvuc = $request->tenLinhvuc;
        $theLoai = $request->theLoai;

        $di = Auth::guard('nguoi_dung')->user()->nd_id;
        $dii = DB::table('cua_hang')->where('nd_id', $di)->first();

        $update = DB::table('linh_vuc')->where('lv_id', $id)->update(
            [
                'lv_ten' => $tenLinhvuc,
                'tl_id' => $theLoai,
                'ch_id' => $dii->ch_id,
            ]
            );
            return redirect()->route('store.field');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dele = DB::table('linh_vuc')->where('lv_id', $id)->delete();
        return redirect()->back();
    }
}
