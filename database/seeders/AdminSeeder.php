<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $admin = new \App\Models\User;
        $admin->username = "admin";
        $admin->name = "Admin Aplikasi";
        $admin->email = "admin@sisfo.com";
        $admin->level = json_encode(["ADMIN"]);
        $admin->password = \Hash::make("12345678");
        $admin->status = "ACTIVE";
        $admin->save();

        $this->command->info("User Admin berhasil ditambahkan");
    }
}