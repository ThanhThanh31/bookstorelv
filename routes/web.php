<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CuaHangController;
use App\Http\Controllers\TheLoaiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// route post => route này thực hiện xử lý việc thêm, gắn name vào action
// route get => route này trả về giao diện thêm


// Route::get('/', function () {
//     return view('admin.index');
// });
Route::prefix('/')->group(function () {
   Route::get('/form-admin', [AuthController::class, 'form_login'])->name('admin.form');
   Route::post('/admin-login', [AuthController::class, 'login'])->name('admin.login');
});


//****************************User********************//
Route::get('/', function () {
    return view('client.index');
});
Route::prefix('/')->group(function () {
    Route::get('/form-client', [UserController::class, 'form_login'])->name('client.form');
    Route::post('/register', [UserController::class, 'register'])->name('user.register');
    Route::post('/client-login', [UserController::class, 'login'])->name('user.login');
    Route::get('/client-logout', [UserController::class, 'logout'])->name('user.logout');
});
//****************************User********************//

Route::middleware(['checkCuaHang'])->group(function () {
  Route::prefix('/')->group(function () {
    //****************************CuaHang********************//
    Route::get('/re-store', [CuaHangController::class, 'registerStore'])->name('user.reStore');
    Route::post('/addStore', [CuaHangController::class, 'addStore'])->name('user.addStore');
    Route::get('/page-store', [CuaHangController::class, 'pageStore'])->name('user.store');
    //****************************CuaHang********************//
  });
});


Route::middleware(['checkQuanTri'])->group(function () {
  Route::prefix('/')->group(function () {
    Route::get('/admin', [AuthController::class, 'index'])->name('admin.index');
    Route::get('/admin-logout', [AuthController::class, 'logout'])->name('admin.logout');
   //****************************Loai sản phẩm********************//
    Route::get('/category', [TheLoaiController::class, 'index'])->name('loaisp.index');
    // giao diện thêm
    Route::get('/cate-template-add', [TheLoaiController::class, 'them'])->name('loaisp.them');
    // hàm nhận dữ liệu khi thêm
    Route::post('/cate-add', [TheLoaiController::class, 'themLoai'])->name('loaisanpham.them');
    // xoa
    Route::get('/{id}/del', [TheLoaiController::class, 'xoaLoai'])->name('loaisp.xoa');
    // sua
    Route::get('/{id}/update', [TheLoaiController::class, 'edit'])->name('loaisp.edit');
    // hàm nhận dữ liệu khi sua
    Route::post('/{id}/up', [TheLoaiController::class, 'update'])->name('loaisp.update');
   //****************************Loai sản phẩm********************//

   //****************************Store- Admin********************//
    //list cua hang
    Route::get('/list', [StoreController::class, 'list'])->name('admin.listStore');
    // duyet
    Route::get('/{id}/duyet', [StoreController::class, 'duyet'])->name('admin.duyet');
    // khoa
    Route::get('/{id}/khoa', [StoreController::class, 'khoa'])->name('admin.khoa');
    // mo
    Route::get('/{id}/mo', [StoreController::class, 'mo'])->name('admin.mo');
    //****************************Store- Admin********************//

    //****************************Sản phẩm********************//
    Route::get('/product', [SanPhamController::class, 'index'])->name('sanpham.index');
    // giao diện thêm
    Route::get('/pro-template-add', [SanPhamController::class, 'themSP'])->name('sp.them');
    // hàm nhận dữ liệu khi thêm
    Route::post('/pro-add', [SanPhamController::class, 'themSanPham'])->name('sanpham.add');
    // xoa
    Route::get('/{id}/dell', [SanPhamController::class, 'xoaSanPham'])->name('sanpham.xoa');
    // sua
    Route::get('/{id}/upda', [SanPhamController::class, 'editP'])->name('sp.edit');
    // hàm nhận dữ liệu khi sua
    Route::post('/{id}/upp', [SanPhamController::class, 'updateP'])->name('sp.update');
    //****************************Sản phẩm********************//
  });
});


Route::get('/test', function(){
    $danhSach = DB::table('loai_sanpham')
    ->get();
    dd($danhSach);
});
