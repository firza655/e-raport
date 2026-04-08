@extends('layouts.admin')

@section('content')
<h3>Rapor Siswa: {{ $siswa->nama }} ({{ $siswa->kelas->nama_kelas ?? 'Kelas tidak tersedia' }})</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Mata Pelajaran</th>
            <th>Nilai</th>
        </tr>
    </thead>
    <tbody>
        @foreach($siswa->nilai as $index => $nilai)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $nilai->mapel->nama_mapel }}</td>
            <td>{{ $nilai->nilai }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
