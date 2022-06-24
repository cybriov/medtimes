<?php echo e(Form::model($leaverequest, ['route' => ['holidays.view-leave-response', $leaverequest->id], 'method' => 'POST','id' => 'leave_request_delete'])); ?>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">            
            <div class="form-group">
                <?php echo $string; ?>

                <?php echo $request_message; ?>

                <?php echo $approved_by_name; ?>

                <?php echo $response_message; ?>

            </div>
        </div>
        <div class="col-12 <?php echo e($user_type); ?>">
            <div class="form-group text-right">

                <a href="#" data-ajax-popup="true" data-title="<?php echo e(__('Edit Leave')); ?>" data-size="lg" data-url="<?php echo e(route('holidays.edit', $leaverequest->id)); ?>" class="action-item ">
                    <input type="button" class="btn btn-sm btn-info rounded-pill mr-auto" value="<?php echo e(__('Edit')); ?>" data-ajax-popup="true">
                </a>

                <a href="#" class="action-item text-danger  leave_request_delete delete_leave_ppp" data-original-title="<?php echo e(__('Delete')); ?>"
                    data-confirm="<?php echo e(__('Are You Sure?')); ?>|<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                    data-confirm-yes="document.getElementById('delete-form-<?php echo e($leaverequest->id); ?>').submit();" >
                    <input type="button" class="btn btn-sm btn-danger rounded-pill mr-auto" value="<?php echo e(__('Delete')); ?>" data-ajax-popup="true">
                </a>

            </div>

        </div>
    </div>
<?php echo e(Form::close()); ?>


<?php echo Form::open(['method' => 'DELETE', 'route' => ['holidays.destroy', $leaverequest->id],'class' => 'delete_leave_form' ,'id' => 'delete-form-'.$leaverequest->id]); ?>

<?php echo Form::close(); ?>

<?php /**PATH /home/jovickxe/medtimes.co/resources/views/leave/leaveview.blade.php ENDPATH**/ ?>