# Fitur Lupa Password & Ganti Password via Email

## Deskripsi Tugas
Saat ini sistem login admin (Filament Admin Panel) belum memiliki fitur "Lupa Password". Kita perlu menambahkan fitur ini agar pengguna dapat melakukan reset dan mengganti password mereka melalui tautan (link) yang dikirimkan ke email terdaftar.

## Langkah-langkah Implementasi (Detail untuk Junior Programmer / AI Agent)

1. **Aktifkan Fitur Password Reset di Filament Panel**
   - Buka file `app/Providers/Filament/AdminPanelProvider.php`.
   - Pada method `panel(Panel $panel)`, cari konfigurasi panel (di bagian *chaining method* `$panel->...`).
   - Tambahkan method `->passwordReset()` tepat di bawah `->login()`. Ini akan membuat Filament secara otomatis menambahkan halaman/rute Lupa Password dan menampilkan tautan "Forgot password?" di form login.

2. **Periksa Konfigurasi Email di `.env`**
   - Buka file `.env` di *root* proyek.
   - Agar email bisa dikirim (atau disimulasikan), pastikan bagian konfigurasi email (`MAIL_...`) sudah benar.
   - Untuk tahap *development* (uji coba lokal), Anda bisa menggunakan `log` agar isi email masuk ke file log, atau menggunakan Mailtrap.
     ```env
     MAIL_MAILER=log
     # Jika menggunakan SMTP/Mailtrap, isi kredensial di bawah ini:
     MAIL_HOST=127.0.0.1
     MAIL_PORT=2525
     MAIL_USERNAME=null
     MAIL_PASSWORD=null
     MAIL_FROM_ADDRESS="admin@sterilmedical.com"
     MAIL_FROM_NAME="${APP_NAME}"
     ```
   - *Catatan: Jika memakai `MAIL_MAILER=log`, Anda bisa melihat tautan reset password yang dikirim di dalam file `storage/logs/laravel.log`.*

3. **Verifikasi Database dan Model User**
   - Pastikan model `app/Models/User.php` sudah memiliki *trait* `Illuminate\Notifications\Notifiable`. (Biasanya bawaan Laravel sudah ada).
   - Pastikan migrasi default Laravel `0001_01_01_000000_create_users_table.php` sudah membuat tabel `password_reset_tokens`. (Laravel versi terbaru otomatis melakukan ini, cukup pastikan saja).

4. **Testing (Pengecekan)**
   - Akses halaman login admin (`/admin/login`).
   - Cek apakah tulisan/tautan untuk Lupa Password sudah muncul.
   - Klik tautan tersebut, masukkan email admin yang sudah ada di database, lalu tekan tombol untuk mengirim email reset.
   - Jika sukses, buka file `storage/logs/laravel.log` (jika menggunakan mailer `log`) dan cari link reset password-nya.
   - Buka link tersebut, masukkan password baru, dan pastikan admin bisa login kembali menggunakan password baru tersebut.

## Aspek Keamanan & Clean Code
- **Keamanan:** Proses enkripsi password biarkan dikelola oleh sistem bawaan Laravel dan Filament. Laravel sudah memastikan bahwa token reset hanya valid dalam batas waktu tertentu (default 60 menit) dan akan hangus apabila sudah dipakai atau kadaluarsa.
- **Keamanan Konfigurasi:** Pastikan tidak melakukan *hardcode* email dan kredensial SMTP di dalam kode PHP. Selalu gunakan file `.env` dan panggil via `env()` (atau idealnya `config()`).
- **Clean Code:** Memanfaatkan fitur bawaan Filament (`->passwordReset()`) jauh lebih bersih (clean) daripada membuat *controller* dan *view* manual yang *redundant* untuk halaman admin.

Silakan jalankan langkah-langkah di atas dan pastikan tidak ada *bug* atau *error* saat proses reset password dilakukan.
