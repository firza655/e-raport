@extends('layouts.loginsiswa')

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #ece9e6, #ffffff);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
        padding: 20px;
    }

    .login-wrapper {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        border-radius: 20px;
        padding: 40px 30px;
        max-width: 400px;
        width: 100%;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        animation: slideIn 0.6s ease;
        border: 1px solid rgba(255, 255, 255, 0.25);
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .login-logo {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        margin: 0 auto 15px;
        display: block;
        object-fit: cover;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }

    .login-title {
        font-size: 24px;
        font-weight: 700;
        text-align: center;
        background: linear-gradient(to right, #141e30, #243b55);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 10px;
    }

    .login-subtext {
        font-size: 0.9rem;
        color: #555;
        text-align: center;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 18px;
        position: relative;
        overflow: hidden;
    }

    .form-control {
        background: rgba(255, 255, 255, 0.8);
        border: none;
        border-radius: 12px;
        padding: 10px 14px 10px 40px;
        width: 100%;
        transition: all 0.3s ease-in-out;
        font-size: 0.9rem;
    }

    .form-control:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(36, 59, 85, 0.2);
    }

    .form-icon {
        position: absolute;
        top: 50%;
        left: 14px;
        transform: translateY(-50%);
        color: #444;
        font-size: 1rem;
    }

    .btn-login {
        width: 100%;
        border: none;
        padding: 12px;
        border-radius: 50px;
        font-weight: 600;
        background: linear-gradient(90deg, #141e30, #243b55);
        color: white;
        transition: all 0.3s ease-in-out;
    }

    .btn-login:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 18px rgba(36, 59, 85, 0.35);
    }

    .form-error {
        font-size: 0.8rem;
        color: red;
        margin-top: 5px;
        display: block;
    }

    .login-footer {
        font-size: 0.8rem;
        text-align: center;
        color: #666;
        margin-top: 25px;
    }
</style>
@endsection

@section('content')
<div class="login-wrapper">
    <img src="{{ asset('images/logo_3.png') }}" class="login-logo" alt="Logo">
    <div class="login-title">Login Siswa</div>
    <div class="login-subtext">Evaluasi Pembelajaran SDN Parung Serab</div>

    <form method="POST" action="{{ route('siswa.login.submit') }}">
        @csrf

        <div class="form-group">
            <i class="bi bi-envelope-fill form-icon"></i>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required>
            @error('email')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <i class="bi bi-lock-fill form-icon"></i>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Kata Sandi" required>
            @error('password')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn-login">Masuk</button>
    </form>

    <div class="login-footer">
        © {{ date('Y') }} E-Raport — SDN Parung Serab
    </div>
</div>
@endsection
