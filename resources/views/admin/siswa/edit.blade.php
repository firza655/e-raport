@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fw-semibold mb-4">Edit Siswa</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (isset($siswa))
        <form action="{{ route('admin.siswa.update', $siswa->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Siswa</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $siswa->nama) }}" required>
            </div>

            <div class="mb-3">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" name="nis" id="nis" class="form-control" value="{{ old('nis', $siswa->nis) }}" required>
            </div>

            <div class="mb-3">
                <label for="kelas_id" class="form-label">Kelas</label>
                <select name="kelas_id" id="kelas_id" class="form-select" required>
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($kelas as $k)
                        <option value="{{ $k->id }}" {{ $siswa->kelas_id == $k->id ? 'selected' : '' }}>
                            {{ $k->tingkat }}{{ $k->huruf }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Siswa</label>
                <input type="email" name="email" id="email" class="form-control"
                    value="{{ old('email', $siswa->user->email ?? '') }}">
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Update
            </button>
            <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary ms-2">Batal</a>
        </form>
    @else
        <div class="alert alert-warning">Data siswa tidak ditemukan.</div>
    @endif
</div>
@endsection
