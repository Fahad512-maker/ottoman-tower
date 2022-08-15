<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ChartAccountController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContractorController;
use App\Http\Controllers\ContractorPayController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeSalaryController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MaterialOrderController;
use App\Http\Controllers\OwnersEquityController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SupplierPayController;
use App\Http\Controllers\TrashController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Employee
Route::get('/manage/employee',[EmployeeController::class,'index']);
Route::get('/employee/create',[EmployeeController::class,'create']);
Route::post('/employee/store',[EmployeeController::class,'store']);
Route::get('/employee/{id}/view',[EmployeeController::class,'view']);
Route::get('/employee/{id}/edit',[EmployeeController::class,'edit']);
Route::put('/employee/{id}/update',[EmployeeController::class,'update']);
Route::get('/employee/{id}/delete',[EmployeeController::class,'destroy']);

//Employee Salary
Route::get('/manage/employee_salary',[EmployeeSalaryController::class,'index']);
Route::get('/employee_salary/create',[EmployeeSalaryController::class,'create']);
Route::post('/manage/empsalaryget',[EmployeeSalaryController::class,'getsalary']);
Route::post('/update_paid',[EmployeeSalaryController::class,'update_paid_status']);
Route::put('/employee/{id}/advancesalary',[EmployeeSalaryController::class,'store_advance']);
Route::get('/manage/salary_record',[EmployeeSalaryController::class,'salary_record']);




//Employee Attendance
Route::get('/manage/employee_attendance',[EmployeeController::class,'attendance']);
Route::post('/manage/pushemployee_attendance',[EmployeeController::class,'push']);
Route::post('/manage/storeemployee_attendance',[EmployeeController::class,'storeattendance']);
Route::get('/manage/employee_attendancereport',[EmployeeController::class,'attendance_report']);
Route::get('/attendancebydate',[EmployeeController::class,'attendancebydate']);


//accounts-onwer
Route::get('/manage/equity',[OwnersEquityController::class,'index']);
Route::get('/equity/create',[OwnersEquityController::class,'create']);
Route::post('/equity/store',[OwnersEquityController::class,'store']);
Route::get('/equity/{id}/edit',[OwnersEquityController::class,'edit']);
Route::put('/equity/{id}/update',[OwnersEquityController::class,'update']);
Route::get('/equity/{id}/delete',[OwnersEquityController::class,'destroy']);


//partner's
Route::get('/manage/partners',[PartnerController::class,'index']);
Route::get('/partner/create',[PartnerController::class,'create']);
Route::post('/partner/store',[PartnerController::class,'store']);
Route::get('/partner/{id}/edit',[PartnerController::class,'edit']);
Route::put('/partner/{id}/update',[PartnerController::class,'update']);
Route::get('/partner/{id}/delete',[PartnerController::class,'destroy']);



// Project 
Route::get('/manage/project',[ProjectController::class,'index']);
Route::get('/project/create',[ProjectController::class,'create']);
Route::post('/project/store',[ProjectController::class,'store']);
Route::put('/project/{id}/store_fund',[ProjectController::class,'storefund']);
Route::get('/project/{id}/edit',[ProjectController::class,'edit']);
Route::put('/project/{id}/update',[ProjectController::class,'update']);
Route::get('/project/{id}/delete',[ProjectController::class,'destroy']);
Route::get('/project/{id}/view',[ProjectController::class,'view']);


//supplier
Route::get('/manage/supplier',[SupplierController::class,'index']);
Route::get('/supplier/create',[SupplierController::class,'create']);
Route::post('/supplier/store',[SupplierController::class,'store']);
Route::get('/supplier/{id}/edit',[SupplierController::class,'edit']);
Route::put('/supplier/{id}/update',[SupplierController::class,'update']);
Route::get('/supplier/{id}/delete',[SupplierController::class,'destroy']);

//material
Route::get('/manage/material',[MaterialController::class,'index']);
Route::get('/material/create',[MaterialController::class,'create']);
Route::post('/material/store',[MaterialController::class,'store']);
Route::get('/material/{id}/edit',[MaterialController::class,'edit']);
Route::put('/material/{id}/update',[MaterialController::class,'update']);
Route::get('/material/{id}/delete',[MaterialController::class,'destroy']);

//material_order
Route::get('/manage/materialorder',[MaterialOrderController::class,'index']);
Route::get('/materialorder/create',[MaterialOrderController::class,'create']);
Route::post('/materialorder/store',[MaterialOrderController::class,'store']);
Route::get('/materialorder/{id}/edit',[MaterialOrderController::class,'edit']);
Route::put('/materialorder/{id}/update',[MaterialOrderController::class,'update']);
Route::get('/materialorder/{id}/delete',[MaterialOrderController::class,'destroy']);


//contrator
Route::get('/manage/contractor',[ContractorController::class,'index']);
Route::get('/contractor/create',[ContractorController::class,'create']);
Route::post('/contractor/store',[ContractorController::class,'store']);
Route::get('/contractor/{id}/edit',[ContractorController::class,'edit']);
Route::put('/contractor/{id}/update',[ContractorController::class,'update']);
Route::get('/contractor/{id}/delete',[ContractorController::class,'destroy']);

//contrator-payment
Route::get('/manage/contractorpay',[ContractorPayController::class,'index']);
Route::get('/contractorpay/create',[ContractorPayController::class,'create']);
Route::post('/contractorpay/store',[ContractorPayController::class,'store']);
Route::get('/contractorpay/{id}/edit',[ContractorPayController::class,'edit']);
Route::put('/contractorpay/{id}/update',[ContractorPayController::class,'update']);
Route::get('/contractorpay/{id}/delete',[ContractorPayController::class,'destroy']);
Route::get('/contractorpay/{id}/print',[ContractorPayController::class,'print']);

// chartaccount
Route::get('/manage/chartaccount',[ChartAccountController::class,'index']);
Route::get('/chartaccount/create',[ChartAccountController::class,'create']);
Route::post('/chartaccount/store',[ChartAccountController::class,'store']);
Route::get('/chartaccount/{id}/edit',[ChartAccountController::class,'edit']);
Route::put('/chartaccount/{id}/update',[ChartAccountController::class,'update']);
Route::get('/chartaccount/{id}/delete',[ChartAccountController::class,'destroy']);
Route::post('/chartaccount/reverse_salary',[ChartAccountController::class,'reverse']);

//supplier-payment
Route::get('/manage/supplierpay',[SupplierPayController::class,'index']);
Route::get('/supplierpay/create',[SupplierPayController::class,'create']);
Route::post('/supplierpay/store',[SupplierPayController::class,'store']);
Route::post('/supplierpay/get_data',[SupplierPayController::class,'getData']);
Route::get('/supplierpay/{id}/edit',[SupplierPayController::class,'edit']);
Route::put('/supplierpay/{id}/update',[SupplierPayController::class,'update']);
Route::get('/supplierpay/{id}/delete',[SupplierPayController::class,'destroy']);
Route::get('/supplierpay/{id}/print',[SupplierPayController::class,'print']);


//other-purchases
Route::get('/manage/purchases',[PurchaseController::class,'index']);
Route::get('/purchases/create',[PurchaseController::class,'create']);
Route::post('/purchases/store',[PurchaseController::class,'store']);
Route::get('/purchases/{id}/edit',[PurchaseController::class,'edit']);
Route::put('/purchases/{id}/update',[PurchaseController::class,'update']);
Route::get('/purchases/{id}/delete',[PurchaseController::class,'destroy']);


// Booking 
Route::get('/manage/booking',[BookingController::class,'index']);
Route::get('/booking/create',[BookingController::class,'create']);
Route::post('/booking/store',[BookingController::class,'store']);
Route::put('/booking/{id}/store_fund',[BookingController::class,'storefund']);
Route::get('/booking/{id}/edit',[BookingController::class,'edit']);
Route::put('/booking/{id}/update',[BookingController::class,'update']);
Route::get('/booking/{id}/delete',[BookingController::class,'destroy']);
Route::get('/booking/{id}/view',[BookingController::class,'view']);
Route::get('/booking/{id}/print',[BookingController::class,'print']);
Route::post('/getclientdata',[BookingController::class,'getdata']);
Route::post('/getprojectdata',[BookingController::class,'getprojectdata']);
Route::post('/getproductdata',[BookingController::class,'getproductdata']);



// Client 
Route::get('/manage/client',[ClientController::class,'index']);
Route::get('/client/create',[ClientController::class,'create']);
Route::post('/client/store',[ClientController::class,'store']);
Route::put('/client/{id}/store_fund',[ClientController::class,' storefund']);
Route::get('/client/{id}/edit',[ClientController::class,'edit']);
Route::put('/client/{id}/update',[ClientController::class,'update']);
Route::get('/client/{id}/delete',[ClientController::class,'destroy']);
Route::get('/client/{id}/view',[ClientController::class,'view']);
Route::get('/client/{id}/print',[ClientController::class,'print']);




//trash
//-supplier
Route::get('/manage/trashsupplier',[TrashController::class,'supplier_index']);
Route::get('trashsupplier/{id}/undo',[TrashController::class,'undosupplier']);
Route::get('trashsupplier/{id}/delete',[TrashController::class,'deletesupplier']);

// -project
Route::get('/manage/trashproject',[TrashController::class,'project_index']);
Route::get('trashproject/{id}/undo',[TrashController::class,'undoproject']);
Route::get('trashproject/{id}/delete',[TrashController::class,'deleteproject']);

// -contractor
Route::get('/manage/trashcontractor',[TrashController::class,'contractor_index']);
Route::get('trashcontractor/{id}/undo',[TrashController::class,'undocontractor']);
Route::get('trashcontractor/{id}/delete',[TrashController::class,'deletecontractor']);

// -employee
Route::get('/manage/trashemployee',[TrashController::class,'employee_index']);
Route::get('trashemployee/{id}/undo',[TrashController::class,'undoemployee']);
Route::get('trashemployee/{id}/delete',[TrashController::class,'deleteemployee']);

