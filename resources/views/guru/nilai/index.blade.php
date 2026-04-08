@extends('layouts.guru')

@section('styles')
<style>
    .accordion-button:not(.collapsed) {
        background-color: #0f172a;
        color: white;
    }
    .btn-action {
        font-size: 0.875rem;
        padding: 4px 10px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <h4 class="mb-4 fw-semibold">📑 Data Nilai Siswa per Kelas</h4>

    <a href="{{ route('guru.nilai.create') }}" class="btn btn-gradient mb-3">
        <i data-lucide="plus-circle"></i> Tambah Nilai
    </a>

    <div class="accordion" id="accordionKelas">
        @foreach($nilaiGrouped as $namaKelas => $siswaGroup)
            @php $kelasId = 'kelas-' . \Str::slug($namaKelas); @endphp
            <div class="accordion-item mb-3">
                <h2 class="accordion-header" id="heading-{{ $kelasId }}">
                    <button class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapse-{{ $kelasId }}"
                        aria-expanded="false"
                        aria-controls="collapse-{{ $kelasId }}">
                        {{ $namaKelas }}
                    </button>
                </h2>
                <div id="collapse-{{ $kelasId }}" class="accordion-collapse collapse"
                    aria-labelledby="heading-{{ $kelasId }}"
                    data-bs-parent="#accordionKelas">
                    <div class="accordion-body">

                        {{-- Nested Accordion Siswa --}}
                        <div class="accordion" id="accordion-{{ $kelasId }}">
                            @foreach($siswaGroup as $namaSiswa => $nilais)
                                @php $siswaId = \Str::slug($kelasId . '-' . $namaSiswa); @endphp
                                <div class="accordion-item mb-2">
                                    <h2 class="accordion-header" id="heading-{{ $siswaId }}">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapse-{{ $siswaId }}"
                                            aria-expanded="false"
                                            aria-controls="collapse-{{ $siswaId }}">
                                            {{ $namaSiswa }}
                                        </button>
                                    </h2>
                                    <div id="collapse-{{ $siswaId }}" class="accordion-collapse collapse"
                                        aria-labelledby="heading-{{ $siswaId }}"
                                        data-bs-parent="#accordion-{{ $kelasId }}">
                                        <div class="accordion-body p-0">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover align-middle mb-0">
                                                    <thead class="table-light text-center">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Mata Pelajaran</th>
                                                            <th>Nilai</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($nilais as $index => $nilai)
                                                        <tr>
                                                            <td class="text-center">{{ $index + 1 }}</td>
                                                            <td>{{ $nilai->mapel->nama ?? '-' }}</td>
                                                            <td class="text-center">{{ $nilai->nilai }}</td>
                                                            <td class="text-center">
                                                                <a href="{{ route('guru.nilai.edit', $nilai->id) }}" class="btn btn-sm btn-primary btn-action">
                                                                    ✏️ Edit
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
 