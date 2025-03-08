# Hospital Online Queue System

Sistem informasi antrian online untuk rumah sakit yang memungkinkan pasien mendaftar dan mengantri secara online di poli yang dipilih.

## Teknologi yang Digunakan
- **Framework:** Laravel
- **Bahasa Pemrograman:** PHP, JavaScript
- **Database:** MySQL

## Fitur Utama
### Manajemen Pengguna
- CRUD Pasien
- CRUD Dokter
- CRUD Poli
- CRUD Admin
- CRUD Petugas

### Fitur Administratif
- Dashboard sesuai level pengguna (Admin, Dokter, Petugas, Pasien)
- Manajemen antrian secara real-time
- Panggilan antrian melalui email

### Keamanan & Akses
- Sistem login & registrasi
- 4 level pengguna (Admin, Dokter, Petugas, Pasien)

## Instalasi
1. Clone repository ini:
   ```sh
   git clone https://github.com/username/repository.git
   ```
2. Masuk ke direktori proyek:
   ```sh
   cd nama_proyek
   ```
3. Install dependensi menggunakan Composer:
   ```sh
   composer install
   ```
4. Install dependensi frontend menggunakan npm:
   ```sh
   npm install && npm run dev
   ```
5. Konfigurasi file `.env`:
   ```sh
   cp .env.example .env
   ```
6. Generate application key:
   ```sh
   php artisan key:generate
   ```
7. Konfigurasi database di `.env` lalu jalankan migrasi:
   ```sh
   php artisan migrate --seed
   ```
8. Jalankan server lokal:
   ```sh
   php artisan serve
   ```

## Catatan
💾 **Database untuk sistem ini belum tersedia.** 😢

## Kontribusi
Pull request selalu diterima! Jangan ragu untuk mengajukan issue jika menemukan bug atau ingin memberikan saran.

## Lisensi
Proyek ini menggunakan lisensi [MIT](LICENSE).


![DB](https://user-images.githubusercontent.com/62735019/147570152-6ab95589-65d4-49c3-a6e0-851987299002.png)






