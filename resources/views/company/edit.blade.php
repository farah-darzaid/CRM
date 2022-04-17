@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('content.edit') }}
        </div>
        <div class="card-body">
            <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-2 row {{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-md-2 label-control" for="name">{{__('content.name')}}</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" value="{{ old('name') ?? $company->name}}" placeholder="{{__('content.name')}}">
                        @error('name')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-2 row {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="col-md-2 label-control" for="email">{{__('content.email')}}</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="email" value="{{ old('email') ?? $company->email}}" placeholder="{{__('content.email')}}">
                        @error('email')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-2 row {{ $errors->has('website') ? ' has-error' : '' }}">
                    <label class="col-md-2 label-control" for="website">{{__('content.website')}}</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="website"  value="{{ old('website') ?? $company->website}}" placeholder="{{__('content.website')}}">
                        @error('website')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-2 row {{ $errors->has('logo') ? ' has-error' : '' }}">
                    <label class="col-md-2 label-control" for="logo">{{__('content.logo')}}</label>
                    <div class="col-md-10">
                        <div class="custom-file">

                            @if($company->logo)
                                <img src="{{ asset('storage/companies/logo/'.$company->logo) }}" class="w-auto mb-3 d-block">
                            @endif
                            <input type="file" id="logo" name="logo" value="{{ old('logo') ?? $company->logo}}" class="custom-file-input">
                        </div>

                        @error('logo')
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
