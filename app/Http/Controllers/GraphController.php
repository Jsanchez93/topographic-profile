<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GraphController extends Controller
{
    public function graph(Request $request){
    	$elevation = $request->post('elevation');
        sort($elevation);
        $data['max_elevation'] = end($elevation);


        $offset = array();
        foreach($request->post('elevation') as $key => $value) {
            $offset[$key] = $data['max_elevation'] - $value;
        }
        $data['offset'] = $offset;

        $air = array();
        foreach($request->post('depth') as $key => $value) {
            $air[$key] = $value - $request->post('NE')[$key];
        }
        $data['air'] = $air;
        
        $depth = $request->post('depth');
        sort($depth);
        sort($offset);
        $data['max_depth'] = end($depth) + end($offset);
        
        $data['title'] = $request->post('mainName');
        $data['location'] = $request->post('location');
        $data['elevation'] = $request->post('elevation');
        $data['NE'] = $request->post('NE');
        $data['depth'] = $request->post('depth');

    	return view('graph', $data);
    }


    public function graph2(Request $request){
    	return view('graph2');
    }
}
