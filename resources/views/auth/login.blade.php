@extends('layouts.guest')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <x-application-logo width="220" height="50"/>
    </div>

    @if (session('success')) 
        <x-alert type="success">{{ session('success') }}</x-alert> 
    @endif

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">{{ __('Sign in to start your session') }}</p>
        
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <x-form.input 
                        type="email" 
                        name="email"
                        :placeholder="__('E-mail address')"
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
                        :placeholder="__('Password')" 
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
                        <x-form.button type="submit" class="btn-primary btn-block">{{ __('Log In') }}</x-form.button>
                    </div>
                </div>
            </form>
        
            <div class="social-auth-links text-center mb-3">
                <p>- {{ __('OR') }} -</p>

                <x-form.button type="submit" class="btn-primary btn-block">
                    <i class="fab fa-facebook mr-2"></i> {{ __('Sign in using Facebook') }}
                </x-form.button>

                <x-form.button type="submit" class="btn-danger btn-block">
                    <i class="fab fa-google-plus mr-2"></i> {{ __('Sign in using Google+') }}
                </x-form.button>
            </div>
        
            <p class="mb-1">
                <a href="{{ route('password.request') }}">{{ __('I forgot my password') }}</a>
            </p>
        
            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">{{ __('Create an account') }}</a>
            </p>
        </div>
    </div>
</div>
@endsection