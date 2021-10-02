<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Auth;
use Session;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show = DB::table('san_pham')
        // ->join('linh_vuc', 'linh_vuc.lv_id', 'san_pham.lv_id')
        // ->join('the_loai', 'the_loai.tl_id', 'san_pham.tl_id')
        // ->join('anh', 'anh.sp_id', 'san_pham.sp_id')
        ->get();
        return view('client.index', compact('show'));
    }

    public function form_login()
    {
        return view('client.user.account.login_client');
    }

    public function register(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $password = $request->password;
        $reset_password = $request->reset_password;

        if($name == "" || $name == null){
            Session::flash("error", "Tên đăng nhập không được để trống !");
            return redirect()->back();
        }
        if($email == "" || $email == null){
            Session::flash("error", "Email không được để trống !");
            return redirect()->back();
        }
        if($phone == "" || $phone == null){
            Session::flash("error", "Số điện thoại không được để trống !");
            return redirect()->back();
        }
        if($password == "" || $password == null){
            Session::flash("error", "Mật khẩu không được để trống !");
            return redirect()->back();
        }
        $checkUsername = DB::table('nguoi_dung')->where('username', $name)->count();
        if($checkUsername > 0){
            Session::flash("error", "Tên đăng nhập đã có người sử dụng !");
            return redirect()->back();
        }
        $checkGmail = DB::table('nguoi_dung')->where('email', $email)->count();
        if($checkGmail > 0){
            Session::flash("error", "Email đã có người sử dụng !");
            return redirect()->back();
        }

        if($password == $reset_password){
            $hashPassword = Hash::make($password);
            $insert = DB::table('nguoi_dung')->insert(
                [
                    'username' => $name,
                    'email' => $email,
                    'nd_sdt' => $phone,
                    'password' => $hashPassword,
                ]
                );
                Session::flash("success", "Tạo tài khoản thành công !");
                return redirect()->back();
        }else{
            Session::flash("error", "Mật khẩu không trùng khớp !");
            return redirect()->back();
        }
    }

    public function login(Request $request){
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        // dd($arr);
        if(Auth::guard('nguoi_dung')->attempt($arr)){
            Session::flash("prosper", "Đăng nhập tài khoản thành công !");
            return redirect()->back();
        }else {
            Session::flash("failure", "Đăng nhập tài khoản thất bại !");
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::guard('nguoi_dung')->logout();
        Session::flash("accomplish", "Đăng xuất tài khoản thành công !");
        return redirect()->route('client.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function edit(){
        $id = Auth::guard('nguoi_dung')->user()->nd_id;
        $user = DB::table('nguoi_dung')->where('nd_id', $id)->first();
        return view('client.user.account.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $update = DB::table('nguoi_dung')->where('nd_id', $id)->update(
            [
                'username' => $name,
                'email' => $email,
                'nd_sdt' => $phone,
            ]
            );
            Session::flash("great", "Chỉnh sửa thông tin người dùng thành công !");
            return redirect()->route('user.edit');
    }

    public function pass(){
        return view('client.user.account.pass');
    }

    public function change(Request $request, $id){
        $current_password = $request->current_password;
        $new_password = $request->new_password;
        $password_confirmation = $request->password_confirmation;

        if (!(Hash::check($current_password, Auth::guard('nguoi_dung')->user()->password))) {
            return redirect()->back()->with("no","Mật khẩu người dùng không đúng. Vui lòng nhập lại !");
        }

        if(Hash::check($new_password, Auth::guard('nguoi_dung')->user()->password)){
            return redirect()->back()->with("no","Mật khẩu mới không được giống với mật khẩu hiện tại. Vui lòng chọn một mật khẩu mới !");
        }

        if($new_password == $password_confirmation){
            $Password = Hash::make($new_password);
            $update = DB::table('nguoi_dung')->where('nd_id', $id)->update(
                [
                    'password' => $Password,
                ]
                );
                Session::flash("yes","Thay đổi mật khẩu thành công !");
                return redirect()->back();
        }else{
            Session::flash("no", "Mật khẩu xác nhận lại không trùng với mật khẩu mới. Vui lòng nhập lại !");
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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
