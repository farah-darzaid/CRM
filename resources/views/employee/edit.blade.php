@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('content.edit') }}
        </div>
        <div class="card-body">
            <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-2 row">
                    <label class="col-md-2 label-control" for="first_name">{{__('content.first_name')}}</label>
                    <div class="col-md-10">
                        <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ old('first_name') ?? $employee->first_name}}" placeholder="{{__('content.first_name')}}">
                        @error('first_name')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>

                <div class="form-group mb-2 row ">
                    <label class="col-md-2 label-control" for="last_name">{{__('content.last_name')}}</label>
                    <div class="col-md-10">
                        <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ old('last_name') ?? $employee->last_name}}"
                               placeholder="{{__('content.last_name')}}">
                        @error('last_name')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>

                <div class="form-group mb-2 row">
                    <label class="col-md-2 label-control" for="company_id">{{__('content.company')}}</label>
                    <div class="col-md-10">
                        <select type="text" id="company_id" name="company_id" class="form-select @error('company_id') is-invalid @enderror"" title="{{__('content.company')}}">
                            <option value="">{{ __('content.company') }}</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}"
                                        @if (old('company_id') == $company->id)
                                        selected
                                        @elseif ($employee->company_id == $company->id)
                                        selected
                                    @endif
                                >{{ $company->name }}</option>
                            @endforeach
                        </select>
                        @error('company_id')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-2 row">
                    <label class="col-md-2 label-control" for="email">{{__('content.email')}}</label>
                    <div class="col-md-10">
                        <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email') ?? $employee->email}}" placeholder="{{__('content.email')}}">
                        @error('email')
                        <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-2 row">
                    <label class="col-md-2 label-control" for="phone">{{__('content.phone')}}</label>
                    <div class="col-md-10">
                        <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone"  value="{{ old('phone') ?? $employee->phone}}" placeholder="{{__('content.phone')}}">
                        @error('phone')
                        <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-md btn-outline-dark" style="float: right">{{ __('content.update') }}</button>
            </form>

        </div>
    </div>
@endsection
