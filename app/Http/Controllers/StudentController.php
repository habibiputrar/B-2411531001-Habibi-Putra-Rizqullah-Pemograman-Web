<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $student = [
            'nama' => 'Habibi Putra Rizqullah',
            'nim' => '2411531001',
            'jurusan' => 'S1 Informatika',
            'universitas' => 'Universitas Andalas',
            'asal' => 'Pekanbaru, Riau',
        ];

        return view('student.index', compact('student'));
    }

    public function lingkaran()
    {
        $jari = 7;
        $luas = pi() * $jari * $jari;
        $keliling = 2 * pi() * $jari;

        return "Jari-jari: $jari | Luas: " . number_format($luas, 2) . " | Keliling: " . number_format($keliling, 2);
    }
}