<?php
    $dir= asset(Storage::url('uploads/plan'));
?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Plan')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="page-title">
    <div class="row justify-content-between align-items-center">
        <div class="col-auto mb-md-0">
            <div class="d-inline-block">
                <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white" >Plan</h5>
            </div>
        </div>
            <div class="col"></div>
            <?php if( \Auth::user()->type == 'super admin'): ?>
            <div class="col-auto">
                <a href="#" data-url="<?php echo e(route('plan.create')); ?>" data-size="lg" data-ajax-popup="true" data-title="Create New Plan" class="btn btn-sm btn-white btn-icon-only rounded-circle ml-4" data-toggle="tooltip" data-original-title="" title="">
                    <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
    <?php if(!empty($plans)): ?>
        <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3">
            <div class="card card-fluid">
                <div class="card-header border-0 pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0"><?php echo e($plan->name); ?></h6>
                        </div>
                        <div class="text-right">
                            <div class="actions">
                                <?php if( \Auth::user()->type == 'super admin'): ?>
                                    <a title="Edit Plan" data-size="lg" href="#" class="action-item" data-url="<?php echo e(route('plan.edit',$plan->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit Plan')); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>"><i class="fas fa-edit"></i></a>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body text-center <?php echo e(!empty(\Auth::user()->type != 'super admin')?'plan-box':''); ?>">
                    <a href="#" class="avatar rounded-circle avatar-lg hover-translate-y-n3">
                        <img alt="Image placeholder" src="<?php echo e($dir.'/'.$plan->image); ?>" class="">
                    </a>

                    <h5 class="h6 my-4"> <?php echo e(env('CURRENCY_SYMBOL').$plan->price.' / '.$plan->duration); ?></h5>

                    <?php if(\Auth::user()->type=='company' && \Auth::user()->plan == $plan->id): ?>
                        <h5 class="h6 my-4">
                            <?php echo e(__('Expired : ')); ?> <?php echo e(\Auth::user()->plan_expire_date ? \Auth::user()->dateFormat(\Auth::user()->plan_expire_date):__('Unlimited')); ?>

                        </h5>
                    <?php endif; ?>

                    <h5 class="h6 my-4"><?php echo e($plan->description); ?></h5>

                    <?php if(\Auth::user()->type == 'company' && \Auth::user()->plan == $plan->id): ?>
                        <span class="clearfix"></span>
                        <div class="my-3">
                            <span class="badge badge-pill badge-success"><?php echo e(__('Active')); ?></span>
                        </div>
                    <?php endif; ?>                    
                    <?php if(($plan->id != \Auth::user()->plan) && \Auth::user()->type!='super admin' ): ?>
                        <?php if($plan->price > 0): ?>
                            <div class="my-3">
                                <a class="badge badge-pill badge-primary" href="<?php echo e(route('stripe',\Illuminate\Support\Facades\Crypt::encrypt($plan->id))); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('Buy Plan')); ?>">
                                    <i class="fas fa-cart-plus"></i>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>                    
                    <span class=" mb-0 text-center"><?php echo e(__('Employee')); ?> : <?php echo e($plan->max_employee); ?></span>                
                </div>            
            </div>
        </div>   
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>    
</div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jovickxe/medtimes.co/resources/views/plan/index.blade.php ENDPATH**/ ?>