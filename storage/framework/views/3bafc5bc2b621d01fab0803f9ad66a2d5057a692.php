<?php $__env->startPush('pagescript'); ?>
    <script>
        $(document).on('click', '.code', function () {
            var type = $(this).find('.icon-input').val();
            if (type == 'manual') {
                $('#manual').removeClass('d-none');
                $('#manual').addClass('d-block');
                $('#auto').removeClass('d-block');
                $('#auto').addClass('d-none');
            } else {
                $('#auto').removeClass('d-none');
                $('#auto').addClass('d-block');
                $('#manual').removeClass('d-block');
                $('#manual').addClass('d-none');
            }
        });

        $(document).on('click', '#code-generate', function () {
            var length = 10;
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            $('#auto-code').val(result);
        });
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Coupon')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page content -->
    <div class="page-content">
        <!-- Page title -->
        <div class="page-title">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                    <div class="d-inline-block">
                        <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white"><?php echo e(__('Coupon')); ?></h5>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
                    <a href="#" data-url="<?php echo e(route('coupon.create')); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Create New Coupon')); ?>" class="btn btn-sm btn-white btn-icon-only rounded-circle ml-4" data-toggle="tooltip">
                        <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                    </a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="table-responsive">
                <table class="table align-items-center" id="myTable">
                    <thead>
                    <tr>
                        <th scope="col" class="sort" data-sort="name"> <?php echo e(__('Name')); ?></th>
                        <th scope="col" class="sort" data-sort="budget"><?php echo e(__('Code')); ?></th>
                        <th scope="col" class="sort" data-sort="status"><?php echo e(__('Discount (%)')); ?></th>
                        <th scope="col"><?php echo e(__('Limit')); ?></th>
                        <th scope="col" class="sort" data-sort="completion"> <?php echo e(__('Used')); ?></th>
                        <th scope="col" class="action text-right"><?php echo e(__('Action')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($coupons) && count($coupons) != 0): ?>
                        <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>        
                                <td class="budget"><?php echo e($coupon->name); ?> </td>
                                <td><?php echo e($coupon->code); ?></td>
                                <td><?php echo e($coupon->discount); ?></td>
                                <td><?php echo e($coupon->limit); ?></td>
                                <td><?php echo e($coupon->used_coupon()); ?></td>
                                <td class="text-right">
                                    <div class="actions ml-3">
                                        <a href="<?php echo e(route('coupon.show',$coupon->id)); ?>" class="action-item" data-toggle="tooltip" title="<?php echo e(__('View')); ?>"><i class="fas fa-eye"></i></a>
                                        <a href="#!" class="action-item" data-size="lg" data-url="<?php echo e(route('coupon.edit',$coupon->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit Coupon')); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>        
                                        <a href="#!" class="action-item" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').' | '.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($coupon->id); ?>').submit();">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['coupon.destroy', $coupon->id],'id'=>'delete-form-'.$coupon->id]); ?>

                                        <?php echo Form::close(); ?>

                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">
                                <div class="text-center">
                                    <i class="fas fa-file-alt text-primary fs-40"></i>
                                    <h2><?php echo e(__('Opps...')); ?></h2>
                                    <h6> <?php echo __('No data available.'); ?> </h6>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jovickxe/medtimes.co/resources/views/coupon/index.blade.php ENDPATH**/ ?>