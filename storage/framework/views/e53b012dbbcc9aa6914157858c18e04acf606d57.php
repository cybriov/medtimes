<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Deleted Employees')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page content -->
    <div class="page-content">
        <!-- Page title -->
        <div class="page-title mb-3">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                    <!-- Page title + Go Back button -->
                    <div class="d-inline-block">
                        <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white"><?php echo e(__('Deleted Employees')); ?></h5>
                    </div>
                    <!-- Additional info -->
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
                    <div class="dropdown btn btn-sm btn-white btn-icon-only rounded-circle ml-1" data-toggle="dropdown" title="<?php echo e(__('Menu')); ?>">
                        <a href="#" class="text-dark" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right employee_menu_listt">
                            <a href="<?php echo e(url('doctors')); ?>" onclick="window.location.href=this;" class="dropdown-item"><?php echo e(__('View Employees')); ?></a>
                            <a href="<?php echo e(url('past-doctors')); ?>" onclick="window.location.href=this;" class="dropdown-item"><?php echo e(__('Deleted Employees')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php if(Auth::user()->type == 'company'): ?>
        <!-- Stats -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h6 class="text-muted mb-1"><?php echo e(__('New doctors this month')); ?></h6>
                                <span class="h5 font-weight-bold mb-0"><?php echo e($box['month_employee']); ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon bg-gradient-warning text-white rounded-circle icon-shape"><i class="fas fa-users"></i></div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="text-nowrap"><?php echo e(__('Total employee : ')); ?>  <?php echo e($box['total_employee']); ?></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h6 class="text-muted mb-1"><?php echo e(__('Current month shifts')); ?></h6>
                                <span class="h5 font-weight-bold mb-0"><?php echo e($box['month_rotas']); ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon bg-gradient-primary text-white rounded-circle icon-shape"><i class="far fa-calendar-alt"></i></div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <!--span class="text-nowrap"><?php echo e(__('Total cost : ')); ?> <?php echo e(\App\User::CompanycurrencySymbol()); ?> <?php echo e($box['month_rotas_cost']); ?></span> &nbsp;&nbsp;-->
                            <span class="text-nowrap"><?php echo e(__('Total time : ')); ?> <?php echo e($box['month_rotas_time']); ?></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h6 class="text-muted mb-1"><?php echo e(__('Current month leave')); ?></h6>
                                <span class="h5 font-weight-bold mb-0"><?php echo e($box['month_leave']); ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon bg-gradient-danger text-white rounded-circle icon-shape"><i class="fas fa-user-alt-slash"></i></div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">                            
                            <span class="text-nowrap"><?php echo e(__('Company leave : ')); ?> <?php echo e($box['month_comapany_leave_use']); ?></span> &nbsp;&nbsp;
                            <span class="text-nowrap"><?php echo e(__('Other leave : ')); ?> <?php echo e($box['month_other_leave_use']); ?></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Listing -->
        <div class="employee_menu">
                <div class="card">

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table align-items-center">
                            <thead>
                            <tr>
                                <th scope="col"><?php echo e(__('Name')); ?></th>
                                <th scope="col"><?php echo e(__('Email')); ?></th>
                                <th scope="col"><?php echo e(__('Added')); ?></th>
                                <th scope="col"><?php echo e(__('Deleted')); ?></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($past_employees) && count($past_employees) > 0): ?>
                                <?php $__currentLoopData = $past_employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $past_employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body ml-4">
                                                    <a href="#" class="name h6 mb-0 text-sm"><?php echo e($past_employee->first_name); ?> <?php echo e($past_employee->last_name); ?></a> <br>
                                                </div>
                                            </div>
                                        </th>
                                        <td> <?php echo e($past_employee->email); ?> </td>
                                        <td> <?php echo e($past_employee->created_at); ?> </td>
                                        <td> <?php echo e($past_employee->deleted_at); ?> </td>
                                        <td class="text-right">
                                            <!-- Actions -->
                                            <div class="actions ml-3">
                                                <a href="#" class="action-item text-danger mr-2 emp_delete " data-toggle="tooltip" data-original-title="<?php echo e(__('Restore')); ?>"
                                                data-confirm="<?php echo e(__('Are You Sure?')); ?>|<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                data-confirm-yes="document.getElementById('restore-form-<?php echo e($past_employee->id); ?>').submit();">
                                                    <i class="fas fa-trash-restore-alt"></i>
                                                </a>
                                                <?php echo Form::open(['method' => 'POST', 'route' => ['employee.restore', $past_employee->id],'id' => 'restore-form-'.$past_employee->id]); ?>

                                                <?php echo Form::close(); ?>

                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <div class="text-center">
                                                <i class="fas fa-user text-primary fs-40"></i>
                                                <h2><?php echo e(__('Opps...')); ?></h2>
                                                <h6> <?php echo __('No user found.'); ?> </h6>
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


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jovickxe/medtimes.co/resources/views/pastemployees/index.blade.php ENDPATH**/ ?>