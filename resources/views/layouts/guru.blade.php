<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Guru | Evaluasi Pembelajaran')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/lucide@0.265.0/dist/umd/lucide.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f1f5f9;
        }
        .sidebar {
            min-height: 100vh;
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(10px);
            color: white;
            transition: all 0.3s ease-in-out;
            border-right: 1px solid rgba(255,255,255,0.1);
        }
        .sidebar h4 {
            font-weight: 600;
        }
        .sidebar a {
            color: #cbd5e1;
            transition: 0.2s;
            border-radius: 0.5rem;
        }
        .sidebar a:hover,
        .sidebar .nav-link.active {
            background: linear-gradient(135deg, #0ea5e9, #3b82f6);
            color: white !important;
        }
        .topbar {
            background: white;
            border-bottom: 1px solid #e2e8f0;
        }
        .topbar h5 {
            font-weight: 600;
        }
        .btn-gradient {
            background: linear-gradient(135deg, #0ea5e9, #3b82f6);
            border: none;
            color: white;
            transition: all 0.2s;
        }
        .btn-gradient:hover {
            filter: brightness(1.1);
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="d-flex">
        {{-- Sidebar --}}
        <div class="sidebar p-4 col-md-3 col-lg-2 d-flex flex-column">
            <div class="mb-5 text-center">
                <img src="{{ asset('logo ubay.jpg') }}" alt="Logo" width="50" class="mb-2 rounded-circle">
                <h4>Evaluasi Pembelajaran</h4>
                <div class="text-muted small">Guru</div>
            </div>

            <ul class="nav flex-column flex-grow-1">
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex align-items-center gap-2 {{ request()->is('guru/dashboard') ? 'active' : '' }}"
                       href="{{ route('guru.dashboard') }}">
                        <i data-lucide="layout-dashboard" class="lucide"></i> Dashboard
                    </a>
                </li>

                <li class="nav-item mb-2">
                    <a class="nav-link d-flex align-items-center gap-2 {{ request()->is('guru/nilai*') ? 'active' : '' }}"
                       href="{{ route('guru.nilai.index') }}">
                        <i data-lucide="file-text" class="lucide"></i> Kelola Nilai
                    </a>
                </li>

                <li class="nav-item mb-2">
                    <a class="nav-link d-flex align-items-center gap-2 {{ request()->is('guru/siswa*') ? 'active' : '' }}"
                       href="{{ route('guru.siswa.index') }}">
                        <i data-lucide="users" class="lucide"></i> Data Siswa
                    </a>
                </li>
            </ul>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-light w-100 d-flex align-items-center gap-2">
                    <i data-lucide="log-out" class="lucide"></i> Logout
                </button>
            </form>
        </div>

        {{-- Main Content --}}
        <div class="flex-grow-1">
            <div class="topbar py-3 px-4 d-flex align-items-center justify-content-between shadow-sm">
                <h5>Halo, {{ Auth::guard('guru')->user()->nama ?? 'Guru' }}</h5>
            </div>

            <main class="p-4">
                @yield('content')
            </main>
        </div>
    </div>

    {{-- JS --}}
    <script src="https://cdn.jsdelivr.net/npm/lucide@0.265.0/dist/umd/lucide.min.js"></script>
    <script>
        lucide.createIcons();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
