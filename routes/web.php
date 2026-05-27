<?php

use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\EnsureUserIsAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::redirect('/', '/login')->name('home');

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->get('/dashboard', function () {

    $user = Auth::user();

    if ($user->rol === 'admin') {
        return redirect()->route('admin.users.index');
    }

    return redirect()->route('profile.edit');
})->name('dashboard');

/*
|--------------------------------------------------------------------------
| PERFIL (usuario normal)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/perfil', [ProfileController::class, 'edit'])
        ->name('profile.edit');
});

/*
|--------------------------------------------------------------------------
| ADMIN (ABM usuarios)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', EnsureUserIsAdmin::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('users', AdminUserController::class);

        // /admin redirige a usuarios
        Route::get('/', function () {
            return redirect()->route('admin.users.index');
        });
    });

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
