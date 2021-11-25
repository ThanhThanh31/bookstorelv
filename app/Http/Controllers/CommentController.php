<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Auth;
use Session;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function post(Request $request, $id)
    {
        $binhluan = $request->binhluan;
        $idBaiViet = DB::table('bai_viet')->where('bv_id', $id)->first();

        $nd = Auth::guard('nguoi_dung')->user()->nd_id;
        $ch = DB::table('nguoi_dung')->where('nd_id', $nd)->first();

        $messages = [
            'binhluan.required' => 'Nội dung bình luận không được để trống !',
        ];

        $this->validate($request,[
            'binhluan' => 'required',
        ], $messages);

        $insert = DB::table('binh_luan')->insert(
            [
                'bl_noidung' => $binhluan,
                'nd_id' => $ch->nd_id,
                'bv_id' => $idBaiViet->bv_id,
            ]
            );
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reply(Request $request, $idbv, $idbl)
    {
        $replies = $request->replies;
        $idPosts = DB::table('bai_viet')->where('bv_id', $idbv)->first();
        $idBl = DB::table('binh_luan')->where('bl_id', $idbl)->first();

        $ndd = Auth::guard('nguoi_dung')->user()->nd_id;
        $chh = DB::table('nguoi_dung')->where('nd_id', $ndd)->first();

        $messages = [
            'replies.required' => 'Nội dung bình luận không được để trống !',
        ];

        $this->validate($request,[
            'replies' => 'required',
        ], $messages);

        // $errors = $validate->errors();
        // Ràng buộc dữ liệu

        $insert = DB::table('binh_luan')->insert(
            [
                'bl_noidung' => $replies,
                'bl_id_reply' => $idBl->bl_id,
                'nd_id' => $chh->nd_id,
                'bv_id' => $idPosts->bv_id,
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
    public function obliterate(Request $request, $id){
        $dell = DB::table('binh_luan')->where('bl_id', $id)->delete();
        return redirect()->back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatecomment(Request $request, $id)
    {
        $commentToUpdate = DB::table('binh_luan')->where('bl_id', $id)->update([
            'bl_noidung' => $request->edit,
        ]);

        return redirect()->back()->with('success', 'Cập nhật bình luận thành công');
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
