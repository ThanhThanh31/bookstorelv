<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Auth;
use Session;
use Validator;
use App\Models\Comment;
use App\Models\NguoiDung;
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

        $messages = [
            'comment.required' => 'Nội dung bình luận không được để trống !',
        ];

        $this->validate($request,[
            'comment' => 'required',
        ], $messages);

        // $errors = $validate->errors();
        // Ràng buộc dữ liệu

        $insert = DB::table('binhluan_sanpham')->insert(
            [
                'bs_noidung' => $comment,
                'nd_id' => $ch->nd_id,
                'sp_id' => $idSanPham->sp_id,
            ]
            );
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request, $pro_id)
    {
        $customer_id = Auth::guard('nguoi_dung')->user()->nd_id;
        $validator = Validator::make($request->all(), [
            'content' => 'required',
        ],[
            'content.required' => 'Nội dung bình luận không được để trống !!!'
        ]);

        if($validator->passes()){
            $data = [
                'nd_id' => $customer_id,
                'bs_noidung' => $request->content,
                'sp_id' => $pro_id,
            ];

            if($bl = Comment::create($data)){
                $list = Comment::where(['sp_id' => $pro_id, 'reply_id' => 0])->get();
                // return response()->json(['list' => $list]);
                return view('client.user.detail_product.list', compact('list'));
            }
        }
        return response()->json(['error'=>$validator->errors()->first()]);
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
