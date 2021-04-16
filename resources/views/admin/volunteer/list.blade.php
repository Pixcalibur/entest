@extends('adminlte::page')

@section('title', __('title.volunteer.list'))

@section('content_header')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-10">
            <h1>{{ __('title.volunteer.list') }}</h1>
        </div>
        <div class="col-2 text-right">
            <a class="btn btn-success" href="{{ route('volunteer.create') }}">
                <i class="fas fa-fw fa-plus"></i>
                {{ __('ui.generic.new') }}
            </a>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table" id="list-table">
                    <thead>
                    <tr>
                        <th>{{ __('form.volunteer.field.name') }}</th>
                        <th>{{ __('form.volunteer.field.email') }}</th>
                        <th>{{ __('form.volunteer.field.type') }}</th>
                        <th>{{ __('form.volunteer.field.preferred_date') }}</th>
                        <th>{{ __('form.generic.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($volunteers as $volunteer)
                        <tr>
                            <td>{{ $volunteer->name }}</td>
                            <td>{{ $volunteer->email }}</td>
                            <td>{{ $volunteer->vaccine->name }}</td>
                            <td>{{ $volunteer->preferred_date }}</td>
                            <td>
                                <a class="btn btn-warning"
                                   href=" {{ route('volunteer.edit', ['id' => $volunteer->id ]) }}">{{ __('ui.generic.edit') }}</a>
                                <a class="btn btn-danger"
                                   href=" {{ route('volunteer.delete', ['id' => $volunteer->id ]) }}">{{ __('ui.generic.delete') }}</a
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('js')

    <script>

        $(document).ready( function () {
            $('#list-table').DataTable();
        } );

    </script>

@stop
