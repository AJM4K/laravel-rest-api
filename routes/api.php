<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use \App\Http\Controllers\todo;


Route::get('/index' , [UserController::class , 'index']);
Route::get('/todos' , [todo::class , 'index']);
Route::post('/todos' , [todo::class , 'store']);
