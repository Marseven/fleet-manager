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
                    <li class="breadcrumb-item"><a href="{{ url('admin/')}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item active"><a href="#"> @lang('fleet.dashboard')</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->

@php($modules=unserialize(Auth::user()->getMeta('module')))
<div class="row">
  <div class="col-md-12">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">@lang('fleet.dashboard')</h3>
      </div>

      <div class="card-body">
        <div class="row">
          @if(in_array(0,$modules))
          <div class="col-sm-4">
            <div class="card bg-c-red text-white widget-visitor-card">
                <div class="card-body text-center">
                    <h2 class="text-white">{{$users}}</h2>
                    <h6 class="text-white">@lang('fleet.users')</h6>
                    <i class="feather icon-user"></i>
                </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="card bg-c-yellow text-white widget-visitor-card">
                <div class="card-body text-center">
                    <h2 class="text-white">{{$drivers}}</h2>
                    <h6 class="text-white">@lang('fleet.drivers')</h6>
                    <i class="feather icon-users"></i>
                </div>
            </div>
          </div>
          @endif
          @if(in_array(3,$modules))
          <div class="col-sm-4">
            <div class="card bg-c-green text-white widget-visitor-card">
                <div class="card-body text-center">
                    <h2 class="text-white">{{$bookings}}</h2>
                    <h6 class="text-white">@lang('fleet.bookings')</h6>
                    <i class="feather icon-book"></i>
                </div>
            </div>
          </div>
          @endif
          @if(in_array(1,$modules))
          <div class="col-sm-4">
            <div class="card bg-c-blue text-white widget-visitor-card">
                <div class="card-body text-center">
                    <h2 class="text-white">{{$vehicles}}</h2>
                    <h6 class="text-white">@lang('fleet.vehicles')</h6>
                    <i class="fa fa-car"></i>
                </div>
            </div>
          </div>
          @endif
          

          @if(in_array(0,$modules))
          <div class="col-sm-4">
            <div class="card bg-c-red text-white widget-visitor-card">
                <div class="card-body text-center">
                    <h2 class="text-white">{{$customers}}</h2>
                    <h6 class="text-white">@lang('fleet.customers')</h6>
                    <i class="feather icon-user-plus"></i>
                </div>
            </div>
          </div>
          @endif
          @if(Hyvikk::api('api') && Hyvikk::api('driver_review') == 1 && in_array(10,$modules))
          <div class="col-sm-4">
            <div class="card bg-c-yellow text-white widget-visitor-card">
                <div class="card-body text-center">
                    <h2 class="text-white">{{$reviews}}</h2>
                    <h6 class="text-white">@lang('fleet.reviews')</h6>
                    <i class="feather icon-star"></i>
                </div>
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
<!-- Apex Chart -->
<script src="{{asset('assets/js/plugins/apexcharts.min.js')}}"></script>
<!-- custom-chart js -->
<script src="{{asset('assets/js/pages/dashboard-main.js')}}"></script>
<script>
    $(document).ready(function() {
        checkCookie();
    });

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function checkCookie() {
        var ticks = getCookie("modelopen");
        if (ticks != "") {
            ticks++ ;
            setCookie("modelopen", ticks, 1);
            if (ticks == "2" || ticks == "1" || ticks == "0") {
                $('#exampleModalCenter').modal();
            }
        } else {
            // user = prompt("Please enter your name:", "");
            $('#exampleModalCenter').modal();
            ticks = 1;
            setCookie("modelopen", ticks, 1);
        }
    }
</script>
@endsection
