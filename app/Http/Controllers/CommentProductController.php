<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Auth;
use Session;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommentProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product(Request $request, $id)
    {
        $comment = $request->comment;
        $idSanPham = DB::table('san_pham')->where('sp_id', $id)->first();

        $nd = Auth::guard('nguoi_dung')->user()->nd_id;
        $ch = DB::table('nguoi_dung')->where('nd_id', $nd)->first();

        if($comment == "" || $comment == null){
            Session::flash("danger", "Nội dung bình luận không được để trống !");
            return redirect()->back();
        }

        $insert = DB::table('binhluan_sanpham')->insert(
            [
                'bs_noidung' => $comment,
                'nd_id' => $ch->nd_id,
                'sp_id' => $idSanPham->sp_id,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateString()
            ]
            );
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reply(Request $request, $idsp, $idbl)
    {
        $replies = $request->replies;
        $idPro = DB::table('san_pham')->where('sp_id', $idsp)->first();
        $idBl = DB::table('binhluan_sanpham')->where('bs_id', $idbl)->first();

        $ndd = Auth::guard('nguoi_dung')->user()->nd_id;
        $chh = DB::table('nguoi_dung')->where('nd_id', $ndd)->first();

        if($replies == "" || $replies == null){
            Session::flash("danger", "Nội dung phản hồi bình luận không được để trống !");
            return redirect()->back();
        }

        $insert = DB::table('binhluan_sanpham')->insert(
            [
                'bs_noidung' => $replies,
                'bs_id_reply' => $idBl->bs_id,
                'nd_id' => $chh->nd_id,
                'sp_id' => $idPro->sp_id,
            ]
            );
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id){
        $dell = DB::table('binhluan_sanpham')->where('bs_id', $id)->delete();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updated(Request $request, $id)
    {
        $commentToUpdate = DB::table('binhluan_sanpham')->where('bs_id', $id)->update([
            'bs_noidung' => $request->edit,
        ]);

        return redirect()->back()->with('success', 'Cập nhật bình luận thành công');
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
