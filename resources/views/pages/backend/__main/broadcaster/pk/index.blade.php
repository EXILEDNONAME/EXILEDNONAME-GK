@extends('layouts.backend.__templates.index', ['page' => 'datatable-index', 'active' => 'true', 'status' => 'true', 'date' => 'false', 'datetime' => 'false', 'status' => 'false'])
@section('title', 'Broadcaster PK')

@section('table-header')
<th> Date </th>
<th> Name </th>
<th> Avatar </th>
<th> ID Broadcaster </th>
<th> Username </th>
<th> VS </th>
<th> Username </th>
<th> ID Broadcaster </th>
<th> Banner </th>
@endsection

@section('table-body')
{ data: 'date', 'className': 'align-middle text-nowrap' },
{ data: 'name', 'className': 'align-middle text-nowrap' },
{ data: 'avatar', orderable: false, 'className': 'align-middle text-center', 'width': '1' },
{ data: 'id_broadcaster', 'className': 'align-middle text-nowrap text-center' },
{ data: 'id_broadcaster_username', 'className': 'align-middle text-nowrap text-center' },
{ data: 'vs', orderable: false, 'className': 'align-middle text-nowrap text-center', 'width': '1' },
{ data: 'vs_bigo_username', 'className': 'align-middle text-nowrap text-center' },
{ data: 'vs_bigo_id', 'className': 'align-middle text-nowrap text-center' },
{ data: 'banner', orderable: false, 'className': 'align-middle text-nowrap text-center', 'width': '1' },
@endsection
