<?php

use App\Http\Controllers\PoliciesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\CustomerPolicyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/policies/create', function () {
    return view('policies.create');
});

Route::get('/policies/index', function () {
    return view('policies.index');
});
Route::get('/customers/index', function () {
    return view('customers.index');
});

Route::resource('customers', CustomersController::class);


Route::resource('policies', PoliciesController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/reports/customers', [CustomersController::class, 'generatePDF'])->name('customers.pdf');

Route::get('/customers/assign-policy/{customer_id}', [CustomerPolicyController::class, 'assignPolicy'])->name('customers.assign-policy');
Route::post('/customer-policies', [CustomerPolicyController::class, 'store']);

Route::get('/customers/{customer_id}/policies', [CustomerPolicyController::class, 'showCustomerPolicies'])->name('customers.policies_info');
