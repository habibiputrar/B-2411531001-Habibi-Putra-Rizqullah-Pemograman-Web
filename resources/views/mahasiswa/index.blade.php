<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
</head>

<body>
    <h2>Data Mahasiswa</h2>
    <a href="/mahasiswa/create">+ Tambah Mahasiswa</a>
    <br><br>
    <table border="1" cellpadding="8">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Asal</th>
            <th>Aksi</th>
        </tr>
        @foreach ($mahasiswas as $i => $mhs)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->nim }}</td>
                <td>{{ $mhs->jurusan }}</td>
                <td>{{ $mhs->asal }}</td>
                <td>
                    <a href="/mahasiswa/{{ $mhs->id }}/edit">Edit</a>
                    <form action="/mahasiswa/{{ $mhs->id }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>