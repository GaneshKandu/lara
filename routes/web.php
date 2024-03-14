<?php

use Illuminate\Support\Facades\Route;

Route::get('/ganesh', [ganeshkandu\lara\TestController::class,'index']);

//function() { return view('lara::ganesh');}
