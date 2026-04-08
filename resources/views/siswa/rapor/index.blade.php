@extends('layouts.siswa')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Evaluasi Pembelajaran</h3>

    {{-- Identitas Siswa --}}
    <div class="mb-3">
        <strong>Nama:</strong> {{ $user->nama }}<br>
        <strong>NIS:</strong> {{ $user->nis ?? '-' }}<br>
        <strong>Kelas:</strong> {{ $user->kelas->nama ?? '-' }}
    </div>

    {{-- Tabel Nilai --}}
    <div class="table-responsive">
        <table class="table table-bordered mt-3">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Mata Pelajaran</th>
                    <th>Semester</th>
                    <th>Tahun Ajaran</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                @forelse($nilais as $i => $nilai)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $nilai->mapel->nama ?? '-' }}</td>
                    <td>{{ $nilai->semester }}</td>
                    <td>{{ $nilai->tahun_ajaran }}</td>
                    <td>{{ $nilai->nilai }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data nilai.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Keterangan --}}
    <div class="mt-4">
        <h5>Keterangan</h5>
        <p><strong>Rata-rata Nilai:</strong> {{ number_format($rataRata, 2) }}</p>
        <p><strong>Status:</strong> {{ $status }}</p>
    </div>

    {{-- Tombol Cetak --}}
    <div class="mt-3">
        <a href="{{ route('siswa.rapor.cetak') }}" class="btn btn-primary" target="_blank">
            <i class="bi bi-printer"></i> Cetak Rapor PDF
        </a>
    </div>
</div>
@endsection
