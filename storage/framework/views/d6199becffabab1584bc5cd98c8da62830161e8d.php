<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Leave Request')); ?>

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
                        <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white"><?php echo e(__('Leave Requests')); ?></h5>
                    </div>
                    <!-- Additional info -->
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
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
        <!-- Listing -->
        <div class="mt-4">
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center">
                        <thead>
                        <tr>
                            <th scope="col"><?php echo e(__('Employee')); ?></th>
                            <th scope="col"><?php echo e(__('Message')); ?></th>
                            <th scope="col"><?php echo e(__('Requested')); ?></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($leave_requests)  && count($leave_requests) > 0): ?>
                                <?php $__currentLoopData = $leave_requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave_request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <h5 class="m-0">
                                                <?php echo e($leave_request->getUserIdName->first_name); ?>

                                                <?php echo e($leave_request->getUserIdName->last_name); ?>

                                            </h5>
                                            <small><b><?php echo e($leave_request->getRequestdatebetween()); ?></b></small>
                                        </td>
                                        <td> <div class="white-space-break"><?php echo e($leave_request->message); ?> </div> </td>
                                        <td> <?php echo e($leave_request->getRequestdateFormet()); ?> </td>
                                        <td> <?php echo $leave_request->getRequestResponse(); ?> </td>
                                        <td>
                                            
                                            <button type="button" class="btn-white rounded-circle border-0 <?php echo e($leave_request->getLeaveApprovalStatus()); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Leave Request Reply')); ?>"
                                            data-url="<?php echo e(route('leave-request.reply',$leave_request->id)); ?>"
                                            ><span class="btn-inner--icon action-item"><i class="fas fa-reply pointer"></i></span></button>

                                            
                                            <button type="button" class="btn-white rounded-circle border-0 <?php echo e($leave_request->getLeaveApprovalStatus()); ?>">
                                                <span class="btn-inner--icon action-item">
                                                    <a href="#" data-ajax-popup="true" data-title="<?php echo e(__('Edit Request')); ?>" data-size="lg"
                                                data-url="<?php echo e(route('leave-request.edit', $leave_request->id)); ?>"
                                                class="action-item "><i class="fas fa-pencil-alt"></i></a>
                                                </span>
                                            </button>

                                            
                                            <button type="button" class="btn-white rounded-circle border-0 <?php echo e($leave_request->getLeaveApprovalStatus()); ?>">
                                                <span class="btn-inner--icon action-item text-danger">
                                                    <a href="#" class="action-item text-danger" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>"
                                                    data-confirm="<?php echo e(__('Are You Sure?')); ?>|<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                    data-confirm-yes="document.getElementById('delete-form-<?php echo e($leave_request->id); ?>').submit();">
                                                    <i class="fas fa-trash"></i>
                                                    </a>
                                                </span>
                                            </button>
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['leave-request.destroy', $leave_request->id],'id' => 'delete-form-'.$leave_request->id]); ?>

                                        <?php echo Form::close(); ?>

                                        </td>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?> 
                            <tr>
                                <td colspan="4">
                                    <div class="text-center">
                                        <i class="fas fa-user-slash text-primary fs-40"></i>
                                        <h2><?php echo e(__('Opps...')); ?></h2>
                                        <h6> <?php echo __('No leave request found...!'); ?> </h6>
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
        $(document).ready(function() {
        });
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jovickxe/medtimes.co/resources/views/leaverequest/index.blade.php ENDPATH**/ ?>