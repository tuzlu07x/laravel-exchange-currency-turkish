<?php

use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\BotController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [BotController::class, 'index'])->name('index');
Route::get('/bot', [ApiController::class, 'bot']);
