<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Location')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page content -->
    <div class="page-content">
        <!-- Page title -->
        <div class="page-title">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                    <div class="d-inline-block">
                        <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white"><?php echo e(__('Location')); ?></h5>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
                    <button type="button" class="btn btn-sm btn-white btn-icon-only rounded-circle" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Add New Location')); ?>" title="<?php echo e(__('Add New Location')); ?>"
                            data-url="<?php echo e(route('locations.create')); ?>"><span class="btn-inner--icon"><i class="fas fa-plus"></i></span></button>
                </div>
            </div>
        </div>
        <!-- Listing -->
        <div class="mt-4">
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center">
                        <thead>
                        <tr>
                            <th scope="col"><?php echo e(__('Name')); ?></th>
                            <th scope="col"><?php echo e(__('Address')); ?></th>
                            <th scope="col"><?php echo e(__('Managers')); ?></th>
                            <th class="text-center"><?php echo e(__('Employees')); ?></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($locations)  && count($locations) > 0): ?>
                                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td> <?php echo e($location->name); ?> </td>
                                    <td> <?php echo e($location->address); ?> </td>
                                    <td>  <?php echo e($location->countmanager($location->id)); ?> </td>
                                    <td class="text-center"> <?php echo e($location->getCountEmployees()); ?> </td>
                                    <td class="text-right">
                                        <!-- Actions -->
                                        <div class="actions rtl-actions ml-3">
                                            <a href="#" data-ajax-popup="true" data-title="<?php echo e(__('Edit Location')); ?>" data-size="lg"
                                            data-url="<?php echo e(route('locations.edit', $location->id)); ?>"
                                            class="action-item mr-2 "><i class="fas fa-pencil-alt" data-toggle="tooltip" title="<?php echo e(__('Edit Location')); ?>"></i></a>
                                            <a href="#" class="action-item text-danger mr-2 emp_delete " data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" 
                                            data-confirm="<?php echo e(__('Are You Sure?')); ?>|<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                            data-confirm-yes="document.getElementById('delete-form-<?php echo e($location->id); ?>').submit();">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['locations.destroy', $location->id],'id' => 'delete-form-'.$location->id]); ?>

                                            <?php echo Form::close(); ?>

                                            <span class="clearfix"></span>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?> 
                                <tr>
                                    <td colspan="5">
                                        <div class="text-center">
                                            <i class="fas fa-map-marker-alt text-primary fs-40"></i>
                                            <h2><?php echo e(__('Opps...')); ?></h2>
                                            <h6> <?php echo __('No loaction found...!'); ?> </h6>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jovickxe/medtimes.co/resources/views/location/index.blade.php ENDPATH**/ ?>