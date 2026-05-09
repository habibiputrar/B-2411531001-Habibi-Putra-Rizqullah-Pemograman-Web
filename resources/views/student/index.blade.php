<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
</head>

<body>
    <h2>Informasi Mahasiswa</h2>
    <table border="1" cellpadding="8">
        <tr>
            <td>Nama</td>
            <td>{{ $student['nama'] }}</td>
        </tr>
        <tr>
            <td>NIM</td>
            <td>{{ $student['nim'] }}</td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td>{{ $student['jurusan'] }}</td>
        </tr>
        <tr>
            <td>Universitas</td>
            <td>{{ $student['universitas'] }}</td>
        </tr>
        <tr>
            <td>Asal</td>
            <td>{{ $student['asal'] }}</td>
        </tr>
    </table>
</body>

</html>