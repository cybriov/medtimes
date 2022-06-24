@extends('layouts.main')
@section('page-title')
    {{ __('Language') }}
@endsection
@section('content')
    <!-- Page content -->
    <div class="page-content">
        <!-- Page title -->
        <div class="page-title">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                    <div class="d-inline-block">
                        <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white">{{ __('Language') }}</h5>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
                    <button type="button" class="btn btn-sm btn-white btn-icon-only rounded-circle" data-ajax-popup="true" data-title="{{__('Create New Language')}}"
                        data-url="{{ route('create.language') }}"><span class="btn-inner--icon"><i class="fas fa-plus"></i></span></button>

                    @if($currantLang != (env('DEFAULT_LANG') ?? 'en'))
                        <a href="#" class="btn btn-sm btn-danger btn-icon-only rounded-circle btn-sm" data-toggle="sweet-alert"
                        data-confirm="{{ __('Are You Sure?') }}|{{ __('This action can not be undone. Do you want to continue?') }}"
                        data-confirm-yes="document.getElementById('delete-lang-{{$currantLang}}').submit();">
                            <i class="fas fa-trash" data-toggle="tooltip" title="Delete"></i>
                        </a>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['lang.destroy', $currantLang],'id' => 'delete-lang-'.$currantLang]) !!}
                        {!! Form::close() !!}
                    @endif
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
                                        @foreach($languages as $lang)
                                            <li class="nav-item mb-3">
                                                <a href="{{route('manage.language',[$lang])}}" class="nav-link {{($currantLang == $lang) ? 'active' : ''}}">{{Str::upper($lang)}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 language-form-wrap">
                                <div class="tab-content">
                                    <div id="nav-pills-tabs-component" class="tab-pane tab-example-result fade show active" role="tabpanel" aria-labelledby="nav-pills-tabs-component-tab">
                                        <div class="nav-wrapper mb-4">
                                            <ul class="nav nav-pills nav-pills-lang nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                                <li class="nav-item mx-2">
                                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>{{ __('Labels') }}</a>
                                                </li>
                                                <li class="nav-item mx-2">
                                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>{{ __('Messages') }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade active show" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                                        <form method="post" action="{{route('store.language.data',[$currantLang])}}">
                                                            @csrf
                                                            <div class="row">
                                                                @foreach($arrLabel as $label => $value)
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label" for="example3cols1Input">{{$label}} </label>
                                                                            <input type="text" class="form-control" name="label[{{$label}}]" value="{{$value}}">
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                                <div class="col-lg-12 text-right">
                                                                    <button class="btn btn-primary" type="submit">{{ __('Save Changes')}}</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                                        <form method="post" action="{{route('store.language.data',[$currantLang])}}">
                                                            @csrf
                                                            <div class="row">
                                                                @foreach($arrMessage as $fileName => $fileValue)
                                                                    <div class="col-lg-12">
                                                                        <h3>{{ucfirst($fileName)}}</h3>
                                                                    </div>
                                                                    @foreach($fileValue as $label => $value)
                                                                        @if(is_array($value))
                                                                            @foreach($value as $label2 => $value2)
                                                                                @if(is_array($value2))
                                                                                    @foreach($value2 as $label3 => $value3)
                                                                                        @if(is_array($value3))
                                                                                            @foreach($value3 as $label4 => $value4)
                                                                                                @if(is_array($value4))
                                                                                                    @foreach($value4 as $label5 => $value5)
                                                                                                        <div class="col-md-6">
                                                                                                            <div class="form-group">
                                                                                                                <label>{{$fileName}}.{{$label}}.{{$label2}}.{{$label3}}.{{$label4}}.{{$label5}}</label>
                                                                                                                <input type="text" class="form-control" name="message[{{$fileName}}][{{$label}}][{{$label2}}][{{$label3}}][{{$label4}}][{{$label5}}]" value="{{$value5}}">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    @endforeach
                                                                                                @else
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="form-group">
                                                                                                            <label>{{$fileName}}.{{$label}}.{{$label2}}.{{$label3}}.{{$label4}}</label>
                                                                                                            <input type="text" class="form-control" name="message[{{$fileName}}][{{$label}}][{{$label2}}][{{$label3}}][{{$label4}}]" value="{{$value4}}">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                            @endforeach
                                                                                        @else
                                                                                            <div class="col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label>{{$fileName}}.{{$label}}.{{$label2}}.{{$label3}}</label>
                                                                                                    <input type="text" class="form-control" name="message[{{$fileName}}][{{$label}}][{{$label2}}][{{$label3}}]" value="{{$value3}}">
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif
                                                                                    @endforeach
                                                                                @else
                                                                                    <div class="col-lg-6">
                                                                                        <div class="form-group">
                                                                                            <label>{{$fileName}}.{{$label}}.{{$label2}}</label>
                                                                                            <input type="text" class="form-control" name="message[{{$fileName}}][{{$label}}][{{$label2}}]" value="{{$value2}}">
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach
                                                                        @else
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label>{{$fileName}}.{{$label}}</label>
                                                                                    <input type="text" class="form-control" name="message[{{$fileName}}][{{$label}}]" value="{{$value}}">
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                            </div>
                                                            <div class="col-lg-12 text-right">
                                                                <button class="btn btn-primary" type="submit">{{ __('Save Changes')}}</button>
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
@endsection
