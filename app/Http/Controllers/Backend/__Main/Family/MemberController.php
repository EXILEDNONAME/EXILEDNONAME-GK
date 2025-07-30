<?php

namespace App\Http\Controllers\Backend\__Main\Family;

use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use App\Http\Traits\Backend\__System\Controllers\Datatable\ExtensionController;
use DataTables;

use App\Http\Requests\Backend\__Main\Family\Member\StoreRequest;
use App\Http\Requests\Backend\__Main\Family\Member\UpdateRequest;

class MemberController extends Controller {

  use DefaultController;
  use ExtensionController;

  function __construct() {
    $this->middleware(['auth', 'verified']);
    $this->model = 'App\Models\Backend\__Main\Family\Member';
    $this->path = 'pages.backend.__main.family.member.';
    $this->url = '/dashboard/families/members';
    if (request('date')) { $this->data = $this->model::orderby('date', 'desc')->whereBetween('date', [\Carbon\Carbon::parse(request('date')), \Carbon\Carbon::parse(request('date'))->addDays(1)])->get(); }
    if (request('date_start') && request('date_end')) { $this->data = $this->model::orderby('date_start', 'desc')->whereBetween('date_start', [request('date_start'), request('date_end')])->get(); }
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
      ->editColumn('date', function ($order) { return empty($order->date) ? NULL : \Carbon\Carbon::parse($order->date)->format('d F Y'); })
      ->editColumn('date_start', function ($order) { return empty($order->date_start) ? NULL : \Carbon\Carbon::parse($order->date_start)->format('d F Y, H:i'); })
      ->editColumn('date_end', function ($order) { return empty($order->date_end) ? NULL : \Carbon\Carbon::parse($order->date_end)->format('d F Y, H:i'); })
      ->editColumn('description', function ($order) { return nl2br(e($order->description)); })
      ->editColumn('avatar', function ($order) {
        if (!empty($order->avatar)) { return '<div class="symbol symbol-lg-35 symbol-30 symbol-circle symbol-light-success" bis_skin_checked="1"><img src="' . $order->avatar . '"></div>'; }
        else { return '<div class="symbol symbol-lg-35 symbol-30 symbol-circle symbol-light-success" bis_skin_checked="1"><img src="' . env("APP_URL") . '/assets/backend/media/users/blank.png"></div>'; }
      })
      ->editColumn('verified', function ($order) {
        if (empty($order->verified)) { return '<i class="fas fa-times-circle text-danger"></i>'; }
        else if ($order->verified == 0) { return '<i class="fas fa-times-circle text-danger"></i>'; }
        else { return '<i class="fas fa-check-circle text-success"></i>'; }
      })
      ->rawColumns(['description', 'avatar', 'verified'])
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
