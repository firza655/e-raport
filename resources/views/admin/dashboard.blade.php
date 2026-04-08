@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">

    <!-- Welcome Message -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="p-4 rounded-4 shadow-sm text-white"
                 style="background: linear-gradient(to right, #4f46e5, #0ea5e9);">
                <h2 class="fw-bold mb-1">Hai, {{ Auth::user()->name }} 👋</h2>
                <p class="mb-0">Selamat datang di <strong>Dashboard Evaluasi Pembelajaran</strong>. Silakan kelola data di bawah ini.</p>
            </div>
        </div>
    </div>

    <!-- Statistik Kartu -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4 bg-white hover-lift">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-circle d-flex justify-content-center align-items-center shadow"
                         style="background-color: #38bdf8; width: 60px; height: 60px;">
                        <i class="bi bi-person-lines-fill fs-4 text-white"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total Siswa</h6>
                        <h4 class="fw-bold">{{ $totalSiswa }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4 bg-white hover-lift">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-circle d-flex justify-content-center align-items-center shadow"
                         style="background-color: #34d399; width: 60px; height: 60px;">
                        <i class="bi bi-person-badge-fill fs-4 text-white"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total Guru</h6>
                        <h4 class="fw-bold">{{ $totalGuru }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4 bg-white hover-lift">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-circle d-flex justify-content-center align-items-center shadow"
                         style="background-color: #fbbf24; width: 60px; height: 60px;">
                        <i class="bi bi-diagram-3-fill fs-4 text-white"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total Kelas</h6>
                        <h4 class="fw-bold">{{ $totalKelas }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Cards (Seperti sebelumnya) -->
    @php
        $menus = [
            ['title' => 'Data Siswa', 'desc' => 'Kelola siswa aktif', 'icon' => 'bi-person-lines-fill', 'bg' => '#38bdf8', 'route' => route('admin.siswa.index')],
            ['title' => 'Data Guru', 'desc' => 'Kelola guru & mapel', 'icon' => 'bi-person-badge-fill', 'bg' => '#34d399', 'route' => route('admin.guru.index')],
            ['title' => 'Data Kelas', 'desc' => 'Rombel & tingkat kelas', 'icon' => 'bi-diagram-3-fill', 'bg' => '#fbbf24', 'route' => route('admin.kelas.index')],
            ['title' => 'Mata Pelajaran', 'desc' => 'Daftar mapel sekolah', 'icon' => 'bi-journal-bookmark-fill', 'bg' => '#a78bfa', 'route' => route('admin.mapel.index')],
            ['title' => 'Pengguna', 'desc' => 'Akun login & role', 'icon' => 'bi-people-fill', 'bg' => '#f87171', 'route' => route('admin.user.index')],
        ];
    @endphp

    <div class="row g-4">
        @foreach($menus as $menu)
        <div class="col-12 col-sm-6 col-lg-4">
            <a href="{{ $menu['route'] }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm rounded-4 h-100 hover-lift" style="background-color: {{ $menu['bg'] }}1A;">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="rounded-circle d-flex justify-content-center align-items-center shadow"
                             style="background-color: {{ $menu['bg'] }}; width: 58px; height: 58px;">
                            <i class="bi {{ $menu['icon'] }} fs-4 text-white"></i>
                        </div>
                        <div>
                            <h5 class="fw-semibold mb-1 text-dark">{{ $menu['title'] }}</h5>
                            <small class="text-muted">{{ $menu['desc'] }}</small>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

<!-- Custom Style -->
<style>
    .hover-lift {
        transition: all 0.3s ease-in-out;
    }

    .hover-lift:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 20px rgba(0,0,0,0.1);
    }
</style>
@endsection
