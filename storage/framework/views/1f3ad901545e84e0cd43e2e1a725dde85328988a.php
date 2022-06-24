<?php echo e(Form::open(['url' => 'holidays', 'enctype' => 'multipart/form-data' ])); ?>

    <h5> <?php echo __('Add Leave'); ?> </h5>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('', __('Employee'), ['class' => 'form-control-label'])); ?>

                <?php if(Auth::user()->acount_type == 3 || Auth::user()->acount_type == 2): ?>
                    <?php echo Form::select('user_id[]', $employees_select, null, ['required' => true, 'class'=> 'form-control']); ?>

                <?php else: ?> 
                    <?php echo Form::select('user_id[]', $employees_select, null, ['required' => true, 'multiple' => 'multiple', 'data-placeholder'=> 'Yours Placeholder' ,'class'=> 'form-control js-multiple-select']); ?>

                <?php endif; ?>
                
            </div>
        </div>

        <!--div class="col-sm-12 col-md-5 col-lg-5">
            <div class="form-group">
                <?php echo e(Form::label('', __('Type'), ['class' => 'form-control-label'])); ?>                
                <?php echo Form::select('leave_type', ['1' => 'Holiday', '2' => 'Other Leave'], null, ['required' => true, 'data-placeholder'=> 'Yours Leave Type' ,'class'=> 'form-control js-single-select']); ?>

            </div>
        </div-->
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <?php echo e(Form::label('', __('Start Date'), ['class' => 'form-control-label'])); ?>                
                <?php echo e(Form::date('start_date', null, ['class' => 'form-control leave_date_start' ,'required' => ''])); ?>

            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <?php echo e(Form::label('', __('End Date'), ['class' => 'form-control-label'])); ?>

                <?php echo e(Form::date('end_date', null, ['class' => 'form-control leave_date_due', 'required' => ''])); ?>

            </div>
        </div>
        <?php if(Auth::user()->acount_type == 1): ?>
        <!--div class="col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">                
                <?php echo e(Form::label('', __(''), ['class' => 'form-control-label'])); ?>

                <div class="custom-control custom-switch">                         
                    <?php echo e(Form::checkbox('paid_status', 'paid', false, ['class' => 'custom-control-input', 'id' => 'customSwitch1dsad'])); ?>                     
                    <label class="custom-control-label form-control-label" for="customSwitch1dsad"><?php echo e(__('Unpaid/Paid')); ?></label>
                </div>
            </div>
        </div-->
        <?php endif; ?>
        <!--div class="col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <?php echo e(Form::label('', __('Days'), ['class' => 'form-control-label'])); ?>

                <?php echo e(Form::number('days', null, ['class' => 'form-control leave_days', 'readonly' => true , 'disabled'=> true, 'required' => false])); ?>

            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <?php echo e(Form::label('', __('Record Hours'), ['class' => 'form-control-label'])); ?>                
                <?php echo Form::select('leave_time_type', ['total' => 'Total', 'daily' => 'Daily'], null, ['required' => true, 'data-placeholder'=> 'Yours Time Type' ,'class'=> 'form-control js-single-select total_daily_hour']); ?>                
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="form-group total_all_hour">
                <?php echo e(Form::label('', __('Total Hours'), ['class' => 'form-control-label'])); ?>

                <?php echo e(Form::number('leave_time1', null, ['class' => 'form-control', 'required' => false])); ?>                
            </div>
            <div class="form-group total_date_hour" style="display: none;">                            
                <span class="clearfix"></span>
            </div>
        </div-->
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <?php echo e(Form::label('', __('Message'), ['class' => 'form-control-label'])); ?>                
                <?php echo e(Form::textarea('message', null, ['class' => 'form-control autogrow' ,'rows'=>'2' ,'style'=>'resize: none'])); ?>

                
            </div>
        </div>
        <div class="col-12">
            <div class="form-group text-right">
                <input type="submit" class="btn btn-sm btn-primary rounded-pill mr-auto" value="<?php echo e(__('Save')); ?>" data-ajax-popup="true">
            </div>
        </div>
    </div>
<?php echo e(Form::close()); ?>

<?php /**PATH /home/jovickxe/medtimes.co/resources/views/leave/create.blade.php ENDPATH**/ ?>