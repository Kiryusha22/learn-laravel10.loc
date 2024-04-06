<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);
Route::get('auth:api')->get('/logout', [AuthController::class, 'logout']);

Route::get('/roles', [RoleController::class,'index']);
Route::post('/roles', [RoleController::class,'store']);
Route::get('/roles{id}', [RoleController::class,'show']);
Route::get('/roles{id}', [RoleController::class,'update']);
Route::get('/roles{id}', [RoleController::class,'destroy']);

Route::get('/users', [UserController::class,'index']);
Route::post('/users', [UserController::class,'store']);
Route::get('/users{id}', [UserController::class,'show']);
Route::get('/users{id}', [UserController::class,'update']);
Route::get('/users{id}', [UserController::class,'destroy']);

Route::get('/categories', [CategoryController::class,'index']);
Route::post('/categories', [CategoryController::class,'store']);
Route::get('/categories{id}', [CategoryController::class,'show']);
Route::get('/categories{id}', [CategoryController::class,'update']);
Route::get('/categories{id}', [CategoryController::class,'destroy']);

Route::get('/products', [ProductController::class,'index']);
Route::post('/products', [ProductController::class,'store']);
Route::get('/products{id}', [ProductController::class,'show']);
Route::get('/products{id}', [ProductController::class,'update']);
Route::get('/products{id}', [ProductController::class,'destroy']);
