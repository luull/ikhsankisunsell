<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Admin\ListTransactionController;
use App\Http\Controllers\User\ListUserTransactionController;


Route::get('/', function () {
    return view('landingpage');
});

Route::get('/', function () {
    return view('landingpage');
})->name('landingpage');

Route::get('layanankami', function () {
    return view('services');
})->name('services');

Route::get('masuk', function () {
    return view('auth.login');
})->name('masuk');

Route::get('daftar', function () {
    return view('auth.register');
})->name('daftar');

//routes controller
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//route home

Route::get('/home', function () {
    return view('home.beranda');
})->middleware('auth')->name('beranda');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/produk', [ProductsController::class, 'showProduct'])->name('produk');
    Route::get('/user/transactions', [ListUserTransactionController::class, 'index'])->name('user.transactions');
    Route::post('/user/transactions/{id}/upload-proof', [ListUserTransactionController::class, 'uploadTransferProof'])->name('user.uploadTransferProof');
    
    Route::get('/admin/transactions', [ListTransactionController::class, 'showTransactions'])->name('admin.transactions');
    Route::patch('/admin/transactions/{id}/approve', [ListTransactionController::class, 'approveTransaction'])->name('admin.approveTransaction');
    Route::patch('/admin/transactions/{id}/reject', [ListTransactionController::class, 'rejectTransaction'])->name('admin.rejectTransaction');
    Route::post('/approve-transaction/{id}', [ListTransactionController::class, 'approveTransactionToThirdParty']);

});

Route::get('/transaction/create', [TransactionController::class, 'create'])->name('transaction.create');
Route::post('/transaction/store', [TransactionController::class, 'store'])->name('transaction.store');
Route::post('/transaction/verify', [TransactionController::class, 'verifyPayment'])->name('transaction.verify');

Route::post('/webhook/dialogflow', [ChatbotController::class, 'handleWebhook']);
