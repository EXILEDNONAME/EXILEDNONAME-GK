@extends('layouts.backend.__templates.create', ['active' => 'true', 'date' => 'false', 'datetime' => 'false', 'status' => 'false'])
@section('title', 'Broadcaster PK')

@push('js')
<script src="{{ env('APP_URL') }}/assets/backend/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js"></script>
@endpush
