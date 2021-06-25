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
            <p class="login-box-msg">{{ __('You forgot your password? Here you can easily retrieve a new password.') }}</p>
        
            <form action="{{ route('password.email') }}" method="post">
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
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Request new password') }}</button>
                    </div>
                </div>
            </form>
        
            <p class="mt-3 mb-1">
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
            </p>
            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">{{ __('Create an account') }}</a>
            </p>
        </div>
    </div>
</div>
@endsection
