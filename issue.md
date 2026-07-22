# Task: Pembuatan Halaman Home (index.blade.php) & Manajemen via Filament Admin

Dokumen ini berisi instruksi detail untuk membangun halaman Home (Beranda) dan memastikan kontennya dapat dikelola secara dinamis melalui Filament Admin Panel.

## 1. Persiapan Database & Model

Kita membutuhkan tabel untuk menyimpan data **Hero Slider** dan pengaturan **Secondary Banner**. 
Karena **Produk Unggulan** sudah ditambahkan sebelumnya (melalui field `is_featured` di tabel `products`), kita tidak perlu membuat tabel produk unggulan baru.

### 1.1 Membuat Model & Migration untuk Hero Slider
Jalankan perintah berikut untuk membuat model beserta migration:
```bash
php artisan make:model HeroSlide -m
```

Tambahkan struktur tabel di file migration `xxxx_xx_xx_xxxxxx_create_hero_slides_table.php`:
```php
public function up()
{
    Schema::create('hero_slides', function (Blueprint $table) {
        $table->id();
        $table->string('image');
        $table->string('title')->nullable();
        $table->text('description')->nullable();
        $table->boolean('is_active')->default(true);
        $table->integer('sort_order')->default(0);
        $table->timestamps();
    });
}
```

Pada `app/Models/HeroSlide.php`, tambahkan `$fillable`:
```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'image', 'title', 'description', 'is_active', 'sort_order'
    ];
}
```

### 1.2 Membuat Model & Migration untuk Pengaturan Halaman Utama (Secondary Banner)
Jalankan:
```bash
php artisan make:model HomeSetting -m
```

Tambahkan struktur tabel di file migration `xxxx_xx_xx_xxxxxx_create_home_settings_table.php`:
```php
public function up()
{
    Schema::create('home_settings', function (Blueprint $table) {
        $table->id();
        $table->string('secondary_banner_image')->nullable();
        $table->timestamps();
    });
}
```

Pada `app/Models/HomeSetting.php`:
```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSetting extends Model
{
    use HasFactory;

    protected $fillable = ['secondary_banner_image'];
}
```

*Catatan:* Jalankan `php artisan migrate` setelah modifikasi file migration selesai dilakukan.

## 2. Pembuatan Filament Resource & Page

### 2.1 Resource Hero Slide
Jalankan perintah:
```bash
php artisan make:filament-resource HeroSlide
```

Ubah `app/Filament/Resources/HeroSlideResource.php`:
- **Form Schema:**
  Gunakan komponen `FileUpload` untuk gambar (image) dengan direktori tujuan penyimpanan misal `'hero-slides'`, `TextInput` untuk title, `Textarea` untuk description, `Toggle` untuk is_active (default state `true`), dan `TextInput` (numeric) untuk sort_order.
- **Table Schema:**
  Gunakan `ImageColumn` untuk preview gambar, `TextColumn` untuk title, `IconColumn` (boolean) untuk is_active, dan tambahkan fitur pengurutan (sortable) pada `sort_order`.

### 2.2 Pengaturan Secondary Banner
Kita bisa menggunakan resource khusus di Filament untuk mengelola satu baris data `HomeSetting`.
Buat Resource:
```bash
php artisan make:filament-resource HomeSetting
```
- **Form Schema:** `FileUpload` untuk `secondary_banner_image`.
- Pastikan logika controller atau pengaturan hanya mengizinkan pengubahan baris data pertama, agar Secondary Banner tetap konsisten. Sebagai alternatif, kamu bisa mematikan opsi Create di Table jika datanya sudah ada 1.

## 3. Implementasi Halaman Frontend (`resources/views/index.blade.php`)

Buat route utama di `routes/web.php` untuk menampilkan halaman home:
```php
use App\Models\HeroSlide;
use App\Models\HomeSetting;
use App\Models\Product;

Route::get('/', function () {
    // Ambil data hero slide yang aktif diurutkan berdasarkan urutan
    $heroSlides = HeroSlide::where('is_active', true)->orderBy('sort_order')->get();
    
    // Ambil baris pertama dari settings banner
    $homeSetting = HomeSetting::first();
    
    // Ambil maksimal 4 produk yang ditandai unggulan
    $featuredProducts = Product::where('is_featured', true)->take(4)->get();
    
    return view('index', compact('heroSlides', 'homeSetting', 'featuredProducts'));
})->name('home');
```

Modifikasi atau buat file tampilan di `resources/views/index.blade.php` (Catatan: jika nama filenya adalah `index.php`, disarankan menggunakan `index.blade.php` agar fitur Blade Laravel bisa digunakan):

### 3.1 Hero Section (Slider)
- Loop data `$heroSlides`.
- Gambar harus menyesuaikan ukuran penuh layar (misal CSS menggunakan `w-full h-screen object-cover`).
- Tambahkan library slider seperti **SwiperJS** atau menggunakan **Alpine.js** untuk mengatur logika perpindahan slide (berganti-ganti gambar otomatis/sliding).
- Jika ada tulisan di slide, tampilkan teks `title` dan `description` melayang (overlay) di atas gambar dengan latar gelap/semi-transparan agar mudah dibaca.

### 3.2 Secondary Banner Section
- Cek apakah data `$homeSetting` dan atribut `secondary_banner_image` tidak kosong.
- Tampilkan gambar tersebut secara utuh memenuhi lebar layar di bawah bagian Hero (misal class: `w-full h-auto`).

### 3.3 Featured Products (Produk Unggulan) Section
- Tampilkan judul seksi, contoh: "Produk Unggulan Kami".
- Loop data `$featuredProducts`.
- Tampilkan dalam bentuk **Grid**, misalnya menggunakan Tailwind CSS: `grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6`.
- Struktur card/kotak produk harus serupa dengan yang sudah dibuat sebelumnya di halaman Katalog Produk, mencakup:
  - Gambar Utama Produk
  - Nama Produk
  - Tombol atau tautan menuju detail produk

## 4. Pengujian (Testing)
- Pastikan slider berjalan secara responsif (berfungsi baik dari mobile dan desktop).
- Pastikan secondary banner ter-load dengan benar jika di-set dari admin panel.
- Periksa maksimal 4 produk unggulan benar-benar yang dimuat pada halaman beranda.
- Uji input, edit, dan hapus melalui Filament Admin untuk Hero Slider agar memvalidasi gambar muncul dengan benar.
