<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeddingController;

Route::get('/', [WeddingController::class, 'index']);

