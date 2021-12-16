<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Session;
use Auth;
// use File;
use Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quantity_user = DB::table('nguoi_dung')->get()->count();
        $quantity_post = DB::table('bai_viet')->get()->count();
        $quantity_product = DB::table('san_pham')->get()->count();
        return view('admin.index', compact('quantity_user', 'quantity_post', 'quantity_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form_login()
    {
        return view('admin.login_admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request){
        $quantity_user = DB::table('nguoi_dung')->get()->count();
        $quantity_post = DB::table('bai_viet')->get()->count();
        $quantity_product = DB::table('san_pham')->get()->count();

        $email = $request->email;
        $password = $request->password;

        $messages = [
            'email.required' => 'Tên đăng nhập không được để trống !',
            'email.email' => 'Tên đăng nhập phải bằng email !',
            'password.required' => 'Mật khẩu không được để trống !',
        ];

        $this->validate($request,[

            'email' => 'required|email',
            'password' => 'required',
        ], $messages);

        $arrr = [
            'email' => $email,
            'password' => $password,
        ];

        if(Auth::guard('quan_tri')->attempt($arrr)){
            return view('admin.index', compact('quantity_user', 'quantity_post', 'quantity_product'));
        }else {
            Session::flash("login", "Đăng nhập hệ thống thất bại !");
            return view('admin.login_admin');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::guard('quan_tri')->logout();
        return redirect()->route('admin.form');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function infor_admin()
    {
        $admin = DB::table('quan_tri')->where('qt_id', 1)->get();
        return view('admin.info_admin.index', compact('admin'));
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
        if($request->hasFile('avatars')){
            $avatars = $request->file('avatars')->getClientOriginalName();
            $request->file('avatars')->move(public_path('anh-quan-tri/'),$avatars);

            $user = DB::table('quan_tri')->where('qt_id', $id)->update(
                [
                    'qt_anh' => 'anh-quan-tri/'. $avatars,
                ]
            );
        }
        Session::flash("yes", "Cập nhật ảnh đại diện admin thành công !");
        return redirect()->route('admin.infor_admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail_post($id)
    {
        $shows = DB::table('bai_viet')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'bai_viet.nd_id')
        ->select('nguoi_dung.*', 'bai_viet.*')
        ->where('bai_viet.bv_id', $id)
        ->first();

        return view('admin.detail_post.index', compact('shows'));
    }

    public function detail_users($id)
    {
        $ds = DB::table('nguoi_dung')
        ->join('tinh_thanhpho', 'tinh_thanhpho.ttp_id', 'nguoi_dung.ttp_id')
        ->join('quan_huyen', 'quan_huyen.qh_id', 'nguoi_dung.qh_id')
        ->join('xa_phuong', 'xa_phuong.xp_id', 'nguoi_dung.xp_id')
        ->where('nguoi_dung.nd_id', $id)
        ->first();

        return view('admin.detail_users.index', compact('ds'));
    }

    public function detail_pro(Request $request, $id)
    {
        $image = DB::table('anh')
        ->join('san_pham', 'san_pham.sp_id', 'anh.sp_id')
        ->where('anh.sp_id', $id)
        ->get();

        //DB anh doi khi null nên DB san_pham k the join
        $show = DB::table('san_pham')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'san_pham.nd_id')
        ->join('tinh_thanhpho', 'tinh_thanhpho.ttp_id', 'san_pham.ttp_id')
        ->join('linh_vuc', 'linh_vuc.lv_id', 'san_pham.lv_id')
        ->join('the_loai', 'the_loai.tl_id', 'linh_vuc.tl_id')
        ->join('tac_gia', 'tac_gia.tg_id', 'san_pham.tg_id')
        ->join('nha_xuatban', 'nha_xuatban.nxb_id', 'san_pham.nxb_id')
        ->join('congty_phathanh', 'congty_phathanh.cty_id', 'san_pham.cty_id')
        ->join('loai_bia', 'loai_bia.lb_id', 'san_pham.lb_id')
        ->where('san_pham.sp_id', $id)
        ->first();

        return view('admin.detail_pro.index', compact('show', 'image'));
    }
}
