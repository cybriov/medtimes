<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Registration')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Application container -->
    <div class="container-fluid container-application">
        <!-- Content -->
        <div class="main-content position-relative">
            <!-- Page content -->
            <div class="page-content">
                <div class="min-vh-100 py-5 d-flex align-items-center">
                    <div class="w-100">
                        <div class="row justify-content-center">
                            <div class="form-group auth-lang">                                
                                <select name="language" id="language" class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                    <?php $__currentLoopData = \App\Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if($lang == $language): ?> selected <?php endif; ?> value="<?php echo e(route('register', $language)); ?>"><?php echo e(Str::upper($language)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>                                
                            </div>
                            <div class="col-sm-8 col-lg-5">
                                <div class="row justify-content-center mb-3">
                                    <a class="navbar-brand" href="#">
                                        <img src="<?php echo e(asset(Storage::url('uploads/logo/logo.png'))); ?>"  class="auth-logo" width="250" alt="<?php echo e(__('Company Logo')); ?>">
                                    </a>
                                </div>
                                <div class="card shadow zindex-100 mb-0">
                                    <div class="card-body px-md-5 py-5">
                                        <div >
                                            <div class="mb-5">
                                                <h6 class="h3"><?php echo e(__('Create account')); ?></h6>
                                                <p class="text-muted mb-0"><?php echo e(__("Don't have an account? Create your account, it takes less than a minute")); ?></p>
                                            </div>
                                            <span class="clearfix"></span>
                                            <form method="POST" action="<?php echo e(route('register')); ?>" role="form">
                                                <?php echo csrf_field(); ?>

                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label"><?php echo e(__('First Name')); ?></label>
                                                            <div class="input-group input-group-merge">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                                </div>
                                                                <input id="first_name" type="text" class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="first_name" value="<?php echo e(old('first_name')); ?>" required autocomplete="first_name" autofocus>
                                                                <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                        <span class="invalid-feedback" role="alert">
                                                                    <strong><?php echo e($message); ?></strong>
                                                                </span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label"><?php echo e(__('Last Name')); ?></label>
                                                            <div class="input-group input-group-merge">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                                </div>
                                                                <input id="last_name" type="text" class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="last_name" value="<?php echo e(old('last_name')); ?>" required autocomplete="last_name" autofocus>
                                                                <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                        <span class="invalid-feedback" role="alert">
                                                                    <strong><?php echo e($message); ?></strong>
                                                                </span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group">
                                                            <label class="form-control-label"><?php echo e(__('Company Name')); ?></label>
                                                            <div class="input-group input-group-merge">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                                </div>
                                                                <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="company_name" value="<?php echo e(old('company_name')); ?>" required autocomplete="name" autofocus>
                                                                <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                        <span class="invalid-feedback" role="alert">
                                                                    <strong><?php echo e($message); ?></strong>
                                                                </span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group">
                                                            <label class="form-control-label"><?php echo e(__('Email')); ?></label>
                                                            <div class="input-group input-group-merge">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                                </div>
                                                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">
                                                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong><?php echo e($message); ?></strong>
                                                                </span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group">
                                                            <label class="form-control-label"><?php echo e(__('Password')); ?></label>
                                                            <div class="input-group input-group-merge">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                                </div>
                                                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">
                                                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong><?php echo e($message); ?></strong>
                                                                </span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group">
                                                            <label class="form-control-label"><?php echo e(__('Confirm Password')); ?></label>
                                                            <div class="input-group input-group-merge">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                                </div>
                                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="mt-4">
                                                            <button type="submit" class="btn btn-sm btn-primary btn-icon rounded-pill">
                                                                <span class="btn-inner--text"><?php echo e(__('Create my account')); ?></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>




                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-footer px-md-5"><small><?php echo e(__('Already have an acocunt?')); ?></small>
                                        <a href="<?php echo e(url('login',$lang)); ?>" class="small font-weight-bold"><?php echo e(__('Sign in')); ?></a>
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

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jovickxe/medtimes.co/resources/views/auth/register.blade.php ENDPATH**/ ?>