@extends('layouts.app')

@section('content')
    <div class="card">
    <div class="card-header">
        {{ __('content.create') }}
    </div>
        <div class="card-body">
            <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-2 row {{ $errors->has('first_name') ? ' has-error' : '' }}">
                    <label class="col-md-2 label-control" for="first_name">{{__('content.first_name')}}</label>
                    <div class="col-md-10">
                        <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name"
                               value="{{ old('first_name')}}" placeholder="{{__('content.first_name')}}">
                        @error('first_name')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-2 row {{ $errors->has('last_name') ? ' has-error' : '' }}">
                    <label class="col-md-2 label-control" for="last_name">{{__('content.last_name')}}</label>
                    <div class="col-md-10">
                        <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name"
                               value="{{ old('last_name')}}" placeholder="{{__('content.last_name')}}">
                        @error('last_name')
                        <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-2 row ">
                    <label class="col-md-2 label-control" for="company">{{__('content.company')}}</label>
                    <div class="col-md-10">
                        <select name="company_id" class="form-select @error('company_id') is-invalid @enderror"
                                title="{{ __('content.select') . ' ' . __('content.company') }}">
                            <option selected disabled>
                                {{ __('content.select') . ' ' . __('content.company') }}
                            </option>
                            @forelse($companies as $company)
                                <option value="{{ old('company_id') ?? $company->id }}"> {{ $company->name }}</option>
                            @empty
                                <option selected disabled value="{{ __('content.no_data_available') }}"></option>
                            @endforelse
                        </select>
                        @error('company_id')
                        <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-2 row {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="col-md-2 label-control" for="email">{{__('content.email')}}</label>
                    <div class="col-md-10">
                        <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email')}}" placeholder="{{__('content.email')}}">
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
                        <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone"
                               value="{{ old('phone')}}" placeholder="{{__('content.phone')}}">
                        @error('phone')
                        <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-md btn-outline-dark" style="float: right">{{ __('content.create') }}</button>
            </form>

        </div>
    </div>
@endsection
