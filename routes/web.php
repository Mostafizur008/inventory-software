<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Backend\Logout\LogoutController;
use App\Http\Controllers\Backend\User\UserController;
use App\Http\Controllers\Backend\User\Profile\ProfileController;
use App\Http\Controllers\Backend\Setting\SettingController;
use App\Http\Controllers\Backend\Others\Suppliers\SuppliersController;
use App\Http\Controllers\Backend\Others\Customer\CustomerController;
use App\Http\Controllers\Backend\Others\Unit\UnitController;
use App\Http\Controllers\Backend\Others\Category\CategoryController;
use App\Http\Controllers\Backend\Others\Product\ProductController;
use App\Http\Controllers\Backend\Others\Purchase\PurchaseController;
use App\Http\Controllers\Backend\Others\Default\DefaultController;
use App\Http\Controllers\Backend\Others\Invoice\InvoiceController;
use App\Http\Controllers\Backend\Others\Report\ReportController;
use App\Http\Controllers\Backend\Others\Report\StockController;
use App\Http\Controllers\Backend\Others\Report\SPController;
use App\Http\Controllers\Backend\Others\Report\DPcController;



Route::get('/', function () {
    return view('auth.admin.login');
});

Auth::routes([
    'register' => false,
    'login' => false,
 ]);

// Login Admin/User
Route::get('/auth/login',[LoginController::class,'AdminLogin'])->name('auth.login');
Route::post('/login/submit',[LoginController::class,'SubmitLogin'])->name('submit.login');

// User Logout
Route::get('/logout',[LogoutController::class,'Logout'])->name('user.logout');

Route::get('/get-category', [DefaultController::class, 'GetCat'])->name('get-category');
Route::get('/get-product', [DefaultController::class, 'GetProduct'])->name('get-product');
Route::get('/check-product',[DefaultController::class,'GetStock'])->name('check.product');;

Route::group(['middleware' => 'auth'],function(){

// Dashboard
Route::get('/dashboard',[DashboardController::class,'Dashboard'])->name('dashboard');

// User List
Route::post('/user',[UserController::class,'Store']);
Route::get('/fetch-user', [UserController::class, 'fetchuser']);
Route::get('/edit-user/{id}', [UserController::class, 'edit']);
Route::put('update-user/{id}', [UserController::class, 'update']);
Route::delete('delete-user/{id}', [UserController::class, 'destroy']);

Route::prefix('users')->group(function()
{
   Route::get('/view',[UserController::class,'UserView'])->name('user.view');
   Route::get('/add',[UserController::class,'UserAdd'])->name('user.add');
   Route::post('/store',[UserController::class,'UserStore'])->name('Store');
});

// Suppliers List
Route::post('/suppliers',[SuppliersController::class,'Store']);
Route::get('/fetch-suppliers', [SuppliersController::class, 'fetchsuppliers']);
Route::get('/edit-suppliers/{id}', [SuppliersController::class, 'edit']);
Route::put('update-suppliers/{id}', [SuppliersController::class, 'update']);
Route::delete('delete-suppliers/{id}', [SuppliersController::class, 'destroy']);

Route::prefix('system')->group(function()
{
   Route::get('/suppliers/view',[SuppliersController::class,'SuppliersView'])->name('suppliers.view');
});

// Customer List
Route::post('/customer',[CustomerController::class,'Store']);
Route::get('/fetch-customer', [CustomerController::class, 'fetchcustomer']);
Route::get('/edit-customer/{id}', [CustomerController::class, 'edit']);
Route::put('update-customer/{id}', [CustomerController::class, 'update']);
Route::delete('delete-customer/{id}', [CustomerController::class, 'destroy']);

Route::prefix('customer')->group(function()
{
   Route::get('/view',[CustomerController::class,'CustomerView'])->name('customer.view');
   Route::get('/credit',[CustomerController::class,'CreditView'])->name('credit.customer');
   Route::get('/credit/pdf',[CustomerController::class,'CreditPdf'])->name('credit.pdf');
   Route::get('/credit/edit/{id}',[CustomerController::class,'EditCredit'])->name('edit.credit');
   Route::post('/credit/update/{invoice_id}',[CustomerController::class,'UpdateCredit'])->name('update.credit');
   Route::get('/credit/pdf/{invoice_id}',[CustomerController::class,'PdfCredit'])->name('pdf.credit');
   Route::get('/paid',[CustomerController::class,'PaidView'])->name('paid.customer');
   Route::get('/paid/pdf',[CustomerController::class,'PaidPdf'])->name('paid.pdf');
});

// Unit List
Route::post('/unit',[UnitController::class,'Store']);
Route::get('/fetch-unit', [UnitController::class, 'fetchunit']);
Route::get('/edit-unit/{id}', [UnitController::class, 'edit']);
Route::put('update-unit/{id}', [UnitController::class, 'update']);
Route::delete('delete-unit/{id}', [UnitController::class, 'destroy']);

// Category List
Route::post('/cat',[CategoryController::class,'Store']);
Route::get('/fetch-cat', [CategoryController::class, 'fetchcat']);
Route::get('/edit-cat/{id}', [CategoryController::class, 'edit']);
Route::put('update-cat/{id}', [CategoryController::class, 'update']);
Route::delete('delete-cat/{id}', [CategoryController::class, 'destroy']);

Route::prefix('system')->group(function()
{
   Route::get('/category/view',[CategoryController::class,'CatView'])->name('cat.view');
   Route::get('/units/view',[UnitController::class,'UnitView'])->name('unit.view');
});

// Product
Route::delete('delete-product/{id}', [ProductController::class, 'destroy']);

Route::prefix('system')->group(function()
{
   Route::get('/product/view',[ProductController::class,'ProductView'])->name('product.view');
   Route::get('/product/add',[ProductController::class,'AddView'])->name('add.product');
   Route::post('/product/store',[ProductController::class,'Store'])->name('store.product');
   Route::get('/product/edit/{id}',[ProductController::class,'ProEdit'])->name('product.edit');
   Route::post('/product/update/{id}',[ProductController::class,'ProUpdate'])->name('product.update');
});

Route::prefix('purchase')->group(function()
{
   Route::get('/view',[PurchaseController::class,'PurchaseView'])->name('purchase.view');
   Route::get('/add',[PurchaseController::class,'AddView'])->name('add.purchase');
   Route::post('/store',[PurchaseController::class,'Store'])->name('store.purchase');
   Route::get('/edit/{id}',[PurchaseController::class,'PurchaseEdit'])->name('purchase.edit');
   Route::post('/update/{id}',[PurchaseController::class,'PurchaseUpdate'])->name('purchase.update');
   Route::get('/pending',[PurchaseController::class,'PendingView'])->name('pending.view');
   Route::get('/change-status/{id}',[PurchaseController::class,'ChangeStatus'])->name('change.status');
});

Route::prefix('invoice')->group(function()
{
   Route::get('/view',[InvoiceController::class,'InvoiceView'])->name('invoice.view');
   Route::get('/add',[InvoiceController::class,'AddView'])->name('add.invoice');
   Route::post('/store',[InvoiceController::class,'Store'])->name('store.invoice');
   Route::get('/pending',[InvoiceController::class,'ApproveView'])->name('approve.view');
   Route::get('/pending/list/{id}',[InvoiceController::class,'PendingInvoice'])->name('pending.invoice.view');
   Route::post('/status-invoice/store/{id}',[InvoiceController::class,'InvoiceStatus'])->name('invoice.status');
   Route::get('/status-detail/{id}',[InvoiceController::class,'Invoice'])->name('invoice.detail');
});

// User Admin Profile
Route::prefix('profile')->group(function()
{
   Route::get('/view',[ProfileController::class,'AdminProfile'])->name('profile.view');
   Route::get('/edit',[ProfileController::class,'AdminProfileEdit'])->name('profile.edit');
   Route::post('/store',[ProfileController::class,'AdminStore'])->name('user.profile.store');
   Route::get('/change/password',[ProfileController::class,'ChPassword'])->name('change.password');
   Route::post('/change/password',[ProfileController::class,'ChPasswordUpdate'])->name('user.change.password.update');
});

// Setting
Route::prefix('setting')->group(function()
{
   Route::get('/update',[SettingController::class,'SettingView'])->name('setting.view');
   Route::post('/update',[SettingController::class,'SettingUpdate'])->name('setting.update');
});

// Report Management
Route::prefix('report')->group(function()
{
   // Daily Report
   Route::get('/daily',[ReportController::class,'View'])->name('daily.view');
   Route::post('/daily/pdf',[ReportController::class,'DailyView'])->name('pdf.view');

   // Stock Report
   Route::get('/stock',[StockController::class,'StView'])->name('stock.view');
   Route::get('/stock/pdf',[StockController::class,'StockView'])->name('stock.pdf.view');

   // Supplier/Product Wise Report
   Route::get('/supplier/stock',[SPController::class,'SpView'])->name('sp.view');
   Route::get('/supplier/stock/pdf',[SPController::class,'SpPdf'])->name('sp.pdf.view');
   Route::get('/product/stock/pdf',[SPController::class,'ProductPdf'])->name('product.pdf.view');

   // Daily Purchase Report
   Route::get('/purchase-stock',[DPcController::class,'PcView'])->name('pc.view');
   Route::post('/purchase-stock/pdf',[DPcController::class,'PcStockView'])->name('pc.pdf.view');
});

});
