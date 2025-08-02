@push('head')
<link href="{{ env('APP_URL') }}/assets/backend/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>
@endpush
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b" data-card="true" id="exilednoname_card">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> PK </h3>
        </div>
        <div class="card-toolbar">
          <a id="table-refresh" class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.refresh') }}"><i class="fas fa-sync-alt"></i></a>
          <div class="dropdown dropdown-inline" bis_skin_checked="1">
            <button type="button" class="btn btn-clean btn-xs btn-icon btn-icon-md" data-toggle="dropdown">
              <i class="fas fa-download"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" bis_skin_checked="1">
              <ul class="navi navi-hover py-5">
                <li class="navi-item" title="{{ __('default.label.export.description-copy') }}"><a href="javascript:void(0);" class="navi-link" id="export_copy"><i class="navi-icon fa fa-copy"></i> {{ __('default.label.export.copy') }} </a></li>
                <li class="navi-item" title="{{ __('default.label.export.description-excel') }}"><a href="javascript:void(0);" class="navi-link" id="export_excel"><i class="navi-icon fa fa-file-excel"></i> {{ __('default.label.export.excel') }} </a></li>
                <li class="navi-item" title="{{ __('default.label.export.description-pdf') }}"><a href="javascript:void(0);" class="navi-link" id="export_pdf"><i class="navi-icon fa fa-file-pdf"></i> {{ __('default.label.export.pdf') }} </a></li>
                <li class="navi-item" title="{{ __('default.label.export.description-print') }}"><a href="javascript:void(0);" class="navi-link" id="export_print"><i class="navi-icon fa fa-print"></i> {{ __('default.label.export.print') }} </a></li>
              </ul>
            </div>
          </div>
          <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>

          @stack('toolbar-button')
        </div>
      </div>
      <div class="card-body" id="exilednoname_body">

        <div class="row dataTables_wrapper dt-bootstrap4 no-footer">
          <div class="col-sm-12 col-md-6"><div id="ex_table_length"></div></div>
          <div class="col-sm-12 col-md-6"><div id="ex_table_filter"></div></div>
        </div>

        <div class="table-responsive">
          <table class="table table-separate table-head-custom table-checkable table-sm" id="exilednoname_table">
            <thead>
              <tr>
                <th class="no-export"></th>
                <th> No. </th>
                <th> Date </th>
                <th> Name </th>
                <th> Avatar </th>
                <th> ID Broadcaster </th>
                <th> Username </th>
                <th> VS </th>
                <th> Username </th>
                <th> ID Broadcaster </th>
                <th> Banner </th>
              </tr>
            </thead>
          </table>
        </div>

        <div class="row dataTables_wrapper dt-bootstrap4 no-footer">
          <div class="col-sm-12 col-md-5"><div id="ex_table_info"></div></div>
          <div class="col-sm-12 col-md-7"><div id="ex_table_paginate"></div></div>
        </div>

      </div>
    </div>
  </div>
</div>

@push('js')
<script src="{{ env('APP_URL') }}/assets/backend/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="{{ env('APP_URL') }}/assets/backend/js/pages/crud/forms/widgets/bootstrap-datepicker.js"></script>
<script>
  $(document).ready(function() {
    KTApp.block('#exilednoname_body', { overlayColor: '#000000', state: 'primary', message: "{{ __('default.label.please-wait') }} ..." });
    setTimeout(function() { KTApp.unblock('#exilednoname_body'); }, 1000);
  });

  var card = new KTCard('exilednoname_card');
  var card = new KTCard('exilednoname_activity');
  var card = new KTCard('exilednoname_chart');

  var indexLastColumn = $("#exilednoname_table").find('tr')[0].cells.length-1;
  var table = $('#exilednoname_table').DataTable({
    "initComplete": function( settings, json ) {
      $('#exilednoname_table_info').appendTo('#ex_table_info');
      $('#exilednoname_table_paginate').appendTo('#ex_table_paginate');
      $('#exilednoname_table_length').appendTo('#ex_table_length');
      $('#exilednoname_table_filter').appendTo('#ex_table_filter');
    },

    "pagingType": "simple_numbers",
    serverSide: true,
    searching: true,
    rowId: 'Collocation',
    select: {
      style: 'multi',
      selector: 'td:first-child .checkable',
    },
    ajax: {
      url: "{{ URL::current() }}",
      "data" : function (ex) {
        @if (empty($date) || $date == 'true')
        ex.date = $('#date').val();
        @endif
        @if (empty($datetime) || $datetime == 'true')
        ex.date_start = $('#date_start').val();
        ex.date_end = $('#date_end').val();
        @endif
      }
    },
    headerCallback: function(thead, data, start, end, display) {
      thead.getElementsByTagName('th')[0].innerHTML = `
      <label class="checkbox checkbox-single checkbox-solid checkbox-primary mb-0">
        <input type="checkbox" value="" class="group-checkable"/>
        <span></span>
      </label>`;
    },
    "lengthMenu": [[25, 100, 250, 500, -1], [25, 100, 250, 500, "All"]],
    buttons: [
      { extend: 'print', title: '', exportOptions: { columns: "thead th:not(.no-export)", orthogonal: "Export" }, },
      { extend: 'copyHtml5', title: '', autoClose: 'true', exportOptions: { columns: "thead th:not(.no-export)", orthogonal: "Export" }, },
      { extend: 'excelHtml5', title: '', exportOptions: { columns: "thead th:not(.no-export)", orthogonal: "Export" }, },
      { extend: 'pdfHtml5', title: '', exportOptions: { columns: "thead th:not(.no-export)", orthogonal: "Export" }, },
      { extend: 'print', title: '', exportOptions: { columns: "thead th:not(.no-export)", orthogonal: "Export", rows: { selected: true } }, },
      { extend: 'copyHtml5', title: '', autoClose: 'true', exportOptions: { columns: "thead th:not(.no-export)", orthogonal: "Export", rows: { selected: true } }, },
      { extend: 'excelHtml5', title: '', exportOptions: {  columns: "thead th:not(.no-export)", orthogonal: "Export", rows: { selected: true } }, },
      { extend: 'pdfHtml5', title: '', exportOptions: { columns: "thead th:not(.no-export)", orthogonal: "Export", rows: { selected: true } }, },
    ],
    columns: [
      {
        data: 'checkbox', orderable: false, searchable: false, 'width': '1',
        render: function(data, type, row, meta) { return '<label class="checkbox checkbox-single checkbox-primary mb-0"><input type="checkbox" data-id="' + row.id + '" class="checkable"><span></span></label>'; },
      },
      {
        data: 'autonumber', orderable: false, searchable: false, 'className': 'align-middle text-center', 'width': '1',
        render: function(data, type, row, meta) { return meta.row + meta.settings._iDisplayStart + 1; }
      },
      { data: 'date', 'className': 'align-middle text-nowrap' },
      { data: 'name', 'className': 'align-middle text-nowrap' },
      { data: 'avatar', orderable: false, 'className': 'align-middle text-center', 'width': '1' },
      { data: 'id_broadcaster', 'className': 'align-middle text-nowrap text-center' },
      { data: 'id_broadcaster_username', 'className': 'align-middle text-nowrap text-center' },
      { data: 'vs', orderable: false, 'className': 'align-middle text-nowrap text-center', 'width': '1' },
      { data: 'vs_bigo_username', 'className': 'align-middle text-nowrap text-center' },
      { data: 'vs_bigo_id', 'className': 'align-middle text-nowrap text-center' },
      { data: 'banner', orderable: false, 'className': 'align-middle text-nowrap text-center', 'width': '1' },
    ],
    order: [
      [2, 'asc']
    ]
  });

  $('#export_print').on('click', function(e) { e.preventDefault(); table.button(0).trigger(); });
  $('#export_copy').on('click', function(e) { e.preventDefault(); table.button(1).trigger(); });
  $('#export_excel').on('click', function(e) { e.preventDefault(); table.button(2).trigger(); });
  $('#export_pdf').on('click', function(e) { e.preventDefault(); table.button(3).trigger(); });
</script>

@include('layouts.backend.__extensions.javascript.checkable')
@include('layouts.backend.__extensions.javascript.checkable-group')
@include('layouts.backend.__extensions.javascript.filter-active')
@include('layouts.backend.__extensions.javascript.filter-date')
@include('layouts.backend.__extensions.javascript.filter-datetime')
@include('layouts.backend.__extensions.javascript.filter-status')
@include('layouts.backend.__extensions.javascript.active')
@include('layouts.backend.__extensions.javascript.inactive')
@include('layouts.backend.__extensions.javascript.delete')
@include('layouts.backend.__extensions.javascript.reset-password')
@include('layouts.backend.__extensions.javascript.activity-refresh')
@include('layouts.backend.__extensions.javascript.chart-refresh')
@include('layouts.backend.__extensions.javascript.table-refresh')

@include('layouts.backend.__extensions.javascript.selected-active')
@include('layouts.backend.__extensions.javascript.selected-inactive')
@include('layouts.backend.__extensions.javascript.selected-delete')
@endpush
