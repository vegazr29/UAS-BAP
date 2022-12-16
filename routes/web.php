<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\payslipController;
use Illuminate\Http\Request;
use App\Http\Controllers\view_gaji;

use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Admin\loginRegistrationController;

use App\Models\User;

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

Route::get('/login', function() {
    if (count(User::all()) == 0){
        return redirect('/register');
    }
    if (session()->has('user')) {
        return redirect('/');
    }
    return view('login');
});

Route::get('/register', function() {
    if (count(User::all()) == 0){
        return view('register')->with('is_admin', true);
    }
    return view('register')->with('is_admin', false);
});

Route::post('/registration', function(Request $request){
    return loginRegistrationController::register($request);
});

Route::post('/process', function(Request $request) {
    return loginRegistrationController::login($request);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/', function () {
    if (session()->has('user')) {
        return view('layouts.main');
    }
    return view('layouts.main');
});

Route::get('/view_gaji', function () {
    return view('view_gaji');

});

Route::get('/print_gaji', function () {
    return view('print_gaji');

});


// Route::get('/view_gaji-pdf', function () {
//     return view('view_gaji-pdf');
//     $pdf = PDF::loadview('view_gaji-pdf');
//     return $pdf->download('view_gaji.pdf');
// });
Route::get('/generate-pdf',[PDFController::class,'generatePDF']);


Route::resource('admin/user', 'App\Http\Controllers\Admin\userController');
Route::resource('admin/employee', 'App\Http\Controllers\Admin\employeeController');
Route::resource('admin/contract', 'App\Http\Controllers\Admin\contractController');
Route::resource('admin/attendance', 'App\Http\Controllers\Admin\attendanceController');
Route::resource('admin/bpjs_data', 'App\Http\Controllers\Admin\bpjs_dataController');
Route::resource('admin/payslip', 'App\Http\Controllers\Admin\payslipController');
Route::resource('admin/employee_status', 'App\Http\Controllers\Admin\employee_statusController');

Route::get('admin/compute_payslip',
function(Request $request){ 
    return payslipController::compute($request);
});


Route::resource('admin/employee_status', 'App\Http\Controllers\Admin\employee_statusController');
Route::get('/view_gaji',[view_gaji::class,'index']);
Route::get('/view_gaji/pdf',[view_gaji::class,'cetak_pdf']);
