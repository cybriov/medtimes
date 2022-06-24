<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Language')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page content -->
    <div class="page-content">
        <!-- Page title -->
        <div class="page-title">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                    <div class="d-inline-block">
                        <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white"><?php echo e(__('Language')); ?></h5>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
                    <button type="button" class="btn btn-sm btn-white btn-icon-only rounded-circle" data-ajax-popup="true" data-title="<?php echo e(__('Create New Language')); ?>"
                        data-url="<?php echo e(route('create.language')); ?>"><span class="btn-inner--icon"><i class="fas fa-plus"></i></span></button>

                    <?php if($currantLang != (env('DEFAULT_LANG') ?? 'en')): ?>
                        <a href="#" class="btn btn-sm btn-danger btn-icon-only rounded-circle btn-sm" data-toggle="sweet-alert"
                        data-confirm="<?php echo e(__('Are You Sure?')); ?>|<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                        data-confirm-yes="document.getElementById('delete-lang-<?php echo e($currantLang); ?>').submit();">
                            <i class="fas fa-trash" data-toggle="tooltip" title="Delete"></i>
                        </a>
                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['lang.destroy', $currantLang],'id' => 'delete-lang-'.$currantLang]); ?>

                        <?php echo Form::close(); ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row min-vh-78 ">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="language-wrap">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 language-list-wrap">
                                <div class="language-list">
                                    <ul class="nav nav-pills nav-pills-lang flex-column" id="myTab4" role="tablist">
                                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="nav-item mb-3">
                                                <a href="<?php echo e(route('manage.language',[$lang])); ?>" class="nav-link <?php echo e(($currantLang == $lang) ? 'active' : ''); ?>"><?php echo e(Str::upper($lang)); ?></a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 language-form-wrap">
                                <div class="tab-content">
                                    <div id="nav-pills-tabs-component" class="tab-pane tab-example-result fade show active" role="tabpanel" aria-labelledby="nav-pills-tabs-component-tab">
                                        <div class="nav-wrapper mb-4">
                                            <ul class="nav nav-pills nav-pills-lang nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                                <li class="nav-item mx-2">
                                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i><?php echo e(__('Labels')); ?></a>
                                                </li>
                                                <li class="nav-item mx-2">
                                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i><?php echo e(__('Messages')); ?></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade active show" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                                        <form method="post" action="<?php echo e(route('store.language.data',[$currantLang])); ?>">
                                                            <?php echo csrf_field(); ?>
                                                            <div class="row">
                                                                <?php $__currentLoopData = $arrLabel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label" for="example3cols1Input"><?php echo e($label); ?> </label>
                                                                            <input type="text" class="form-control" name="label[<?php echo e($label); ?>]" value="<?php echo e($value); ?>">
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="col-lg-12 text-right">
                                                                    <button class="btn btn-primary" type="submit"><?php echo e(__('Save Changes')); ?></button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                                        <form method="post" action="<?php echo e(route('store.language.data',[$currantLang])); ?>">
                                                            <?php echo csrf_field(); ?>
                                                            <div class="row">
                                                                <?php $__currentLoopData = $arrMessage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fileName => $fileValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="col-lg-12">
                                                                        <h3><?php echo e(ucfirst($fileName)); ?></h3>
                                                                    </div>
                                                                    <?php $__currentLoopData = $fileValue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if(is_array($value)): ?>
                                                                            <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label2 => $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php if(is_array($value2)): ?>
                                                                                    <?php $__currentLoopData = $value2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label3 => $value3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <?php if(is_array($value3)): ?>
                                                                                            <?php $__currentLoopData = $value3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label4 => $value4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <?php if(is_array($value4)): ?>
                                                                                                    <?php $__currentLoopData = $value4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label5 => $value5): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                        <div class="col-md-6">
                                                                                                            <div class="form-group">
                                                                                                                <label><?php echo e($fileName); ?>.<?php echo e($label); ?>.<?php echo e($label2); ?>.<?php echo e($label3); ?>.<?php echo e($label4); ?>.<?php echo e($label5); ?></label>
                                                                                                                <input type="text" class="form-control" name="message[<?php echo e($fileName); ?>][<?php echo e($label); ?>][<?php echo e($label2); ?>][<?php echo e($label3); ?>][<?php echo e($label4); ?>][<?php echo e($label5); ?>]" value="<?php echo e($value5); ?>">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                <?php else: ?>
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="form-group">
                                                                                                            <label><?php echo e($fileName); ?>.<?php echo e($label); ?>.<?php echo e($label2); ?>.<?php echo e($label3); ?>.<?php echo e($label4); ?></label>
                                                                                                            <input type="text" class="form-control" name="message[<?php echo e($fileName); ?>][<?php echo e($label); ?>][<?php echo e($label2); ?>][<?php echo e($label3); ?>][<?php echo e($label4); ?>]" value="<?php echo e($value4); ?>">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                <?php endif; ?>
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        <?php else: ?>
                                                                                            <div class="col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label><?php echo e($fileName); ?>.<?php echo e($label); ?>.<?php echo e($label2); ?>.<?php echo e($label3); ?></label>
                                                                                                    <input type="text" class="form-control" name="message[<?php echo e($fileName); ?>][<?php echo e($label); ?>][<?php echo e($label2); ?>][<?php echo e($label3); ?>]" value="<?php echo e($value3); ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                        <?php endif; ?>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php else: ?>
                                                                                    <div class="col-lg-6">
                                                                                        <div class="form-group">
                                                                                            <label><?php echo e($fileName); ?>.<?php echo e($label); ?>.<?php echo e($label2); ?></label>
                                                                                            <input type="text" class="form-control" name="message[<?php echo e($fileName); ?>][<?php echo e($label); ?>][<?php echo e($label2); ?>]" value="<?php echo e($value2); ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endif; ?>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php else: ?>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label><?php echo e($fileName); ?>.<?php echo e($label); ?></label>
                                                                                    <input type="text" class="form-control" name="message[<?php echo e($fileName); ?>][<?php echo e($label); ?>]" value="<?php echo e($value); ?>">
                                                                                </div>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                            <div class="col-lg-12 text-right">
                                                                <button class="btn btn-primary" type="submit"><?php echo e(__('Save Changes')); ?></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jovickxe/medtimes.co/resources/views/languages/index.blade.php ENDPATH**/ ?>