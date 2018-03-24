<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MohamedController extends Controller
{
    public function index(){
    	return view('mohamed.create');
    }

    public function create(Request $request){
    	\App\Mohamed::create(['link' => $request->name, 'lang' => $request->country_selector_code]);
    	return redirect()->route('showMohamed');
    }

    public function show(){
    	return view('mohamed.show')->with('information', \App\Mohamed::get());
    }

    public function edit(Request $request, $id){
    	$quran = \App\Mohamed::find($id);
    	return view('mohamed.edit')->with('quran', $quran);
    }

    public function update(Request $request, $id){
    	$quran = \App\Mohamed::find($id);
    	$quran->link = $request->name;
        $quran->lang = $request->country_selector_code;
    	$quran->save();
    	return redirect()->route('showMohamed');
    }

    public function delete(Request $request, $id){
    	$quran = \App\Mohamed::where('id',$id)->delete();
    	
    	return redirect()->route('showMohamed');
    }

    public function api(){
    	$mohamed = \App\Mohamed::get();
    	$resp = new \App\Http\Helpers\ServiceResponse;
        $resp->InnerData = $mohamed;
        return response()->json($resp, 200);
    }
}
