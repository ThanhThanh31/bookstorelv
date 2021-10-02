<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Session;
use Auth;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consumer = Auth::guard('nguoi_dung')->user()->nd_id;
        $warehouse = DB::table('cua_hang')->where('nd_id', $consumer)->first();


        $author = DB::table('tacgia_cuahang')
        ->join('tac_gia', 'tacgia_cuahang.tg_id', 'tac_gia.tg_id')
        ->join('cua_hang', 'tacgia_cuahang.ch_id', 'cua_hang.ch_id')
        ->where('tacgia_cuahang.ch_id', $warehouse->ch_id)
        ->get();
        return view('client.store.author.index', compact('author'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function roster()
    {
        $checkAuthor = DB::table('tac_gia')->get();
        return view('client.store.author.add', compact('checkAuthor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function choice(Request $request)
    {
        $effect = $request->effect; //lấy list category vừa check vào checkbox có tên = effect []
        $strange = Auth::guard('nguoi_dung')->user()->nd_id; //lấy id user login store
        $shop = DB::table('cua_hang')->where('nd_id', $strange)->first(); //lấy id store theo id user

        // vòng lặp mảng thể loại mỗi lần thêm vào
        foreach ($effect as $item){
            DB::table('tacgia_cuahang')->insert([
                'tg_id' => $item,
                'ch_id' => $shop->ch_id,
            ]);
        } 
        Session::flash("author", "Thêm tác giả thành công !");
        return redirect()->route('writer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confounded($idmall, $idwriter)
    {
        $confounded = DB::table('tacgia_cuahang')->where('ch_id', $idmall)->where('tg_id', $idwriter)->delete();
        Session::flash("author", "Xóa tác giả thành công !"); 
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
