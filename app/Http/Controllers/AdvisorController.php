<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvisorController extends Controller
{
    public function index(){
    	return view('advisor.create');
    }

    public function create(Request $request){
    	$advisor = new \App\Advisor();
    	$advisor->name = $request->name;
    	$advisor->phone = $request->phone;
    	$advisor->save();
    	return redirect()->route('showAdvisor');
    }

    public function show(){
    	return view('advisor.show')->with('information', \App\Advisor::get());
    }

    public function edit(Request $request, $id){
    	$advisor = \App\Advisor::find($id);
    	return view('advisor.edit')->with('advisor', $advisor);
    }

    public function update(Request $request, $id){
    	$advisor = \App\Advisor::find($id);
    	$advisor->phone = $request->phone;
    	$advisor->name = $request->name;
    	$advisor->save();
    	return redirect()->route('showAdvisor');
    }

    public function delete(Request $request, $id){
    	$advisor = \App\Advisor::where('id',$id)->delete();
    	
    	return redirect()->route('showAdvisor');
    }

    public function api(){
        $advisors = \App\Advisor::get();
        $resp = new \App\Http\Helpers\ServiceResponse;

        $resp->InnerData = $advisors;
        return response()->json($resp, 200);
    }
}
