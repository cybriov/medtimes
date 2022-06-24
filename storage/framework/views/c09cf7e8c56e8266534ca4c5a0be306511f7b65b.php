<?php echo e(Form::model($user_array, ['route' => ['rotas.add_remove_employee'], 'method' => 'get'])); ?>

<div class="row">        
    <div class="col-xs-12 col-sm-12 col-md-12">        
        <?php echo e(Form::hidden('id_array', $id_array)); ?>

        <?php echo e(Form::hidden('location', $location)); ?>

        <?php $__currentLoopData = $user_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="custom-control custom-checkbox d-inline-block mx-3">
                <input class="custom-control-input" id="<?php echo e($val['profile_id']); ?>" name="<?php echo e($val['profile_id']); ?>" type="checkbox" value="<?php echo e($val['loaction_id']); ?>" <?php echo e(($val['has_location'] == 1) ? 'checked' : ''); ?>>
                <label for="<?php echo e($val['profile_id']); ?>" class="custom-control-label"><?php echo e($val['name']); ?></label>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="col-12">
        <div class="form-group text-right">
            <input type="submit" class="btn btn-sm btn-primary rounded-pill mr-auto" value="<?php echo e(__('Save')); ?>" data-ajax-popup="true">
        </div>
    </div>
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /home/jovickxe/medtimes.co/resources/views/rotas/addremoveemployee.blade.php ENDPATH**/ ?>