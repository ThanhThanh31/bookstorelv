<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Session;
use Auth;
use Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subtotal = Cart::subtotal(0);
        return view('client.user.cart.index', compact('subtotal')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCart(Request $request, $id)
    {
        $product = DB::table('san_pham')->where('san_pham.sp_id', $id)->first();
        Cart::add(array('id' => $product ->sp_id, 'name' => $product->sp_ten,
        'qty' => 1, 'weight' => '0', 'price' => $product->sp_gia, 'options' => ['user' => $product->nd_id, 'image' => $product->sp_hinhanh]));
        $content = Cart::content();
        // dd($content);
        // return redirect()->back()->with('thongbao','Đã thêm sản phẩm thành công !');
        // Session::flash("thongbao", "Đã thêm sản phẩm thành công !");
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deleCart(Request $request ,$rowId){
        Cart::remove($rowId);
        return redirect()->back()->with('feedback','Sản phẩm của bạn đã được xóa thành công khỏi giỏ hàng !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCart(Request $request)
    {
        // Cart::update($rowId, ['qty'=>$request->qty]);
        // return redirect()->back()->with('feedback','Cập nhật số lượng sản phẩm thành công !');
        // if(Request::ajax()){
        //     $id = Request::input('id');
        //     $qty = Request::input('qty');
        //     Cart::update($id, $qty);
        //     return "ok";
        // }
        if (Request()->ajax()) {
            $id = Request::get('id');
            $qty = Request::get('qty');
            Cart::update($id, ['qty'=>$qty]);
            echo "ok";
           }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleAllCart()
    {
        Cart::destroy();
        return redirect()->back()->with('feedback','Tất cả sản phẩm của bạn đã được xóa thành công khỏi giỏ hàng !');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAllCart(Request $request)
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
