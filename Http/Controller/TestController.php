<?php

namespace ganeshkandu\lara;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class TestController extends Controller{
	public function index(Request $request){
		return view('lara::ganesh');
	}
}
