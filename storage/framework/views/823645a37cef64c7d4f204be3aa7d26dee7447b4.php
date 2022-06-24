<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Embargo')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page content -->
    <div class="page-content">
        <!-- Page title -->
        <div class="page-title">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">                    
                    <div class="d-inline-block">
                        <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white"><?php echo e(__('Leave Embargoes')); ?></h5>
                    </div>
                    
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
                    <button type="button" class="btn btn-sm btn-white btn-icon-only rounded-circle" title="<?php echo e(__('Add New Embargoes')); ?>"  data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Add New Embargoes')); ?>"
                    data-url="<?php echo e(route('embargoes.create')); ?>"><span class="btn-inner--icon"><i class="fas fa-plus"></i></span></button>

                    <?php if(Auth::user()->acount_type == 1 || Auth::user()->acount_type == 2 ): ?>
                    <div class="dropdown btn btn-sm btn-white btn-icon-only rounded-circle ml-1" data-toggle="dropdown" title="<?php echo e(__('Menu')); ?>">
                        <a href="#" class="text-dark" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right employee_menu_listt dropdown-menulist-scroll">
                            <a href="<?php echo e(url('holidays')); ?>" onclick="window.location.href=this;" class="dropdown-item" id="view_employee"><?php echo e(__('View All Leave')); ?></a>
                            <?php if(Auth::user()->acount_type == 1 || $haspermission['embargoes'] == 1): ?>
                            <a href="<?php echo e(url('embargoes')); ?>" onclick="window.location.href=this;" class="dropdown-item" id="removed_employee"><?php echo e(__('Embargoes')); ?></a>
                            <?php endif; ?>
                            <?php if(Auth::user()->acount_type == 1): ?>
                            <a href="<?php echo e(url('rules')); ?>" onclick="window.location.href=this;" class="dropdown-item d-none" id="edit_group"><?php echo e(__('Request Rules')); ?></a>
                            <?php endif; ?>
                            <?php if(Auth::user()->acount_type == 1 || $haspermission['leave_request'] == 1): ?>
                            <a href="<?php echo e(url('leave-request')); ?>" onclick="window.location.href=this;" class="dropdown-item" id="edit_group"><?php echo e(__('Leave Request')); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="mt-4">
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center">
                        <thead>
                        <tr>
                            <th scope="col"><?php echo e(__('Date')); ?></th>
                            <th scope="col"><?php echo e(__('Applies To')); ?></th>
                            <th scope="col"><?php echo e(__('Message')); ?></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($employees)  && count($employees) > 0): ?>
                                <?php $__currentLoopData = $embargoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $embargoe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td> <?php echo $embargoe->getDateBetween(); ?> </td>
                                        <td> <?php echo $embargoe->getCountEmployee(); ?> </td>
                                        <td> <?php echo e($embargoe->message); ?> </td>
                                        <td class="text-right">
                                            
                                            <div class="actions ml-3">
                                                <a href="#" data-ajax-popup="true" data-title="<?php echo e(__('Edit Embargoe')); ?>" data-size="lg"
                                                data-url="<?php echo e(route('embargoes.edit', $embargoe->id)); ?>"
                                                class="action-item mr-2 "><i class="fas fa-pencil-alt"></i></a>

                                                <a href="#" class="action-item text-danger mr-2 " data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>"
                                                data-confirm="<?php echo e(__('Are You Sure?')); ?>|<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                data-confirm-yes="document.getElementById('delete-form-<?php echo e($embargoe->id); ?>').submit();">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['embargoes.destroy', $embargoe->id],'id' => 'delete-form-'.$embargoe->id]); ?>

                                            <?php echo Form::close(); ?>

                                            <span class="clearfix"></span>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?> 
                            <tr>
                                <td colspan="4">
                                    <div class="text-center">
                                        <i class="fas fa-clock text-primary fs-40"></i>
                                        <h2><?php echo e(__('Opps...')); ?></h2>
                                        <h6> <?php echo __('No embargoes found...!'); ?> </h6>
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


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jovickxe/medtimes.co/resources/views/embargoes/index.blade.php ENDPATH**/ ?>