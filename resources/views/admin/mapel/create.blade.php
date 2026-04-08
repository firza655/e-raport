@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Tambah Mapel</h3>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.mapel.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kode" class="form-label">Kode Mapel</label>
            <input type="text" name="kode" class="form-control" id="kode" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Mapel</label>
            <input type="text" name="nama" class="form-control" id="nama" required>
        </div>

        <div class="mb-3">
            <label for="guru_id" class="form-label">Guru Pengampu</label>
            <select name="guru_id" class="form-select" id="guru_id" required>
                <option value="">-- Pilih Guru --</option>
                @foreach($gurus as $guru)
                    <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
