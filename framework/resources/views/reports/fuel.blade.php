@extends('layouts.app')
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
                    <li class="breadcrumb-item"><a href="#"><i class="feather icon-trending-up"></i></a></li>
                    <li class="breadcrumb-item active"><a href="#">@lang('fleet.fuelReport')</a></li>
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
				<h3 class="card-title">@lang('fleet.fuelReport')
				</h3>
			</div>

			<div class="card-body" style="padding:5%;">
				{!! Form::open(['route' => 'reports.fuel','method'=>'post','class'=>'form-inline']) !!}
				<div class="row">
					<div class="form-group" style="margin-right: 10px">
						{!! Form::label('year', __('fleet.year1'), ['class' => 'form-label']) !!}
						{!! Form::select('year', $years, $year_select,['class'=>'form-control']); !!}
					</div>

					<div class="form-group" style="margin-right: 10px">
						{!! Form::label('month', __('fleet.month'), ['class' => 'form-label']) !!}
						<select name="month" id="month" class="form-control">
							<option value="0" @if($month_select == '0') selected @endif>all</option>
							<option value="1" @if($month_select == '1') selected @endif>January</option>
							<option value="2" @if($month_select == '2') selected @endif>February</option>
							<option value="3" @if($month_select == '3') selected @endif>March</option>
							<option value="4" @if($month_select == '4') selected @endif>April</option>
							<option value="5" @if($month_select == '5') selected @endif>May</option>
							<option value="6" @if($month_select == '6') selected @endif>June</option>
							<option value="7" @if($month_select == '7') selected @endif>July</option>
							<option value="8" @if($month_select == '8') selected @endif>Augest</option>
							<option value="9" @if($month_select == '9') selected @endif>Septeber</option>
							<option value="10" @if($month_select == '10') selected @endif>October</option>
							<option value="11" @if($month_select == '11') selected @endif>November</option>
							<option value="12" @if($month_select == '12') selected @endif>December</option>
						</select>
					</div>

					<div class="form-group" style="margin-right: 10px">
						{!! Form::label('vehicle', __('fleet.vehicles'), ['class' => 'form-label']) !!}
						<select id="vehicle_id" name="vehicle_id" class="form-control vehicles" required style="width: 250px;">
							<option value="">@lang('fleet.selectVehicle')</option>
							@foreach($vehicles as $vehicle)
							<option value="{{ $vehicle['id'] }}" @if($vehicle['id']==$vehicle_id) selected @endif>{{$vehicle['make']}}-{{$vehicle['model']}}-{{$vehicle['license_plate']}}</option>
							@endforeach
						</select>
					</div>
					<button type="submit" class="btn btn-info" style="margin-right: 10px">@lang('fleet.generate_report')</button>
					<button type="submit" formaction="{{url('admin/print-fuel-report')}}" class="btn btn-danger"><i class="fa fa-print"></i> @lang('fleet.print')</button>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@if(isset($result))
<div class="row">
	<div class="col-md-12">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">
				Fuel Report
				</h3>
			</div>

			<div class="card-body dt-responsive table-responsive">
				<table id="base-style" class="table table-striped table-bordered nowrap">
					<thead>
						<tr>
							<th>@lang('fleet.date')</th>
							<th>@lang('fleet.vehicle')</th>
							<th>@lang('fleet.meter')</th>
							<th>@lang('fleet.consumption')</th>
							<th>@lang('fleet.cost')</th>
						</tr>
					</thead>
					<tbody>
					@foreach($fuel as $f)
						<tr>
							<td>{{$f->date}}</td>
							<td>{{$f->vehicle_data->make}}-{{$f->vehicle_data->model}}-{{$f->vehicle_data->license_plate}}</td>
							<td>
							<b> @lang('fleet.start'): </b>{{$f->start_meter}} {{Hyvikk::get('dis_format')}}
							<br>
							<b> @lang('fleet.end'):</b>{{$f->end_meter}} {{Hyvikk::get('dis_format')}}
							</td>
							<td>{{$f->consumption}} @if(Hyvikk::get('dis_format') == "km") KMPG  @else MPG @endif</td>
							<td>{{$f->qty * $f->cost_per_unit}} {{Hyvikk::get('currency')}}</td>
						</tr>
					@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>@lang('fleet.date')</th>
							<th>@lang('fleet.vehicle')</th>
							<th>@lang('fleet.meter')</th>
							<th>@lang('fleet.consumption')</th>
							<th>@lang('fleet.cost')</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
@endif
@endsection

@section("script")
<!-- datatable Js -->
<script src="{{asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/pages/data-styling-custom.js')}}"></script>

<script type="text/javascript" src="{{ asset('assets/js/cdn/jszip.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/cdn/pdfmake.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/cdn/vfs_fonts.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/cdn/buttons.html5.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#vehicle_id").select2();
		$('#myTable tfoot th').each( function () {
	      var title = $(this).text();
	      $(this).html( '<input type="text" placeholder="'+title+'" />' );
	    });
	    var myTable = $('#myTable').DataTable( {
	        dom: 'Bfrtip',
	        buttons: [{
	             extend: 'collection',
	                text: 'Export',
	                buttons: [
	                    'copy',
	                    'excel',
	                    'csv',
	                    'pdf',
	                ]}
	        ],

	        "language": {
	                 "url": '{{ __("fleet.datatable_lang") }}',
	              },
	        "initComplete": function() {
	                myTable.columns().every(function () {
	                  var that = this;
	                  $('input', this.footer()).on('keyup change', function () {
	                      that.search(this.value).draw();
	                  });
	                });
	              }
	    });
	});
</script>
@endsection