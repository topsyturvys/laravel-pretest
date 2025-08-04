<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PretestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[PretestController::class,'index']);
Route::post('/', [PretestController::class, 'index']);
Route::post('/register',[PretestController::class,'register']);
Route::post('/pretests', [PretestController::class, 'store']);