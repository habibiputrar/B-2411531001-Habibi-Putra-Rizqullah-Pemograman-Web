<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{

    public function run(): void
    {
        $students = [
            ['nim' => '2411531001', 'name' => 'Habibi Putra Rizqullah', 'address' => 'Pekanbaru, Riau', 'major_id' => 1],
            ['nim' => '2411532002', 'name' => 'Rafi', 'address' => 'Solok, Sumatera Barat', 'major_id' => 1],
            ['nim' => '2511531001', 'name' => 'Dzhillan Dzhalila', 'address' => 'Bukittinggi, Sumatera Barat', 'major_id' => 2],
            ['nim' => '2411537001', 'name' => 'Arkan Ubaidillah Warman', 'address' => 'Jakarta Selatan, DKI Jakarta', 'major_id' => 2],
            ['nim' => '2411533008', 'name' => 'Arya Pratama Hendri', 'address' => 'Muko-Muko, Bengkulu', 'major_id' => 3],
        ];

        foreach ($students as $studentData) {
            $student = Student::create($studentData);

            $subjects = Subject::inRandomOrder()->take(rand(2, 4))->pluck('id');
            $student->subjects()->attach($subjects);
        }
    }
}