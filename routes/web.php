<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeController::class)->name('welcome');
Route::post('/form_send', [WelcomeController::class, 'form_send'])->name('form_send');
