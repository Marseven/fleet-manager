@extends('layouts.app')

@section('content')
<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">@lang('fleet.dashboard')</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#"><i class="feather icon-settings"></i></a></li>
                    <li class="breadcrumb-item active"><a href="#"> @lang('fleet.addReason')</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->
<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">@lang('fleet.addReason')</h3>
      </div>
      <div class="card-body">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        {!! Form::open(['route' => 'cancel-reason.store','method'=>'post']) !!}
        {!! Form::hidden('user_id',Auth::user()->id)!!}
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('reason',__('fleet.addReason'), ['class' => 'form-label']) !!}
              {!! Form::text('reason',null,['class'=>'form-control','required']) !!}
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            {!! Form::submit(__('fleet.save'), ['class' => 'btn btn-success']) !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection