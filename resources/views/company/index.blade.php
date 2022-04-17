@extends('layouts.app')

@section('route')
    <a class="btn btn-success" href="{{ $route }}">
        <span class="d-lg-inline-block d-none">{{__('content.create')}}</span>
    </a>
@endsection

@section('content')
    <div class="card">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('content.name') }}</th>
                <th scope="col">{{ __('content.email') }}</th>
                <th scope="col">{{ __('content.logo') }}</th>
                <th scope="col">{{ __('content.website') }}</th>
                <th scope="col">{{ __('content.action') }}</th>
            </tr>
            </thead>
            <tbody>

            @forelse($companies as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>
                        @if($company->logo)
                            <img class="img-fluid img-thumbnail mx-auto" src="{{ asset('storage/companies/logo/'. $company->logo) }}" style="width: 100px">
                        @else
                            {{ __('content.no_logo') }}
                        @endif
                    </td>
                    <td>
                        <a class="underline" href="{{ $company->website }}" target="_blank">
                        {{ $company->website }}
                        </a>
                    </td>
                    <td class="">
                        <a class="btn btn-warning" href="{{ route('companies.show', $company->id) }}">
                            <span class="d-lg-inline-block d-none">{{__('content.edit')}}</span>
                        </a>

                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#company_{{$company->id}}">
                            <span class="d-lg-inline-block d-none">{{__('content.delete')}}</span>
                        </a>

                        <div class="modal fade" id="company_{{$company->id}}" tabindex="-1" aria-labelledby="company_{{$company->id}}" aria-hidden="true">
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> {{ __('content.delete_confirmation_title') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body mx-auto">
                                        {{ __('content.delete_confirmation') }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('content.no') }}</button>
                                        <button type="submit" class="btn btn-primary">{{ __('content.yes') }}</button>
                                    </div>
                                </div>
                            </div>
                            </form>

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">{{ __('content.no_data_available') }}</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        @include('pagination', ['paginator' => $companies])

    </div>
@endsection
