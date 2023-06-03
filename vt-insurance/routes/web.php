<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ClaimsController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\CustomerPoliciesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\PoliciesController;
use App\Http\Controllers\UpgradeRequestsController;

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
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->check() && auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('customer.dashboard');
        }
    })->name('dashboard');


    //this has all the routes that are accessible by the admin
    Route::prefix('admin')->middleware('role:admin')->group(function () {
        Route::get('/policies', [PoliciesController::class, 'index'])->name('managepolicies');
        Route::get('/activepolicies', [CustomerPoliciesController::class, 'index'])->name('activepolicies');
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/registeruser', [AdminDashboardController::class, 'registerview'])->name('admin.registerview');
        Route::post('/register', [AdminDashboardController::class, 'registeruser'])->name('admin.register');
        Route::get('/manage-customer', [AdminDashboardController::class, 'customers'])->name('admin.managecustomers');
        Route::get('/customer/show/{id}', [CustomersController::class, 'customerdetails'])->name('customer.show');
        Route::get('/customer/edit/{id}', [CustomersController::class, 'edit'])->name('customer.edit');
        Route::put('/customer/update/{id}', [CustomersController::class, 'update'])->name('customer.update');
        Route::delete('/customers/{id}', [CustomersController::class, 'destroy'])->name('customer.destroy');
        Route::get('/assignpolicy/{id}', [CustomerPoliciesController::class, 'assignpolicy'])->name('admin.assignpolicy');
        Route::post('/customer-policies', [CustomerPoliciesController::class, 'store'])->name('assignpolicy');
        Route::get('/customer/{id}/policies', [CustomerPoliciesController::class, 'viewpolicies'])->name('customer.viewpolicies');
        Route::get('/customer/policy/edit/{id}', [CustomerPoliciesController::class, 'edit'])->name('customer_policy.edit');
        Route::put('/customer/policy/update/{id}', [CustomerPoliciesController::class, 'update'])->name('customer_policy.update');
        Route::delete('/customer/policy/{id}', [CustomerPoliciesController::class, 'destroy'])->name('customer_policy.destroy');
        Route::get('/manageclaims', [ClaimsController::class, 'manageclaims'])->name('claim.manage');
        Route::get('/approve_claim/{id}', [ClaimsController::class, 'approve_claim'])->name('claim.approve');
        Route::get('/reject_claim/{id}', [ClaimsController::class, 'reject_claim'])->name('claim.reject');
        Route::delete('/claim_delete/{id}', [ClaimsController::class, 'destroy'])->name('claim.destroy')->middleware('auth');
        Route::get('/managerequests', [UpgradeRequestsController::class, 'managerequests'])->name('request.manage');
        Route::get('/approve_request/{id}', [UpgradeRequestsController::class, 'approve_request'])->name('request.approve');
        Route::get('/reject_request/{id}', [UpgradeRequestsController::class, 'reject_request'])->name('request.reject');
        Route::get('/reports/{customer_id}/customerdetails', [CustomerPoliciesController::class, 'customerdetailsPDF'])->name('customerdetails.pdf');
        Route::get('/allpayments', [PaymentsController::class, 'index'])->name('admin.viewpayments');
    });


    //this has all the routes that are accessible by the customer
    Route::prefix('customer')->middleware('role:customer')->group(function () {
        Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('customer.dashboard');
        Route::get('/myclaims', [ClaimsController::class, 'myclaims'])->name('myclaims');
        Route::get('/claims/create', [ClaimsController::class, 'create'])->name('claims.create');
        Route::post('/claims', [ClaimsController::class, 'store'])->name('claims.store');
        Route::get('/viewclaims', [ClaimsController::class, 'index'])->name('claims.index');
        Route::get('/allclaims', [ClaimsController::class, 'allclaims'])->name('claims.all');
        Route::get('/claim-pdf', [ClaimsController::class, 'claimPDF'])->name('claims.pdf');
        Route::get('/mypolicies', [CustomersController::class, 'mypolicies'])->name('mypolicies');
        Route::get('/upgrade-request/{id}', [UpgradeRequestsController::class, 'create'])->name('request.create');
        Route::post('/upgrade-request', [UpgradeRequestsController::class, 'store'])->name('request.store');
        Route::get('/viewrequests', [UpgradeRequestsController::class, 'viewrequests'])->name('request.view');
        Route::get('/makepayment/{id}', [PaymentsController::class, 'makepayment'])->name('customer.makepayment');
        Route::post('/storepayment', [PaymentsController::class, 'storepayment'])->name('payment.store');
        Route::get('/mypayments', [PaymentsController::class, 'mypayments'])->name('customer.mypayments');
        Route::get('/payments-pdf', [PaymentsController::class, 'paymentsPDF'])->name('customer.paymentspdf');
        Route::get('/reports/myreport', [CustomerDashboardController::class, 'myreport'])->name('myreport');


        // Add more customer routes here
    });
});

// All Policies Routes
// Route::resource('policies', PoliciesController::class);
Route::get('/policies/create', [PoliciesController::class, 'create'])->name('policies.create')->middleware('auth');
Route::post('/policies', [PoliciesController::class, 'store'])->name('policies.store')->middleware('auth');
Route::get('/policies/{id}', [PoliciesController::class, 'show'])->name('policies.show')->middleware('auth');
Route::get('/policies/{id}/edit', [PoliciesController::class, 'edit'])->name('policies.edit')->middleware('auth');
Route::put('/policies/{id}', [PoliciesController::class, 'update'])->name('policies.update')->middleware('auth');
Route::delete('/policies/{id}', [PoliciesController::class, 'destroy'])->name('policies.destroy')->middleware('auth');
Route::get('/viewpolicies', [PoliciesController::class, 'viewpolicies'])->name('viewpolicies');
Route::get('/reports/policies', [PoliciesController::class, 'policiesPDF'])->name('policies.pdf')->middleware('auth');
Route::post('/policies/search', [PoliciesController::class, 'search'])->name('policies.search');

//pdf
Route::get('/reports/policies', [PoliciesController::class, 'policiesPDF'])->name('policies.pdf');
Route::get('/reports/customers', [CustomersController::class, 'generatePDF'])->name('customers.pdf');
