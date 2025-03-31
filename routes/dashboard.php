<?php

use App\Http\Controllers\Dashboard\CountryController;
use Illuminate\Support\Facades\Route;

Route::resource('countries', CountryController::class);