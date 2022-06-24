<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Role')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page content -->
    <div class="page-content">
        <!-- Page title -->
        <div class="page-title">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                    <!-- Page title + Go Back button -->
                    <div class="d-inline-block">
                        <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white"><?php echo e(__('Role')); ?></h5>
                    </div>
                    <!-- Additional info -->
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
                    <button type="button" class="btn btn-sm btn-white btn-icon-only rounded-circle" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Add New Role')); ?>" title="<?php echo e(__('Add New Role')); ?>"
                            data-url="<?php echo e(route('roles.create')); ?>"><span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                    </button>                    
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
                            <th scope="col"><?php echo e(__('Default Break')); ?></th>
                            <th scope="col" class="text-center"><?php echo e(__('Employees')); ?></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($roles)  && count($roles) > 0): ?>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td> <i class="fas fa-circle" style="color: <?php echo e($role->color); ?>"></i> <?php echo e($role->name); ?> </td>
                                        <td> <?php echo e($role->getDefaultBreack()); ?> <?php echo e(__('Minutes')); ?> </td>
                                        <td class="text-center"> <?php echo e($role->getCountEmployees()); ?> </td>
                                        <td class="text-right">
                                            <!-- Actions -->
                                            <div class="actions rtl-actions ml-3">
                                                <a href="#" data-ajax-popup="true" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>" data-size="lg"
                                                data-url="<?php echo e(route('roles.edit', $role->id)); ?>"
                                                class="action-item mr-2 "><i class="fas fa-pencil-alt"></i></a>

                                                <?php if(empty($role->hasshift())): ?>
                                                    <a href="#" class="action-item text-danger mr-2 emp_delete " data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>"
                                                    data-confirm="<?php echo e(__('Are You Sure?')); ?>|<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                    data-confirm-yes="document.getElementById('delete-form-<?php echo e($role->id); ?>').submit();">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id],'id' => 'delete-form-'.$role->id]); ?>

                                                    <?php echo Form::close(); ?>

                                                <?php else: ?>   
                                                    <a href="#" class="action-item text-danger mr-2 emp_delete hasshiftyes"><i class="fas fa-trash"></i></a>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?> 
                                <tr>
                                    <td colspan="4">
                                        <div class="text-center">
                                            <i class="fas fa-user-tag text-primary fs-40"></i>
                                            <h2><?php echo e(__('Opps...')); ?></h2>
                                            <h6> <?php echo __('No Role found...!'); ?> </h6>
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

<?php $__env->startPush('pagescript'); ?>
<script>
    $(document).on('click','.hasshiftyes', function () {
        show_toastr('Error', '<?php echo e(__("This role has shifts. So remove all shifts of this role.")); ?>', 'error');
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\medtimes\resources\views/role/index.blade.php ENDPATH**/ ?>