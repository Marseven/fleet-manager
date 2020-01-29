<?php $__env->startSection('content'); ?>
<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10"><?php echo app('translator')->getFromJson('fleet.booking_quotes'); ?></h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('admin/')); ?>"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('work_order.index')); ?>"><i class="feather icon-file"></i></a></li>
                    <li class="breadcrumb-item active"><a href="#"><?php echo app('translator')->getFromJson('fleet.work_order_logs'); ?></a></li>
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
        <h3 class="card-title">
          <?php echo app('translator')->getFromJson('fleet.work_order_logs'); ?>
        </h3>
      </div>
      <div class="card-body dt-responsive table-responsive">
        <table id="base-style" class="table table-striped table-bordered nowrap">
          <thead>
            <tr>
              <th><?php echo app('translator')->getFromJson('fleet.vehicle'); ?></th>
              <th></th>
              <th><?php echo app('translator')->getFromJson('fleet.created_on'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.required_by'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.personnel'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.description'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.work_order_price'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.total'); ?> <?php echo app('translator')->getFromJson('fleet.parts'); ?> <?php echo app('translator')->getFromJson('fleet.cost'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.total_cost'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.status'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.vendor_type'); ?></th>
            </tr>
          </thead>
          <tbody>
          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td>
                <?php if($row->vehicle['vehicle_image'] != null): ?>
                <img src="<?php echo e(asset('uploads/'.$row->vehicle['vehicle_image'])); ?>" height="70px" width="70px">
                <?php else: ?>
                <img src="<?php echo e(asset("assets/images/vehicle.jpeg")); ?>" height="70px" width="70px">
                <?php endif; ?>
              </td>
              <td>
                <?php echo e($row->vehicle['year']); ?>

                <?php echo e($row->vehicle['make']); ?> - <?php echo e($row->vehicle['model']); ?>

                <br>
                <b> <?php echo app('translator')->getFromJson('fleet.vin'); ?>: </b><?php echo e($row->vehicle['vin']); ?>

                <br>
                <b> <?php echo app('translator')->getFromJson('fleet.plate'); ?>:</b> <?php echo e($row->vehicle['license_plate']); ?>

              </td>
              <td>
                <?php echo e(date('d-m-Y',strtotime($row->created_on))); ?>

              </td>
              <td>
                <?php echo e(date('d-m-Y',strtotime($row->required_by))); ?>

              </td>
              <td>
                <?php echo e($row->vendor['name']); ?>

              </td>
              <td><?php echo e($row->description); ?></td>
              <td> <?php echo e(Hyvikk::get('currency')); ?> <?php echo e($row->price); ?></td>
              <td> <?php echo e(Hyvikk::get('currency')); ?> <?php echo e($row->parts_price); ?></td>
              <td> <?php echo e(Hyvikk::get('currency')); ?> <?php echo e($row->price + $row->parts_price); ?></td>
              <td>
                <?php if($row->status == "Completed"): ?>
                <span class="text-success"><?php echo e($row->status); ?></span>
                <?php elseif($row->status == "Pending"): ?>
                <span class="text-warning"><?php echo e($row->status); ?></span>
                <?php else: ?>
                <?php echo e($row->status); ?>

                <?php endif; ?>
              </td>
              <td>
                <?php echo e($row->type); ?>

                on
                <?php echo e(date('d-m-Y g:i A',strtotime($row->created_at))); ?>

              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
          <tfoot>
            <tr>
              <th><?php echo app('translator')->getFromJson('fleet.vehicle'); ?></th>
              <th></th>
              <th><?php echo app('translator')->getFromJson('fleet.created_on'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.required_by'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.personnel'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.description'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.work_order_price'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.total'); ?> <?php echo app('translator')->getFromJson('fleet.parts'); ?> <?php echo app('translator')->getFromJson('fleet.cost'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.total_cost'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.status'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.vendor_type'); ?></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><?php echo app('translator')->getFromJson('fleet.delete'); ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p><?php echo app('translator')->getFromJson('fleet.confirm_delete'); ?></p>
      </div>
      <div class="modal-footer">
        <button id="del_btn" class="btn btn-danger" type="button" data-submit=""><?php echo app('translator')->getFromJson('fleet.delete'); ?></button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('fleet.close'); ?></button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<!-- datatable Js -->
<script src="<?php echo e(asset('assets/js/plugins/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/pages/data-styling-custom.js')); ?>"></script>

<script type="text/javascript">
  $("#del_btn").on("click",function(){
    var id=$(this).data("submit");
    $("#form_"+id).submit();
  });

  $('#myModal').on('show.bs.modal', function(e) {
    var id = e.relatedTarget.dataset.id;
    $("#del_btn").attr("data-submit",id);
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/fleet-manager-git/framework/resources/views/work_orders/logs.blade.php ENDPATH**/ ?>