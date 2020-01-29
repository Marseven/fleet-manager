@extends('layouts.app')
@section("extra_css")
<link rel="stylesheet" href="{{ asset('assets/css/plugins/fullcalendar.min.css') }}">
<style type="text/css">
  .modal-body{
    height: 400px;
    overflow-y: auto;
}
</style>
@endsection
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route("bookings.index")}}">@lang('menu.bookings')</a></li>
<li class="breadcrumb-item active">@lang('menu.calendar')</li>
@endsection
@section('content')
<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">@lang('menu.calendar')</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/')}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('bookings.index')}}"><i class="feather icon-list"></i></a></li>
                    <li class="breadcrumb-item active"><a href="#">@lang('menu.calendar')</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->
<div class="row">
  <div class="col-md-12">
    <div class="card  fullcalendar-card">
      <div class="card-header">
        <h3 class="card-title">@lang('menu.calendar')</h3>
      </div>
      <div class="card-body">
        <div id='calendar' class='calendar'></div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="booking_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">@lang('fleet.event_details')</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('fleet.close')</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="my_event" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel1">@lang('fleet.my_events')</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('fleet.close')</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section("script")

<!-- Full calendar js -->
<script src="{{asset('assets/js/plugins/moment.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/fullcalendar.min.js')}}"></script>
<script type="text/javascript">
    // Full calendar
    $(window).on('load', function() {
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listWeek'
          },
    
          defaultDate: '{{date("Y-m-d")}}',
          navLinks: true, // can click day/week names to navigate views
          editable: false,
          events: "{{ url('admin/calendar')}}",
          eventLimit: true,
          eventClick: function(calEvent, jsEvent, view) {
             $.ajax({
    
                url: '{{url("/admin/calendar/event/")}}/'+calEvent.type+'/'+calEvent.id,
    
              })
              .then(function(content){
                $("#booking_detail .modal-body").empty();
                $("#booking_detail .modal-body").html(content);
                $("#booking_detail").modal("show");
    
              },
              function(xhr, status, error) {
    
                api.set('content.text', status + ': ' + error);
              });
            }
        });
    });
</script>

@endsection