<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GraphController extends Controller
{
    public function graph(Request $request){
    	return view('graph');
    }
    public function graph2(Request $request){
    	return view('graph2');
    }
}
