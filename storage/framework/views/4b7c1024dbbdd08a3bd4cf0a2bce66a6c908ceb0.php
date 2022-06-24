<?php echo e(Form::model($employee, ['route' => ['employee.addpassword', $employee->id], 'method' => 'POST'])); ?>

    <?php echo e(Form::hidden('employee_id', $employee->id)); ?>

    <?php echo e(Form::hidden('form_type', 'manage_permission')); ?>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('', __('Set Password'), ['class' => 'form-control-label'])); ?>                               
                <?php echo e(Form::password('password', ['class' => 'form-control', 'required' => ''])); ?>

            </div>
        </div>
    </div>
    <div class="text-right">
        <input name="from" type="hidden" value="password">
        <button type="submit" class="btn btn-sm btn-primary rounded-pill"><?php echo e(__('Save')); ?></button>
    </div>
<?php echo e(Form::close()); ?><?php /**PATH /home/jovickxe/medtimes.co/resources/views/employee/password.blade.php ENDPATH**/ ?>