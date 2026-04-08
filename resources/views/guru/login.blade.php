@extends('layouts.loginguru')

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        color: #fff;
    }

    .login-card {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 20px;
        padding: 40px 35px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(10px);
        width: 100%;
        max-width: 420px;
        text-align: center;
    }

    .login-logo {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 50%;
        background: #fff;
        padding: 6px;
        box-shadow: 0 4px 15px rgba(255, 255, 255, 0.2);
        margin-bottom: 20px;
    }

    h2 {
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 5px;
    }

    .subtext {
        font-size: 14px;
        color: #ccc;
        margin-bottom: 25px;
    }

    .input-group {
        background: rgba(255, 255, 255, 0.08);
        border-radius: 12px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        overflow: hidden;
    }

    .input-group-text {
        background: transparent;
        border: none;
        color: #fff;
        padding: 10px 14px;
        font-size: 1.2rem;
    }

    .form-control {
        background: transparent;
        border: none;
        color: #fff;
        padding: 12px;
    }

    .form-control::placeholder {
        color: #bbb;
    }

    .btn-login {
        background: linear-gradient(to right, #00c6ff, #0072ff);
        border: none;
        color: #fff;
        font-weight: 600;
        border-radius: 50px;
        padding: 12px;
        transition: 0.3s ease-in-out;
    }

    .btn-login:hover {
        transform: scale(1.03);
        box-shadow: 0 0 12px rgba(0, 114, 255, 0.5);
    }

    .error-message {
        background-color: rgba(255, 0, 0, 0.15);
        padding: 10px;
        border-radius: 8px;
        color: #fff;
        font-size: 14px;
        margin-bottom: 15px;
    }

    .footer-text {
        font-size: 12px;
        color: #ccc;
        margin-top: 25px;
    }
</style>
@endsection

@section('content')
<div class="login-card">
    <img src="{{ asset('images/logo_3.png') }}" alt="Logo" class="login-logo">
    <h2>Login Guru</h2>
    <div class="subtext">Sistem Penilaian Digital</div>

    <form action="{{ route('guru.login.submit') }}" method="POST">
        @csrf

        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>

        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        @if($errors->any())
            <div class="error-message">
                {{ $errors->first() }}
            </div>
        @endif

        <button type="submit" class="btn btn-login w-100 mt-2">Masuk</button>
    </form>

    <div class="footer-text">
        © {{ date('Y') }} e-Raport Guru — All rights reserved.
    </div>
</div>
@endsection
