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
// 登録画面に移行するためのコントローラー（アクション名：register）
Route::post('/register',[PretestController::class,'register']);
Route::post('/pretests', [PretestController::class, 'store']);
Route::patch('/pretests/update',[PretestController::class,'update']);
Route::delete('/pretests/delete',[PretestController::class,'destroy']);
// 検索を実行するためのコントローラー（アクション名：search）
Route::get('/pretests/search',[PretestController::class,'search']);