@extends('adminlte::page')

@section('title', __('title.volunteer.edit'))

@section('content_header')
    <div class="row">
        <div class="col-12">
            <h1>{{ __('title.volunteer.edit') }}</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('form.volunteer.title') }}</h3>
                    </div>
                    <form role="form" method="POST" action="{{ route('volunteer.update', ['id' => $model->id]) }}" autocomplete="off">
                        @method('PATCH')
                        @csrf
                        <input type="hidden" name="id" value="{{ $model->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="vaccine_type_id">{{ __('form.volunteer.field.type') }}</label>
                                <select class="select2 form-control" name="vaccine_type_id" id="vaccine_type_id">
                                    <option value="0">{{ __('form.generic.select_value') }}</option>
                                    @foreach($vaccineTypes as $vaccineType)

                                        <option value="{{ $vaccineType->id }}"
                                            @if(old('vaccine_type_id', $model->vaccine_type_id) === $vaccineType->id)
                                                selected
                                            @endif
                                        >{{ $vaccineType->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('vaccine_type_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">{{ __('form.volunteer.field.name') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" placeholder="{{ __('form.volunteer.placeholder.name') }}"
                                       value="{{ old('name', $model->name) }}">
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="email">{{ __('form.volunteer.field.email') }}</label>
                                <input type="email" class="form-control"
                                       id="email" name="email" placeholder="{{ __('form.volunteer.placeholder.email') }}"
                                       value="{{ old('email', $model->email) }}">

                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="preferred_date">{{ __('form.volunteer.field.preferred_date') }}</label>
                                <input type="text" class="single-date-picker form-control"
                                       id="preferred_date" name="preferred_date"
                                       placeholder="{{ __('form.volunteer.placeholder.preferred_date') }}"
                                       value="{{ old('preferred_date', $model->preferred_date) }}">
                            </div>
                            @error('preferred_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="card-footer text-right">
                            <a class="btn btn-danger" href="{{ route('volunteer.list') }}">{{ __('form.generic.cancel') }}</a>
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


