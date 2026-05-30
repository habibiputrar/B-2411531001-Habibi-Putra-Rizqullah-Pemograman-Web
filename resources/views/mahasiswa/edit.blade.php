<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
</head>

<body>
    <h2>Edit Mahasiswa</h2>
    <form action="/mahasiswa/{{ $mahasiswa->id }}" method="POST">
        @csrf
        @method('PUT')
        <table cellpadding="8">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="{{ $mahasiswa->nama }}"></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim" value="{{ $mahasiswa->nim }}"></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="jurusan" value="{{ $mahasiswa->jurusan }}"></td>
            </tr>
            <tr>
                <td>Asal</td>
                <td><input type="text" name="asal" value="{{ $mahasiswa->asal }}"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Update</button>
                    <a href="/mahasiswa">Batal</a>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>