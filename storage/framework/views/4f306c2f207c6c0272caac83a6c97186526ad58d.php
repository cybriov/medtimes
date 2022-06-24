
<form method="POST" action="<?php echo e(route('rotas.print')); ?>">
    <?php echo csrf_field(); ?>
     <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
             <?php echo e(Form::hidden('week', $week)); ?>

             <?php echo e(Form::hidden('role_id', $role_id)); ?>

             <?php echo e(Form::hidden('create_by', $create_by)); ?>

             <?php echo e(Form::hidden('location_id', $location_id)); ?>

             <?php echo e(Form::label('', __('Select User'), ['class' => 'form-control-label'])); ?>

             <br>
             <?php if(!empty($user_array) && count($user_array) > 0): ?>
                <?php $__currentLoopData = $user_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>            
                    <div class="custom-control custom-checkbox d-inline-block mx-3">
                        <input class="custom-control-input user_checkbox" id="<?php echo e($val['id']); ?>" name="user[<?php echo e($key); ?>]" type="checkbox" value="<?php echo e($val['id']); ?>" checked>
                        <label for="<?php echo e($val['id']); ?>" class="custom-control-label"><?php echo e($val['name']); ?></label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <p><?php echo e(__('No user found.')); ?></p>                 
            <?php endif; ?>
         </div>
         <div class="col-12">
             <div class="form-group text-right">
                 <input type="submit" class="btn btn-sm btn-primary rounded-pill mr-auto" value="<?php echo e(__('Save')); ?>" data-ajax-popup="true">
             </div>
         </div>
     </div>
</form>
 <?php /**PATH /home/jovickxe/medtimes.co/resources/views/rotas/printrotas.blade.php ENDPATH**/ ?>