<?php
$data = [
    "name" => "Budi Santoso",
    "nim" => "TI12345",
    "major" => "Teknik Informatika",
    "semester" => 3,
    "subjects" => [
        [
            "code" => "IF2101",
            "name" => "Pemrograman Web",
            "sks" => 3,
            "grades" => ["assigment" => 85, "uts" => 78, "uas" => 88]
        ],
        [
            "code" => "IF2102",
            "name" => "Algoritma dan Struktur Data",
            "sks" => 4,
            "grades" => ["assigment" => 90, "uts" => 85, "uas" => 82]
        ],
        [
            "code" => "IF2103",
            "name" => "Basis Data",
            "sks" => 3,
            "grades" => ["assigment" => 78, "uts" => 75, "uas" => 80]
        ],
        [
            "code" => "IF2104",
            "name" => "Jaringan Komputer",
            "sks" => 3,
            "grades" => ["assigment" => 88, "uts" => 70, "uas" => 75]
        ],
        [
            "code" => "IF2105",
            "name" => "Sistem Operasi",
            "sks" => 3,
            "grades" => ["assigment" => 95, "uts" => 90, "uas" => 92]
        ],
        [
            "code" => "IF2106",
            "name" => "Matematika Diskrit",
            "sks" => 2,
            "grades" => ["assigment" => 75, "uts" => 68, "uas" => 70]
        ]
    ]
];

function hitungNilaiAkhir($grades)
{
    return ($grades["assigment"] * 0.20) + ($grades["uts"] * 0.40) + ($grades["uas"] * 0.40);
}

function tentukanGrade($nilai)
{
    if ($nilai >= 85)
        return "A";
    elseif ($nilai >= 80)
        return "A-";
    elseif ($nilai >= 75)
        return "B+";
    elseif ($nilai >= 70)
        return "B";
    elseif ($nilai >= 65)
        return "B-";
    elseif ($nilai >= 60)
        return "C+";
    elseif ($nilai >= 55)
        return "C";
    elseif ($nilai >= 45)
        return "D";
    else
        return "E";
}

function warnaGrade($grade)
{
    switch ($grade) {
        case "A":
            return "#c8e6c9"; // hijau
        case "A-":
            return "#c8e6c9"; // hijau
        case "B+":
            return "#fff9c4"; // kuning
        case "B":
            return "#fff9c4"; // kuning
        case "B-":
            return "#ffe0b2"; // oranye muda
        case "C+":
            return "#ffe0b2";
        case "C":
            return "#ffccbc";
        case "D":
            return "#ffccbc";
        default:
            return "#ffcdd2"; // merah muda
    }
}

$totalSKS = array_sum(array_column($data["subjects"], "sks"));
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Hasil Studi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 40px;
            color: #000;
        }

        h2 {
            text-align: center;
            margin-bottom: 24px;
        }

        .info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            margin-bottom: 20px;
            gap: 4px 0;
        }

        .info p {
            margin: 4px 0;
        }

        .info p span {
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px 12px;
            text-align: left;
        }

        th {
            background-color: #fff;
            font-weight: bold;
        }

        td.center {
            text-align: center;
        }

        .total-row td {
            border: none;
            text-align: right;
            font-weight: bold;
            padding-top: 10px;
        }
    </style>
</head>

<body>

    <h2>Kartu Hasil Studi</h2>

    <div class="info">
        <p><span>Nama:</span> <?= $data["name"] ?></p>
        <p><span>Program Studi:</span> <?= $data["major"] ?></p>
        <p><span>NIM:</span> <?= $data["nim"] ?></p>
        <p><span>Semester:</span> <?= $data["semester"] ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Tugas (20%)</th>
                <th>UTS (40%)</th>
                <th>UAS (40%)</th>
                <th>Nilai Akhir</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data["subjects"] as $subject): ?>
                <?php
                $nilaiAkhir = hitungNilaiAkhir($subject["grades"]);
                $grade = tentukanGrade($nilaiAkhir);
                $warna = warnaGrade($grade);
                ?>
                <tr>
                    <td><?= $subject["code"] ?></td>
                    <td><?= $subject["name"] ?></td>
                    <td class="center"><?= $subject["sks"] ?></td>
                    <td class="center"><?= $subject["grades"]["assigment"] ?></td>
                    <td class="center"><?= $subject["grades"]["uts"] ?></td>
                    <td class="center"><?= $subject["grades"]["uas"] ?></td>
                    <td class="center"><?= number_format($nilaiAkhir, 2) ?></td>
                    <td class="center" style="background-color: <?= $warna ?>;"><?= $grade ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td colspan="8">Total SKS: <?= $totalSKS ?></td>
            </tr>
        </tfoot>
    </table>

</body>

</html>