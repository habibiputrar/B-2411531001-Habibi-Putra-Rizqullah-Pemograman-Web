<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mahasiswas')->insert([
            [
                'nama' => 'Habibi Putra Rizqullah',
                'nim' => '2411531001',
                'jurusan' => 'S1 Informatika',
                'asal' => 'Pekanbaru, Riau',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Rafi',
                'nim' => '2411531002',
                'jurusan' => 'S1 Informatika',
                'asal' => 'Solok, Sumatera Barat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Dzhillan',
                'nim' => '2511531001',
                'jurusan' => 'S1 Informatika',
                'asal' => 'Bukittinggi, Sumatera Barat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Arkan Ubaidillah Warman',
                'nim' => '2411537001',
                'jurusan' => 'S1 Informatika',
                'asal' => 'Jakarta Selatan, DKI Jakarta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Arya Pratama Hendri',
                'nim' => '2411533008',
                'jurusan' => 'S1 Informatika',
                'asal' => 'Muko-Muko, Bengkulu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}