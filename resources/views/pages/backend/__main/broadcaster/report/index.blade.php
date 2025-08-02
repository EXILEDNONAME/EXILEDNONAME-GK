@extends('layouts.backend.__templates.index', ['page' => 'datatable-index', 'active' => 'true', 'status' => 'true', 'date' => 'true', 'datetime' => 'false', 'status' => 'false'])
@section('title', 'Broadcaster Reports')

@section('table-header')
<th> Name </th>
<th> link </th>
@endsection

@section('table-body')
{ data: 'name', 'className': 'align-middle text-nowrap' },
{ data: 'link', 'className': 'align-middle text-center', 'width': '1' },
@endsection
