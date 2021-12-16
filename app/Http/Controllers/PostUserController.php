<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Auth;
use Session;
use Carbon\Carbon;
use Intervention\Image\Facades\Image as Image;
use App\Model\Photo;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PostUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_nd = Auth::guard('nguoi_dung')->user()->nd_id;
        $tb_nd = DB::table('nguoi_dung')->where('nd_id', $id_nd)->first();

        $posts = DB::table('bai_viet')
        ->where('nd_id', $tb_nd->nd_id)
        ->orderby('bv_id','desc')->paginate(3);
        return view('client.page.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function plus()
    {
        return view('client.page.post.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function redouble(Request $request)
    {
        $tieude = $request->tieude;
        $tomtat = $request->tomtat;
        $noidung = $request->noidung;

        $messages = [
            'anhbaiviet.required' => 'Vui lòng chọn hình ảnh cho bài viết !',
            'anhbaiviet.image' => 'Chỉ chấp nhận hình ảnh cho bài viết với đuôi .jpg .jpeg .png .gif !',
            'tieude.required' => 'Tiêu đề bài viết không được để trống !',
            'tomtat.required' => 'Tóm tắt nội dung bài viết không được để trống !',
            'tomtat.min' => 'Tóm tắt nội dung bài viết phải có ít nhất 10 ký tự !',
            'noidung.required' => 'Nội dung bài viết không được để trống !',
            'noidung.min' => 'Nội dung bài viết có ít nhất 50 ký tự !',
        ];

        $this->validate($request,[
            'anhbaiviet' => 'required|image',
            'tieude' => 'required',
            'tomtat' => 'required|min:10',
            'noidung' => 'required|min:30',
        ], $messages);
        // Ràng buộc dữ liệu

        $nguoidung = Auth::guard('nguoi_dung')->user()->nd_id;
        $table = DB::table('nguoi_dung')->where('nd_id', $nguoidung)->first();
        if($request->hasFile('anhbaiviet')){
            $anhbaiviet = $request->file('anhbaiviet');
            $post = $anhbaiviet->getClientOriginalName();
            $anhbaiviet->move(public_path('anh-bai-viet/'), $post);
            $insert = DB::table('bai_viet')->insertGetId(
                [
                    'bv_tieude' => $tieude,
                    'bv_tomtat' => $tomtat,
                    'bv_noidung' => $noidung,
                    'nd_id' => $table->nd_id,
                    'bv_hinhanh' => 'anh-bai-viet/'.$post,
                    'created_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateString()
                ]
                );
        }
        Session::flash("redouble", "Thêm bài viết thành công !");
        return redirect()->route('postuser.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remark($id)
    {
        $nd_id = Auth::guard('nguoi_dung')->user()->nd_id;
        $nd_db = DB::table('nguoi_dung')->where('nd_id', $nd_id)->first();

        $edit = DB::table('bai_viet')
        ->where('bai_viet.bv_id', $id)
        ->first();
        return view('client.page.post.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function overhaul(Request $request, $id)
    {
        $tieude = $request->tieude;
        $tomtat = $request->tomtat;
        $noidung = $request->noidung;

        $messages = [
            'anhbaiviet.image' => 'Chỉ chấp nhận hình ảnh cho bài viết với đuôi .jpg .jpeg .png .gif !',
            'tieude.required' => 'Tiêu đề bài viết không được để trống !',
            'tomtat.required' => 'Tóm tắt nội dung bài viết không được để trống !',
            'tomtat.min' => 'Tóm tắt nội dung bài viết phải có ít nhất 10 ký tự !',
            'noidung.required' => 'Nội dung bài viết không được để trống !',
            'noidung.min' => 'Nội dung bài viết có ít nhất 50 ký tự !',
        ];

        $this->validate($request,[
            'anhbaiviet' => 'image',
            'tieude' => 'required',
            'tomtat' => 'required|min:10',
            'noidung' => 'required|min:30',
        ], $messages);

        if($request->hasFile('anhbaiviet')){
            $anhbaiviet = $request->file('anhbaiviet');
            $change = $anhbaiviet->getClientOriginalName();
            Image::make($anhbaiviet)->resize(300, 300)->save( public_path('anh-bai-viet/' . $change));

            $product = DB::table('bai_viet')->where('bv_id', $id)->update(
                [
                    'bv_hinhanh' => 'anh-bai-viet/'. $change,
                ]
            );
            $image = $request->image;
                if(!empty($image)){
                    File::delete($image);
                }
        }

        $update = DB::table('bai_viet')->where('bv_id', $id)->update(
            [
                'bv_tieude' => $tieude,
                'bv_tomtat' => $tomtat,
                'bv_noidung' => $noidung,
            ]
            );
            Session::flash("redouble", "Chỉnh sửa bài viết thành công !");
            return redirect()->route('postuser.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dab($id)
    {
        $dab = DB::table('bai_viet')->where('bv_id', $id)->delete();
        Session::flash("redouble", "Xóa bài viết thành công !");
        return redirect()->back();
    }

    public function historyPost(){
        $id_nd = Auth::guard('nguoi_dung')->user()->nd_id;
        $t_nd = DB::table('nguoi_dung')->where('nd_id', $id_nd)->first();

        $history = DB::table('baocao_baiviet')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'baocao_baiviet.nd_id')
        ->join('bai_viet', 'bai_viet.bv_id', 'baocao_baiviet.bv_id')
        ->where('nguoi_dung.nd_id', $t_nd->nd_id)->orderby('bb_id','desc')
        ->paginate(6);

        return view('client.page.history_post.index', compact('history'));
    }

    public function buckle() {
        $id_nd = Auth::guard('nguoi_dung')->user()->nd_id;
        $tb_nd = DB::table('nguoi_dung')->where('nd_id', $id_nd)->first();

        $buckle = DB::table('bai_viet')
        ->where('nd_id', $tb_nd->nd_id)->where('bv_tinhtrang', 2)
        ->orderby('bv_id','desc')->paginate(4);
        return view('client.page.report_post.index', compact('buckle'));
    }

    public function find_posts(Request $request){
        $id_nd = Auth::guard('nguoi_dung')->user()->nd_id;
        $tb_nd = DB::table('nguoi_dung')->where('nd_id', $id_nd)->first();

        $key = $request->key;
        $find_posts = DB::table('bai_viet')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'bai_viet.nd_id')
        ->where('bai_viet.nd_id', $tb_nd->nd_id)
        ->where('bv_tieude','like','%'.$key.'%')
        ->take(10)->orderby('bv_id','desc')->get();

        return view('client.page.search_post.index', compact('find_posts', 'key'));
    }
}
