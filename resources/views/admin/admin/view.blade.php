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
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        My Details
                    </div>
                    <div class="card-body" style="margin-left:30%;">
                        <img class="card-img-top" src="{{ asset('storage/'.$admin->picture) }}" alt="Card image cap" style="height:200px;width:200px;border:2px solid #000;border-radius:50%">
                        <h5 class="card-title" style="padding-top:20px; margin-left:8%;">{{ $admin->first_name }} {{ $admin->last_name }}</h5>
                        <p class="card-text" style="padding-top:5px;font-size:18px;margin-left:-5%;"><i class="fa fa-user-circle-o" aria-hidden="true"> {{ $admin->username }}</i></p>
                        <p class="card-text" style="font-size:18px;margin-left:-5%;"><i class="fa fa-envelope" aria-hidden="true"> {{ $admin->email }}</i></p>
                        
                    </div>
                    <a href="{{ route('admin.adminuser.index') }}" class="btn btn-primary" style="width:100%;">Go Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection