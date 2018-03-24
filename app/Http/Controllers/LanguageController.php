<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index(){
    	return view('languages.create');
    }

    public function create(Request $request){
    	$flag = $request->flag;
    	$flag_new_name = time() . $flag->getClientOriginalName();
        $flag->move('uploads/languages', $flag_new_name);
    	\App\Language::create(['name' => $request->name, 'flag' => 'uploads/languages/'.$flag_new_name]);
    	return redirect()->route('showLanguage');
    }

    public function show(){
    	return view('languages.show')->with('languages', \App\Language::get());
    }

    public function update(Request $request, $id){
    	$lang = \App\Language::find($id); 
    	if($request->hasFile('flag')){
            $flag = $request->flag;
            $flag_new_name = time().$flag->getClientOriginalName();
            $flag->move('uploads/languages', $flag_new_name);
            $lang->image = 'uploads/languages/'.$flag_new_name;
        }

    	$lang->name = $request->name;
    	$lang->save();
    	return redirect()->route('showLanguage');
    }

    public function delete(Request $request, $id){
    	$quran = \App\Language::where('id',$id)->delete();
    	
    	return redirect()->route('showLanguage');
    }
}
