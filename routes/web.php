<?php   

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix'=>'admin','middleware'=>['admin','auth'],'namespace'=>'admin'],function(){ 
	Route::get('dashboard','AdminController@index')->name('admin.dashboard');

});

Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'user'],function(){ 
	Route::get('dashboard','UserController@index')->name('user.dashboard');

});

//========Item Catagory============
Route::group(['middleware'=>'auth'],function(){
Route::get('admin/contacts', 'backend\ItemCatagoryController@getIndex')->name('item.index');
Route::get('admin/contacts/data', 'backend\ItemCatagoryController@getData');
Route::post('admin/contacts/store', 'backend\ItemCatagoryController@postStore');
Route::post('admin/contacts/update', 'backend\ItemCatagoryController@postUpdate');
Route::post('admin/contacts/delete', 'backend\ItemCatagoryController@postDelete');

//========Customer Vue ============
	Route::prefix('customers')->group(function(){
	Route::get('/view-customer','backend\CustomersController@view')->name('customers.view');
	Route::get('/add','backend\CustomersController@add')->name('customers.add');
	Route::post('/store','backend\CustomersController@store')->name('customers.store');
	Route::get('/edit/{id}','backend\CustomersController@edit')->name('customers.edit');
	Route::post('/update/{id}','backend\CustomersController@update')->name('customers.update');
	Route::get('/delete/{id}','backend\CustomersController@delete')->name('customers.delete');

});
	Route::prefix('users')->group(function(){
	Route::get('/view','backend\UserController@view')->name('users.view');
	Route::get('/add','backend\UserController@add')->name('users.add');
	Route::post('/store','backend\UserController@store')->name('users.store');
	Route::get('/edit/{id}','backend\UserController@edit')->name('users.edit');
	Route::post('/update/{id}','backend\UserController@update')->name('users.update');
	Route::get('/delete/{id}','backend\UserController@delete')->name('users.delete');

});

	Route::prefix('profiles')->group(function(){
	Route::get('/view','backend\ProfileController@view')->name('profiles.view');
	Route::get('/edit','backend\ProfileController@edit')->name('profiles.edit');
	Route::post('/store','backend\ProfileController@update')->name('profiles.update');
	Route::get('/password/view','backend\ProfileController@passwordview')->name('profiles.password.view');
	Route::post('/password/update','backend\ProfileController@passwordupdate')->name('profiles.password.update');
});

	//========Suppliers============

	Route::prefix('vendors')->group(function(){
	Route::get('/view','backend\VendorController@view')->name('vendors.view');
	Route::get('/add','backend\VendorController@add')->name('vendors.add');
	Route::post('/store','backend\VendorController@store')->name('vendors.store');
	Route::get('/edit/{id}','backend\VendorController@edit')->name('vendors.edit');
	Route::post('/update/{id}','backend\VendorController@update')->name('vendors.update');
	Route::get('/delete/{id}','backend\VendorController@delete')->name('vendors.delete');

});

		//========Customers============

	Route::prefix('members')->group(function(){
	Route::get('/view','backend\MemberController@view')->name('members.view');
	Route::get('/add','backend\MemberController@add')->name('members.add');
	Route::post('/store','backend\MemberController@store')->name('members.store');
	Route::get('/edit/{id}','backend\MemberController@edit')->name('members.edit');
	Route::post('/update/{id}','backend\MemberController@update')->name('members.update');
	Route::get('/delete/{id}','backend\MemberController@delete')->name('members.delete');
	//========member Credit Or due============
	Route::get('/credit/member','backend\MemberController@creditmember')->name('members.credit');
	Route::get('/credit/member/pdf','backend\MemberController@creditmemberpdf')->name('members.credit-pdf');
	Route::get('/invoice/member/edit/{invoice_id}','backend\MemberController@invoicememberedit')->name('members.invoice-edit');
	Route::post('/invoice/member/update/{invoice_id}','backend\MemberController@invoicememberupdate')->name('members.invoice-update');
	Route::get('/invoice/member/details-pdf/{invoice_id}','backend\MemberController@invoicememberdetailspdf')->name('members.invoice-details-pdf');

	//========PAID Customer ============
	Route::get('/paid/member','backend\MemberController@paidmember')->name('members.paid');
	Route::get('/paid/member/pdf','backend\MemberController@paidmemberpdf')->name('members.paid-pdf');
	Route::get('/invoice/paid/member/details-pdf/{invoice_id}','backend\MemberController@invoicecPaidustomerdetailspdf')->name('members.paid-invoice-details-pdf');

	Route::get('/member/wise/report-view','backend\MemberController@memberwisereportview')->name('members.wise-report-view');
	Route::get('/member/wise/report','backend\MemberController@memberwisereport')->name('members.wise-report');
	Route::get('/vendor/wise/report','backend\MemberController@vendorwiseport')->name('members.vendor-wise-report');
	Route::get('/member/wise/report-pdf','backend\MemberController@memberwisereportpdf')->name('members.wise-report-pdf');
	Route::get('/vendor/wise/report-pdf','backend\MemberController@vendorwiseportpdf')->name('members.vendor-wise-report-pdf');


	Route::get('/member/wise/paid/report','backend\MemberController@memberwisepaidreport')->name('members.wise-paid-report');



});





//===============Invoice============
Route::prefix('invoices')->group(function(){
Route::get('/invoice/view', 'backend\InvoiceController@view')->name('invoices.view');
Route::get('/invoice-detail/view', 'backend\InvoiceController@allinvoicedetaillview')->name('invoices.all-detail-view');
Route::get('/invoice/add', 'backend\InvoiceController@add')->name('invoices.add');
Route::post('/invoice/store', 'backend\InvoiceController@store')->name('invoices.store');
Route::get('/invoice/pending-list', 'backend\InvoiceController@pendinglist')->name('invoices.pending-list');
Route::get('/invoice/allview{id}', 'backend\InvoiceController@allview')->name('invoices.allview');
Route::get('/invoice/inactive{id}', 'backend\InvoiceController@inactive')->name('invoices.inactive');
Route::get('/invoice/active{id}', 'backend\InvoiceController@active')->name('invoices.active');
Route::get('/invoice/delete{id}', 'backend\InvoiceController@delete')->name('invoices.delete');
Route::get('/invoice/approve{id}', 'backend\InvoiceController@approve')->name('invoices.approve');
Route::post('/invoice/approve-store{id}', 'backend\InvoiceController@approvestore')->name('invoices.approve-store');

Route::get('/invoice/customer{id}', 'backend\InvoiceController@customerinvoice')->name('invoices.customer-invoice-pdf');
Route::get('daily/invoice/view', 'backend\InvoiceController@dailyview')->name('invoices.daily-report-view');
Route::get('daily/invoice/report', 'backend\InvoiceController@dailyreportpdf')->name('invoices.daily-report-pdf');
Route::get('/invoice/daily/report', 'backend\InvoiceController@dailyreport')->name('invoices.daily-report');
Route::get('/invoice/all/report', 'backend\InvoiceController@allreport')->name('invoices.all-report');


});
	//========Stock============
Route::prefix('stocks')->group(function(){
Route::get('/stock/view', 'backend\StockController@stockview')->name('stocks.view');
Route::get('/stock/repport-pdf', 'backend\StockController@stockpdf')->name('stocks.stock-report-pdf');
Route::get('/stock/supplier-view', 'backend\StockController@supplierstockview')->name('stocks.supplier-stock-view');
Route::get('/stock/supplier/repport-pdf', 'backend\StockController@supplierstockpdf')->name('stocks.supplier-stock-report-pdf');
Route::get('/stock/product/repport-pdf', 'backend\StockController@productstockpdf')->name('stocks.product-stock-report-pdf');

});	//========Student============

	Route::prefix('students')->group(function(){
	Route::get('/view','backend\StudentController@view')->name('students.view');
	Route::get('/add','backend\StudentController@add')->name('students.add');
	Route::post('/store','backend\StudentController@store')->name('students.store');
	
});




//========Default Controller Dropdown Dynamic ============
Route::get('/get-category', 'backend\DefaultController@getcategory')->name('get-category');
Route::get('/get-subcategory', 'backend\DefaultController@subgetcategory')->name('get-subcategory');
Route::get('/get-subsubcategory', 'backend\DefaultController@subsubgetcategory')->name('get-subsubcategory');
Route::get('/get-brand', 'backend\DefaultController@getbrand')->name('get-brand');
Route::get('/get-productname', 'backend\DefaultController@getproductname')->name('get-productname');
Route::get('/get-unit', 'backend\DefaultController@getunit')->name('get-unit');
Route::get('/get-unit', 'backend\DefaultController@getunit')->name('get-unit');
Route::get('/get-model', 'backend\DefaultController@getmodel')->name('get-model');
Route::get('/get-size', 'backend\DefaultController@getsize')->name('get-size');
Route::get('/get-color', 'backend\DefaultController@getcolor')->name('get-color');
Route::get('/get-product-code', 'backend\DefaultController@getproductcode')->name('get-product-code');
Route::get('/get-stock', 'backend\DefaultController@getstock')->name('get-stock');
Route::get('/get-warranty-time', 'backend\DefaultController@getwarrantytime')->name('get-warranty-time');

Route::get('/get-product-name', 'backend\DefaultController@getproduct')->name('get-product');




Route::prefix('accounts')->group(function(){
  Route::get('cost/view','backend\OtherCostController@view')->name('accounts.view');
     Route::get('cost/add','backend\OtherCostController@add')->name('accounts.add');
     Route::post('cost/store','backend\OtherCostController@store')->name('accounts.store');
     Route::get('cost/edit/{id}','backend\OtherCostController@edit')->name('accounts.edit');
     Route::post('cost/update/{id}','backend\OtherCostController@update')->name('accounts.update');
      Route::get('cost/delete/{id}','backend\OtherCostController@delete')->name('accounts.delete');
      Route::get('/invoice/all/report', 'backend\InvoiceController@allreport')->name('accounts.all-report');

});
});