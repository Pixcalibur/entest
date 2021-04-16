@extends('layouts.main')

@push('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
@endpush

@push('js')
    <script src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
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
@endpush

@section('body')

    <div class="container">
        <h1>Regisztráció</h1>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <form id="volunteer-form" role="form" method="POST" action="{{ route('volunteer') }}" autocomplete="off">
                        @method('PUT')
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="vaccine_type_id">{{ __('form.volunteer.field.type') }}</label>
                                <select class="select2 form-control @error('vaccine_type_id') is-invalid @enderror" name="vaccine_type_id" id="vaccine_type_id">
                                    <option value="0">{{ __('form.generic.select_value') }}</option>
                                    @foreach($vaccineTypes as $vaccineType)
                                        <option value="{{ $vaccineType->id }}">{{ $vaccineType->name }}</option>
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
                                       id="name" name="name" placeholder="{{ __('form.volunteer.placeholder.name') }}">
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="email">{{ __('form.volunteer.field.email') }}</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       id="email" name="email" placeholder="{{ __('form.volunteer.placeholder.email') }}">
                            </div>
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="preferred_date">{{ __('form.volunteer.field.preferred_date') }}</label>
                                <input type="text" class="single-date-picker form-control @error('preferred_date') is-invalid @enderror"
                                       id="preferred_date" name="preferred_date" placeholder="{{ __('form.volunteer.placeholder.preferred_date') }}">
                            </div>
                            @error('preferred_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-success">{{ __('form.generic.send') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
