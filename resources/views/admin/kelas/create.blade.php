@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fw-semibold mb-4">Tambah Kelas</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.kelas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="tingkat" class="form-label">Tingkat</label>
            <input type="number" name="tingkat" id="tingkat" class="form-control" min="1" max="12" value="{{ old('tingkat') }}" required>
        </div>

        <div class="mb-3">
            <label for="huruf" class="form-label">Huruf</label>
            <input type="text" name="huruf" id="huruf" class="form-control" maxlength="5" value="{{ old('huruf') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.kelas.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
