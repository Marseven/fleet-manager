<?php $__env->startSection("extra_css"); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/fullcalendar.min.css')); ?>">
<style type="text/css">
  .modal-body{
    height: 400px;
    overflow-y: auto;
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("breadcrumb"); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route("bookings.index")); ?>"><?php echo app('translator')->getFromJson('menu.bookings'); ?></a></li>
<li class="breadcrumb-item active"><?php echo app('translator')->getFromJson('menu.calendar'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10"><?php echo app('translator')->getFromJson('menu.calendar'); ?></h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('admin/')); ?>"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('bookings.index')); ?>"><i class="feather icon-list"></i></a></li>
                    <li class="breadcrumb-item active"><a href="#"><?php echo app('translator')->getFromJson('menu.calendar'); ?></a></li>
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
        <h3 class="card-title"><?php echo app('translator')->getFromJson('menu.calendar'); ?></h3>
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
        <h4 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->getFromJson('fleet.event_details'); ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('fleet.close'); ?></button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="my_event" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel1"><?php echo app('translator')->getFromJson('fleet.my_events'); ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('fleet.close'); ?></button>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>

<!-- Full calendar js -->
<script src="<?php echo e(asset('assets/js/plugins/moment.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/fullcalendar.min.js')); ?>"></script>
<script type="text/javascript">
    // Full calendar
    $(window).on('load', function() {
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listWeek'
          },
    
          defaultDate: '<?php echo e(date("Y-m-d")); ?>',
          navLinks: true, // can click day/week names to navigate views
          editable: false,
          events: "<?php echo e(url('admin/calendar')); ?>",
          eventLimit: true,
          eventClick: function(calEvent, jsEvent, view) {
             $.ajax({
    
                url: '<?php echo e(url("/admin/calendar/event/")); ?>/'+calEvent.type+'/'+calEvent.id,
    
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/fleet-manager-git/framework/resources/views/bookings/calendar.blade.php ENDPATH**/ ?>