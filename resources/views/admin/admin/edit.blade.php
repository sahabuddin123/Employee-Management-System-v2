@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
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
                <form action="{{ route('admin.adminuser.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">User Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="username" id="name" value="{{ old('username', $admin->username) }}" />
                            <input type="hidden" name="id" value="{{ $admin->id }}">
                            @error('name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="first_name">First Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" id="first_name" value="{{ old('first_name', $admin->first_name) }}" />
                            @error('first_name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="last_name">Last Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" id="last_name" value="{{ old('last_name', $admin->last_name) }}" />
                            @error('last_name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">Email <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email', $admin->email) }}" />
                            @error('email') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" value="{{ old('password', $admin->password) }}" />
                            @error('password') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                @if ($admin->picture != null)
                                <figure class="mt-2" style="width: 80px; height: auto;">
                                    <img src="{{ asset('storage/'.$admin->picture) }}" id="adminImage" class="img-fluid" alt="img">
                                </figure>
                                @endif
                            </div>
                            <div class="col-md-10">
                                <label class="control-label">Admin Image</label>
                                <input class="form-control @error('picture') is-invalid @enderror" type="file" id="picture" name="picture"/>
                                @error('picture') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Admin</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.adminuser.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection