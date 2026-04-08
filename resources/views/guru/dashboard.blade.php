@extends('layouts.guru')

@section('title', 'Dashboard Guru')

@section('styles')
<style>
    .text-gradient {
        background: linear-gradient(to right, #00c6ff, #0072ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .dashboard-card {
        border-radius: 18px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: #fff;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
    }

    .icon-circle {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #00c6ff, #0072ff);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin: 0 auto 15px auto;
        font-size: 1.8rem;
        box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
    }

    .btn-gradient {
        background: linear-gradient(to right, #00c6ff, #0072ff);
        color: #fff;
        border: none;
    }

    .btn-gradient:hover {
        opacity: 0.9;
    }
</style>
@endsection

@section('content')
<div class="container py-5">
    <div class="mb-4 text-center">
        <h2 class="fw-bold text-gradient">Halo, {{ Auth::guard('guru')->user()->nama ?? 'Guru' }}!</h2>
        <p class="text-muted">Selamat datang di sistem Evaluasi Pembelajaran. Silakan pilih menu di bawah ini.</p>
    </div>

    <div class="row g-4 justify-content-center">
        <!-- Kelola Nilai -->
        <div class="col-md-4">
            <div class="card dashboard-card h-100 text-center p-4">
                <div class="icon-circle">
                    <i class="bi bi-clipboard-data"></i>
                </div>
                <h5 class="fw-bold">Kelola Nilai</h5>
                <p class="text-muted">Input dan edit nilai siswa untuk mata pelajaran yang Anda ampu.</p>
                <a href="{{ route('guru.nilai.index') }}" class="btn btn-gradient w-100 mt-2 rounded-pill">Lihat Nilai</a>
            </div>
        </div>

        <!-- Data Siswa -->
        <div class="col-md-4">
            <div class="card dashboard-card h-100 text-center p-4">
                <div class="icon-circle" style="background: linear-gradient(135deg, #36d1dc, #5b86e5);">
                    <i class="bi bi-people"></i>
                </div>
                <h5 class="fw-bold">Data Siswa</h5>
                <p class="text-muted">Pantau siswa yang Anda ajar berdasarkan kelas dan mata pelajaran.</p>
                <a href="{{ route('guru.siswa.index') }}" class="btn btn-outline-primary w-100 mt-2 rounded-pill">Lihat Siswa</a>
            </div>
        </div>
    </div>
</div>
@endsection
