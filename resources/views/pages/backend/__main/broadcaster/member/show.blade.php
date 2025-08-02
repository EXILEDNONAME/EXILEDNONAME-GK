@extends('layouts.backend.__templates.show', ['active' => 'true', 'datetime' => 'false', 'status' => 'false'])
@section('title', 'Broadcaster Members')

@section('table-header')
<tr>
  <td class="align-middle font-weight-bold"> Name </td>
  <td> {{ $data->name }} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Description </td>
  <td> {{ $data->description }} </td>
</tr>
@endsection
