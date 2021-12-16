<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Auth;
use Session;
use Intervention\Image\Facades\Image as Image;
use App\Model\Photo;
use Carbon\Carbon;
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
        $key = $request->key;
        $search_product = DB::table('san_pham')
        ->where('sp_ten','like','%'.$key.'%')
        ->orWhere('sp_gia',$key)->orderby('sp_id','desc')->paginate(9);
        $list_category = DB::table('the_loai')->orderby('tl_id','desc')->get();
        return view('client.user.search_product.index', compact('search_product', 'list_category'));
    }

    public function proField(Request $request, $id)
    {
        $product_field = DB::table('linh_vuc')
        ->join('san_pham', 'san_pham.lv_id', 'linh_vuc.lv_id')
        ->join('the_loai', 'the_loai.tl_id', 'linh_vuc.tl_id')
        ->where('linh_vuc.lv_id', $id)
        ->orderby('sp_id','desc')->paginate(9);
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
            $product_field = DB::table('san_pham')->where('ttp_id', $id_city)->orderby('sp_id','desc')->paginate(9)->appends(request()->query());
        }elseif(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by=='prices_decrease'){
                $product_field = DB::table('san_pham')->orderby('sp_gia','desc')->paginate(9)->appends(request()->query());
            }elseif($sort_by=='prices_increase'){
                $product_field = DB::table('san_pham')->orderby('sp_gia','asc')->paginate(9)->appends(request()->query());
            }elseif($sort_by=='name_A_Z'){
                $product_field = DB::table('san_pham')->orderby('sp_ten','asc')->paginate(9)->appends(request()->query());
            }elseif($sort_by=='name_Z_A'){
                $product_field = DB::table('san_pham')->orderby('sp_ten','desc')->paginate(9)->appends(request()->query());
            }
        }elseif(isset($_GET['start_price']) && $_GET['end_price']){
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];
            $product_field = DB::table('san_pham')->whereBetween('sp_gia',[$min_price,$max_price])
            ->orderBy('sp_gia','ASC')->paginate(9)->appends(request()->query());
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
        $tp = DB::table('tinh_thanhpho')
        ->orderby('ttp_id','asc')->get();
        return view('client.user.account.login_client', compact('tp'));
    }

    public function register(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $password = $request->password;
        $thanhpho = $request->thanhpho;
        $quanhuyen = $request->quanhuyen;
        $xaphuong = $request->xaphuong;
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
        if($thanhpho == "" || $thanhpho == null){
            Session::flash("error", "Tỉnh thành phố không được để trống !");
            return redirect()->back();
        }
        if($quanhuyen == "" || $quanhuyen == null){
            Session::flash("error", "Quận huyện không được để trống !");
            return redirect()->back();
        }
        if($xaphuong == "" || $xaphuong == null){
            Session::flash("error", "Xã phường không được để trống !");
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
                    'ttp_id' => $thanhpho,
                    'qh_id' => $quanhuyen,
                    'xp_id' => $xaphuong,
                    'password' => $hashPassword,
                    'created_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateString()
                ]
                );
                Session::flash("success", "Tạo tài khoản thành công !");
                return redirect()->back();
        }else{
            Session::flash("error", "Mật khẩu không trùng khớp !");
            return redirect()->back();
        }
    }

    public function getProvinceByCity ($id){
        $province = DB::table('quan_huyen')->where('ttp_id', $id)->orderby('qh_id','asc')->get();
        return response()->json($province, 200);
    }

    public function getWardByProvince ($id){
        $ward = DB::table('xa_phuong')->where('qh_id', $id)->orderby('xp_id','asc')->get();
        return response()->json($ward, 200);
    }

    public function login(Request $request){
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
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
        $user = DB::table('nguoi_dung')
        ->join('quan_huyen', 'quan_huyen.qh_id', 'nguoi_dung.qh_id')
        ->join('xa_phuong', 'xa_phuong.xp_id', 'nguoi_dung.xp_id')
        ->where('nd_id', $id)->first();

        $city = DB::table('tinh_thanhpho')
        ->orderby('ttp_id','asc')->get();

        $provin = DB::table('quan_huyen')
        ->orderby('qh_id','asc')->get();

        $wards = DB::table('xa_phuong')
        ->orderby('xp_id','asc')->get();
        return view('client.user.account.edit', compact('user', 'city', 'provin', 'wards'));
    }

    public function update(Request $request, $id)
    {
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $thanhpho = $request->thanhpho;
        $quanhuyen = $request->quanhuyen;
        $xaphuong = $request->xaphuong;

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
                'nd_sdt' => $phone,
                'ttp_id' => $thanhpho,
                'qh_id' => $quanhuyen,
                'xp_id' => $xaphuong,
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
        ->where('nguoi_dung.nd_id', $id)->orderby('sp_id','desc')->get();

        $post = DB::table('bai_viet')
        ->join('nguoi_dung', 'nguoi_dung.nd_id', 'bai_viet.nd_id')
        ->select('nguoi_dung.*', 'bai_viet.*')
        ->where('nguoi_dung.nd_id', $id)->orderby('bv_id','desc')->get();

        $nd = DB::table('nguoi_dung')
        ->join('san_pham', 'san_pham.nd_id', 'nguoi_dung.nd_id')
        ->join('tinh_thanhpho', 'tinh_thanhpho.ttp_id', 'nguoi_dung.ttp_id')
        ->join('quan_huyen', 'quan_huyen.qh_id', 'nguoi_dung.qh_id')
        ->join('xa_phuong', 'xa_phuong.xp_id', 'nguoi_dung.xp_id')
        ->where('nguoi_dung.nd_id', $id)->first();

        return view('client.user.page.index', compact('store', 'nd', 'post'));
    }
}
