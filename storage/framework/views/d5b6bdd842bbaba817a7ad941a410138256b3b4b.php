<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Employee')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page content -->
    <div class="page-content">
        <!-- Page title -->
        <div class="page-title mb-3">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                   
                    <div class="d-inline-block">
                        <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white"><?php echo e(__('Employees')); ?></h5>
                    </div>
                   
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">                    
                    <button type="button" class="btn btn-sm btn-white btn-icon-only rounded-circle" title="<?php echo e(__('Add New Employee')); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Add New Employee')); ?>"
                            data-url="<?php echo e(route('employees.create')); ?>"><span class="btn-inner--icon"><i class="fas fa-plus"></i></span></button>

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
        
        <div class="employee_menu view_employee">
                <div class="card">                    
                    <div class="card-header actions-toolbar border-0">
                        <div class="row justify-content-between align-items-center">
                            <div class="col">
                                <h6 class="d-inline-block mb-0 text-capitalize"><?php echo e(__('Employees')); ?></h6>
                            </div>
                            <div class="col text-right">
                                <div class="actions rtl-actions">                                  
                                    <div class="rounded-pill d-inline-block search_round">
                                        <div class="input-group input-group-sm input-group-merge input-group-flush">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-transparent"><i class="fas fa-search"></i></span>
                                            </div>
                                            <input type="text" id="user_keyword" class="form-control form-control-flush search-user" placeholder="<?php echo e(__('Search User')); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table align-items-center employee_tableese">
                            <thead>
                            <tr>
                                <th scope="col"><?php echo e(__('Name')); ?></th>
                                <th scope="col"><?php echo e(__('Rank')); ?></th>
                                <th scope="col"><?php echo e(__('Persal Number')); ?></th>
                                <th scope="col"><?php echo e(__('Email')); ?></th>
                                <th scope="col"><?php echo e(__('Location')); ?></th>
                                <th scope="col"><?php echo e(__('Role')); ?></th>
                                <th scope="col"><?php echo e(__('Weekly Hours')); ?></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($employees)  && count($employees) > 0): ?>                                
                                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr data-name="<?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?>">
                                            <th>
                                                <a href="#" class="name h6 mb-0 text-sm"><?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?></a> <br>
                                                <?php if($employee->type == 'company'): ?>
                                                    <span class="badge badge-xs badge-primary"> <?php echo e(__('Administrator')); ?> </span>
                                                <?php elseif($employee->acount_type == 1): ?>
                                                    <span class="badge badge-xs badge-success"> <?php echo e(__('Admin')); ?> </span>
                                                <?php elseif($employee->acount_type == 2): ?>
                                                    <span class="badge badge-xs badge-info"> <?php echo e(__('Manager')); ?> </span>
                                                <?php endif; ?>
                                            </th>
                                            <td> <?php echo e($employee->rank); ?> </td>
                                            <td> <?php echo e($employee->persal_no); ?> </td>
                                            <td> <?php echo e($employee->email); ?> </td>
                                            <td> <?php echo e($employee->getLocatopnName($employee->id)); ?> </td>
                                            <td> <?php echo $employee->getDefaultEmployeeRole($employee->id); ?>  </td>
                                            <td> <?php echo e($employee->getweeklyhours($employee->id)); ?> </td>
                                            <td class="text-right">
                                                <div class="actions rtl-actions ml-3">
                                                    <?php if($employee->type != 'company' && Auth::user()->type == 'company'): ?>
                                                    <button type="button" class="btn-white rounded-circle border-0 <?php echo e(($employee->password == '') ? 'd-none' : ''); ?> bg-transparent">
                                                        <a href="#" data-ajax-popup="true" data-title="<?php echo e(__('Manage user type')); ?>" data-size="lg"
                                                        data-url="<?php echo e(route('employee.manage_permission',$employee->id)); ?>"
                                                        class="action-item"><i class="fas fa-cogs" data-toggle='tooltip' title="<?php echo e(__('Manage user type')); ?>"></i>
                                                        </a>
                                                    </button>
                                                    <?php endif; ?>

                                                    <?php if($employee->password == ''): ?>
                                                    <button type="button" class="btn-white rounded-circle border-0 <?php echo e(($employee->password != '') ? 'd-none' : ''); ?> bg-transparent">
                                                        <a href="#" data-ajax-popup="true" data-title="<?php echo e(__('Manage type')); ?>" data-size="lg"
                                                        data-url="<?php echo e(route('employee.set_password',$employee->id)); ?>"
                                                        class="action-item">                                                        
                                                        <i class="fas fa-key" data-toggle='tooltip' title="<?php echo e(__('Set Password')); ?>"></i> 
                                                        </a>
                                                    </button>                                                    
                                                    <?php endif; ?>

                                                    <button type="button" class="btn-white rounded-circle border-0 bg-transparent">
                                                        <a href="<?php echo e(url('profile/'.Crypt::encrypt($employee->id).'')); ?>" class="action-item" data-toggle="tooltip" title="<?php echo e(__('Edit')); ?>">
                                                        
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                    </button>                                                    
                                                    <?php if( $employee->acount_type != 1): ?>
                                                    <button type="button" class="btn-white rounded-circle border-0 bg-transparent">
                                                        <a href="#" class="action-item text-danger" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>"
                                                        data-confirm="<?php echo e(__('Are You Sure?')); ?>|<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                        data-confirm-yes="document.getElementById('delete-form-<?php echo e($employee->id); ?>').submit();">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </button>
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['employees.destroy', $employee->id],'id' => 'delete-form-'.$employee->id]); ?>

                                                    <?php echo Form::close(); ?>

                                                    <?php endif; ?>                                                    
                                                    <span class="clearfix"></span>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?> 
                                <tr>
                                    <td colspan="7">
                                        <div class="text-center">
                                            <i class="fas fa-users text-primary fs-40"></i>
                                            <h2><?php echo e(__('Opps...')); ?></h2>
                                            <h6> <?php echo __('No Employee found...!'); ?> </h6>
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
        $(document).on('keyup','.search-user', function () {
            var value = $(this).val();
            $('.employee_tableese tbody>tr').each(function( index ) {
                var name = $(this).attr('data-name');
                if(name.includes(value)) {
                    $(this).show();
                } else  {
                    $(this).hide();
                }
            });
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jovickxe/medtimes.co/resources/views/employee/index.blade.php ENDPATH**/ ?>