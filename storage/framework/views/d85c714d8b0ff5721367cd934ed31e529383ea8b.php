<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Leave')); ?>

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
                        <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white"><?php echo e(__('Leave')); ?></h5>
                    </div> &nbsp;&nbsp;&nbsp;
                    <div class="d-inline-block text-white">
                        <i class="fa fa-caret-left weak-prev-left weak-prev1 weak_go1"></i>
                        &nbsp;<span class="weak_go_html1 weak_go_html2"><?php echo e($week_date[0].' - '.$week_date[6]); ?></span>&nbsp;
                        <i class="fa fa-caret-right weak-prev-left weak-left1 weak_go1"></i>
                        <input type="hidden" data-start="<?php echo e($week_date['week_start']); ?>" data-end="<?php echo e($week_date['week_end']); ?>"  class="week_last_daye1">
                        <input type="hidden" value="0" data-created-by="<?php echo e($created_by); ?>" class="week_add_sub1">
                    </div>
                    <!-- Additional info -->
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
                    <label href="#" class="btn btn-sm btn-white btn-icon-only rounded-circle mb-0 pointer d-none" for="upload_leave_file">
                        <span class="btn-inner--icon"> <i class="fas fa-upload"></i> </span>
                    </label>
                    <input type="file" id="upload_leave_file" class="hide">
                    <a href="#" class="btn btn-sm btn-white btn-icon-only rounded-circle d-none">
                        <span class="btn-inner--icon"><i class="fas fa-cloud-download-alt"></i></span>
                    </a>

                    <?php if(Auth::user()->acount_type == 1 || $haspermission['leave_request'] == 1): ?>
                        <?php if($leave_status_requests > 0): ?>
                            <a href="<?php echo e(url('leave-request')); ?>" class="btn btn-sm btn-white btn-icon-only w-auto px-3"><span class="btn-inner--icon"><?php echo e($leave_status_requests.' '.__('Leave requests available')); ?></span></a>
                        <?php endif; ?>
                    <?php endif; ?>
                    
                    <button type="button" class="btn btn-sm btn-white btn-icon-only rounded-circle" title="<?php echo e(__('Add New Leave')); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Add Employee Leave')); ?>"
                        data-url="<?php echo e(route('holidays.create')); ?>"><span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                    </button>

                    <?php if(Auth::user()->acount_type == 1 || Auth::user()->acount_type == 2 ): ?>
                    <div class="dropdown btn btn-sm btn-white btn-icon-only rounded-circle ml-1" data-toggle="dropdown" title="<?php echo e(__('Menu')); ?>">
                        <a href="#" class="text-dark" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right employee_menu_listt dropdown-menulist-scroll">
                            <a href="<?php echo e(url('holidays')); ?>" onclick="window.location.href=this;" class="dropdown-item" id="view_employee"><?php echo e(__('View All Leave')); ?></a>
                            <?php if(Auth::user()->acount_type == 1 || $haspermission['embargoes'] == 1): ?>
                            <!--a href="<?php echo e(url('embargoes')); ?>" onclick="window.location.href=this;" class="dropdown-item" id="removed_employee"><?php echo e(__('Embargoes')); ?></a-->
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
                <div class="card-wrapper project-timesheet overflow-auto">
                    <table class="table ajax-table">
                        <thead>
                        <tr class="text-center week_go_table1">
                            <th></th>
                            <!--th><?php echo e(__('Holiday Allowance')); ?></th>
                            <th><?php echo e(__('Holiday Used')); ?></th>
                            <th><?php echo e(__('Holiday Remaining')); ?></th-->
                            <th><span><?php echo e(date('D', strtotime($week_date[0]))); ?></span><br><span><?php echo e($week_date[0]); ?></span></th>
                            <th><span><?php echo e(date('D', strtotime($week_date[1]))); ?></span><br><span><?php echo e($week_date[1]); ?></span></th>
                            <th><span><?php echo e(date('D', strtotime($week_date[2]))); ?></span><br><span><?php echo e($week_date[2]); ?></span></th>
                            <th><span><?php echo e(date('D', strtotime($week_date[3]))); ?></span><br><span><?php echo e($week_date[3]); ?></span></th>
                            <th><span><?php echo e(date('D', strtotime($week_date[4]))); ?></span><br><span><?php echo e($week_date[4]); ?></span></th>
                            <th><span><?php echo e(date('D', strtotime($week_date[5]))); ?></span><br><span><?php echo e($week_date[5]); ?></span></th>
                            <th><span><?php echo e(date('D', strtotime($week_date[6]))); ?></span><br><span><?php echo e($week_date[6]); ?></span></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($employees)  && count($employees) > 0): ?>
                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="text-center" data-id="<?php echo e($employee->id); ?>">
                                        <td><?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?></td>
                                        <!--td><span class="create_time_sheet"><?php echo $employee->getAnnualHoliday($employee->id); ?></span></td>
                                        <td><span class="create_time_sheet"><?php echo $employee->getUsedHoliday($employee->id); ?></span></td>
                                        <td><span class="create_time_sheet"><?php echo $employee->getRemaingHoliday($employee->id); ?></span></td-->
                                        <?php echo $employee->getHasLeave($employee->id,0); ?>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?> 
                            <tr>
                                <td colspan="11">
                                    <div class="text-center">
                                        <i class="fas fa-user-slash text-primary fs-40"></i>
                                        <h2><?php echo e(__('Opps...')); ?></h2>
                                        <h6> <?php echo __('No data found...!'); ?> </h6>
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
        $('body').on('click','.delete_leave_ppp', function () {            
            $( ".delete_leave_form" ).submit();
            loadConfirm();            
        });

        $(document).on('click','.weak_go1', function () {
            ajaxLeaveTimesheetTableView();
            
            $('[data-toggle="tooltip"]').tooltip();
            loadConfirm();
        });
    });

    function ajaxLeaveTimesheetTableView() {
        var start_date = $('.week_last_daye1').attr('data-start');
        var end_date = $('.week_last_daye1').attr('data-end');
        var week = $('.week_add_sub1').val();
        var created_by = $('.week_add_sub1').attr('data-created-by');
        var data = {
            start_date: start_date,
            end_date: end_date,
            week: week,
            created_by: created_by,
        }

        $.ajax({
            url: '<?php echo e(route('holidays.leave_sheet')); ?>',
            method: 'post',
            data: data,
            success: function (data)
            {
                $('.ajax-table').html(data.table);
                $('.weak_go_html1').html(data.title);

                $('[data-toggle="tooltip"]').tooltip();
                loadConfirm();
            }
        });
    }
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jovickxe/medtimes.co/resources/views/leave/index.blade.php ENDPATH**/ ?>