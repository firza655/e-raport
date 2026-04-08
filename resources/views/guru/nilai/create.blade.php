@extends('layouts.guru')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-semibold">Input Nilai Siswa</h4>
        <a href="{{ route('guru.nilai.index') }}" class="btn btn-outline-primary">
            <i data-lucide="arrow-left"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada masalah pada input.<br><br>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('guru.nilai.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="siswa_id" class="form-label">Nama Siswa</label>
            <select name="siswa_id" id="siswa_id" class="form-select" required>
                <option disabled selected>Pilih Siswa</option>
                @foreach ($siswas as $s)
                    <option value="{{ $s->id }}">{{ $s->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="mapel_id" class="form-label">Mata Pelajaran</label>
            <select name="mapel_id" id="mapel_id" class="form-select" required>
                <option disabled selected>Pilih Mapel</option>
                @foreach ($mapels as $m)
                    <option value="{{ $m->id }}">{{ $m->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nilai" class="form-label">Nilai</label>
            <input type="number" name="nilai" id="nilai" class="form-control" placeholder="0-100" min="0" max="100" required>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-gradient">
                <i data-lucide="check-circle"></i> Simpan Nilai
            </button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    lucide.createIcons();
</script>
@endsection
