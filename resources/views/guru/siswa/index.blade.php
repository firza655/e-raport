@extends('layouts.guru')

@section('title', 'Data Siswa')

@section('content')
<div class="container">
    <h2 class="mb-4 fw-semibold text-gradient">Data Siswa</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nama</th>
                    <th>NIS</th>
                    <th>Kelas</th>
                </tr>
            </thead>
            <tbody>
            @forelse($siswas as $siswa)
                <tr>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $siswa->kelas->nama ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">Belum ada data siswa.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
