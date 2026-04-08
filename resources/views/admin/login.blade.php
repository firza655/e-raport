@extends('layouts.guest')

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #74ebd5, #ACB6E5);
        min-height: 100vh;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-card {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        width: 100%;
        max-width: 420px;
        padding: 40px 30px;
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.25);
        animation: fadeIn 0.9s ease-in-out;
        transition: all 0.4s ease;
    }

    .login-logo {
        width: 90px;
        height: 90px;
        object-fit: contain;
        border-radius: 16px;
        margin-bottom: 20px;
        box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease;
    }

    .login-logo:hover {
        transform: scale(1.05);
    }

    .text-gradient {
        background: linear-gradient(90deg, #6a11cb, #2575fc);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 700;
        font-size: 1.8rem;
    }

    .stylish-input {
        border: none;
        background: rgba(255, 255, 255, 0.6);
        border-radius: 12px;
        padding: 12px 16px;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .stylish-input:focus {
        box-shadow: 0 0 0 3px rgba(106, 17, 203, 0.25);
        outline: none;
    }

    .btn-gradient {
        background: linear-gradient(90deg, #6a11cb, #2575fc);
        border: none;
        color: white;
        padding: 12px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .btn-gradient:hover {
        opacity: 0.92;
        transform: scale(1.03);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection

@section('content')
<div class="login-page">
    <div class="login-card text-center">
        <img src="{{ asset('images/logo_3.png') }}" class="login-logo" alt="e-Raport">
        <h2 class="text-gradient">SDN PARUNG SERAB</h2>
        <p class="text-muted small mb-4">Evaluasi Pembelajaran</p>

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            <div class="mb-3 text-start">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email"
                    class="form-control stylish-input @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" required placeholder="Masukkan email Anda">
                @error('email')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 text-start">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" id="password" name="password"
                    class="form-control stylish-input @error('password') is-invalid @enderror"
                    required placeholder="Masukkan kata sandi">
                @error('password')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check text-start">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">Ingat Saya</label>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-gradient btn-lg rounded-pill">Masuk</button>
            </div>
        </form>

        <div class="text-center text-muted small mt-3">
            © {{ date('Y') }} e-Raport. Semua Hak Dilindungi.
        </div>
    </div>
</div>
@endsection
