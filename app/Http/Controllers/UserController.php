<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Auth;
use Session;
use Intervention\Image\Facades\Image as Image;
use App\Model\Photo;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search_product = DB::table('san_pham')
        ->where('sp_ten','like','%'.$request->key.'%')
        ->orWhere('sp_gia',$request->key)->orderby('sp_id','desc')->paginate(6);
        $list_category = DB::table('the_loai')->orderby('tl_id','desc')->get();
        return view('client.user.search_product.index', compact('search_product', 'list_category'));
    }

    public function proField(Request $request, $id)
    {
        $product_field = DB::table('linh_vuc')
        ->join('san_pham', 'san_pham.lv_id', 'linh_vuc.lv_id')
        ->join('the_loai', 'the_loai.tl_id', 'linh_vuc.tl_id')
        ->where('linh_vuc.lv_id', $id)
        ->orderby('sp_id','desc')->paginate(6);
        $array_field = DB::table('linh_vuc')
        ->join('the_loai', 'the_loai.tl_id', 'linh_vuc.tl_id')
        ->where('linh_vuc.lv_id', $id)
        ->get();

        $city = DB::table('tinh_thanhpho')->orderby('ttp_id','asc')->get();
        $min_price = DB::table('san_pham')->min('sp_gia');
        $max_price = DB::table('san_pham')->max('sp_gia');

        $min_price_range = $min_price;
        $max_price_range = $max_price + 10000;

        if($request->id_city){
            $id_city = $request->id_city;
            $product_field = DB::table('san_pham')->where('ttp_id', $id_city)->orderby('sp_id','desc')->paginate(6)->appends(request()->query());
        }elseif(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by=='prices_decrease'){
                $product_field = DB::table('san_pham')->orderby('sp_gia','desc')->paginate(6)->appends(request()->query());
            }elseif($sort_by=='prices_increase'){
                $product_field = DB::table('san_pham')->orderby('sp_gia','asc')->paginate(6)->appends(request()->query());
            }elseif($sort_by=='name_A_Z'){
                $product_field = DB::table('san_pham')->orderby('sp_ten','asc')->paginate(6)->appends(request()->query());
            }elseif($sort_by=='name_Z_A'){
                $product_field = DB::table('san_pham')->orderby('sp_ten','desc')->paginate(6)->appends(request()->query());
            }
        }elseif(isset($_GET['start_price']) && $_GET['end_price']){
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];
            $product_field = DB::table('san_pham')->whereBetween('sp_gia',[$min_price,$max_price])
            ->orderBy('sp_gia','ASC')->paginate(6)->appends(request()->query());
        }
        return view('client.user.product_field.index', compact('product_field', 'array_field', 'city', 'min_price', 'max_price', 'min_price_range', 'max_price_range'));
    }

    public function index()
    {
        $showPro = DB::table('san_pham')->orderby('sp_id','desc')->get();

        $showCate = DB::table('the_loai')->orderby('tl_id','desc')->get();

        $showPost = DB::table('bai_viet')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'bai_viet.nd_id')
        ->orderby('bv_id','desc')->get();

        return view('client.index', compact('showPro', 'showCate', 'showPost'));

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
        $diachi = $request->diachi;
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
        if($diachi == "" || $diachi == null){
            Session::flash("error", "Địa chỉ không được để trống !");
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
                    'nd_diachi' => $diachi,
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
            return redirect()->route('user.edit');
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
        $diachi = $request->diachi;

        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move(public_path('anh-nguoi-dung/'),$avatar);

            $user = DB::table('nguoi_dung')->where('nd_id', $id)->update(
                [
                    'nd_anh' => 'anh-nguoi-dung/'. $avatar,
                ]
            );
        }

        $update = DB::table('nguoi_dung')->where('nd_id', $id)->update(
            [
                'username' => $name,
                'email' => $email,
                'nd_diachi' => $diachi,
                'nd_sdt' => $phone,
            ]
            );
            Session::flash("great", "Chỉnh sửa thông tin người dùng thành công !");
            return redirect()->back();
    }

    public function pass(){
        return view('client.user.account.pass');
    }

    public function change(Request $request, $id){
        $current_password = $request->current_password;
        $new_password = $request->new_password;
        $password_confirmation = $request->password_confirmation;

        if($current_password == "" || $current_password == null){
            Session::flash("no", "Mật khẩu không được để trống !");
            return redirect()->back();
        }

        if($new_password == "" || $new_password == null){
            Session::flash("no", "Mật khẩu mới không được để trống !");
            return redirect()->back();
        }

        if($password_confirmation == "" || $password_confirmation == null){
            Session::flash("no", "Xác nhận lại mật khẩu mới không được để trống !");
            return redirect()->back();
        }

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
    public function pageUser($id)
    {
        $store = DB::table('san_pham')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'san_pham.nd_id')
        ->select('nguoi_dung.*', 'san_pham.*')
        ->where('nguoi_dung.nd_id', $id)->orderby('sp_id','desc')->paginate(8);
        $nd = DB::table('nguoi_dung')
        ->join('san_pham', 'san_pham.nd_id', 'nguoi_dung.nd_id')->where('nguoi_dung.nd_id', $id)->first();
        return view('client.user.page.index', compact('store', 'nd'));
    }
}
