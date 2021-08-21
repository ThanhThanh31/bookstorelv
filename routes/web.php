<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

//****************************Admin********************//
Route::get('/', function () {
    return view('admin.index');
});
//index - Admin
Route::get('/admin', [AuthController::class, 'index'])->name('admin.index');
//****************************Admin********************//

//****************************Client********************//
Route::get('/client', function () {
    return view('client.index');
});
//****************************Client********************//

//****************************User********************//
Route::prefix('/')->group(function () {
    Route::get('/form-login', [UserController::class, 'form_login'])->name('login_client');

    Route::post('/register', [UserController::class, 'register'])->name('user.register');
    Route::post('/login', [UserController::class, 'login'])->name('user.login');
});
//****************************User********************//

//****************************Loai sản phẩm********************//
Route::prefix('/')->group(function () {
    Route::get('/category', [StoreController::class, 'index'])->name('loaisp.index');
    // giao diện thêm
    Route::get('/cate-template-add', [StoreController::class, 'them'])->name('loaisp.them');
    // hàm nhận dữ liệu khi thêm
    Route::post('/cate-add', [StoreController::class, 'themLoai'])->name('loaisanpham.them');
    // xoa
    Route::get('/{id}/del', [StoreController::class, 'xoaLoai'])->name('loaisp.xoa');
    // sua
    Route::get('/{id}/update', [StoreController::class, 'edit'])->name('loaisp.edit');
    // hàm nhận dữ liệu khi sua
    Route::post('/{id}/up', [StoreController::class, 'update'])->name('loaisp.update');
});
//****************************Loai sản phẩm********************//

//****************************Sản phẩm********************//
Route::prefix('/')->group(function () {
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
});
//****************************Sản phẩm********************//

Route::get('/test', function(){
    $danhSach = DB::table('loai_sanpham')
    ->get();
    dd($danhSach);
});
