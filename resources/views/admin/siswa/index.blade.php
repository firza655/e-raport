@extends('layouts.app')

@section('title', 'Kelola Siswa')

@section('content')
<div class="container-fluid">
    <h4 class="mb-4 fw-bold">Kelola Data Siswa</h4>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="mb-3 text-end">
        <a href="{{ route('admin.siswa.create') }}" class="btn btn-sm btn-gradient">
            <i class="bi bi-plus-circle me-1"></i> Tambah Siswa
        </a>
    </div>

    <div class="table-responsive shadow-sm rounded bg-white p-3">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>NISN</th>
                    <th>Kelas</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($siswas as $siswa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $siswa->user?->email ?? '-' }}</td>
                        <td>{{ $siswa->nis ?? '-' }}</td>
                        <td>{{ $siswa->kelas ? $siswa->kelas->tingkat . $siswa->kelas->huruf : '-' }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.siswa.edit', $siswa->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('admin.siswa.destroy', $siswa->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus siswa ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada data siswa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
