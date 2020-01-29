@extends('layouts.app')
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route("vehicles.index")}}">@lang('fleet.vehicles')</a></li>
<li class="breadcrumb-item active">@lang('fleet.driver_logs')</li>
@endsection
@section('content')
<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">@lang('fleet.vehicle_types')</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/')}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route("vehicles.index")}}"><i class="fa fa-car"></i></a></li>
                    <li class="breadcrumb-item active"><a href="#"> @lang('fleet.driver_logs')</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">@lang('fleet.driver_logs')</h3>
      </div>

      <div class="card-body dt-responsive table-responsive">
        <table id="base-style" class="table table-striped table-bordered nowrap">
          <thead>
            <tr>
              <th>#</th>
              <th>@lang('fleet.vehicle')</th>
              <th>@lang('fleet.driver')</th>
              <th>@lang('fleet.assigned_on')</th>
            </tr>
          </thead>
          <tbody>
          @foreach($logs as $row)
            <tr>
              <td>{{$row->id}}</td>
              <td>{{$row->vehicle->make}} - {{$row->vehicle->model}} - {{$row->vehicle->license_plate}}</td>
              <td>{{$row->driver->name}}</td>
              <td>{{date('d-m-Y g:i A',strtotime($row->date))}}</td>
            </tr>
          @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>#</th>
              <th>@lang('fleet.vehicle')</th>
              <th>@lang('fleet.driver')</th>
              <th>@lang('fleet.assigned_on')</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<!-- datatable Js -->
<script src="{{asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/pages/data-styling-custom.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#driver_logs tfoot th').each( function () {
    var title = $(this).text();
    $(this).html( '<input type="text" placeholder="'+title+'" />' );
  });

  var table = $('#driver_logs').DataTable({
    "language": {
        "url": '{{ __("fleet.datatable_lang") }}',
     },
     columnDefs: [ { orderable: false, targets: [0] } ],
     // individual column search
     "initComplete": function() {
              table.columns().every(function () {
                var that = this;
                $('input', this.footer()).on('keyup change', function () {
                  // console.log($(this).parent().index());
                    that.search(this.value).draw();
                });
              });
            }
  });
});
</script>
@endsection