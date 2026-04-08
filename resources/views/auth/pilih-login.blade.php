@extends('layouts.pilihlogin')

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(to right, #141e30, #243b55);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        margin: 0;
    }

    .login-wrapper {
        text-align: center;
    }

    .login-title {
        margin-bottom: 30px;
        font-size: 24px;
        font-weight: 600;
    }

    .login-cards {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .login-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        width: 200px;
        padding: 25px 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-decoration: none;
        color: #fff;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .login-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }

    .login-card svg {
        width: 40px;
        height: 40px;
        margin-bottom: 15px;
    }

    .login-card span {
        font-size: 16px;
        font-weight: 500;
    }
</style>
@endsection

@section('content')
<div class="login-wrapper">
    <h2 class="login-title">Pilih Login Sebagai</h2>

    <div class="login-cards">
        <!-- Admin Card -->
        <a href="{{ route('admin.login') }}" class="login-card">
            <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 0115 0v.75H4.5v-.75z" />
            </svg>
            <span>Login Admin</span>
        </a>

        <!-- Guru Card -->
        <a href="{{ route('guru.login') }}" class="login-card">
            <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 14l9-5-9-5-9 5 9 5z" />
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 14l6.16-3.422A12.083 12.083 0 0118 20.25H6a12.083 12.083 0 01-.16-9.672L12 14z" />
            </svg>
            <span>Login Guru</span>
        </a>

        <!-- Siswa Card -->
        <a href="{{ route('siswa.login') }}" class="login-card">
            <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6.75c-3.107 0-6.75 1.51-6.75 4.5s3.643 4.5 6.75 4.5 6.75-1.51 6.75-4.5-3.643-4.5-6.75-4.5z" />
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 15.75v1.5M9 21h6" />
            </svg>
            <span>Login Wali Siswa</span>
        </a>
    </div>
</div>
@endsection
