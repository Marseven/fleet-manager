@extends("layouts.app")
@section('extra_css')
<style type="text/css">
  .checkbox, #chk_all{
    width: 20px;
    height: 20px;
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
                    <h5 class="m-b-10">@lang('fleet.booking_quotes')</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/')}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item active"><a href="#"> @lang('fleet.fuel')</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->
<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">
          @lang('fleet.manageFuel')
          &nbsp;
          <a href="{{ route('fuel.create')}}" class="btn btn-success">@lang('fleet.addNew')</a>
        </h3>
      </div>

      <div class="card-body dt-responsive table-responsive">
        <table id="base-style" class="table table-striped table-bordered nowrap">
          <thead>
            <tr>
              <th>
                @if($data->count() > 0)
                <input type="checkbox" id="chk_all">
                @endif
              </th>
              <th></th>
              <th></th>
              <th>@lang('fleet.date')</th>
              <th>@lang('fleet.qty')</th>
              <th>@lang('fleet.cost')</th>
              <th>@lang('fleet.meter')</th>
              <th>@lang('fleet.consumption')</th>
              <th>@lang('fleet.province')</th>
              <th>@lang('fleet.action')</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $row)
            <tr>
              <td>
                <input type="checkbox" name="ids[]" value="{{ $row->id }}" class="checkbox" id="chk{{ $row->id }}" onclick='checkcheckbox();'>
              </td>
              <td>
                @if($row->vehicle_data['vehicle_image'] != null)
                  <img src="{{asset('uploads/'.$row->vehicle_data['vehicle_image'])}}" height="70px" width="70px">
                @else
                  <img src="{{ asset("assets/images/vehicle.jpeg")}}" height="70px" width="70px">
                @endif
              </td>
              <td>
                <a href="{{ url("admin/vehicles/".$row->vehicle_id."/edit")}}">
                {{$row->vehicle_data['year']}} {{$row->vehicle_data['make']}}-{{$row->vehicle_data['model']}}
                </a>
                <br>
                <b>@lang('fleet.vin'):</b> {{$row->vehicle_data['vin']}}
              </td>
              <td>{{$row->date}}</td>
              <td> {{$row->qty}} @lang('fleet.gal') </td>
              <td>
                @php ($total = $row->qty * $row->cost_per_unit)
                {{ Hyvikk::get('currency') }} {{$total}}
                <br>
                {{ Hyvikk::get('currency') }} {{$row->cost_per_unit}}/@lang('fleet.gallon')
              </td>
              <td>
                @lang('fleet.start'): {{$row->start_meter}} {{Hyvikk::get('dis_format')}}
                <br>
                @lang('fleet.end'): {{$row->end_meter}} {{Hyvikk::get('dis_format')}}
                <br>
                @lang('fleet.distence'):

                @if($row->end_meter == 0)
                0.00 {{Hyvikk::get('dis_format')}}
                @else
                {{$row->end_meter - $row->start_meter}}  {{Hyvikk::get('dis_format')}}
                @endif
              </td>
              <td>
                {{ $row->consumption }} @if(Hyvikk::get('dis_format') == "km") KMPG  @else MPG @endif
              </td>
              <td>
                {{$row->province}}
              </td>
              <td>
              <div class="btn-group">
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                  <span class="fa fa-gear"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu custom" role="menu">
                  <a class="dropdown-item" href="{{ url("admin/fuel/".$row->id."/edit")}}"> <span aria-hidden="true" class="fa fa-edit" style="color: #f0ad4e;"></span> @lang('fleet.edit')</a>
                  <a class="dropdown-item" data-id="{{$row->id}}" data-toggle="modal" data-target="#myModal"><span aria-hidden="true" class="fa fa-trash" style="color: #dd4b39"></span> @lang('fleet.delete')</a>
                </div>
              </div>
              {!! Form::open(['url' => 'admin/fuel/'.$row->id,'method'=>'DELETE','class'=>'form-horizontal','id'=>'form_'.$row->id]) !!}
              {!! Form::hidden("id",$row->id) !!}
              {!! Form::close() !!}
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>
              @if($data->count() > 0)
                <button class="btn btn-danger" id="bulk_delete" data-toggle="modal" data-target="#bulkModal" disabled>@lang('fleet.delete')</button>
              @endif
              </th>
              <th></th>
              <th></th>
              <th>@lang('fleet.date')</th>
              <th>@lang('fleet.qty')</th>
              <th>@lang('fleet.cost')</th>
              <th>@lang('fleet.meter')</th>
              <th>@lang('fleet.consumption')</th>
              <th>@lang('fleet.province')</th>
              <th>@lang('fleet.action')</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="bulkModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">@lang('fleet.delete')</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        {!! Form::open(['url'=>'admin/delete-fuel','method'=>'POST','id'=>'form_delete']) !!}
        <div id="bulk_hidden"></div>
        <p>@lang('fleet.confirm_bulk_delete')</p>
      </div>
      <div class="modal-footer">
        <button id="bulk_action" class="btn btn-danger" type="submit" data-submit="">@lang('fleet.delete')</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('fleet.close')</button>
      </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>
<!-- Modal -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">@lang('fleet.delete')</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>@lang('fleet.confirm_delete')</p>
      </div>
      <div class="modal-footer">
        <button id="del_btn" class="btn btn-danger" type="button" data-submit="">@lang('fleet.delete')</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('fleet.close')</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
@endsection

@section('script')
<!-- datatable Js -->
<script src="{{asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/pages/data-styling-custom.js')}}"></script>

<script type="text/javascript">
  $("#del_btn").on("click",function(){
    var id=$(this).data("submit");
    $("#form_"+id).submit();
  });

  $('#myModal').on('show.bs.modal', function(e) {
    var id = e.relatedTarget.dataset.id;
    $("#del_btn").attr("data-submit",id);
  });

  $('input[type="checkbox"]').on('click',function(){
    $('#bulk_delete').removeAttr('disabled');
  });

  $('#bulk_delete').on('click',function(){
    // console.log($( "input[name='ids[]']:checked" ).length);
    if($( "input[name='ids[]']:checked" ).length == 0){
      $('#bulk_delete').prop('type','button');
        new PNotify({
            title: 'Failed!',
            text: "@lang('fleet.delete_error')",
            type: 'error'
          });
        $('#bulk_delete').attr('disabled',true);
    }
    if($("input[name='ids[]']:checked").length > 0){
      // var favorite = [];
      $.each($("input[name='ids[]']:checked"), function(){
          // favorite.push($(this).val());
          $("#bulk_hidden").append('<input type=hidden name=ids[] value='+$(this).val()+'>');
      });
      // console.log(favorite);
    }
  });


  $('#chk_all').on('click',function(){
    if(this.checked){
      $('.checkbox').each(function(){
        $('.checkbox').prop("checked",true);
      });
    }else{
      $('.checkbox').each(function(){
        $('.checkbox').prop("checked",false);
      });
    }
  });

  // Checkbox checked
  function checkcheckbox(){
    // Total checkboxes
    var length = $('.checkbox').length;
    // Total checked checkboxes
    var totalchecked = 0;
    $('.checkbox').each(function(){
        if($(this).is(':checked')){
            totalchecked+=1;
        }
    });
    // console.log(length+" "+totalchecked);
    // Checked unchecked checkbox
    if(totalchecked == length){
        $("#chk_all").prop('checked', true);
    }else{
        $('#chk_all').prop('checked', false);
    }
  }
</script>
@endsection