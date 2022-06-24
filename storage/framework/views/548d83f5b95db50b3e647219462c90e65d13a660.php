<!DOCTYPE html>
    <?php
        $logo=asset(Storage::url('uploads/logo/'));
        $company_favicon=Utility::getValByName('company_favicon');
        $company_logo = Utility::getValByName('company_logo');        
    ?>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir = "<?php echo e(env('SITE_RTL') == 'on'?'rtl':''); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="RotaGo - Staff Scheduling Tool">
    <meta name="author" content="Rajodiya Infotech">    
    <title><?php echo $__env->yieldContent('page-title'); ?> - <?php echo e((Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'RotaGo')); ?></title>    
    <!-- Favicon -->        
    <link rel="icon" href="<?php echo e($logo.'/'.(isset($company_favicon) && !empty($company_favicon)?$company_favicon:'favicon.png')); ?>" type="image" sizes="16x16">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="keywords" content="HTML, CSS, JavaScript">
 
    
    
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/@fortawesome/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/fullcalendar/dist/fullcalendar.min.css')); ?>">    
<link rel="stylesheet" href="<?php echo e(asset('assets/css/site.css')); ?>" id="stylesheet">    
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/select2/dist/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/animate.css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/range-date-picker/daterangepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/jqueryui/jquery-ui.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>">
    <?php if(Auth::user()->mode == 'light'): ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/site-light.css')); ?>">
    <?php endif; ?>        
    <?php if(Auth::user()->mode == 'dark'): ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/site-dark.css')); ?>">    
    <?php endif; ?>        

    <?php if(env('SITE_RTL')=='on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap-rtl.css')); ?>">
    <?php endif; ?>
    
    <?php echo $__env->yieldContent('availabilitylink'); ?>
</head>
<body class="application application-offset sidenav-pinned ready">
    
    <div class="ajax-progress progressbar">
    </div>
    <!-- Chat modal -->
    <!-- Application container -->
    <div class="container-fluid container-application">
    <!-- Content -->
        <div class="main-content position-relative h-95-overflow">
            <!-- Main nav -->
            <nav class="navbar navbar-main navbar-expand-lg navbar-dark bg-primary navbar-border" id="navbar-main">
                <div class="container-fluid">
                    <!-- Brand + Toggler (for mobile devices) -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-main-collapse" aria-controls="navbar-main-collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- User's navbar -->
                    <div class="navbar-user d-lg-none ml-auto">
                        <ul class="navbar-nav flex-row align-items-center"></ul>
                            <li class="nav-item dropdown dropdown-animate">
                                <a class="nav-link pr-lg-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="User Image"  src="<?php echo e(asset(Storage::url(Auth::user()->getUserInfo->DefaultProfilePic()))); ?>" class="avatar rounded-circle">>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-menu-arrow">
                                    <h6 class="dropdown-header px-0"><?php echo e(__('Hii , ')); ?> <?php echo e((!empty(Auth::user()->first_name)) ? Auth::user()->first_name.' !' : Auth::user()->company_name.' !'); ?></h6>
                                    <a href="<?php echo e(url('profile/'.Auth::id())); ?>" class="dropdown-item">
                                        <i class="fas fa-user"></i>
                                        <span><?php echo e(__('My profile')); ?></span>
                                    </a>

                                    <?php if(Auth::user()->acount_type == 1): ?>
                                    <a href="<?php echo e(url('setting')); ?>" class="dropdown-item">
                                        <i class="fas fa-cog"></i>
                                        <span><?php echo e(__('Settings')); ?></span>
                                    </a>
                                    <?php endif; ?>
                                    <div class="dropdown-divider"></div>
                                    <a href="<?php echo e(route('logout')); ?>" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i>
                                        <span><?php echo e(__('Logout')); ?></span>
                                    </a>
                                    <?php echo Form::open(['method' => 'POST', 'route' => ['logout'],'id' => 'logout-form', 'style' => 'display: none;']); ?>

                                    <?php echo Form::close(); ?>

                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- Navbar nav -->
                    <div class="collapse navbar-collapse navbar-collapse-fade" id="navbar-main-collapse">
                        <ul class="navbar-nav align-items-lg-center">
                            <!-- Overview  -->
                            <li class="nav-item">
                                <div class="d-flex align-items-center mr-5">
                                    <a class="navbar-brand" href="<?php echo e(url('dashboard')); ?>">
                                        <img src="<?php echo e($logo.'/'.(isset($company_logo) && !empty($company_logo)?$company_logo:'logo.png')); ?>" class="navbar-brand-img custom-logo" alt="<?php echo e(__('Company Logo')); ?>">
                                    </a>
                                </div>
                            </li>
                            <li class="border-top opacity-2 my-2"></li>
                            
                            <!-- Dashboard  -->                            
                            <li class="nav-item"> <a class="nav-link pl-lg-0" href="<?php echo e(url('dashboard')); ?>"> <?php echo e(__('Dashboard')); ?> </a> </li>                            
                            <?php if(Auth::user()->type == 'super admin'): ?>
                            <li class="nav-item"> <a class="nav-link pl-lg-0" href="<?php echo e(url('user')); ?>"> <?php echo e(__('User')); ?> </a> </li>                            
                            <li class="nav-item"> <a class="nav-link pl-lg-0" href="<?php echo e(url('plan')); ?>"> <?php echo e(__('Plan')); ?> </a> </li>                            
                            <li class="nav-item"> <a class="nav-link pl-lg-0" href="<?php echo e(url('coupon')); ?>"> <?php echo e(__('Coupon')); ?> </a> </li>                            
                            <li class="nav-item"> <a class="nav-link pl-lg-0" href="<?php echo e(url('order')); ?>"> <?php echo e(__('Order')); ?> </a> </li>                            
                            <li class="nav-item">  <a class="nav-link pl-lg-0" href="<?php echo e(url('manage-language',Auth::user()->lang)); ?>"> <?php echo e(__('Language')); ?> </a> </li>
                            <li class="nav-item "> <a class="nav-link pl-lg-0" href="<?php echo e(url('setting')); ?>"><?php echo e(__('Settings')); ?></a> </li>
                            <li class="nav-item"> <a class="nav-link pl-lg-0" href="<?php echo e(route('custom_landing_page.index')); ?>"> <?php echo e(__('Landing page')); ?> </a> </li>
                            <li class="nav-item "> <a class="nav-link pl-lg-0" href="<?php echo e(url('setting')); ?>"><?php echo e(__('Settings')); ?></a> </li>
                            <?php endif; ?>

                            <?php if(Auth::user()->type != 'super admin'): ?>
                                <!-- Rotas  -->
                                <li class="nav-item "> <a class="nav-link" href="<?php echo e(url('rotas')); ?>"> <?php echo e(__('Rotas')); ?> </a> </li>
                                <?php if(Auth::user()->acount_type == 1 || Auth::user()->getAddEmployeePermission() == 1): ?>
                                <!-- Company  -->
                                <li class="nav-item dropdown dropdown-animate" data-toggle="hover">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php echo e(__('Company')); ?>

                                    </a>
                                    <div class="dropdown-menu dropdown-menu-arrow p-lg-0">
                                        <div class="dropdown-menu-links rounded-bottom delimiter-top p-lg-4">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <?php if(Auth::user()->acount_type == 1 || Auth::user()->getAddEmployeePermission() == 1): ?>
                                                        <a href="<?php echo e(url('employees')); ?>" class="dropdown-item"><?php echo e(__('Employee')); ?></a>
                                                    <?php endif; ?>
                                                    <?php if(Auth::user()->acount_type == 1): ?>
                                                        <a href="<?php echo e(url('locations')); ?>" class="dropdown-item"><?php echo e(__('Location')); ?></a>
                                                    <?php endif; ?>
                                                    <?php if(Auth::user()->acount_type == 1 || Auth::user()->getAddRolePermission() == 1): ?>
                                                        <a href="<?php echo e(url('roles')); ?>" class="dropdown-item"><?php echo e(__('Role')); ?></a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php endif; ?>
                                <!-- Leave  -->
                                <li class="nav-item "> <a class="nav-link" href="<?php echo e(url('holidays')); ?>"> <?php echo e(__('Leave')); ?> </a> </li>
                                <!-- Availability  -->
                                <?php if(Auth::user()->getViewAvailabilities() == 1): ?>
                                <li class="nav-item "> <a class="nav-link" href="<?php echo e(url('availabilities')); ?>"> <?php echo e(__('Availability')); ?> </a> </li>
                                <?php endif; ?>
                                <?php if(Auth::user()->acount_type == 1 || Auth::user()->getviewRepotsPermission() == 1): ?>
                                <!-- Reports  -->
                                <li class="nav-item "> <a class="nav-link" href="<?php echo e(url('reports')); ?>"> <?php echo e(__('Reports')); ?> </a> </li>
                                <?php endif; ?>                                
                                <?php if(Auth::user()->type == 'company'): ?>
                                <!-- Settings  -->
                                <li class="nav-item "> <a class="nav-link" href="<?php echo e(url('setting')); ?>"> <?php echo e(__('Settings')); ?> </a> </li>
                                <?php endif; ?>                                
                                <?php if(Auth::user()->type == 'super admin' || Auth::user()->type == 'company'): ?>
                                <!-- Plan  -->
                                <li class="nav-item "> <a class="nav-link" href="<?php echo e(url('plan')); ?>"> <?php echo e(__('Plan')); ?> </a> </li>
                                <?php endif; ?>
                                <?php if(Auth::user()->type == 'company'): ?>
                                <li class="nav-item "> <a class="nav-link" href="<?php echo e(url('chats')); ?>"> <?php echo e(__('Chat')); ?> </a> </li>
                                <?php endif; ?>
                                
                            <?php endif; ?>
                        </ul><!-- Right menu -->
                        <ul class="navbar-nav ml-lg-auto align-items-center d-none d-lg-flex"></ul>
                            <li class="nav-item dropdown dropdown-animate">
                                <a class="nav-link pr-lg-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                                    
                                    <div class="media media-pill align-items-center">
                                        <?php
                                            $users=\Auth::user();
                                            $profile=asset(Storage::url('upload/profile/'));
                                        ?>                                            
                                        <span class="avatar rounded-circle">
                                            <img alt="User Image"  src="<?php echo e(asset(Storage::url(Auth::user()->getUserInfo->DefaultProfilePic()))); ?>" width="30px" class="avatar rounded-circle">                                            
                                        </span>                                        
                                        <div class="ml-2 d-none d-lg-block <?php echo e(env('SITE_RTL') == 'on'? 'ml-0 mr-2':''); ?>">
                                            <span class="mb-0 text-sm  font-weight-bold text-white"><?php echo e((!empty(Auth::user()->first_name)) ? Auth::user()->first_name: Auth::user()->company_name); ?></span>
                                        </div>
                                    </div>                                    
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-menu-arrow">
                                    <h6 class="dropdown-header px-0"><?php echo e(__('Hii , ')); ?> <?php echo e((!empty(Auth::user()->first_name)) ? Auth::user()->first_name.' !' : Auth::user()->company_name.' !'); ?></h6>
                                    <a href="<?php echo e(url('profile/'.Auth::id())); ?>" class="dropdown-item">
                                        <i class="fas fa-user"></i>
                                        <span><?php echo e(__('My profile')); ?></span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="<?php echo e(route('logout')); ?>" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i>
                                        <span><?php echo e(__('Logout')); ?></span>
                                    </a>
                                    <?php echo Form::open(['method' => 'POST', 'route' => ['logout'],'id' => 'logout-form', 'style' => 'display: none;']); ?>

                                    <?php echo Form::close(); ?>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


            <?php echo $__env->yieldContent('content'); ?>

            <?php echo $__env->yieldContent('header-content'); ?>
        </div>
    </div>

    <!-- Footer -->
    
        <div class="container">
            <div class="col-12">
                
                <?php
                    $users=\Auth::user();
                    $currantLang = $users->currentLanguage();
                    $languages=\App\Utility::languages();
                    $footer_text=isset(\App\Utility::settings()['footer_text']) ? \App\Utility::settings()['footer_text'] : '';
                ?>
                
                <div class="footer pt-5 pb-4 footer-light" id="footer-main">
                    <div class="row text-center text-sm-left align-items-sm-center">
                        <div class="col-sm-6">
                            <p class="text-sm mb-0"><?php echo e($footer_text); ?></p>
                        </div>
                        <div class="col-sm-6 mb-md-0">
                            <ul class="nav justify-content-center justify-content-md-end">
                                <li class="nav-item dropdown border-right">
                                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="h6 text-sm mb-0"><i class="fas fa-globe-asia"></i>  <?php echo e(Str::upper($currantLang)); ?></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="<?php echo e(route('change.language',$language)); ?>" class="dropdown-item <?php if($language == $currantLang): ?> active-language <?php endif; ?>">
                                                <span> <?php echo e(Str::upper($language)); ?></span>
                                            </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </li>
                              
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('change.mode')); ?>"><?php echo e((Auth::user()->mode == 'light') ? __('Dark Mode') : __('Light Mode')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(!empty(Utility::getSuperAdminValByName('footer_value_1'))?Utility::getSuperAdminValByName('footer_value_1'):Utility::getValByName('footer_value_1')); ?>"><?php echo e(!empty(Utility::getSuperAdminValByName('footer_link_1'))?Utility::getSuperAdminValByName('footer_link_1'):Utility::getValByName('footer_link_1')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(!empty(Utility::getSuperAdminValByName('footer_value_2'))?Utility::getSuperAdminValByName('footer_value_2'):Utility::getValByName('footer_value_2')); ?>"><?php echo e(!empty(Utility::getSuperAdminValByName('footer_link_2'))?Utility::getSuperAdminValByName('footer_link_2'):Utility::getValByName('footer_link_2')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(!empty(Utility::getSuperAdminValByName('footer_value_3'))?Utility::getSuperAdminValByName('footer_value_3'):Utility::getValByName('footer_value_3')); ?>"><?php echo e(!empty(Utility::getSuperAdminValByName('footer_link_3'))?Utility::getSuperAdminValByName('footer_link_3'):Utility::getValByName('footer_link_3')); ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </div>        
    

    <?php echo $__env->yieldContent('model'); ?>
    <div id="commonModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><span class="model_form_title"><?php echo e(__('Add')); ?></span> <?php echo e(__('Location')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <script src="<?php echo e(asset('assets/js/site.core.js')); ?>"></script>
    <!-- Page JS -->
    <script src="<?php echo e(asset('assets/libs/progressbar.js/dist/progressbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/apexcharts/dist/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/moment/min/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/fullcalendar/dist/fullcalendar.min.js')); ?>"></script>    
    <script src="<?php echo e(asset('assets/js/site.js')); ?>"></script>
    <!-- Demo JS - remove it when starting your project -->
    <script src="<?php echo e(asset('assets/js/demo.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/libs/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/select2/dist/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/range-date-picker/daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/jqueryui/jquery-ui.min.js')); ?>"></script>        
    <script src="<?php echo e(asset('js/jquery.form.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
    <?php echo $__env->yieldContent('availabilityscriptlink'); ?>
    <?php echo $__env->yieldPushContent('pagescript'); ?>

    <?php if(\Session::has('success')): ?>
        <script>
            show_toastr('<?php echo e(__('Success')); ?>', '<?php echo session('success'); ?>', 'success');
        </script>
        <?php echo e(Session::forget('success')); ?>

    <?php endif; ?>

    <?php if(Session::has('error')): ?>
        <script>
            show_toastr('<?php echo e(__('Error')); ?>', '<?php echo session('error'); ?>', 'error');
        </script>
        <?php echo e(Session::forget('error')); ?>

    <?php endif; ?>

    <?php if(\Session::has('successs')): ?>
        <script>
            show_toastr('<?php echo e(__('Success')); ?>', '<?php echo session('successs'); ?>', 'success');
        </script>
        <?php echo e(Session::forget('successs')); ?>

    <?php endif; ?>

    <?php if(Session::has('errors')): ?>
        <script>
            show_toastr('<?php echo e(__('Error')); ?>', '<?php echo session('errors'); ?>', 'error');
        </script>
        <?php echo e(Session::forget('errors')); ?>

    <?php endif; ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\medtimes\resources\views/layouts/main.blade.php ENDPATH**/ ?>