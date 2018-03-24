<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('dashboard', function() {
	return view('dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('information', 'InformationController@index')->name('information')->middleware('auth');
Route::POST('editInfo', 'InformationController@update')->name('editInfo')->middleware('auth');

Route::get('createfastinvitation', 'InvitationController@createfastinvitation')->name('createfastinvitation')->middleware('auth');
Route::POST('createInvitation', 'InvitationController@createInvitation')->name('createInvitation')->middleware('auth');
Route::get('showfastinvitation', 'InvitationController@showfastinvitation')->name('showfastinvitation')->middleware('auth');
Route::any('editFastInvitation/{id}', 'InvitationController@editFastInvitation')->name('editFastInvitation')->middleware('auth');
Route::any('deleteFastInvitation/{id}', 'InvitationController@deleteFastInvitation')->name('deleteFastInvitation')->middleware('auth');
Route::POST('updateFastInvitation/{id}', 'InvitationController@updateFastInvitation')->name('updateFastInvitation')->middleware('auth');


Route::get('createdetailinvitationview', 'InvitationController@createdetailinvitationView')->name('createdetailinvitation')->middleware('auth');
Route::POST('createDetailInvitation', 'InvitationController@createDetailInvitation')->name('createDetailInvitation')->middleware('auth');
Route::get('showdetailinvitation', 'InvitationController@showdetailinvitation')->name('showdetailinvitation')->middleware('auth');
Route::any('editDetailInvitation/{id}', 'InvitationController@editDetailInvitation')->name('editDetailInvitation')->middleware('auth');
Route::any('deleteDetailInvitation/{id}', 'InvitationController@deleteDetailInvitation')->name('deleteDetailInvitation')->middleware('auth');
Route::POST('updateDetailInvitation/{id}', 'InvitationController@updateDetailInvitation')->name('updateDetailInvitation')->middleware('auth');

Route::get('quran', 'QuranController@index')->name('quranView');
Route::POST('quranCreate', 'QuranController@create')->name('quranCreate');
Route::get('showQuran', 'QuranController@show')->name('showQuran');
Route::any('editQuran/{id}', 'QuranController@edit')->name('editQuran');
Route::any('deleteQuran/{id}', 'QuranController@delete')->name('deleteQuran');
Route::POST('updateQuran/{id}', 'QuranController@update')->name('updateQuran');

Route::get('advisor', 'AdvisorController@index')->name('advisorView');
Route::POST('advisorCreate', 'AdvisorController@create')->name('advisorCreate');
Route::get('showAdvisor', 'AdvisorController@show')->name('showAdvisor');
Route::any('editAdvisor/{id}', 'AdvisorController@edit')->name('editAdvisor');
Route::any('deleteAdvisor/{id}', 'AdvisorController@delete')->name('deleteAdvisor');
Route::POST('updateAdvisor/{id}', 'AdvisorController@update')->name('updateAdvisor');

Route::get('muslim', 'MuslimController@index')->name('muslimView');
Route::POST('muslimCreate', 'MuslimController@create')->name('muslimCreate');
Route::get('showMuslim', 'MuslimController@show')->name('showMuslim');
Route::any('editMuslim/{id}', 'MuslimController@edit')->name('editMuslim');
Route::any('deleteMuslim/{id}', 'MuslimController@delete')->name('deleteMuslim');
Route::POST('updateMuslim/{id}', 'MuslimController@update')->name('updateMuslim');

Route::get('mohamed', 'MohamedController@index')->name('mohamedView');
Route::POST('mohamedCreate', 'MohamedController@create')->name('mohamedCreate');
Route::get('showMohamed', 'MohamedController@show')->name('showMohamed');
Route::any('editMohamed/{id}', 'MohamedController@edit')->name('editMohamed');
Route::any('deleteMohamed/{id}', 'MohamedController@delete')->name('deleteMohamed');
Route::POST('updateMohamed/{id}', 'MohamedController@update')->name('updateMohamed');

Route::get('language', 'LanguageController@index')->name('languageView');
Route::POST('languageCreate', 'LanguageController@create')->name('languageCreate');
Route::get('showLanguage', 'LanguageController@show')->name('showLanguage');
Route::any('deleteLanguage/{id}', 'LanguageController@delete')->name('deleteLanguage');
Route::POST('updateLanguage/{id}', 'LanguageController@update')->name('updateLanguage');