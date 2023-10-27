<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('login');
});

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'setlocale'
], function() {

    Route::get('/', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified']);

    Route::resource(
        'companies',
        CompanyController::class,
        ['except' => ['show']]
    )->middleware(['auth', 'verified']);

    Route::resource(
        'employees',
        EmployeeController::class,
        ['except' => ['show']]
    )->middleware(['auth', 'verified']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();
