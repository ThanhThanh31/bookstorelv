<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CuaHangController;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\LinhVucController;

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
Route::prefix('/')->group(function () {
   Route::get('/form-admin', [AuthController::class, 'form_login'])->name('admin.form');
   Route::post('/admin-login', [AuthController::class, 'login'])->name('admin.login');
});


//****************************User********************//
Route::prefix('/')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('client.index');
    Route::get('/form-client', [UserController::class, 'form_login'])->name('client.form');
    Route::post('/register', [UserController::class, 'register'])->name('user.register');
    Route::post('/client-login', [UserController::class, 'login'])->name('user.login');
    Route::get('/client-logout', [UserController::class, 'logout'])->name('user.logout');
});
//****************************User********************//

Route::middleware(['checkCuaHang'])->group(function () {
  Route::prefix('/store')->group(function () {
    //****************************CuaHang********************//
    Route::get('/register', [CuaHangController::class, 'registerStore'])->name('store.reStore');
    Route::post('/add', [CuaHangController::class, 'addStore'])->name('store.addStore');
    Route::get('/manage', [CuaHangController::class, 'pageStore'])->name('store.manage');
    Route::get('/logout', [CuaHangController::class, 'logout'])->name('store.logout');
    Route::get('/list', [CuaHangController::class, 'listCate'])->name('store.list');
    Route::get('/show', [CuaHangController::class, 'show'])->name('store.show');
    Route::post('/choose', [CuaHangController::class, 'choose'])->name('store.choose');
    // xoa the loai
    Route::get('/{idstore}/{idCat}/del', [CuaHangController::class, 'dele'])->name('store.dele');
    //****************************CuaHang********************//
    Route::get('/field', [LinhVucController::class, 'index'])->name('store.field');
    Route::get('/form-fie', [LinhVucController::class, 'formfield'])->name('store.formfie');
    Route::post('/cate-add', [LinhVucController::class, 'add'])->name('store.showcate');
    // xoa
    Route::get('/{id}/dell', [LinhVucController::class, 'destroy'])->name('store.destroy');
    // sua
    Route::get('/{id}/edit', [LinhVucController::class, 'edit'])->name('store.edit');
    Route::post('/{id}/update', [LinhVucController::class, 'update'])->name('store.updatee');
  });
});


Route::middleware(['checkQuanTri'])->group(function () {
  Route::prefix('/admin')->group(function () {
    Route::get('/home', [AuthController::class, 'index'])->name('admin.index');
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
   //****************************Thể loại********************//
    Route::get('/category', [TheLoaiController::class, 'index'])->name('cate.index');
    // giao diện thêm
    Route::get('/form-add', [TheLoaiController::class, 'addform'])->name('cate.addform');
    // hàm nhận dữ liệu khi thêm
    Route::post('/cate-add', [TheLoaiController::class, 'add'])->name('cate.add');
    // xoa
    Route::get('/{id}/del', [TheLoaiController::class, 'delete'])->name('cate.delete');
    // sua
    Route::get('/{id}/edit', [TheLoaiController::class, 'edit'])->name('cate.edit');
    // hàm nhận dữ liệu khi sua
    Route::post('/{id}/update', [TheLoaiController::class, 'update'])->name('cate.update');
   //****************************Thể loại********************//

   //****************************Store- Admin********************//
    //list cua hang
    Route::get('/store', [StoreController::class, 'list'])->name('admin.list');
    // duyet
    Route::get('/{id}/browse', [StoreController::class, 'browse'])->name('admin.browse');
    // khoa
    Route::get('/{id}/lock', [StoreController::class, 'lock'])->name('admin.lock');
    // mo
    Route::get('/{id}/open', [StoreController::class, 'open'])->name('admin.open');
    //****************************Store- Admin********************//

    //****************************Sản phẩm********************//
    Route::get('/product', [SanPhamController::class, 'index'])->name('pro.index');
    // giao diện thêm
    Route::get('/form-pro', [SanPhamController::class, 'addForm'])->name('pro.addForm');
    // hàm nhận dữ liệu khi thêm
    Route::post('/pro-add', [SanPhamController::class, 'addPro'])->name('pro.add');
    // xoa
    Route::get('/{id}/dele', [SanPhamController::class, 'deletePro'])->name('pro.delete');
    // sua
    Route::get('/{id}/editt', [SanPhamController::class, 'editPro'])->name('pro.edit');
    // hàm nhận dữ liệu khi sua
    Route::post('/{id}/upda', [SanPhamController::class, 'updatePro'])->name('pro.update');
    //****************************Sản phẩm********************//
  });
});


Route::get('/test', function(){
    $danhSach = DB::table('loai_sanpham')
    ->get();
    dd($danhSach);
});



