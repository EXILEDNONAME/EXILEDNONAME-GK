<?php

namespace App\Http\Controllers\Backend\__Main\Broadcaster;

use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use App\Http\Traits\Backend\__System\Controllers\Datatable\ExtensionController;
use DataTables;

use App\Http\Requests\Backend\__Main\Broadcaster\PK\StoreRequest;
use App\Http\Requests\Backend\__Main\Broadcaster\PK\UpdateRequest;

class PKController extends Controller {

  use DefaultController;
  use ExtensionController;

  function __construct() {
    $this->middleware(['auth', 'verified']);
    $this->model = 'App\Models\Backend\__Main\Broadcaster\PK';
    $this->path = 'pages.backend.__main.broadcaster.pk.';
    $this->url = '/dashboard/broadcasters/pk';
    if (request('date')) { $this->data = $this->model::orderby('date', 'desc')->whereBetween('date', [\Carbon\Carbon::parse(request('date')), \Carbon\Carbon::parse(request('date'))->addDays(1)])->get(); }
    else if (request('date_start') && request('date_end')) { $this->data = $this->model::orderby('date_start', 'desc')->whereBetween('date_start', [request('date_start'), request('date_end')])->get(); }
    else { $this->data = $this->model::orderby('date', 'desc')->get(); }
  }

  /**
  **************************************************
  * @return INDEX
  **************************************************
  **/

  public function index() {
    $model = $this->model;
    if (request()->ajax()) {
      return DataTables::of($this->data)
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
    return view($this->path . 'index', compact('model'));
  }

  /**
  **************************************************
  * @return STORE
  **************************************************
  **/

  public function store(StoreRequest $request) {
    $store = $request->all();
    $this->model::create($store);
    return redirect($this->url)->with('success', __('default.notification.success.item-created'));
  }

  /**
  **************************************************
  * @return UPDATE
  **************************************************
  **/

  public function update(UpdateRequest $request, $id) {
    $data = $this->model::findOrFail($id);
    $update = $request->all();
    $data->update($update);
    return redirect($this->url)->with('success', __('default.notification.success.item-updated'));
  }

}
