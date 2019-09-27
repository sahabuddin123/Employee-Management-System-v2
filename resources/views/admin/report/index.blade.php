@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.report.makeall') }}" class="btn btn-primary pull-right">Show All Report</a>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Division</th>
                                <th>Join Date</th>
                                <th> Email </th>
                                <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employee as $employees)
                                    <tr>
                                        <td>{{ $employees->id }}</td>
                                        <td>
                                            <figure class="mt-0 mb-0" style="width: 80px; height: auto;">
                                                <img src="{{ asset('storage/'.$employees->picture) }}" id="employeeImage" class="img-fluid" alt="img">
                                            </figure>
                                        </td>
                                        <td>{{ $employees->first_name }} {{ $employees->last_name }}</td>
                                        <td>{{ $employees->empDepartment->dept_name }}</td>
                                        <td>{{ $employees->empDivision->division_name }}</td>
                                        <td>{{ $employees->join_date }}</td>
                                        <td>{{ $employees->email }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Second group">
                                                <a href="{{ route('admin.report.make', $employees->id) }}" class="btn btn-sm btn-warning" title="Print"><i class="fa fa-print"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush