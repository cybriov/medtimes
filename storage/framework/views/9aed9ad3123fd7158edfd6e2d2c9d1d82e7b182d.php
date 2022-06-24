<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Day View')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
.ui-datepicker-calendar {
    display: none;
}
</style>
    <div class="page-content">
        <div class="page-title">
            <div class="row justify-content-between align-items-center">
                <div class="col d-flex align-items-center">
                    <h5 class="fullcalendar-title h4 d-inline-block font-weight-400 mb-0 text-white"><?php echo e($cur_year.'-'.$cur_month); ?>

                    </h5> &nbsp;&nbsp;
                    <div class="btn-group" role="group" aria-label="Basic example" data-month="<?php echo e($cur_month); ?>" data-year="<?php echo e($cur_year); ?>">
                        <a class="btn btn-sm btn-neutral date_sub date_click">
                            <i class="fas fa-angle-left"></i>
                        </a>
                        <a class="btn btn-sm btn-neutral date_add date_click">
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 mt-3 mt-lg-0 text-lg-right rtl-home-menu">
                    <div class="d-inline-block">
                        <a href="#" class="btn btn-sm btn-white btn-icon-only rounded-circle shadow-sm day_view_filter_btn" title="filter"> <i
                                class="fa fa-filter"></i> </a>
                    </div>

                    <div class="d-inline-block">
                        <div class="dropdown btn btn-sm btn-white btn-icon-only rounded-circle ml-1" data-toggle="dropdown"
                            title="<?php echo e(__('View')); ?>">
                            <a href="#" class="text-dark" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="fas fa-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right employee_menu_listt dropdown-menulist-scroll">
                                <a href="<?php echo e(url('dashboard')); ?>"
                                    class="dropdown-item <?php echo e(Request::segment(1) == 'dashboard' ? 'calender_active' : ''); ?>"
                                    onclick="window.location.href=this;"><?php echo e(__('Calendar View')); ?></a>
                                <a href="<?php echo e(url('day')); ?>"
                                    class="dropdown-item <?php echo e(Request::segment(1) == 'day' ? 'calender_active' : ''); ?>"
                                    onclick="window.location.href=this;"><?php echo e(__('Daily View')); ?></a>
                                <a href="<?php echo e(url('user-view')); ?>" 
                                    class="dropdown-item <?php echo e(Request::segment(1) == 'user-view' ? 'calender_active' : ''); ?>"
                                    onclick="window.location.href=this;"><?php echo e(__('User View')); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card day_view_filter" style="display: none;">
            <div class="card-body p-3 m-0 mt-2">
                <div class="row">
                    <div class="form-group col-md-3 mb-0">
                        <?php echo e(Form::label('', __('Date'), ['class' => 'form-control-label'])); ?>

                        <input type="month" class="rota_date form-control h_40i" style="height: 40px;" id="datepicker" value="<?php echo e($cur_year.'-'.$cur_month); ?>">
                    </div>
                    <div class="form-group col-md-3 mb-0 cus_select_h_40">
                        <?php echo e(Form::label('', __('Employee'), ['class' => 'form-control-label'])); ?>

                        <?php echo Form::select('emp_name[]', $employee_data, null, ['required' => false, 'multiple' => 'multiple', 'class'=> 'form-control js-multiple-select emp_name']); ?>

                    </div>
                    <div class="form-group col-md-3 mb-0 cus_select_h_40">
                        <?php echo e(Form::label('', __('Location'), ['class' => 'form-control-label'])); ?>

                        <?php echo Form::select('loaction_name[]', $location_option, null, ['required' => false, 'multiple' => 'multiple', 'class'=> 'form-control js-multiple-select loaction_name']); ?>

                    </div>
                    <div class="form-group col-md-3 mb-0 cus_select_h_40">
                        <?php echo e(Form::label('', __('Role'), ['class' => 'form-control-label'])); ?>

                        <?php echo Form::select('role_name[]', $role_option, null, ['required' => false, 'multiple' => 'multiple', 'class'=> 'form-control js-multiple-select role_name']); ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="card  m-0 mt-4">
            <!-- Card header -->
            <div class="card-header actions-toolbar border-0">
                <div class="row justify-content-between align-items-center">
                    <div class="col">
                        <h6 class="d-inline-block mb-0"><?php echo e(__('User View')); ?></h6>
                    </div>
                    <div class="col text-right">
                    </div>
                </div>
            </div>
            <!-- Table -->
            <div class="table-responsive day_view_tbl">
                <table class="table align-items-center">
                    <thead>
                        <tr>
                            <th><?php echo e(__('Name')); ?></th>
                            <th><?php echo e(__('Date')); ?></th>
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
                                                    class="d-block name h6 mb-0 text-sm"><?php echo e(!empty($rota->getrotauser->first_name) ? $rota->getrotauser->first_name : ''); ?>

                                                    <?php if($rota->is_call == 1): ?>
                                                        <sup class="badge1" style="background-color: #8492a6;">OT</sup>
                                                    <?php endif; ?>
                                                </a>
                                                <div class="d-inline-block day_view_dot"
                                                    style="background-color: <?php echo e((!empty($rota->getrotarole->color)) ? $rota->getrotarole->color : ''); ?>"></div>
                                                <small class="d-inline-block font-weight-bold"><?php echo e((!empty($rota->getrotarole)) ? $rota->getrotarole->name : __('')); ?></small>
                                                
                                            </div>
                                        </div>
                                    </th>
                                    <td> <?php echo e($rota->rotas_date); ?> </td>
                                    <td> <?php echo e(\App\User::CompanyTimeFormat($rota->start_time)); ?> -
                                        <?php echo e(\App\User::CompanyTimeFormat($rota->end_time)); ?> </td>
                                    <td> <?php echo e($rota->break_time . __('Min')); ?> </td>
                                    <td> <?php echo e($rota->getrotalocation->name); ?> </td>
                                    <!--td> <?php echo e($rota->rota_cost($rota)); ?> </td-->
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">
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
            </div>
        </div>


    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('pagescript'); ?>
    <script>
        $(document).on('click', '.day_view_filter_btn', function(e) {
            $('.day_view_filter').slideToggle(500);
        });

        $(document).on('click', '.date_click', function(e) {
            var rota_date = $('.rota_date').val()+'-01';
            var rota_date12 = $('.rota_date').val();
            var futureMonth = rota_date12;
            if($(this).hasClass('date_sub'))
            {
               var futureMonth = moment(rota_date).subtract(1, 'month').format("YYYY-MM");               
            }
            if($(this).hasClass('date_add'))
            {
                var futureMonth = moment(rota_date).add(1, 'month').format("YYYY-MM");
            }
            $('.rota_date').val(futureMonth);
            $('.fullcalendar-title').html(futureMonth);
            $('.rota_date').trigger('change');
        });
        
        $(document).on('change', '.emp_name', function(e) {
            var date_type = 'date';
            dayviewfilter(date_type);
        });
        
        $(document).on('change', '.loaction_name', function(e) {
            var date_type = 'date';
            dayviewfilter(date_type);
        });
        
        $(document).on('change', '.role_name', function(e) {
            var date_type = 'date';
            dayviewfilter(date_type);
        });
        
        $(document).on('change', '.rota_date', function(e) {
            var date_type = 'date';
            dayviewfilter(date_type);
        });

        function dayviewfilter(date_type = 'date') {
            var date = $('.rota_date').val();
            var emp_name = $('.emp_name').val();
            var loaction_name = $('.loaction_name').val();
            var role_name = $('.role_name').val();

            var data = {
                date            : date,
                date_type       : date_type,
                emp_name        : emp_name,
                loaction_name   : loaction_name,
                role_name       : role_name,
            }

            $.ajax({
                url: '<?php echo e(route('userviewfilter')); ?>',
                method: 'POST',
                data: data,
                success: function (data)
                {
                    $('.day_view_tbl').html(data.returnHTML);                    
                }
            });
        }

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jovickxe/medtimes.co/resources/views/dashboard/Userview.blade.php ENDPATH**/ ?>