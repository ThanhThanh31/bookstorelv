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
        $arrr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        // dd($arr);
        if(Auth::guard('quan_tri')->attempt($arrr)){
            return view('admin.index');
        }else {
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
