<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa - Evaluasi Pembelajaran</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons (opsional, jika ingin pakai ikon) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            min-height: 100vh;
            background-color: #003366;
            padding: 1.5rem 1rem;
        }

        .sidebar .nav-link {
            color: #fff;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #00509e;
            border-radius: 5px;
        }

        .content {
            padding: 2rem;
        }
    </style>

    @yield('styles')
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar">
                <h4 class="text-white mb-4">Evaluasi Pembelajaran</h4>
                <nav class="nav flex-column">
                    <a href="{{ route('siswa.dashboard') }}" class="nav-link {{ request()->routeIs('siswa.dashboard') ? 'active' : '' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('siswa.nilai') }}" class="nav-link {{ request()->routeIs('siswa.nilai') ? 'active' : '' }}">
                        Lihat Nilai
                    </a>
                    <a href="{{ route('siswa.rapor') }}" class="nav-link {{ request()->routeIs('siswa.rapor') ? 'active' : '' }}">
                        Hasil Evaluasi
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="mt-3">
                        @csrf
                        <button class="btn btn-light w-100" type="submit">Logout</button>
                    </form>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 content">
                @yield('content')
            </div>
        </div>
    </div>

    @yield('scripts')
</body>
</html>
