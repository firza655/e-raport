<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'e-Raport') }}</title>

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6fa;
            color: #333;
            margin: 0;
        }

        .navbar {
            background: linear-gradient(to right, #4f46e5, #0ea5e9);
            color: white;
            z-index: 1000;
        }

        .navbar .navbar-brand,
        .navbar span {
            color: white !important;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: white;
            position: fixed;
            top: 0;
            left: 0;
            border-right: 1px solid #e0e0e0;
            padding-top: 70px;
            overflow-y: auto;
        }

        .sidebar .nav-link {
            color: #333;
            padding: 14px 20px;
            font-weight: 500;
            border-left: 4px solid transparent;
            transition: 0.3s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #f0f4ff;
            color: #4f46e5 !important;
            border-left: 4px solid #4f46e5;
            border-radius: 0 8px 8px 0;
        }

        .sidebar .nav-item small {
            color: #888;
        }

        .content {
            margin-left: 250px;
            padding: 2rem;
            padding-top:80px;
        }

        .footer {
            background-color: #ffffff;
            border-top: 1px solid #e0e0e0;
            padding: 1rem;
            text-align: center;
            font-size: 0.9rem;
            color: #777;
            margin-top: 2rem;
        }

        .btn-gradient {
            background: linear-gradient(to right, #38bdf8, #6366f1);
            color: white;
            border: none;
        }

        .btn-gradient:hover {
            background: linear-gradient(to right, #0ea5e9, #4f46e5);
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

@php
    $admin = auth('admin')->user();
    $guru  = auth('guru')->user();
    $siswa = auth('siswa')->user();

    $dashboardRoute = $admin ? route('admin.dashboard') : ($guru ? route('guru.dashboard') : ($siswa ? route('siswa.dashboard') : url('/')));
@endphp

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top shadow-sm py-2 px-4">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a class="navbar-brand fw-semibold" href="#">Evaluasi Pembelajaran</a>
        <div class="d-flex align-items-center gap-3">
            <span>{{ $admin->name ?? $guru->name ?? $siswa->name ?? 'Guest' }}</span>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            <button class="btn btn-sm btn-light rounded-circle" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Logout">
                <i class="bi bi-box-arrow-right text-danger"></i>
            </button>
        </div>
    </div>
</nav>

<!-- Sidebar -->
<div class="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ $dashboardRoute }}" class="nav-link {{ request()->routeIs('*.dashboard') ? 'active' : '' }}">
                <i class="bi bi-house-door-fill me-2"></i> Dashboard
            </a>
        </li>

        @if($admin)
            <li class="nav-item px-3 mt-4 mb-1 text-uppercase small">Kelola Data</li>
            <li class="nav-item"><a href="{{ route('admin.user.index') }}" class="nav-link {{ request()->routeIs('admin.user.*') ? 'active' : '' }}"><i class="bi bi-people-fill me-2"></i> User</a></li>
            <li class="nav-item"><a href="{{ route('admin.guru.index') }}" class="nav-link {{ request()->routeIs('admin.guru.*') ? 'active' : '' }}"><i class="bi bi-person-badge-fill me-2"></i> Guru</a></li>
            <li class="nav-item"><a href="{{ route('admin.siswa.index') }}" class="nav-link {{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}"><i class="bi bi-person-lines-fill me-2"></i> Siswa</a></li>
            <li class="nav-item"><a href="{{ route('admin.kelas.index') }}" class="nav-link {{ request()->routeIs('admin.kelas.*') ? 'active' : '' }}"><i class="bi bi-diagram-3-fill me-2"></i> Kelas</a></li>
            <li class="nav-item"><a href="{{ route('admin.mapel.index') }}" class="nav-link {{ request()->routeIs('admin.mapel.*') ? 'active' : '' }}"><i class="bi bi-journal-bookmark-fill me-2"></i> Mata Pelajaran</a></li>

        @elseif($guru)
            <li class="nav-item px-3 mt-4 mb-1 text-uppercase small">Guru</li>
            <li class="nav-item"><a href="{{ route('guru.nilai.index') }}" class="nav-link {{ request()->routeIs('guru.nilai.*') ? 'active' : '' }}"><i class="bi bi-pencil-square me-2"></i> Input Nilai</a></li>

        @elseif($siswa)
            <li class="nav-item px-3 mt-4 mb-1 text-uppercase small">Siswa</li>
            <li class="nav-item"><a href="{{ route('siswa.nilai') }}" class="nav-link {{ request()->routeIs('siswa.nilai') ? 'active' : '' }}"><i class="bi bi-graph-up-arrow me-2"></i> Lihat Nilai</a></li>
        @endif
    </ul>
</div>

<!-- Content -->
<div class="content">
    @yield('content')
</div>

<!-- Footer -->
<footer class="footer">
    <small>© {{ date('Y') }} Evaluasi Pembelajaran. Semua Hak Dilindungi.</small>
</footer>

</body>
</html>
