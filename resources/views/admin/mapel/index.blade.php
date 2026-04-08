@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0 text-dark">Daftar Mata Pelajaran</h4>
        <a href="{{ route('admin.mapel.create') }}" class="btn btn-success btn-sm">
            <i class="bi bi-plus-circle"></i> Tambah Mapel
        </a>
    </div>

    <div class="card bg-dark text-white shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark table-striped mb-0">
                    <thead class="table-secondary text-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama Mapel</th>
                            <th class="text-center" style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mapels as $mapel)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $mapel->nama }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.mapel.edit', $mapel->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.mapel.destroy', $mapel->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus mapel ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">Belum ada data mata pelajaran.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
