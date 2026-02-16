@extends('layouts.auth')

@section('title', 'Admin Login - Dashboard')

@section('content')
<div class="login-container">
    <div class="login-card">
        <div class="login-header">
            <div class="login-logo">
                <i class="fas fa-shield-alt"></i>
            </div>
            <h1 class="login-title">Welcome</h1>
            <p class="login-subtitle">Sign in to access admin dashboard</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Login Failed!</strong> {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ url('/admin/login') }}">
            @csrf

            <div class="form-group">
                <label class="form-label" for="email">
                    <i class="fas fa-envelope"></i> Email Address
                </label>
                <div class="input-icon">
                    <i class="fas fa-user"></i>
                    <input 
                        type="email" 
                        name="email" 
                        id="email"
                        class="form-control" 
                        placeholder="admin@example.com"
                        value="{{ old('email') }}"
                        required 
                        autofocus
                    >
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="password">
                    <i class="fas fa-lock"></i> Password
                </label>
                <div class="input-icon">
                    <i class="fas fa-key"></i>
                    <input 
                        type="password" 
                        name="password" 
                        id="password"
                        class="form-control" 
                        placeholder="Enter your password"
                        required
                    >
                </div>
            </div>

            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>
        </form>

    </div>
</div>
@endsection
