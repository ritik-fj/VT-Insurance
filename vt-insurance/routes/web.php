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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');



// Route::resource('customers', CustomersController::class);
// All Customers Routes
Route::get('/customers', [CustomersController::class, 'index'])->name('customers.index')->middleware('auth');
Route::get('/customers/create', [CustomersController::class, 'create'])->name('customers.create')->middleware('auth');
Route::post('/customers', [CustomersController::class, 'store'])->name('customers.store')->middleware('auth');
Route::get('/customers/{id}', [CustomersController::class, 'show'])->name('customers.show')->middleware('auth');
Route::get('/customers/{id}/edit', [CustomersController::class, 'edit'])->name('customers.edit')->middleware('auth');
Route::put('/customers/{id}', [CustomersController::class, 'update'])->name('customers.update')->middleware('auth');
Route::delete('/customers/{id}', [CustomersController::class, 'destroy'])->name('customers.destroy')->middleware('auth');
Route::get('/reports/customers', [CustomersController::class, 'generatePDF'])->name('customers.pdf')->middleware('auth');
Route::post('/customers/search', [CustomersController::class, 'search'])->name('customers.search');

// All Policies Routes
// Route::resource('policies', PoliciesController::class);
Route::get('/policies', [PoliciesController::class, 'index'])->name('policies.index')->middleware('auth');;
Route::get('/policies/create', [PoliciesController::class, 'create'])->name('policies.create')->middleware('auth');
Route::post('/policies', [PoliciesController::class, 'store'])->name('policies.store')->middleware('auth');
Route::get('/policies/{id}', [PoliciesController::class, 'show'])->name('policies.show')->middleware('auth');;
Route::get('/policies/{id}/edit', [PoliciesController::class, 'edit'])->name('policies.edit')->middleware('auth');
Route::put('/policies/{id}', [PoliciesController::class, 'update'])->name('policies.update')->middleware('auth');
Route::delete('/policies/{id}', [PoliciesController::class, 'destroy'])->name('policies.destroy')->middleware('auth');
Route::get('/viewpolicies', [PoliciesController::class, 'viewpolicies'])->name('viewpolicies');
Route::get('/reports/policies', [PoliciesController::class, 'policiesPDF'])->name('policies.pdf')->middleware('auth');
Route::post('/policies/search', [PoliciesController::class, 'search'])->name('policies.search');


Auth::routes();


Route::get('/customers/assign-policy/{customer_id}', [CustomerPolicyController::class, 'assignPolicy'])->name('customers.assign-policy');
Route::post('/customer-policies', [CustomerPolicyController::class, 'store']);

Route::get('/customers/{customer_id}/policies', [CustomerPolicyController::class, 'showCustomerPolicies'])->name('customers.policies_info');
Route::get('/reports/{customer_id}/customerdetails', [CustomerPolicyController::class, 'customerdetailsPDF'])->name('customerdetails.pdf')->middleware('auth');
Route::delete('/customer/{customer_id}/policy/{policy_id}', [CustomerPolicyController::class, 'destroy'])->name('customer_policy.destroy');
