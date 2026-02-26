<!DOCTYPE html>
<html>

<head>
    <title>Praktikum Web Programming</title>
</head>

<body>
    <h1>Hello World!</h1>
    <?php
    echo "<p>Ini adalah script PHP pertama saya</p>";

    // Variabel
    $name = "Habibi Putra Rizqullah";
    $npm = "2411531001";

    // Output dengan concatenation
    echo "<p>Nama saya: $name </p>";
    echo "<p>NPM: " . $npm . "</p>";

    // Fungsi date()
    echo "<p>Hari ini: " . date("d-m-Y") . "</p>";
    ?>
</body>

</html>