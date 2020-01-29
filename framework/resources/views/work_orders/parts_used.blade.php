@extends("layouts.app")
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route("work_order.index")}}">@lang('fleet.work_orders') </a></li>
<li class="breadcrumb-item active">@lang('fleet.partsUsed')</li>
@endsection
@section('content')
<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">@lang('fleet.booking_quotes')</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/')}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('work_order.index')}}"><i class="feather icon-file"></i></a></li>
                    <li class="breadcrumb-item active"><a href="#">@lang('fleet.partsUsed')</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->
<div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">
                  @lang('fleet.partsUsed')
                  </h3>
                </div>

                <div class="card-body dt-responsive table-responsive">
                    <table id="base-style" class="table table-striped table-bordered nowrap">
  <thead>
    <tr>
      <th>@lang('fleet.vehicle')</th>
      <th>@lang('fleet.description')</th>
      <th>@lang('fleet.part')</th>
      <th>@lang('fleet.qty')</th>
      <th>@lang('fleet.unit_cost')</th>
      <th>@lang('fleet.total_cost')</th>
    </tr>
  </thead>
  <tbody>
@foreach($order->parts as $row)
  <tr>
    <td>{{ $row->workorder->vehicle->make }} - {{ $row->workorder->vehicle->model }} - {{ $row->workorder->vehicle->license_plate }}</td>
    <td>{!! $row->workorder->description !!}</td>
    <td>{{ $row->part->title }}</td>
    <td>{{ $row->qty }}</td>
    <td>{{ $row->price }}</td>
    <td>{{ $row->total }}</td>
  </tr>
@endforeach
  </tbody>
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

@endsection