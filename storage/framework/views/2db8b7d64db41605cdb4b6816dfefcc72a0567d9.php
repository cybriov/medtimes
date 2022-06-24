<?php echo e(Form::open(['url' => 'availabilities', 'enctype' => 'multipart/form-data'])); ?>

    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="row">
                <?php if(Auth::user()->acount_type == 1): ?>
                <div class="col">
                    <div class="form-group">
                        <?php echo e(Form::label('', __('User'), ['class' => 'form-control-label'])); ?>

                        <?php echo Form::select('user_id', $filter_employees, null, ['required' => true,  'data-placeholder'=> 'Yours Placeholder' ,'class'=> 'form-control js-single-select']); ?>

                    </div>
                </div>
                <?php else: ?>
                    <?php echo Form::hidden('user_id', Auth::id() ); ?>

                <?php endif; ?>
                <div class="col-sm-12 col-md-6 col-lg-<?php echo e((Auth::user()->acount_type == 1) ? '2' : '3'); ?>">
                    <div class="form-group">
                        <?php echo e(Form::label('', __('Name'), ['class' => 'form-control-label'])); ?>

                        <?php echo e(Form::text('name', null, ['class' => 'form-control', 'required' => ''])); ?>

                    </div>
                </div>
                <div class="col-auto">
                    <div class="form-group">
                        <?php echo e(Form::label('', __('Start Date'), ['class' => 'form-control-label'])); ?>

                        <?php echo e(Form::date('start_date', null, ['class' => 'form-control', 'required' => true])); ?>

                    </div>
                </div>
                <div class="col-auto">
                    <div class="form-group">
                        <?php echo e(Form::label('', __('End Date'), ['class' => 'form-control-label'])); ?>

                        <?php echo e(Form::date('end_date', null, ['class' => 'form-control', 'required' => false])); ?>

                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-<?php echo e((Auth::user()->acount_type == 1) ? '2' : '3'); ?>">
                    <div class="form-group">
                        <?php echo e(Form::label('', __('Repeat Every'), ['class' => 'form-control-label'])); ?>

                        <?php echo Form::select('repeat_week', ['1'=>__('Week'), '2'=> __('2 Week'), '3'=> __('3 Week'), '4'=> __('4 Week')], null, ['required' => false, 'data-placeholder'=> 'Yours Placeholder' ,'class'=> 'form-control js-single-select']); ?>

                    </div>
                </div>
                <div class="col-12 text-danger"><?php echo e(__('If you add availabiliti of same date than system will refer last record')); ?></div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-12">
            <div id="schedule4" class="jqs-demo mb-3"></div>
        </div>
        <div class="col-sm-12">
            <div class="form-group text-right">
                <input type="submit" class="btn btn-sm btn-primary rounded-pill mr-auto" value="<?php echo e(__('Save')); ?>" data-ajax-popup="true">
            </div>
        </div>
    </div>
<?php echo e(Form::close()); ?>

<?php /**PATH C:\xampp\htdocs\medtimes\resources\views/availability/create.blade.php ENDPATH**/ ?>