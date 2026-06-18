<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudsController;

Route::get('/', [CrudsController::class, 'index'])
    ->name('users.index');

Route::get('/insert', function () {
    return view('create');
});

Route::post('/users/store', [CrudsController::class, 'store'])
    ->name('users.store');

Route::get('/edit/{id}', [CrudsController::class, 'edit'])
    ->name('users.edit');

Route::match(['put','post'], '/update/{id}', [CrudsController::class, 'update'])
    ->name('users.update');

Route::delete('/delete/{id}', [CrudsController::class, 'destroy'])
    ->name('users.destroy');

Route::get('/invalid-action', [CrudsController::class, 'invalidAction'])
    ->name('users.invalid');

Route::get('/restricted', [CrudsController::class, 'restricted'])
    ->name('users.restricted');

Route::get('/notice', [CrudsController::class, 'notice'])
    ->name('users.notice');