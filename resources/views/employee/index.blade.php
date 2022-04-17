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
                <th scope="col">{{ __('content.first_name') }}</th>
                <th scope="col">{{ __('content.last_name') }}</th>
                <th scope="col">{{ __('content.company') }}</th>
                <th scope="col">{{ __('content.email') }}</th>
                <th scope="col">{{ __('content.phone') }}</th>
                <th scope="col">{{ __('content.action') }}</th>
            </tr>
            </thead>
            <tbody>

            @forelse($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->company->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('employees.show', $employee->id) }}">
                            <span class="d-lg-inline-block d-none">{{__('content.edit')}}</span>
                        </a>

                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#employee_{{$employee->id}}">
                            <span class="d-lg-inline-block d-none">{{__('content.delete')}}</span>
                        </a>

                        <div class="modal fade" id="employee_{{$employee->id}}" tabindex="-1" aria-labelledby="employee_{{$employee->id}}" aria-hidden="true">
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
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
                    <td colspan="7">{{ __('content.no_data_available') }}</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        @include('pagination', ['paginator' => $employees])

    </div>
@endsection
