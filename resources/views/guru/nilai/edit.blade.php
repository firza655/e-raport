@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Edit Nilai</h4>
    <form action="{{ route('guru.nilai.update', $nilai->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="mapel_id" class="form-label">Mata Pelajaran</label>
            <select name="mapel_id" id="mapel_id" class="form-select" required>
                @foreach($mapels as $mapel)
                    <option value="{{ $mapel->id }}" {{ $mapel->id == $nilai->mapel_id ? 'selected' : '' }}>
                        {{ $mapel->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nilai" class="form-label">Nilai</label>
            <input type="number" name="nilai" class="form-control" value="{{ $nilai->nilai }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
