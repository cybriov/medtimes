<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Availability')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('availabilitylink'); ?>    
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/jquery-schedule-master/dist/jquery.schedule.css')); ?>">    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page content -->
    <div class="page-content">
        <!-- Page title -->
        <div class="page-title">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                    <div class="d-inline-block">
                        <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white"><?php echo e(__('Availability')); ?></h5>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
                    <button type="button" class="btn btn-sm btn-white btn-icon-only rounded-circle add_schedule" title="<?php echo e(__('Add New Availability')); ?>" data-size="xl" data-ajax-popup="true" data-title="<?php echo e(__('Add New Availability Pattern')); ?>"
                    data-url="<?php echo e(route('availabilities.create')); ?>"><span class="btn-inner--icon"><i class="fas fa-plus"></i></span></button>

                    <?php if(Auth::user()->acount_type == 1): ?>
                    <div class='w-30'>
                        <?php echo Form::select('user_id', $filter_employees, null, ['required' => true,  'data-placeholder'=> 'Yours Placeholder' ,'class'=> 'form-control js-single-select search-user-ava']); ?>

                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="mt-4">
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center avalabilty_table">
                        <thead>
                        <tr>
                            <?php if(Auth::user()->type == 'company'): ?>
                                <th scope="col"><?php echo e(__('Name')); ?></th>
                            <?php endif; ?>
                            <th scope="col"><?php echo e(__('Title')); ?></th>
                            <th scope="col"><?php echo e(_('Effective Dates')); ?></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($availabilitys) && count($availabilitys) > 0): ?>
                                <?php $__currentLoopData = $availabilitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $availability): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-id="<?php echo e($availability->user_id); ?>">
                                        <?php if(Auth::user()->type == 'company'): ?>
                                            <td> <?php echo e($availability->getUserInfo->first_name); ?> <?php echo e($availability->getUserInfo->last_name); ?></td>
                                        <?php endif; ?>
                                        <td> <?php echo e($availability->name); ?></td>
                                        <td> <?php echo e($availability->getAvailabilityDate()); ?> </td>
                                        <td class="text-right rtl-actionsi">                                        
                                            <button type="button" class="btn-white rounded-circle border-0 edit_schedule" data-availability-json="<?php echo e($availability->availability_json); ?>">
                                                <span class="btn-inner--icon action-item">
                                                    <a href="#" data-ajax-popup="true" data-title="<?php echo e(__('Edit Request')); ?>" data-size="xl"
                                                    data-url="<?php echo e(route('availabilities.edit', $availability->id)); ?>"
                                                    class="action-item "><i class="fas fa-pencil-alt" data-toggle="tooltip" title="<?php echo e(__('Edit')); ?>"></i></a>
                                                </span>
                                            </button>

                                            <button type="button" class="btn-white rounded-circle border-0">
                                                <span class="btn-inner--icon action-item text-danger">
                                                    <a href="#" class="action-item text-danger" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>"
                                                    data-confirm="<?php echo e(__('Are You Sure?')); ?>|<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                    data-confirm-yes="document.getElementById('delete-form-<?php echo e($availability->id); ?>').submit();">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </span>
                                            </button>
                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['availabilities.destroy', $availability->id],'id' => 'delete-form-'.$availability->id]); ?>

                                            <?php echo Form::close(); ?>

                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?> 
                                <tr>
                                    <?php if(Auth::user()->type == 'company'): ?>                                    
                                    <td colspan="4">
                                    <?php else: ?>
                                    <td colspan="3">
                                    <?php endif; ?>
                                        <div class="text-center">
                                            <i class="fas fa-file text-primary fs-40"></i>
                                            <h2><?php echo e(__('Opps...')); ?></h2>
                                            <h6> <?php echo __('No availability found...!'); ?> </h6>
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

<?php $__env->startSection('availabilityscriptlink'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script id="add_schedule" src="<?php echo e(asset('assets/libs/jquery-schedule-master/dist/jquery.schedule.js')); ?>" data-src="<?php echo e(asset('assets/libs/jquery-schedule-master/dist/jquery.schedule.js')); ?>"></script>
    <script id="edit_schedule" src="<?php echo e(asset('assets/libs/jquery-schedule-master/dist/jquery.scheduleedit.js')); ?>" data-src="<?php echo e(asset('assets/libs/jquery-schedule-master/dist/jquery.scheduleedit.js')); ?>"  ></script>
    <script>
    function availabilitytablejs(){
        $('#schedule4').jqs({
            periodColors: [
                ['rgba(0, 200, 0, 0.5)', '#0f0', '#000'],
                ['rgba(200, 0, 0, 0.5)', '#f00', '#000'],
            ],
            periodTitle: '',
            periodBackgroundColor: 'rgba(0, 200, 0, 0.5)',
            periodBorderColor: '#000',
            periodTextColor: '#fff',
            periodRemoveButton: 'Remove please !',
            onRemovePeriod:function (period, jqs) { },
            onAddPeriod:function (period, jqs) { },
            onClickPeriod:function (period, jqs) { },
            onDuplicatePeriod:function (event, period, jqs) { },
            onPeriodClicked:function (event, period, jqs) { }
        });
    }

    function editavailabilitytablejs(data = []) {
        $('#schedule5').jqs({
            data: data,
            days: 7,
            periodColors: [
                ['rgba(0, 200, 0, 0.5)', '#0f0', '#000'],
                ['rgba(200, 0, 0, 0.5)', '#f00', '#000'],
            ],
            periodTitle: '',
            periodBackgroundColor: 'rgba(0, 200, 0, 0.5)',
            periodBorderColor: '#000',
            periodTextColor: '#fff',
            periodRemoveButton: 'Remove please !',            
            onRemovePeriod:function (period, jqs) { },
            onAddPeriod:function (period, jqs) { },
            onClickPeriod:function (period, jqs) { },
            onDuplicatePeriod:function (event, period, jqs) { },
            onPeriodClicked:function (event, period, jqs) { }
        });
    }
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('pagescript'); ?>
<script>
    $(document).ready(function() {
        $(document).on('change','.search-user-ava', function () {
            var value = $(this).val();
            $('.avalabilty_table tbody>tr').hide();
            if(value == 'all0')
            {
                $('.avalabilty_table tbody>tr').show();
            }
            else
            {
                $('.avalabilty_table tbody>tr[data-id="'+value+'"]').show();
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\medtimes\resources\views/availability/index.blade.php ENDPATH**/ ?>