@extends('layouts.main')
@section('page-title')
    {{ __('Rotas') }}
@endsection
@section('content')
    <!-- Page content -->
    <div class="page-content" id="page-content">
        <!-- Page title -->
        <div class="page-title">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-8">
                    <div class="row">
                        @if(!empty($location_option))
                            <div class="col-sm-6 col-md-3 mb-1">
                                {!! Form::select('loaction_id',$location_option , $first_location, ['class'=> 'form-control js-single-select rotas_location_change']) !!}
                            </div>
                        @endif
                        
                        @if( !empty($role_option) && Auth::user()->type == 'company' )
                            <div class="col-sm-6 col-md-3 mb-1">
                                {!! Form::select('role_id',$role_option , null, ['class'=> 'form-control js-single-select rotas_role_change']) !!}
                            </div>
                        @else
                            <input type="hidden" class="rotas_role_change" value="0">
                        @endif
                        <div class="col-sm-12 col-md-auto my-auto">
                            <div class="d-inline-block text-white">
                                <i class="fa fa-caret-left weak-prev-left weak-prev weak_go"></i>
                                &nbsp;<span class="weak_go_html weak_go_html">{{ $week_date[0].' - '.$week_date[6] }}</span>&nbsp;
                                <i class="fa fa-caret-right weak-prev-left weak-left weak_go"></i>
                                <input type="hidden" data-start="{{ $week_date['week_start'] }}" data-end="{{ $week_date['week_end'] }}"  class="week_last_daye">
                                <input type="hidden" value="0" data-created-by="{{ $created_by }}" class="week_add_sub">
                                <input type="hidden" value="{{ Auth::user()->mode }}" class="mode">
                            </div>
                        </div>
                    </div>
                </div>  
                
                @if(Auth::user()->type == 'company')
                <div class="col-md-4 d-flex align-items-center justify-content-between justify-content-md-end">
                    <div class="rotas_filter_main_div">                        
                        <div class="d-inline-block">
                            <div class="dropdown btn btn-sm btn-md btn-white btn-icon-only rounded-circle ml-1 publish_shifs" data-toggle="dropdown" title="{{ __('Publish Rotas') }}">
                                <a href="#" class="text-dark" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-check" ></i>                                
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menulist-scroll">
                                    <a href="#" class="dropdown-item" id="publish_week">                                        
                                        {{ __(' Publish Week ') }}
                                    </a>
                                    <a href="#" class="dropdown-item hide_rss" id="un_publish_week">                                        
                                        {{ __(' Un-publish Week ') }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="d-inline-block">
                            <div class="dropdown btn btn-sm btn-md btn-white btn-icon-only rounded-circle ml-1 rotas_filter" data-toggle="dropdown" onclick="alert('{{ __('Drag and drop shift to other location') }}')" title="{{ __('Copy Shift') }}">
                                <a href="#" class="text-dark" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-copy" ></i>                                
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menulist-scroll d-none ">
                                    <a href="#" class="dropdown-item hide_rss" onclick="alert('{{ __('Drag and drop shift to other location') }}')" id="copy_shift">{{ __(' Copy Shift ') }}</a>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="add_remove_employee p-0 border-0 d-none"  data-size="lg" data-ajax-popup="true" data-title="{{__('Add/Remove Employee')}}"
                        data-url="{{route('rotas.add_remove_employee_popup',['loaction'=>$first_location, 'create_by'=>$created_by])}}"><span class="btn-inner--icon"><i class="fas fa-plus"></i></span></button>

                        <div class="d-inline-block">
                            <div class="dropdown btn btn-sm btn-md btn-white btn-icon-only rounded-circle ml-1 rotas_filter" data-toggle="dropdown" title="{{ __('Additional Settings') }}">
                                <a href="#" class="text-dark" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-filter"></i>                                
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menulist-scroll">                                    
                                    <a href="#" class="dropdown-item {{ ($day_off == 'hide') ? 'hide_rss' : '' }}" id="hidedayoff">
                                        <span class="span_hide" style="{{ ($day_off == 'show') ? 'display: none;' : '' }}">{{ __('Show') }}</span>
                                        <span class="span_show" style="{{ ($day_off == 'hide') ? 'display: none;' : '' }}">{{ __('Hide') }}</span>
                                        {{ __(' Day Off') }}
                                    </a>
                                    <a href="#" class="dropdown-item {{ ($leave_display == 'hide') ? 'hide_rss' : '' }}" id="hideleave">
                                        <span class="span_hide" style="{{ ($leave_display == 'show') ? 'display: none;' : '' }}">{{ __  ('Show') }}</span>
                                        <span class="span_show" style="{{ ($leave_display == 'hide') ? 'display: none;' : '' }}">{{ __('Hide') }}</span>
                                        {{ __(' Leave') }}
                                    </a>
                                    <a href="#" class="dropdown-item {{ ($availability_display == 'hide') ? 'hide_rss' : '' }}" id="hideavailability">
                                        <span class="span_hide" style="{{ ($availability_display == 'show') ? 'display: none;' : '' }}">{{ __('Show') }}</span>
                                        <span class="span_show" style="{{ ($availability_display == 'hide') ? 'display: none;' : '' }}">{{ __('Hide') }}</span>
                                        {{ __(' Availability') }}
                                    </a>
                                    <a href="#" class="dropdown-item" id="clear_week"> {{ __('Clear Week') }} </a>
                                    <a href="#" class="dropdown-item hide_rss" id="add_remove_dayeoff">                                        
                                        {{ __(' Add / Remove Day Off') }}
                                    </a>
                                    <a href="#" class="dropdown-item hide_rss" id="add_remove_employee">
                                        {{ __(' Add / Remove Employee') }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="d-inline-block">                            
                            <a href="#" class="btn btn-sm btn-md btn-white btn-icon-only rounded-circle ml-1" id='send_email_rotas' title="{{ __('Send rotas via email') }}">
                                <i class="fas fa-paper-plane"></i>
                            </a>                                
                        </div>
                        
                        <div class="d-inline-block">                            
                            <a href="#" class="print_rotas_cls"  title="{{ __('Print rotas') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Print rotas')}}"
                                data-url="{{route('rotas.print_rotas_popup',['loaction'=>$first_location, 'create_by'=>$created_by])}}"></a>                        
                            <a href="#" class="btn btn-sm btn-md btn-white btn-icon-only rounded-circle ml-1"  title="{{ __('Print rotas') }}" 
                                id="print_rotas" data-urls="{{route('rotas.print_rotas_popup')}}" >
                                <i class="fas fa-print"></i>
                            </a>
                        </div>
                        <div class="d-inline-block">
                            <a href="#" data-url2="{{route('rotas.share_popup')}}"
                                class="btn btn-sm btn-md btn-white btn-icon-only rounded-circle ml-1 share_rotas_cls"  title="{{ __('Share roster') }}" data-size="lg" data-ajax-popup="false" data-title="{{__('Share rotas')}}">
                                <i class="fas fa-share-alt"></i>
                            </a>
                        </div>

                    </div>


                    <div class="rotas_filter_main_div_responce">
                        <div class="add_remove_dayeoff"  style="display: none;">
                            <span>{{ __('Click a day to set employees day off') }}</span> &nbsp;
                            <button type="button" class="btn btn-xs btn-white btn-icon-only dayoff_close" data-toggel="tooltip" title="{{ __('Back to Rota Builder') }}"><span class="btn-inner--icon"><i class="fas fa-times"></i></span></button>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        
        <!-- Listing -->
        <div class="mt-4">
            <div class="card">
                <div class="card-wrapper rotas-timesheet overflow-auto" id="rotas-timesheet">
                    <table class="table work_sheet_table1">
                        <thead>
                        <tr class="text-center work_sheet_table" >
                            <th></th>
                            <th><span>{{ date('D', strtotime($week_date[0])) }}</span><br><span>{{ $week_date[0] }}</span></th>
                            <th><span>{{ date('D', strtotime($week_date[1])) }}</span><br><span>{{ $week_date[1] }}</span></th>
                            <th><span>{{ date('D', strtotime($week_date[2])) }}</span><br><span>{{ $week_date[2] }}</span></th>
                            <th><span>{{ date('D', strtotime($week_date[3])) }}</span><br><span>{{ $week_date[3] }}</span></th>
                            <th><span>{{ date('D', strtotime($week_date[4])) }}</span><br><span>{{ $week_date[4] }}</span></th>
                            <th><span>{{ date('D', strtotime($week_date[5])) }}</span><br><span>{{ $week_date[5] }}</span></th>
                            <th><span>{{ date('D', strtotime($week_date[6])) }}</span><br><span>{{ $week_date[6] }}</span></th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(!empty($location_option))
                                @if(!empty($employees))
                                    @foreach ($employees as $employee)
                                        {!! $employee->getWorkSchedule($employee['id'],0,$first_location) !!}
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8">
                                            <div class="text-center">
                                                <i class="fas fa-map-marker-alt text-primary fs-40"></i>
                                                <h2>{{ __('Opps...') }}</h2>
                                                <h6> {!! __('Please assign a doctor to this team.') !!} </h6>
                                            </div>
                                        </td>
                                    </tr>

                                @endif
                            @else
                                <tr>
                                    <td colspan="8">
                                        <div class="text-center">
                                            <i class="fas fa-map-marker-alt text-primary fs-40"></i>
                                            <h2>{{ __('Opps...') }}</h2>
                                            <h6> {!! __('You must add a team to your account and assign doctors <br> before you can start building rosters.') !!} </h6>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        </tbody>

                        @if(Auth::user()->acount_type == 1 && !empty($location_option) && !empty($employee))
                        <tfoot class="bt2">
                            {!! $employee->getCompanyWeeklyUserSalary(0, $created_by, $first_location, 0) !!}
                        </tfoot>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('pagescript')
<script type="text/javascript" src="{{ asset('assets/js/html2pdf.bundle.min.js') }}"></script>

<script>

    $(document).ready(function() {

        dragdrop();       
        seturl();

        $(document).on('click','#click_to_copy',function() {
            /* Get the text field */
            var copyText = document.getElementById("click_link");

            $('#click_link').addClass('clickanimation');

            setTimeout(function(){
                $('#click_link').removeClass('clickanimation');
            }, 1000);

            copyText.select();
            copyText.setSelectionRange(0, 99999); 

            document.execCommand("copy");

            var msg = '{{ __("Link copied successfully.") }}';
            var msg123 = '{{ __("Copied the text: ") }}' + copyText.value;

            show_toastr('Success', msg, 'success');
        });

        $(document).on('click','.create_link',function() {            
            var location        = $('input[name="loaction_id"]').val();
            var role_id         = $('input[name="role_id"]').val();
            var create_by       = $('input[name="create_by"]').val();
            var week            = $('input[name="week"]').val();
            var user_array      = $('input[name="user_array"]').val();
            var share_password  = $('input[name="share_password"]').val();
            var expiry_date     = $('input[name="expiry_date"]').val();

            var data = {
                location        : location,
                week            : week,
                role_id         : role_id,
                create_by       : create_by,
                share_password  : share_password,
                expiry_date     : expiry_date,
                user_array      : user_array,
            }

            $.ajax({
                url: '{{ route('rotas.share_rotas_link') }}',
                method: 'post',
                data: data,
                success: function (data)
                {
                    if(data.status == 'success')
                    {
                        $("#click_link").attr('value', data.message);
                        show_toastr('Success', "{{ __('Link created successfully.') }}", 'success');
                    }
                    else
                    {
                        show_toastr('Error', '{{ __("Something went wrong.") }}', 'error');
                    }

                    $('#copy_box').show();
                }
            });

        });

        $(document).on('click','.weak_go', function () {
            var start_date = $('.week_last_daye').attr('data-start');
            var end_date = $('.week_last_daye').attr('data-end');
            var week = $('.week_add_sub').val();
            var location_id = $('.rotas_location_change').val();
            var role_id = $('.rotas_role_change').val();
            var created_by = $('.week_add_sub').attr('data-created-by');
            var data = {
                start_date: start_date,
                end_date: end_date,
                week: week,
                location_id: location_id,
                role_id: role_id,
                created_by: created_by
            }

            $.ajax({
                url: '{{ route('rotas.week_sheet') }}',
                method: 'post',
                data: data,
                success: function (data)
                {
                    if(data.status == 'error')
                    {
                        show_toastr('Error', data.msg, 'error');
                    }
                    else
                    {
                        $('.work_sheet_table1').html(data.table);
                        $('.work_sheet_table1 tfoot').html(data.week_exp);
                        $('.weak_go_html').html(data.title);
                        $('.work_sheet_table_last thead tr').html(data.thead);
                        $('.work_sheet_table_last tbody').html(data.week_exp);
                        $('[data-toggle="tooltip"]').tooltip();
                    }
                    loadConfirm();     
                    dragdrop();
                    leave_show();
                    seturl();
                }
            });
        });

        $(document).on('click','#print_rotas', function () {
            var week = $('.week_add_sub').val();
            var location_id = $('.rotas_location_change').val();
            var role_id = $('.rotas_role_change').val();
            var created_by = $('.week_add_sub').attr('data-created-by');
            var user_array = [];
            $( ".work_sheet_table1 tbody tr" ).each(function(propName, index ) {
                var user_id = $( this ).attr('data-user-id');
                user_array[propName] = user_id;
            });

            if($( ".work_sheet_table1 tbody tr" ).attr('data-user-id') == undefined)
            {
                show_toastr('Error', '{{__("User not found.")}}', 'error');
                return;                
            }

            var url = $(this).attr('data-urls');
            $(this).parent().find('.print_rotas_cls').attr('data-url', url+'?loaction='+location_id+'&create_by='+created_by+'&role_id='+role_id+'&week='+week+'')
            $('.print_rotas_cls').trigger('click');            
        });
        
        $(document).on('change','.rotas_location_change', function () {
            var start_date = $('.week_last_daye').attr('data-start');
            var end_date = $('.week_last_daye').attr('data-end');
            var week = $('.week_add_sub').val();
            var location_id = $(this).val();
            var role_id = $('.rotas_role_change').val();
            var created_by = $('.week_add_sub').attr('data-created-by');
            var data = {
                start_date: start_date,
                end_date: end_date,
                week: week,
                created_by: created_by,
                location_id: location_id,
                role_id: role_id
            }

            $.ajax({
                url: '{{ route('rotas.week_sheet') }}',
                method: 'post',
                data: data,
                success: function (data)
                {
                    $('.work_sheet_table1').html(data.table);
                    $('.work_sheet_table1 tfoot').html(data.week_exp);
                    $('.weak_go_html').html(data.title);
                    $('.work_sheet_table_last thead tr').html(data.thead);
                    $('.work_sheet_table_last tbody').html(data.week_exp);
                    loadConfirm();     
                    dragdrop();                    
                    seturl();
                }
            });
        });
        
        $(document).on('change','.rotas_role_change', function () {
            var start_date = $('.week_last_daye').attr('data-start');
            var end_date = $('.week_last_daye').attr('data-end');
            var week = $('.week_add_sub').val();
            var role_id = $(this).val();
            var created_by = $('.week_add_sub').attr('data-created-by');
            var location_id = $('.rotas_location_change').val();

            var data = {
                start_date: start_date,
                end_date: end_date,
                week: week,
                created_by: created_by,
                location_id: location_id,
                role_id: role_id
            }

            $.ajax({
                url: '{{ route('rotas.week_sheet') }}',
                method: 'post',
                data: data,
                success: function (data)
                {
                    $('.work_sheet_table1').html(data.table);
                    $('.work_sheet_table1 tfoot').html(data.week_exp);
                    $('.weak_go_html').html(data.title);
                    $('.work_sheet_table_last thead tr').html(data.thead);
                    $('.work_sheet_table_last tbody').html(data.week_exp);                    
                    $('[data-toggle="tooltip"]').tooltip();
                    loadConfirm();     
                    dragdrop()          
                    seturl();
                }
            });
        });

        $(document).on('change','.rotas_time', function () {
            var start_time = $('.start_time').val();
            var end_time = $('.end_time').val();
            if(start_time != '' && end_time == '') {
                $('.end_time').attr('value',start_time);
            }
            if(end_time != '' && start_time == '') {
                $('.start_time').attr('value',end_time);
            }
            return;
        });

        $('.rotas_filter_main_div_responce').on('click','.rotas_raeponce_btn_filter', function (e) {
            $('.add_remove_dayeoff').toggle();
            $('.rotas_filter_main_div').toggle();
        });

        $('.rotas_filter').on('click','.dropdown-item', function (e) {            
            var val = $(this).attr('id');            
            var start_date = $('.week_last_daye').attr('data-start');    
            var end_date = $('.week_last_daye').attr('data-end');
            var week = $('.week_add_sub').val();
            var created_by = $('.week_add_sub').attr('data-created-by');
            var location_id = $('.rotas_location_change').val();

            var data = {
                start_date: start_date,
                end_date: end_date,
                week: week,
                created_by: created_by,
                location_id: location_id
            }
            $(this).find('.span_hide').toggle();
            $(this).find('.span_show').toggle();
            
            if(val == 'hideavailability') {
                $('.availability_table_box').toggle();
                $('#hideavailability').toggleClass('hide_rss');

                var availability_display = 'show';                
                if($('#hideavailability').hasClass('hide_rss'))
                {
                    var availability_display = 'hide';
                }
                var data = {
                    availability_display: availability_display,
                }
                
                $.ajax({ 
                    url: '{{ route('hideavailability') }}',
                    method: 'POST',
                    data: data,
                    success: function (data)
                    {
                        
                    }
                });
            }
            if(val == 'hidedayoff') {
                $('.ws_day_off_leave').toggle();
                $('.cus_day_off_leave').toggle();                
                $('.day_off_leave123').toggleClass('badge-secondary');
                $('#hidedayoff').toggleClass('hide_rss');

                var hide_day_off = 'show';                
                if($('#hidedayoff').hasClass('hide_rss'))
                {
                    var hide_day_off = 'hide';
                }
                var data = {
                    hide_day_off: hide_day_off,
                }
                
                $.ajax({ 
                    url: '{{ route('hidedayoff') }}',
                    method: 'POST',
                    data: data,
                    success: function (data)
                    {
                        
                    }
                });

            }
            if(val == 'hideleave') {
                $('#hideleave').toggleClass('hide_rss');
                $('.other_leave123').toggleClass('badge-soft-success');                
                $('.holiday_leave123').toggleClass('badge-soft-info');

                var leave_display = 'show';                
                if($('#hideleave').hasClass('hide_rss'))
                {
                    var leave_display = 'hide';
                }
                var data = {
                    leave_display: leave_display,
                }
                
                $.ajax({ 
                    url: '{{ route('hideleave') }}',
                    method: 'POST',
                    data: data,
                    success: function (data)
                    {
                        
                    }
                });
            }
            if(val == 'clear_week') {                
                $.ajax({ 
                    url: '{{ route('rotas.clear_week') }}',
                    method: 'POST',
                    data: data,
                    success: function (data)
                    {
                        
                        if(data["status"] == "success")
                        {
                            show_toastr('Success', data["msg"], 'success');
                        }
                        else
                        {
                            show_toastr('Error', data["msg"], 'error');
                        }

                        if(data['status'] != 'error')
                        {
                            $('.rotas_time1').remove();
                        }
                        loadConfirm();
                    }
                });
            }
            if(val == 'add_remove_dayeoff')
            {                
                $('.rotas_filter_main_div').toggle();
                $('.add_remove_dayeoff').toggle();
            } 
            if(val == 'add_remove_employee')
            {
                $('.add_remove_employee').trigger('click');
            }
            leave_show();
        });

        $('.rotas_filter_main_div_responce').on('click','.add_remove_dayeoff .dayoff_close', function () {
            $(this).parent().hide();
            $('.rotas_filter_main_div').show();
            location.reload();
        });

        $(document).on('click','.work_sheet_table1>tbody>tr>td.droppable-class', function () {   
            var date = $(this).attr('data-date');
            var user_id = $(this).attr('data-id');            
            var data = {
                date : date,
                user_id : user_id,
            }
            var has_dayoff = $(this).find('.ws_day_off_leave').hasClass('day_off_leave');
            var has_dayoff_hide = $("#hidedayoff").hasClass('hide_rss');                        

            if ( $('.add_remove_dayeoff').css('display') != 'none' && $('.add_remove_dayeoff').length > 0)
            {
                if(has_dayoff != true)
                {
                    $.ajax({ 
                    url: '{{ route('rotas.add_dayoff') }}',
                    method: 'POST',
                    data: data,
                    context: this,
                    success: function (data)
                    {
                        if(data.status == 'success')
                        {                    
                            if(data.date_status != '') {                                   
                                $(this).prepend(data.date_status);                             
                            } else {
                                $('.work_sheet_table1 tbody td.droppable-class').children('.cus_day_off_leave').remove();
                            }                            

                            if(has_dayoff_hide) {                            
                                $('.work_sheet_table1 tbody td.droppable-class').children('.day_off_leave').hide();
                            } else {
                                $('.work_sheet_table1 tbody td.droppable-class').children('.day_off_leave').show();
                            }
                            $('.rotas_location_change').trigger('change');
                            show_toastr('Success',data["msg"] , 'success');
                        }
                        else
                        {
                            show_toastr('Error',data["msg"] , 'error');
                        }
                        
                        loadConfirm();
                    }
                    });

                } else {
                    show_toastr('{{ __("This day already day off") }}', '{!! session('error') !!}', 'error');
                }       
            }     
        });

        $('.publish_shifs').on('click','#un_publish_week', function () {
            var week = $('.week_add_sub').val();
            var created_by = $('.week_add_sub').attr('data-created-by');
            var location_id = $('.rotas_location_change').val();            
            var data = {
                week: week,
                created_by: created_by,
                location_id: location_id
            }

            $.ajax({
                url: '{{ route('rotas.un_publish_week') }}',
                method: 'POST',
                data: data,
                success: function (data)
                {
                    if(data["status"]  ==  'success')
                    {
                        show_toastr('Success', data["msg"], 'success');
                    }
                    else
                    {
                        show_toastr('Error', data["msg"], 'error');
                    }
                    $('.work_sheet_table1 tbody .rotas_time1').addClass('opacity-50');
                    $('[data-toggle="tooltip"]').tooltip();
                    setTimeout(function(){
                        location.reload(); 
                    }, 1000);
                }
            });
        });

        $('.publish_shifs').on('click','#publish_week', function () {
            var week = $('.week_add_sub').val();
            var created_by = $('.week_add_sub').attr('data-created-by');
            var location_id = $('.rotas_location_change').val();            
            var data = {
                week: week,
                created_by: created_by,
                location_id: location_id
            }

            $.ajax({
                url: '{{ route('rotas.publish_week') }}',
                method: 'POST',
                data: data,
                success: function (data)
                {
                    if(data["status"]  ==  'success')
                    {
                        show_toastr('Success', data["msg"], 'success');
                    }
                    else
                    {
                        show_toastr('Error', data["msg"], 'error');
                    }
                    $('.work_sheet_table1 tbody .rotas_time1').removeClass('opacity-50');
                    $('[data-toggle="tooltip"]').tooltip();
                    setTimeout(function(){
                        location.reload(); 
                    }, 1000);                    
                }
            });
        });

        $(document).on('click','#send_email_rotas', function () {            
            var week = $('.week_add_sub').val();            
            var location_id = $('.rotas_location_change').val();

            var data = {
                week: week,                
                location_id: location_id
            }

            $.ajax({
                url: '{{ route('rotas.send_email_rotas') }}',
                method: 'POST',
                data: data,
                success: function (data)
                {
                    if(data.status  ==  'success')
                    {
                        show_toastr('Success', data.message, 'success');
                    }
                    else
                    {
                        show_toastr('Error', data.message, 'error');
                    }

                    // show_toastr(data.status, data.message, data.status);
                },
                error: function (data)
                {
                    data = data.responseJSON;
                    show_toastr('Error', data.message, 'error');
                 },
            });
        });

        $(document).on('click','.rotas_cteate', function () {
            var form = $(this).parents('.rotas_cteate_frm');
            var user_id = form.find('input[name="user_id"]').val();
            var rotas_date = form.find('input[name="rotas_date"]').val();
            var location_id = form.find('input[name="location_id"]').val();
            var start_time = form.find('input[name="start_time"]').val();
            var end_time = form.find('input[name="end_time"]').val();
            var break_time = form.find('input[name="break_time"]').val();
            var role_id = form.find('select[name="role_id"]').val();
            var is_call = form.find('select[name="is_call"]').val();
            var note = form.find('textarea[name="note"]').val();            
            var token = $('meta[name="csrf-token"]').attr('content');

            var data = {
                "_token" : token,
                "user_id" : user_id,
                "rotas_date" : rotas_date,
                "location_id" : location_id,
                "start_time" : start_time,
                "end_time" : end_time,
                "break_time" : break_time,
                "role_id" : role_id,
                "is_call" : is_call,
                "note" : note,                
            }

            $.ajax({
                url: '{{ route('rotas.store') }}',
                method: 'POST',
                data: data,
                success: function (data)
                {
                    if(data["status"]  ==  'success')
                    {
                        show_toastr('Success', data["msg"], 'success');
                    }
                    else
                    {
                        show_toastr('Error', data["msg"], 'error');
                    }                    
                    $('.rotas_location_change').trigger('change');
                }
            });
            $('#commonModal').modal('toggle');
            return;
        });
        
        $(document).on('click','.rotas_edit_btn', function () {
            var form = $(this).parents('.rotas_edit_frm');
            var user_id = form.find('input[name="user_id"]').val();
            var rotas_date = form.find('input[name="rotas_date"]').val();
            var location_id = form.find('input[name="location_id"]').val();
            var start_time = form.find('input[name="start_time"]').val();
            var end_time = form.find('input[name="end_time"]').val();
            var break_time = form.find('input[name="break_time"]').val();
            var role_id = form.find('select[name="role_id"]').val();
            var is_call = form.find('select[name="is_call"]').val();
            var note = form.find('textarea[name="note"]').val();            
            var rotas_id = form.find('input[name="rotas_id"]').val();
            var u_url = form.find('input[name="u_url"]').val();            
            var token = $('input[name="_token"]').val();

            var data = {
                "_token" : token,
                "rotas_id" : rotas_id,
                "user_id" : user_id,
                "rotas_date" : rotas_date,
                "location_id" : location_id,
                "start_time" : start_time,
                "end_time" : end_time,
                "break_time" : break_time,
                "role_id" : role_id,
                "is_call" : is_call,
                "note" : note,                
            }

            $.ajax({
                url: u_url,
                method: 'PUT',
                data: data,
                success: function (data)
                {
                    if(data["status"]  ==  'success')
                    {
                        show_toastr('Success', data["msg"], 'success');
                    }
                    else
                    {
                        show_toastr('Error', data["msg"], 'error');
                    }  
                    $('#commonModal').modal('toggle');
                    $('.rotas_location_change').trigger('change');
                }
            });
            return;            
        });
        
        $(document).on('click','.delete_rotas_action', function () {            
            var id = $(this).attr('data-id');       
            var token = $('meta[name="csrf-token"]').attr('content');
            var url = $(this).attr('action_url');
            var data = {                
                "id" : id,
                "token" : token,
            }

            $.ajax({
                url: url,
                method: 'DELETE',
                data: data,
                success: function (data)
                {
                    if(data["status"]  ==  'success')
                    {
                        show_toastr('Success', data["msg"], 'success');
                    }
                    else
                    {
                        show_toastr('Error', data["msg"], 'error');
                    }
                    $('.rotas_location_change').trigger('change');
                }
            });
            return;
        });

    });

        function dragdrop(){
            $( ".droppable-class" ).sortable({
                revert: true
            });
            
            $( ".draggable-class" ).draggable({
                tolerance: "pointer",
                connectToSortable: ".droppable-class",
                helper: "clone",
                start: function( event, ui ) {
                    $('.work_sheet_table1 tbody tr td.droppable-class').addClass('tr-drop-zone');
                    $('.work_sheet_table1 tbody tr td .draggable-class').addClass('tr-drag-item-zindex');
                },
                drag: function( event, ui ) {
                },
                stop: function( event, ui ) {               
                    $('.work_sheet_table1 tbody tr td.droppable-class').removeClass('tr-drop-zone');
                    $('.work_sheet_table1 tbody tr td .draggable-class').removeClass('tr-drag-item-zindex');

                    var location_id = $('.rotas_location_change').val();
                    var created_by = $('.week_add_sub').attr('data-created-by');
                    var rotas_id = $(this).attr('data-rotas-id');
                    
                    setTimeout(function() {                    
                        var drop_user_id = ui.helper.parents('.droppable-class').attr('data-id');
                        var drop_date = ui.helper.parents('.droppable-class').attr('data-date');
                        var data = {
                            drop_date: drop_date,
                            drop_user_id: drop_user_id,
                            rotas_id: rotas_id,
                            location_id: location_id,
                            created_by: created_by
                        }
                        
                        if(drop_date != undefined) {
                            $.ajax({
                                url: '{{ route('rotas.shift_copy') }}',
                                method: 'post',
                                data: data,
                                success: function (data)
                                {
                                    if(data['status'] == 'success')
                                    {
                                        ui.helper.html(data['shift']);
                                        ui.helper.attr('data-rotas-id',data['insert_id']);
                                        show_toastr('Success', data['msg'], 'success');
                                    }
                                    else
                                    {
                                        ui.helper.remove();
                                        show_toastr('Error', data['msg'], 'error');
                                    }                                                            
                                    $('[data-toggle="tooltip"]').tooltip();
                                    loadConfirm();
                                    $('.rotas_location_change').trigger('change');

                                    $('[data-toggle="tooltip"]').tooltip();

                                    if ( $('.add_remove_dayeoff').css('display') != 'none')
                                    {
                                        $('.day_off_leave').show();
                                    }
                                    else{
                                        $('.day_off_leave').hide();
                                    }
                                }
                            });
                        }                    
                    },1000);
                }
            });
        }

        function seturl() {            
            var week = $('.week_add_sub').val();
            var location_id = $('.rotas_location_change').val();
            var role_id = $('.rotas_role_change').val();
            var created_by = $('.week_add_sub').attr('data-created-by');

            var user_array = [];
            $( ".work_sheet_table1 tbody tr" ).each(function(propName, index ) {
                var user_id = $( this ).attr('data-user-id');
                user_array[propName] = user_id;
            });
            
            var url = $('.share_rotas_cls').attr('data-url2');
            var new_url = url+'?loaction='+location_id+'&create_by='+created_by+'&role_id='+role_id+'&week='+week+'&user='+user_array;
            console.log(new_url);
            $('.share_rotas_cls').attr('data-url', new_url);
            $('.share_rotas_cls').attr('data-ajax-popup', true);
        }

        function leave_show() {
            $('.day_off_leave').hide();
            if(!$("#hidedayoff").hasClass('hide_rss'))
            {
                $('.day_off_leave').show();
            }


            $('.other_leave').hide();
            $('.holiday_leave').hide();
            if(!$("#hideleave").hasClass('hide_rss'))
            {
                $('.other_leave').show();
                $('.holiday_leave').show();
            }          
            $('[data-toggle="tooltip"]').tooltip();
        }
    
</script>
@endpush
