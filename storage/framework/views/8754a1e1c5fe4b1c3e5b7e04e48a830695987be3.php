<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Setting')); ?>

<?php $__env->stopSection(); ?>
<?php
    $logo=asset(Storage::url('uploads/logo/'));
    $company_logo = \App\Utility::getValByName('company_logo');
    $company_small_logo=\App\Utility::getValByName('company_small_logo');
    $company_favicon= \App\Utility::getValByName('company_favicon');
    $lang=\App\Utility::getValByName('default_language');
?>

<?php $__env->startSection('content'); ?>

    <!-- Page content -->
    <div class="page-content">
        <!-- Page title -->
        <div class="page-title">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                    <div class="d-inline-block">
                        <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white"><?php echo e(__('Setting')); ?></h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- Listing -->        
        <div class="mt-4">
            <!-- rotas setting -->
            <div class="card">                
                <ul class="nav nav-tabs nav-overflow profile-tab-list" role="tablist">
                    <li class="nav-item ml-4">
                        <a href="#dashbord_setting" id="dashbord_setting_tab" class="nav-link active" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">
                            <i class="fas fa-user mr-2"></i><?php echo e(__('Dashbord Setting')); ?>

                        </a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="#site_setting" id="site_setting_tab" class="nav-link" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">
                            <i class="far fa-building mr-2"></i><?php echo e(__('Site Setting')); ?>

                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="dashbord_setting" role="tabpanel" aria-labelledby="orders-tab">                        
                        <div class="card-body">
                            <?php echo e(Form::model($profile, ['route' => ['setting.update', $profile->id], 'method' => 'PUT', 'class'=>"permission_table_information" ])); ?>

                                <?php echo e(Form::hidden('employee_id', $profile->user_id)); ?>

                                <?php echo e(Form::hidden('form_type', 'rotas_setting')); ?>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h5 class=" h6 mb-1"><?php echo e(__('Rota Settings')); ?></h5>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="custom-control custom-checkbox d-inline-block mx-2">
                                            <?php echo Form::checkbox('emp_show_rotas_price', 1, (!empty($company_setting['emp_show_rotas_price'])) ? 1 : 0 , ['required' => false, 'class'=> 'custom-control-input','id' => 'emp_show_rotas_price']);; ?>

                                            <?php echo e(Form::label('emp_show_rotas_price', __('Show employee rotas price'), ['class' => 'custom-control-label'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="custom-control custom-checkbox d-inline-block mx-2">
                                            <?php echo Form::checkbox('emp_show_avatars_on_rota', 1, (!empty($company_setting['emp_show_avatars_on_rota'])) ? 1 : 0 , ['required' => false, 'class'=> 'custom-control-input','id' => 'emp_show_avatars_on_rota']);; ?>

                                            <?php echo e(Form::label('emp_show_avatars_on_rota', __('Show employee avatars on rota'), ['class' => 'custom-control-label'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="custom-control custom-checkbox d-inline-block mx-2">
                                            <?php echo Form::checkbox('emp_hide_rotas_hour', 1, (!empty($company_setting['emp_hide_rotas_hour'])) ? 1 : 0 , ['required' => false, 'class'=> 'custom-control-input','id' => 'emp_hide_rotas_hour']);; ?>

                                            <?php echo e(Form::label('emp_hide_rotas_hour', __('Hide employee rotas hour'), ['class' => 'custom-control-label'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="custom-control custom-checkbox d-inline-block mx-2">
                                            <?php echo Form::checkbox('include_unpublished_shifts', 1, (!empty($company_setting['include_unpublished_shifts'])) ? 1 : 0 , ['required' => false, 'class'=> 'custom-control-input','id' => 'include_unpublished_shifts']);; ?>

                                            <?php echo e(Form::label('include_unpublished_shifts', __('Include unpublished shifts on the dashboard and report'), ['class' => 'custom-control-label'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="custom-control custom-checkbox d-inline-block mx-2">
                                            <?php echo Form::checkbox('emp_only_see_own_rota', 1, (!empty($company_setting['emp_only_see_own_rota'])) ? 1 : 0, ['required' => false, 'class'=> 'custom-control-input','id' => 'emp_only_see_own_rota']);; ?>

                                            <?php echo e(Form::label('emp_only_see_own_rota', __('Employees only see themselves on the rota'), ['class' => 'custom-control-label'])); ?>

                                        </div>
                                    </div>                    
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="custom-control custom-checkbox d-inline-block mx-2">
                                            <?php echo Form::checkbox('emp_can_see_all_locations', 1, (!empty($company_setting['emp_can_see_all_locations'])) ? 1 : 0 , ['required' => false, 'class'=> 'custom-control-input','id' => 'emp_can_see_all_locations']);; ?>

                                            <?php echo e(Form::label('emp_can_see_all_locations', __('Employees can view the rotas of locations they are not assigned to'), ['class' => 'custom-control-label'])); ?>

                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-2">
                                                <?php echo e(Form::label('', __('Week Starts'), ['class' => 'form-control-label'])); ?>

                                                <?php echo Form::select('company_week_start', ['monday' => __('Monday'), 'tuesday' => __('Tuesday'), 'wednesday' => __('Wednesday'), 'thursday' => __('Thursday'), 'friday' => __('Friday'), 'saturday' => __('Saturday'), 'sunday' => __('Sunday')], (!empty($company_setting['company_week_start'])) ? $company_setting['company_week_start'] : null, ['required' => true, 'data-placeholder'=> __('Select Day') ,'class'=> 'form-control js-single-select']); ?>

                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-2">
                                                <?php echo e(Form::label('', __('Time Format'), ['class' => 'form-control-label'])); ?>

                                                <?php echo Form::select('company_time_format', ['12'=>'12 '.__('Hour'), '24'=>'24 '.__('Hour')], (!empty($company_setting['company_time_format'])) ? $company_setting['company_time_format'] : null, ['required' => true, 'data-placeholder'=> 'Yours Time Type' ,'class'=> 'form-control js-single-select']); ?>

                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-2">
                                                <?php echo e(Form::label('', __('Date Format'), ['class' => 'form-control-label'])); ?>

                                                <?php echo Form::select('company_date_format', ['Y-m-d' => date("Y-m-d"), 'd-m-Y' => date("d-m-Y"), 'M j, Y' => date('M j, Y'), 'd M Y' => date('d M Y'), 'D d F Y' => date('D d F Y')  ], (!empty($company_setting['company_date_format'])) ? $company_setting['company_date_format'] : null, ['required' => true, 'data-placeholder'=> __('Select Day') ,'class'=> 'form-control js-single-select']); ?>

                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                                <div class="row">
                                                    <div class="col-xs-6 col-sm-6 col-md-4">
                                                        <?php echo e(Form::label('', __('Currency Symbol'), ['class' => 'form-control-label'])); ?>

                                                        <?php echo e(Form::text('company_currency_symbol', (!empty($company_setting['company_currency_symbol'])) ? $company_setting['company_currency_symbol'] : '$' , ['class' => 'form-control'])); ?>

                                                    </div>
                                                    <div class="col-xs-6 col-sm-6 col-md-6 my-auto">                                                    
                                                        <div class="custom-control custom-radio d-inline-block mx-2">
                                                            <input type="radio" name="company_currency_symbol_position" value="pre" class="custom-control-input" id="company_currency_symbol_pre" <?php echo e(($company_setting['company_currency_symbol_position'] == 'pre') ? 'checked' : ''); ?> >
                                                            <label class="custom-control-label" for="company_currency_symbol_pre"><?php echo e(__('Pre')); ?></label>
                                                        </div>                                                                    
                                                        <div class="custom-control custom-radio d-inline-block mx-2">
                                                            <input type="radio" name="company_currency_symbol_position" value="post" class="custom-control-input" id="company_currency_symbol_post" <?php echo e(($company_setting['company_currency_symbol_position'] == 'post') ? 'checked' : ''); ?> >
                                                            <label class="custom-control-label" for="company_currency_symbol_post"><?php echo e(__('Post')); ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div class="row">                                    
                                    <div class="col-xs-12 col-sm-6 col-md-2">
                                        <?php echo e(Form::label('leave_year_start', __('Leave Year Starts'), ['class' => 'form-control-label'])); ?>

                                        <?php echo Form::select('leave_start_month', 
                                                [ "01" =>  __('January'), "02" =>  __('February'), "03" =>  __('March'), "04" =>  __('April'), "05" =>  __('May'), "06" =>  __('June'), "07" =>  __('July'), "08" =>  __('August'), "09" =>  __('September'), "10" =>  __('October'), "11" =>  __('November'), "12" =>  __('December') ], 
                                                (!empty($company_setting['leave_start_month'])) ? $company_setting['leave_start_month'] : 1, ['required' => true, 'data-placeholder'=> __('Select Month') ,'class'=> 'form-control js-single-select']); ?>

                                        
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-2">
                                        <?php echo e(Form::label('breck_paid', __('Break'), ['class' => 'form-control-label'])); ?>

                                        <br>                                        
                                        <div class="btn-group btn-group-toggle border border-primary rounded" data-toggle="buttons">
                                            <label class="btn btn-primary <?php echo e(($company_setting['break_paid'] == 'paid') ? 'active' : ''); ?>">
                                                <input type="radio" name="break_paid" value="paid" <?php echo e(($company_setting['break_paid'] == 'paid') ? 'checked' : ''); ?>> <?php echo e(__('Paid')); ?>

                                            </label>
                                            <label class="btn btn-primary <?php echo e(($company_setting['break_paid'] != 'paid') ? 'active' : ''); ?>">
                                                <input type="radio" name="break_paid" value="unpaid" <?php echo e(($company_setting['break_paid'] == 'unpaid') ? 'checked' : ''); ?> > <?php echo e(__('Unpaid')); ?>

                                            </label>
                                        </div>                                                                                
                                    </div>                                    
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <?php echo e(Form::label('', __('Shift Notes'), ['class' => 'form-control-label'])); ?>

                                        <?php echo Form::select('see_note', ['none' => __('Only admins and managers can see shift notes'), 'self' => __('Employees can only see notes for their own shifts and open shifts'),  'all' => __('Employees can see shift notes for everybody')], (!empty($company_setting['see_note'])) ? $company_setting['see_note'] : null, ['required' => false, 'class'=> 'form-control ']); ?>

                                    </div>
                                    
                                </div>
                                
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12"><h5 class=" h6 mb-1"><?php echo e(__('Availability Preferences')); ?></h5></div>                                                
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="custom-control custom-checkbox d-inline-block mx-2">
                                            <?php echo Form::checkbox('employees_can_set_availability', 1, (!empty($company_setting['employees_can_set_availability'])) ? $company_setting['employees_can_set_availability'] : 0 , ['required' => false, 'class'=> 'custom-control-input','id' => 'employees_can_set_availability']);; ?>

                                            <?php echo e(Form::label('employees_can_set_availability', __("Employees can set their own availability preferences"), ['class' => 'custom-control-label'])); ?>

                                        </div>
                                    </div>
                                </div>                        
        
                                <div class="text-right w-100">
                                    <input name="from" type="hidden" value="password">
                                    <button type="submit" class="btn btn-sm btn-primary rounded-pill"><?php echo e(__('Save')); ?></button>
                                </div>
                            <?php echo e(Form::close()); ?>

                        </div>                        
                    </div>
                    <div class="tab-pane fade show" id="site_setting" role="tabpanel" aria-labelledby="orders-tab">                        
                                
                        <?php echo e(Form::model($settings, ['route' => ['setting.update', $profile->id], 'method' => 'PUT', 'class'=>"permission_table_information", 'enctype'=>"multipart/form-data" ])); ?>                                
                        <?php echo e(Form::hidden('form_type', 'site_setting')); ?>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="company_logo" class="form-control-label"><?php echo e(__('Logo')); ?></label>
                                        <input type="file" name="company_logo" id="company_logo" class="custom-input-file">
                                        <label for="company_logo">
                                            <i class="fa fa-upload"></i>
                                            <span><?php echo e(__('Choose a file')); ?></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-center mt-3">
                                    <div class="logo-div">
                                        <img src="<?php echo e($logo.'/'.(isset($company_logo) && !empty($company_logo)?$company_logo:'logo.png')); ?>" class="img_setting" style="max-width: 170px; width: 100%;"> 
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="company_favicon" class="form-control-label"><?php echo e(__('Favicon')); ?></label>
                                        <input type="file" name="company_favicon" id="company_favicon" class="custom-input-file">
                                        <label for="company_favicon">
                                            <i class="fa fa-upload"></i>
                                            <span><?php echo e(__('Choose a file')); ?></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-center mt-3">
                                    <div class="logo-div">
                                        <img src="<?php echo e($logo.'/'.(isset($company_favicon) && !empty($company_favicon)?$company_favicon:'favicon.png')); ?>" width="50px" class="img_setting">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="row">
                                    <span class="invalid-logo" role="alert">
                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('title_text',__('Title Text'), ['class' => 'form-control-label'])); ?>

                                    <?php echo e(Form::text('title_text',null,array('class'=>'form-control','placeholder'=>__('Title Text')))); ?>

                                    <?php $__errorArgs = ['title_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-title_text" role="alert">
                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('footer_text',__('Footer Text'), ['class' => 'form-control-label'])); ?>

                                    <?php echo e(Form::text('footer_text',null,array('class'=>'form-control','placeholder'=>__('Footer Text')))); ?>

                                    <?php $__errorArgs = ['footer_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-footer_text" role="alert">
                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <?php echo e(Form::submit(__('Save Change'),array('class'=>'btn btn-sm btn-primary rounded-pill'))); ?>

                        </div>
                        <?php echo e(Form::close()); ?>


                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('pagescript'); ?>
<script>
    $(document).ready(function(){        

    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\medtimes\resources\views/employeesetting/index.blade.php ENDPATH**/ ?>