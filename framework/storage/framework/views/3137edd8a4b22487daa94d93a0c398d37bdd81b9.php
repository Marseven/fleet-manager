
<div role="tabpanel">
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="#info-tab" data-toggle="tab" class="nav-link custom_padding active"> <?php echo app('translator')->getFromJson('fleet.general_info'); ?> <i class="fa"></i></a>
        </li>

        <li class="nav-item"><a href="#address-tab" data-toggle="tab" class="nav-link custom_padding"> <?php echo app('translator')->getFromJson('fleet.insurance'); ?> <i class="fa"></i></a>
        </li>

        <li class="nav-item"><a href="#acq-tab" data-toggle="tab" class="nav-link custom_padding"> <?php echo app('translator')->getFromJson('fleet.purchase_info'); ?> <i class="fa"></i></a>
        </li>

        <li class="nav-item"><a href="#reviews" data-toggle="tab" class="nav-link custom_padding"> <?php echo app('translator')->getFromJson('fleet.vehicle_inspection'); ?> <i class="fa"></i></a>
        </li>
    </ul>

	<div class="tab-content">
		<!-- tab1-->
		<div class="tab-pane active" id="info-tab">
			<table class="table table-striped">
				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.vehicle'); ?></th>
					<td><?php echo e($vehicle->make); ?></td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.model'); ?></th>
					<td>
						<?php echo e($vehicle->model); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.type'); ?></th>
					<td>
						<?php echo e($vehicle->types['displayname']); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.year'); ?></th>
					<td>
						<?php echo e($vehicle->year); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.average'); ?> (<?php echo app('translator')->getFromJson('fleet.mpg'); ?>)</th>
					<td>
						<?php echo e($vehicle->average); ?> mpg
					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.intMileage'); ?> (<?php echo e(Hyvikk::get('dis_format')); ?>)</th>
					<td>
						<?php echo e($vehicle->int_mileage); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.vehicleImage'); ?></th>
					<td>
						<?php if($vehicle->vehicle_image != null): ?>
			            <a href="<?php echo e(asset('uploads/'.$vehicle->vehicle_image)); ?>" target="_blank" class="col-xs-3 control-label">View</a>
			            <?php endif; ?>
					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.engine'); ?></th>
					<td>
						<?php echo e($vehicle->engine_type); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.horsePower'); ?></th>
					<td>
						<?php echo e($vehicle->horse_power); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.color'); ?></th>
					<td>
						<?php echo e($vehicle->color); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.vin'); ?></th>
					<td>
						<?php echo e($vehicle->vin); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.licensePlate'); ?></th>
					<td>
						<?php echo e($vehicle->license_plate); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.lic_exp_date'); ?></th>
					<td>
						<?php echo e($vehicle->lic_exp_date); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.reg_exp_date'); ?></th>
					<td>
						<?php echo e($vehicle->reg_exp_date); ?>

					</td>
				</tr>
			</table>
		</div>
		<!--tab1-->

		<!--tab2-->
		<div class="tab-pane" id="address-tab" >
			<table class="table table-striped">
				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.vehicle'); ?></th>
					<td>
					<?php echo e($vehicle->make); ?>-<?php echo e($vehicle->model); ?>-<?php echo e($vehicle->types['displayname']); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.insuranceNumber'); ?></th>
					<td>
					<?php echo e($vehicle->getMeta('ins_number')); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.inc_doc'); ?></th>
					<td>
					<?php if($vehicle->getMeta('documents') != null): ?>
					<a href="<?php echo e(asset('uploads/'.$vehicle->getMeta('documents'))); ?>" target="_blank">
					View
					</a>
					<?php endif; ?>
					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.inc_expirationDate'); ?></th>
					<td>
					<?php echo e($vehicle->getMeta('ins_exp_date')); ?>

					</td>
				</tr>
			</table>
		</div>
		<!--tab2-->

		
		<div class="tab-pane " id="acq-tab" >
			<div class="card card-default">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table">
								<thead>
									<th><?php echo app('translator')->getFromJson('fleet.expenseType'); ?></th>
									<th><?php echo app('translator')->getFromJson('fleet.expenseAmount'); ?></th>
								</thead>
								<?php
								$value = unserialize($vehicle->getMeta('purchase_info'));
								?>
								<tbody id="hvk">
									<?php if($value != null): ?>
									<?php
									$i=0;
									?>
									<?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<?php
										$i+=$row['exp_amount'];
										?>
										<td><?php echo e($row['exp_name']); ?></td>
										<td><?php echo e($row['exp_amount']); ?></td>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><strong><?php echo app('translator')->getFromJson('fleet.total'); ?></strong></td>
										<td><strong><?php echo e($i); ?></strong></td>
										<td></td>
									</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--tab3-->

		<!-- tab4 -->
		<div class="tab-pane " id="reviews" >
			<div class="card card-default">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
						<?php $__currentLoopData = $vehicle->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<a href="<?php echo e(url('adminview-vehicle-review/'.$r->id)); ?>" class="btn btn-success" style="margin-bottom: 5px;" title="View Review"><?php echo app('translator')->getFromJson('fleet.reg_no'); ?>: <?php echo e($r->reg_no); ?></a>
							&nbsp; <a href="<?php echo e(url('adminprint-vehicle-review/'.$r->id)); ?>" class="btn btn-danger" target="_blank" title="<?php echo app('translator')->getFromJson('fleet.print'); ?>" style="margin-bottom: 5px;"><i class="fa fa-print"></i> <?php echo app('translator')->getFromJson('fleet.print'); ?></a>
							<br>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>

					</div>

				</div>
			</div>
		</div>
		<!-- tab4 -->
	</div>
</div><?php /**PATH /Applications/MAMP/htdocs/fleet-manager-git/framework/resources/views/vehicles/view_event.blade.php ENDPATH**/ ?>