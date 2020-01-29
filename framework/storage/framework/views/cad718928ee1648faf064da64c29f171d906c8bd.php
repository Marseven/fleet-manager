<!DOCTYPE html>
<html lang="fr">

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(Hyvikk::get('app_name')); ?></title>
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
    <link rel="icon" href="<?php echo e(asset('assets/images/ico.png')); ?>" type="image/png">
  
    <!-- vendor css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    
    <?php echo $__env->yieldContent("extra_css"); ?>

</head>
<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
  <!-- [ Pre-loader ] End -->
  <?php echo Form::hidden('loggedinuser',Auth::user()->id,['id'=>'loggedinuser']); ?>

  <?php echo Form::hidden('user_type',Auth::user()->user_type,['id'=>'user_type']); ?>

	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar menu-light ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header">
            <?php if(Auth::user()->user_type == 'D' && Auth::user()->getMeta('driver_image') != null): ?>
              <?php if(starts_with(Auth::user()->getMeta('driver_image'),'http')): ?>
              <?php ($src = Auth::user()->getMeta('driver_image')); ?>
              <?php else: ?>
              <?php ($src=asset('uploads/'.Auth::user()->getMeta('driver_image'))); ?>
              <?php endif; ?>
              <img src="<?php echo e($src); ?>" class="img-radius" alt="User Image">
              <?php elseif(Auth::user()->user_type == 'S' || Auth::user()->user_type == 'O'): ?>
              <?php if(Auth::user()->getMeta('profile_image') == null): ?>
              <img src="<?php echo e(asset("assets/images/no-user.jpg")); ?>" class="img-radius" alt="User Image">
              <?php else: ?>
              <img src="<?php echo e(asset('uploads/'.Auth::user()->getMeta('profile_image'))); ?>" class="img-radius" alt="User Image">
              <?php endif; ?>
              <?php elseif(Auth::user()->user_type == 'C' && Auth::user()->getMeta('profile_pic') != null): ?>
              <?php if(starts_with(Auth::user()->getMeta('profile_pic'),'http')): ?>
              <?php ($src = Auth::user()->getMeta('profile_pic')); ?>
              <?php else: ?>
              <?php ($src=asset('uploads/'.Auth::user()->getMeta('profile_pic'))); ?>
              <?php endif; ?>
              <img src="<?php echo e($src); ?>" class="img-radius" alt="User Image">
              <?php else: ?>
              <img src="<?php echo e(asset("assets/images/no-user.jpg")); ?>" class="img-radius" alt="User Image">
            <?php endif; ?>
						<div class="user-details">
              <div id="more-details"><?php echo e(Auth::user()->name); ?> <i class="fa fa-caret-down"></i></div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-inline">
							<li class="list-inline-item"><a href="<?php echo e(url('admin/change-details/'.Auth::user()->id)); ?>" data-toggle="tooltip" title="View Profile"><i class="feather icon-user"></i></a></li>
						</ul>
					</div>
				</div>
				
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
						<label>Navigation</label>
					</li>
					<?php if(Auth::user()->user_type=="C"): ?>

            <?php if(Request::is('admin/bookings*')): ?>
            <?php ($class="menu-open"); ?>
            <?php ($active="active"); ?>
            <?php else: ?>
            <?php ($class=""); ?>
            <?php ($active=""); ?>
            <?php endif; ?>
          <li class="nav-item pcoded-hasmenu <?php echo e($class); ?>">
            <a href="#" class="nav-link <?php echo e($active); ?>"><span class="pcoded-micon"><i class="feather icon-check"></i></span><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('menu.bookings'); ?></span></a>
            <ul class="pcoded-submenu">
              <li class="nav-item">
                <a href="<?php echo e(route('bookings.create')); ?>" class="nav-link  <?php if(Request::is('admin/bookings/create')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('menu.newbooking'); ?></span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('bookings.index')); ?>" class="nav-link  <?php if((Request::is('admin/bookings*')) && !(Request::is('admin/bookings/create')) && !(Request::is('admin/bookings_calendar'))): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('menu.manage_bookings'); ?></span></a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(url('admin/change-details/'.Auth::user()->id)); ?>" class="nav-link  <?php if(Request::is('admin/change-details*')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.editProfile'); ?></span></a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(url('admin/addresses')); ?>" class="nav-link  <?php if(Request::is('admin/addresses*')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.addresses'); ?></span></a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(url('admin/')); ?>" class="nav-link  <?php if(Request::is('admin/')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.expenses'); ?></span></a>
          </li>
          <?php endif; ?>
          <!-- customer -->
          <!-- user-type S or O -->
          <?php if(Auth::user()->user_type=="S" || Auth::user()->user_type=="O"): ?>
          <li class="nav-item">
            <a href="<?php echo e(url('admin/')); ?>" class="nav-link <?php if(Request::is('admin')): ?> active <?php endif; ?>"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('menu.Dashboard'); ?></span></a>
          </li>
          <?php endif; ?>
          <!-- user-type S or O -->

          <!-- driver -->
          <?php if(Auth::user()->user_type=="D"): ?>

          <li class="nav-item">
            <a href="<?php echo e(url('admin/')); ?>" class="nav-link <?php if(Request::is('admin')): ?> active <?php endif; ?>"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.myProfile'); ?></span></a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('my_bookings')); ?>" class="nav-link <?php if(Request::is('admin/my_bookings')): ?> active <?php endif; ?>"><span class="pcoded-micon"><i class="feather icon-check"></i></span><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('menu.my_bookings'); ?></span></a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(url('admin/change-details/'.Auth::user()->id)); ?>" class="nav-link <?php if(Request::is('admin/change-details*')): ?> active <?php endif; ?>"><span class="pcoded-micon"><i class="feather icon-edit"></i></span><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.editProfile'); ?></span></a>
          </li>
            <?php if(Request::is('admin/notes*')): ?>
            <?php ($class="menu-open"); ?>
            <?php ($active="active"); ?>

            <?php else: ?>
            <?php ($class=""); ?>
            <?php ($active=""); ?>
            <?php endif; ?>
          <li class="nav-item pcoded-hasmenu <?php echo e($class); ?>">
            <a href="#" class="nav-link <?php echo e($active); ?>"><span class="pcoded-micon"><i class="feather icon-file-minus"></i></span><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.notes'); ?></span></a>
            <ul class="nav pcoded-submenu">
              <li class="nav-item">
                <a href="<?php echo e(route('notes.index')); ?>" class="nav-link  <?php if((Request::is('admin/notes*') && !(Request::is('admin/notes/create')))): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.manage_note'); ?></span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('notes.create')); ?>" class="nav-link  <?php if(Request::is('admin/notes/create')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.create_note'); ?></span></a>
              </li>
            </ul>
          </li>
            <?php if(Request::is('admin/driver-reports*')): ?>
            <?php ($class="menu-open"); ?>
            <?php ($active="active"); ?>

            <?php else: ?>
            <?php ($class=""); ?>
            <?php ($active=""); ?>
            <?php endif; ?>
          <li class="nav-item pcoded-hasmenu <?php echo e($class); ?>">
            <a href="#" class="nav-link <?php echo e($active); ?>"><span class="pcoded-micon"><i class="feather icon-bar-chart-2"></i></span><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('menu.reports'); ?></span></a>
            <ul class="nav pcoded-submenu">
              <li class="nav-item">
                <a href="<?php echo e(route('dreports.monthly')); ?>" class="nav-link  <?php if(Request::is('admin/driver-reports/monthly')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('menu.monthlyReport'); ?></span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('dreports.yearly')); ?>" class="nav-link  <?php if(Request::is('admin/driver-reports/yearly')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.yearlyReport'); ?></span></a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
          <!-- driver -->

          <!-- sidebar menus for office-admin and super-admin -->
        <?php if(Auth::user()->user_type == "S" || Auth::user()->user_type == "O"): ?>
        <?php ($modules=unserialize(Auth::user()->getMeta('module'))); ?> <!--array of selected modules of logged in user-->
        <?php else: ?>
        <?php ($modules=array()); ?>
        <?php endif; ?>

        <?php if(!Auth::guest() &&  Auth::user()->user_type!="D" && Auth::user()->user_type != "C" ): ?>

            <?php if((Request::is('admin/drivers*')) || (Request::is('admin/users*')) || (Request::is('admin/customers*')) ): ?>
            <?php ($class="menu-open"); ?>
            <?php ($active="active"); ?>

            <?php else: ?>
            <?php ($class=""); ?>
            <?php ($active=""); ?>
            <?php endif; ?>
          <?php if(in_array(0,$modules)): ?> <li class="nav-item pcoded-hasmenu <?php echo e($class); ?>">
            <a href="#" class="nav-link <?php echo e($active); ?>"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('menu.users'); ?></span></a>
            <ul class="nav pcoded-submenu">
              <li class="nav-item">
                <a href="<?php echo e(route('drivers.index')); ?>" class="nav-link   <?php if(Request::is('admin/drivers*')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('menu.drivers'); ?></span></a>
              </li>
              <?php if(Auth::user()->user_type=="S"): ?>
              <li class="nav-item">
                <a href="<?php echo e(route('users.index')); ?>" class="nav-link  <?php if(Request::is('admin/users*')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.users'); ?></span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('customers.index')); ?>" class="nav-link  <?php if(Request::is('admin/ustomers*')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.customers'); ?></span></a>
              </li>
              <?php endif; ?>
            </ul>
          </li> <?php endif; ?>

            <?php if((Request::is('admin/driver-logs')) || (Request::is('admin/vehicle-types*')) || (Request::is('admin/vehicles*')) || (Request::is('admin/vehicle_group*')) || (Request::is('admin/vehicle-reviews*')) || (Request::is('admin/view-vehicle-review*')) || (Request::is('admin/vehicle-review*'))): ?>
            <?php ($class="menu-open"); ?>
            <?php ($active="active"); ?>

            <?php else: ?>
            <?php ($class=""); ?>
            <?php ($active=""); ?>
            <?php endif; ?>
          <?php if(in_array(1,$modules)): ?> <li class="nav-item pcoded-hasmenu <?php echo e($class); ?>">
            <a href="#" class="nav-link <?php echo e($active); ?>"><span class="pcoded-micon"><i class="fa fa-car"></i></span><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('menu.vehicles'); ?></span></a>
            <ul class="nav pcoded-submenu">
              <li class="nav-item">
                <a href="<?php echo e(route('vehicles.index')); ?>" class="nav-link  <?php if(Request::is('admin/vehicles*')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('menu.manageVehicles'); ?></span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('vehicle-types.index')); ?>" class="nav-link  <?php if(Request::is('admin/vehicle-types*')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.manage_vehicle_types'); ?></span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(url('admin/driver-logs')); ?>" class="nav-link  <?php if(Request::is('admin/driver-logs*')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.driver_logs'); ?></span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('vehicle_group.index')); ?>" class="nav-link  <?php if(Request::is('admin/vehicle_group*')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.manageGroup'); ?></span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(url('admin/vehicle-reviews')); ?>" class="nav-link  <?php if(Request::is('admin/vehicle-reviews*')): ?> || (Request::is('admin/view-vehicle-review*')) || (Request::is('admin/vehicle-review*'))) active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.vehicle_inspection'); ?></span></a>
              </li>
            </ul>
          </li> <?php endif; ?>

            <?php if((Request::is('admin/bookings*'))  || (Request::is('admin/bookings_calendar')) || (Request::is('admin/booking-quotation*'))): ?>
            <?php ($class="menu-open"); ?>
            <?php ($active="active"); ?>

            <?php else: ?>
            <?php ($class=""); ?>
            <?php ($active=""); ?>

            <?php endif; ?>
          <?php if(in_array(3,$modules)): ?> <li class="nav-item pcoded-hasmenu <?php echo e($class); ?>">
            <a href="#" class="nav-link <?php echo e($active); ?>"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('menu.bookings'); ?></span></a>
            <ul class="nav pcoded-submenu">
              <li class="nav-item">
                <a href="<?php echo e(route('bookings.create')); ?>" class="nav-link  <?php if(Request::is('admin/bookings/create')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('menu.newbooking'); ?></span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('bookings.index')); ?>" class="nav-link  <?php if(Request::is('admin/bookings*')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('menu.manage_bookings'); ?></span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('booking-quotation.index')); ?>" class="nav-link  <?php if(Request::is('admin/booking-quotation*')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.booking_quotes'); ?></span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('bookings.calendar')); ?>" class="nav-link  <?php if(Request::is('admin/bookings_calendar')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('menu.calendar'); ?></span></a>
              </li>
            </ul>
          </li> <?php endif; ?>

            <?php if(Request::is('admin/reports*')): ?>
            <?php ($class="menu-open"); ?>
            <?php ($active="active"); ?>

            <?php else: ?>
            <?php ($class=""); ?>
            <?php ($active=""); ?>
            <?php endif; ?>
          <?php if(in_array(4,$modules)): ?> <li class="nav-item pcoded-hasmenu <?php echo e($class); ?>">
            <a href="#" class="nav-link <?php echo e($active); ?>"><span class="pcoded-micon"><i class="feather icon-trending-up"></i></span><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('menu.reports'); ?></span></a>
            <ul class="nav pcoded-submenu">
              <?php if(in_array(3,$modules)): ?>
              <li class="nav-item">
                <a href="<?php echo e(route('reports.booking')); ?>" class="nav-link  <?php if(Request::is('admin/reports/booking')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('menu.bookingReport'); ?></span></a>
              </li>
              <?php endif; ?>
              <?php if(in_array(0,$modules)): ?>
              <li class="nav-item">
                <a href="<?php echo e(route('reports.users')); ?>" class="nav-link  <?php if(Request::is('admin/reports/users')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.user_report'); ?></span></a>
              </li>
              <?php endif; ?>
              <?php if(in_array(5,$modules)): ?>
              <li class="nav-item">
                <a href="<?php echo e(route('reports.fuel')); ?>" class="nav-link  <?php if(Request::is('admin/reports/fuel')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.fuelReport'); ?></span></a>
              </li>
              <?php endif; ?>
            </ul>
          </li> <?php endif; ?>

            <?php if(Request::is('admin/fuel*')): ?>
            <?php ($class="menu-open"); ?>
            <?php ($active="active"); ?>

            <?php else: ?>
            <?php ($class=""); ?>
            <?php ($active=""); ?>
            <?php endif; ?>
          <?php if(in_array(5,$modules)): ?> <li class="nav-item pcoded-hasmenu <?php echo e($class); ?>">
            <a href="#" class="nav-link <?php echo e($active); ?>"><span class="pcoded-micon"><i class="feather icon-droplet"></i></span><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.fuel'); ?></span></a>
            <ul class="nav pcoded-submenu">
              <li class="nav-item">
                <a href="<?php echo e(route('fuel.create')); ?>" class="nav-link  <?php if(Request::is('admin/fuel/create')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.add_fuel'); ?></span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('fuel.index')); ?>" class="nav-link  <?php if(Request::is('admin/fuel')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.manage_fuel'); ?></span></a>
              </li>
            </ul>
          </li> <?php endif; ?>


            <?php if(Request::is('admin/parts*') && !Request::is('admin/parts-used*')): ?>
            <?php ($class="menu-open"); ?>
            <?php ($active="active"); ?>

            <?php else: ?>
            <?php ($class=""); ?>
            <?php ($active=""); ?>
            <?php endif; ?>
           <?php if(in_array(14,$modules)): ?><li class="nav-item pcoded-hasmenu <?php echo e($class); ?>">
            <a href="#" class="nav-link <?php echo e($active); ?>"><span class="pcoded-micon"><i class="feather icon-cpu"></i></span><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.parts'); ?></span></a>
            <ul class="nav pcoded-submenu">
              <li class="nav-item">
                <a href="<?php echo e(route('parts.create')); ?>" class="nav-link <?php if(Request::is('admin/parts/create')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.addParts'); ?></span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('parts.index')); ?>" class="nav-link  <?php if(Request::is('admin/parts')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('menu.manageParts'); ?></span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('parts-category.index')); ?>" class="nav-link <?php if(Request::is('admin/parts-category*')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.partsCategory'); ?></span></a>
              </li>
            </ul>
          </li><?php endif; ?>

            <?php if(Request::is('admin/work_order*') || Request::is('admin/parts-used*')): ?>
            <?php ($class="menu-open"); ?>
            <?php ($active="active"); ?>

            <?php else: ?>
            <?php ($class=""); ?>
            <?php ($active=""); ?>
            <?php endif; ?>
          <?php if(in_array(7,$modules)): ?> <li class="nav-item pcoded-hasmenu <?php echo e($class); ?>">
            <a href="#" class="nav-link <?php echo e($active); ?>"><span class="pcoded-micon"><i class="feather icon-file"></i></span><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.work_orders'); ?></span></a>
            <ul class="nav pcoded-submenu">
              <li class="nav-item">
                <a href="<?php echo e(route('work_order.create')); ?>" class="nav-link  <?php if(Request::is('admin/work_order/create')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.add_order'); ?></span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('work_order.index')); ?>" class="nav-link  <?php if((Request::is('admin/work_order*')) && !(Request::is('admin/work_order/create')) && !(Request::is('admin/work_order/logs')) || Request::is('admin/parts-used*')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.manage_work_order'); ?></span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(url('admin/work_order/logs')); ?>" class="nav-link  <?php if(Request::is('admin/work_order/logs')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.work_order_logs'); ?></span></a>
              </li>
            </ul>
          </li> <?php endif; ?>

            <?php if(Request::is('admin/notes*')): ?>
            <?php ($class="menu-open"); ?>
            <?php ($active="active"); ?>

            <?php else: ?>
            <?php ($class=""); ?>
            <?php ($active=""); ?>
            <?php endif; ?>
          <?php if(in_array(8,$modules)): ?> <li class="nav-item pcoded-hasmenu <?php echo e($class); ?>">
            <a href="#" class="nav-link <?php echo e($active); ?>"><span class="pcoded-micon"><i class="feather icon-book"></i></span><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.notes'); ?></span></a>
            <ul class="nav pcoded-submenu">
              <li class="nav-item">
                <a href="<?php echo e(route('notes.index')); ?>" class="nav-link  <?php if((Request::is('admin/notes*') && !(Request::is('admin/notes/create')))): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('menu.newbooking'); ?></span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('notes.create')); ?>" class="nav-link  <?php if(Request::is('admin/notes/create')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.create_note'); ?></span></a>
              </li>
            </ul>
          </li> <?php endif; ?>

            <?php if((Request::is('admin/service-reminder*')) || (Request::is('admin/service-item*'))): ?>
            <?php ($class="menu-open"); ?>
            <?php ($active="active"); ?>

            <?php else: ?>
            <?php ($class=""); ?>
            <?php ($active=""); ?>
            <?php endif; ?>
          <?php if(in_array(9,$modules)): ?> <li class="nav-item pcoded-hasmenu <?php echo e($class); ?>">
            <a href="#" class="nav-link <?php echo e($active); ?>"><span class="pcoded-micon"><i class="feather icon-rotate-ccw"></i></span><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.serviceReminders'); ?></span></a>
            <ul class="nav pcoded-submenu">
              <li class="nav-item">
                <a href="<?php echo e(route('service-reminder.index')); ?>" class="nav-link  <?php if(Request::is('admin/service-reminder')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.manage_reminder'); ?></span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('service-reminder.create')); ?>" class="nav-link  <?php if(Request::is('admin/service-reminder/create')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.add_service_reminder'); ?></span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('service-item.index')); ?>" class="nav-link  <?php if(Request::is('admin/service-item*')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.service_item'); ?></span></a>
              </li>
            </ul>
          </li> <?php endif; ?>

          <?php endif; ?> <!-- for user-type O or S -->
          <?php if(Auth::user()->user_type=="S"): ?>
            <?php if(Request::is('admin/team*')): ?>
            <?php ($class="menu-open"); ?>
            <?php ($active="active"); ?>

            <?php else: ?>
            <?php ($class=""); ?>
            <?php ($active=""); ?>
            <?php endif; ?>
          <li class="nav-item pcoded-hasmenu <?php echo e($class); ?>">
            <a href="#" class="nav-link <?php echo e($active); ?>"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.team'); ?></span></a>
            <ul class="nav pcoded-submenu">
              <li class="nav-item">
                <a href="<?php echo e(route('team.index')); ?>" class="nav-link  <?php if((Request::is('admin/team*') && !(Request::is('admin/team/create')))): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.manage_team'); ?></span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('team.create')); ?>" class="nav-link  <?php if(Request::is('admin/team/create')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.addMember'); ?></span></a>
              </li>
            </ul>
          </li>
            <?php if(Request::is('admin/settings*') || Request::is('admin/fare-settings') || Request::is('admin/api-settings') || (Request::is('admin/expensecategories*')) || (Request::is('admin/incomecategories*')) || (Request::is('admin/expensecategories*')) || (Request::is('admin/send-email')) || (Request::is('admin/set-email')) || (Request::is('admin/cancel-reason*')) || (Request::is('admin/frontend-settings*')) || (Request::is('admin/company-services*'))): ?>
            <?php ($class="menu-open"); ?>
            <?php ($active="active"); ?>

            <?php else: ?>
            <?php ($class=""); ?>
            <?php ($active=""); ?>
            <?php endif; ?>
          <li class="nav-item pcoded-hasmenu <?php echo e($class); ?>">
            <a href="#" class="nav-link <?php echo e($active); ?>"><span class="pcoded-micon"><i class="feather icon-settings"></i></span><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('menu.settings'); ?></span></a>
            <ul class="nav pcoded-submenu">
              <li class="nav-item">
                <a href="<?php echo e(route('settings.index')); ?>" class="nav-link  <?php if(Request::is('admin/settings')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('menu.general_settings'); ?></span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(url('admin/api-settings')); ?>" class="nav-link  <?php if(Request::is('admin/api-settings')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('menu.api_settings'); ?></span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('cancel-reason.index')); ?>" class="nav-link  <?php if(Request::is('admin/cancel-reason*')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.cancellation'); ?></span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(url('admin/send-email')); ?>" class="nav-link  <?php if(Request::is('admin/send-email')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('menu.email_notification'); ?></span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(url('admin/set-email')); ?>" class="nav-link  <?php if(Request::is('admin/set-email')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('menu.email_content'); ?></span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('expensecategories.index')); ?>" class="nav-link  <?php if(Request::is('admin/expensecategories*')): ?> active <?php endif; ?>"><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('menu.expenseCategories'); ?></span></a>
              </li>
            </ul>
          </li>

          <?php if(in_array(12,$modules) && Hyvikk::api('api_key') != null): ?> <li class="nav-item">
            <a href="<?php echo e(url('admin/driver-maps')); ?>" class="nav-link <?php if(Request::is('admin/driver-maps') || Request::is('admin/track-driver*')): ?> active <?php endif; ?>"><span class="pcoded-micon"><i class="feather icon-map"></i></span><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.maps'); ?></span></a>
          </li> <?php endif; ?>
          <?php endif; ?> <!-- super-admin -->

          <?php if(Hyvikk::api('api') && Hyvikk::api('driver_review') == 1 && in_array(10,$modules)): ?> <li class="nav-item">
            <a href="<?php echo e(url('admin/reviews')); ?>" class="nav-link <?php if(Request::is('admin/reviews')): ?> active <?php endif; ?>"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.reviews'); ?></span></a>
          </li> <?php endif; ?>

          <?php if(in_array(13,$modules)): ?> <li class="nav-item">
            <a href="#" target="_blank" class="nav-link"><span class="pcoded-micon"><i class="feather icon-help-circle"></i></span><span class="pcoded-mtext"><?php echo app('translator')->getFromJson('fleet.helpus'); ?></span></a>
          </li> <?php endif; ?>
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
          <a href="<?php echo e(url('admin/')); ?>" class="b-brand">
            <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="Fleet Logo" class="logo"
                 style="opacity: .8">
            <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="Fleet Logo" class="logo-thumb"
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
            <?php if(Auth::user()->user_type=="S"): ?>
              <?php ($r = 0); ?>
              <?php ($i = 0); ?>
              <?php ($l = 0); ?>
              <?php ($d = 0); ?>
              <?php ($s = 0); ?>
              <?php ($user= Auth::user()); ?>
              <?php $__currentLoopData = $user->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($notification->type == "App\Notifications\RenewRegistration"): ?>
                <?php ($r++); ?>
                <?php elseif($notification->type == "App\Notifications\RenewInsurance"): ?>
                <?php ($i++); ?>
                <?php elseif($notification->type == "App\Notifications\RenewVehicleLicence"): ?>
                <?php ($l++); ?>
                <?php elseif($notification->type == "App\Notifications\RenewDriverLicence"): ?>
                <?php ($d++); ?>
                <?php elseif($notification->type == "App\Notifications\ServiceReminderNotification"): ?>
                <?php ($s++); ?>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php ($n = $r + $i +$l + $d + $s); ?>
            <?php endif; ?>

						<li>
							<div class="dropdown">
								<a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i><span class="badge badge-warning navbar-badge"><?php if($n>0): ?> <?php echo e($n); ?> <?php endif; ?></span></a>
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
                      <a href="<?php echo e(url('admin/vehicle_notification',['type'=>'renew-registrations'])); ?>" class="dropdown-item">
                        <i class="fa fa-id-card-o mr-2"></i> <?php echo app('translator')->getFromJson('fleet.renew_registration'); ?>
                        <span class="float-right text-muted text-sm"><?php if($r>0): ?> <?php echo e($r); ?> <?php endif; ?></span>
                      </a>
                    </li>
                    <li class="notification">
                      <a href="<?php echo e(url('admin/vehicle_notification',['type'=>'renew-insurance'])); ?>" class="dropdown-item">
                        <i class="fa fa-file-text mr-2"></i> <?php echo app('translator')->getFromJson('fleet.renew_insurance'); ?>
                        <span class="float-right text-muted text-sm"><?php if($i>0): ?> <?php echo e($i); ?> <?php endif; ?></span>
                      </a>
                    </li>   
                    <li class="notification">
                      <a href="<?php echo e(url('admin/vehicle_notification',['type'=>'renew-licence'])); ?>" class="dropdown-item">
                        <i class="fa fa-file-o mr-2"></i> <?php echo app('translator')->getFromJson('fleet.renew_licence'); ?>
                        <span class="float-right text-muted text-sm"><?php if($l>0): ?> <?php echo e($l); ?> <?php endif; ?></span>
                      </a>
                    </li> 
                    <li class="notification">
                      <a href="<?php echo e(url('admin/driver_notification',['type'=>'renew-driving-licence'])); ?>" class="dropdown-item">
                        <i class="fa fa-file-text-o mr-2"></i> <?php echo app('translator')->getFromJson('fleet.renew_driving_licence'); ?>
                        <span class="float-right text-muted text-sm"><?php if($d>0): ?> <?php echo e($d); ?> <?php endif; ?></span>
                      </a>
                    </li>                        
                    <li class="notification">
                      <a href="<?php echo e(url('admin/reminder',['type'=>'service-reminder'])); ?>" class="dropdown-item">
                        <i class="fa fa-clock-o mr-2"></i> <?php echo app('translator')->getFromJson('fleet.serviceReminders'); ?>
                        <span class="float-right text-muted text-sm"><?php if($s>0): ?> <?php echo e($s); ?> <?php endif; ?></span>
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
                    <?php if(Auth::user()->user_type == 'D' && Auth::user()->getMeta('driver_image') != null): ?>
                      <?php if(starts_with(Auth::user()->getMeta('driver_image'),'http')): ?>
                        <?php ($src = Auth::user()->getMeta('driver_image')); ?>
                        <?php else: ?>
                        <?php ($src=asset('uploads/'.Auth::user()->getMeta('driver_image'))); ?>
                        <?php endif; ?>
                        <img src="<?php echo e($src); ?>" class="img-radius" alt="User Image">
                        <?php elseif(Auth::user()->user_type == 'S' || Auth::user()->user_type == 'O'): ?>
                          <?php if(Auth::user()->getMeta('profile_image') == null): ?>
                          <img src="<?php echo e(asset('assets/images/no-user.jpg')); ?>" class="img-radius" alt="User Image">
                          <?php else: ?>
                          <img src="<?php echo e(asset('uploads/'.Auth::user()->getMeta('profile_image'))); ?>" class="img-radius" alt="User Image">
                          <?php endif; ?>
                        <?php elseif(Auth::user()->user_type == 'C' && Auth::user()->getMeta('profile_pic') != null): ?>
                        <?php if(starts_with(Auth::user()->getMeta('profile_pic'),'http')): ?>
                        <?php ($src = Auth::user()->getMeta('profile_pic')); ?>
                        <?php else: ?>
                        <?php ($src=asset('uploads/'.Auth::user()->getMeta('profile_pic'))); ?>
                        <?php endif; ?>
                        <img src="<?php echo e($src); ?>" class="img-radius" alt="User Image">
                        <?php else: ?>
                        <img src="<?php echo e(asset('assets/images/no-user.jpg')); ?>" class="img-radius" alt="User Image">
                    <?php endif; ?>
										<span><?php echo e(Auth::user()->name); ?></span>
										<a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dud-logout" title="Logout">
											<i class="feather icon-log-out"></i>
                    </a>
									</div>
									<ul class="pro-body">
                    <li><a href="<?php echo e(url('admin/change-details/'.Auth::user()->id)); ?>" class="dropdown-item"><i class="feather icon-user"></i> <?php echo app('translator')->getFromJson('fleet.editProfile'); ?></a></li>
                  </ul>
                  <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo e(csrf_field()); ?>

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
        
      <?php echo $__env->yieldContent('content'); ?>      

    </div>
</div>
<!-- Button trigger modal -->

    
<!-- Required Js -->
<script src="<?php echo e(asset('assets/js/vendor-all.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/ripple.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/pcoded.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/menu-setting.min.js')); ?>"></script>


<?php echo $__env->yieldContent('script'); ?>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/fleet-manager-git/framework/resources/views/layouts/app.blade.php ENDPATH**/ ?>