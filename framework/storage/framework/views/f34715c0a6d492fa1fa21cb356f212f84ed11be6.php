<?php $__env->startSection('extra_css'); ?>
<style type="text/css">
  .checkbox, #chk_all{
    width: 20px;
    height: 20px;
  }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10"><?php echo app('translator')->getFromJson('fleet.dashboard'); ?></h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('admin/')); ?>"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#"><i class="feather icon-settings"></i></a></li>
                    <li class="breadcrumb-item active"><a href="#"> <?php echo app('translator')->getFromJson('fleet.cancellation'); ?></a></li>
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
        <?php echo app('translator')->getFromJson('fleet.cancellation'); ?>
        &nbsp;
        <a href="<?php echo e(route('cancel-reason.create')); ?>" class="btn btn-success"><?php echo app('translator')->getFromJson('fleet.addNew'); ?></a></h3>
      </div>

      <div class="card-body dt-responsive table-responsive">
        <table id="base-style" class="table table-striped table-bordered nowrap">
          <thead>
            <tr>
              <th>
                <?php if($reasons->count() > 0): ?>
                  <input type="checkbox" id="chk_all">
                <?php endif; ?>
              </th>
              <th><?php echo app('translator')->getFromJson('fleet.reason'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.action'); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $reasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reason): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td>
                <input type="checkbox" name="ids[]" value="<?php echo e($reason->id); ?>" class="checkbox" id="chk<?php echo e($reason->id); ?>" onclick='checkcheckbox();'>
              </td>
              <td><?php echo e($reason->reason); ?></td>
              <td>
              <div class="btn-group">
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                  <span class="fa fa-gear"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu custom" role="menu">
                  <a class="dropdown-item" href="<?php echo e(url("admin/cancel-reason/".$reason->id."/edit")); ?>"> <span aria-hidden="true" class="fa fa-edit" style="color: #f0ad4e;"></span> <?php echo app('translator')->getFromJson('fleet.edit'); ?></a>
                  <a class="dropdown-item" data-id="<?php echo e($reason->id); ?>" data-toggle="modal" data-target="#myModal" ><span aria-hidden="true" class="fa fa-trash" style="color: #dd4b39"></span> <?php echo app('translator')->getFromJson('fleet.delete'); ?></a>
                </div>
              </div>
              <?php echo Form::open(['url' => 'admin/cancel-reason/'.$reason->id,'method'=>'DELETE','class'=>'form-horizontal','id'=>'form_'.$reason->id]); ?>

              <?php echo Form::hidden("id",$reason->id); ?>

              <?php echo Form::close(); ?>

              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
          <tfoot>
            <tr>
              <th>
                <?php if($reasons->count() > 0): ?>
                  <button class="btn btn-danger" id="bulk_delete" data-toggle="modal" data-target="#bulkModal" disabled><?php echo app('translator')->getFromJson('fleet.delete'); ?></button>
                <?php endif; ?>
              </th>
              <th><?php echo app('translator')->getFromJson('fleet.reason'); ?></th>
              <th><?php echo app('translator')->getFromJson('fleet.action'); ?></th>
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
        <h4 class="modal-title"><?php echo app('translator')->getFromJson('fleet.delete'); ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <?php echo Form::open(['url'=>'admin/delete-reasons','method'=>'POST','id'=>'form_delete']); ?>

        <div id="bulk_hidden"></div>
        <p><?php echo app('translator')->getFromJson('fleet.confirm_bulk_delete'); ?></p>
      </div>
      <div class="modal-footer">
        <button id="bulk_action" class="btn btn-danger" type="submit" data-submit=""><?php echo app('translator')->getFromJson('fleet.delete'); ?></button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('fleet.close'); ?></button>
      </div>
        <?php echo Form::close(); ?>

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

  $('input[type="checkbox"]').on('click',function(){
    $('#bulk_delete').removeAttr('disabled');
  });

  $('#bulk_delete').on('click',function(){
    // console.log($( "input[name='ids[]']:checked" ).length);
    if($( "input[name='ids[]']:checked" ).length == 0){
      $('#bulk_delete').prop('type','button');
        new PNotify({
            title: 'Failed!',
            text: "<?php echo app('translator')->getFromJson('fleet.delete_error'); ?>",
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/fleet-manager-git/framework/resources/views/cancel-reasons/index.blade.php ENDPATH**/ ?>