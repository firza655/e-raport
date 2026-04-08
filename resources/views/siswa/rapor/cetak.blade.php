<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Evaluasi Pembelajaran</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 12px;
            color: #000;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 80px;
            margin-right: 20px;
        }

        h2 {
            margin: 0;
            font-size: 18px;
        }

        .info {
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table, th, td {
            border: 1px solid #000;
        }

        th, td {
            padding: 6px;
            text-align: center;
        }

        .text-left {
            text-align: left;
        }

        .footer {
            margin-top: 50px;
            width: 100%;
        }

        .footer-table {
            width: 100%;
            text-align: center;
        }

        .footer-table td {
            padding: 20px;
        }

        .ttd-space {
            height: 60px;
        }

        .keterangan {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    {{-- Logo dan Judul --}}
    <div class="header">
        <img src="{{ public_path('images/logo_3.png') }}" alt="Logo Sekolah" class="logo">
        <div>
            <h2>Evaluasi Pembelajaran</h2>
            <p>Tahun Ajaran {{ $nilais->first()->tahun_ajaran ?? '-' }}</p>
        </div>
    </div>

    {{-- Informasi Siswa --}}
    <div class="info">
        <strong>Nama:</strong> {{ $siswa->nama }}<br>
        <strong>NIS:</strong> {{ $siswa->nis }}<br>
        <strong>Kelas:</strong> {{ $siswa->kelas->nama ?? '-' }}
    </div>

    {{-- Tabel Nilai --}}
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th class="text-left">Mata Pelajaran</th>
                <th>Semester</th>
                <th>Tahun Ajaran</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nilais as $i => $nilai)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td class="text-left">{{ $nilai->mapel->nama ?? '-' }}</td>
                <td>{{ $nilai->semester }}</td>
                <td>{{ $nilai->tahun_ajaran }}</td>
                <td>{{ $nilai->nilai }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Keterangan Rata-rata dan Status --}}
    @php
        $rataRata = $nilais->avg('nilai');
        $status = $rataRata >= 75 ? 'Naik Kelas' : 'Tinggal Kelas';
    @endphp

    <div class="keterangan">
        <p><strong>Rata-rata Nilai:</strong> {{ number_format($rataRata, 2) }}</p>
        <p><strong>Status:</strong> {{ $status }}</p>
    </div>

    {{-- Tanda Tangan --}}
    <div class="footer">
        <table class="footer-table">
            <tr>
                <td>Wali Kelas</td>
                <td>Orang Tua / Wali</td>
                <td>{{ now()->translatedFormat('d F Y') }}<br>Kepala Sekolah</td>
            </tr>
            <tr class="ttd-space">
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>__________________</td>
                <td>__________________</td>
                <td>__________________</td>
            </tr>
        </table>
    </div>

</body>
</html>
