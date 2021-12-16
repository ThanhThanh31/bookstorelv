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
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutCartController;
use App\Http\Controllers\PostUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductReportController;
use App\Http\Controllers\PostReportController;
use App\Http\Controllers\AdminProductReportController;
use App\Http\Controllers\AdminPostReportController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\AdminInformationController;
use App\Http\Controllers\StatisticalAdminController;
use App\Http\Controllers\StatisticalUserAdminController;
use App\Http\Controllers\StatisticalProductAdminController;
use App\Http\Controllers\AllSearchAdminController;
use App\Http\Controllers\OrderCartController;
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
    //quan_huyen
    Route::get('/{id}/province-user', [UserController::class, 'getProvinceByCity'])->name('user.province');
    //xa_phuong
    Route::get('/{id}/ward-user', [UserController::class, 'getWardByProvince'])->name('user.ward');
    Route::post('/login', [UserController::class, 'login'])->name('user.login');
    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::get('/pass', [UserController::class, 'pass'])->name('user.pass');
    Route::post('/{id}/change', [UserController::class, 'change'])->name('user.change');
    Route::get('/search', [UserController::class, 'search'])->name('user.search');
    Route::get('/{id}/detail-field', [UserController::class, 'proField'])->name('detail.field');
    Route::get('/{id}/detail-user', [UserController::class, 'pageUser'])->name('detail.pageUser');

    Route::get('/all-product', [DetailProductController::class, 'index'])->name('detail.index');
    Route::get('/{id}/detail-pro', [DetailProductController::class, 'pro'])->name('detail.pro');
    Route::get('/{id}/detail-cate', [DetailProductController::class, 'cate'])->name('detail.cate');

    Route::get('/post', [PostController::class, 'index'])->name('post.index');
    Route::get('/{id}/detail-post', [PostController::class, 'post'])->name('post.detail');
    Route::post('/post-find', [PostController::class, 'find'])->name('post.find');

    //binh luan bai viet
    Route::post('/{id}/comment-post', [CommentController::class, 'post'])->name('comment.post');
    Route::post('/{idbv}/{idbl}/reply-post', [CommentController::class, 'reply'])->name('reply.post');
    Route::get('/{id}/comment-delete', [CommentController::class, 'obliterate'])->name('comment.obliterate');
    Route::post('/{id}/comment-update', [CommentController::class, 'updatecomment'])->name('comment.update');

    //binh luan san pham
    Route::post('/{id}/comment-postproduct', [CommentProductController::class, 'product'])->name('comment.product');
    Route::post('/{idsp}/{idbl}/reply-product', [CommentProductController::class, 'reply'])->name('reply.product');
    Route::get('/{id}/delete-comment', [CommentProductController::class, 'delete'])->name('comment.delete');
    Route::post('/{id}/update-comment', [CommentProductController::class, 'updated'])->name('comment.updated');

    Route::get('/{id}/report-product', [ProductReportController::class, 'report'])->name('report.product');

    Route::get('/{id}/article-report', [PostReportController::class, 'article'])->name('article.report');

    Route::get('/information', [InformationController::class, 'index'])->name('information.index');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/{id}/add-cart', [CartController::class, 'addCart'])->name('cart.add');
    Route::get('/{rowId}/delete-cart', [CartController::class, 'deleCart'])->name('cart.delete');
    Route::get('/all-delete-cart', [CartController::class, 'deleAllCart'])->name('cart.alldele');
    Route::get('/{id}/{qty}', [CartController::class, 'updateCart'])->name('cart.update');
    // Route::get('/all-update-cart', [CartController::class, 'updateAllCart'])->name('cart.allupdate');

    Route::get('/checkout', [CheckoutCartController::class, 'index'])->name('checkout.index');
    //quan_huyen
    Route::get('/{id}/province-checkout', [CheckoutCartController::class, 'getProvinceByCity'])->name('checkout.province');
    //xa_phuong
    Route::get('/{id}/ward-checkout', [CheckoutCartController::class, 'getWardByProvince'])->name('checkout.ward');
    Route::post('/payment', [CheckoutCartController::class, 'checkout'])->name('checkout.payment');

});


  Route::prefix('/page')->group(function () {
    Route::get('/manage', [CuaHangController::class, 'page'])->name('page.manage');
    Route::get('/logout', [CuaHangController::class, 'logout'])->name('page.logout');

    Route::prefix('/product')->group(function () {
    Route::get('/list', [SanPhamController::class, 'index'])->name('pro.index');
    Route::get('/form-pro', [SanPhamController::class, 'addForm'])->name('pro.addForm');
    Route::post('/pro-add', [SanPhamController::class, 'addPro'])->name('pro.add');
    Route::get('/{id}/delete', [SanPhamController::class, 'delete'])->name('pro.delete');
    Route::get('/{id}/revised', [SanPhamController::class, 'revised'])->name('pro.revised');
    Route::post('/{id}/amend', [SanPhamController::class, 'amend'])->name('pro.amend');
    // tim kiem san pham
    Route::post('/find-products', [SanPhamController::class, 'find_products'])->name('pro.find_products');
    // Hình ảnh lien quan
    Route::get('/{id}/erase', [SanPhamController::class, 'erase'])->name('image.erase');
    });

    //show linh vuc theo the loai
    Route::get('/{id}/get', [SanPhamController::class, 'getProductTypeByCat'])->name('pro.get');
    //quan_huyen
    Route::get('/{id}/province', [SanPhamController::class, 'getProvinceByCity'])->name('pro.province');
    //xa_phuong
    Route::get('/{id}/ward', [SanPhamController::class, 'getWardByProvince'])->name('pro.ward');

    Route::prefix('/annals')->group(function () {
    Route::get('/product', [SanPhamController::class, 'historyProduct'])->name('pro.historyProduct');
    });

    Route::prefix('/rope')->group(function () {
    Route::get('/product', [SanPhamController::class, 'rope'])->name('pro.rope');
    });


    Route::prefix('/postuser')->group(function () {
    Route::get('/list', [PostUserController::class, 'index'])->name('postuser.index');
    Route::get('/postuser-plus', [PostUserController::class, 'plus'])->name('postuser.plus');
    Route::post('/postuser-redouble', [PostUserController::class, 'redouble'])->name('postuser.redouble');
    Route::get('/{id}/postuser-dab', [PostUserController::class, 'dab'])->name('postuser.dab');
    Route::get('/{id}/postuser-remark', [PostUserController::class, 'remark'])->name('postuser.remark');
    Route::post('/{id}/postuser-overhaul', [PostUserController::class, 'overhaul'])->name('postuser.overhaul');
    // tim kiem bai viet
    Route::post('/find-post', [PostUserController::class, 'find_posts'])->name('postuser.find_posts');
    });

    Route::prefix('/order')->group(function () {
        Route::get('/list', [OrderCartController::class, 'index'])->name('order.index');
        Route::get('/{id}/detail-order', [OrderCartController::class, 'detail_order'])->name('order.detail_order');
        Route::get('/{id}/delivery', [OrderCartController::class, 'delivery'])->name('order.delivery');
    });

    Route::prefix('/buckle')->group(function () {
        Route::get('/post', [PostUserController::class, 'buckle'])->name('postuser.buckle');
    });

    Route::prefix('/history')->group(function () {
    Route::get('/post', [PostUserController::class, 'historyPost'])->name('postuser.historyPost');
  });

});


Route::middleware(['checkQuanTri'])->group(function () {
  Route::prefix('/admin')->group(function () {
    Route::get('/home', [AuthController::class, 'index'])->name('admin.index');
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::get('/information-admin', [AuthController::class, 'infor_admin'])->name('admin.infor_admin');
    Route::post('/{id}/information-admin-edit', [AuthController::class, 'update'])->name('admin.update');
    Route::get('/{id}/post-detail', [AuthController::class, 'detail_post'])->name('admin.detail_post');
    Route::get('/{id}/pro-detail', [AuthController::class, 'detail_pro'])->name('admin.detail_pro');
    Route::get('/{id}/users-detail', [AuthController::class, 'detail_users'])->name('admin.detail_users');

    //the loai
    Route::prefix('/category')->group(function () {
    Route::get('/list', [TheLoaiController::class, 'index'])->name('cate.index');
    Route::get('/form-add', [TheLoaiController::class, 'addform'])->name('cate.addform');
    Route::post('/cate-add', [TheLoaiController::class, 'add'])->name('cate.add');
    Route::get('/{id}/del', [TheLoaiController::class, 'delete'])->name('cate.delete');
    Route::get('/{id}/edit', [TheLoaiController::class, 'edit'])->name('cate.edit');
    Route::post('/{id}/update', [TheLoaiController::class, 'update'])->name('cate.update');
    });

    //linh vuc
    Route::prefix('/field')->group(function () {
    Route::get('list', [FieldController::class, 'index'])->name('field.index');
    Route::get('/create-field', [FieldController::class, 'create'])->name('field.create');
    Route::post('/field-season', [FieldController::class, 'season'])->name('field.season');
    Route::get('/{id}/efface', [FieldController::class, 'efface'])->name('field.efface');
    Route::get('/{id}/wipe', [FieldController::class, 'wipe'])->name('field.wipe');
    Route::post('/{id}/uphold', [FieldController::class, 'uphold'])->name('field.uphold');
    });

    Route::get('/store', [StoreController::class, 'list'])->name('admin.list');
    Route::get('/align', [StoreController::class, 'align'])->name('admin.align');
    Route::get('/embattle', [StoreController::class, 'embattle'])->name('admin.embattle');
    Route::get('/{id}/lock', [StoreController::class, 'lock'])->name('admin.lock');
    Route::get('/{id}/open', [StoreController::class, 'open'])->name('admin.open');

    //loai bia
    Route::prefix('/cover')->group(function () {
    Route::get('/list', [LoaiBiaController::class, 'index'])->name('cover.index');
    Route::get('/create-cover', [LoaiBiaController::class, 'create'])->name('cover.create');
    Route::post('/cover-add', [LoaiBiaController::class, 'add'])->name('cover.add');
    Route::get('/{id}/destroy', [LoaiBiaController::class, 'destroy'])->name('cover.destroy');
    Route::get('/{id}/control', [LoaiBiaController::class, 'edit'])->name('cover.edit');
    Route::post('/{id}/updated', [LoaiBiaController::class, 'update'])->name('cover.update');
    });

    //tac gia
    Route::prefix('/author')->group(function () {
    Route::get('/list', [TacGiaController::class, 'index'])->name('author.index');
    Route::get('/create-author', [TacGiaController::class, 'create'])->name('author.create');
    Route::post('/author-add', [TacGiaController::class, 'add'])->name('author.add');
    Route::get('/{id}/delete', [TacGiaController::class, 'delete'])->name('author.delete');
    Route::get('/{id}/manipulate', [TacGiaController::class, 'manipulate'])->name('author.manipulate');
    Route::post('/{id}/updates', [TacGiaController::class, 'update'])->name('author.update');
    });

    //cong ty
    Route::prefix('/company')->group(function () {
    Route::get('/list', [CongTyPhatHanhController::class, 'index'])->name('company.index');
    Route::get('/create-company', [CongTyPhatHanhController::class, 'create'])->name('company.create');
    Route::post('/company-padded', [CongTyPhatHanhController::class, 'padded'])->name('company.padded');
    Route::get('/{id}/remove', [CongTyPhatHanhController::class, 'remove'])->name('company.remove');
    Route::get('/{id}/command', [CongTyPhatHanhController::class, 'command'])->name('company.command');
    Route::post('/{id}/upgraded', [CongTyPhatHanhController::class, 'upgraded'])->name('company.upgraded');
    });

    //nha xuat ban
    Route::prefix('/publisher')->group(function () {
    Route::get('/list', [NhaXuatBanController::class, 'index'])->name('publisher.index');
    Route::get('/create-publisher', [NhaXuatBanController::class, 'create'])->name('publisher.create');
    Route::post('/publisher-increased', [NhaXuatBanController::class, 'increased'])->name('publisher.increased');
    Route::get('/{id}/eradicate', [NhaXuatBanController::class, 'eradicate'])->name('publisher.eradicate');
    Route::get('/{id}/modified', [NhaXuatBanController::class, 'modified'])->name('publisher.modified');
    Route::post('/{id}/updating', [NhaXuatBanController::class, 'updating'])->name('publisher.updating');
    });

    //bap cao san pham
    Route::prefix('/product-report')->group(function () {
    Route::get('/list', [AdminProductReportController::class, 'index'])->name('product.report');
    Route::get('/{id}/detail-report', [AdminProductReportController::class, 'detail_report'])->name('product.detail');
    Route::get('/{id}/details-pro', [AdminProductReportController::class, 'detail_pro'])->name('product.details');
    Route::get('/{id}/product-overt', [AdminProductReportController::class, 'overt'])->name('product.overt');
    });

    //bao cao bai viet
    Route::prefix('/post-report')->group(function () {
    Route::get('/list', [AdminPostReportController::class, 'index'])->name('post.report');
    Route::get('/{id}/post-highlight', [AdminPostReportController::class, 'highlight'])->name('post.highlight');
    Route::get('/{id}/post-professed', [AdminPostReportController::class, 'professed'])->name('post.professed');
    Route::get('/{id}/post-pendent', [AdminPostReportController::class, 'pendent'])->name('post.pendent');
    });

    //thong ke bai viet
    Route::get('/statistical', [StatisticalAdminController::class, 'index'])->name('statistical.index');
    Route::get('/filter-by-date', [StatisticalAdminController::class, 'filter_by_date'])->name('statistical.filter_by_date');
    Route::post('/dashboard-filter', [StatisticalAdminController::class, 'dashboard_filter'])->name('statistical.filter_dashboard');
    Route::post('/days-post', [StatisticalAdminController::class, 'days_post'])->name('statistical.days_post');

    //thong ke nguoi dung
    Route::get('/statistical-user', [StatisticalUserAdminController::class, 'index'])->name('statistical_user.index');
    Route::get('/choose-by-date', [StatisticalUserAdminController::class, 'choose_by_date'])->name('statistical_user.choose_by_date');
    Route::post('/dashboard-choose', [StatisticalUserAdminController::class, 'dashboard_choose'])->name('statistical_user.dashboard_choose');
    Route::post('/days-user', [StatisticalUserAdminController::class, 'days_user'])->name('statistical_user.days_user');

    //thong ke san pham
    Route::get('/statistical-product', [StatisticalProductAdminController::class, 'index'])->name('statistical_pro.index');
    Route::get('/filter-product-by-date', [StatisticalProductAdminController::class, 'product_by_date'])->name('statistical_pro.product_by_date');
    Route::post('/dashboard-filter-product', [StatisticalProductAdminController::class, 'dashboard_product'])->name('statistical_pro.dashboard_product');
    Route::post('/days-product', [StatisticalProductAdminController::class, 'days_product'])->name('statistical_pro.days_product');

    // thong tin trang web
    Route::prefix('/information')->group(function () {
        Route::get('/infor', [AdminInformationController::class, 'index'])->name('admin.information');
        Route::post('/infor-add', [AdminInformationController::class, 'add'])->name('information.add');
        Route::post('/{id}/infor-update', [AdminInformationController::class, 'update'])->name('information.update');
    });

    //tim kiem bai viet
    Route::get('/admin-find-post', [AllSearchAdminController::class, 'seek_post'])->name('admin.seek_post');
    //tim kiem san pham
    Route::get('/admin-find-product', [AllSearchAdminController::class, 'seek_product'])->name('admin.seek_product');
    //tim kiem nguoi dung
    Route::get('/admin-find-user', [AllSearchAdminController::class, 'seek_user'])->name('admin.seek_user');
    //tim kiem the loai
    Route::get('/admin-find-category', [AllSearchAdminController::class, 'seek_category'])->name('admin.seek_category');
    //tim kiem linh vuc
    Route::get('/admin-find-field', [AllSearchAdminController::class, 'seek_field'])->name('admin.seek_field');
    //tim kiem nha xuat ban
    Route::get('/admin-find-publisher', [AllSearchAdminController::class, 'seek_publisher'])->name('admin.seek_publisher');
    //tim kiem loai bia
    Route::get('/admin-find-cover', [AllSearchAdminController::class, 'seek_cover'])->name('admin.seek_cover');
    //tim kiem cong ty phat hanh
    Route::get('/admin-find-company', [AllSearchAdminController::class, 'seek_company'])->name('admin.seek_company');
    //tim kiem tac gia
    Route::get('/admin-find-author', [AllSearchAdminController::class, 'seek_author'])->name('admin.seek_author');
  });
});


Route::get('/type', [BookJacketController::class, 'index'])->name('book.index');
Route::get('/checklist', [BookJacketController::class, 'checklist'])->name('book.checklist');
Route::post('/adoption', [BookJacketController::class, 'adoption'])->name('book.adoption');
Route::get('/{idshop}/{idcover}/erased', [BookJacketController::class, 'erased'])->name('book.erased');





