<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Login')); ?>

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
                                        <option <?php if($lang == $language): ?> selected <?php endif; ?> value="<?php echo e(route('login', $language)); ?>"><?php echo e(Str::upper($language)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>                                
                            </div>
                            <div class="col-sm-8 col-lg-4">
                                <div class="row justify-content-center mb-3">
                                    <a class="navbar-brand" href="#">
                                        <img src="<?php echo e(asset(Storage::url('uploads/logo/logo.png'))); ?>"  class="auth-logo" width="250" alt="<?php echo e(__('Company Logo')); ?>">
                                    </a>
                                </div>
                                <div class="card shadow zindex-100 mb-0">
                                    <div class="card-body px-md-5 pt-5">
                                        <div class="mb-5">
                                            <h6 class="h3"><?php echo e(__('Login')); ?></h6>
                                            <p class="text-muted mb-0"><?php echo e(__('Sign in to your account to continue.')); ?></p>
                                        </div>
                                        <span class="clearfix"></span>
                                        <form method="POST" action="<?php echo e(route('login')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-group">
                                                <label class="form-control-label"><?php echo e(__('E-Mail Address')); ?></label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

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


                                            <div class="form-group mb-4">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div>
                                                        <label class="form-control-label"><?php echo e(__('Password')); ?></label>
                                                    </div>
                                                    <div class="mb-2">
                                                        <?php if(Route::has('password.request')): ?>
                                                            <a class="btn-link small text-muted text-underline--dashed border-primary" href="<?php echo e(route('password.request',$lang)); ?>">
                                                                <?php echo e(__('Forgot Your Password?')); ?>

                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
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
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">

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

                                            <div class="form-group row mb-0">
                                                <button type="submit" class="btn btn-sm btn-primary btn-icon rounded-pill login-do-btn">
                                                    <span class="btn-inner--text text-white"><?php echo e(__('Sign in')); ?></span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer px-md-5"><small><?php echo e(__('Not registered?')); ?></small>
                                        <a href="<?php echo e(route('register',$lang)); ?>" class="small font-weight-bold"><?php echo e(__('Create account')); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidenav-mask mask-body d-xl-none" data-action="sidenav-unpin" data-target="undefined"></div><div class="sidenav-mask mask-body d-xl-none" data-action="sidenav-unpin" data-target="undefined"></div></div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jovickxe/medtimes.co/resources/views/auth/login.blade.php ENDPATH**/ ?>