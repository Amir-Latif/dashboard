<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

// users

Route::prefix('users')->group(function () {
    Route::post('/add-user', [UsersController::class, 'add_user']);
    Route::get('/user-list', [UsersController::class, 'get_users_list']);
    Route::delete('/delete-user/{id}', [UsersController::class, 'delete_user'])->name('delete-user');
});
