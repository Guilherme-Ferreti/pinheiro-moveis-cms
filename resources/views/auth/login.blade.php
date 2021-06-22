@extends('layouts.guest')

@section('content')
<div class="card-body login-card-body">
    <p class="login-box-msg">{{ __('Sign in to start your session') }}</p>

    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <x-form.input 
                type="email" 
                name="email"
                placeholder="E-mail address"
                icon="fa-envelope"
                :value="old('email')"
                required
                autofocus
            />
        </div>
        <div class="input-group mb-3">
            <x-form.input 
                type="password" 
                name="password" 
                placeholder="Password" 
                icon="fa-lock"
                required
            />
        </div>
        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember" @if (old('remember')) checked @endif />
                <label for="remember">
                    {{ __('Remember Me') }}
                </label>
                </div>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">{{ __('Log In') }}</button>
            </div>
        </div>
    </form>

    <div class="social-auth-links text-center mb-3">
        <p>- {{ __('OR') }} -</p>
        <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> {{ __('Sign in using Facebook') }}
        </a>
        <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> {{ __('Sign in using Google+') }}
        </a>
    </div>

    <p class="mb-1">
        <a href="forgot-password.html">{{ __('I forgot my password') }}</a>
    </p>

    <p class="mb-0">
        <a href="register.html" class="text-center">{{ __('Create an account') }}</a>
    </p>
</div>
@endsection