<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Report')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Page content -->
    <div class="page-content">
        <!-- Page title -->
        <div class="page-title">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-3 col-sm-12 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                    <div class="d-inline-block">
                        <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white"><?php echo e(__('Report')); ?></h5>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12 mb-3 mb-md-0">
                    <?php echo e(Form::open(['url' => 'reports', 'method' => 'get', 'enctype' => 'multipart/form-data', 'id' => 'reportt_filterr'])); ?>

                    <div class="row">
                        
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <?php echo e(Form::label('', __('Date'), ['class' => 'form-control-label text-white'])); ?>

                                <?php echo Form::text('date', $get_date_val, ['class'=> 'float-right mx-1 w-100 fs-14 text-center border-0', 'id' => 'daterangepicker1', 'style' => 'line-height: 45px; border-radius: 5px;']); ?>

                            </div>
                        </div>

                        
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <?php echo e(Form::label('', __('Location'), ['class' => 'form-control-label text-white'])); ?>

                                <?php echo Form::select('location[]', $filter_locations, $get_location_val, ['required' => false, 'multiple' => 'multiple', 'data-placeholder'=>  __('Select location')  ,'class'=> 'form-control js-multiple-select']); ?>

                            </div>
                        </div>

                        
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <?php echo e(Form::label('', __('User'), ['class' => 'form-control-label text-white'])); ?>

                                <?php echo Form::select('employees[]', $filter_employees, $get_user_val, ['required' => false, 'multiple' => 'multiple', 'data-placeholder'=> __('Select user') ,'class'=> 'form-control js-multiple-select']); ?>

                            </div>
                        </div>

                        
                        <div class="col-sm-12 col-md-5 col-lg-2">
                            <div class="form-group">
                                <?php echo e(Form::label('', __('Role'), ['class' => 'form-control-label text-white'])); ?>

                                <?php echo Form::select('role[]', $filter_role, $get_role_val, ['required' => false, 'multiple' => 'multiple', 'data-placeholder'=> __('Select role') ,'class'=> 'form-control js-multiple-select']); ?>

                            </div>
                        </div>

                        <div class="col-sm-12 col-md-1 col-lg-1">
                            <br>
                            <button type="submit" class="btn btn-sm btn-white btn-icon-only rounded-circle boder-0 mt-2">                                
                                    <span class="btn-inner--icon"><i class="fas fa-search"></i></span>                                
                            </button>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
        <!-- Listing -->
        <div class="row">

            <div class="col-lg-3 order-lg-2">
                <div class="card">
                    <div class="list-group list-group-flush" id="tabs">
                        <div data-href="#tabs-1" class="list-group-item text-primary">
                            <div class="media">
                                <i class="fas fa-chart-area"></i>
                                <div class="media-body ml-3">
                                    <a href="#" class="stretched-link h6 mb-1"><?php echo e(__('Hours')); ?></a>
                                </div>
                            </div>
                        </div>
                        <!--div data-href="#tabs-2" class="list-group-item">
                            <div class="media">
                                <i class="fas fa-chart-area"></i>
                                <div class="media-body ml-3">
                                    <a href="#" class="stretched-link h6 mb-1"><?php echo e(__('Time Off & Cover')); ?></a>
                                </div>
                            </div>
                        </div-->
                    </div>
                </div>
            </div>
            <div class="col-lg-9 order-lg-1">
                <div id="tabs-1" class="tabs-card ">
                    <ul class="nav nav-dark nav-tabs nav-overflow" role="tablist">
                        <li class="nav-item">
                            <a href="#daily_totals_tab"  class="nav-link active" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">
                                <i class="far fa-calendar-check mr-2"></i><?php echo e(__('Daily Hours')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#monthly_totals_tab" class="nav-link" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">
                                <i class="far fa-calendar-alt mr-2"></i><?php echo e(__('Monthly Hours')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#employee_wise_totals_tab" class="nav-link" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">
                                <i class="far fa-user mr-2"></i><?php echo e(__('Doctor Shift Hours')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#employee_call_totals_tab" class="nav-link" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">
                                <i class="far fa-user mr-2"></i><?php echo e(__('Doctor Call Hours')); ?>

                            </a>
                        </li>
                        <!--li class="nav-item">
                            <a href="#location_totals_tab" class="nav-link" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">
                                <i class="fas fa-map-marker-alt mr-2"></i><?php echo e(__('Location Hours')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#role_totals_tab" class="nav-link" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">
                                <i class="fas fa-user-tag mr-2"></i><?php echo e(__('Role Hours')); ?>

                            </a>
                        </li-->
                    </ul>
                    <div class="tab-content pt-4">
                        <div class="tab-pane fade show active" id="daily_totals_tab" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="h6 mb-0"><?php echo e(__('Daily Hours')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div id="daily_totals"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show " id="monthly_totals_tab" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="h6 mb-0"><?php echo e(__('Monthly Hours')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div id="monthly_totals_chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="employee_wise_totals_tab" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="h6 mb-0"><?php echo e(__('Doctor Shift Hours')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div id="employee_wise_totals_chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="employee_call_totals_tab" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="h6 mb-0"><?php echo e(__('Doctor Call Hours')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div id="employee_call_totals_chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="location_totals_tab" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="h6 mb-0"><?php echo e(__('Location Hours')); ?></h5>
                                </div>
                                <div class="card-body align-self-center">
                                    <div id="location_totals_chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="role_totals_tab" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="h6 mb-0"><?php echo e(__('Role Hours')); ?></h5>
                                </div>
                                <div class="card-body  align-self-center">
                                    <div id="role_totals_chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tabs-2" class="tabs-card d-none">
                    <ul class="nav nav-dark nav-tabs nav-overflow" role="tablist">
                        <li class="nav-item">
                            <a href="#leave_totals_tab"  class="nav-link active" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">
                                <i class="fas fa-sign-out-alt mr-2"></i><?php echo e(__('Leave Hours')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#employee_leave_totals_tab" class="nav-link" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">
                                <i class="fas fa-user-slash mr-2"></i><?php echo e(__('Leave by Employee')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#paid_leave_totals_tab" class="nav-link" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">
                                <i class="fas fa-user-tag mr-2"></i><?php echo e(__('Paid/Unpaid Leave')); ?>

                            </a>
                        </li>
                    </ul>
                    <div class="tab-content pt-4">
                        <div class="tab-pane fade show active" id="leave_totals_tab" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="h6 mb-0"><?php echo e(__('Leave Hours')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div id="leave_totals_chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="employee_leave_totals_tab" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="h6 mb-0"><?php echo e(__('Leave by Employee')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div id="employee_leave_totals_chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="paid_leave_totals_tab" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="h6 mb-0"><?php echo e(__('Paid/Unpaid Leave')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div id="paid_leave_totals_chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('pagescript'); ?>
<script>
    

$('#daterangepicker1').daterangepicker({
    ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    locale: {
      format: 'YYYY-MM-DD'
    },
    "alwaysShowCalendars": true,
    "opens": "left",
    "startDate": moment().subtract(29, 'days'),
    "endDate": moment(),
}, function(start, end, label) {
  //console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
  $('.start_date').attr('value',start.format('YYYY-MM-DD'));
  $('.end_date').attr('value',end.format('YYYY-MM-DD'));
  $('.date_lable').attr('value',label);
  filter_report(0,'none');
});


$('#daterangepicker1').on('showCalendar.daterangepicker', function(ev, picker) {
    $('.start_date').attr('value',picker.startDate.format('YYYY-MM-DD'));
    $('.end_date').attr('value',picker.endDate.format('YYYY-MM-DD'));
    $('.date_lable').attr('value',picker.ranges);
    console.log(picker,ev,picker.ranges);
    filter_report(0,'none');
});

filter_report(0,'none');

function filter_report(data_id,class_name) {
    var data_id =data_id;
    var class_name = class_name;
    $('.'+class_name+' a[data-id="0"]').removeClass('active');
    if(data_id == 0) {
        $('.'+class_name+' a').removeClass('active');
    }
    if($('.'+class_name+' a[data-id="'+data_id+'"]').hasClass('active')) {
        $('.'+class_name+' a[data-id="'+data_id+'"]').removeClass('active');
    } else {
        $('.'+class_name+' a[data-id="'+data_id+'"]').addClass('active');
    }

    var location_id = $('.locatoin_filter_report a.dropdown-item.active');
    var location_array = [];
    location_id.each(function( index ) {
        location_array.push($(this).attr('data-id'));
    });
    location_id = location_array.join(',');

    var user_id = $('.user_filter_report a.dropdown-item.active');
    var user_id_array = [];
    user_id.each(function( index ) {
        user_id_array.push($(this).attr('data-id'));
    });
    user_id = user_id_array.join(',');

    var role_id = $('.role_filter_report a.dropdown-item.active');
    var role_array = [];
    role_id.each(function( index ) {
        role_array.push($(this).attr('data-id'));
    });
    role_id = role_array.join(',');

    $('.location_id[name="location"]').attr('value',location_id);
    $('.user_id[name="user"]').attr('value',user_id);
    $('.role_id[name="role"]').attr('value',role_id);


    var start_date = $('.start_date[name="start_date"]').attr('value');
    var end_date = $('.end_date[name="end_date"]').attr('value');
    if(start_date == undefined)
    {
        var ddate = $('#daterangepicker1').val();
        ddate = ddate.split(' - ');
        $('.start_date[name="start_date"]').attr('value',ddate[0]);
    }
    if(end_date == undefined)
    {
        var ddate = $('#daterangepicker1').val();
        ddate = ddate.split(' - ');
        $('.end_date[name="end_date"]').attr('value',ddate[1]);
    }

    //$('#reportt_filterr').trigger('submit');
}


/*Chart*/

/* *********
* last month chart data
********* */
var options = {
    series: [
        { name: '<?php echo e(__('Hours')); ?>', data: <?php echo $daily_totals['hour']; ?> },
        //{ name: '<?php echo e(__('Cost')); ?>', data: <?php echo $daily_totals['cost']; ?> },
    ],
    chart: { height: '400px' ,width: "100%", zoom: {enabled: !1}, toolbar: {show: 1}, shadow: {enabled: !1}, type: 'area'},
    dataLabels: { enabled: false },
    stroke: { curve: 'smooth' },
    // colors: ['#00E396', '#CED4DC'],    chart line color
    markers: {size: 4, opacity: .7, strokeColor: "#fff", strokeWidth: 3, hover: {size: 5}},
    grid: {borderColor: SiteStyle.colors.gray[300], strokeDashArray: 5},
    xaxis: {
        type: 'categories',
        categories: <?php echo $daily_totals['date']; ?>,
    },
    tooltip: {
        x: { format: 'dd/MM/y' },
        y: {
            formatter: function(value, { series, seriesIndex, dataPointIndex, w }) {
                var value = value;
                if(seriesIndex == 0 && value != 0)
                {
                    var res = value.toString();
                    res = res.split('.');
                    var min = '00';
                    if(!isNaN(res[1]))
                    {
                        min = Math.round(60 * res[1] / 100);
                    }
                    var value = res[0]+':'+min;

                }
                return value;
            }
        },
    },
    legend: {
        show: true,
        horizontalAlign: 'left',
    },
};

var daily_total = new ApexCharts(document.querySelector("#daily_totals"), options);
daily_total.render();

/* *********
* monthly rotas chart
********* */
var monthly_total_options = {
    series: [
        { name: '<?php echo e(__('Hours')); ?>', data:<?php echo $monthly['monthly_hour']; ?> },
        //{ name: '<?php echo e(__('Cost')); ?>', data:<?php echo $monthly['monthly_cost']; ?> },
    ],
    chart: { height: '400px' ,width: "100%", zoom: {enabled: !1}, toolbar: {show: 1}, shadow: {enabled: !1}, type: 'area'},
    dataLabels: { enabled: false },
    stroke: { curve: 'smooth' },
    // colors: ['#00E396', '#CED4DC'],    chart line color
    markers: {size: 4, opacity: .7, strokeColor: "#fff", strokeWidth: 3, hover: {size: 5}},
    grid: {borderColor: SiteStyle.colors.gray[300], strokeDashArray: 5},
    xaxis: {
        type: 'categories',
        categories: <?php echo $monthly['last_months']; ?>

    },
    tooltip: {
        x: { format: 'dd/MM/y' },
        y: {
            formatter: function(value, { series, seriesIndex, dataPointIndex, w }) {
                var value = value;
                if(seriesIndex == 0 && value != 0)
                {
                    var res = value.toString();
                    res = res.split('.');
                    var min = '00';
                    if(!isNaN(res[1]))
                    {
                        min = Math.round(60 * res[1] / 100);
                    }
                    var value = res[0]+':'+min;
                }
                return value;
            }
        },
    },
    legend: {
      show: true,
      horizontalAlign: 'left',
      height: '100px',
    },
};
var monthly_totals_chart = $("#monthly_totals_chart");
var monthly_total = new ApexCharts(monthly_totals_chart[0], monthly_total_options);
monthly_total.render();


/* *********
* Employee wise rotas chart
********* */
var employee_wise_totals_chart_options = {
    series: [
        { name: '<?php echo e(__('Hour')); ?>', data: <?php echo $employee_wise['user_hour']; ?> },
        //{ name: '<?php echo e(__('Cost')); ?>', data:<?php echo $employee_wise['user_cost']; ?> },
    ],
    chart: { height: '400px' ,width: "100%", zoom: {enabled: !1}, toolbar: {show: 1}, shadow: {enabled: !1}, type: 'bar'},
    plotOptions: {
        bar: { horizontal: false, columnWidth: '55%', endingShape: 'rounded' },
    },
    dataLabels: { enabled: false },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    xaxis: {
        categories: <?php echo $employee_wise['employee']; ?>,
    },
    fill: {
        opacity: 1
    },
    tooltip: {
        y: {
            formatter: function(value, { series, seriesIndex, dataPointIndex, w }) {
                var value = value;
                if(seriesIndex == 0 && value != 0)
                {
                    var res = value.toString();
                    res = res.split('.');
                    var min = '00';
                    if(!isNaN(res[1]))
                    {
                        min = Math.round(60 * res[1] / 100);
                    }
                    var value = res[0]+':'+min;
                }
                return value;
            }
        },
        legend: {
        show: true,
        horizontalAlign: 'left',
        },
    }
};

var employee_wise_totals_chart = new ApexCharts(document.querySelector("#employee_wise_totals_chart"), employee_wise_totals_chart_options);
employee_wise_totals_chart.render();

/* *********
* Employee wise rotas chart
********* */
var employee_call_totals_chart_options = {
    series: [
        { name: '<?php echo e(__('Hour')); ?>', data: <?php echo $employee_call['user_hours']; ?> },
    ],
    chart: { height: '400px' ,width: "100%", zoom: {enabled: !1}, toolbar: {show: 1}, shadow: {enabled: !1}, type: 'bar'},
    plotOptions: {
        bar: { horizontal: false, columnWidth: '55%', endingShape: 'rounded' },
    },
    dataLabels: { enabled: false },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    xaxis: {
        categories: <?php echo $employee_call['employee']; ?>,
    },
    fill: {
        opacity: 1
    },
    tooltip: {
        y: {
            formatter: function(value, { series, seriesIndex, dataPointIndex, w }) {
                var value = value;
                if(seriesIndex == 0 && value != 0)
                {
                    var res = value.toString();
                    res = res.split('.');
                    var min = '00';
                    if(!isNaN(res[1]))
                    {
                        min = Math.round(60 * res[1] / 100);
                    }
                    var value = res[0]+':'+min;
                }
                return value;
            }
        },
        legend: {
        show: true,
        horizontalAlign: 'left',
        },
    }
};

var employee_call_totals_chart = new ApexCharts(document.querySelector("#employee_call_totals_chart"), employee_call_totals_chart_options);
employee_call_totals_chart.render();

/* *********
* location wise rotas chart
********* */
var location_totals_chart_options = {
    series: <?php echo $locations_wise['location_hour']; ?>,
    chart: { idth: '500px', height: '500px', zoom: {enabled: !1}, toolbar: {show: 1}, shadow: {enabled: !1}, type: 'pie', },
    labels: <?php echo $locations_wise['location']; ?>,
    title: {        
        align: 'center',
        margin: 10,
        offsetX: 0,
        offsetY: 0,
        floating: false,
        style: {
            fontSize:  '18px',
            fontWeight:  'bold',
            fontFamily:  undefined,
            color:  '#263238'
        },
    },
    responsive: [{
        breakpoint: 480,
        options: {
            chart: { width: 200 },
            legend: { position: 'left' }
        }
    }],
    tooltip: {
        y: {
            formatter: function(value, { series, seriesIndex, dataPointIndex, w }) {
                var value = value;
                if(seriesIndex == undefined && value != 0)
                {
                    var res = value.toString();
                    res = res.split('.');
                    var min = '00';
                    if(!isNaN(res[1]))
                    {
                        min = Math.round(60 * res[1] / 100);
                    }
                    var value = res[0]+':'+min;
                }
                return value;
            }
        }
    },
};

var location_totals_chart = new ApexCharts(document.querySelector("#location_totals_chart"), location_totals_chart_options);
location_totals_chart.render();

/* *********
* Role wise rotas chart
********* */
var role_totals_chart_options = {
    series: <?php echo $role_wise['role_hour']; ?>,
    chart: { idth: '500px', height: '500px', zoom: {enabled: !1}, toolbar: {show: 1}, shadow: {enabled: !1}, type: 'pie', },
    labels: <?php echo $role_wise['role']; ?>,
    title: {
        align: 'center',
        margin: 10,
        offsetX: 0,
        offsetY: 0,
        floating: false,
        style: {
            fontSize:  '18px',
            fontWeight:  'bold',
            fontFamily:  undefined,
            color:  '#263238'
        },
    },
    responsive: [{
        breakpoint: 480,
        options: {
            chart: { width: 200 },
            legend: { position: 'left' }
        }
    }],
    tooltip: {
        y: {
            formatter: function(value, { series, seriesIndex, dataPointIndex, w }) {
                var value = value;
                if(seriesIndex == undefined && value != 0)
                {
                    var res = value.toString();
                    res = res.split('.');
                    var min = '00';
                    if(!isNaN(res[1]))
                    {
                        min = Math.round(60 * res[1] / 100);
                    }
                    var value = res[0]+':'+min;
                }
                return value;
            }
        }
    },
};

var role_totals_chart = new ApexCharts(document.querySelector("#role_totals_chart"), role_totals_chart_options);
role_totals_chart.render();

/* *********
* leave chart
********* */

var leave_totals_chart_options = {
    series: [
        { name: '<?php echo e(__('Leave')); ?>', data: <?php echo $leaves_wise['leave']; ?> }
    ],
    chart: { width: "100%", zoom: {enabled: !1}, stacked: true, toolbar: {show: 1}, shadow: {enabled: !1}, type: 'bar', },
    responsive: [{
          breakpoint: 480,
          options: { legend: { position: 'bottom', offsetX: -10, offsetY: 0 } }
    }],
    plotOptions: {
        bar: { horizontal: false, },
    },
    xaxis: {
        type: 'categories',
        categories: <?php echo $leaves_wise['type']; ?>,
        //type: 'datetime',
        //categories: ['01/01/2011 GMT', '01/02/2011 GMT',],
    },
    legend: { position: 'right', offsetY: 40 },
    fill: { opacity: 1 },
    legend: { show: true, horizontalAlign: 'left' },
};

var leave_totals_chart = new ApexCharts(document.querySelector("#leave_totals_chart"), leave_totals_chart_options);
leave_totals_chart.render();

/* *********
* employee leave chart
********* */

var employee_leave_totals_chart_options = {
    series: <?php echo $employee_wise_leave['leave']; ?>,
    chart: { width: "100%", zoom: {enabled: !1}, stacked: true, toolbar: {show: 1}, shadow: {enabled: !1}, type: 'bar', },
    responsive: [{
          breakpoint: 480,
          options: { legend: { position: 'bottom', offsetX: -10, offsetY: 0 } }
    }],
    plotOptions: {
        bar: { horizontal: false, },
    },
    xaxis: {
        type: 'categories',
        categories: <?php echo $employee_wise_leave['employee']; ?>,
    },
    legend: { position: 'right', offsetY: 40 },
    fill: { opacity: 1 },
    legend: { show: true, horizontalAlign: 'left' },
};

var employee_leave_totals_chart = new ApexCharts(document.querySelector("#employee_leave_totals_chart"), employee_leave_totals_chart_options);
employee_leave_totals_chart.render();

/* *********
* Paid Leave Chart
********* */

var paid_leave_options = {
    series: [
        { name: '<?php echo e(__('Paid')); ?>', data: <?php echo $paid_leave_data['paid']; ?> },
        { name: '<?php echo e(__('Unpaid')); ?>', data: <?php echo $paid_leave_data['unpaid']; ?> },
    ],
    chart: { height: '400px' ,width: "100%", zoom: {enabled: !1}, toolbar: {show: 1}, shadow: {enabled: !1}, type: 'area'},
    dataLabels: { enabled: false },
    stroke: { curve: 'smooth' },
    markers: {size: 4, opacity: .7, strokeColor: "#fff", strokeWidth: 3, hover: {size: 5}},
    grid: {borderColor: SiteStyle.colors.gray[300], strokeDashArray: 5},
    xaxis: {
        type: 'categories',
        categories: <?php echo $paid_leave_data['date']; ?>,
    },
    tooltip: {
        x: { format: 'dd/MM/y' },        
    },
    legend: {
        show: true,
        horizontalAlign: 'left',
    },
};

var paid_leave = new ApexCharts(document.querySelector("#paid_leave_totals_chart"), paid_leave_options);
paid_leave.render();

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jovickxe/medtimes.co/resources/views/report/index.blade.php ENDPATH**/ ?>