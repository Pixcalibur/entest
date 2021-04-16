@extends('layouts.main')

@section('body')

    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-6 mx-auto">
                <div class="container text-center">
                    <span class="text-uppercase">Érkezett vakcinák</span>
                    <span class="display-1">{{ $total }}</span>
                    <div>
                        <a href="{{ route('register') }}" type="button"
                           class="btn btn-lg btn-info text-uppercase">regisztráció</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

