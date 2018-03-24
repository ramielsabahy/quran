<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::any('fetchFastInvitation', 'InvitationController@fetchFast');
Route::any('fetchDetailedInvitation', 'InvitationController@fetchDetailed');
Route::any('quran', 'QuranController@api');
Route::any('advisors', 'AdvisorController@api');
Route::any('muslim', 'MuslimController@api');
Route::any('prophit', 'MohamedController@api');
