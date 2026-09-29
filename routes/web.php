<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login',[AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register',[AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout',function(Request $request){
     auth()->logout();
     $request->session()->invalidate();
     $request->session()->regenerateToken();

     return redirect()->route('login')->with('success','Logged out successfully');
})->middleware(AuthMiddleware::class);

Route::prefix('products')->middleware(AuthMiddleware::class)->group(function(){
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/create', [ProductController::class, 'create']);
    Route::post('/store/', [ProductController::class, 'store']);
    Route::get('/edit/{id}', [ProductController::class, 'edit']);
    Route::post('/update/', [ProductController::class, 'update']);
    Route::get('/delete/{id}', [ProductController::class, 'destroy']);
});
