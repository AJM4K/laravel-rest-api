<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use \App\Http\Controllers\todo;


Route::get('/index' , [UserController::class , 'index']);
Route::get('/todos' , [todo::class , 'index']);
Route::get('/getall' , [todo::class , 'getAll']);

Route::post('/todos' , [todo::class , 'store']);
Route::get('/p' , [todo::class , 'paginated']);
Route::get('/todos/{todo_id}', [todo::class, 'show']);
Route::delete('/todos/{todo_id}', [todo::class, 'destroy']);
Route::put('/todos/{todo_id}', [todo::class, 'update']);
