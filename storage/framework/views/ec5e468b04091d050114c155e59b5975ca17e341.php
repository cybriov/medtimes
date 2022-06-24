<!doctype html>
<?php
    $logo=asset(Storage::url('uploads/logo/'));
    $company_favicon=Utility::getValByName('company_favicon');
?>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir = "<?php echo e(env('SITE_RTL') == 'on'?'rtl':''); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A platform that relieves medical professionals from the pain of performing manual HR functions like rostering and managing timesheets, so they have more time and energy to practice medicine. ">
    <meta name="keywords" content="medtimes, medical rostering, hospital rostering, work schedules, medical timesheets, medtimes roster">
    <meta name="author" content="Medtimes"> 
    <!-- CSRF Token -->    
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">    
    <title><?php echo $__env->yieldContent('page-title'); ?> - <?php echo e((Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'Medtimes')); ?></title>        
    <link rel="icon" href="<?php echo e($logo.'/'.(isset($company_favicon) && !empty($company_favicon)?$company_favicon:'favicon.png')); ?>" type="image" sizes="16x16">        
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>    
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">       
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/@fortawesome/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/fullcalendar/dist/fullcalendar.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/site.css')); ?>" id="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/select2/dist/css/select2.min.css')); ?>">

    <?php if(env('SITE_RTL')=='on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap-rtl.css')); ?>">
    <?php endif; ?>

</head>
<body class="application application-offset sidenav-pinned ready">
<div id="app">
    <main class="py-4">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</div>
<!-- Scripts -->
<!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
<script src="<?php echo e(asset('assets/js/site.core.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/progressbar.js/dist/progressbar.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/apexcharts/dist/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/moment/min/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/fullcalendar/dist/fullcalendar.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/site.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
<!-- Demo JS - remove it when starting your project -->
<script src="<?php echo e(asset('assets/js/demo.js')); ?>"></script>

<script src="<?php echo e(asset('assets/libs/select2/dist/js/select2.min.js')); ?>"></script>
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

</body>
</html>
<?php /**PATH /home/jovickxe/medtimes.co/resources/views/layouts/auth.blade.php ENDPATH**/ ?>