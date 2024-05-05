<?php
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/blade', function () {
    return view('bladeview'); // Replace 'my-page' with the actual view name
});

Route::view('livewire' , 'bladeview');
Route::view('create' , 'createitem');



