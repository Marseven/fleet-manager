@extends('layouts.app')
@section('extra_css')
<style type="text/css">
.height{
  height: 200px;
}
</style>
@endsection

@section('content')
<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">@lang('fleet.customers')</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/')}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ url('customers.index')}}"><i class="feather icon-users"></i></a></li>
                    <li class="breadcrumb-item active"><a href="#"> @lang('fleet.addresses')</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->
<div class="row">
  @foreach($bookings as $booking)
    <div class="col-md-4">
      <div class="card card-info card-outline">
        <div class="card-body height">
          {!! nl2br(e($booking->address)) !!}
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection