@extends('layouts.guru')

@section('title', isset($siswa) ? 'Edit Siswa' : 'Tambah Siswa')

@section('content')
<div class="container">
    <h2 class="mb-4 fw-semibold text-gradient">
        {{ isset($siswa) ? 'Edit Siswa' : 'Tambah Siswa' }}
    </h2>

    <form action="{{ isset($siswa) ? route('guru.siswa.update', $siswa->id) : route('guru.siswa.store') }}" method="POST">
        @csrf
        @if(isset($siswa))
            @method('PUT')
        @endif

        {{-- Nama --}}
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Siswa</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $siswa->nama ?? '') }}" required>
        </div>

        {{-- NIS --}}
        <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="text" name="nis" class="form-control" value="{{ old('nis', $siswa->nis ?? '') }}" required>
        </div>

        {{-- Jenis Kelamin --}}
        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select" required>
                <option value="">-- Pilih --</option>
                <option value="Laki-laki" {{ old('jenis_kelamin', $siswa->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin', $siswa->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        {{-- Kelas --}}
        <div class="mb-3">
            <label for="kelas_id" class="form-label">Kelas</label>
            <select name="kelas_id" class="form-select" required>
                <option value="">-- Pilih Kelas --</option>
                @foreach($kelas as $k)
                    <option value="{{ $k->id }}" {{ old('kelas_id', $siswa->kelas_id ?? '') == $k->id ? 'selected' : '' }}>
                        {{ $k->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Alamat --}}
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $siswa->alamat ?? '') }}</textarea>
        </div>

        {{-- Tombol Submit --}}
        <button type="submit" class="btn btn-gradient mt-3">
            {{ isset($siswa) ? 'Update' : 'Simpan' }}
        </button>
    </form>
</div>
@endsection
