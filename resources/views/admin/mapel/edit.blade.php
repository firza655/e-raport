@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fw-semibold mb-4">Edit Mata Pelajaran</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.mapel.update', $mapel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Mapel</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $mapel->nama) }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.mapel.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
