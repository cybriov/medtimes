<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Dashbord')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="page-title">
<div class="row justify-content-between align-items-center">
<div class="col-auto mb-md-0">
        <div class="d-inline-block">
<h5 class="h4 d-inline-block font-weight-400 mb-0 text-white">User</h5>
</div>
</div>
<div class="col">
    </div>
        <div class="col-auto">
            <a href="#" data-url="<?php echo e(route('user.create')); ?>" data-size="md" data-ajax-popup="true" data-title="Create New User" class="btn btn-sm btn-white btn-icon-only rounded-circle ml-4" data-toggle="tooltip" data-original-title="" title="">
                <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
            </a>
        </div>
    </div>
</div>
<div class="row">

    <?php if(!empty($users)): ?>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>        
        <div class="col-lg-3 col-sm-6">
            <div class="card hover-shadow-lg">
                <div class="card-body text-center">
                    <div class="avatar-parent-child">                                                
                        <img alt="" class="avatar  rounded-circle avatar-lg" src="<?php echo e(asset(Storage::url("uploads/profile_pic")).'/'); ?><?php echo e(!empty(Auth::user()->getUserInfo->profile_pic)?Auth::user()->getUserInfo->profile_pic:'avatar.png'); ?>">
                    </div>
                    <h5 class="h6 mt-4 mb-0"> <?php echo e($user->company_name); ?></h5>
                    <div class="d-block text-sm text-muted mb-3"> <?php echo e($user->email); ?></div>
                    <div class="actions d-flex justify-content-between px-4 pl-6">
                        <a href="#" class="action-item" data-ajax-popup="true"  data-size="md"
                        data-url="<?php echo e(route('user.edit', $user->id)); ?>" data-title="Edit User" data-toggle="tooltip" data-original-title="Edit">
                            <i class="fas fa-user-edit"></i>
                        </a>
                        <a href="#" class="action-item" data-size="lg" data-url="<?php echo e(route('plan.upgrade',$user->id)); ?>" data-ajax-popup="true" data-toggle="tooltip" data-title="<?php echo e(__('Upgrade Plan')); ?>">
                            <i class="fas fa-trophy"></i>
                        </a>
                        
                        <a href="#" class="action-item " data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>"
                            data-confirm="<?php echo e(__('Are You Sure?')); ?>|<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                            data-confirm-yes="document.getElementById('delete-form-<?php echo e($user->id); ?>').submit();">
                            <i class="fas fa-trash"></i>
                        </a>
                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id],'id' => 'delete-form-'.$user->id]); ?>

                        <?php echo Form::close(); ?>

    
                    </div>
                </div>

                <div class="card-footer">                    
                    <div class="float-left">
                        <div class="actions d-flex justify-content-between">
                            <span class="d-block text-sm text-muted"> <?php echo e(__('Plan')); ?>   :  <?php echo e(!empty($user->currentPlan)?$user->currentPlan->name:__('Free')); ?></span>
                        </div>
                        <div class="actions d-flex justify-content-between mt-1">
                            <span class="d-block text-sm text-muted"><?php echo e(__('Plan Expired')); ?> : <?php echo e(!empty($user->plan_expire_date) ? \Auth::user()->dateFormat($user->plan_expire_date):'Unlimited'); ?></span>
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="actions d-flex justify-content-between">
                            <span class="d-block text-sm text-muted"><?php echo e(__('Employees')); ?> : <?php echo e($user->countEmployees($user->id)); ?></span>
                        </div>
                    </div>
                    <span class="clearfix"></span>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>    
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jovickxe/medtimes.co/resources/views/user/index.blade.php ENDPATH**/ ?>