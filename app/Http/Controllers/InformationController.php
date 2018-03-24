<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Information.information')->with('information', \App\Information::first());
    }

    public function update(Request $request){
        $address = $request->address;
        $phone = $request->phone;
        $title = $request->title;
        $fb_id = $request->fb_id;
        $tw_id = $request->tw_id;
        $google_id = $request->google_id;
        $instagram_id = $request->instagram_id;
        $linked_id = $request->linked_id;

        $info = \App\Information::first();
        $info->address = $address;
        $info->phone = $phone;
        $info->fb_id = $fb_id;
        $info->tw_id = $tw_id;
        $info->google_id = $google_id;
        $info->instagram_id = $instagram_id;
        $info->linked_id = $linked_id;
        $info->title = $title;
        $info->save();
        Session::flash('success', 'Post created successfully.');
        return redirect()->back();
    }
}
