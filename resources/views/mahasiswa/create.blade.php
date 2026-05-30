<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
</head>

<body>
    <h2>Tambah Mahasiswa</h2>
    <form action="/mahasiswa" method="POST">
        @csrf
        <table cellpadding="8">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim"></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="jurusan"></td>
            </tr>
            <tr>
                <td>Asal</td>
                <td><input type="text" name="asal"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Simpan</button>
                    <a href="/mahasiswa">Batal</a>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>