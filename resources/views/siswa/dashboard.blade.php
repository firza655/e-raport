@extends('layouts.siswa')

@section('title', 'Dashboard Siswa')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<style>
    body {
        background: #f4f7fa;
    }

    .dashboard-title {
        font-size: 1.8rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        background: linear-gradient(90deg, #0d6efd, #6610f2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .info-card {
        border: none;
        border-radius: 1rem;
        background: white;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        transition: 0.3s ease;
        padding: 1.5rem;
        height: 100%;
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
    }

    .icon-wrapper {
        background: #0d6efd;
        color: white;
        border-radius: 50%;
        width: 55px;
        height: 55px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        margin-bottom: 1rem;
    }

    .info-label {
        font-size: 0.95rem;
        color: #6c757d;
    }

    .info-value {
        font-size: 1.2rem;
        font-weight: 600;
    }

    .raport-btn {
        background: linear-gradient(to right, #0d6efd, #6610f2);
        border: none;
        padding: 0.5rem 1rem;
        color: white;
        font-weight: 500;
        border-radius: 30px;
        transition: background 0.3s;
    }

    .raport-btn:hover {
        background: linear-gradient(to right, #6610f2, #0d6efd);
    }
</style>
@endsection

@section('content')
<div class="container py-4">
    <h3 class="dashboard-title">Selamat Datang, {{ $siswa->nama ?? 'Siswa' }}</h3>

    <div class="row g-4">
        <!-- Nama -->
        <div class="col-md-4">
            <div class="info-card text-center">
                <div class="icon-wrapper mx-auto">
                    <i class="bi bi-person-circle"></i>
                </div>
                <div class="info-label">Nama Lengkap</div>
                <div class="info-value">{{ $siswa->nama ?? '-' }}</div>
            </div>
        </div>

        <!-- Kelas -->
        <div class="col-md-4">
            <div class="info-card text-center">
                <div class="icon-wrapper mx-auto" style="background: #20c997;">
                    <i class="bi bi-diagram-3"></i>
                </div>
                <div class="info-label">Kelas</div>
                <div class="info-value">{{ $siswa->kelas->tingkat ?? '' }} {{ $siswa->kelas->huruf ?? '' }}</div>
            </div>
        </div>

        <!-- Nilai / Raport -->
        <div class="col-md-4">
            <div class="info-card text-center">
                <div class="icon-wrapper mx-auto" style="background: #ffc107; color: #212529;">
                    <i class="bi bi-journal-text"></i>
                </div>
                <div class="info-label">Lihat Nilai</div>
                <a href="{{ route('siswa.nilai') }}" class="raport-btn mt-2">📄 Lihat Evaluasi pembelajaran</a>
            </div>
        </div>
    </div>
</div>
@endsection
