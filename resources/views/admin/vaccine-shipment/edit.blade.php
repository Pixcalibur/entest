@extends('adminlte::page')

@section('title', __('title.vaccine-shipment.edit'))

@section('content_header')
    <div class="row">
        <div class="col-12">
            <h1>{{ __('title.vaccine-shipment.edit') }}</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('form.vaccine-shipment.title') }}</h3>
                    </div>
                    <form role="form" method="POST" action="{{ route('vaccine-shipment.update', ['id' => $model->id]) }}" autocomplete="off">
                        @method('PATCH')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="vaccine_type_id">{{ __('form.vaccine-shipment.field.type') }}</label>
                                <select class="select2 form-control" name="vaccine_type_id" id="vaccine_type_id">
                                    <option value="0">{{ __('form.generic.select_value') }}</option>
                                    @foreach($vaccineTypes as $vaccineType)
                                        <option value="{{ $vaccineType->id }}"
                                                @if(old('vaccine_type_id', $model->vaccine_type_id) === $vaccineType->id)
                                                    selected
                                                @endif
                                                >{{ $vaccineType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('vaccine_type_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="amount">{{ __('form.vaccine-shipment.field.amount') }}</label>
                                <input type="number" class="form-control" id="amount" name="amount"
                                       placeholder="{{ __('form.vaccine-shipment.placeholder.amount') }}"
                                       value="{{ old('amount', $model->amount) }}">
                            </div>
                            @error('amount')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="arrival_date">{{ __('form.vaccine-shipment.field.arrival_date') }}</label>
                                <input type="text" class="single-date-picker form-control" id="arrival_date" name="arrival_date"
                                       placeholder="{{ __('form.vaccine-shipment.placeholder.arrival_date') }}"
                                       value="{{ old('arrival_date', $model->arrival_date) }}">
                            </div>
                            @error('arrival_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="card-footer text-right">
                            <a class="btn btn-danger" href="{{ route('vaccine-shipment.list') }}">{{ __('form.generic.cancel') }}</a>
                            <button type="submit" class="btn btn-success">{{ __('form.generic.submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')

    <script>

        $(function() {
            $('.single-date-picker').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                autoApply: true,
                locale: {
                    format: 'YYYY-MM-DD',
                    firstDay: 0
                }
            });
            $('.select2').select2();
        });

    </script>

@endsection


