<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Setting')); ?>

<?php $__env->stopSection(); ?>
<?php
$logo = asset(Storage::url('uploads/logo/'));
$company_logo = \App\Utility::getValByName('company_logo');
$company_small_logo = \App\Utility::getValByName('company_small_logo');
$company_favicon = \App\Utility::getValByName('company_favicon');
$lang = \App\Utility::getValByName('default_language');
?>

<?php $__env->startSection('content'); ?>

    <!-- Page content -->
    <div class="page-content">
        <!-- Page title -->
        <div class="page-title">
            <div class="row justify-content-between align-items-center">
                <div
                    class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                    <div class="d-inline-block">
                        <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white"><?php echo e(__('Setting')); ?></h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- Listing -->
        <div class="mt-4">
            <!-- rotas setting -->
            <div class="card">
                <ul class="nav nav-tabs nav-overflow profile-tab-list" role="tablist">
                    <li class="nav-item ml-4">
                        <a href="#site_setting" id="site_setting_tab" class="nav-link active" data-toggle="tab" role="tab"
                            aria-controls="home" aria-selected="true">
                            <i class="far fa-building mr-2"></i><?php echo e(__('Site Setting')); ?>

                        </a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="#email_setting" id="system_setting_tab" class="nav-link" data-toggle="tab" role="tab"
                            aria-controls="home" aria-selected="true">
                            <i class="fas fa-envelope mr-2"></i><?php echo e(__('Email Setting')); ?>

                        </a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="#payment_setting" id="payment_setting_tab" class="nav-link" data-toggle="tab" role="tab"
                            aria-controls="home" aria-selected="true">
                            <i class="fas fa-money-check-alt mr-2"></i><?php echo e(__('Payment Settings')); ?>

                        </a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="#pusher_setting" id="pusher_setting_tab" class="nav-link" data-toggle="tab" role="tab" aria-controls="pusher_setting_tab" aria-selected="true">
                            <i class="fas fa-comments mr-2"></i><?php echo e(__('Pusher Setting')); ?>

                        </a>
                    </li>
                    
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="site_setting" role="tabpanel" aria-labelledby="orders-tab">
                        <div class="">
                            <?php echo e(Form::model($settings, ['route' => ['setting.update', $profile->id], 'method' => 'PUT', 'class' => 'permission_table_information', 'enctype' => 'multipart/form-data'])); ?>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="logo" class="form-control-label"><?php echo e(__('Logo')); ?></label>
                                            <input type="file" name="logo" id="logo" class="custom-input-file">
                                            <label for="logo">
                                                <i class="fa fa-upload"></i>
                                                <span><?php echo e(__('Choose a file')); ?></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-center  my-auto">
                                        <div class="logo-div">
                                            <img src="<?php echo e(asset(Storage::url('uploads/logo/')) . '/' . 'logo.png'); ?>"
                                                class="img_setting" style="max-width: 170px; width: 100%;">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="favicon" class="form-control-label"><?php echo e(__('Favicon')); ?></label>
                                            <input type="file" name="favicon" id="favicon" class="custom-input-file">
                                            <label for="favicon">
                                                <i class="fa fa-upload"></i>
                                                <span><?php echo e(__('Choose a file')); ?></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-center my-auto">
                                        <div class="logo-div">
                                            <img src="<?php echo e(asset(Storage::url('uploads/logo/')) . '/favicon.png'); ?>"
                                                width="50px" class="img_setting">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="row">
                                                <span class="invalid-logo" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('title_text', __('Title Text'), ['class' => 'form-control-label'])); ?>

                                        <?php echo e(Form::text('title_text', null, ['class' => 'form-control', 'placeholder' => __('Title Text')])); ?>

                                        <?php $__errorArgs = ['title_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-title_text" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <?php if(\Auth::user()->type == 'super admin'): ?>
                                        <div class="form-group col-md-6">
                                            <?php echo e(Form::label('footer_text', __('Footer Text'), ['class' => 'form-control-label'])); ?>

                                            <?php echo e(Form::text('footer_text', null, ['class' => 'form-control', 'placeholder' => __('Footer Text')])); ?>

                                            <?php $__errorArgs = ['footer_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-footer_text" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <?php echo e(Form::label('default_language', __('Default Language'), ['class' => 'form-control-label'])); ?>

                                            <div class="changeLanguage">
                                                <select name="default_language" id="default_language"
                                                    class="form-control custom-select js-single-select">
                                                    <?php $__currentLoopData = \App\Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php if($lang == $language): ?> selected <?php endif; ?>
                                                            value="<?php echo e($language); ?>"><?php echo e(Str::upper($language)); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="form-group col-3 my-auto">
                                        <?php echo e(Form::label('', __('Landing Page Display'), ['class' => 'form-control-label'])); ?>

                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" name="display_landing_page"
                                                id="display_landing_page"
                                                <?php echo e($settings['display_landing_page'] == 'on' ? 'checked="checked"' : ''); ?>>
                                            <label class="custom-control-label form-control-label"
                                                for="display_landing_page"></label>
                                        </div>
                                    </div>
                                    <div class="form-group col-3 my-auto">
                                        <label class="form-control-label"><?php echo e(__('RTL')); ?></label>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" name="SITE_RTL"
                                                id="SITE_RTL" <?php echo e(env('SITE_RTL') == 'on' ? 'checked="checked"' : ''); ?>>
                                            <label class="custom-control-label form-control-label" for="SITE_RTL"></label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('footer_link_1', __('Footer Link Title 1'), ['class' => 'form-control-label'])); ?>

                                        <?php echo e(Form::text('footer_link_1', null, ['class' => 'form-control', 'placeholder' => __('Enter Footer Link Title 1')])); ?>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('footer_value_1', __('Footer Link href 1'), ['class' => 'form-control-label'])); ?>

                                        <?php echo e(Form::text('footer_value_1', null, ['class' => 'form-control', 'placeholder' => __('Enter Footer Link 1')])); ?>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('footer_link_2', __('Footer Link Title 2'), ['class' => 'form-control-label'])); ?>

                                        <?php echo e(Form::text('footer_link_2', null, ['class' => 'form-control', 'placeholder' => __('Enter Footer Link Title 2')])); ?>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('footer_value_2', __('Footer Link href 2'), ['class' => 'form-control-label'])); ?>

                                        <?php echo e(Form::text('footer_value_2', null, ['class' => 'form-control', 'placeholder' => __('Enter Footer Link 2')])); ?>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('footer_link_3', __('Footer Link Title 3'), ['class' => 'form-control-label'])); ?>

                                        <?php echo e(Form::text('footer_link_3', null, ['class' => 'form-control', 'placeholder' => __('Enter Footer Link Title 3')])); ?>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('footer_value_3', __('Footer Link href 3'), ['class' => 'form-control-label'])); ?>

                                        <?php echo e(Form::text('footer_value_3', null, ['class' => 'form-control', 'placeholder' => __('Enter Footer Link 3')])); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <?php echo e(Form::submit(__('Save Change'), ['class' => 'btn btn-sm btn-primary rounded-pill'])); ?>

                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                    <div class="tab-pane fade show" id="email_setting" role="tabpanel" aria-labelledby="orders-tab">
                        <div class="">
                            <?php echo e(Form::model($settings, ['route' => ['email.setting'], 'method' => 'POST', 'class' => 'permission_table_information', 'enctype' => 'multipart/form-data'])); ?>

                            <?php echo e(Form::hidden('form_type', 'email_setting')); ?>

                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_driver', __('Mail Driver'), ['class' => 'form-control-label'])); ?>

                                        <?php echo e(Form::text('mail_driver', env('MAIL_DRIVER'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Driver')])); ?>

                                        <?php $__errorArgs = ['mail_driver'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_driver" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_host', __('Mail Host'), ['class' => 'form-control-label'])); ?>

                                        <?php echo e(Form::text('mail_host', env('MAIL_HOST'), ['class' => 'form-control ', 'placeholder' => __('Enter Mail Driver')])); ?>

                                        <?php $__errorArgs = ['mail_host'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_driver" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_port', __('Mail Port'), ['class' => 'form-control-label'])); ?>

                                        <?php echo e(Form::text('mail_port', env('MAIL_PORT'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Port')])); ?>

                                        <?php $__errorArgs = ['mail_port'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_port" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_username', __('Mail Username'), ['class' => 'form-control-label'])); ?>

                                        <?php echo e(Form::text('mail_username', env('MAIL_USERNAME'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Username')])); ?>

                                        <?php $__errorArgs = ['mail_username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_username" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_password', __('Mail Password'), ['class' => 'form-control-label'])); ?>

                                        <input class="form-control" placeholder="<?php echo e(__('Enter Mail Password')); ?>"
                                            name="mail_password" type="password" value="<?php echo e(env('MAIL_PASSWORD')); ?>"
                                            id="mail_password">
                                        <?php $__errorArgs = ['mail_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_password" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_encryption', __('Mail Encryption'), ['class' => 'form-control-label'])); ?>

                                        <?php echo e(Form::text('mail_encryption', env('MAIL_ENCRYPTION'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Encryption')])); ?>

                                        <?php $__errorArgs = ['mail_encryption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_encryption" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_from_address', __('Mail From Address'), ['class' => 'form-control-label'])); ?>

                                        <?php echo e(Form::text('mail_from_address', env('MAIL_FROM_ADDRESS'), ['class' => 'form-control', 'placeholder' => __('Enter Mail From Address')])); ?>

                                        <?php $__errorArgs = ['mail_from_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_from_address" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_from_name', __('Mail From Name'), ['class' => 'form-control-label'])); ?>

                                        <?php echo e(Form::text('mail_from_name', env('MAIL_FROM_NAME'), ['class' => 'form-control', 'placeholder' => __('Enter Mail From Name')])); ?>

                                        <?php $__errorArgs = ['mail_from_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_from_name" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <a href="#" data-url="<?php echo e(route('test.mail')); ?>" data-ajax-popup="true"
                                            data-title="<?php echo e(__('Send Test Mail')); ?>"
                                            class="btn btn-sm btn-info rounded-pill">
                                            <?php echo e(__('Send Test Mail')); ?>

                                        </a>
                                    </div>
                                    <div class="form-group col-6 text-right">
                                        <?php echo e(Form::submit(__('Save Change'), ['class' => 'btn btn-sm btn-primary rounded-pill'])); ?>

                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                    <div class="tab-pane fade show " id="payment_setting" role="tabpanel" aria-labelledby="orders-tab">
                        <div class="">
                            <div class="card-header">
                                <h5 class="h6 mb-0"><?php echo e(__('Payment Settings')); ?></h5>
                                <small><?php echo e(__('This detail will use for make purchase of plan.')); ?></small>
                            </div>
                            <div class="card-body">
                                <?php echo e(Form::open(['route' => 'payment.setting', 'method' => 'post'])); ?>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('currency_symbol', __('Currency Symbol *'), ['class' => 'form-control-label'])); ?>

                                            <?php echo e(Form::text('currency_symbol', env('CURRENCY_SYMBOL'), ['class' => 'form-control', 'required'])); ?>

                                            <?php $__errorArgs = ['currency_symbol'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-currency_symbol" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('currency', __('Currency *'), ['class' => 'form-control-label'])); ?>

                                            <?php echo e(Form::text('currency', env('CURRENCY'), ['class' => 'form-control font-style', 'required'])); ?>

                                            <small> <?php echo e(__('Note: Add currency code as per three-letter ISO code.')); ?><br>
                                                <a href="https://stripe.com/docs/currencies"
                                                    target="_blank"><?php echo e(__('you can find out here..')); ?></a></small> <br>
                                            <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-currency" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>

                                <hr>                                
                                <div id="accordion-2" class="accordion accordion-spaced">
                                    <!-- Strip -->
                                    <div class="card">
                                        <div class="card-header py-4 collapsed" id="heading-2-2" data-toggle="collapse"
                                            role="button" data-target="#collapse-2-2" aria-expanded="false"
                                            aria-controls="collapse-2-2">
                                            <h6 class="mb-0"><i class="far fa-credit-card mr-3"></i><?php echo e(__('Stripe')); ?></h6>
                                        </div>
                                        <div id="collapse-2-2" class="collapse" aria-labelledby="heading-2-2"
                                            data-parent="#accordion-2" style="">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6 py-2">
                                                        <h5 class="h5"><?php echo e(__('Stripe')); ?></h5>
                                                    </div>
                                                    <div class="col-6 py-2 text-right">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" name="is_stripe_enabled" id="is_stripe_enabled"
                                                            <?php echo e(isset($admin_payment_setting['is_stripe_enabled']) && $admin_payment_setting['is_stripe_enabled'] == 'on' ? 'checked="checked"' : ''); ?> >
                                                            <label class="custom-control-label form-control-label" for="is_stripe_enabled"><?php echo e(__('Enable Stripe')); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('stripe_key',__('Stripe Key'), ['class' => 'form-control-label'])); ?>

                                                            <?php echo e(Form::text('stripe_key',isset($admin_payment_setting['stripe_key'])?$admin_payment_setting['stripe_key']:'',['class'=>'form-control','placeholder'=>__('Enter Stripe Key')])); ?>

                                                            <?php $__errorArgs = ['stripe_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-stripe_key" role="alert">
                                                                 <strong class="text-danger"><?php echo e($message); ?></strong>
                                                             </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('stripe_secret',__('Stripe Secret'), ['class' => 'form-control-label'])); ?>

                                                            <?php echo e(Form::text('stripe_secret',isset($admin_payment_setting['stripe_secret'])?$admin_payment_setting['stripe_secret']:'',['class'=>'form-control ','placeholder'=>__('Enter Stripe Secret')])); ?>

                                                            <?php $__errorArgs = ['stripe_secret'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-stripe_secret" role="alert">
                                                                 <strong class="text-danger"><?php echo e($message); ?></strong>
                                                             </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Paypal -->
                                    <div class="card">
                                        <div class="card-header py-4 collapsed" id="heading-2-3" data-toggle="collapse"
                                            role="button" data-target="#collapse-2-3" aria-expanded="false"
                                            aria-controls="collapse-2-3">
                                            <h6 class="mb-0"><i class="far fa-credit-card mr-3"></i><?php echo e(__('PayPal')); ?></h6>
                                        </div>
                                        <div id="collapse-2-3" class="collapse" aria-labelledby="heading-2-3" data-parent="#accordion-2" style="">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6 py-2">
                                                        <h5 class="h5"><?php echo e(__('PayPal')); ?></h5>
                                                    </div>
                                                    <div class="col-6 py-2 text-right">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" name="is_paypal_enabled" id="is_paypal_enabled" <?php echo e(isset($admin_payment_setting['is_paypal_enabled']) && $admin_payment_setting['is_paypal_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label class="custom-control-label form-control-label" for="is_paypal_enabled"><?php echo e(__('Enable Paypal')); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 pb-4">
                                                        <label class="paypal-label form-control-label" for="paypal_mode"><?php echo e(__('Paypal Mode')); ?></label> <br>
                                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                            <label class="btn btn-primary btn-sm <?php echo e(isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == 'sandbox' ? 'active' : ''); ?>">
                                                                <input type="radio" name="paypal_mode" value="sandbox" <?php echo e(isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == 'sandbox' ? 'checked="checked"' : ''); ?> >
                                                                <?php echo e(__('Sandbox')); ?>

                                                            </label>
                                                            <label class="btn btn-primary btn-sm <?php echo e(isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == 'live' ? 'active' : ''); ?>">
                                                                <input type="radio" name="paypal_mode" value="live" <?php echo e(isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                <?php echo e(__('Live')); ?>

                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="paypal_client_id" class = 'form-control-label'><?php echo e(__('Client ID')); ?></label>
                                                            <input type="text" name="paypal_client_id" id="paypal_client_id" class="form-control" value="<?php echo e(isset($admin_payment_setting['paypal_client_id']) ? $admin_payment_setting['paypal_client_id'] : ''); ?>" placeholder="<?php echo e(__('Client ID')); ?>"/>
                                                            <?php if($errors->has('paypal_client_id')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                <?php echo e($errors->first('paypal_client_id')); ?>

                                                            </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="paypal_secret_key"  class = 'form-control-label'><?php echo e(__('Secret Key')); ?></label>
                                                            <input type="text" name="paypal_secret_key" id="paypal_secret_key" class="form-control" value="<?php echo e(isset($admin_payment_setting['paypal_secret_key']) ? $admin_payment_setting['paypal_secret_key'] : ''); ?>" placeholder="<?php echo e(__('Secret Key')); ?>"/>
                                                            <?php if($errors->has('paypal_secret_key')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                <?php echo e($errors->first('paypal_secret_key')); ?>

                                                            </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Paystack -->
                                    <div class="card">
                                        <div class="card-header py-4" id="heading-2-6" data-toggle="collapse" role="button" data-target="#collapse-2-6" aria-expanded="false" aria-controls="collapse-2-6">
                                            <h6 class="mb-0"><i class="far fa-credit-card mr-3"></i><?php echo e(__('Paystack')); ?></h6>
                                        </div>
                                        <div id="collapse-2-6" class="collapse" aria-labelledby="heading-2-6" data-parent="#accordion-2">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6 py-2">
                                                        <h5 class="h5"><?php echo e(__('Paystack')); ?></h5>
                                                        <small> <?php echo e(__('Note: This detail will use for make checkout of shopping cart.')); ?></small>
                                                    </div>
                                                    <div class="col-6 py-2 text-right">
                                                        <div class="custom-control custom-switch">
                                                            <input type="hidden" name="is_paystack_enabled" value="off">
                                                            <input type="checkbox" class="custom-control-input" name="is_paystack_enabled" id="is_paystack_enabled" <?php echo e(isset($admin_payment_setting['is_paystack_enabled']) && $admin_payment_setting['is_paystack_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label class="custom-control-label form-control-label" for="is_paystack_enabled"><?php echo e(__('Enable Paystack')); ?></label>
                                                        </div>
                                                    </div>
    
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="paypal_client_id"><?php echo e(__('Public Key')); ?></label>
                                                            <input type="text" name="paystack_public_key" id="paystack_public_key" class="form-control" value="<?php echo e(isset($admin_payment_setting['paystack_public_key']) ? $admin_payment_setting['paystack_public_key']:''); ?>" placeholder="<?php echo e(__('Public Key')); ?>"/>
                                                            <?php if($errors->has('paystack_public_key')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                        <?php echo e($errors->first('paystack_public_key')); ?>

                                                                    </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="paystack_secret_key"><?php echo e(__('Secret Key')); ?></label>
                                                            <input type="text" name="paystack_secret_key" id="paystack_secret_key" class="form-control" value="<?php echo e(isset($admin_payment_setting['paystack_secret_key']) ? $admin_payment_setting['paystack_secret_key']:''); ?>" placeholder="<?php echo e(__('Secret Key')); ?>"/>
                                                            <?php if($errors->has('paystack_secret_key')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                        <?php echo e($errors->first('paystack_secret_key')); ?>

                                                                    </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <!-- FLUTTERWAVE -->
                                    <div class="card">
                                        <div class="card-header py-4" id="heading-2-7" data-toggle="collapse" role="button" data-target="#collapse-2-7" aria-expanded="false" aria-controls="collapse-2-7">
                                            <h6 class="mb-0"><i class="far fa-credit-card mr-3"></i><?php echo e(__('Flutterwave')); ?></h6>
                                        </div>
                                        <div id="collapse-2-7" class="collapse" aria-labelledby="heading-2-7" data-parent="#accordion-2">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6 py-2">
                                                        <h5 class="h5"><?php echo e(__('Flutterwave')); ?></h5>
                                                        <small> <?php echo e(__('Note: This detail will use for make checkout of shopping cart.')); ?></small>
                                                    </div>
                                                    <div class="col-6 py-2 text-right">
                                                        <div class="custom-control custom-switch">
                                                            <input type="hidden" name="is_flutterwave_enabled" value="off">
                                                            <input type="checkbox" class="custom-control-input" name="is_flutterwave_enabled" id="is_flutterwave_enabled" <?php echo e(isset($admin_payment_setting['is_flutterwave_enabled'])  && $admin_payment_setting['is_flutterwave_enabled']== 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label class="custom-control-label form-control-label" for="is_flutterwave_enabled"><?php echo e(__('Enable Flutterwave')); ?></label>
                                                        </div>
                                                    </div>
    
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="paypal_client_id"><?php echo e(__('Public Key')); ?></label>
                                                            <input type="text" name="flutterwave_public_key" id="flutterwave_public_key" class="form-control" value="<?php echo e(isset($admin_payment_setting['flutterwave_public_key'])?$admin_payment_setting['flutterwave_public_key']:''); ?>" placeholder="<?php echo e(__('Public Key')); ?>"/>
                                                            <?php if($errors->has('flutterwave_public_key')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                        <?php echo e($errors->first('flutterwave_public_key')); ?>

                                                                    </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="paystack_secret_key"><?php echo e(__('Secret Key')); ?></label>
                                                            <input type="text" name="flutterwave_secret_key" id="flutterwave_secret_key" class="form-control" value="<?php echo e(isset($admin_payment_setting['flutterwave_secret_key'])?$admin_payment_setting['flutterwave_secret_key']:''); ?>" placeholder="<?php echo e(__('Secret Key')); ?>"/>
                                                            <?php if($errors->has('flutterwave_secret_key')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                        <?php echo e($errors->first('flutterwave_secret_key')); ?>

                                                                    </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Razorpay -->
                                    <div class="card">
                                        <div class="card-header py-4" id="heading-2-8" data-toggle="collapse" role="button" data-target="#collapse-2-8" aria-expanded="false" aria-controls="collapse-2-8">
                                            <h6 class="mb-0"><i class="far fa-credit-card mr-3"></i><?php echo e(__('Razorpay')); ?></h6>
                                        </div>
                                        <div id="collapse-2-8" class="collapse" aria-labelledby="heading-2-7" data-parent="#accordion-2">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6 py-2">
                                                        <h5 class="h5"><?php echo e(__('Razorpay')); ?></h5>
                                                        <small> <?php echo e(__('Note: This detail will use for make checkout of shopping cart.')); ?></small>
                                                    </div>
                                                    <div class="col-6 py-2 text-right">
                                                        <div class="custom-control custom-switch">
                                                            <input type="hidden" name="is_razorpay_enabled" value="off">
                                                            <input type="checkbox" class="custom-control-input" name="is_razorpay_enabled" id="is_razorpay_enabled" <?php echo e(isset($admin_payment_setting['is_razorpay_enabled']) && $admin_payment_setting['is_razorpay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label class="custom-control-label form-control-label" for="is_razorpay_enabled"><?php echo e(__('Enable Razorpay')); ?></label>
                                                        </div>
                                                    </div>
    
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="paypal_client_id"><?php echo e(__('Public Key')); ?></label>
    
                                                            <input type="text" name="razorpay_public_key" id="razorpay_public_key" class="form-control" value="<?php echo e(isset($admin_payment_setting['razorpay_public_key'])?$admin_payment_setting['razorpay_public_key']:''); ?>" placeholder="<?php echo e(__('Public Key')); ?>"/>
                                                            <?php if($errors->has('razorpay_public_key')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                        <?php echo e($errors->first('razorpay_public_key')); ?>

                                                                    </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="paystack_secret_key"><?php echo e(__('Secret Key')); ?></label>
                                                            <input type="text" name="razorpay_secret_key" id="razorpay_secret_key" class="form-control" value="<?php echo e(isset($admin_payment_setting['razorpay_secret_key'])?$admin_payment_setting['razorpay_secret_key']:''); ?>" placeholder="<?php echo e(__('Secret Key')); ?>"/>
                                                            <?php if($errors->has('razorpay_secret_key')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                        <?php echo e($errors->first('razorpay_secret_key')); ?>

                                                                    </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Mercado Pago-->
                                    <div class="card">
                                        <div class="card-header py-4" id="heading-2-12" data-toggle="collapse" role="button" data-target="#collapse-2-12" aria-expanded="false" aria-controls="collapse-2-12">
                                            <h6 class="mb-0"><i class="far fa-credit-card mr-3"></i><?php echo e(__('Mercado Pago')); ?></h6>
                                        </div>
                                        <div id="collapse-2-12" class="collapse" aria-labelledby="heading-2-12" data-parent="#accordion-2">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6 py-2">
                                                        <h5 class="h5"><?php echo e(__('Mercado Pago')); ?></h5>
                                                        <small> <?php echo e(__('Note: This detail will use for make checkout of shopping cart.')); ?></small>
                                                    </div>
                                                    <div class="col-6 py-2 text-right">
                                                        <div class="custom-control custom-switch">
                                                            <input type="hidden" name="is_mercado_enabled" value="off">
                                                            <input type="checkbox" class="custom-control-input" name="is_mercado_enabled" id="is_mercado_enabled" <?php echo e(isset($admin_payment_setting['is_mercado_enabled']) &&  $admin_payment_setting['is_mercado_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label class="custom-control-label form-control-label" for="is_mercado_enabled"><?php echo e(__('Enable Mercado Pago')); ?></label>
                                                        </div>
                                                    </div>
    
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="mercado_app_id"><?php echo e(__('App ID')); ?></label>
                                                            <input type="text" name="mercado_app_id" id="mercado_app_id" class="form-control" value="<?php echo e(isset($admin_payment_setting['mercado_app_id']) ?  $admin_payment_setting['mercado_app_id']:''); ?>" placeholder="<?php echo e(__('App ID')); ?>"/>
                                                            <?php if($errors->has('mercado_app_id')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                        <?php echo e($errors->first('mercado_app_id')); ?>

                                                                    </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="mercado_secret_key"><?php echo e(__('App Secret KEY')); ?></label>
                                                            <input type="text" name="mercado_secret_key" id="mercado_secret_key" class="form-control" value="<?php echo e(isset($admin_payment_setting['mercado_secret_key']) ? $admin_payment_setting['mercado_secret_key']:''); ?>" placeholder="<?php echo e(__('App Secret Key')); ?>"/>                                                        <?php if($errors->has('mercado_secret_key')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                        <?php echo e($errors->first('mercado_secret_key')); ?>

                                                                    </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Paytm -->
                                    <div class="card">
                                        <div class="card-header py-4" id="heading-2-8" data-toggle="collapse" role="button" data-target="#collapse-2-9" aria-expanded="false" aria-controls="collapse-2-9">
                                            <h6 class="mb-0"><i class="far fa-credit-card mr-3"></i><?php echo e(__('Paytm')); ?></h6>
                                        </div>
                                        <div id="collapse-2-9" class="collapse" aria-labelledby="heading-2-7" data-parent="#accordion-2">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6 py-2">
                                                        <h5 class="h5"><?php echo e(__('Paytm')); ?></h5>
                                                        <small> <?php echo e(__('Note: This detail will use for make checkout of shopping cart.')); ?></small>
                                                    </div>
                                                    <div class="col-6 py-2 text-right">
                                                        <div class="custom-control custom-switch">
                                                            <input type="hidden" name="is_paytm_enabled" value="off">
                                                            <input type="checkbox" class="custom-control-input" name="is_paytm_enabled" id="is_paytm_enabled" <?php echo e(isset($admin_payment_setting['is_paytm_enabled']) && $admin_payment_setting['is_paytm_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label class="custom-control-label form-control-label" for="is_paytm_enabled"><?php echo e(__('Enable Paytm')); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 pb-4">
                                                        <label class="paypal-label form-control-label" for="paypal_mode"><?php echo e(__('Paytm Environment')); ?></label> <br>
                                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                            <label class="btn btn-primary btn-sm <?php echo e(isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == 'local' ? 'active' : ''); ?>">
                                                                <input type="radio" name="paytm_mode" value="local" <?php echo e(isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == '' || isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == 'local' ? 'checked="checked"' : ''); ?>><?php echo e(__('Local')); ?>

                                                            </label>
                                                            <label class="btn btn-primary btn-sm <?php echo e(isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == 'live' ? 'active' : ''); ?>">
                                                                <input type="radio" name="paytm_mode" value="production" <?php echo e(isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == 'production' ? 'checked="checked"' : ''); ?>><?php echo e(__('Production')); ?>

                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="paytm_public_key"><?php echo e(__('Merchant ID')); ?></label>
                                                            <input type="text" name="paytm_merchant_id" id="paytm_merchant_id" class="form-control" value="<?php echo e(isset($admin_payment_setting['paytm_merchant_id'])? $admin_payment_setting['paytm_merchant_id']:''); ?>" placeholder="<?php echo e(__('Merchant ID')); ?>"/>
                                                            <?php if($errors->has('paytm_merchant_id')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('paytm_merchant_id')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="paytm_secret_key"><?php echo e(__('Merchant Key')); ?></label>
                                                            <input type="text" name="paytm_merchant_key" id="paytm_merchant_key" class="form-control" value="<?php echo e(isset($admin_payment_setting['paytm_merchant_key']) ? $admin_payment_setting['paytm_merchant_key']:''); ?>" placeholder="<?php echo e(__('Merchant Key')); ?>"/>
                                                            <?php if($errors->has('paytm_merchant_key')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('paytm_merchant_key')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="paytm_industry_type"><?php echo e(__('Industry Type')); ?></label>
                                                            <input type="text" name="paytm_industry_type" id="paytm_industry_type" class="form-control" value="<?php echo e(isset($admin_payment_setting['paytm_industry_type']) ?$admin_payment_setting['paytm_industry_type']:''); ?>" placeholder="<?php echo e(__('Industry Type')); ?>"/>
                                                            <?php if($errors->has('paytm_industry_type')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('paytm_industry_type')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Mollie -->
                                    <div class="card">
                                        <div class="card-header py-4" id="heading-2-8" data-toggle="collapse" role="button" data-target="#collapse-2-10" aria-expanded="false" aria-controls="collapse-2-10">
                                            <h6 class="mb-0"><i class="far fa-credit-card mr-3"></i><?php echo e(__('Mollie')); ?></h6>
                                        </div>
                                        <div id="collapse-2-10" class="collapse" aria-labelledby="heading-2-7" data-parent="#accordion-2">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6 py-2">
                                                        <h5 class="h5"><?php echo e(__('Mollie')); ?></h5>
                                                        <small> <?php echo e(__('Note: This detail will use for make checkout of shopping cart.')); ?></small>
                                                    </div>
                                                    <div class="col-6 py-2 text-right">
                                                        <div class="custom-control custom-switch">
                                                            <input type="hidden" name="is_mollie_enabled" value="off">
                                                            <input type="checkbox" class="custom-control-input" name="is_mollie_enabled" id="is_mollie_enabled" <?php echo e(isset($admin_payment_setting['is_mollie_enabled']) && $admin_payment_setting['is_mollie_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label class="custom-control-label form-control-label" for="is_mollie_enabled"><?php echo e(__('Enable Mollie')); ?></label>
                                                        </div>
                                                    </div>
    
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="mollie_api_key"><?php echo e(__('Mollie Api Key')); ?></label>
                                                            <input type="text" name="mollie_api_key" id="mollie_api_key" class="form-control" value="<?php echo e(isset($admin_payment_setting['mollie_api_key'])?$admin_payment_setting['mollie_api_key']:''); ?>" placeholder="<?php echo e(__('Mollie Api Key')); ?>"/>
                                                            <?php if($errors->has('mollie_api_key')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                        <?php echo e($errors->first('mollie_api_key')); ?>

                                                                    </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="mollie_profile_id"><?php echo e(__('Mollie Profile Id')); ?></label>
                                                            <input type="text" name="mollie_profile_id" id="mollie_profile_id" class="form-control" value="<?php echo e(isset($admin_payment_setting['mollie_profile_id'])?$admin_payment_setting['mollie_profile_id']:''); ?>" placeholder="<?php echo e(__('Mollie Profile Id')); ?>"/>
                                                            <?php if($errors->has('mollie_profile_id')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                        <?php echo e($errors->first('mollie_profile_id')); ?>

                                                                    </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="mollie_partner_id"><?php echo e(__('Mollie Partner Id')); ?></label>
                                                            <input type="text" name="mollie_partner_id" id="mollie_partner_id" class="form-control" value="<?php echo e(isset($admin_payment_setting['mollie_partner_id'])?$admin_payment_setting['mollie_partner_id']:''); ?>" placeholder="<?php echo e(__('Mollie Partner Id')); ?>"/>
                                                            <?php if($errors->has('mollie_partner_id')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                        <?php echo e($errors->first('mollie_partner_id')); ?>

                                                                    </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Skrill -->
                                    <div class="card">
                                        <div class="card-header py-4" id="heading-2-8" data-toggle="collapse" role="button" data-target="#collapse-2-13" aria-expanded="false" aria-controls="collapse-2-10">
                                            <h6 class="mb-0"><i class="far fa-credit-card mr-3"></i><?php echo e(__('Skrill')); ?></h6>
                                        </div>
                                        <div id="collapse-2-13" class="collapse" aria-labelledby="heading-2-7" data-parent="#accordion-2">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6 py-2">
                                                        <h5 class="h5"><?php echo e(__('Skrill')); ?></h5>
                                                        <small> <?php echo e(__('Note: This detail will use for make checkout of shopping cart.')); ?></small>
                                                    </div>
                                                    <div class="col-6 py-2 text-right">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" name="is_skrill_enabled" id="is_skrill_enabled" <?php echo e(isset($admin_payment_setting['is_skrill_enabled']) && $admin_payment_setting['is_skrill_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label class="custom-control-label form-control-label" for="is_skrill_enabled"><?php echo e(__('Enable Skrill')); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="mollie_api_key"><?php echo e(__('Skrill Email')); ?></label>
                                                            <input type="email" name="skrill_email" id="skrill_email" class="form-control" value="<?php echo e(isset($admin_payment_setting['skrill_email'])?$admin_payment_setting['skrill_email']:''); ?>" placeholder="<?php echo e(__('Mollie Api Key')); ?>"/>
                                                            <?php if($errors->has('skrill_email')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                        <?php echo e($errors->first('skrill_email')); ?>

                                                                    </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- CoinGate -->
                                    <div class="card">
                                        <div class="card-header py-4" id="heading-2-8" data-toggle="collapse" role="button" data-target="#collapse-2-15" aria-expanded="false" aria-controls="collapse-2-10">
                                            <h6 class="mb-0"><i class="far fa-credit-card mr-3"></i><?php echo e(__('CoinGate')); ?></h6>
                                        </div>
                                        <div id="collapse-2-15" class="collapse" aria-labelledby="heading-2-7" data-parent="#accordion-2">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6 py-2">
                                                        <h5 class="h5"><?php echo e(__('CoinGate')); ?></h5>
                                                        <small> <?php echo e(__('Note: This detail will use for make checkout of shopping cart.')); ?></small>
                                                    </div>
                                                    <div class="col-6 py-2 text-right">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" name="is_coingate_enabled" id="is_coingate_enabled" <?php echo e(isset($admin_payment_setting['is_coingate_enabled']) && $admin_payment_setting['is_coingate_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label class="custom-control-label form-control-label" for="is_coingate_enabled"><?php echo e(__('Enable CoinGate')); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 pb-4">
                                                        <label class="coingate-label form-control-label" for="coingate_mode"><?php echo e(__('CoinGate Mode')); ?></label> <br>
                                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                            <label class="btn btn-primary btn-sm <?php echo e(isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == 'sandbox' ? 'active' : ''); ?>">
                                                                <input type="radio" name="coingate_mode" value="sandbox" <?php echo e(isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == '' || isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == 'sandbox' ? 'checked="checked"' : ''); ?>><?php echo e(__('Sandbox')); ?>

                                                            </label>
                                                            <label class="btn btn-primary btn-sm <?php echo e(isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == 'live' ? 'active' : ''); ?>">
                                                                <input type="radio" name="coingate_mode" value="live" <?php echo e(isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == 'live' ? 'checked="checked"' : ''); ?>><?php echo e(__('Live')); ?>

                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="coingate_auth_token"><?php echo e(__('CoinGate Auth Token')); ?></label>
                                                            <input type="text" name="coingate_auth_token" id="coingate_auth_token" class="form-control" value="<?php echo e(isset($admin_payment_setting['coingate_auth_token'])?$admin_payment_setting['coingate_auth_token']:''); ?>" placeholder="<?php echo e(__('CoinGate Auth Token')); ?>"/>
                                                            <?php if($errors->has('coingate_auth_token')): ?>
                                                                <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('coingate_auth_token')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <?php echo e(Form::submit(__('Save Change'), ['class' => 'btn btn-sm btn-primary rounded-pill'])); ?>

                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade show" id="pusher_setting" role="tabpanel" aria-labelledby="orders-tab">
                        <?php echo e(Form::model($settings, ['route' => ['pusher.setting'], 'method' => 'POST', 'class'=>"permission_table_information", 'enctype'=>"multipart/form-data" ])); ?>

                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12">                                                                                
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch1" name="enable_chat" <?php echo e((!empty(env('ENABLE_CHAT')) && env('ENABLE_CHAT') == 'on' ) ? 'checked="checked"' : ''); ?>>
                                            <label class="custom-control-label" for="customSwitch1"><?php echo e(__('Enable Chat')); ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('',__('Pusher App Id'), ['class' => 'form-control-label'])); ?>

                                        <?php echo e(Form::text('pusher_app_id',env('PUSHER_APP_ID'),array('class'=>'form-control','placeholder'=>__('**************************')))); ?>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('',__('Pusher App Key'), ['class' => 'form-control-label'])); ?>

                                        <?php echo e(Form::text('pusher_app_key',env('PUSHER_APP_KEY'),array('class'=>'form-control','placeholder'=>__('**************************')))); ?>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('',__('Pusher App Secret'), ['class' => 'form-control-label'])); ?>

                                        <?php echo e(Form::text('pusher_app_secret',env('PUSHER_APP_SECRET'),array('class'=>'form-control','placeholder'=>__('**************************')))); ?>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('',__('Pusher App Cluster'), ['class' => 'form-control-label'])); ?>

                                        <?php echo e(Form::text('pusher_app_cluster',env('PUSHER_APP_CLUSTER'),array('class'=>'form-control','placeholder'=>__('**************************')))); ?>

                                    </div>                                    
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="form-group col-12 text-right">
                                        <?php echo e(Form::submit(__('Save Change'),array('class'=>'btn btn-sm btn-primary rounded-pill'))); ?>

                                    </div>
                                </div>
                            </div>                                  
                        <?php echo e(Form::close()); ?>                        
                    </div>  
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\medtimes\resources\views/employeesetting/superadminsetting.blade.php ENDPATH**/ ?>