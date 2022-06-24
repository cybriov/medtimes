<!DOCTYPE html>
    @php
        $logo=asset(Storage::url('uploads/logo/'));
        $company_favicon=Utility::getValByName('company_favicon');
        $company_logo = Utility::getValByName('company_logo');        
    @endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir = "{{env('SITE_RTL') == 'on'?'rtl':''}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="At Medtimes our aim is to relieve medical professionals from the burden of admin functions, so they spend more time being medical professionals in Sub Saharan Africa.">
    <meta name="author" content="Medtimes">    
    <title>@yield('page-title') - {{(Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'RotaGo')}}</title>    
    <!-- Favicon -->        
    <link rel="icon" href="{{$logo.'/'.(isset($company_favicon) && !empty($company_favicon)?$company_favicon:'favicon.png')}}" type="image" sizes="16x16">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="HTML, CSS, JavaScript">
 
    
    
    <link rel="stylesheet" href="{{ asset('assets/libs/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/fullcalendar/dist/fullcalendar.min.css')}}">    
    <link rel="stylesheet" href="{{ asset('assets/css/site.css')}}" id="stylesheet">    
    <link rel="stylesheet" href="{{ asset('assets/libs/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/libs/animate.css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/libs/range-date-picker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/libs/jqueryui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}">
    @if(Auth::user()->mode == 'light')
    <link rel="stylesheet" href="{{ asset('assets/css/site-light.css')}}">
    @endif        
    @if(Auth::user()->mode == 'light')
    <link rel="stylesheet" href="{{ asset('assets/css/site-light.css')}}">    
    @endif        

    @if(env('SITE_RTL')=='on')
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-rtl.css') }}">
    @endif
    
    @yield('availabilitylink')
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
                                        <img alt="{{ (!empty(Auth::user()->first_name)) ? Auth::user()->first_name.' !' : Auth::user()->company_name.' !'  }}"  src="{{ asset(Storage::url(Auth::user()->getUserInfo->DefaultProfilePic())) }}" class="avatar rounded-circle">
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-menu-arrow">
                                    <h6 class="dropdown-header px-0">{{ __('Hi , ') }} {{ (!empty(Auth::user()->first_name)) ? Auth::user()->first_name.' !' : Auth::user()->company_name.' !'  }}</h6>
                                    <a href="{{ url('profile/'.Crypt::encrypt(Auth::id()).'') }}" class="dropdown-item">
                                        <i class="fas fa-user"></i>
                                        <span>{{ __('My profile') }}</span>
                                    </a>

                                    @if(Auth::user()->acount_type == 1)
                                    <a href="{{ url('setting') }}" class="dropdown-item">
                                        <i class="fas fa-cog"></i>
                                        <span>{{ __('Settings') }}</span>
                                    </a>
                                    @endif
                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i>
                                        <span>{{ __('Logout') }}</span>
                                    </a>
                                    {!! Form::open(['method' => 'POST', 'route' => ['logout'],'id' => 'logout-form', 'style' => 'display: none;']) !!}
                                    {!! Form::close() !!}
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
                                    <a class="navbar-brand" href="{{ url('dashboard') }}">
                                        <img src="{{$logo.'/'.(isset($company_logo) && !empty($company_logo)?$company_logo:'logo.png')}}" class="navbar-brand-img custom-logo" alt="{{ __('Company Logo') }}">
                                    </a>
                                </div>
                            </li>
                            <li class="border-top opacity-2 my-2"></li>
                            
                            <!-- Dashboard  -->                            
                            <li class="nav-item"> <a class="nav-link pl-lg-0" href="{{ url('dashboard') }}"> {{ __('Dashboard') }} </a> </li>                            
                            @if(Auth::user()->type == 'super admin')
                            <li class="nav-item"> <a class="nav-link pl-lg-0" href="{{ url('user') }}"> {{ __('Users') }} </a> </li>                            
                            <li class="nav-item"> <a class="nav-link pl-lg-0" href="{{ url('plan') }}"> {{ __('Plans') }} </a> </li>                            
                            <li class="nav-item"> <a class="nav-link pl-lg-0" href="{{ url('coupon') }}"> {{ __('Coupons') }} </a> </li>                            
                            <li class="nav-item"> <a class="nav-link pl-lg-0" href="{{ url('order') }}"> {{ __('Orders') }} </a> </li>                            
                            <!--li class="nav-item">  <a class="nav-link pl-lg-0" href="{{ url('manage-language',Auth::user()->lang) }}"> {{ __('Languages') }} </a> </li-->
                            <li class="nav-item"> <a class="nav-link pl-lg-0" href="{{route('custom_landing_page.index')}}"> {{__('Landing page')}} </a> </li>
                            <li class="nav-item "> <a class="nav-link pl-lg-0" href="{{ url('setting') }}">{{ __('Settings') }}</a> </li>
                            @endif

                            @if(Auth::user()->type != 'super admin')
                                <!-- Rotas  -->
                                <li class="nav-item "> <a class="nav-link" href="{{ url('rosters') }}"> {{ __('Rotas') }} </a> </li>
                                @if(Auth::user()->acount_type == 1 || Auth::user()->getAddEmployeePermission() == 1)
                                <!-- Company  -->
                                <li class="nav-item dropdown dropdown-animate" data-toggle="hover">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ __('Company') }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-arrow p-lg-0">
                                        <div class="dropdown-menu-links rounded-bottom delimiter-top p-lg-4">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    @if(Auth::user()->acount_type == 1 || Auth::user()->getAddEmployeePermission() == 1)
                                                        <a href="{{ url('doctors') }}" class="dropdown-item">{{ __('Doctors') }}</a>
                                                    @endif
                                                    @if(Auth::user()->acount_type == 1)
                                                        <a href="{{ url('teams') }}" class="dropdown-item">{{ __('Locations') }}</a>
                                                    @endif
                                                    @if(Auth::user()->acount_type == 1 || Auth::user()->getAddRolePermission() == 1)
                                                        <a href="{{ url('roles') }}" class="dropdown-item">{{ __('Roles') }}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endif
                                <!-- Leave  -->
                                <li class="nav-item "> <a class="nav-link" href="{{ url('leave') }}"> {{ __('Leave') }} </a> </li>
                                <!-- Availability  -->
                                @if(Auth::user()->getViewAvailabilities() == 1)
                                <!--li class="nav-item "> <a class="nav-link" href="{{ url('availabilities') }}"> {{ __('Availability') }} </a> </li-->
                                @endif
                                @if(Auth::user()->acount_type == 1 || Auth::user()->getviewRepotsPermission() == 1)
                                <!-- Reports  -->
                                <li class="nav-item "> <a class="nav-link" href="{{ url('reports') }}"> {{ __('Reports') }} </a> </li>
                                @endif                                
                                @if(Auth::user()->type == 'company')
                                <!-- Settings  -->
                                <li class="nav-item "> <a class="nav-link" href="{{ url('setting') }}"> {{ __('Settings') }} </a> </li>
                                @endif                                
                                @if(Auth::user()->type == 'super admin' || Auth::user()->type == 'company')
                                <!-- Plan  -->
                                <!--li class="nav-item "> <a class="nav-link" href="{{ url('plan') }}"> {{ __('Plan') }} </a> </li-->
                                @endif
                                @if(Auth::user()->type == 'company')
                                <!--li class="nav-item "> <a class="nav-link" href="{{ url('chats') }}"> {{ __('Chat') }} </a> </li-->
                                @endif
                                
                            @endif
                        </ul><!-- Right menu -->
                        <ul class="navbar-nav ml-lg-auto align-items-center d-none d-lg-flex"></ul>
                            <li class="nav-item dropdown dropdown-animate">
                                <a class="nav-link pr-lg-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                                    
                                    <div class="media media-pill align-items-center">
                                        @php
                                            $users=\Auth::user();
                                            $profile=asset(Storage::url('upload/profile/'));
                                        @endphp                                            
                                        <span class="avatar rounded-circle">
                                            <img alt="User Image"  src="{{ asset(Storage::url(Auth::user()->getUserInfo->DefaultProfilePic())) }}" width="30px" class="avatar rounded-circle">                                            
                                        </span>                                        
                                        <div class="ml-2 d-none d-lg-block {{env('SITE_RTL') == 'on'? 'ml-0 mr-2':''}}">
                                            <span class="mb-0 text-sm  font-weight-bold text-white">{{ (!empty(Auth::user()->first_name)) ? Auth::user()->first_name: Auth::user()->company_name  }}</span>
                                        </div>
                                    </div>                                    
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-menu-arrow">
                                    <h6 class="dropdown-header px-0">{{ __('Hi , ') }} {{ (!empty(Auth::user()->first_name)) ? Auth::user()->first_name.' !' : Auth::user()->company_name.' !'  }}</h6>
                                    <a href="{{ url('profile/'.Crypt::encrypt(Auth::id()).'') }}" class="dropdown-item">
                                        <i class="fas fa-user"></i>
                                        <span>{{ __('My profile') }}</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i>
                                        <span>{{ __('Logout') }}</span>
                                    </a>
                                    {!! Form::open(['method' => 'POST', 'route' => ['logout'],'id' => 'logout-form', 'style' => 'display: none;']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


            @yield('content')

            @yield('header-content')
        </div>
    </div>

    <!-- Footer -->
    
        <div class="container">
            <div class="col-12">
                
                @php
                    $users=\Auth::user();
                    $currantLang = $users->currentLanguage();
                    $languages=\App\Utility::languages();
                    $footer_text=isset(\App\Utility::settings()['footer_text']) ? \App\Utility::settings()['footer_text'] : '';
                @endphp
                
                <div class="footer pt-5 pb-4 footer-light" id="footer-main">
                    <div class="row text-center text-sm-left align-items-sm-center">
                        <div class="col-sm-6">
                            <p class="text-sm mb-0">{{ $footer_text }}</p>
                        </div>
                        <div class="col-sm-6 mb-md-0">
                            <ul class="nav justify-content-center justify-content-md-end">
                                <li class="nav-item dropdown border-right">
                                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="h6 text-sm mb-0"><i class="fas fa-globe-asia"></i>  {{Str::upper($currantLang)}}</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                        @foreach($languages as $language)
                                            <a href="{{route('change.language',$language)}}" class="dropdown-item @if($language == $currantLang) active-language @endif">
                                                <span> {{Str::upper($language)}}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                </li>
                              
                                <!--li class="nav-item">
                                    <a class="nav-link" href="{{ route('change.mode') }}">{{(Auth::user()->mode == 'light') ? __('Dark Mode') : __('Light Mode')}}</a>
                                </li-->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{!empty(Utility::getSuperAdminValByName('footer_value_1'))?Utility::getSuperAdminValByName('footer_value_1'):Utility::getValByName('footer_value_1')}}">{{!empty(Utility::getSuperAdminValByName('footer_link_1'))?Utility::getSuperAdminValByName('footer_link_1'):Utility::getValByName('footer_link_1')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{!empty(Utility::getSuperAdminValByName('footer_value_2'))?Utility::getSuperAdminValByName('footer_value_2'):Utility::getValByName('footer_value_2')}}">{{!empty(Utility::getSuperAdminValByName('footer_link_2'))?Utility::getSuperAdminValByName('footer_link_2'):Utility::getValByName('footer_link_2')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{!empty(Utility::getSuperAdminValByName('footer_value_3'))?Utility::getSuperAdminValByName('footer_value_3'):Utility::getValByName('footer_value_3')}}">{{!empty(Utility::getSuperAdminValByName('footer_link_3'))?Utility::getSuperAdminValByName('footer_link_3'):Utility::getValByName('footer_link_3')}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </div>        
    

    @yield('model')
    <div id="commonModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><span class="model_form_title">{{ __('') }}</span></h5>
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
    <script src="{{ asset('assets/js/site.core.js')}}"></script>
    <!-- Page JS -->
    <script src="{{ asset('assets/libs/progressbar.js/dist/progressbar.min.js')}}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
    <script src="{{ asset('assets/libs/moment/min/moment.min.js')}}"></script>
    <script src="{{ asset('assets/libs/fullcalendar/dist/fullcalendar.min.js')}}"></script>    
    <script src="{{ asset('assets/js/site.js')}}"></script>
    <!-- Demo JS - remove it when starting your project -->
    <script src="{{ asset('assets/js/demo.js')}}"></script>

    <script src="{{ asset('assets/libs/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
    <script src="{{ asset('assets/libs/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{ asset('assets/libs/range-date-picker/daterangepicker.js')}}"></script>
    <script src="{{ asset('assets/libs/jqueryui/jquery-ui.min.js')}}"></script>        
    <script src="{{ asset('js/jquery.form.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js')}}"></script>
    @yield('availabilityscriptlink')
    @stack('pagescript')

    @if (\Session::has('success'))
        <script>
            show_toastr('{{__('Success')}}', '{!! session('success') !!}', 'success');
        </script>
        {{ Session::forget('success') }}
    @endif

    @if (Session::has('error'))
        <script>
            show_toastr('{{__('Error')}}', '{!! session('error') !!}', 'error');
        </script>
        {{ Session::forget('error') }}
    @endif

    @if (\Session::has('successs'))
        <script>
            show_toastr('{{__('Success')}}', '{!! session('successs') !!}', 'success');
        </script>
        {{ Session::forget('successs') }}
    @endif

    @if (Session::has('errors'))
        <script>
            show_toastr('{{__('Error')}}', '{!! session('errors') !!}', 'error');
        </script>
        {{ Session::forget('errors') }}
    @endif

</body>
</html>
