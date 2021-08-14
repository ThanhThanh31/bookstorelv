<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SanPhamController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('admin.template.master');
});
// Route::get('/hello-word', [StoreController::class, 'index'])->name('cua-hang.index');
// Route::get('/hello-class', [StoreController::class, 'xinchao'])->name('cua-hang.xinchao');
Route::post('/them-tinh', [StoreController::class, 'store'])->name('tinh_thanhpho.store');
// Route::get('/store', [StoreController::class, 'index'])->name('cat.index');
Route::get('/cua-hang/danh-sach', [StoreController::class, 'danhSach'])->name('cua-hang.danh-sach');
// Route::post('/store/add', [StoreController::class, 'store'])->name('cat.store');

//************Loai sản phẩm
Route::get('/lsanpham', [StoreController::class, 'index'])->name('loai-sp.index');
// route post => route này thực hiện xử lý việc thêm, gắn name vào action
Route::post('/loai-sp/them', [StoreController::class, 'themLoai'])->name('loaisanpham.store');
// route get => route này trả về giao diện thêm
Route::get('/loaisp-list', [StoreController::class, 'DSLoaisp'])->name('loaisanpham.list');

//************Sản phẩm
Route::get('/sanpham', [SanPhamController::class, 'index'])->name('sanpham.index');
Route::post('/sanpham/them', [SanPhamController::class, 'themSanPham'])->name('sanpham.add');
Route::get('/sanpham-list', [SanPhamController::class, 'Listsp'])->name('sanpham.list');

Route::get('/test', function(){
    $danhSach = DB::table('loai_sanpham')
    ->get();
    dd($danhSach);
});

