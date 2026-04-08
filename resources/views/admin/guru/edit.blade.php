@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fw-semibold mb-4">Edit Data Guru</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.guru.update', $guru->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $guru->nama) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email', $guru->email) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" name="nip" value="{{ old('nip', $guru->nip) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" value="{{ old('alamat', $guru->alamat) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="mapels" class="form-label">Mata Pelajaran</label>
            <select name="mapels[]" class="form-select" multiple required>
                @foreach($mapels as $mapel)
                    <option value="{{ $mapel->id }}" 
                        {{ in_array($mapel->id, old('mapels', $guru->mapels->pluck('id')->toArray())) ? 'selected' : '' }}>
                        {{ $mapel->nama }}
                    </option>
                @endforeach
            </select>
            <small class="text-muted">Gunakan CTRL (Windows) / CMD (Mac) untuk memilih lebih dari satu.</small>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password (Kosongkan jika tidak ingin diubah)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
