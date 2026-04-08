<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Evaluasi Pembelajaran - {{ $siswa->nama }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: center; }
    </style>
</head>
<body>
    <h2>Evaluasi Pembelajaran</h2>
    <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
    <p><strong>NIS:</strong> {{ $siswa->nis }}</p>
    <p><strong>Kelas:</strong> {{ $siswa->kelas->nama ?? '-' }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Mata Pelajaran</th>
                <th>Semester</th>
                <th>Tahun Ajaran</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nilais as $i => $nilai)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $nilai->mapel->nama ?? '-' }}</td>
                    <td>{{ $nilai->semester }}</td>
                    <td>{{ $nilai->tahun_ajaran }}</td>
                    <td>{{ $nilai->nilai }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
