@extends('adminlte::page')

@section('title', __('title.vaccine-type.edit'))

@section('content_header')
    <div class="row">
        <div class="col-12">
            <h1>{{ __('title.vaccine-type.edit') }}</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('form.vaccine-type.title') }}</h3>
                    </div>
                    <form role="form" method="POST" action="{{ route('vaccine-type.update', ['id' => $model->id]) }}" autocomplete="off">
                        @method('PATCH')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">{{ __('form.vaccine-type.field.name') }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="{{ __('form.vaccine-type.placeholder.name') }}"
                                       value="{{ old('name', $model->name) }}">
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a class="btn btn-danger" href="{{ route('vaccine-type.list') }}">{{ __('form.generic.cancel') }}</a>
                            <button type="submit" class="btn btn-success">{{ __('form.generic.submit') }}</button>
                        </div>
                    </form>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
@stop


