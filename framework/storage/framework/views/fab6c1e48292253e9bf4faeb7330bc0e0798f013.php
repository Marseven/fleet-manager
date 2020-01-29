<?php $__env->startSection('content'); ?>
<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10"><?php echo app('translator')->getFromJson('fleet.booking_report'); ?></h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('admin/')); ?>"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item active"><a href="#"> <?php echo app('translator')->getFromJson('fleet.booking_report'); ?></a></li>
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
        <h3 class="card-title"><?php echo app('translator')->getFromJson('fleet.booking_report'); ?>
        </h3>
      </div>

      <div class="card-body" style="padding:25px;">
        <?php echo Form::open(['route' => 'reports.booking','method'=>'post','class'=>'form-inline']); ?>

        <div class="row">
          <div class="form-group" style="margin-right: 5px">
            <?php echo Form::label('year', __('fleet.year1'), ['class' => 'form-label']); ?>

            <?php echo Form::select('year', $years, $year_select,['class'=>'form-control']);; ?>

          </div>
          <div class="form-group" style="margin-right: 5px">
            <?php echo Form::label('month', __('fleet.month'), ['class' => 'form-label']); ?>

            <?php echo Form::selectMonth('month',$month_select,['class'=>'form-control']);; ?>

          </div>
          <div class="form-group" style="margin-right: 5px">
            <?php echo Form::label('vehicle', __('fleet.vehicles'), ['class' => 'form-label']); ?>

            <select id="vehicle_id" name="vehicle_id" class="form-control vehicles" style="width: 150px">
              <option value=""><?php echo app('translator')->getFromJson('fleet.selectVehicle'); ?></option>
              <?php $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($vehicle->id); ?>" <?php if($vehicle_select == $vehicle->id): ?> selected <?php endif; ?>><?php echo e($vehicle->make); ?>-<?php echo e($vehicle->model); ?>-<?php echo e($vehicle->license_plate); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="form-group" style="margin-right: 5px">
            <?php echo Form::label('customer_id', __('fleet.selectCustomer'), ['class' => 'form-label']); ?>

            <select id="customer_id" name="customer_id" class="form-control vehicles" style="width: 150px">
              <option value=""><?php echo app('translator')->getFromJson('fleet.selectCustomer'); ?></option>
              <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($customer->id); ?>" <?php if($customer_select == $customer->id): ?> selected <?php endif; ?>><?php echo e($customer->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>

          <button type="submit" class="btn btn-info" style="margin-right: 1px"><?php echo app('translator')->getFromJson('fleet.generate_report'); ?></button>
          <button type="submit" formaction="<?php echo e(url('admin/print-booking-report')); ?>" class="btn btn-danger"><i class="fa fa-print"></i> <?php echo app('translator')->getFromJson('fleet.print'); ?></button>
        </div>
        <?php echo Form::close(); ?>


      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
        <?php echo app('translator')->getFromJson('fleet.booking_count'); ?> : <?php echo e($bookings->count()); ?>

        </h3>
      </div>
      <div class="card-body dt-responsive table-responsive" style="padding:25px;">
        <table id="base-style" class="table table-striped table-bordered nowrap">
          <thead>
            <tr>
              <th><?php echo app('translator')->getFromJson('fleet.customer'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.vehicle'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.pickup_addr'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.dropoff_addr'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.from_date'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.to_date'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.passengers'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.status'); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($row->customer->name); ?></td>
              <td>
              <?php if($row->vehicle_id != null): ?>
              <?php echo e($row->vehicle->make); ?> - <?php echo e($row->vehicle->model); ?> - <?php echo e($row->vehicle->license_plate); ?>

              <?php endif; ?>
              </td>
              <td style="width:10% !important"><?php echo str_replace(",", ",<br>", $row->pickup_addr); ?></td>
              <td style="width:10% !important"><?php echo str_replace(",", ",<br>", $row->dest_addr); ?></td>
              <td><?php echo e(date('d/m/Y g:i A',strtotime($row->pickup))); ?></td>
              <td><?php echo e(date('d/m/Y g:i A',strtotime($row->dropoff))); ?></td>
              <td><?php echo e($row->travellers); ?></td>
              <td><?php if($row->status==0): ?><span style="color:orange;"><?php echo app('translator')->getFromJson('fleet.journey_not_ended'); ?> <?php else: ?> <span style="color:green;"><?php echo app('translator')->getFromJson('fleet.journey_ended'); ?> <?php endif; ?></span></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
          <tfoot>
            <tr>
              <th><?php echo app('translator')->getFromJson('fleet.customer'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.vehicle'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.pickup_addr'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.dropoff_addr'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.from_date'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.to_date'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.passengers'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.status'); ?></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection("script"); ?>


<!-- datatable Js -->
<script src="<?php echo e(asset('assets/js/plugins/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/pages/data-styling-custom.js')); ?>"></script>

<script type="text/javascript" src="<?php echo e(asset('assets/js/cdn/jszip.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js/cdn/pdfmake.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js/cdn/vfs_fonts.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js/cdn/buttons.html5.min.js')); ?>"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#customer_id').select2();
    $('#vehicle_id').select2();
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
                 "url": '<?php echo e(__("fleet.datatable_lang")); ?>',
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/fleet-manager-git/framework/resources/views/reports/booking.blade.php ENDPATH**/ ?>