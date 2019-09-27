@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon">
                <i class="icon fa fa-user"></i>
                <div class="info">
                    <h4>Admin</h4>
                    <p><b>Total({{ $t_admins }})</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon">
            <i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Employees</h4>
                    <p><b>Total({{ $t_employees }})</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon">
            <i class="icon fa fa-building"></i>
                <div class="info">
                    <h4>Department</h4>
                    <p><b>Total({{ $t_departments }})</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
            <i class="icon fa fa-map-marker"></i>
                <div class="info">
                    <h4>Cities</h4>
                    <p><b>Total({{ $t_cities }})</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon">
                <i class="icon fa fa-globe"></i>
                <div class="info">
                    <h4>Countries</h4>
                    <p><b>Total({{ $t_countries}})</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon">
            <i class="icon fa fa-usd"></i>
                <div class="info">
                    <h4>Salaries</h4>
                    <p><b>Total({{ $t_salaries }})</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon">
            <i class="icon fa fa-building-o"></i>
                <div class="info">
                    <h4>States</h4>
                    <p><b>Total({{ $t_states }})</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
            <i class="icon fa fa-area-chart"></i>
                <div class="info">
                    <h4>Divisions</h4>
                    <p><b>Total({{ $t_divisions }})</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Uploades</h4>
                    <p><b>10</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon">
                <i class="icon fa fa-star fa-3x"></i>
                <div class="info">
                    <h4>Stars</h4>
                    <p><b>500</b></p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container-fluid">
        <div class="card-panel">
            <canvas id="employee"></canvas>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{asset('/backend/js/Chart.js')}}"></script>
    
    
    <script>
        
        employee_chart = document.getElementById('employee').getContext('2d');
        chart = new Chart(employee_chart,{
            type:'line',
            data:{
                labels:[
                    
                    '{{Carbon\Carbon::now()->subMonths(4)->toFormattedDateString()}}',
                    '{{Carbon\Carbon::now()->subMonths(3)->toFormattedDateString()}}',
                    '{{Carbon\Carbon::now()->subMonths(2)->toFormattedDateString()}}',
                    '{{Carbon\Carbon::now()->subMonths(1)->toFormattedDateString()}}'
                    ],
                datasets:[{
                    label:'Employment Last Four Months',
                    data:[
                        '{{$emp_count_4}}',
                        '{{$emp_count_3}}',
                        '{{$emp_count_2}}',
                        '{{$emp_count_1}}'
                    ],
                    backgroundColor: [
                        'rgba(178,235,242 ,1)'
                    ],
                    borderColor: [
                        'rgba(0,150,136 ,1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
@endpush