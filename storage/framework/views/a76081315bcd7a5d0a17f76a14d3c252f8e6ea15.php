<?php echo e(Form::open(['url' => 'store-language'])); ?>


<div class="form-group">    
    <?php echo e(Form::label('', __('Language Code'), ['class' => 'form-control-label'])); ?>

    <?php echo e(Form::text('code', null, ['class' => 'form-control', 'placeholder' => __('Enter new Language Code'), 'required' => 'required'])); ?>

</div>

<div class="form-group text-right">
    <input type="submit" class="btn btn-sm btn-primary rounded-pill mr-auto" value="<?php echo e(__('Save')); ?>" data-ajax-popup="true">
</div>
<?php echo e(Form::close()); ?>


<?php /**PATH /home/jovickxe/medtimes.co/resources/views/languages/create.blade.php ENDPATH**/ ?>