# Panduan Deploy Laravel & Filament ke cPanel (Production)

Proyek ini telah dilengkapi dengan standar **Clean Code**, **Security**, dan **SEO**. Untuk menaikkan (*deploy*) kode ini ke lingkungan *production* di *shared hosting* menggunakan cPanel, silakan ikuti langkah-langkah detail berikut:

## 1. Persiapan Lokal (Build & Zip)
Sebelum mengunggah *file* ke cPanel, Anda perlu melakukan *build* aset dan memastikan dependensi sudah lengkap.

1. Buka terminal di direktori proyek lokal.
2. Jalankan perintah untuk *compile* aset *frontend*:
   ```bash
   npm run build
   ```
   *(Pastikan folder `public/build` berhasil terbuat. Langkah ini sangat penting karena cPanel umumnya tidak mendukung eksekusi Node.js/NPM).*
3. Hapus *cache* Laravel:
   ```bash
   php artisan optimize:clear
   ```
4. *Compress* (Zip) seluruh folder proyek Anda, **kecuali** direktori berikut agar ukuran *file* lebih ringan:
   - `node_modules`
   - `.git`
   - `.env` (bisa di-*exclude* atau disiapkan `.env.example` karena Anda akan membuat `.env` baru di *server*).

## 2. Unggah ke cPanel (File Manager)
Ada dua pendekatan (*approach*) saat deploy ke cPanel. Pendekatan terbaik dan paling aman adalah menempatkan folder Laravel di luar direktori publik, dan hanya mengekspos folder `public`.

### Skenario: Menggunakan Subdomain atau Addon Domain (Paling Mudah)
1. Login ke cPanel, buka **Domains** atau **Subdomains**.
2. Buat domain baru (contoh: `admin.sterilmedical.com`).
3. Pada opsi **Document Root**, arahkan ke direktori `public` di dalam folder proyek Anda. Contoh: `sterilmedical/public`.
4. Buka **File Manager**, masuk ke direktori `sterilmedical`.
5. Unggah (*Upload*) *file* `.zip` yang sudah Anda buat.
6. *Extract* (Ekstrak) *file* `.zip` tersebut di direktori itu.

### Skenario: Menggunakan Domain Utama (`public_html`)
Jika proyek ini adalah web utama yang diakses melalui `namadomain.com`:
1. Buka **File Manager**, buat folder baru sejajar dengan `public_html` (misal: `sterilmedical_app`).
2. Unggah dan ekstrak *file* `.zip` ke dalam folder `sterilmedical_app`.
3. Pindahkan **seluruh isi** dari folder `sterilmedical_app/public/` ke dalam folder `public_html/`.
4. Buka dan edit `public_html/index.php`. Ubah 2 baris berikut agar menunjuk ke direktori yang benar:
   ```php
   // Sebelum:
   require __DIR__.'/../vendor/autoload.php';
   $app = require_once __DIR__.'/../bootstrap/app.php';

   // Sesudah (sesuaikan nama folder):
   require __DIR__.'/../sterilmedical_app/vendor/autoload.php';
   $app = require_once __DIR__.'/../sterilmedical_app/bootstrap/app.php';
   ```

## 3. Konfigurasi Database & Environment (.env)
1. Di cPanel, buka **MySQL® Databases**.
2. Buat Database baru (contoh: `steril_db`).
3. Buat User baru (contoh: `steril_user`) beserta *password* yang kuat.
4. Tambahkan User tersebut ke Database (*Add User To Database*) dan berikan hak akses **ALL PRIVILEGES**.
5. Buka kembali File Manager, masuk ke folder aplikasi (`sterilmedical` atau `sterilmedical_app`).
6. Ubah nama *file* `.env.example` menjadi `.env` (atau buat *file* `.env` baru jika tidak ada) dan isi sesuai dengan kredensial database Anda:
   ```env
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://namadomain.com

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database_cpanel_anda
   DB_USERNAME=nama_user_cpanel_anda
   DB_PASSWORD=password_database_anda
   ```

## 4. Konfigurasi Khusus (Terminal cPanel)
Jika cPanel Anda memiliki fitur **Terminal** atau akses **SSH**, jalankan perintah berikut di dalam folder aplikasi Laravel Anda (contoh `cd sterilmedical_app`):

1. Pastikan PHP yang digunakan adalah versi **8.3** (sesuai spesifikasi di `composer.json`).
   ```bash
   php -v
   ```
2. Jalankan migrasi dan *seeding* (jika ada data awal):
   ```bash
   php artisan migrate --force
   ```
3. Buat *symbolic link* untuk penyimpanan gambar/aset Filament:
   ```bash
   php artisan storage:link
   ```
   *(Catatan: Jika Anda memisahkan folder `public` ke `public_html`, hapus folder `storage` di dalam `public_html` jika sudah ada, dan jalankan perintah `storage:link` agar Laravel otomatis membuatkan symlink yang benar).*
4. Optimasi performa Laravel & Filament untuk *production*:
   ```bash
   php artisan optimize
   php artisan filament:optimize
   php artisan view:cache
   ```

## 5. Security Checklist Khusus CPanel
1. **Sertifikat SSL**: Pastikan HTTPS aktif (gunakan fitur *Let's Encrypt* atau *AutoSSL* di cPanel). `SecurityHeadersMiddleware` yang sudah kita buat memerlukan HTTPS (`Strict-Transport-Security`).
2. **File Permissions**:
   - Pastikan direktori `storage` dan `bootstrap/cache` memiliki *permission* `775` (atau *writable* oleh server).
   - Folder lainnya cukup `755`, dan *file* cukup `644`.
3. **Sembunyikan `.env`**: Jika Anda menggunakan skenario `public_html` di atas, file `.env` akan aman karena berada di atas (luar) `public_html`. Jangan pernah meletakkan `.env` di dalam `public_html`!

Selamat! Aplikasi Anda sekarang sudah *live* dan aman di cPanel.
