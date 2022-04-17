@extends('layouts.app')

@section('content')
    <div class="card">
    <div class="card-header">
        {{ __('content.create') }}
    </div>
        <div class="card-body">
            <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-2 row {{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-md-2 label-control" for="name">{{__('content.name')}}</label>
                    <div class="col-md-10">
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name')}}" placeholder="{{__('content.name')}}">
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
                        <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email')}}" placeholder="{{__('content.email')}}">
                        @error('email')
                        <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-2 row">
                    <label class="col-md-2 label-control" for="website">{{__('content.website')}}</label>
                    <div class="col-md-10">
                        <input class="form-control @error('website') is-invalid @enderror" type="text" name="website"  value="{{ old('website')}}" placeholder="{{__('content.website')}}">
                        @error('website')
                        <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-2 row">
                    <label class="col-md-2 label-control" for="logo">{{__('content.logo')}}</label>
                    <div class="col-md-10">
                        <div class="custom-file">
                            <input type="file" id="logo" name="logo" value="{{ old('logo')}}" class="custom-file-input @error('logo') is-invalid @enderror">
                        </div>
                        @error('logo')
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
