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
        return view('client.index');
    }

    public function form_login()
    {
        return view('client.login_client');
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
