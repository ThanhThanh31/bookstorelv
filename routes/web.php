<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\AuthController;

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

//****************************Cient********************//
Route::get('/client', function () {
    return view('client.index');
});
//****************************Cient********************//

//****************************Loai sản phẩm********************//
// file index
Route::get('/loaisp', [StoreController::class, 'index'])->name('loaisp.index');
// giao diện thêm
Route::get('/themloai', [StoreController::class, 'them'])->name('loaisp.them');
// hàm nhận dữ liệu khi thêm
Route::post('/loai-sp/them', [StoreController::class, 'themLoai'])->name('loaisanpham.them');
// xoa
Route::get('loaisp/{id}/xoa', [StoreController::class, 'xoaLoai'])->name('loaisp.xoa');
// Route::get('/loaisp-list', [StoreController::class, 'DSLoaisp'])->name('loaisanpham.list');
//****************************Loai sản phẩm********************//

//****************************Sản phẩm********************//
Route::get('/sanpham', [SanPhamController::class, 'index'])->name('sanpham.index');
// giao diện thêm
Route::get('/themsp', [SanPhamController::class, 'themSP'])->name('sp.them');
// hàm nhận dữ liệu khi thêm
Route::post('/sanpham/them', [SanPhamController::class, 'themSanPham'])->name('sanpham.add');
// xoa
Route::get('sanpham/{id}/xoa', [SanPhamController::class, 'xoaSanPham'])->name('sanpham.xoa');
// Route::get('/sanpham-list', [SanPhamController::class, 'Listsp'])->name('sanpham.list');
//****************************Sản phẩm********************//

// Route::post('/them-tinh', [StoreController::class, 'store'])->name('tinh_thanhpho.store');
// Route::get('/cua-hang/danh-sach', [StoreController::class, 'danhSach'])->name('cua-hang.danh-sach');
// Route::post('/store/add', [StoreController::class, 'store'])->name('cat.store');
Route::get('/test', function(){
    $danhSach = DB::table('loai_sanpham')
    ->get();
    dd($danhSach);
});

