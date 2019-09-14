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
                <form action="{{ route('admin.country.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Country Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="country_name" id="name" value="{{ old('name') }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="code">Country Code <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('code') is-invalid @enderror" type="text" name="country_code" id="code" value="{{ old('countrycode') }}"/>
                            @error('code') {{ $message }} @enderror
                        </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Country</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.country.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection