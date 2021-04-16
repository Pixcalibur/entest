@extends('adminlte::page')

@section('title', __('title.vaccine-shipment.list'))

@section('content_header')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-10">
            <h1>{{ __('title.vaccine-shipment.list') }}</h1>
        </div>
        <div class="col-2 text-right">
            <a class="btn btn-success" href="{{ route('vaccine-shipment.create') }}">
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
                <th>{{ __('form.vaccine-shipment.field.type') }}</th>
                <th>{{ __('form.vaccine-shipment.field.amount') }}</th>
                <th>{{ __('form.vaccine-shipment.field.arrival_date') }}</th>
                <th>{{ __('form.generic.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vaccineShipments as $vaccineShipment)
                <tr>
                    <td>{{ $vaccineShipment->type->name }}</td>
                    <td>{{ $vaccineShipment->amount }}</td>
                    <td>{{ $vaccineShipment->arrival_date }}</td>
                    <td>
                        <a class="btn btn-warning"
                           href=" {{ route('vaccine-shipment.edit', ['id' => $vaccineShipment->id ]) }}">{{ __('ui.generic.edit') }}</a>
                        <a class="btn btn-danger"
                           href=" {{ route('vaccine-shipment.delete', ['id' => $vaccineShipment->id ]) }}">{{ __('ui.generic.delete') }}</a
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
