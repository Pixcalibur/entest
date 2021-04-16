@extends('layouts.main')

@section('body')

    <div class="container">
        <div class="container vh-100">
            <div class="row align-items-center h-100">
                <div class="col-6 mx-auto">
                    <div class="card">
                        <article class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">{{ __('email') }}</label>
                                    <input id="email" name="email" class="form-control" placeholder="Email" type="email">
                                </div> <!-- form-group// -->
                                <div class="form-group">
                                    <label for="password">{{ __('password') }}</label>
                                    <input id="password" name="password" class="form-control" placeholder="******" type="password">
                                </div> <!-- form-group// -->
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label> <input name="remember" type="checkbox"> {{ __('Remember me') }} </label>
                                    </div> <!-- checkbox .// -->
                                </div> <!-- form-group// -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Login</button>
                                </div> <!-- form-group// -->
                            </form>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
