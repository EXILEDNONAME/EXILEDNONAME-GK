<div class="form-group row">
  <label class="col-4 col-form-label"> Join Date </label>
  <div class="col-8">
    <div class="input-daterange input-group" id="ex_datepicker_date">
      {{ Html::text('date', (isset($data->date) ?  \Carbon\Carbon::parse($data->date)->format('Y-m-d') : ''))->class([ $errors->has('date') ? 'form-control is-invalid' : 'form-control', ])->id('date')->placeholder('- ' . __("default.select.date") . ' -')->isReadOnly() }}
      <div class="input-group-append">
        <span class="input-group-text">
          <i class="ki ki-calendar"></i>
        </span>
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
  <label  class="col-4 col-form-label"> BIGO ID </label>
  <div class="col-8">
    {{ Html::text('bigo_id', (isset($data->bigo_id) ? $data->bigo_id : ''))->class([ $errors->has('bigo_id') ? 'form-control is-invalid' : 'form-control'])->required() }}
    @error('bigo_id') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label  class="col-4 col-form-label"> Description </label>
  <div class="col-8">
    {{ Html::textarea('description', (isset($data->description) ? $data->description : ''))->class([ $errors->has('description') ? 'form-control is-invalid' : 'form-control', ])->id('ex-textarea') }}
    @error('description') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>
