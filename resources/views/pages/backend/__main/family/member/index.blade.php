@extends('layouts.backend.__templates.index', ['page' => 'datatable-index', 'active' => 'true', 'status' => 'true', 'date' => 'false', 'datetime' => 'false', 'status' => 'false'])
@section('title', 'Family Members')

@section('table-header')
<th> Verified </th>
<th> Avatar </th>
<th> Join Date </th>
<th> ID </th>
<th> Name </th>
<th> Regional </th>
<th> Phone </th>
@endsection

@section('table-body')
{ data: 'verified', orderable: true, 'className': 'align-middle text-center', 'width': '1' },
{ data: 'avatar', orderable: false, 'className': 'align-middle text-center', 'width': '1' },
{ data: 'date' },
{ data: 'bigo_id' },
{ data: 'name' },
{ data: 'regional' },
{ data: 'phone' },
@endsection
