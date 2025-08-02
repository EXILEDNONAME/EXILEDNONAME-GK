<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Backend\__Main\Transaction;
use DataTables;

class DashboardController extends Controller{

  function __construct() {
    $this->middleware(['auth', 'verified']);
    $this->pk = \DB::table('main_broadcaster_pks')->orderby('date', 'asc')->whereBetween('date', [\Carbon\Carbon::now()->addDays(-1), \Carbon\Carbon::now()->addDays(31)])->get();
    $this->report = \DB::table('main_broadcaster_reports')->orderby('date', 'desc')->get()->take(1);
  }

  public function index() {
    $report = $this->report;
    if (request()->ajax()) {
      return DataTables::of($this->pk)
      ->editColumn('date', function ($order) { return empty($order->date) ? NULL : \Carbon\Carbon::parse($order->date)->format('d F Y, H:i'); })
      ->editColumn('date_start', function ($order) { return empty($order->date_start) ? NULL : \Carbon\Carbon::parse($order->date_start)->format('d F Y, H:i'); })
      ->editColumn('date_end', function ($order) { return empty($order->date_end) ? NULL : \Carbon\Carbon::parse($order->date_end)->format('d F Y, H:i'); })
      ->editColumn('avatar', function ($order) {
        $data = \DB::table('main_broadcaster_members')->where('id', $order->id_broadcaster)->first();
        if (!empty($data->avatar)) { return '<div class="symbol symbol-lg-35 symbol-30 symbol-circle symbol-light-success" bis_skin_checked="1"><img src="' . $data->avatar . '"></div>'; }
        else { return '<div class="symbol symbol-lg-35 symbol-30 symbol-circle symbol-light-success" bis_skin_checked="1"><img src="' . env("APP_URL") . '/assets/backend/media/users/blank.png"></div>'; }
      })
      ->editColumn('id_broadcaster', function ($order) {
        $data = \DB::table('main_broadcaster_members')->where('id', $order->id_broadcaster)->first();
        return '<span class="font-weight-bolder text-success">' . $data->bigo_id . '</span>';
      })
      ->editColumn('id_broadcaster_username', function ($order) {
        $data = \DB::table('main_broadcaster_members')->where('id', $order->id_broadcaster)->first();
        return '<span class="font-weight-bolder text-success">' . $data->name . '</span>';
      })
      ->editColumn('vs', function ($order) { return '-'; })
      ->editColumn('banner', function ($order) {
        if(!empty($order->banner)) { return '<a href="' . $order->banner . '" target="_blank"><i class="text-primary icon-md fas fa-link"></i></a>'; }
        else { return '<a href="javascript:void(0);"><i class="text-primary icon-md fas fa-link"></i></a>'; }
      })
      ->editColumn('description', function ($order) { return nl2br(e($order->description)); })
      ->rawColumns(['description', 'avatar', 'banner', 'id_broadcaster', 'id_broadcaster_username'])
      ->addIndexColumn()->make(true);
    }
    return view('pages.backend.dashboard', compact('report'));
  }

  public function file_manager() {
    return view('pages.backend.__system.file-manager.index');
  }

  public function language($language = '') {
    request()->session()->put('locale', $language);
    return redirect()->back();
  }

  public function logout(Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
  }

}
