
@extends('layouts.guest')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <x-application-logo width="220" height="50"/>
    </div>

    @if (session('error')) 
        <x-alert type="danger">{{ session('error') }}</x-alert> 
    @endif

    @if ($errors->any())
        <x-alert type="danger">{{ $errors->first() }}</x-alert>
    @endif

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">{{ __('Reset your password') }}</p>

            <form action="{{ route('password.update') }}" method="post">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <input type="hidden" name="email" value="{{ $request->email }}">

                <div class="input-group mb-3">
                    <x-form.input 
                        type="password" 
                        name="password"
                        :placeholder="__('Password')"
                        icon="fa-lock"
                        required
                        autofocus
                        :hasError="false"
                    />
                </div>

                <div class="input-group mb-3">
                    <x-form.input 
                        type="password" 
                        name="password_confirmation"
                        :placeholder="__('Confirm your password')"
                        icon="fa-lock"
                        required
                        :hasError="false"
                    />
                </div>

                <div class="col-4">
                    <x-form.button type="submit" class="btn-primary btn-block">{{ __('Send') }}</x-form.button>
                </div>
            </form>
        </div>        
    </div>        
</div>        
@endsection