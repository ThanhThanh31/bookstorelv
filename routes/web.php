<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CuaHangController;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\DetailProductController;
use App\Http\Controllers\LoaiBiaController;
use App\Http\Controllers\TacGiaController;
use App\Http\Controllers\CongTyPhatHanhController;
use App\Http\Controllers\NhaXuatBanController;
use App\Http\Controllers\BookJacketController;
use App\Http\Controllers\FieldController;
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


Route::get('/', [UserController::class, 'index'])->name('client.index');
Route::prefix('/client')->group(function () {
    Route::get('/form', [UserController::class, 'form_login'])->name('client.form');
    Route::post('/register', [UserController::class, 'register'])->name('user.register');
    Route::post('/login', [UserController::class, 'login'])->name('user.login');
    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::get('/pass', [UserController::class, 'pass'])->name('user.pass');
    Route::post('/{id}/change', [UserController::class, 'change'])->name('user.change');
    Route::get('/search', [UserController::class, 'search'])->name('user.search');
    Route::get('/{id}/detail-field', [UserController::class, 'proField'])->name('detail.field');

    Route::get('/all-product', [DetailProductController::class, 'index'])->name('detail.index');
    Route::get('/{id}/detail-pro', [DetailProductController::class, 'pro'])->name('detail.pro');
    Route::get('/{id}/detail-cate', [DetailProductController::class, 'cate'])->name('detail.cate');

});


  Route::prefix('/page')->group(function () {
    Route::get('/manage', [CuaHangController::class, 'page'])->name('page.manage');
    Route::get('/logout', [CuaHangController::class, 'logout'])->name('page.logout');

    Route::get('/product', [SanPhamController::class, 'index'])->name('pro.index');
    Route::get('/form-pro', [SanPhamController::class, 'addForm'])->name('pro.addForm');
    Route::post('/pro-add', [SanPhamController::class, 'addPro'])->name('pro.add');
    Route::get('/{id}/delete', [SanPhamController::class, 'delete'])->name('pro.delete');
    Route::get('/{id}/revised', [SanPhamController::class, 'revised'])->name('pro.revised');
    Route::post('/{id}/amend', [SanPhamController::class, 'amend'])->name('pro.amend');
    Route::get('/{id}/get', [SanPhamController::class, 'getProductTypeByCat'])->name('pro.get');
    // Hình ảnh lien quan
    Route::get('/{id}/erase', [SanPhamController::class, 'erase'])->name('image.erase');

    Route::get('/type', [BookJacketController::class, 'index'])->name('book.index');
    Route::get('/checklist', [BookJacketController::class, 'checklist'])->name('book.checklist');
    Route::post('/adoption', [BookJacketController::class, 'adoption'])->name('book.adoption');
    Route::get('/{idshop}/{idcover}/erased', [BookJacketController::class, 'erased'])->name('book.erased');

  });



Route::middleware(['checkQuanTri'])->group(function () {
  Route::prefix('/admin')->group(function () {
    Route::get('/home', [AuthController::class, 'index'])->name('admin.index');
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::get('/category', [TheLoaiController::class, 'index'])->name('cate.index');
    Route::get('/form-add', [TheLoaiController::class, 'addform'])->name('cate.addform');
    Route::post('/cate-add', [TheLoaiController::class, 'add'])->name('cate.add');
    Route::get('/{id}/del', [TheLoaiController::class, 'delete'])->name('cate.delete');
    Route::get('/{id}/edit', [TheLoaiController::class, 'edit'])->name('cate.edit');
    Route::post('/{id}/update', [TheLoaiController::class, 'update'])->name('cate.update');

    Route::get('/field', [FieldController::class, 'index'])->name('field.index');
    Route::get('/create-field', [FieldController::class, 'create'])->name('field.create');
    Route::post('/field-season', [FieldController::class, 'season'])->name('field.season');
    Route::get('/{id}/efface', [FieldController::class, 'efface'])->name('field.efface');
    Route::get('/{id}/wipe', [FieldController::class, 'wipe'])->name('field.wipe');
    Route::post('/{id}/uphold', [FieldController::class, 'uphold'])->name('field.uphold');

    Route::get('/store', [StoreController::class, 'list'])->name('admin.list');
    Route::get('/{id}/lock', [StoreController::class, 'lock'])->name('admin.lock');
    Route::get('/{id}/open', [StoreController::class, 'open'])->name('admin.open');

    Route::get('/cover', [LoaiBiaController::class, 'index'])->name('cover.index');
    Route::get('/create-cover', [LoaiBiaController::class, 'create'])->name('cover.create');
    Route::post('/cover-add', [LoaiBiaController::class, 'add'])->name('cover.add');
    Route::get('/{id}/destroy', [LoaiBiaController::class, 'destroy'])->name('cover.destroy');
    Route::get('/{id}/control', [LoaiBiaController::class, 'edit'])->name('cover.edit');
    Route::post('/{id}/updated', [LoaiBiaController::class, 'update'])->name('cover.update');

    Route::get('/author', [TacGiaController::class, 'index'])->name('author.index');
    Route::get('/create-author', [TacGiaController::class, 'create'])->name('author.create');
    Route::post('/author-add', [TacGiaController::class, 'add'])->name('author.add');
    Route::get('/{id}/delete', [TacGiaController::class, 'delete'])->name('author.delete');
    Route::get('/{id}/manipulate', [TacGiaController::class, 'manipulate'])->name('author.manipulate');
    Route::post('/{id}/updates', [TacGiaController::class, 'update'])->name('author.update');

    Route::get('/company', [CongTyPhatHanhController::class, 'index'])->name('company.index');
    Route::get('/create-company', [CongTyPhatHanhController::class, 'create'])->name('company.create');
    Route::post('/company-padded', [CongTyPhatHanhController::class, 'padded'])->name('company.padded');
    Route::get('/{id}/remove', [CongTyPhatHanhController::class, 'remove'])->name('company.remove');
    Route::get('/{id}/command', [CongTyPhatHanhController::class, 'command'])->name('company.command');
    Route::post('/{id}/upgraded', [CongTyPhatHanhController::class, 'upgraded'])->name('company.upgraded');

    Route::get('/publisher', [NhaXuatBanController::class, 'index'])->name('publisher.index');
    Route::get('/create-publisher', [NhaXuatBanController::class, 'create'])->name('publisher.create');
    Route::post('/publisher-increased', [NhaXuatBanController::class, 'increased'])->name('publisher.increased');
    Route::get('/{id}/eradicate', [NhaXuatBanController::class, 'eradicate'])->name('publisher.eradicate');
    Route::get('/{id}/modified', [NhaXuatBanController::class, 'modified'])->name('publisher.modified');
    Route::post('/{id}/updating', [NhaXuatBanController::class, 'updating'])->name('publisher.updating');
  });
});






