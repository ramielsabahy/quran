<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuranController extends Controller
{
    public function index(){
    	return view('quran.create');
    }

    public function create(Request $request){
    	\App\Quran::create(['link' => $request->name, 'lang' => $request->country_selector_code]);
    	return redirect()->route('showQuran');
    }

    public function show(){
    	return view('quran.show')->with('information', \App\Quran::get());
    }

    public function edit(Request $request, $id){
    	$quran = \App\Quran::find($id);
    	return view('quran.edit')->with('quran', $quran);
    }

    public function update(Request $request, $id){
    	$quran = \App\Quran::find($id);
    	$quran->link = $request->name;
        $quran->lang = $request->country_selector_code;
    	$quran->save();
    	return redirect()->route('showQuran');
    }

    public function delete(Request $request, $id){
    	$quran = \App\Quran::where('id',$id)->delete();
    	
    	return redirect()->route('showQuran');
    }

    public function api(){
        $quran = \App\Quran::get();
        $resp = new \App\Http\Helpers\ServiceResponse;
        $resp->InnerData = $quran;
        return response()->json($resp, 200);
    }
}
