@extends('layouts.siswa')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Daftar Nilai</h4>
    
    @if($nilais->count())
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle text-center">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Mata Pelajaran</th>
                    <th>Semester</th>
                    <th>Tahun Ajaran</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nilais as $index => $nilai)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $nilai->mapel->nama ?? '-' }}</td>
                    <td>{{ $nilai->semester ?? '-' }}</td>
                    <td>{{ $nilai->tahun_ajaran ?? '-' }}</td>
                    <td>{{ $nilai->nilai }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <div class="alert alert-warning">Belum ada data nilai.</div>
    @endif
</div>
@endsection
