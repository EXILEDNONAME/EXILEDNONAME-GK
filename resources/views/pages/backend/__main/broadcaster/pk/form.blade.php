<div class="form-group row">
  <div class="col-4 col-form-label"> Date </div>
  <div class="col-8">
    <div class="input-group date" id="ex_datetimepicker_datetime" data-target-input="nearest">
      <input name="date" type="text" class="form-control datetimepicker-input" placeholder="- Select Date -" data-target="#ex_datetimepicker_datetime" value="{{ isset($data->date) ? $data->date : '' }}" autocomplete="off">
      <div class="input-group-append" data-target="#ex_datetimepicker_datetime" data-toggle="datetimepicker">
        <span class="input-group-text"><i class="ki ki-calendar"></i></span>
      </div>
    </div>
  </div>
</div>

<div class="form-group row">
  <label  class="col-4 col-form-label"> Name </label>
  <div class="col-8">
    {{ Html::text('name', (isset($data->name) ? $data->name : ''))->class([ $errors->has('name') ? 'form-control is-invalid' : 'form-control'])->required() }}
    @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-4 col-form-label">
    <a href="/dashboard/applications/datatables/generals/create" target="_blank" class="text-danger font-weight-bold"><u> Official Host </u></a>
  </label>
  <div class="col-8">
    {{ Html::select('id_broadcaster', BroadcasterMembers(), (isset($data->id_broadcaster) ? $data->id_broadcaster : NULL))->placeholder('- Select Official Host -')->class('form-control')->required() }}
    @error('id_broadcaster') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label  class="col-4 col-form-label"> VS ID </label>
  <div class="col-8">
    {{ Html::text('vs_bigo_id', (isset($data->vs_bigo_id) ? $data->vs_bigo_id : ''))->class([ $errors->has('vs_bigo_id') ? 'form-control is-invalid' : 'form-control'])->required() }}
    @error('vs_bigo_id') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label  class="col-4 col-form-label"> VS Username </label>
  <div class="col-8">
    {{ Html::text('vs_bigo_username', (isset($data->vs_bigo_username) ? $data->vs_bigo_username : ''))->class([ $errors->has('vs_bigo_username') ? 'form-control is-invalid' : 'form-control'])->required() }}
    @error('vs_bigo_username') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label  class="col-4 col-form-label"> Description </label>
  <div class="col-8">
    {{ Html::textarea('description', (isset($data->description) ? $data->description : ''))->class([ $errors->has('description') ? 'form-control is-invalid' : 'form-control', ])->id('ex-textarea') }}
    @error('description') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>
