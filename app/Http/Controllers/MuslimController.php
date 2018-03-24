<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MuslimController extends Controller
{
    public function index(){
    	return view('becomeMuslim.create');
    }

    public function create(Request $request){
    	\App\Muslim::create(['link' => $request->name, 'lang' => $request->country_selector_code]);
    	return redirect()->route('showMuslim');
    }

    public function show(){
    	return view('becomeMuslim.show')->with('information', \App\Muslim::get());
    }

    public function edit(Request $request, $id){
    	$quran = \App\Muslim::find($id);
    	return view('becomeMuslim.edit')->with('quran', $quran);
    }

    public function update(Request $request, $id){
    	$quran = \App\Muslim::find($id);
    	$quran->link = $request->name;
        $quran->lang = $request->country_selector_code;
    	$quran->save();
    	return redirect()->route('showMuslim');
    }

    public function delete(Request $request, $id){
    	$quran = \App\Muslim::where('id',$id)->delete();
    	
    	return redirect()->route('showMuslim');
    }

    public function api(){
        $muslim = \App\Muslim::get();
        $resp = new \App\Http\Helpers\ServiceResponse;
        $resp->InnerData = $muslim;
        return response()->json($resp, 200);
    }
}
