<table class="table align-items-center">
    <thead>
        <tr>
            <th><?php echo e(__('Name')); ?></th>
            <th><?php echo e(__('Time')); ?></th>
            <th><?php echo e(__('Break')); ?></th>
            <th><?php echo e(__('Location')); ?></th>
            <!--th><?php echo e(__('Revenue')); ?></th-->
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($rotas) && count($rotas) != 0): ?>
            <?php $__currentLoopData = $rotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th>
                        <div class="media align-items-center">
                            <div>
                                <div class="avatar-parent-child">
                                    <img src="<?php echo e(asset(Storage::url($rota->userprofile($rota->user_id)))); ?>"
                                        class="avatar  rounded-circle">
                                </div>
                            </div>
                            <div class="media-body ml-4">
                                <a href="#"
                                    class="d-block name h6 mb-0 text-sm"><?php echo e(!empty($rota->getrotauser->first_name) ? $rota->getrotauser->first_name : ''); ?></a>
                                <div class="d-inline-block day_view_dot"
                                    style="background-color: <?php echo e($rota->getrotarole->color); ?>"></div>
                                <small class="d-inline-block font-weight-bold"><?php echo e($rota->getrotarole->name); ?></small>
                            </div>
                        </div>
                    </th>
                    <td> <?php echo e(\App\User::CompanyTimeFormat($rota->start_time)); ?> -
                        <?php echo e(\App\User::CompanyTimeFormat($rota->end_time)); ?> </td>
                    <td> <?php echo e($rota->break_time . __('Min')); ?> </td>
                    <td> <?php echo e($rota->getrotalocation->name); ?> </td>
                    <!--td> <?php echo e($rota->rota_cost($rota)); ?> </td-->
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr>
                <td colspan="5">
                    <div class="text-center">
                        <i class="fas fa-calendar-times text-primary fs-40"></i>
                        <h2><?php echo e(__('Opps...')); ?></h2>
                        <h6> <?php echo __('No rotas found.'); ?> </h6>
                    </div>
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php /**PATH /home/jovickxe/medtimes.co/resources/views/dashboard/dayview_filter.blade.php ENDPATH**/ ?>