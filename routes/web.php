<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CuaHangController;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\LinhVucController;
use App\Http\Controllers\DetailProductController;
use App\Http\Controllers\LoaiBiaController;
use App\Http\Controllers\TacGiaController;
use App\Http\Controllers\CongTyPhatHanhController;
use App\Http\Controllers\NhaXuatBanController;
use App\Http\Controllers\BookJacketController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\IssuerCompanyController;
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

    Route::get('/{id}/detail-info', [DetailProductController::class, 'pro'])->name('detail.pro');
});


Route::middleware(['checkCuaHang'])->group(function () {
  Route::prefix('/store')->group(function () {

    Route::get('/information', [CuaHangController::class, 'info'])->name('store.info');
    Route::post('/{id}/refresh', [CuaHangController::class, 'refresh'])->name('store.refresh');
    Route::get('/register', [CuaHangController::class, 'registerStore'])->name('store.reStore');
    Route::post('/add', [CuaHangController::class, 'addStore'])->name('store.addStore');
    Route::get('/manage', [CuaHangController::class, 'pageStore'])->name('store.manage');
    Route::get('/logout', [CuaHangController::class, 'logout'])->name('store.logout');

    Route::get('/category', [CuaHangController::class, 'listCate'])->name('store.category');
    Route::get('/show', [CuaHangController::class, 'show'])->name('store.show');
    Route::post('/choose', [CuaHangController::class, 'choose'])->name('store.choose');
    Route::get('/{idstore}/{idCat}/del', [CuaHangController::class, 'dele'])->name('store.dele');

    Route::get('/field', [LinhVucController::class, 'index'])->name('store.field');
    Route::get('/form-fie', [LinhVucController::class, 'formfield'])->name('store.formfie');
    Route::post('/cate-add', [LinhVucController::class, 'add'])->name('store.showcate');
    Route::get('/{id}/dell', [LinhVucController::class, 'destroy'])->name('store.destroy');
    Route::get('/{id}/edit', [LinhVucController::class, 'edit'])->name('store.edit');
    Route::post('/{id}/update', [LinhVucController::class, 'update'])->name('store.updatee');

    Route::get('/product', [SanPhamController::class, 'index'])->name('pro.index');
    Route::get('/form-pro', [SanPhamController::class, 'addForm'])->name('pro.addForm');
    Route::post('/pro-add', [SanPhamController::class, 'addPro'])->name('pro.add');
    Route::get('/{id}/delete', [SanPhamController::class, 'delete'])->name('pro.delete');
    Route::get('/{id}/revised', [SanPhamController::class, 'revised'])->name('pro.revised');
    Route::post('/{id}/amend', [SanPhamController::class, 'amend'])->name('pro.amend');
    Route::get('/{id}/get', [SanPhamController::class, 'getProductTypeByCat'])->name('pro.get');
    // Hình ảnh lien quan
    Route::get('/image-link', [SanPhamController::class, 'link'])->name('image.link');
    Route::get('/{id}/erase', [SanPhamController::class, 'erase'])->name('image.erase');

    Route::get('/type', [BookJacketController::class, 'index'])->name('book.index');
    Route::get('/checklist', [BookJacketController::class, 'checklist'])->name('book.checklist');
    Route::post('/adoption', [BookJacketController::class, 'adoption'])->name('book.adoption');
    Route::get('/{idshop}/{idcover}/erased', [BookJacketController::class, 'erased'])->name('book.erased');

    Route::get('/writer', [AuthorController::class, 'index'])->name('writer.index');
    Route::get('/roster', [AuthorController::class, 'roster'])->name('writer.roster');
    Route::post('/choice', [AuthorController::class, 'choice'])->name('writer.choice');
    Route::get('/{idmall}/{idwriter}/confounded', [AuthorController::class, 'confounded'])->name('writer.confounded');

    Route::get('/editor', [PublisherController::class, 'index'])->name('editor.index');
    Route::get('/roll', [PublisherController::class, 'roll'])->name('editor.roll');
    Route::post('/select', [PublisherController::class, 'select'])->name('editor.select');
    Route::get('/{idstorefront}/{ideditor}/eliminate', [PublisherController::class, ' eliminate'])->name('editor.eliminate');

    Route::get('/issuer', [IssuerCompanyController::class, 'index'])->name('issuer.index');
    Route::get('/namlist', [IssuerCompanyController::class, 'namlist'])->name('issuer.namlist');
    Route::post('/pick', [IssuerCompanyController::class, 'pick'])->name('issuer.pick');
    Route::get('/{iddepartment}/{idissuer}/berlin', [IssuerCompanyController::class, 'berlin'])->name('issuer.berlin');
  });
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

    Route::get('/store', [StoreController::class, 'list'])->name('admin.list');
    Route::get('/{id}/browse', [StoreController::class, 'browse'])->name('admin.browse');
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


Route::get('/test', function(){
    $danhSach = DB::table('loai_sanpham')
    ->get();
    dd($danhSach);
});



