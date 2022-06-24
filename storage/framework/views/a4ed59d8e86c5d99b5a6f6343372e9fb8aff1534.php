<?php echo e(Form::open(['url' => 'locations', 'enctype' => 'multipart/form-data'])); ?>

    <div class="form-group">
        <?php echo e(Form::label('', __('Name'), ['class' => 'form-control-label'])); ?>

        <?php echo e(Form::text('name', null, ['class' => 'form-control', 'required' => ''])); ?>

    </div>
    <div class="form-group">
        <?php echo e(Form::label('', __('Address'), ['class' => 'form-control-label'])); ?>

        <?php echo e(Form::textarea('address', null, ['class' => 'form-control autogrow' ,'rows'=>'1' ,'style'=>'resize: none' ,'required' => ''])); ?>

    </div>
    <div class="form-group">
        <?php echo e(Form::label('', __(' Employee'), ['class' => 'form-control-label'])); ?>

        <?php echo Form::select('employees[]', $employees_select, null, ['required' => false, 'multiple' => 'multiple', 'data-placeholder'=> 'Yours Placeholder' ,'class'=> 'form-control js-multiple-select']); ?>

    </div>
    <div class="form-group text-right">
        <input type="submit" class="btn btn-sm btn-primary rounded-pill mr-auto" value="<?php echo e(__('Save')); ?>" data-ajax-popup="true">
    </div>
<?php echo e(Form::close()); ?>

<?php /**PATH C:\xampp\htdocs\medtimes\resources\views/location/create.blade.php ENDPATH**/ ?>