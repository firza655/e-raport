@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fw-semibold mb-4">Edit Kelas</h2>

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

    <form action="{{ route('admin.kelas.update', $kelas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="tingkat" class="form-label">Tingkat</label>
            <input type="number" name="tingkat" id="tingkat" class="form-control"
                   value="{{ old('tingkat', $kelas->tingkat) }}" min="1" max="12" required>
        </div>

        <div class="mb-3">
            <label for="huruf" class="form-label">Huruf</label>
            <input type="text" name="huruf" id="huruf" class="form-control"
                   value="{{ old('huruf', $kelas->huruf) }}" maxlength="5" required>
        </div>

        <button type="submit" class="btn btn-gradient">
            <i class="bi bi-save me-1"></i> Update
        </button>
        <a href="{{ route('admin.kelas.index') }}" class="btn btn-secondary ms-2">Batal</a>
    </form>
</div>
@endsection
