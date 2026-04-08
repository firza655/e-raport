@extends('layouts.admin')

@section('content')
<h3>Daftar Siswa</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($siswas as $siswa)
        <tr>
            <td>{{ $siswa->nama }}</td>
            <td>{{ $siswa->kelas->nama_kelas ?? '-' }}</td>
            <td>
                <a href="{{ route('admin.rapor.show', $siswa->id) }}" class="btn btn-sm btn-primary">Lihat Rapor</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
