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
                <form action="{{ route('admin.employees.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="first_name">First Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" id="first_name" value="{{ old('first_name', $employee->first_name) }}"/>
                            <input type="hidden" name="id" value="{{ $employee->id }}">
                            @error('first_name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="last_name">Last Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" id="last_name" value="{{ old('last_name', $employee->last_name) }}" />
                            @error('last_name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">Email <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email', $employee->email) }}"/>
                            @error('email') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="age">Age <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('age') is-invalid @enderror" type="number" name="age" id="age" value="{{ old('age', $employee->age) }}"/>
                            @error('age') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="phone">Phone <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('phone') is-invalid @enderror" type="number" name="phone" id="phone" value="{{ old('phone', $employee->phone) }}"/>
                            @error('phone') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="phone">Address <span class="m-l-5 text-danger"> *</span></label>
                            <textarea name="address" id="address" class="form-control" rows="5" >{{ old('address', $employee->address) }}</textarea>
                            @error('phone') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="gender">Gender <span class="m-l-5 text-danger"> *</span></label>
                            <select name="gender_id" class="form-control">
                                    <option value="{{ old('gender_id', $employee->gender_id) }}">{{ old('gender_id', $employee->empGender->gender_name) }}</option>
                                    @foreach($genders as $gender)
                                        <option value="{{$gender->id}}" {{ old('gender')? 'selected' : '' }}>{{$gender->gender_name}}</option>
                                    @endforeach
                                </select>
                            @error('gender') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="salary">Salary <span class="m-l-5 text-danger"> *</span></label>
                            <select name="salary_id" class="form-control">
                                    <option value="{{ old('salary_id', $employee->salary_id) }}">{{ old('salary_id', $employee->empSalary->s_amount) }}</option>
                                    @foreach($salaries as $salary)
                                        <option value="{{$salary->id}}" {{ old('salary')? 'selected' : '' }}>{{$salary->s_amount}}</option>
                                    @endforeach
                                </select>
                            @error('salary') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="department">Department <span class="m-l-5 text-danger"> *</span></label>
                            <select name="dept_id" class="form-control">
                                    <option value="{{ old('dept_id', $employee->dept_id) }}">{{ old('dept_id', $employee->empDepartment->dept_name) }}</option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}" {{ old('salary')? 'selected' : '' }}>{{$department->dept_name}}</option>
                                    @endforeach
                                </select>
                            @error('department') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="state">State <span class="m-l-5 text-danger"> *</span></label>
                            <select name="state_id" class="form-control">
                                    <option value="{{ old('state_id', $employee->state_id) }}">{{ old('state_id', $employee->empState->state_name) }}</option>
                                    @foreach($states as $state)
                                        <option value="{{$state->id}}" {{ old('salary')? 'selected' : '' }}>{{$state->state_name}}</option>
                                    @endforeach
                                </select>
                            @error('state') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="city">City <span class="m-l-5 text-danger"> *</span></label>
                            <select name="city_id" class="form-control">
                                    <option value="{{ old('city_id', $employee->city_id) }}">{{ old('city_id', $employee->empCity->city_name) }}</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}" {{ old('salary')? 'selected' : '' }}>{{$city->city_name}}</option>
                                    @endforeach
                                </select>
                            @error('city') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="country">Country <span class="m-l-5 text-danger"> *</span></label>
                            <select name="country_id" class="form-control">
                                    <option value="{{ old('country_id', $employee->country_id) }}">{{ old('country_id', $employee->empCountry->country_name) }}</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}" {{ old('salary')? 'selected' : '' }}>{{$country->country_name}}</option>
                                    @endforeach
                                </select>
                            @error('country') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Join Date</label>
                            <input class="form-control @error('join_date') is-invalid @enderror" type="date" id="date" name="join_date" value="{{ old('join_date', $employee->join_date) }}"/>
                            @error('join_date') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Date of birth</label>
                            <input class="form-control @error('birth_date') is-invalid @enderror" type="date" id="birth_date" name="birth_date"value="{{ old('birth_date', $employee->birth_date) }}"/>
                            @error('birth_date') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="division">Division <span class="m-l-5 text-danger"> *</span></label>
                            <select name="division_id" class="form-control">
                                    <option value="{{ old('division_id', $employee->division_id) }}">{{ old('division_id', $employee->empDivision->division_name) }}</option>
                                    @foreach($divisions as $division)
                                        <option value="{{$division->id}}" {{ old('salary')? 'selected' : '' }}>{{$division->division_name}}</option>
                                    @endforeach
                                </select>
                            @error('division') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                @if ($employee->picture != null)
                                <figure class="mt-2" style="width: 80px; height: auto;">
                                    <img src="{{ asset('storage/'.$employee->picture) }}" id="employeeImage" class="img-fluid" alt="img">
                                </figure>
                                @endif
                            </div>
                            <div class="col-md-10">
                                <label class="control-label">Employee Image</label>
                                <input class="form-control @error('picture') is-invalid @enderror" type="file" id="picture" name="picture"/>
                                @error('picture') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Admin</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.employees.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection