<?php
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/blade', function () {
    return view('blade-livewire-view'); // Replace 'my-page' with the actual view name
});


