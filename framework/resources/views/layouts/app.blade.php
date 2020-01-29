<!DOCTYPE html>
<html lang="fr">

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ Hyvikk::get('app_name') }}</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js does not work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Car Fleet Manager" />
    <meta name="keywords" content="car, fleet, manager">
    <meta name="author" content="Mebodo Richard" />
    
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets/images/ico.png')}}" type="image/png">
  
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    
    @yield("extra_css")

</head>
<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
  <!-- [ Pre-loader ] End -->
  {!! Form::hidden('loggedinuser',Auth::user()->id,['id'=>'loggedinuser']) !!}
  {!! Form::hidden('user_type',Auth::user()->user_type,['id'=>'user_type']) !!}
	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar menu-light ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header">
            @if(Auth::user()->user_type == 'D' && Auth::user()->getMeta('driver_image') != null)
              @if(starts_with(Auth::user()->getMeta('driver_image'),'http'))
              @php($src = Auth::user()->getMeta('driver_image'))
              @else
              @php($src=asset('uploads/'.Auth::user()->getMeta('driver_image')))
              @endif
              <img src="{{$src}}" class="img-radius" alt="User Image">
              @elseif(Auth::user()->user_type == 'S' || Auth::user()->user_type == 'O')
              @if(Auth::user()->getMeta('profile_image') == null)
              <img src="{{ asset("assets/images/no-user.jpg")}}" class="img-radius" alt="User Image">
              @else
              <img src="{{asset('uploads/'.Auth::user()->getMeta('profile_image'))}}" class="img-radius" alt="User Image">
              @endif
              @elseif(Auth::user()->user_type == 'C' && Auth::user()->getMeta('profile_pic') != null)
              @if(starts_with(Auth::user()->getMeta('profile_pic'),'http'))
              @php($src = Auth::user()->getMeta('profile_pic'))
              @else
              @php($src=asset('uploads/'.Auth::user()->getMeta('profile_pic')))
              @endif
              <img src="{{$src}}" class="img-radius" alt="User Image">
              @else
              <img src="{{ asset("assets/images/no-user.jpg")}}" class="img-radius" alt="User Image">
            @endif
						<div class="user-details">
              <div id="more-details">{{Auth::user()->name}} <i class="fa fa-caret-down"></i></div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-inline">
							<li class="list-inline-item"><a href="{{ url('admin/change-details/'.Auth::user()->id)}}" data-toggle="tooltip" title="View Profile"><i class="feather icon-user"></i></a></li>
						</ul>
					</div>
				</div>
				
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
						<label>Navigation</label>
					</li>
					@if(Auth::user()->user_type=="C")

            @if(Request::is('admin/bookings*'))
            @php($class="menu-open")
            @php($active="active")
            @else
            @php($class="")
            @php($active="")
            @endif
          <li class="nav-item pcoded-hasmenu {{$class}}">
            <a href="#" class="nav-link {{$active}}"><span class="pcoded-micon"><i class="feather icon-check"></i></span><span class="pcoded-mtext">@lang('menu.bookings')</span></a>
            <ul class="pcoded-submenu">
              <li class="nav-item">
                <a href="{{ route('bookings.create')}}" class="nav-link  @if(Request::is('admin/bookings/create')) active @endif"><span class="pcoded-mtext">@lang('menu.newbooking')</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('bookings.index')}}" class="nav-link  @if((Request::is('admin/bookings*')) && !(Request::is('admin/bookings/create')) && !(Request::is('admin/bookings_calendar'))) active @endif"><span class="pcoded-mtext">@lang('menu.manage_bookings')</span></a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/change-details/'.Auth::user()->id)}}" class="nav-link  @if(Request::is('admin/change-details*')) active @endif"><span class="pcoded-mtext">@lang('fleet.editProfile')</span></a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/addresses') }}" class="nav-link  @if(Request::is('admin/addresses*')) active @endif"><span class="pcoded-mtext">@lang('fleet.addresses')</span></a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/') }}" class="nav-link  @if(Request::is('admin/')) active @endif"><span class="pcoded-mtext">@lang('fleet.expenses')</span></a>
          </li>
          @endif
          <!-- customer -->
          <!-- user-type S or O -->
          @if(Auth::user()->user_type=="S" || Auth::user()->user_type=="O")
          <li class="nav-item">
            <a href="{{ url('admin/')}}" class="nav-link @if(Request::is('admin')) active @endif"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">@lang('menu.Dashboard')</span></a>
          </li>
          @endif
          <!-- user-type S or O -->

          <!-- driver -->
          @if(Auth::user()->user_type=="D")

          <li class="nav-item">
            <a href="{{ url('admin/')}}" class="nav-link @if(Request::is('admin')) active @endif"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">@lang('fleet.myProfile')</span></a>
          </li>
          <li class="nav-item">
            <a href="{{ route('my_bookings')}}" class="nav-link @if(Request::is('admin/my_bookings')) active @endif"><span class="pcoded-micon"><i class="feather icon-check"></i></span><span class="pcoded-mtext">@lang('menu.my_bookings')</span></a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/change-details/'.Auth::user()->id)}}" class="nav-link @if(Request::is('admin/change-details*')) active @endif"><span class="pcoded-micon"><i class="feather icon-edit"></i></span><span class="pcoded-mtext">@lang('fleet.editProfile')</span></a>
          </li>
            @if(Request::is('admin/notes*'))
            @php($class="menu-open")
            @php($active="active")

            @else
            @php($class="")
            @php($active="")
            @endif
          <li class="nav-item pcoded-hasmenu {{$class}}">
            <a href="#" class="nav-link {{$active}}"><span class="pcoded-micon"><i class="feather icon-file-minus"></i></span><span class="pcoded-mtext">@lang('fleet.notes')</span></a>
            <ul class="nav pcoded-submenu">
              <li class="nav-item">
                <a href="{{ route('notes.index') }}" class="nav-link  @if((Request::is('admin/notes*') && !(Request::is('admin/notes/create')))) active @endif"><span class="pcoded-mtext">@lang('fleet.manage_note')</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('notes.create') }}" class="nav-link  @if(Request::is('admin/notes/create')) active @endif"><span class="pcoded-mtext">@lang('fleet.create_note')</span></a>
              </li>
            </ul>
          </li>
            @if(Request::is('admin/driver-reports*'))
            @php($class="menu-open")
            @php($active="active")

            @else
            @php($class="")
            @php($active="")
            @endif
          <li class="nav-item pcoded-hasmenu {{$class}}">
            <a href="#" class="nav-link {{$active}}"><span class="pcoded-micon"><i class="feather icon-bar-chart-2"></i></span><span class="pcoded-mtext">@lang('menu.reports')</span></a>
            <ul class="nav pcoded-submenu">
              <li class="nav-item">
                <a href="{{ route('dreports.monthly')}}" class="nav-link  @if(Request::is('admin/driver-reports/monthly')) active @endif"><span class="pcoded-mtext">@lang('menu.monthlyReport')</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dreports.yearly')}}" class="nav-link  @if(Request::is('admin/driver-reports/yearly')) active @endif"><span class="pcoded-mtext">@lang('fleet.yearlyReport')</span></a>
              </li>
            </ul>
          </li>
          @endif
          <!-- driver -->

          <!-- sidebar menus for office-admin and super-admin -->
        @if(Auth::user()->user_type == "S" || Auth::user()->user_type == "O")
        @php($modules=unserialize(Auth::user()->getMeta('module'))) <!--array of selected modules of logged in user-->
        @else
        @php($modules=array())
        @endif

        @if (!Auth::guest() &&  Auth::user()->user_type!="D" && Auth::user()->user_type != "C" )

            @if((Request::is('admin/drivers*')) || (Request::is('admin/users*')) || (Request::is('admin/customers*')) )
            @php($class="menu-open")
            @php($active="active")

            @else
            @php($class="")
            @php($active="")
            @endif
          @if(in_array(0,$modules)) <li class="nav-item pcoded-hasmenu {{$class}}">
            <a href="#" class="nav-link {{$active}}"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">@lang('menu.users')</span></a>
            <ul class="nav pcoded-submenu">
              <li class="nav-item">
                <a href="{{ route('drivers.index')}}" class="nav-link   @if(Request::is('admin/drivers*')) active @endif"><span class="pcoded-mtext">@lang('menu.drivers')</span></a>
              </li>
              @if(Auth::user()->user_type=="S")
              <li class="nav-item">
                <a href="{{ route('users.index')}}" class="nav-link  @if(Request::is('admin/users*')) active @endif"><span class="pcoded-mtext">@lang('fleet.users')</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('customers.index')}}" class="nav-link  @if(Request::is('admin/ustomers*')) active @endif"><span class="pcoded-mtext">@lang('fleet.customers')</span></a>
              </li>
              @endif
            </ul>
          </li> @endif

            @if((Request::is('admin/driver-logs')) || (Request::is('admin/vehicle-types*')) || (Request::is('admin/vehicles*')) || (Request::is('admin/vehicle_group*')) || (Request::is('admin/vehicle-reviews*')) || (Request::is('admin/view-vehicle-review*')) || (Request::is('admin/vehicle-review*')))
            @php($class="menu-open")
            @php($active="active")

            @else
            @php($class="")
            @php($active="")
            @endif
          @if(in_array(1,$modules)) <li class="nav-item pcoded-hasmenu {{$class}}">
            <a href="#" class="nav-link {{$active}}"><span class="pcoded-micon"><i class="fa fa-car"></i></span><span class="pcoded-mtext">@lang('menu.vehicles')</span></a>
            <ul class="nav pcoded-submenu">
              <li class="nav-item">
                <a href="{{ route('vehicles.index')}}" class="nav-link  @if(Request::is('admin/vehicles*')) active @endif"><span class="pcoded-mtext">@lang('menu.manageVehicles')</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('vehicle-types.index')}}" class="nav-link  @if(Request::is('admin/vehicle-types*')) active @endif"><span class="pcoded-mtext">@lang('fleet.manage_vehicle_types')</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/driver-logs')}}" class="nav-link  @if(Request::is('admin/driver-logs*')) active @endif"><span class="pcoded-mtext">@lang('fleet.driver_logs')</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('vehicle_group.index')}}" class="nav-link  @if(Request::is('admin/vehicle_group*')) active @endif"><span class="pcoded-mtext">@lang('fleet.manageGroup')</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/vehicle-reviews')}}" class="nav-link  @if(Request::is('admin/vehicle-reviews*')) || (Request::is('admin/view-vehicle-review*')) || (Request::is('admin/vehicle-review*'))) active @endif"><span class="pcoded-mtext">@lang('fleet.vehicle_inspection')</span></a>
              </li>
            </ul>
          </li> @endif

            @if((Request::is('admin/bookings*'))  || (Request::is('admin/bookings_calendar')) || (Request::is('admin/booking-quotation*')))
            @php($class="menu-open")
            @php($active="active")

            @else
            @php($class="")
            @php($active="")

            @endif
          @if(in_array(3,$modules)) <li class="nav-item pcoded-hasmenu {{$class}}">
            <a href="#" class="nav-link {{$active}}"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">@lang('menu.bookings')</span></a>
            <ul class="nav pcoded-submenu">
              <li class="nav-item">
                <a href="{{ route('bookings.create')}}" class="nav-link  @if(Request::is('admin/bookings/create')) active @endif"><span class="pcoded-mtext">@lang('menu.newbooking')</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('bookings.index')}}" class="nav-link  @if(Request::is('admin/bookings*')) active @endif"><span class="pcoded-mtext">@lang('menu.manage_bookings')</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('booking-quotation.index')}}" class="nav-link  @if(Request::is('admin/booking-quotation*')) active @endif"><span class="pcoded-mtext">@lang('fleet.booking_quotes')</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('bookings.calendar')}}" class="nav-link  @if(Request::is('admin/bookings_calendar')) active @endif"><span class="pcoded-mtext">@lang('menu.calendar')</span></a>
              </li>
            </ul>
          </li> @endif

            @if(Request::is('admin/reports*'))
            @php($class="menu-open")
            @php($active="active")

            @else
            @php($class="")
            @php($active="")
            @endif
          @if(in_array(4,$modules)) <li class="nav-item pcoded-hasmenu {{$class}}">
            <a href="#" class="nav-link {{$active}}"><span class="pcoded-micon"><i class="feather icon-trending-up"></i></span><span class="pcoded-mtext">@lang('menu.reports')</span></a>
            <ul class="nav pcoded-submenu">
              @if(in_array(3,$modules))
              <li class="nav-item">
                <a href="{{ route('reports.booking') }}" class="nav-link  @if(Request::is('admin/reports/booking')) active @endif"><span class="pcoded-mtext">@lang('menu.bookingReport')</span></a>
              </li>
              @endif
              @if(in_array(0,$modules))
              <li class="nav-item">
                <a href="{{ route('reports.users') }}" class="nav-link  @if(Request::is('admin/reports/users')) active @endif"><span class="pcoded-mtext">@lang('fleet.user_report')</span></a>
              </li>
              @endif
              @if(in_array(5,$modules))
              <li class="nav-item">
                <a href="{{ route('reports.fuel') }}" class="nav-link  @if(Request::is('admin/reports/fuel')) active @endif"><span class="pcoded-mtext">@lang('fleet.fuelReport')</span></a>
              </li>
              @endif
            </ul>
          </li> @endif

            @if(Request::is('admin/fuel*'))
            @php($class="menu-open")
            @php($active="active")

            @else
            @php($class="")
            @php($active="")
            @endif
          @if(in_array(5,$modules)) <li class="nav-item pcoded-hasmenu {{$class}}">
            <a href="#" class="nav-link {{$active}}"><span class="pcoded-micon"><i class="feather icon-droplet"></i></span><span class="pcoded-mtext">@lang('fleet.fuel')</span></a>
            <ul class="nav pcoded-submenu">
              <li class="nav-item">
                <a href="{{ route('fuel.create') }}" class="nav-link  @if(Request::is('admin/fuel/create')) active @endif"><span class="pcoded-mtext">@lang('fleet.add_fuel')</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('fuel.index') }}" class="nav-link  @if(Request::is('admin/fuel')) active @endif"><span class="pcoded-mtext">@lang('fleet.manage_fuel')</span></a>
              </li>
            </ul>
          </li> @endif


            @if(Request::is('admin/parts*') && !Request::is('admin/parts-used*'))
            @php($class="menu-open")
            @php($active="active")

            @else
            @php($class="")
            @php($active="")
            @endif
           @if(in_array(14,$modules))<li class="nav-item pcoded-hasmenu {{$class}}">
            <a href="#" class="nav-link {{$active}}"><span class="pcoded-micon"><i class="feather icon-cpu"></i></span><span class="pcoded-mtext">@lang('fleet.parts')</span></a>
            <ul class="nav pcoded-submenu">
              <li class="nav-item">
                <a href="{{ route('parts.create') }}" class="nav-link @if(Request::is('admin/parts/create')) active @endif"><span class="pcoded-mtext">@lang('fleet.addParts')</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('parts.index') }}" class="nav-link  @if(Request::is('admin/parts')) active @endif"><span class="pcoded-mtext">@lang('menu.manageParts')</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('parts-category.index') }}" class="nav-link @if(Request::is('admin/parts-category*')) active @endif"><span class="pcoded-mtext">@lang('fleet.partsCategory')</span></a>
              </li>
            </ul>
          </li>@endif

            @if(Request::is('admin/work_order*') || Request::is('admin/parts-used*'))
            @php($class="menu-open")
            @php($active="active")

            @else
            @php($class="")
            @php($active="")
            @endif
          @if(in_array(7,$modules)) <li class="nav-item pcoded-hasmenu {{$class}}">
            <a href="#" class="nav-link {{$active}}"><span class="pcoded-micon"><i class="feather icon-file"></i></span><span class="pcoded-mtext">@lang('fleet.work_orders')</span></a>
            <ul class="nav pcoded-submenu">
              <li class="nav-item">
                <a href="{{ route('work_order.create') }}" class="nav-link  @if(Request::is('admin/work_order/create')) active @endif"><span class="pcoded-mtext">@lang('fleet.add_order')</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('work_order.index') }}" class="nav-link  @if((Request::is('admin/work_order*')) && !(Request::is('admin/work_order/create')) && !(Request::is('admin/work_order/logs')) || Request::is('admin/parts-used*')) active @endif"><span class="pcoded-mtext">@lang('fleet.manage_work_order')</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/work_order/logs') }}" class="nav-link  @if(Request::is('admin/work_order/logs')) active @endif"><span class="pcoded-mtext">@lang('fleet.work_order_logs')</span></a>
              </li>
            </ul>
          </li> @endif

            @if(Request::is('admin/notes*'))
            @php($class="menu-open")
            @php($active="active")

            @else
            @php($class="")
            @php($active="")
            @endif
          @if(in_array(8,$modules)) <li class="nav-item pcoded-hasmenu {{$class}}">
            <a href="#" class="nav-link {{$active}}"><span class="pcoded-micon"><i class="feather icon-book"></i></span><span class="pcoded-mtext">@lang('fleet.notes')</span></a>
            <ul class="nav pcoded-submenu">
              <li class="nav-item">
                <a href="{{ route('notes.index') }}" class="nav-link  @if((Request::is('admin/notes*') && !(Request::is('admin/notes/create')))) active @endif"><span class="pcoded-mtext">@lang('menu.notes')</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('notes.create') }}" class="nav-link  @if(Request::is('admin/notes/create')) active @endif"><span class="pcoded-mtext">@lang('fleet.create_note')</span></a>
              </li>
            </ul>
          </li> @endif

            @if((Request::is('admin/service-reminder*')) || (Request::is('admin/service-item*')))
            @php($class="menu-open")
            @php($active="active")

            @else
            @php($class="")
            @php($active="")
            @endif
          @if(in_array(9,$modules)) <li class="nav-item pcoded-hasmenu {{$class}}">
            <a href="#" class="nav-link {{$active}}"><span class="pcoded-micon"><i class="feather icon-rotate-ccw"></i></span><span class="pcoded-mtext">@lang('fleet.serviceReminders')</span></a>
            <ul class="nav pcoded-submenu">
              <li class="nav-item">
                <a href="{{ route('service-reminder.index') }}" class="nav-link  @if(Request::is('admin/service-reminder')) active @endif"><span class="pcoded-mtext">@lang('fleet.manage_reminder')</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('service-reminder.create')}}" class="nav-link  @if(Request::is('admin/service-reminder/create')) active @endif"><span class="pcoded-mtext">@lang('fleet.add_service_reminder')</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('service-item.index') }}" class="nav-link  @if(Request::is('admin/service-item*')) active @endif"><span class="pcoded-mtext">@lang('fleet.service_item')</span></a>
              </li>
            </ul>
          </li> @endif

          @endif <!-- for user-type O or S -->
          @if(Auth::user()->user_type=="S")
            @if(Request::is('admin/team*'))
            @php($class="menu-open")
            @php($active="active")

            @else
            @php($class="")
            @php($active="")
            @endif
          <li class="nav-item pcoded-hasmenu {{$class}}">
            <a href="#" class="nav-link {{$active}}"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">@lang('fleet.team')</span></a>
            <ul class="nav pcoded-submenu">
              <li class="nav-item">
                <a href="{{ route('team.index') }}" class="nav-link  @if((Request::is('admin/team*') && !(Request::is('admin/team/create')))) active @endif"><span class="pcoded-mtext">@lang('fleet.manage_team')</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('team.create') }}" class="nav-link  @if(Request::is('admin/team/create')) active @endif"><span class="pcoded-mtext">@lang('fleet.addMember')</span></a>
              </li>
            </ul>
          </li>
            @if(Request::is('admin/settings*') || Request::is('admin/fare-settings') || Request::is('admin/api-settings') || (Request::is('admin/expensecategories*')) || (Request::is('admin/incomecategories*')) || (Request::is('admin/expensecategories*')) || (Request::is('admin/send-email')) || (Request::is('admin/set-email')) || (Request::is('admin/cancel-reason*')) || (Request::is('admin/frontend-settings*')) || (Request::is('admin/company-services*')))
            @php($class="menu-open")
            @php($active="active")

            @else
            @php($class="")
            @php($active="")
            @endif
          <li class="nav-item pcoded-hasmenu {{$class}}">
            <a href="#" class="nav-link {{$active}}"><span class="pcoded-micon"><i class="feather icon-settings"></i></span><span class="pcoded-mtext">@lang('menu.settings')</span></a>
            <ul class="nav pcoded-submenu">
              <li class="nav-item">
                <a href="{{ route('settings.index') }}" class="nav-link  @if(Request::is('admin/settings')) active @endif"><span class="pcoded-mtext">@lang('menu.general_settings')</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/api-settings')}}" class="nav-link  @if(Request::is('admin/api-settings')) active @endif"><span class="pcoded-mtext">@lang('menu.api_settings')</span></a>
              </li>
              <li class="nav-item">
                <a href="{{  route('cancel-reason.index') }}" class="nav-link  @if(Request::is('admin/cancel-reason*')) active @endif"><span class="pcoded-mtext">@lang('fleet.cancellation')</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/send-email')}}" class="nav-link  @if(Request::is('admin/send-email')) active @endif"><span class="pcoded-mtext">@lang('menu.email_notification')</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/set-email')}}" class="nav-link  @if(Request::is('admin/set-email')) active @endif"><span class="pcoded-mtext">@lang('menu.email_content')</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('expensecategories.index') }}" class="nav-link  @if(Request::is('admin/expensecategories*')) active @endif"><span class="pcoded-mtext">@lang('menu.expenseCategories')</span></a>
              </li>
            </ul>
          </li>

          @if(in_array(12,$modules) && Hyvikk::api('api_key') != null) <li class="nav-item">
            <a href="{{ url('admin/driver-maps')}}" class="nav-link @if(Request::is('admin/driver-maps') || Request::is('admin/track-driver*')) active @endif"><span class="pcoded-micon"><i class="feather icon-map"></i></span><span class="pcoded-mtext">@lang('fleet.maps')</span></a>
          </li> @endif
          @endif <!-- super-admin -->

          @if(Hyvikk::api('api') && Hyvikk::api('driver_review') == 1 && in_array(10,$modules)) <li class="nav-item">
            <a href="{{ url('admin/reviews')}}" class="nav-link @if(Request::is('admin/reviews')) active @endif"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">@lang('fleet.reviews')</span></a>
          </li> @endif

          @if(in_array(13,$modules)) <li class="nav-item">
            <a href="#" target="_blank" class="nav-link"><span class="pcoded-micon"><i class="feather icon-help-circle"></i></span><span class="pcoded-mtext">@lang('fleet.helpus')</span></a>
          </li> @endif
				</ul>
				
				<div class="card text-center">
					<div class="card-block">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<i class="feather icon-sunset f-40"></i>
						<h6 class="mt-3"> Support ? </h6>
						<p>Contacter le support</p>
						<a href="#" target="_blank" class="btn btn-primary btn-sm text-white m-0">Appeler</a>
					</div>
				</div>
				
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
		
			
				<div class="m-header">
					<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
          <a href="{{ url('admin/')}}" class="b-brand">
            <img src="{{ asset('assets/images/logo.png')}}" alt="Fleet Logo" class="logo"
                 style="opacity: .8">
            <img src="{{ asset('assets/images/logo.png')}}" alt="Fleet Logo" class="logo-thumb"
            style="opacity: .8">
          </a>
					<a href="#!" class="mob-toggler">
						<i class="feather icon-more-vertical"></i>
					</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
							<div class="search-bar">
								<input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
								<button type="button" class="close" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						</li>
					</ul>
					<ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            @if(Auth::user()->user_type=="S")
              @php($r = 0)
              @php($i = 0)
              @php($l = 0)
              @php($d = 0)
              @php($s = 0)
              @php($user= Auth::user())
              @foreach ($user->unreadNotifications as $notification)
                @if($notification->type == "App\Notifications\RenewRegistration")
                @php($r++)
                @elseif($notification->type == "App\Notifications\RenewInsurance")
                @php($i++)
                @elseif($notification->type == "App\Notifications\RenewVehicleLicence")
                @php($l++)
                @elseif($notification->type == "App\Notifications\RenewDriverLicence")
                @php($d++)
                @elseif($notification->type == "App\Notifications\ServiceReminderNotification")
                @php($s++)
                @endif
              @endforeach
              @php($n = $r + $i +$l + $d + $s)
            @endif

						<li>
							<div class="dropdown">
								<a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i><span class="badge badge-warning navbar-badge">@if($n>0) {{$n}} @endif</span></a>
								<div class="dropdown-menu dropdown-menu-right notification">
									<div class="noti-head">
										<h6 class="d-inline-block m-b-0">Notifications</h6>
										<div class="float-right">
											<a href="#" class="m-r-10">Lu</a>
											<a href="#">Effacer</a>
										</div>
									</div>
									<ul class="noti-body">
										<li class="notification">
                      <a href="{{url('admin/vehicle_notification',['type'=>'renew-registrations'])}}" class="dropdown-item">
                        <i class="fa fa-id-card-o mr-2"></i> @lang('fleet.renew_registration')
                        <span class="float-right text-muted text-sm">@if($r>0) {{$r}} @endif</span>
                      </a>
                    </li>
                    <li class="notification">
                      <a href="{{url('admin/vehicle_notification',['type'=>'renew-insurance'])}}" class="dropdown-item">
                        <i class="fa fa-file-text mr-2"></i> @lang('fleet.renew_insurance')
                        <span class="float-right text-muted text-sm">@if($i>0) {{$i}} @endif</span>
                      </a>
                    </li>   
                    <li class="notification">
                      <a href="{{url('admin/vehicle_notification',['type'=>'renew-licence'])}}" class="dropdown-item">
                        <i class="fa fa-file-o mr-2"></i> @lang('fleet.renew_licence')
                        <span class="float-right text-muted text-sm">@if($l>0) {{$l}} @endif</span>
                      </a>
                    </li> 
                    <li class="notification">
                      <a href="{{url('admin/driver_notification',['type'=>'renew-driving-licence'])}}" class="dropdown-item">
                        <i class="fa fa-file-text-o mr-2"></i> @lang('fleet.renew_driving_licence')
                        <span class="float-right text-muted text-sm">@if($d>0) {{$d}} @endif</span>
                      </a>
                    </li>                        
                    <li class="notification">
                      <a href="{{url('admin/reminder',['type'=>'service-reminder'])}}" class="dropdown-item">
                        <i class="fa fa-clock-o mr-2"></i> @lang('fleet.serviceReminders')
                        <span class="float-right text-muted text-sm">@if($s>0) {{$s}} @endif</span>
                      </a>
                    </li>
									</ul>
								</div>
							</div>
						</li>
						<li>
							<div class="dropdown drp-user">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="feather icon-user"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right profile-notification">
									<div class="pro-head">
                    @if(Auth::user()->user_type == 'D' && Auth::user()->getMeta('driver_image') != null)
                      @if(starts_with(Auth::user()->getMeta('driver_image'),'http'))
                        @php($src = Auth::user()->getMeta('driver_image'))
                        @else
                        @php($src=asset('uploads/'.Auth::user()->getMeta('driver_image')))
                        @endif
                        <img src="{{$src}}" class="img-radius" alt="User Image">
                        @elseif(Auth::user()->user_type == 'S' || Auth::user()->user_type == 'O')
                          @if(Auth::user()->getMeta('profile_image') == null)
                          <img src="{{ asset('assets/images/no-user.jpg')}}" class="img-radius" alt="User Image">
                          @else
                          <img src="{{asset('uploads/'.Auth::user()->getMeta('profile_image'))}}" class="img-radius" alt="User Image">
                          @endif
                        @elseif(Auth::user()->user_type == 'C' && Auth::user()->getMeta('profile_pic') != null)
                        @if(starts_with(Auth::user()->getMeta('profile_pic'),'http'))
                        @php($src = Auth::user()->getMeta('profile_pic'))
                        @else
                        @php($src=asset('uploads/'.Auth::user()->getMeta('profile_pic')))
                        @endif
                        <img src="{{$src}}" class="img-radius" alt="User Image">
                        @else
                        <img src="{{ asset('assets/images/no-user.jpg')}}" class="img-radius" alt="User Image">
                    @endif
										<span>{{Auth::user()->name}}</span>
										<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dud-logout" title="Logout">
											<i class="feather icon-log-out"></i>
                    </a>
									</div>
									<ul class="pro-body">
                    <li><a href="{{ url('admin/change-details/'.Auth::user()->id)}}" class="dropdown-item"><i class="feather icon-user"></i> @lang('fleet.editProfile')</a></li>
                  </ul>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form
								</div>
							</div>
						</li>
					</ul>
				</div>
				
			
	</header>
	<!-- [ Header ] end -->
	
	

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        
      @yield('content')      

    </div>
</div>
<!-- Button trigger modal -->

    
<!-- Required Js -->
<script src="{{asset('assets/js/vendor-all.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/ripple.js')}}"></script>
<script src="{{asset('assets/js/pcoded.min.js')}}"></script>
<script src="{{asset('assets/js/menu-setting.min.js')}}"></script>


@yield('script')
</body>
</html>