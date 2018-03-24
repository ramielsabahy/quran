<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function createfastinvitation(Request $request){
    	return view('fast.fast');
    }
    public function createInvitation(Request $request){
    	\App\FastIslamic::create(['text' => $request->name, 'language' => $request->country_selector_code]);
    	return redirect()->back();
    }
    public function showfastinvitation(Request $request){
    	$invitations = \App\FastIslamic::get();
    	return view('fast.show')->with('invitations', $invitations);
    }
    public function editFastInvitation($id,Request $request){
    	$invitation = \App\FastIslamic::find($id);
    	return view('fast.edit')->with('invitation', $invitation);
    }
    public function updateFastInvitation(Request $request, $id){
    	$invitation = \App\FastIslamic::find($id);
    	$invitation->text = $request->name;
    	$invitation->language = $request->country_selector_code;
    	$invitation->save();
    	return redirect()->route('showfastinvitation');
    }
    public function deleteFastInvitation($id,Request $request){
    	\App\FastIslamic::where('id', $id)->delete();
        return redirect()->back();
    }


    public function createdetailinvitationView(Request $request){
    	return view('detail.create');
    }
    public function createDetailInvitation(Request $request){
    	\App\DetailIslamic::create(['text' => $request->name, 'language' => $request->country_selector_code]);
    	return redirect()->back();
    }
    public function showdetailinvitation(Request $request){
    	$invitations = \App\DetailIslamic::get();
    	return view('detail.show')->with('invitations', $invitations);
    }
    public function editDetailInvitation($id,Request $request){
    	$invitation = \App\DetailIslamic::find($id);
    	return view('detail.edit')->with('invitation', $invitation);
    }
    public function updateDetailInvitation(Request $request, $id){
    	$invitation = \App\DetailIslamic::find($id);
    	$invitation->text = $request->name;
    	$invitation->language = $request->country_selector_code;
    	$invitation->save();
    	return redirect()->route('showdetailinvitation');
    }
    public function deleteDetailInvitation($id,Request $request){
    	\App\DetailIslamic::where('id', $id)->delete();
        return redirect()->back();
    }

    public function fetchFast(Request $request){
    	$fast = \App\FastIslamic::get();
    	$resp = new \App\Http\Helpers\ServiceResponse;
        $resp->Message = "Data loaded successfully.";
        $resp->Status = true;
        $resp->InnerData = $fast;
        return response()->json($resp, 200);
    }

    public function fetchDetailed(Request $request){
    	$fast = \App\DetailIslamic::get();
    	$resp = new \App\Http\Helpers\ServiceResponse;
        $resp->InnerData = $fast;
        return response()->json($resp, 200);
    }
}
