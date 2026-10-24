# Praktikum Pemrograman Web

Repository praktikum **Pemrograman Web** menggunakan **Laravel**. Proyek memuat latihan routing, controller, Blade, CRUD, serta relasi data mahasiswa, jurusan, mata kuliah, dan jadwal melalui Eloquent ORM.

| Identitas | Keterangan |
| --- | --- |
| Nama | Habibi Putra Rizqullah |
| NIM | 2411531001 |
| Kelas | B |
| Mata Kuliah | Pemrograman Web |
| Repository | [B-2411531001-Habibi-Putra-Rizqullah-Pemograman-Web](https://github.com/habibiputrar/B-2411531001-Habibi-Putra-Rizqullah-Pemograman-Web) |

## Materi dan Fitur

| Bagian | Implementasi |
| --- | --- |
| Routing dan controller | Halaman Hello World, biodata mahasiswa, serta perhitungan luas dan keliling lingkaran. |
| CRUD mahasiswa | Menampilkan, menambah, mengubah, dan menghapus data nama, NIM, jurusan, serta asal. |
| CRUD produk | Pengelolaan nama produk, harga, dan deskripsi. |
| CRUD pelanggan | Pengelolaan nama, email, nomor telepon, dan alamat melalui modul `costumers`. |
| Relasi mahasiswa | Pengelolaan mahasiswa beserta jurusan dan mata kuliah, termasuk detail serta validasi input. |
| Latihan query relasi | Daftar mahasiswa dan relasinya, jurusan dengan mahasiswa terbanyak, mata kuliah mahasiswa tertentu, serta total SKS. |
| Jadwal mata kuliah | Menampilkan, menambah, dan menghapus jadwal berdasarkan mata kuliah, hari, jam, dan ruangan. |
| Detail jadwal mahasiswa | Menampilkan mata kuliah dan jadwal yang terhubung dengan seorang mahasiswa. |

## Teknologi

| Bagian | Teknologi |
| --- | --- |
| Backend | PHP `^8.2`, Laravel `^12.0` |
| Tampilan | Blade, HTML, CSS, Bootstrap pada halaman relasi |
| Model dan database | Eloquent ORM, migration, seeder; SQLite sebagai konfigurasi awal `.env.example` |
| Aset frontend | Vite, Tailwind CSS, JavaScript |
| Pengelolaan dependensi | Composer dan npm |

Versi dependensi proyek tercantum pada [composer.json](composer.json) dan [package.json](package.json), dengan versi terkunci pada `composer.lock` dan `package-lock.json`.

## Struktur Folder

```text
.
├── app/
│   ├── Http/Controllers/    # Logika request dan pengelolaan data
│   └── Models/              # Model serta relasi Eloquent
├── bootstrap/               # Inisialisasi aplikasi
├── config/                  # Konfigurasi Laravel
├── database/
│   ├── migrations/          # Struktur tabel
│   └── seeders/             # Data awal praktikum
├── public/                  # Entry point web dan aset publik
├── resources/
│   ├── css/
│   ├── js/
│   └── views/               # Template Blade
├── routes/
│   └── web.php              # Routing halaman aplikasi
├── storage/                 # Log, session file, dan file aplikasi
├── tests/                   # Test contoh bawaan proyek
├── .env.example
├── artisan
├── composer.json
├── package.json
└── README.md
```

## Persiapan

- PHP 8.4 atau versi yang kompatibel dengan `composer.lock`, beserta ekstensi yang diperlukan Laravel dan driver `pdo_sqlite` untuk SQLite.
- Composer.
- Node.js 20 atau versi yang lebih baru yang memenuhi ketentuan dependency pada `package-lock.json`, beserta npm.
- Git.

Walaupun `composer.json` mendeklarasikan PHP `^8.2`, beberapa dependensi Symfony yang terkunci pada `composer.lock` membutuhkan PHP `>=8.4`. Gunakan versi PHP yang memenuhi dependensi terkunci untuk menjalankan `composer install`.

### 1. Unduh Repository

```bash
git clone https://github.com/habibiputrar/B-2411531001-Habibi-Putra-Rizqullah-Pemograman-Web.git
cd B-2411531001-Habibi-Putra-Rizqullah-Pemograman-Web
```

### 2. Pasang Dependensi

```bash
composer install
npm ci
```

### 3. Siapkan Environment

Buat `.env` dari contoh konfigurasi jika file tersebut belum ada, lalu buat application key:

```bash
php -r "file_exists('.env') || copy('.env.example', '.env');"
php artisan key:generate
```

Untuk menjalankan proyek secara lokal dengan SQLite, sesuaikan nilai berikut di `.env`:

```dotenv
APP_URL=http://127.0.0.1:8000
DB_CONNECTION=sqlite
SESSION_DRIVER=database
CACHE_STORE=file
QUEUE_CONNECTION=sync
```

Migrasi repository menyediakan tabel `sessions`, tetapi belum menyertakan tabel `cache` dan `jobs`. Pengaturan cache berbasis file dan queue `sync` di atas sesuai untuk setup lokal ini.

### 4. Siapkan Database dan Data Awal

Buat file SQLite jika belum ada, kemudian jalankan migrasi dan seeder pada database baru:

```bash
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
php artisan migrate --seed
```

Seeder utama mengisi data mahasiswa, produk, jurusan, mata kuliah, serta relasi mahasiswa–mata kuliah. Data pelanggan dan jadwal dapat ditambahkan melalui form aplikasi.

Seeder memasukkan data dengan NIM unik, sehingga langkah pengisian data awal ditujukan untuk database baru. Tidak perlu menjalankan seeder kembali setiap kali aplikasi dibuka.

### 5. Jalankan Aplikasi

Bangun aset frontend, lalu jalankan server Laravel:

```bash
npm run build
php artisan serve
```

Buka aplikasi di **http://127.0.0.1:8000**. Untuk perubahan aset selama pengembangan, jalankan `npm run dev` pada terminal terpisah sambil server Laravel tetap berjalan.

## Halaman Aplikasi

Path berikut diakses setelah server Laravel berjalan. Definisi lengkap tersedia pada [routes/web.php](routes/web.php).

| Path | Halaman / Latihan |
| --- | --- |
| `/` | Halaman awal Laravel |
| `/hello` | Hello World |
| `/student` | Biodata mahasiswa dari controller |
| `/lingkaran` | Perhitungan luas dan keliling lingkaran |
| `/mahasiswa` | CRUD mahasiswa |
| `/products` | CRUD produk |
| `/costumers` | CRUD pelanggan |
| `/students` | Pengelolaan mahasiswa dengan relasi jurusan dan mata kuliah |
| `/students/latihan` | Hasil latihan query relasi dan perhitungan total SKS |
| `/students/{id}` | Detail mahasiswa dan mata kuliah |
| `/students/{id}/detail` | Detail mahasiswa beserta jadwal mata kuliah |
| `/schedules` | Daftar jadwal mata kuliah |
| `/schedules/create` | Form tambah jadwal |

Ganti `{id}` dengan ID mahasiswa yang tersedia. Penamaan `costumers` mengikuti route, model, dan tabel yang digunakan pada kode proyek.

## Relasi Data

- **Major → Student:** satu jurusan memiliki banyak mahasiswa; setiap mahasiswa terhubung ke satu jurusan.
- **Student ↔ Subject:** mahasiswa dan mata kuliah memiliki relasi many-to-many melalui tabel `student_subject`.
- **Subject → Schedule:** satu mata kuliah memiliki banyak jadwal.

Model latihan relasi berada pada [app/Models](app/Models/), sedangkan struktur tabelnya tersedia pada [database/migrations](database/migrations/). Modul CRUD `Mahasiswa` menggunakan tabel `mahasiswas` tersendiri, terpisah dari model `Student` untuk latihan relasi.

## Perintah Pendukung

```bash
php artisan route:list
php artisan migrate:status
```

Perintah tersebut membantu melihat route aplikasi dan status migrasi setelah dependensi serta konfigurasi environment tersedia.

## Referensi

- [Instalasi Laravel 12](https://laravel.com/docs/12.x/installation)
- [Migration Laravel](https://laravel.com/docs/12.x/migrations)
- [Database Seeding](https://laravel.com/docs/12.x/seeding)
