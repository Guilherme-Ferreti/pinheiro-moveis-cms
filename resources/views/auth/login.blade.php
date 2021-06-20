@extends('layouts.guest')

@section('content')
<div class="card-body login-card-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <x-form.input 
                type="email" 
                name="email"
                placeholder="E-mail address"
                :value="old('email')"
                icon="fa-envelope"
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
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">
                    Remember Me
                </label>
                </div>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Log In</button>
            </div>
        </div>
    </form>

    <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
    </div>

    <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
    </p>

    <p class="mb-0">
        <a href="register.html" class="text-center">Create an account</a>
    </p>
</div>
@endsection