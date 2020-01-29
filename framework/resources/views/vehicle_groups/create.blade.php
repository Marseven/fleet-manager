@extends('layouts.app')

@section('content')
<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">@lang('fleet.vehicleGroup')</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/')}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ url('vehicle_group.index')}}"><i class="fa fa-car"></i></a></li>
                    <li class="breadcrumb-item active"><a href="#"> @lang('fleet.createGroup')</a></li>
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
                <h3 class="card-title">@lang('fleet.createGroup')</h3>
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

                {!! Form::open(['route' => 'vehicle_group.store','method'=>'post']) !!}
                {!! Form::hidden('user_id',Auth::user()->id)!!}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        {!! Form::label('name',__('fleet.groupName'), ['class' => 'form-label']) !!}
                        {!! Form::text('name',null,['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description',__('fleet.description'), ['class' => 'form-label']) !!}
                            {!! Form::text('description',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('note',__('fleet.note'), ['class' => 'form-label']) !!}
                            {!! Form::textarea('note',null,['class'=>'form-control','size'=>'30x2']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::submit(__('fleet.createGroup'), ['class' => 'btn btn-success']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection