@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.adminuser.create') }}" class="btn btn-primary pull-right">Add Admin</a>
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
                                <th> Username </th>
                                <th> First Name </th>
                                <th> Last Name </th>
                                <th> Email </th>
                                <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admin as $newadmin)
                                @if ($newadmin->id != 0)
                                    <tr>
                                        <td>{{ $newadmin->id }}</td>
                                        <td>{{ $newadmin->username }}</td>
                                        <td>{{ $newadmin->first_name }}</td>
                                        <td>{{ $newadmin->last_name }}</td>
                                        <td>{{ $newadmin->email }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Second group">
                                                <a href="{{ route('admin.adminuser.edit', $newadmin->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('admin.adminuser.delete', $newadmin->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
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