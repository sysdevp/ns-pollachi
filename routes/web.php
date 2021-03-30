<?php

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

use App\Spatie\Permission\Models\Permission;
use App\Spatie\Permission\Models\Role;

// Route::any('/', function () {
//     return view('admin.master.dash');
// })->middleware('auth');

// Route::any('/', function () {
//     return view('admin.master.empty');
// })->middleware('auth');


Route::resource('/', 'DashboardController',['middleware' => ['auth']]);

Route::get('/view', function () {
    return view('Masters.Sample.View');
});

Route::get('/emptydash', function () {
    return view('admin.master.empty');
});


Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('azhahesan@mazenetsolution.com')->send(new \App\Mail\SendMail($details));
   
    dd("Email is Sent.");
});
Route::any('import-item', 'ItemImportExportController@importExportView');
Route::any('import', 'ItemImportExportController@import');
Route::get('/charts', 'ChartController@index')->name('charts');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::any('change-password/{id}', 'UserController@change_password');
Route::any('update-password/{id}', 'UserController@update_password');

/* Common Master Details Start Here */
Route::any('common-master-details/get-state-master-details', 'CommonMasterDetailController@get_state_master_details');
Route::any('common-master-details/get-district-master-details', 'CommonMasterDetailController@get_district_master_details');
Route::any('common-master-details/get-city-master-details', 'CommonMasterDetailController@get_city_master_details');
Route::any('common-master-details/get-location-type-master-details', 'CommonMasterDetailController@get_location_type_master_details');
Route::any('common-master-details/get-bank-branch-master-details', 'CommonMasterDetailController@get_bank_branch_master_details');
Route::any('common-master-details/get-bank-master-details', 'CommonMasterDetailController@get_bank_master_details');
Route::any('common-master-details/get-department-master-details', 'CommonMasterDetailController@get_department_master_details');
Route::any('common-master-details/get-address-type-master-details', 'CommonMasterDetailController@get_address_type_master_details');
Route::any('common-master-details/get-bank-branch-master-details', 'CommonMasterDetailController@get_bank_branch_master_details');
Route::any('common-master-details/get-category-master-details', 'CommonMasterDetailController@get_category_master_details');
Route::any('common-master-details/get-uom-master-details', 'CommonMasterDetailController@get_uom_master_details');
Route::any('common-master-details/get-bulk-item-master-details', 'CommonMasterDetailController@get_bulk_item_master_details');
Route::any('common-master-details/get-customer-master-details', 'CommonMasterDetailController@get_customer_master_details');
Route::any('common-master-details/get-brand-master-details', 'CommonMasterDetailController@get_brand_master_details');
Route::any('common-master-details/get-child-item-master-details', 'CommonMasterDetailController@get_child_item_master_details');
Route::any('common-master-details/get-supplier-master-details', 'CommonMasterDetailController@get_supplier_master_details');
Route::any('common-master-details/get-agent-master-details', 'CommonMasterDetailController@get_agent_master_details');

Route::any('common-master-details/get-expense-type-master-details', 'CommonMasterDetailController@get_expense_type_master_details');


/* Common Master Details End Here */

/* Common Functions Start Here */
Route::any('common/get-state-based-district', 'CommonController@get_state_based_district');
Route::any('common/get-district-based-city', 'CommonController@get_district_based_city');
Route::any('common/get-bank-based-branch', 'CommonController@get_bank_based_branch');
Route::any('common/get-branch-based-ifsc', 'CommonController@get_branch_based_ifsc');
Route::any('common/get-category-based-item', 'CommonController@get_category_based_item');
Route::any('common/get-category-based-bulk-item', 'CommonController@get_category_based_bulk_item');
Route::any('common/get-category-one-based-category-two', 'CommonController@get_category_one_based_category_two');
Route::any('common/get-category-two-based-category-three', 'CommonController@get_category_two_based_category_three');
Route::any('common/get-category-based-item-dets', 'CommonController@get_category_based_item_dets');

/* Common Functions End Here */




/* State Master Group Start Here  */
Route::group(['prefix' => 'master/state', 'middleware' => ['auth']], function () {
    Route::any('/', 'StateController@index')->middleware('permission:state_list');
    Route::any('create', 'StateController@create')->middleware('permission:state_create');
    Route::any('store', 'StateController@store')->middleware('permission:state_create');
    Route::any('show/{id}', 'StateController@show')->middleware('permission:state_list');
    Route::any('edit/{id}', 'StateController@edit')->middleware('permission:state_edit');
    Route::any('update/{id}', 'StateController@update')->middleware('permission:state_edit');
    Route::any('delete/{id}', 'StateController@destroy')->middleware('permission:state_delete');
    Route::any('import-data', 'StateController@import')->middleware('permission:state_list');
    Route::any('store-import-data', 'StateController@importCsv')->middleware('permission:state_list');
    // Route::any('example-file', 'StateController@examplefile')->middleware('permission:state_create');
});

/* State Master Group End Here  */

/* District Master Group Start Here  */
Route::group(['prefix' => 'master/district', 'middleware' => ['auth']], function () {
    Route::any('/', 'DistrictController@index')->middleware('permission:district_list');
    Route::any('create', 'DistrictController@create')->middleware('permission:district_create');
    Route::any('store', 'DistrictController@store')->middleware('permission:district_create');
    Route::any('show/{id}', 'DistrictController@show')->middleware('permission:district_list');
    Route::any('edit/{id}', 'DistrictController@edit')->middleware('permission:district_edit');
    Route::any('update/{id}', 'DistrictController@update')->middleware('permission:district_edit');
    Route::any('delete/{id}', 'DistrictController@destroy')->middleware('permission:district_delete');
    Route::any('import-data', 'DistrictController@import')->middleware('permission:district_list');
    Route::any('store-import-data', 'DistrictController@importCsv')->middleware('permission:district_list');
});
/* District Master Group End Here  */

/* City Master Group Start Here  */
Route::group(['prefix' => 'master/city', 'middleware' => ['auth']], function () {
    Route::any('/', 'CityController@index')->middleware('permission:city_list');
    Route::any('create', 'CityController@create')->middleware('permission:city_create');
    Route::any('store', 'CityController@store')->middleware('permission:city_create');
    Route::any('show/{id}', 'CityController@show')->middleware('permission:city_list');
    Route::any('edit/{id}', 'CityController@edit')->middleware('permission:city_edit');
    Route::any('update/{id}', 'CityController@update')->middleware('permission:city_edit');
    Route::any('delete/{id}', 'CityController@destroy')->middleware('permission:city_delete');
    Route::any('import-data', 'CityController@import')->middleware('permission:city_list');
    Route::any('store-import-data', 'CityController@importCsv')->middleware('permission:city_list');
});
/* City Master Group End Here  */

/* City Master Group Start Here  */
Route::group(['prefix' => 'master/brand', 'middleware' => ['auth']], function () {
    Route::any('/', 'BrandController@index')->middleware('permission:brand_list');
    Route::any('create', 'BrandController@create')->middleware('permission:brand_create');
    Route::any('store', 'BrandController@store')->middleware('permission:brand_create');
    Route::any('show/{id}', 'BrandController@show')->middleware('permission:brand_list');
    Route::any('edit/{id}', 'BrandController@edit')->middleware('permission:brand_edit');
    Route::any('update/{id}', 'BrandController@update')->middleware('permission:brand_edit');
    Route::any('delete/{id}', 'BrandController@destroy')->middleware('permission:brand_delete');

    Route::any('import-data', 'BrandController@import')->middleware('permission:brand_list');
    Route::any('store-import-data', 'BrandController@importCsv')->middleware('permission:brand_create');
});
/* City Master Group End Here  */

/* Location Type Group Start Here  */
Route::group(['prefix' => 'master/location-type', 'middleware' => ['auth']], function () {
    Route::any('/', 'LocationTypeController@index')->middleware('permission:location_type_list');
    Route::any('create', 'LocationTypeController@create')->middleware('permission:location_type_create');
    Route::any('store', 'LocationTypeController@store')->middleware('permission:location_type_create');
    Route::any('show/{id}', 'LocationTypeController@show')->middleware('permission:location_type_list');
    Route::any('edit/{id}', 'LocationTypeController@edit')->middleware('permission:location_type_edit');
    Route::any('update/{id}', 'LocationTypeController@update')->middleware('permission:location_type_edit');
    Route::any('delete/{id}', 'LocationTypeController@destroy')->middleware('permission:location_type_delete');

    Route::any('import-data', 'LocationTypeController@import')->middleware('permission:location_type_list');
    Route::any('store-import-data', 'LocationTypeController@importCsv')->middleware('permission:location_type_list');
});
/* Location Type Master  End Here  */

/* Location Master Group Start Here  */
Route::group(['prefix' => 'master/location', 'middleware' => ['auth']], function () {
    Route::any('/', 'LocationController@index');
    Route::any('create', 'LocationController@create');
    Route::any('store', 'LocationController@store');
    Route::any('show/{id}', 'LocationController@show');
    Route::any('edit/{id}', 'LocationController@edit');
    Route::any('update/{id}', 'LocationController@update');
    Route::any('delete/{id}', 'LocationController@destroy');

    Route::any('import-data', 'LocationController@import');
    Route::any('store-import-data', 'LocationController@importCsv');
});
/* Location Master  End Here  */


/* Bank Master  Start Here  */
Route::group(['prefix' => 'master/bank', 'middleware' => ['auth']], function () {
    Route::any('/', 'BankController@index')->middleware('permission:bank_list');
    Route::any('create', 'BankController@create')->middleware('permission:bank_create');
    Route::any('store', 'BankController@store')->middleware('permission:bank_create');
    Route::any('show/{id}', 'BankController@show')->middleware('permission:bank_list');
    Route::any('edit/{id}', 'BankController@edit')->middleware('permission:bank_edit');
    Route::any('update/{id}', 'BankController@update')->middleware('permission:bank_edit');
    Route::any('delete/{id}', 'BankController@destroy')->middleware('permission:bank_list');

    Route::any('import-data', 'BankController@import')->middleware('permission:bank_list');
    Route::any('store-import-data', 'BankController@importCsv')->middleware('permission:bank_create');
});
/* Bank Master  End Here  */

/* Bank-Branch Master  Start Here  */
Route::group(['prefix' => 'master/bank-branch', 'middleware' => ['auth']], function () {
    Route::any('/', 'BankbranchController@index')->middleware('permission:bank_branch_list');
    Route::any('create', 'BankbranchController@create')->middleware('permission:bank_branch_create');
    Route::any('store', 'BankbranchController@store')->middleware('permission:bank_branch_create');
    Route::any('show/{id}', 'BankbranchController@show')->middleware('permission:bank_branch_list');
    Route::any('edit/{id}', 'BankbranchController@edit')->middleware('permission:bank_branch_edit');
    Route::any('update/{id}', 'BankbranchController@update')->middleware('permission:bank_branch_edit');
    Route::any('delete/{id}', 'BankbranchController@destroy')->middleware('permission:bank_branch_delete');

    Route::any('import-data', 'BankbranchController@import')->middleware('permission:bank_branch_list');
    Route::any('store-import-data', 'BankbranchController@importCsv')->middleware('permission:bank_branch_create');
});
/* Bank-Branch Master  End Here  */

/* Accounts Type Master  Start Here  */
Route::group(['prefix' => 'master/accounts-type', 'middleware' => ['auth']], function () {
    Route::any('/', 'AccountTypeController@index')->middleware('permission:accounts_type_list');
    Route::any('create', 'AccountTypeController@create')->middleware('permission:accounts_type_create');
    Route::any('store', 'AccountTypeController@store')->middleware('permission:accounts_type_create');
    Route::any('show/{id}', 'AccountTypeController@show')->middleware('permission:accounts_type_list');
    Route::any('edit/{id}', 'AccountTypeController@edit')->middleware('permission:accounts_type_edit');
    Route::any('update/{id}', 'AccountTypeController@update')->middleware('permission:accounts_type_edit');
    Route::any('delete/{id}', 'AccountTypeController@destroy')->middleware('permission:accounts_type_delete');

    Route::any('import-data', 'AccountTypeController@import')->middleware('permission:accounts_type_list');
    Route::any('store-import-data', 'AccountTypeController@importCsv')->middleware('permission:accounts_type_create');
});
/* Accounts Type Master  End Here  */

/* Denomination Master  Start Here  */
Route::group(['prefix' => 'master/denomination', 'middleware' => ['auth']], function () {
    Route::any('/', 'DenominationController@index')->middleware('permission:denomination_list');
    Route::any('create', 'DenominationController@create')->middleware('permission:denomination_create');
    Route::any('store', 'DenominationController@store')->middleware('permission:denomination_create');
    Route::any('show/{id}', 'DenominationController@show')->middleware('permission:denomination_list');
    Route::any('edit/{id}', 'DenominationController@edit')->middleware('permission:denomination_edit');
    Route::any('update/{id}', 'DenominationController@update')->middleware('permission:denomination_edit');
    Route::any('delete/{id}', 'DenominationController@destroy')->middleware('permission:denomination_delete');

    Route::any('import-data', 'DenominationController@import')->middleware('permission:denomination_list');
    Route::any('store-import-data', 'DenominationController@importCsv')->middleware('permission:denomination_create');
});
/* Denomination Master  End Here  */


/*Company Bank Master Starts Here*/

Route::resource('company-bank', 'CompanyBankController',['middleware' => ['auth']]);
Route::get('company-bank/delete/{id}', 'CompanyBankController@destroy');
Route::post('company-bank/branch_details/', 'CompanyBankController@branch_details');

Route::get('master/company-bank/import-data', 'CompanyBankController@import');
Route::post('master/company-bank/store-import-data', 'CompanyBankController@importCsv');

/*Company Bank Master Ends Here*/

/*Price Level Settings Master Starts Here*/

Route::resource('price-level', 'PriceLevelController',['middleware' => ['auth']]);
Route::get('price-level/delete/{id}', 'PriceLevelController@destroy');

Route::get('master/price-level/import-data', 'PriceLevelController@import');
Route::post('master/price-level/store-import-data', 'PriceLevelController@importCsv');

/*Price Level Settings Master Ends Here*/

/* Department Master  Start Here  */
Route::group(['prefix' => 'master/department', 'middleware' => ['auth']], function () {
    Route::any('/', 'DepartmentController@index')->middleware('permission:department_list');
    Route::any('create', 'DepartmentController@create')->middleware('permission:department_create');
    Route::any('store', 'DepartmentController@store')->middleware('permission:department_create');
    Route::any('show/{id}', 'DepartmentController@show')->middleware('permission:department_list');
    Route::any('edit/{id}', 'DepartmentController@edit')->middleware('permission:department_edit');
    Route::any('update/{id}', 'DepartmentController@update')->middleware('permission:department_edit');
    Route::any('delete/{id}', 'DepartmentController@destroy')->middleware('permission:department_delete');

    Route::any('import-data', 'DepartmentController@import')->middleware('permission:department_list');
    Route::any('store-import-data', 'DepartmentController@importCsv')->middleware('permission:department_create');
});
/* Department Master  End Here  */

/* Denomination Master  Start Here  */
Route::group(['prefix' => 'master/designation', 'middleware' => ['auth']], function () {
    Route::any('/', 'DesignationController@index')->middleware('permission:desigination_list');
    Route::any('create', 'DesignationController@create');
    Route::any('store', 'DesignationController@store');
    Route::any('show/{id}', 'DesignationController@show')->middleware('permission:desigination_list');
    Route::any('edit/{id}', 'DesignationController@edit')->middleware('permission:desigination_edit');
    Route::any('update/{id}', 'DesignationController@update')->middleware('permission:desigination_edit');
    Route::any('delete/{id}', 'DesignationController@destroy')->middleware('permission:desigination_delete');

    Route::any('import-data', 'DesignationController@import')->middleware('permission:desigination_list');
    Route::any('store-import-data', 'DesignationController@importCsv')->middleware('permission:desigination_create');
});
/* Denomination Master  End Here  */

/* Denomination Master  Start Here  */
Route::group(['prefix' => 'master/address-type', 'middleware' => ['auth']], function () {
    Route::any('/', 'AddressTypeController@index')->middleware('permission:address_type_list');
    Route::any('create', 'AddressTypeController@create')->middleware('permission:address_type_create');
    Route::any('store', 'AddressTypeController@store')->middleware('permission:address_type_create');
    Route::any('show/{id}', 'AddressTypeController@show')->middleware('permission:address_type_list');
    Route::any('edit/{id}', 'AddressTypeController@edit')->middleware('permission:address_type_edit');
    Route::any('update/{id}', 'AddressTypeController@update')->middleware('permission:address_type_edit');
    Route::any('delete/{id}', 'AddressTypeController@destroy')->middleware('permission:address_type_delete');

    Route::any('import-data', 'AddressTypeController@import')->middleware('permission:address_type_list');
    Route::any('store-import-data', 'AddressTypeController@importCsv')->middleware('permission:address_type_create');
});
/* Denomination Master  End Here  */

/* Employee Master  Start Here  */
Route::group(['prefix' => 'master/employee', 'middleware' => ['auth']], function () {
    Route::any('/', 'EmployeeController@index')->middleware('permission:employee_list');
    Route::any('create', 'EmployeeController@create')->middleware('permission:employee_create');
    Route::any('store', 'EmployeeController@store')->middleware('permission:employee_create');
    Route::any('show/{id}', 'EmployeeController@show')->middleware('permission:employee_list');
    Route::any('edit/{id}', 'EmployeeController@edit')->middleware('permission:employee_edit');
    Route::any('update/{id}', 'EmployeeController@update')->middleware('permission:employee_edit');
    Route::any('delete/{id}', 'EmployeeController@destroy')->middleware('permission:employee_delete');
    Route::any('delete-employee-address-details', 'EmployeeController@delete_employee_address_details')->middleware('permission:employee_delete');
    Route::any('delete-employee-proof-details', 'EmployeeController@delete_employee_proof_details')->middleware('permission:employee_delete');

    Route::any('import-data', 'EmployeeController@import')->middleware('permission:employee_list');
    Route::any('store-import-data', 'EmployeeController@importCsv')->middleware('permission:employee_create');
});
/* Employee Master  End Here  */

/* Expense Type Master  Start Here  */
Route::group(['prefix' => 'master/expense-type', 'middleware' => ['auth']], function () {
    Route::any('/', 'ExpenseTypeController@index')->middleware('permission:expense_list');
    Route::any('create', 'ExpenseTypeController@create')->middleware('permission:expense_create');
    Route::any('store', 'ExpenseTypeController@store')->middleware('permission:expense_create');
    Route::any('show/{id}', 'ExpenseTypeController@show')->middleware('permission:expense_list');
    Route::any('edit/{id}', 'ExpenseTypeController@edit')->middleware('permission:expense_edit');
    Route::any('update/{id}', 'ExpenseTypeController@update')->middleware('permission:expense_edit');
    Route::any('delete/{id}', 'ExpenseTypeController@destroy')->middleware('permission:expense_delete');
});
/* Expense Type Master End Here  */

/* Income Type Master  Start Here  */
Route::group(['prefix' => 'master/income-type', 'middleware' => ['auth']], function () {
    Route::any('/', 'IncomeTypeController@index')->middleware('permission:income_list');
    Route::any('create', 'IncomeTypeController@create')->middleware('permission:income_create');
    Route::any('store', 'IncomeTypeController@store')->middleware('permission:income_create');
    Route::any('show/{id}', 'IncomeTypeController@show')->middleware('permission:income_list');
    Route::any('edit/{id}', 'IncomeTypeController@edit')->middleware('permission:income_edit');
    Route::any('update/{id}', 'IncomeTypeController@update')->middleware('permission:income_edit');
    Route::any('delete/{id}', 'IncomeTypeController@destroy')->middleware('permission:income_delete');
});
/* Income Type Master End Here  */

/* Offers Master  Start Here  */
Route::group(['prefix' => 'master/offers', 'middleware' => ['auth']], function () {
    Route::any('/', 'OffersController@index')->middleware('permission:gift_voucher_matser_list');
    Route::any('create', 'OffersController@create')->middleware('permission:gift_voucher_matser_create');
    Route::any('store', 'OffersController@store')->middleware('permission:gift_voucher_matser_create');
    Route::any('show/{id}', 'OffersController@show')->middleware('permission:gift_voucher_matser_list');
    Route::any('edit/{id}', 'OffersController@edit')->middleware('permission:gift_voucher_matser_edit');
    Route::any('update/{id}', 'OffersController@update')->middleware('permission:gift_voucher_matser_edit');
    Route::any('delete/{id}', 'OffersController@destroy')->middleware('permission:gift_voucher_matser_update');
    Route::get('getItem', 'OffersController@getItem');

    Route::any('import-data', 'OffersController@import');
    Route::any('store-import-data', 'OffersController@importCsv');
});
/* Offers Master End Here  */

/* Gift Voucher Master  Start Here  */
Route::group(['prefix' => 'master/gift-voucher', 'middleware' => ['auth']], function () {
    Route::any('/', 'GiftvoucherController@index')->middleware('permission:gift_voucher_matser_list');
    Route::any('create', 'GiftvoucherController@create')->middleware('permission:gift_voucher_matser_create');
    Route::any('store', 'GiftvoucherController@store')->middleware('permission:gift_voucher_matser_create');
    Route::any('show/{id}', 'GiftvoucherController@show')->middleware('permission:gift_voucher_matser_list');
    Route::any('edit/{id}', 'GiftvoucherController@edit')->middleware('permission:gift_voucher_matser_edit');
    Route::any('update/{id}', 'GiftvoucherController@update')->middleware('permission:gift_voucher_matser_edit');
    Route::any('delete/{id}', 'GiftvoucherController@destroy')->middleware('permission:gift_voucher_matser_update');
    Route::get('print/{id}', 'GiftvoucherController@print');

    Route::any('import-data', 'GiftvoucherController@import');
    Route::any('store-import-data', 'GiftvoucherController@importCsv');
});
/* Gift Voucher Master End Here  */

/* Gst Type Master  Start Here  */
Route::group(['prefix' => 'master/gst-type', 'middleware' => ['auth']], function () {
    Route::any('/', 'GstTypeController@index')->middleware('permission:gst_master_list');
    Route::any('create', 'GstTypeController@create')->middleware('permission:gst_master_create');
    Route::any('store', 'GstTypeController@store')->middleware('permission:gst_master_create');
    Route::any('show/{id}', 'GstTypeController@show')->middleware('permission:gst_master_list');
    Route::any('edit/{id}', 'GstTypeController@edit')->middleware('permission:gst_master_edit');
    Route::any('update/{id}', 'GstTypeController@update')->middleware('permission:gst_master_edit');
    Route::any('delete/{id}', 'GstTypeController@destroy')->middleware('permission:gst_master_delete');
});
/* Gst Type Master End Here  */

/* Agent Master  Start Here  */
Route::group(['prefix' => 'master/agent', 'middleware' => ['auth']], function () {
    Route::any('/', 'AgentController@index')->middleware('permission:agent_list');
    Route::any('create', 'AgentController@create')->middleware('permission:agent_create');
    Route::any('store', 'AgentController@store')->middleware('permission:agent_create');
    Route::any('show/{id}', 'AgentController@show')->middleware('permission:agent_list');
    Route::any('edit/{id}', 'AgentController@edit')->middleware('permission:agent_edit');
    Route::any('update/{id}', 'AgentController@update')->middleware('permission:agent_edit');
    Route::any('delete/{id}', 'AgentController@destroy')->middleware('permission:agent_delete');
    Route::any('delete-agent-address-details', 'AgentController@delete_agent_address_details')->middleware('permission:agent_delete');
    Route::any('delete-agent-proof-details', 'AgentController@delete_agent_proof_details')->middleware('permission:agent_delete');

    Route::any('import-data', 'AgentController@import');
    Route::any('store-import-data', 'AgentController@importCsv');

});
Route::post('master/agent/checkname/', 'AgentController@checkname');
/* Agent Master End Here  */
/* Customer Master  Start Here  */
Route::group(['prefix' => 'master/customer', 'middleware' => ['auth']], function () {
    Route::any('/', 'CustomerController@index')->middleware('permission:customer_list');
    Route::any('create', 'CustomerController@create')->middleware('permission:customer_create');
    Route::any('store', 'CustomerController@store')->middleware('permission:customer_create');
    Route::any('show/{id}', 'CustomerController@show')->middleware('permission:customer_list');
    Route::any('edit/{id}', 'CustomerController@edit')->middleware('permission:customer_edit');
    Route::any('update/{id}', 'CustomerController@update')->middleware('permission:customer_edit');
    Route::any('delete/{id}', 'CustomerController@destroy')->middleware('permission:customer_edit');
    Route::any('delete-customer-address-details', 'CustomerController@delete_customer_address_details')->middleware('permission:customer_edit');
    Route::any('delete-customer-bank-details', 'CustomerController@delete_customer_bank_details')->middleware('permission:customer_edit');

    Route::any('import-data', 'CustomerController@import');
    Route::any('store-import-data', 'CustomerController@importCsv');

});
Route::post('master/customer/checkname/', 'CustomerController@checkname');
/* Customer Master End Here  */

/* Supplier Master  Start Here  */
Route::group(['prefix' => 'master/supplier', 'middleware' => ['auth']], function () {
    Route::any('/', 'SupplierController@index')->middleware('permission:supplier_list');
    Route::any('create', 'SupplierController@create')->middleware('permission:supplier_create');
    Route::any('store', 'SupplierController@store')->middleware('permission:supplier_create');
    Route::any('show/{id}', 'SupplierController@show')->middleware('permission:supplier_list');
    Route::any('edit/{id}', 'SupplierController@edit')->middleware('permission:supplier_edit');
    Route::any('update/{id}', 'SupplierController@update')->middleware('permission:supplier_edit');
    Route::any('delete/{id}', 'SupplierController@destroy')->middleware('permission:supplier_delete');
    Route::any('delete-supplier-address-details', 'SupplierController@delete_supplier_address_details')->middleware('permission:supplier_delete');
    Route::any('delete-supplier-bank-details', 'SupplierController@delete_supplier_bank_details')->middleware('permission:supplier_delete');

    Route::any('import-data', 'SupplierController@import');
    Route::any('store-import-data', 'SupplierController@importCsv');
});
Route::post('master/supplier/checkname/', 'SupplierController@checkname');
/* Supplier Master End Here  */

/* Category Name Master  Start Here  */
Route::group(['prefix' => 'master/category-name', 'middleware' => ['auth']], function () {
    Route::any('/', 'CategoryNameController@index')->middleware('permission:category_name_master_list');
    Route::any('create', 'CategoryNameController@create')->middleware('permission:category_name_master_create');
    Route::any('store', 'CategoryNameController@store')->middleware('permission:category_name_master_create');
    Route::any('show/{id}', 'CategoryNameController@show')->middleware('permission:category_name_master_list');
    Route::any('edit/{id}', 'CategoryNameController@edit')->middleware('permission:category_name_master_edit');
    Route::any('update/{id}', 'CategoryNameController@update')->middleware('permission:category_name_master_edit');
    Route::any('delete/{id}', 'CategoryNameController@destroy')->middleware('permission:category_name_master_delete');
});
/* Category Name Master End Here  */

/* Language Master  Start Here  */
Route::group(['prefix' => 'master/uom', 'middleware' => ['auth']], function () {
    Route::any('/', 'UomController@index')->middleware('permission:uom_list');
    Route::any('create', 'UomController@create')->middleware('permission:uom_create');
    Route::any('store', 'UomController@store')->middleware('permission:uom_create');
    Route::any('show/{id}', 'UomController@show')->middleware('permission:uom_list');
    Route::any('edit/{id}', 'UomController@edit')->middleware('permission:uom_edit');
    Route::any('update/{id}', 'UomController@update')->middleware('permission:uom_edit');
    Route::any('delete/{id}', 'UomController@destroy')->middleware('permission:uom_delete');

    Route::any('import-data', 'UomController@import')->middleware('permission:uom_list');
    Route::any('store-import-data', 'UomController@importCsv')->middleware('permission:uom_create');
});
/* Language Master End Here  */

/* UOM Master  Start Here  */
Route::group(['prefix' => 'master/language', 'middleware' => ['auth']], function () {
    Route::any('/', 'LanguageController@index')->middleware('permission:language_master_list');
    Route::any('create', 'LanguageController@create')->middleware('permission:language_master_create');
    Route::any('store', 'LanguageController@store')->middleware('permission:language_master_create');
    Route::any('show/{id}', 'LanguageController@show')->middleware('permission:language_master_list');
    Route::any('edit/{id}', 'LanguageController@edit')->middleware('permission:language_master_edit');
    Route::any('update/{id}', 'LanguageController@update')->middleware('permission:language_master_edit');
    Route::any('delete/{id}', 'LanguageController@destroy')->middleware('permission:language_master_list_delete');
});
/* Uom Master End Here  */

/* Category One Master  Start Here  */
Route::group(['prefix' => 'master/category-one', 'middleware' => ['auth']], function () {
    Route::any('/', 'CategoryOneController@index')->middleware('permission:category_1_master_list');
    Route::any('create', 'CategoryOneController@create')->middleware('permission:category_1_master_create');
    Route::any('store', 'CategoryOneController@store')->middleware('permission:category_1_master_create');
    Route::any('show/{id}', 'CategoryOneController@show')->middleware('permission:category_1_master_list');
    Route::any('edit/{id}', 'CategoryOneController@edit')->middleware('permission:category_1_master_edit');
    Route::any('update/{id}', 'CategoryOneController@update')->middleware('permission:category_1_master_edit');
    Route::any('delete/{id}', 'CategoryOneController@destroy')->middleware('permission:category_1_master_delete');
});
/* Category One Master End Here  */

// /* Category Master  Start Here  */
// Route::group(['prefix' => 'master/category', 'middleware' => ['auth']], function () {
//     Route::any('/', 'CategoryController@index')->middleware('permission:category_name_master_list');
//     Route::any('create', 'CategoryController@create');
//     Route::any('store', 'CategoryController@store');
//     Route::any('show/{id}', 'CategoryController@show');
//     Route::any('edit/{id}', 'CategoryController@edit');
//     Route::any('update/{id}', 'CategoryController@update');
//     Route::any('delete/{id}', 'CategoryController@destroy');
// });
// /* Category Master End Here  */

/* Category Master  Start Here  */
Route::group(['prefix' => 'master/category', 'middleware' => ['auth']], function () {
    Route::any('/', 'CategoryController@index')->middleware('permission:category_name_master_list');
    Route::any('create', 'CategoryController@create')->middleware('permission:category_name_master_create');
    Route::any('store', 'CategoryController@store')->middleware('permission:category_name_master_create');
    Route::any('show/{id}', 'CategoryController@show')->middleware('permission:category_name_master_list');
    Route::any('edit/{id}', 'CategoryController@edit')->middleware('permission:category_name_master_edit');
    Route::any('update/{id}', 'CategoryController@update')->middleware('permission:category_name_master_edit');
    Route::any('delete/{id}', 'CategoryController@destroy')->middleware('permission:category_name_master_delete');

    Route::any('import-data', 'CategoryController@import')->middleware('permission:category_name_master_list');
    Route::any('store-import-data', 'CategoryController@importCsv')->middleware('permission:category_name_master_create');
});
/* Category Master End Here  */

/* Category Two Master  Start Here  */
Route::group(['prefix' => 'master/category-two', 'middleware' => ['auth']], function () {
    Route::any('/', 'CategoryTwoController@index')->middleware('permission:category_2_master_delete');
    Route::any('create', 'CategoryTwoController@create')->middleware('permission:category_2_master_delete');
    Route::any('store', 'CategoryTwoController@store')->middleware('permission:category_2_master_delete');
    Route::any('show/{id}', 'CategoryTwoController@show')->middleware('permission:category_2_master_delete');
    Route::any('edit/{id}', 'CategoryTwoController@edit')->middleware('permission:category_2_master_delete');
    Route::any('update/{id}', 'CategoryTwoController@update')->middleware('permission:category_2_master_delete');
    Route::any('delete/{id}', 'CategoryTwoController@destroy')->middleware('permission:category_2_master_delete');
});
/* Category Two Master End Here  */

/* Category Three Master  Start Here  */
Route::group(['prefix' => 'master/category-three', 'middleware' => ['auth']], function () {
    Route::any('/', 'CategoryThreeController@index')->middleware('permission:category_3_master_list');
    Route::any('create', 'CategoryThreeController@create')->middleware('permission:category_3_master_create');
    Route::any('store', 'CategoryThreeController@store')->middleware('permission:category_3_master_create');
    Route::any('show/{id}', 'CategoryThreeController@show')->middleware('permission:category_3_master_list');
    Route::any('edit/{id}', 'CategoryThreeController@edit')->middleware('permission:category_3_master_edit');
    Route::any('update/{id}', 'CategoryThreeController@update')->middleware('permission:category_3_master_edit');
    Route::any('delete/{id}', 'CategoryThreeController@destroy')->middleware('permission:category_3_master_delete');
});
/* Category Three Master End Here  */

/* Area Master  Start Here  */
Route::group(['prefix' => 'master/area', 'middleware' => ['auth']], function () {
    Route::any('/', 'AreaController@index')->middleware('permission:area_list');
    Route::any('create', 'AreaController@create')->middleware('permission:area_create');
    Route::any('store', 'AreaController@store')->middleware('permission:area_create');
    Route::any('show/{id}', 'AreaController@show')->middleware('permission:area_list');
    Route::any('edit/{id}', 'AreaController@edit')->middleware('permission:area_edit');
    Route::any('update/{id}', 'AreaController@update')->middleware('permission:area_edit');
    Route::any('delete/{id}', 'AreaController@destroy')->middleware('permission:area_delete');

    Route::any('import-data', 'AreaController@import')->middleware('permission:area_list');
    Route::any('store-import-data', 'AreaController@importCsv')->middleware('permission:area_create');
});
/* Area Master End Here  */


/* Agent Area Mapping Master  Start Here  */
Route::group(['prefix' => 'master/agent-area-mapping', 'middleware' => ['auth']], function () {
    Route::any('/', 'AgentAreaMappingController@index')->middleware('permission:agent_area_mapping_list');
    Route::any('create', 'AgentAreaMappingController@create')->middleware('permission:agent_area_mapping_create');
    Route::any('store', 'AgentAreaMappingController@store')->middleware('permission:agent_area_mapping_create');
    Route::any('show/{id}', 'AgentAreaMappingController@show')->middleware('permission:agent_area_mapping_list');
    Route::any('edit/{id}', 'AgentAreaMappingController@edit')->middleware('permission:agent_area_mapping_edit');
    Route::any('update/{id}', 'AgentAreaMappingController@update')->middleware('permission:agent_area_mapping_edit');
    Route::any('delete/{id}', 'AgentAreaMappingController@destroy')->middleware('permission:agent_area_mapping_delete');
});
/* Agent Area Mapping Master End Here  */

/* Item Master  Start Here  */
Route::group(['prefix' => 'master/item', 'middleware' => ['auth']], function () {
    Route::any('/', 'ItemController@index')->middleware('permission:item_master_list');
    Route::any('create', 'ItemController@create')->middleware('permission:item_master_create');
    Route::any('store', 'ItemController@store')->middleware('permission:item_master_create');
    Route::any('show/{id}', 'ItemController@show')->middleware('permission:item_master_list');
    Route::any('edit/{id}', 'ItemController@edit')->middleware('permission:item_master_edit');
    Route::any('update/{id}', 'ItemController@update')->middleware('permission:item_master_edit');
    Route::any('delete/{id}', 'ItemController@destroy')->middleware('permission:item_master_delete');
    Route::any('uom-factor-convertion-for-item/{id}', 'ItemController@uomfactorconvertionforitem')->middleware('permission:uom_factor_convertion_for_item_list');
    Route::any('store-uom-factor-convertion-for-item', 'ItemController@store_uom_factor_convertion_for_item')->middleware('permission:uom_factor_convertion_for_item_list');
    Route::any('delete-uom-factor-convertion-for-item', 'ItemController@delete_uom_factor_convertion_for_item')->middleware('permission:uom_factor_convertion_for_item_delete');
    Route::any('remove-item-barcode-details', 'ItemController@remove_item_barcode_details');

    Route::any('import-data', 'ItemController@import');
    Route::any('store-import-data', 'ItemController@importCsv');

    Route::any('multiple-item', 'ItemController@multiple_item');
    Route::any('direct-item-store', 'ItemController@direct_items');
    Route::any('bulk-item-store', 'ItemController@bulk_items');
    Route::any('repack-item-store', 'ItemController@repack_items');
    Route::any('parent-item-store', 'ItemController@parent_items');
    
});
/* Item Master End Here  */

/*Tax Master Start Here*/

Route::resource('tax', 'TaxController',['middleware' => ['auth']]);
Route::any('tax/delete/{id}', 'TaxController@destroy');
Route::any('master/tax/import-data', 'TaxController@import');
Route::any('master/tax/store-import-data', 'TaxController@importCsv');

/*Tax Master End Here*/


/* Item Master  Start Here  */
Route::group(['prefix' => 'master/item-tax-details', 'middleware' => ['auth']], function () {
    Route::any('/', 'ItemTaxDetailsController@index')->middleware('permission:item_tax_details_list');
    Route::any('search-item-by-category', 'ItemTaxDetailsController@search_item_by_category')->middleware('permission:item_tax_details_list');
    Route::any('create', 'ItemTaxDetailsController@create')->middleware('permission:item_tax_details_create');
    Route::any('store', 'ItemTaxDetailsController@store')->middleware('permission:item_tax_details_create');
    Route::any('show/{id}', 'ItemTaxDetailsController@show')->middleware('permission:item_tax_details_list');
    Route::any('edit/{id}', 'ItemTaxDetailsController@edit')->middleware('permission:item_tax_details_edit');
    Route::any('update/{id}', 'ItemTaxDetailsController@update');
    Route::any('delete/{id}', 'ItemTaxDetailsController@destroy')->middleware('permission:item_tax_details_delete');
    Route::any('tax_details/{id}', 'ItemTaxDetailsController@tax_details');

    
});
/* Item Master End Here  */



/* Item   Start Here  */
Route::group(['prefix' => 'master/uom-factor-convertion-for-item', 'middleware' => ['auth']], function () {
    Route::any('/', 'UomFactorConvertionForItemController@index');
    Route::any('create', 'UomFactorConvertionForItemController@create');
    Route::any('store', 'UomFactorConvertionForItemController@store');
    Route::any('show/{id}', 'UomFactorConvertionForItemController@show');
    Route::any('edit/{id}', 'UomFactorConvertionForItemController@edit');
    Route::any('update/{id}', 'UomFactorConvertionForItemController@update');
    Route::any('delete/{id}', 'UomFactorConvertionForItemController@destroy');
});
/* Item Master End Here  */


/* User Master Start Here  */
Route::group(['prefix' => 'master/user', 'middleware' => ['auth']], function () {
    Route::any('/', 'UserController@index')->middleware('permission:user_list');
    Route::any('create', 'UserController@create')->middleware('permission:user_create');
    Route::any('store', 'UserController@store')->middleware('permission:user_create');
    Route::any('show/{id}', 'UserController@show')->middleware('permission:user_list');
    Route::any('edit/{id}', 'UserController@edit')->middleware('permission:user_edit');
    Route::any('update/{id}', 'UserController@update')->middleware('permission:user_edit');
    Route::any('delete/{id}', 'UserController@destroy')->middleware('permission:user_delete');

    Route::any('import-data', 'UserController@import')->middleware('permission:state_list');
    Route::any('store-import-data', 'UserController@importCsv')->middleware('permission:state_list');
});
/* User Master End Here  */


/* Role Master Group Start Here  */
Route::group(['prefix' => 'master/role', 'middleware' => ['auth'], 'middleware' => ['auth']], function () {
    Route::any('/', 'RoleController@index');
    Route::any('create', 'RoleController@create');
    Route::any('store', 'RoleController@store');
    Route::any('show/{id}', 'RoleController@show');
    Route::any('edit/{id}', 'RoleController@edit');
    Route::any('update/{id}', 'RoleController@update');
    Route::any('delete/{id}', 'RoleController@destroy')->middleware('permission:role_delete');
});
/* Role Master Group End Here  */



/* Gate Pass Entry Start Here  */

Route::resource('gate_pass_entry', 'GatePassEntryController',['middleware' => ['auth']]);
   
/* Gate Pass Entry End Here  */

/* Cart Start Here  */

Route::resource('cart', 'CartController',['middleware' => ['auth']]);

   
/* Cart End Here  */


/* Purchase Start Here  */

Route::resource('purchase', 'PurchaseController',['middleware' => ['auth']]);
Route::get('purchase/getdata/{id}', 'PurchaseController@getdata');
Route::post('purchase/storedata/', 'PurchaseController@storedata');
Route::post('purchase/gatepass_details/', 'PurchaseController@gatepass_details');
Route::post('purchase/remove_data/', 'PurchaseController@remove_data');
Route::get('purchase/item_details/{id}', 'PurchaseController@item_details');
Route::get('purchase/change_items/{id}', 'PurchaseController@change_items');
Route::get('purchase/get_items/{id}', 'PurchaseController@get_items');

   
/* Purchase End Here  */

/*Price Updation Satrt Here*/

Route::resource('price_updation', 'PriceUpdationController',['middleware' => ['auth']])->middleware('permission:price_updation_edit|price_updation_create|price_updation_list');
Route::get('price_updation/change_items/{id}', 'PriceUpdationController@change_items');
Route::get('price_updation/brand_filter/{id}', 'PriceUpdationController@brand_filter');
Route::get('price_updation/browse_item/{id}', 'PriceUpdationController@browse_item');
Route::get('price_updation/delete/{id}', 'PriceUpdationController@destroy')->middleware('permission:price_updation_delete');

/*Price Updation End Here*/

/* Estimation Start Here  */

Route::resource('estimation', 'EstimationController',['middleware' => ['auth']])->middleware('permission:estimation_edit|estimation_create');
Route::group(['middleware' => 'auth'],function(){
Route::get('estimation/index/{id}', 'EstimationController@index')->middleware('permission:estimation_list');
});
Route::post('estimation/address_details/', 'EstimationController@address_details');
Route::get('estimation/getdata/{id}', 'EstimationController@getdata');
Route::get('estimation/remove_data/{id}', 'EstimationController@remove_data');
Route::get('estimation/change_items/{id}', 'EstimationController@change_items');
Route::post('estimation/brand_filter/', 'EstimationController@brand_filter');
Route::get('estimation/browse_item/{id}', 'EstimationController@browse_item');
Route::get('estimation/getdata_item/{id}', 'EstimationController@getdata_item');
Route::get('estimation/same_items/{id}', 'EstimationController@same_items');
Route::get('estimation/item_details/{id}', 'EstimationController@item_details');
Route::get('estimation/expense_details/{id}', 'EstimationController@expense_details');
Route::post('estimation/last_purchase_rate/', 'EstimationController@last_purchase_rate');
Route::get('estimation/delete/{id}', 'EstimationController@destroy')->middleware('permission:estimation_delete');
Route::post('estimation/print/', 'EstimationController@print_details');

Route::get('estimation/cancel/{id}', 'EstimationController@cancel');
Route::get('estimation/retrieve/{id}', 'EstimationController@retrieve');
Route::post('estimation/voucher_type/', 'EstimationController@voucher_type');

// Route::post('estimation/print/', 'EstimationPrintController@create_page_print');

/* Estimation End Here  */

/* Purchase Order Start Here  */

// Route::resource('purchase_order', 'PurchaseOrderController',['middleware' => ['auth']])->middleware('permission:purchase_order_edit|purchase_order_create');
// Route::group(['middleware' => 'auth'], function () {
//      Route::get('purchase_order/index/{id}', 'PurchaseOrderController@index')->middleware('permission:purchase_order_list');
// });

// Route::post('purchase_order/address_details/', 'PurchaseOrderController@address_details');
// Route::get('purchase_order/getdata/{id}', 'PurchaseOrderController@getdata');
// Route::get('purchase_order/remove_data/{id}', 'PurchaseOrderController@remove_data');
// Route::get('purchase_order/change_items/{id}', 'PurchaseOrderController@change_items');
// Route::post('purchase_order/brand_filter/', 'PurchaseOrderController@brand_filter');
// Route::get('purchase_order/browse_item/{id}', 'PurchaseOrderController@browse_item');
// Route::get('purchase_order/getdata_item/{id}', 'PurchaseOrderController@getdata_item');
// Route::get('purchase_order/same_items/{id}', 'PurchaseOrderController@same_items');
// Route::get('purchase_order/item_details/{id}', 'PurchaseOrderController@item_details');
// Route::get('purchase_order/expense_details/{id}', 'PurchaseOrderController@expense_details');
// Route::post('purchase_order/last_purchase_rate/', 'PurchaseOrderController@last_purchase_rate');
// Route::get('purchase_order/delete/{id}', 'PurchaseOrderController@destroy')->middleware('permission:purchase_order_delete');
// Route::post('purchase_order/estimation_details/', 'PurchaseOrderController@estimation_details');

// Route::get('purchase_order/cancel/{id}', 'PurchaseOrderController@cancel');
// Route::get('purchase_order/retrieve/{id}', 'PurchaseOrderController@retrieve');

// Route::post('purchase_order/beta_data/', 'PurchaseOrderController@beta_data');

// Route::get('purchase_order/show_beta/{id}', 'PurchaseOrderController@show_beta');
// Route::get('purchase_order/edit_beta/{id}', 'PurchaseOrderController@edit_beta');
// Route::get('purchase_order/delete_beta/{id}', 'PurchaseOrderController@delete_beta');
// Route::get('purchase_order/cancel_beta/{id}', 'PurchaseOrderController@cancel_beta');
// Route::get('purchase_order/retrieve_beta/{id}', 'PurchaseOrderController@retrieve_beta');
// Route::get('purchase_order/item_beta_details/{id}', 'PurchaseOrderController@item_beta_details');
// Route::get('purchase_order/expense_beta_details/{id}', 'PurchaseOrderController@expense_beta_details');

    
Route::resource('purchase_order', 'PurchaseOrderController',['middleware' => ['auth']]);
Route::group(['middleware' => 'auth'], function () {
     Route::get('purchase_order/index/{id}', 'PurchaseOrderController@index');
});

Route::post('purchase_order/address_details/', 'PurchaseOrderController@address_details');
Route::get('purchase_order/getdata/{id}', 'PurchaseOrderController@getdata');
Route::get('purchase_order/remove_data/{id}', 'PurchaseOrderController@remove_data');
Route::get('purchase_order/change_items/{id}', 'PurchaseOrderController@change_items');
Route::post('purchase_order/brand_filter/', 'PurchaseOrderController@brand_filter');
Route::get('purchase_order/browse_item/{id}', 'PurchaseOrderController@browse_item');
Route::get('purchase_order/getdata_item/{id}', 'PurchaseOrderController@getdata_item');
Route::get('purchase_order/same_items/{id}', 'PurchaseOrderController@same_items');
Route::get('purchase_order/item_details/{id}', 'PurchaseOrderController@item_details');
Route::get('purchase_order/expense_details/{id}', 'PurchaseOrderController@expense_details');
Route::post('purchase_order/last_purchase_rate/', 'PurchaseOrderController@last_purchase_rate');
Route::get('purchase_order/delete/{id}', 'PurchaseOrderController@destroy');
Route::post('purchase_order/estimation_details/', 'PurchaseOrderController@estimation_details');

Route::get('purchase_order/cancel/{id}', 'PurchaseOrderController@cancel');
Route::get('purchase_order/retrieve/{id}', 'PurchaseOrderController@retrieve');

Route::post('purchase_order/beta_data/', 'PurchaseOrderController@beta_data');

Route::get('purchase_order/show_beta/{id}', 'PurchaseOrderController@show_beta');
Route::get('purchase_order/edit_beta/{id}', 'PurchaseOrderController@edit_beta');
Route::get('purchase_order/delete_beta/{id}', 'PurchaseOrderController@delete_beta');
Route::get('purchase_order/cancel_beta/{id}', 'PurchaseOrderController@cancel_beta');
Route::get('purchase_order/retrieve_beta/{id}', 'PurchaseOrderController@retrieve_beta');
Route::get('purchase_order/item_beta_details/{id}', 'PurchaseOrderController@item_beta_details');
Route::get('purchase_order/expense_beta_details/{id}', 'PurchaseOrderController@expense_beta_details');

Route::post('purchase_order/voucher_type/', 'PurchaseOrderController@voucher_type');



/* Purchase Order End Here  */

/* Purchase Gate Pass entry Start Here  */

Route::resource('purchase_gatepass_entry', 'PurchaseGatepassEntryController',['middleware' => ['auth']])->middleware('permission:purchase_gate_pass_entry_edit|purchase_gate_pass_entry_create');
Route::group(['middleware' => 'auth'], function () {
     Route::get('purchase_gatepass_entry/index/{id}', 'PurchaseGatepassEntryController@index')->middleware('permission:purchase_gate_pass_entry_list');
});
Route::post('purchase_gatepass_entry/address_details/', 'PurchaseGatepassEntryController@address_details');
Route::get('purchase_gatepass_entry/delete/{id}', 'PurchaseGatepassEntryController@destroy')->middleware('permission:purchase_gate_pass_entry_delete');
Route::post('purchase_gatepass_entry/po_details/', 'PurchaseGatepassEntryController@po_details');

/* Purchase Gate Pass entry End Here  */

/* Purchase entry Start Here  */

Route::resource('purchase_entry', 'PurchaseEntryController',['middleware' => ['auth']])->middleware('permission:purchase_entry_create|purchase_entry_edit');
Route::group(['middleware' => 'auth'], function () {
     Route::get('purchase_entry/index/{id}', 'PurchaseEntryController@index')->middleware('permission:purchase_entry_list');
});
Route::post('purchase_entry/address_details/', 'PurchaseEntryController@address_details');
Route::get('purchase_entry/getdata/{id}', 'PurchaseEntryController@getdata');
Route::get('purchase_entry/remove_data/{id}', 'PurchaseEntryController@remove_data');
Route::get('purchase_entry/change_items/{id}', 'PurchaseEntryController@change_items');
Route::post('purchase_entry/brand_filter/', 'PurchaseEntryController@brand_filter');
Route::get('purchase_entry/browse_item/{id}', 'PurchaseEntryController@browse_item');
Route::get('purchase_entry/getdata_item/{id}', 'PurchaseEntryController@getdata_item');
Route::get('purchase_entry/same_items/{id}', 'PurchaseEntryController@same_items');
Route::get('purchase_entry/item_details/{id}', 'PurchaseEntryController@item_details');
Route::get('purchase_entry/expense_details/{id}', 'PurchaseEntryController@expense_details');
Route::post('purchase_entry/last_purchase_rate/', 'PurchaseEntryController@last_purchase_rate');
Route::get('purchase_entry/delete/{id}', 'PurchaseEntryController@destroy')->middleware('permission:purchase_entry_delete');
Route::post('purchase_entry/po_details/', 'PurchaseEntryController@po_details');
Route::post('purchase_entry/estimation_details/', 'PurchaseEntryController@estimation_details');
Route::post('purchase_entry/receipt_details/', 'PurchaseEntryController@receipt_details');

Route::get('purchase_entry/cancel/{id}', 'PurchaseEntryController@cancel');
Route::get('purchase_entry/retrieve/{id}', 'PurchaseEntryController@retrieve');
Route::get('purchase_entry/print_batchcode/{id}', 'PurchaseEntryController@print_batchcode');

Route::post('purchase_entry/po_alpha_beta/', 'PurchaseEntryController@po_alpha_beta');

Route::get('purchase_entry/show_beta/{id}', 'PurchaseEntryController@show_beta');
Route::get('purchase_entry/edit_beta/{id}', 'PurchaseEntryController@edit_beta');
Route::get('purchase_entry/delete_beta/{id}', 'PurchaseEntryController@delete_beta');
Route::get('purchase_entry/cancel_beta/{id}', 'PurchaseEntryController@cancel_beta');
Route::get('purchase_entry/retrieve_beta/{id}', 'PurchaseEntryController@retrieve_beta');
Route::get('purchase_entry/item_beta_details/{id}', 'PurchaseEntryController@item_beta_details');
Route::get('purchase_entry/expense_beta_details/{id}', 'PurchaseEntryController@expense_beta_details');

Route::post('purchase_entry/voucher_type/', 'PurchaseEntryController@voucher_type');
Route::post('purchase_entry/print_items/', 'PurchaseEntryController@print_items');

/* Purchase entry End Here  */

/* Sales Estimation Start Here  */

Route::resource('sales_estimation', 'SalesEstimationController',['middleware' => ['auth']])->middleware('permission:sales_estimation_edit|sales_estimation_create');
Route::group(['middleware' => 'auth'], function () {
     Route::get('sales_estimation/index/{id}', 'SalesEstimationController@index')->middleware('permission:sales_estimation_list');
});
Route::post('sales_estimation/address_details/', 'SalesEstimationController@address_details');
Route::get('sales_estimation/getdata/{id}', 'SalesEstimationController@getdata');
Route::get('sales_estimation/remove_data/{id}', 'SalesEstimationController@remove_data');
Route::get('sales_estimation/change_items/{id}', 'SalesEstimationController@change_items');
Route::post('sales_estimation/brand_filter/', 'SalesEstimationController@brand_filter');
Route::get('sales_estimation/browse_item/{id}', 'SalesEstimationController@browse_item');
Route::get('sales_estimation/getdata_item/{id}', 'SalesEstimationController@getdata_item');
Route::get('sales_estimation/same_items/{id}', 'SalesEstimationController@same_items');
Route::get('sales_estimation/item_details/{id}', 'SalesEstimationController@item_details');
Route::get('sales_estimation/expense_details/{id}', 'SalesEstimationController@expense_details');
Route::post('sales_estimation/last_purchase_rate/', 'SalesEstimationController@last_purchase_rate')->middleware('permission:sales_estimation_delete');
Route::get('sales_estimation/delete/{id}', 'SalesEstimationController@destroy');

Route::get('sales_estimation/cancel/{id}', 'SalesEstimationController@cancel');
Route::get('sales_estimation/retrieve/{id}', 'SalesEstimationController@retrieve');

Route::post('sales_estimation/voucher_type/', 'SalesEstimationController@voucher_type');

/* Sales Estimation End Here  */

/* Sales Order Start Here  */

Route::resource('sale_order', 'SalesOrderController',['middleware' => ['auth']])->middleware('permission:sales_order_create|sales_order_edit');
Route::group(['middleware' => 'auth'], function () {
     Route::get('sale_order/index/{id}', 'SalesOrderController@index')->middleware('permission:sales_order_list');
});
Route::post('sale_order/address_details/', 'SalesOrderController@address_details');
Route::get('sale_order/getdata/{id}', 'SalesOrderController@getdata');
Route::get('sale_order/remove_data/{id}', 'SalesOrderController@remove_data');
Route::get('sale_order/change_items/{id}', 'SalesOrderController@change_items');
Route::post('sale_order/brand_filter/', 'SalesOrderController@brand_filter');
Route::get('sale_order/browse_item/{id}', 'SalesOrderController@browse_item');
Route::get('sale_order/getdata_item/{id}', 'SalesOrderController@getdata_item');
Route::get('sale_order/same_items/{id}', 'SalesOrderController@same_items');
Route::get('sale_order/item_details/{id}', 'SalesOrderController@item_details');
Route::get('sale_order/expense_details/{id}', 'SalesOrderController@expense_details');
Route::post('sale_order/last_purchase_rate/', 'SalesOrderController@last_purchase_rate');
Route::get('sale_order/delete/{id}', 'SalesOrderController@destroy')->middleware('permission:sales_order_delete');
Route::post('sales_order/estimation_details/', 'SalesOrderController@se_details');

Route::get('sale_order/cancel/{id}', 'SalesOrderController@cancel');
Route::get('sale_order/retrieve/{id}', 'SalesOrderController@retrieve');

Route::get('sale_order/show_beta/{id}', 'SalesOrderController@show_beta');
Route::get('sale_order/edit_beta/{id}', 'SalesOrderController@edit_beta');
Route::get('sale_order/delete_beta/{id}', 'SalesOrderController@delete_beta');
Route::get('sale_order/cancel_beta/{id}', 'SalesOrderController@cancel_beta');
Route::get('sale_order/retrieve_beta/{id}', 'SalesOrderController@retrieve_beta');
Route::get('sale_order/item_beta_details/{id}', 'SalesOrderController@item_beta_details');
Route::get('sale_order/expense_beta_details/{id}', 'SalesOrderController@expense_beta_details');

Route::post('sale_order/voucher_type/', 'SalesOrderController@voucher_type');

/* Sales Order End Here  */

/* Sales entry Start Here  */

Route::resource('sales_entry', 'SalesEntryController',['middleware' => ['auth']])->middleware('permission:sales_entry_create|sales_entry_edit');
Route::group(['middleware' => 'auth'], function () {
     Route::get('sales_entry/index/{id}', 'SalesEntryController@index')->middleware('permission:sales_entry_list');
});
Route::post('sales_entry/address_details/', 'SalesEntryController@address_details');
Route::get('sales_entry/getdata/{id}', 'SalesEntryController@getdata');
Route::get('sales_entry/change_items/{id}', 'SalesEntryController@change_items');
Route::post('sales_entry/brand_filter/', 'SalesEntryController@brand_filter');
Route::get('sales_entry/browse_item/{id}', 'SalesEntryController@browse_item');
Route::get('sales_entry/getdata_item/{id}', 'SalesEntryController@getdata_item');
Route::get('sales_entry/same_items/{id}', 'SalesEntryController@same_items');
Route::get('sales_entry/item_details/{id}', 'SalesEntryController@item_details');
Route::get('sales_entry/expense_details/{id}', 'SalesEntryController@expense_details');
Route::post('sales_entry/last_purchase_rate/', 'SalesEntryController@last_purchase_rate');
Route::get('sales_entry/delete/{id}', 'SalesEntryController@destroy')->middleware('permission:sales_entry_delete');
Route::get('sales_entry/delete_beta/{id}', 'SalesEntryController@delete_beta');
Route::post('sales_entry/se_details/', 'SalesEntryController@se_details');
Route::post('sales_entry/so_details/', 'SalesEntryController@so_details');
Route::post('sales_entry/delivery_details/', 'SalesEntryController@delivery_details');

Route::get('sales_entry/cancel/{id}', 'SalesEntryController@cancel');
Route::get('sales_entry/retrieve/{id}', 'SalesEntryController@retrieve');

Route::post('sales_entry/po_alpha_beta/', 'SalesEntryController@po_alpha_beta');

Route::get('sales_entry/edit_beta/{id}', 'SalesEntryController@edit_beta');
Route::get('sales_entry/cancel_beta/{id}', 'SalesEntryController@cancel_beta');
Route::get('sales_entry/retrieve_beta/{id}', 'SalesEntryController@retrieve_beta');
Route::get('sales_entry/item_beta_details/{id}', 'SalesEntryController@item_beta_details');
Route::get('sales_entry/expense_beta_details/{id}', 'SalesEntryController@expense_beta_details');

Route::post('sales_entry/getdata_offer/', 'SalesEntryController@getdata_offer');

Route::post('sales_entry/voucher_type/', 'SalesEntryController@voucher_type');


/* Sales entry End Here  */

/* Sales Gate Pass entry Start Here  */

Route::resource('sales_gatepass_entry', 'SalesGatepassEntryController',['middleware' => ['auth']])->middleware('permission:sales_gatepass_entry_create|sales_gatepass_entry_edit');
Route::group(['middleware' => 'auth'], function () {
     Route::get('sales_gatepass_entry/index/{id}', 'SalesGatepassEntryController@index')->middleware('permission:sales_gatepass_entry_list');
});
Route::post('sales_gatepass_entry/address_details/', 'SalesGatepassEntryController@address_details');
Route::get('sales_gatepass_entry/delete/{id}', 'SalesGatepassEntryController@destroy')->middleware('permission:sales_gatepass_entry_delete');
Route::post('sales_gatepass_entry/so_details/', 'SalesGatepassEntryController@so_details');

/* Sales Gate Pass entry End Here  */

/* Receipt Note Start Here  */

Route::resource('receipt_note', 'ReceiptNoteController',['middleware' => ['auth']])->middleware('permission:receipt_note_create|receipt_note_edit');
Route::group(['middleware' => 'auth'], function () {
     Route::get('receipt_note/index/{id}', 'ReceiptNoteController@index')->middleware('permission:receipt_note_list');
});
Route::post('receipt_note/address_details/', 'ReceiptNoteController@address_details');
Route::get('receipt_note/getdata/{id}', 'ReceiptNoteController@getdata');
Route::get('receipt_note/remove_data/{id}', 'ReceiptNoteController@remove_data');
Route::get('receipt_note/change_items/{id}', 'ReceiptNoteController@change_items');
Route::post('receipt_note/brand_filter/', 'ReceiptNoteController@brand_filter');
Route::get('receipt_note/browse_item/{id}', 'ReceiptNoteController@browse_item');
Route::get('receipt_note/getdata_item/{id}', 'ReceiptNoteController@getdata_item');
Route::get('receipt_note/same_items/{id}', 'ReceiptNoteController@same_items');
Route::get('receipt_note/item_details/{id}', 'ReceiptNoteController@item_details');
Route::get('receipt_note/expense_details/{id}', 'ReceiptNoteController@expense_details');
Route::post('receipt_note/last_purchase_rate/', 'ReceiptNoteController@last_purchase_rate');
Route::get('receipt_note/delete/{id}', 'ReceiptNoteController@destroy')->middleware('permission:receipt_note_delete');
Route::post('receipt_note/po_details/', 'ReceiptNoteController@po_details');
Route::post('receipt_note/estimation_details/', 'ReceiptNoteController@estimation_details');
Route::post('receipt_note/r_out_details/', 'ReceiptNoteController@r_out_details');

Route::get('receipt_note/cancel/{id}', 'ReceiptNoteController@cancel');
Route::get('receipt_note/retrieve/{id}', 'ReceiptNoteController@retrieve');

Route::post('receipt_note/po_alpha_beta/', 'ReceiptNoteController@po_alpha_beta');

Route::get('receipt_note/show_beta/{id}', 'ReceiptNoteController@show_beta');
Route::get('receipt_note/edit_beta/{id}', 'ReceiptNoteController@edit_beta');
Route::get('receipt_note/delete_beta/{id}', 'ReceiptNoteController@delete_beta');
Route::get('receipt_note/cancel_beta/{id}', 'ReceiptNoteController@cancel_beta');
Route::get('receipt_note/retrieve_beta/{id}', 'ReceiptNoteController@retrieve_beta');
Route::get('receipt_note/item_beta_details/{id}', 'ReceiptNoteController@item_beta_details');
Route::get('receipt_note/expense_beta_details/{id}', 'ReceiptNoteController@expense_beta_details');
Route::post('receipt_note/voucher_type/', 'ReceiptNoteController@voucher_type');

/* Receipt Note End Here  */

/* Debit Note Start Here  */

Route::resource('debit_note', 'DebitNoteController',['middleware' => ['auth']]);
Route::group(['middleware' => 'auth'], function () {
     Route::get('debit_note/index/{id}', 'DebitNoteController@index')->middleware('permission:debit_note_edit|debit_note_create');
});
Route::post('debit_note/address_details/', 'DebitNoteController@address_details')->middleware('permission:debit_note_list');
Route::get('debit_note/getdata/{id}', 'DebitNoteController@getdata');
Route::get('debit_note/change_items/{id}', 'DebitNoteController@change_items');
Route::post('debit_note/brand_filter/', 'DebitNoteController@brand_filter');
Route::get('debit_note/browse_item/{id}', 'DebitNoteController@browse_item');
Route::get('debit_note/getdata_item/{id}', 'DebitNoteController@getdata_item');
Route::get('debit_note/same_items/{id}', 'DebitNoteController@same_items');
Route::get('debit_note/item_details/{id}', 'DebitNoteController@item_details');
Route::get('debit_note/expense_details/{id}', 'DebitNoteController@expense_details');
Route::post('debit_note/last_purchase_rate/', 'DebitNoteController@last_purchase_rate');
Route::get('debit_note/delete/{id}', 'DebitNoteController@destroy')->middleware('permission:debit_note_delete');
Route::post('debit_note/p_details/', 'DebitNoteController@p_details');
Route::post('debit_note/r_out_details/', 'DebitNoteController@r_out_details');

Route::get('debit_note/cancel/{id}', 'DebitNoteController@cancel');
Route::get('debit_note/retrieve/{id}', 'DebitNoteController@retrieve');

Route::post('debit_note/po_alpha_beta/', 'DebitNoteController@po_alpha_beta');
Route::get('debit_note/delete_beta/{id}', 'DebitNoteController@delete_beta');
Route::get('debit_note/cancel_beta/{id}', 'DebitNoteController@cancel_beta');
Route::get('debit_note/retrieve_beta/{id}', 'DebitNoteController@retrieve_beta');
Route::get('debit_note/item_beta_details/{id}', 'DebitNoteController@item_beta_details');
Route::get('debit_note/expense_beta_details/{id}', 'DebitNoteController@expense_beta_details');

Route::post('debit_note/voucher_type/', 'DebitNoteController@voucher_type');


/* Debit Note End Here  */

/* Delivery Note Start Here  */

Route::resource('delivery_note', 'DeliveryNoteController',['middleware' => ['auth']])->middleware('permission:delivery_note_create|delivery_note_edit');
Route::group(['middleware' => 'auth'], function () {
     Route::get('delivery_note/index/{id}', 'DeliveryNoteController@index')->middleware('permission:delivery_note_list');
});
Route::post('delivery_note/address_details/', 'DeliveryNoteController@address_details');
Route::get('delivery_note/getdata/{id}', 'DeliveryNoteController@getdata');
Route::get('delivery_note/remove_data/{id}', 'DeliveryNoteController@remove_data');
Route::get('delivery_note/change_items/{id}', 'DeliveryNoteController@change_items');
Route::post('delivery_note/brand_filter/', 'DeliveryNoteController@brand_filter');
Route::get('delivery_note/browse_item/{id}', 'DeliveryNoteController@browse_item');
Route::get('delivery_note/getdata_item/{id}', 'DeliveryNoteController@getdata_item');
Route::get('delivery_note/same_items/{id}', 'DeliveryNoteController@same_items');
Route::get('delivery_note/item_details/{id}', 'DeliveryNoteController@item_details');
Route::get('delivery_note/expense_details/{id}', 'DeliveryNoteController@expense_details');
Route::post('delivery_note/last_purchase_rate/', 'DeliveryNoteController@last_purchase_rate');
Route::get('delivery_note/delete/{id}', 'DeliveryNoteController@destroy')->middleware('permission:delivery_note_delete');
Route::post('delivery_note/se_details/', 'DeliveryNoteController@se_details');
Route::post('delivery_note/so_details/', 'DeliveryNoteController@so_details');
Route::post('delivery_note/rejection_in_details/', 'DeliveryNoteController@rejection_in_details');

Route::get('delivery_note/cancel/{id}', 'DeliveryNoteController@cancel');
Route::get('delivery_note/retrieve/{id}', 'DeliveryNoteController@retrieve');

Route::post('delivery_note/po_alpha_beta/', 'DeliveryNoteController@po_alpha_beta');

Route::get('delivery_note/show_beta/{id}', 'DeliveryNoteController@show_beta');
Route::get('delivery_note/edit_beta/{id}', 'DeliveryNoteController@edit_beta');
Route::get('delivery_note/delete_beta/{id}', 'DeliveryNoteController@delete_beta');
Route::get('delivery_note/cancel_beta/{id}', 'DeliveryNoteController@cancel_beta');
Route::get('delivery_note/retrieve_beta/{id}', 'DeliveryNoteController@retrieve_beta');
Route::get('delivery_note/item_beta_details/{id}', 'DeliveryNoteController@item_beta_details');
Route::get('delivery_note/expense_beta_details/{id}', 'DeliveryNoteController@expense_beta_details');

Route::post('delivery_note/voucher_type/', 'DeliveryNoteController@voucher_type');

/* Delivery Note End Here  */

/* Credit Note Start Here  */

Route::resource('credit_note', 'CreditNoteController',['middleware' => ['auth']])->middleware('permission:credit_note_create|credit_note_edit');
Route::group(['middleware' => 'auth'], function () {
     Route::get('credit_note/index/{id}', 'CreditNoteController@index')->middleware('permission:credit_note_list');
});
Route::post('credit_note/address_details/', 'CreditNoteController@address_details');
Route::get('credit_note/getdata/{id}', 'CreditNoteController@getdata');
Route::get('credit_note/change_items/{id}', 'CreditNoteController@change_items');
Route::post('credit_note/brand_filter/', 'CreditNoteController@brand_filter');
Route::get('credit_note/browse_item/{id}', 'CreditNoteController@browse_item');
Route::get('credit_note/getdata_item/{id}', 'CreditNoteController@getdata_item');
Route::get('credit_note/same_items/{id}', 'CreditNoteController@same_items');
Route::get('credit_note/item_details/{id}', 'CreditNoteController@item_details');
Route::get('credit_note/expense_details/{id}', 'CreditNoteController@expense_details');
Route::post('credit_note/last_purchase_rate/', 'CreditNoteController@last_purchase_rate');
Route::get('credit_note/delete/{id}', 'CreditNoteController@destroy')->middleware('permission:credit_note_delete');
Route::post('credit_note/s_details/', 'CreditNoteController@s_details');
Route::post('credit_note/rejection_in_details/', 'CreditNoteController@rejection_in_details');

Route::get('credit_note/cancel/{id}', 'CreditNoteController@cancel');
Route::get('credit_note/retrieve/{id}', 'CreditNoteController@retrieve');

Route::get('credit_note/item_beta_details/{id}', 'CreditNoteController@item_beta_details');
Route::get('credit_note/expense_beta_details/{id}', 'CreditNoteController@expense_beta_details');
Route::post('credit_note/po_alpha_beta/', 'CreditNoteController@po_alpha_beta');
Route::get('credit_note/delete_beta/{id}', 'CreditNoteController@delete_beta');
Route::get('credit_note/cancel_beta/{id}', 'CreditNoteController@cancel_beta');
Route::get('credit_note/retrieve_beta/{id}', 'CreditNoteController@retrieve_beta');

Route::post('credit_note/voucher_type/', 'CreditNoteController@voucher_type');

/* Credit Note End Here  */


/* Rejection In Start Here  */

Route::resource('rejection_in', 'RejectionInController',['middleware' => ['auth']])->middleware('permission:rejection_in_create|rejection_in_edit');
Route::group(['middleware' => 'auth'], function () {
     Route::get('rejection_in/index/{id}', 'RejectionInController@index')->middleware('permission:rejection_in_list');
});
Route::post('rejection_in/address_details/', 'RejectionInController@address_details');
Route::get('rejection_in/getdata/{id}', 'RejectionInController@getdata');
Route::get('rejection_in/remove_data/{id}', 'RejectionInController@remove_data');
Route::get('rejection_in/change_items/{id}', 'RejectionInController@change_items');
Route::post('rejection_in/brand_filter/', 'RejectionInController@brand_filter');
Route::get('rejection_in/browse_item/{id}', 'RejectionInController@browse_item');
Route::get('rejection_in/getdata_item/{id}', 'RejectionInController@getdata_item');
Route::get('rejection_in/same_items/{id}', 'RejectionInController@same_items');
Route::get('rejection_in/item_details/{id}', 'RejectionInController@item_details');
Route::get('rejection_in/expense_details/{id}', 'RejectionInController@expense_details');
Route::post('rejection_in/last_purchase_rate/', 'RejectionInController@last_purchase_rate');
Route::get('rejection_in/delete/{id}', 'RejectionInController@destroy')->middleware('permission:rejection_in_delete');
Route::post('rejection_in/s_details/', 'RejectionInController@s_details');
Route::post('rejection_in/delivery_details/', 'RejectionInController@delivery_details');
Route::post('rejection_in/check_qty/', 'RejectionInController@check_qty');

Route::get('rejection_in/cancel/{id}', 'RejectionInController@cancel');
Route::get('rejection_in/retrieve/{id}', 'RejectionInController@retrieve');

Route::post('rejection_in/po_alpha_beta/', 'RejectionInController@po_alpha_beta');
Route::get('rejection_in/delete_beta/{id}', 'RejectionInController@delete_beta');
Route::get('rejection_in/cancel_beta/{id}', 'RejectionInController@cancel_beta');
Route::get('rejection_in/retrieve_beta/{id}', 'RejectionInController@retrieve_beta');
Route::get('rejection_in/item_beta_details/{id}', 'RejectionInController@item_beta_details');
Route::get('rejection_in/expense_beta_details/{id}', 'RejectionInController@expense_beta_details');

Route::post('rejection_in/voucher_type/', 'RejectionInController@voucher_type');
/* Rejection In End Here  */


/* Rejection Out Start Here  */

Route::resource('rejection_out', 'RejectionOutController',['middleware' => ['auth']])->middleware('permission:rejection_out_edit|rejection_out_create');
Route::group(['middleware' => 'auth'], function () {
     Route::get('rejection_out/index/{id}', 'RejectionOutController@index')->middleware('permission:rejection_out_list');
});
Route::post('rejection_out/address_details/', 'RejectionOutController@address_details');
Route::get('rejection_out/getdata/{id}', 'RejectionOutController@getdata');
Route::get('rejection_out/remove_data/{id}', 'RejectionOutController@remove_data');
Route::get('rejection_out/change_items/{id}', 'RejectionOutController@change_items');
Route::post('rejection_out/brand_filter/', 'RejectionOutController@brand_filter');
Route::get('rejection_out/browse_item/{id}', 'RejectionOutController@browse_item');
Route::get('rejection_out/getdata_item/{id}', 'RejectionOutController@getdata_item');
Route::get('rejection_out/same_items/{id}', 'RejectionOutController@same_items');
Route::get('rejection_out/item_details/{id}', 'RejectionOutController@item_details');
Route::get('rejection_out/expense_details/{id}', 'RejectionOutController@expense_details');
Route::post('rejection_out/last_purchase_rate/', 'RejectionOutController@last_purchase_rate');
Route::post('rejection_out/check_qty/', 'RejectionOutController@check_qty');
Route::post('rejection_out/change_qty/', 'RejectionOutController@change_qty');
Route::get('rejection_out/delete/{id}/{r_out}', 'RejectionOutController@destroy')->middleware('permission:rejection_out_delete');
Route::post('rejection_out/p_details/', 'RejectionOutController@p_details');
Route::post('rejection_out/Get_Location_Details/', 'RejectionOutController@Get_Location_Details');
Route::post('rejection_out/receipt_details/', 'RejectionOutController@receipt_details');

Route::get('rejection_out/cancel/{id}', 'RejectionOutController@cancel');
Route::get('rejection_out/retrieve/{id}', 'RejectionOutController@retrieve');

Route::post('rejection_out/po_alpha_beta/', 'RejectionOutController@po_alpha_beta');

Route::get('rejection_out/delete_beta/{id}/{r_out}', 'RejectionOutController@delete_beta');
Route::get('rejection_out/cancel_beta/{id}', 'RejectionOutController@cancel_beta');
Route::get('rejection_out/retrieve_beta/{id}', 'RejectionOutController@retrieve_beta');
Route::get('rejection_out/item_beta_details/{id}', 'RejectionOutController@item_beta_details');
Route::get('rejection_out/expense_beta_details/{id}', 'RejectionOutController@expense_beta_details');

Route::post('rejection_out/voucher_type/', 'RejectionOutController@voucher_type');


/* Rejection Out End Here  */

/*Outstanding Report Start Here*/

Route::resource('receivable_billwise','ReceivableBillwiseController',['middleware' => ['auth']])->middleware('permission:billwise_receivables');
Route::resource('receivable_partywise','ReceivablePartywiseController',['middleware' => ['auth']])->middleware('permission:partywise_receivables');
Route::get('single_ledger/{id}','ReceivablePartywiseController@show');
Route::resource('payable_billwise','PayableBillwiseController',['middleware' => ['auth']])->middleware('permission:payable_billwise');
Route::resource('payable_partywise','PayablePartywiseController',['middleware' => ['auth']])->middleware('permission:payable_partywise');
Route::get('payable_single_ledger/{id}','PayablePartywiseController@show');

/*Outstanding Report End Here*/

/*Day Book Start Here*/

Route::resource('daybook','DayBookController',['middleware' => ['auth']])->middleware('permission:daybook');

/*Day Book End Here*/

Route::resource('selling-price-setup','SellingPriceSetupController',['middleware' => ['auth']])->middleware('permission:selling_price_setup');

/*Individual Ledger Start Here*/

Route::resource('individual_ledger','IndividualLedgerController',['middleware' => ['auth']])->middleware('permission:individual_ledger');

/*Individual Ledger End Here*/

/*Last Purchase Cost Report Ledger Start Here*/

Route::resource('purchase_cost','LastPurchaseCostReportController',['middleware' => ['auth']])->middleware('permission:individual_ledger');

/*Last Purchase Cost Report End Here*/

/*GST Report Start Here*/

Route::resource('gst_report','GstReportController',['middleware' => ['auth']])->middleware('permission:gst_report');
Route::group(['middleware' => 'auth'], function () {
     Route::any('date_wise/gst_report/', 'GstReportController@gst_report');
});

/*GST Report End Here*/

/*Sales Man Start Here*/

Route::resource('sales_man','SalesManController',['middleware' => ['auth']]);
Route::get('sales_man/delete/{id}', 'SalesManController@destroy');
Route::any('master/sales_man/import-data', 'SalesManController@import');
Route::any('master/sales_man/store-import-data', 'SalesManController@importCsv');

/*Day Book End Here*/


/*POS Start Here*/

Route::resource('pos','PosController',['middleware' => ['auth']]);
Route::post('pos/get_pos_hold_data/', 'PosController@get_pos_hold_data');
Route::post('pos/get_pos_load_data/', 'PosController@get_pos_load_data');
Route::post('pos/check_voucher_code/', 'PosController@check_voucher_code');

Route::get('pos/change_items/{id}', 'PosController@change_items');
Route::post('pos/brand_filter/', 'PosController@brand_filter');
Route::get('pos/browse_item/{id}', 'PosController@browse_item');

Route::get('pos/getdata/{id}', 'PosController@getdata');
Route::post('pos/getdata_offer/', 'PosController@getdata_offer');
Route::get('pos/getdata_item/{id}', 'PosController@getdata_item');
Route::post('pos/cust_datas/', 'PosController@cust_datas');


/*POS End Here*/

/*Payment Request Start Here*/

Route::resource('payment_request','PaymentRequestController',['middleware' => ['auth']])->middleware('permission:payment_request_list|payment_request_create|payment_request_edit|payment_request_delete');

Route::post('payment_request/voucher_type/', 'PaymentRequestController@voucher_type');

//Route::resource('store', 'PaymentRequestController@store')->middleware('permission:payment_request');

/*Payment Request End Here*/

/*Payment Process Start Here*/

Route::resource('payment_process','PaymentProcessController',['middleware' => ['auth']])->middleware('permission:payment_process_list|payment_process_create|payment_process_edit|payment_process_delete');
Route::post('payment_process/purchase_entry_det/', 'PaymentProcessController@purchase_entry_det');
Route::post('payment_process/advance_entry_det/', 'PaymentProcessController@advance_entry_det');

Route::post('payment_process/voucher_type/', 'PaymentProcessController@voucher_type');

/*Payment Process End Here*/

/*Receipt Request Start Here*/

Route::resource('receipt_request','ReceiptRequestController',['middleware' => ['auth']])->middleware('permission:receipt_request_list|receipt_request_create|receipt_request_edit|receipt_request_delete');

Route::post('receipt_request/voucher_type/', 'ReceiptRequestController@voucher_type');

/*Receipt Request End Here*/

/*Receipt Process Start Here*/

Route::resource('receipt_process','ReceiptProcessController',['middleware' => ['auth']])->middleware('permission:receipt_process_list|receipt_process_create|receipt_process_edit|receipt_process_delete');
Route::post('receipt_process/sale_entry_det/', 'ReceiptProcessController@sale_entry_det');
Route::post('receipt_process/advance_entry_det/', 'ReceiptProcessController@advance_entry_det');

Route::post('receipt_process/voucher_type/', 'ReceiptProcessController@voucher_type');


/*Receipt Process End Here*/

/*Advance Settlement For Supplier Start Here*/

Route::resource('advance_settlement_supplier','AdvanceSettlementSupplierController',['middleware' => ['auth']])->middleware('permission:advance_to_suppliers_list|advance_to_suppliers_create|advance_to_suppliers_edit|advance_to_suppliers_delete');
Route::get('advance_settlement_supplier/delete/{id}', 'AdvanceSettlementSupplierController@destroy')->middleware('permission:advance_to_suppliers_delete');


/*Advance Settlement For Supplier End Here*/

/*Advance Settlement For Supplier Start Here*/

Route::resource('advance_settlement_customer','AdvanceSettlementCustomerController',['middleware' => ['auth']])->middleware('permission:advance_from_customers_list|advance_from_customers_create|advance_from_customers_edit|advance_from_customers_delete');
Route::get('advance_settlement_customer/delete/{id}', 'AdvanceSettlementCustomerController@destroy')->middleware('permission:advance_from_customers_delete');


/*Advance Settlement For Supplier End Here*/

/*Payment Of Expense Start Here*/

Route::resource('payment_expense','PaymentExpenseController',['middleware' => ['auth']])->middleware('permission:payment_expenses_list|payment_expenses_create|payment_expenses_edit|payment_expenses_delete');

/*Payment Of Expense End Here*/

/*Receipt Of Income Start Here*/

Route::resource('receipt_income','ReceiptIncomeController',['middleware' => ['auth']])->middleware('permission:receipt_income_list|receipt_income_create|receipt_income_edit|receipt_income_delete');

/*Receipt Of Income End Here*/

/*Account Group Start Here*/

Route::resource('account_group','AccountGroupController',['middleware' => ['auth']])->middleware('permission:account_group_list|account_group_create|account_group_edit|account_group_delete');
Route::get('account_group/delete/{id}', 'AccountGroupController@destroy')->middleware('permission:account_group_delete');

Route::any('master/account_group/import-data', 'AccountGroupController@import')->middleware('permission:account_group_list');
    Route::any('master/account_group/store-import-data', 'AccountGroupController@importCsv')->middleware('permission:account_group_create');

/*Account Group End Here*/

/*BOM Start Here*/

Route::resource('bom','BomController',['middleware' => ['auth']]);

Route::get('bom/getdata/{id}', 'BomController@getdata');
Route::get('bom/change_items/{id}', 'BomController@change_items');
Route::post('bom/brand_filter/', 'BomController@brand_filter');
Route::get('bom/browse_item/{id}', 'BomController@browse_item');
Route::get('bom/getdata_item/{id}', 'BomController@getdata_item');
Route::get('bom/same_items/{id}', 'BomController@same_items');
Route::get('bom/delete/{id}', 'BomController@destroy');

/*BOM End Here*/

/*Terms And Conditions Start Here*/

Route::resource('terms-and-condition','TermsAndConditionController',['middleware' => ['auth']]);
Route::get('terms-and-condition/delete/{id}', 'TermsAndConditionController@destroy');

/*Terms And Conditions End Here*/

/*Tax Account Group Start Here*/

Route::resource('account_group_tax','AccountGroupTaxController',['middleware' => ['auth']])->middleware('permission:account_group_tax_list|account_group_tax_edit|account_group_tax_create');
Route::get('account_group_tax/delete/{id}', 'AccountGroupTaxController@destroy')->middleware('permission:account_group_tax_delete');

Route::any('master/account_group_tax/import-data', 'AccountGroupTaxController@import')->middleware('permission:account_group_tax_list');
    Route::any('master/account_group_tax/store-import-data', 'AccountGroupTaxController@importCsv')->middleware('permission:account_group_tax_create');

/*Tax Account Group End Here*/

/*Account Head Start Here*/

Route::resource('account_head','AccountHeadController',['middleware' => ['auth']])->middleware('permission:account_head_list|account_head_create|account_head_list_edit');
Route::get('account_head/delete/{id}', 'AccountHeadController@destroy')->middleware('permission:account_head_delete');

Route::any('master/account_head/import-data', 'AccountHeadController@import')->middleware('permission:account_head_list');
    Route::any('master/account_head/store-import-data', 'AccountHeadController@importCsv')->middleware('permission:account_head_create');

/*Account Head End Here*/

/*Stock Report strat*/

Route::resource('stock-report','StockReportController',['middleware' => ['auth']])->middleware('permission:stock_report');
Route::resource('stock_summary','StockSummaryController',['middleware' => ['auth']])->middleware('permission:stock_summary');
Route::get('stock-summary/change_items/{id}', 'StockSummaryController@change_items');
Route::resource('stock_ageing','StockAgeingController',['middleware' => ['auth']])->middleware('permission:stock_ageing');

/*Stock Report end*/


// /* Head Office Details Master Group Start Here  */
// Route::group(['prefix' => 'master/ho_details', 'middleware' => ['auth']], function () {
//     Route::any('/', 'Ho_detailsController@index');
//     Route::any('create', 'Ho_detailsController@create');
//     Route::any('store', 'Ho_detailsController@store');
//     Route::any('show/{id}', 'Ho_detailsController@show');
//     Route::any('edit/{id}', 'Ho_detailsController@edit');
//     Route::any('update/{id}', 'Ho_detailsController@update');
//     Route::any('delete/{id}', 'Ho_detailsController@destroy');
//     Route::any('import-data', 'Ho_detailsController@import');
//     Route::any('store-import-data', 'Ho_detailsController@importCsv');
// });
// /* Head Office Details Master  End Here  */

/* Head Office Details Master Group Start Here  */
Route::group(['prefix' => 'master/ho_details', 'middleware' => ['auth']], function () {
    Route::any('/', 'Ho_detailsController@index')->middleware('permission:head_office_detail_list');
    Route::any('create', 'Ho_detailsController@create')->middleware('permission:head_office_detail_list_create');
    Route::any('store', 'Ho_detailsController@store')->middleware('permission:head_office_detail_list_create');
    Route::any('show/{id}', 'Ho_detailsController@show')->middleware('permission:head_office_detail_list_list');
    Route::any('edit/{id}', 'Ho_detailsController@edit')->middleware('permission:head_office_detail_list_edit');
    Route::any('update/{id}', 'Ho_detailsController@update')->middleware('permission:head_office_detail_list_edit');
    Route::any('delete/{id}', 'Ho_detailsController@destroy')->middleware('permission:head_office_detail_list_delete');

    Route::any('import-data', 'Ho_detailsController@import')->middleware('permission:head_office_detail_list');
    Route::any('store-import-data', 'Ho_detailsController@importCsv')->middleware('permission:head_office_detail_list_create');
});
/* Head Office Details Master  End Here  */


//Route::any('master/address_type/store', 'AddressTypeController@store');



/*tax dummy strat*/

Route::resource('taxdummy','Taxdummy',['middleware' => ['auth']]);

/*tax dummy end*/



Route::resource('expense','ExpenseController',['middleware' => ['auth']])->middleware('permission:account_expense_list|account_expense_create|account_expense_edit|account_expense_delete');

/* Received starts here  */

Route::resource('received','ReceivedController',['middleware' => ['auth']]);
Route::post('received/branch_details/', 'ReceivedController@branch_details');
Route::post('received/act_type_details/', 'ReceivedController@act_type_details');


/*  Received end here */

/* Paid starts here  */

Route::resource('paid','PaidController',['middleware' => ['auth']]);

/*  Paid end here */

/* Itemwise offers  */
Route::group(['prefix' => 'master/itemwiseoffer', 'middleware' => ['auth']], function () {
    Route::any('/', 'ItemwiseOfferController@index');
    Route::any('create', 'ItemwiseOfferController@create');
    Route::any('store', 'ItemwiseOfferController@store');
    Route::any('show/{id}', 'ItemwiseOfferController@show');
    Route::any('edit/{id}', 'ItemwiseOfferController@edit');
    Route::any('update/{id}', 'ItemwiseOfferController@update');
    Route::any('delete/{id}', 'ItemwiseOfferController@destroy');

    Route::any('import-data', 'ItemwiseOfferController@import');
    Route::any('store-import-data', 'ItemwiseOfferController@importCsv');
});


/* Item wastages  */
Route::group(['prefix' => 'master/item_wastage', 'middleware' => ['auth']], function () {
    Route::any('/', 'ItemWastageController@index');
    Route::any('create', 'ItemWastageController@create');
    Route::any('store', 'ItemWastageController@store');
    Route::any('show/{id}', 'ItemWastageController@show');
    Route::any('edit/{id}', 'ItemWastageController@edit');
    Route::any('update/{id}', 'ItemWastageController@update');
    Route::any('delete/{id}', 'ItemWastageController@destroy');

    Route::any('import-data', 'ItemWastageController@import');
    Route::any('store-import-data', 'ItemWastageController@importCsv');
});


/* Production Module  */
Route::group(['prefix' => 'production', 'middleware' => ['auth']], function () {
    Route::any('/', 'ProductionController@index');
    Route::any('create', 'ProductionController@create');
    Route::any('store', 'ProductionController@store');
    Route::any('show/{id}', 'ProductionController@show');
    Route::any('edit/{id}', 'ProductionController@edit');
    Route::any('update/{id}', 'ProductionController@update');
    Route::any('delete/{id}', 'ProductionController@destroy');
});

/*Individual Ledger Start Here*/

Route::resource('individual_ledger','IndividualLedgerController',['middleware' => ['auth']])->middleware('permission:individual_ledger');

Route::post('ledger_report', 'IndividualLedgerController@report');

Route::post('daybook_report', 'DaybookController@index');

Route::post('payable_billwise_report','PayableBillwiseController@report');

Route::post('payable_partywise_report','PayablePartywiseController@report');

Route::post('receivable_billwise_report','ReceivableeBillwiseController@report');

Route::post('receivable_partywise_report','ReceivablePartywiseController@report');
/*Register Report ->Purchase Start Here*/
Route::post('estimation-report','EstimationController@report');
Route::post('purchase-order-report','PurchaseOrderController@report');
Route::post('receipt-note-report','ReceiptNoteController@report');
Route::post('purchase-entry-report','PurchaseEntryController@report');
Route::post('rejection-out-report','RejectionOutController@report');
Route::post('debit-note-report','DebitNoteController@report');
/*Register Report ->Sales Start Here*/
Route::post('sales-estimation-report','SalesEstimationController@report');
Route::post('sales-order-report','SalesOrderController@report');
Route::post('delivery-note-report','DeliveryNoteController@report');
Route::post('sales-entry-report','SalesEntryController@report');
Route::post('rejection-in-report','RejectionInController@report');
Route::post('salesgatepass-entry-report','SalesGatepassEntryController@report');
Route::post('credit-note-report','CreditNoteController@report');
Route::post('stock-report','StockReportController@report');
Route::post('stock-summary-report','StockSummaryController@report');

Route::resource('mailsetting-setup','MailSettingController',['middleware' => ['auth']]);
Route::any('mailsetting-setup/show/{id}', 'MailSettingController@show');
Route::any('mailsetting-setup/edit/{id}', 'MailSettingController@edit');
Route::any('mailsetting-setup/send_email/{id}', 'MailSettingController@send_email');

/*Voucher Numbering Start Here*/

Route::resource('voucher-numbering','VoucherNumberingController',['middleware' => ['auth']]);

/*Voucher Numbering End Here*/

// Route::group(['prefix' => 'mailsetting-setup', 'middleware' => ['auth']], function () {
//     Route::any('/mailsetting-setup', 'MailSettingController@index')->middleware('permission:bank_branch_list');
//     Route::any('create', 'MailSettingController@create')->middleware('permission:bank_branch_create');
//     Route::any('store', 'MailSettingController@store')->middleware('permission:bank_branch_create');
//     Route::any('show/{id}', 'MailSettingController@show')->middleware('permission:bank_branch_list');
//     Route::any('edit/{id}', 'MailSettingController@edit')->middleware('permission:bank_branch_edit');
//     Route::any('update/{id}', 'MailSettingController@update')->middleware('permission:bank_branch_edit');
//     Route::any('delete/{id}', 'MailSettingController@destroy')->middleware('permission:bank_branch_delete');
// });
Route::get('generate-pdf', 'PdfGenerateController@pdfview')->name('generate-pdf');



/* Received starts here  */

Route::resource('received','ReceivedController',['middleware' => ['auth']]);
Route::post('received/branch_details/', 'ReceivedController@branch_details');
Route::post('received/act_type_details/', 'ReceivedController@act_type_details');
Route::post('received/store_pos/', 'ReceivedController@store_pos');

    
/*  Received end here */

/* Purchase Voucher Types Starts here  */

Route::resource('purchase-voucher-type','PurchaseVoucherTypeController',['middleware' => ['auth']]);
Route::get('purchase-voucher-type/delete/{id}', 'PurchaseVoucherTypeController@destroy');

Route::any('master/purchase-voucher-type/import-data', 'PurchaseVoucherTypeController@import');
    Route::any('master/purchase-voucher-type/store-import-data', 'PurchaseVoucherTypeController@importCsv');

/*  Purchase Voucher Types end here */

/* Sales Voucher Types Starts here  */

Route::resource('sales-voucher-type','SalesVoucherTypeController',['middleware' => ['auth']]);
Route::get('sales-voucher-type/delete/{id}', 'SalesVoucherTypeController@destroy');

Route::any('master/sales-voucher-type/import-data', 'SalesVoucherTypeController@import');
    Route::any('master/sales-voucher-type/store-import-data', 'SalesVoucherTypeController@importCsv');

/*  Sales Voucher Types end here */

/* Payment Voucher Types Starts here  */

Route::resource('payment-voucher-type','PaymentVoucherTypeController',['middleware' => ['auth']]);
Route::get('payment-voucher-type/delete/{id}', 'PaymentVoucherTypeController@destroy');

Route::any('master/payment-voucher-type/import-data', 'PaymentVoucherTypeController@import');
    Route::any('master/payment-voucher-type/store-import-data', 'PaymentVoucherTypeController@importCsv');

/*  Payment Voucher Types end here */

/* Receipt Voucher Types Starts here  */

Route::resource('receipt-voucher-type','ReceiptVoucherTypeController',['middleware' => ['auth']]);
Route::get('receipt-voucher-type/delete/{id}', 'ReceiptVoucherTypeController@destroy');

Route::any('master/receipt-voucher-type/import-data', 'ReceiptVoucherTypeController@import');
    Route::any('master/receipt-voucher-type/store-import-data', 'ReceiptVoucherTypeController@importCsv');

/*  Receipt Voucher Types end here */

/* Paid starts here  */

Route::resource('paid','PaidController',['middleware' => ['auth']]);

/*  Paid end here */

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/validation', function () {
    return view('uservalidation');
});
Route::post('mandatoryfields/store','MandatoryFieldsController@store');

/* Barcode Generator starts here  */

Route::resource('barcode','BarcodeController',['middleware' => ['auth']]);

/* Barcode Generator End here  */

/* upload logo starts here */

Route::resource('upload-logo', 'UploadLogoController',['middleware' => ['auth']]);

/* upload logo end Here */

