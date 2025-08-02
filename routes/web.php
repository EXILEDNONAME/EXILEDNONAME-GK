<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('pages.frontend.index'); });

require __DIR__.'/auth.php';
require __DIR__.'/backend/dashboard.php';
require __DIR__.'/backend/administrative/application.php';
require __DIR__.'/backend/administrative/management.php';
require __DIR__.'/backend/administrative/session.php';
require __DIR__.'/backend/application/datatable.php';

// BROADCASTERS - MEMBERS
Route::group([
  'as' => 'dashboard.main.broadcaster.members.',
  'prefix' => 'dashboard/broadcasters/members',
  'namespace' => 'App\Http\Controllers\Backend\__Main\Broadcaster',
  'middleware' => ['auth','verified'],
], function () {
  Route::get('active/{id}', 'MemberController@active')->name('active');
  Route::get('activities', 'MemberController@activity')->name('activity');
  Route::get('delete/{id}', 'MemberController@delete')->name('delete');
  Route::get('delete-permanent/{id}', 'MemberController@delete_permanent')->name('delete-permanent');
  Route::get('inactive/{id}', 'MemberController@inactive')->name('inactive');
  Route::get('restore/{id}', 'MemberController@restore')->name('restore');
  Route::get('selected-active', 'MemberController@selected_active')->name('selected-active');
  Route::get('selected-inactive', 'MemberController@selected_inactive')->name('selected-inactive');
  Route::get('selected-delete', 'MemberController@selected_delete')->name('selected-delete');
  Route::get('selected-delete-permanent', 'MemberController@selected_delete_permanent')->name('selected-delete-permanent');
  Route::get('selected-restore', 'MemberController@selected_restore')->name('selected-restore');
  Route::get('trash', 'MemberController@trash')->name('trash');
  Route::resource('/', 'MemberController')->parameters(['' => 'id']);
});

// BROADCASTERS - PK's
Route::group([
  'as' => 'dashboard.main.broadcaster.pk.',
  'prefix' => 'dashboard/broadcasters/pk',
  'namespace' => 'App\Http\Controllers\Backend\__Main\Broadcaster',
  'middleware' => ['auth','verified'],
], function () {
  Route::get('active/{id}', 'PKController@active')->name('active');
  Route::get('activities', 'PKController@activity')->name('activity');
  Route::get('delete/{id}', 'PKController@delete')->name('delete');
  Route::get('delete-permanent/{id}', 'PKController@delete_permanent')->name('delete-permanent');
  Route::get('inactive/{id}', 'PKController@inactive')->name('inactive');
  Route::get('restore/{id}', 'PKController@restore')->name('restore');
  Route::get('selected-active', 'PKController@selected_active')->name('selected-active');
  Route::get('selected-inactive', 'PKController@selected_inactive')->name('selected-inactive');
  Route::get('selected-delete', 'PKController@selected_delete')->name('selected-delete');
  Route::get('selected-delete-permanent', 'PKController@selected_delete_permanent')->name('selected-delete-permanent');
  Route::get('selected-restore', 'PKController@selected_restore')->name('selected-restore');
  Route::get('trash', 'PKController@trash')->name('trash');
  Route::resource('/', 'PKController')->parameters(['' => 'id']);
});

// BROADCASTERS - REPORTS
Route::group([
  'as' => 'dashboard.main.broadcaster.reports.',
  'prefix' => 'dashboard/broadcasters/reports',
  'namespace' => 'App\Http\Controllers\Backend\__Main\Broadcaster',
  'middleware' => ['auth','verified'],
], function () {
  Route::get('active/{id}', 'ReportController@active')->name('active');
  Route::get('activities', 'ReportController@activity')->name('activity');
  Route::get('delete/{id}', 'ReportController@delete')->name('delete');
  Route::get('delete-permanent/{id}', 'ReportController@delete_permanent')->name('delete-permanent');
  Route::get('inactive/{id}', 'ReportController@inactive')->name('inactive');
  Route::get('restore/{id}', 'ReportController@restore')->name('restore');
  Route::get('selected-active', 'ReportController@selected_active')->name('selected-active');
  Route::get('selected-inactive', 'ReportController@selected_inactive')->name('selected-inactive');
  Route::get('selected-delete', 'ReportController@selected_delete')->name('selected-delete');
  Route::get('selected-delete-permanent', 'ReportController@selected_delete_permanent')->name('selected-delete-permanent');
  Route::get('selected-restore', 'ReportController@selected_restore')->name('selected-restore');
  Route::get('trash', 'ReportController@trash')->name('trash');
  Route::resource('/', 'ReportController')->parameters(['' => 'id']);
});

// FAMILIES - MEMBERS
Route::group([
  'as' => 'dashboard.main.family.members.',
  'prefix' => 'dashboard/families/members',
  'namespace' => 'App\Http\Controllers\Backend\__Main\Family',
  'middleware' => ['auth','verified'],
], function () {
  Route::get('active/{id}', 'MemberController@active')->name('active');
  Route::get('activities', 'MemberController@activity')->name('activity');
  Route::get('delete/{id}', 'MemberController@delete')->name('delete');
  Route::get('delete-permanent/{id}', 'MemberController@delete_permanent')->name('delete-permanent');
  Route::get('inactive/{id}', 'MemberController@inactive')->name('inactive');
  Route::get('restore/{id}', 'MemberController@restore')->name('restore');
  Route::get('selected-active', 'MemberController@selected_active')->name('selected-active');
  Route::get('selected-inactive', 'MemberController@selected_inactive')->name('selected-inactive');
  Route::get('selected-delete', 'MemberController@selected_delete')->name('selected-delete');
  Route::get('selected-delete-permanent', 'MemberController@selected_delete_permanent')->name('selected-delete-permanent');
  Route::get('selected-restore', 'MemberController@selected_restore')->name('selected-restore');
  Route::get('trash', 'MemberController@trash')->name('trash');
  Route::resource('/', 'MemberController')->parameters(['' => 'id']);
});
