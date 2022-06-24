<?php echo e(Form::open(['url' => 'employees', 'enctype' => 'multipart/form-data'])); ?>

    <div class="form-group">
        <div class="row">
            <div class="col-6">
                <?php echo e(Form::label('', __('First Name'), ['class' => 'form-control-label'])); ?>

                <?php echo e(Form::text('first_name', null, ['class' => 'form-control', 'required' => ''])); ?>

            </div>
            <div class="col-6">
                <?php echo e(Form::label('', __('Last Name'), ['class' => 'form-control-label'])); ?>

                <?php echo e(Form::text('last_name', null, ['class' => 'form-control', 'required' => ''])); ?>

            </div>
        </div>
    </div>
    <div class="form-group">
        <?php echo e(Form::label('', __('Email'), ['class' => 'form-control-label'])); ?>

        <?php echo e(Form::email('email', null, ['class' => 'form-control', 'required' => ''])); ?>

    </div>
    <div class="form-group">
        <?php echo e(Form::label('', __('Employee Role'), ['class' => 'form-control-label'])); ?>

        <?php echo Form::select('role_id[]', $role_select, null, ['required' => false, 'multiple' => 'multiple', 'class' => 'form-control js-multiple-select']); ?>

    </div>
    <div class="form-group">
        <?php echo e(Form::label('', __('Location'), ['class' => 'form-control-label'])); ?>

        <?php echo Form::select('location_id[]', $location_select, null, ['required' => false, 'multiple' => 'multiple', 'class'=> 'form-control js-multiple-select']); ?>

    </div>
    <div class="form-group text-right">
        <input type="submit" class="btn btn-sm btn-primary rounded-pill mr-auto" value="<?php echo e(__('Save')); ?>" data-ajax-popup="true">
    </div>
<?php echo e(Form::close()); ?>

<?php /**PATH C:\xampp\htdocs\medtimes\resources\views/employee/create.blade.php ENDPATH**/ ?>