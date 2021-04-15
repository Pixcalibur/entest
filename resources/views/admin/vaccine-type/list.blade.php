@extends('adminlte::page')

@section('title', __('title.vaccine-type.list'))

@section('content_header')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-10">
            <h1>{{ __('title.vaccine-type.list') }}</h1>
        </div>
        <div class="col-2 text-right">
            <a class="btn btn-success" href="{{ route('vaccine-type.create') }}">
                <i class="fas fa-fw fa-plus"></i>
                {{ __('ui.generic.new') }}
            </a>
        </div>
    </div>
@stop

@section('content')
    <table class="table" id="list-table">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vaccineTypes as $vaccineType)
                <tr>
                    <td>{{ $vaccineType->id }}</td>
                    <td>{{ $vaccineType->name }}</td>
                    <td>
                        @if(null === $vaccineType->deleted_at)
                            <a class="btn btn-warning"
                               href=" {{ route('vaccine-type.edit', ['id' => $vaccineType->id ]) }}">{{ __('ui.generic.edit') }}</a>
                            <a class="btn btn-danger"
                               href=" {{ route('vaccine-type.delete', ['id' => $vaccineType->id ]) }}">{{ __('ui.generic.delete') }}</a
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('js')

    <script>

        $(document).ready( function () {
            $('#list-table').DataTable();
        } );

    </script>

@stop
