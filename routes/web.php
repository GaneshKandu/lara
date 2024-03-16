<?php

use Illuminate\Support\Facades\Route;
use ganeshkandu\lara\Http\Controllers\TestController;

Route::get('/ganesh', [TestController::class, 'index']);

//Route::get('/ganesh',function() { return view('lara::ganesh');});


