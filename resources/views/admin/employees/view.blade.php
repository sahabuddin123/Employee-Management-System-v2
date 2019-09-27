@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
<div class="container">
<div class="app-title">
    <div>
        <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
    </div>
</div>
@include('admin.partials.flash')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="tile">
            <h3 class="tile-title">{{ $subTitle }}</h3>
            <table class="table table-hover table-dark" cellpadding="10">
                <thead>
                    <tr>
                        <th  colspan="2">{{ $employee->first_name }} {{ $employee->last_name }}<br><small>{{ $employee->address }}<br>{{ $employee->phone }}</small></th>
                        <th colspan="2">
                            <div style="width: 150px; height:200px;padding:0;margin:0;float:right;">
                                <img src="{{ asset('storage/'.$employee->picture) }}" id="employeeImage" class="img-fluid" alt="img">
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-danger"><h6>Name : </h6></td>
                        <td class="text-primary"><h6>{{ $employee->first_name }} {{ $employee->last_name }}</h6></td>
                        <td class="text-danger"><h6>Sex : </h6></td>
                        <td class="text-primary"><h6>{{ $employee->empGender->gender_name }}</h6></td>
                    </tr>
                    <tr>
                        <td class="text-danger"><h6>Phone : </h6></td>
                        <td class="text-primary"><h6>{{ $employee->phone }}</h6></td>
                        <td class="text-danger"><h6>Email : </h6></td>
                        <td class="text-primary"><h6>{{ $employee->email }}</h6></td>
                    </tr>
                    <tr>
                        <td class="text-danger"><h6>Department : </h6></td>
                        <td class="text-primary"><h6>{{ $employee->empDepartment->dept_name }}</h6></td>
                        <td class="text-danger"><h6>Age : </h6></td>
                        <td class="text-primary"><h6>{{ $employee->age }}</h6></td>
                    </tr>
                    <tr>
                        <td class="text-danger"><h6>Country : </h6></td>
                        <td class="text-primary"><h6>{{ $employee->empCountry->country_name }}</h6></td>
                        <td class="text-danger"><h6>Division : </h6></td>
                        <td class="text-primary"><h6>{{ $employee->empDivision->division_name }}</h6></td>
                    </tr>
                    <tr>
                        <td class="text-danger"><h6>State : </h6></td>
                        <td class="text-primary"><h6>{{ $employee->empState->state_name }}</h6></td>
                        <td class="text-danger"><h6>City : </h6></td>
                        <td class="text-primary"><h6>{{ $employee->empCity->city_name }}</h6></td>
                    </tr>
                    <tr>
                        <td class="text-danger"><h6>Join Date : </h6></td>
                        <td class="text-primary"><h6>{{ $employee->join_date }}</h6></td>
                        <td class="text-danger"><h6>Date of birth : </h6></td>
                        <td class="text-primary"><h6>{{ $employee->birth_date }}</h6></td>
                    </tr>
                    <tr>
                        <td class="text-danger" colspan="1"><h6>Address : </h6></td>
                        <td class="text-primary" colspan="3"><h6>{{ $employee->address }}</h6></td>
                        
                    </tr>
                    <tr>
                        <td class="text-danger"><h6>Salary : </h6></td>
                        <td class="text-primary"><h6>{{ $employee->empSalary->s_amount }}/-</h6></td>
                        <td class="text-danger"></td>
                        <td class="text-primary"></td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('admin.employees.index') }}" class="btn btn-primary" style="width:100%;">Go Back</a>
        </div>
    </div>
</div>
</div>
@endsection