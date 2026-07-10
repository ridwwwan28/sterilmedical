# Issue: Pembuatan Fitur Kelola Konten Halaman Brand Story (Filament v3)

## Deskripsi Singkat
Halaman **Brand Story** (`resources/views/brand-story.blade.php`) saat ini menggunakan konten statis (hardcoded). Tugas ini bertujuan untuk membuat halaman tersebut menjadi dinamis sehingga seluruh teks, gambar, dan timeline dapat dikelola melalui admin panel **Filament v3**.

Issue ini ditulis secara mendetail agar dapat dikerjakan dengan mudah, termasuk oleh junior programmer atau AI model.

---

## 1. Analisis Kebutuhan Konten (Bagian yang harus dikelola)
Berdasarkan file `brand-story.blade.php`, berikut adalah bagian yang perlu dikelola secara dinamis:

### A. Bagian Header (Hero Section)
- **Header Title**: Teks judul utama (saat ini: "Lorem ipsum dolor sit amet.")
- **Header Description**: Teks paragraf di bawah judul (saat ini: "Lorem ipsum dolor sit amet consectetur...")

### B. Bagian Visi (Brand Vision)
- **Vision Image**: Gambar ikon Visi (saat ini: `smi-negative.png`)
- **Vision Title**: Judul Visi (saat ini: "Brand Vision")
- **Vision Description**: Deskripsi Visi (saat ini: "Lorem ipsum dolor sit amet consectetur...")

### C. Bagian Misi (Brand Mission)
- **Mission Image**: Gambar ikon Misi (saat ini: `smi-negative.png`)
- **Mission Title**: Judul Misi (saat ini: "Brand Mission")
- **Mission Description**: Deskripsi Misi (saat ini: "Lorem ipsum dolor, sit amet consectetur...")

### D. Bagian Timeline (Awal Perjalanan Brand)
- **Timeline Section Title**: Judul bagian timeline (saat ini: "Awal Perjalanan Brand Steril Medical")
- **Timeline Section Subtitle**: Sub-judul timeline (saat ini: "Kami memulai perjalanan ini dengan penuh keyakinan")
- **Timeline Items (Data Berulang/Repeater)**: Kumpulan data tahun dan deskripsi sejarah.
  - **Tahun (Year)**: (Contoh: "1988", "2011", dsb.)
  - **Deskripsi (Description)**: Penjelasan pada tahun tersebut.

---

## 2. Langkah-Langkah Pengerjaan (Implementasi)

### Langkah 1: Pembuatan Migration & Model
Karena halaman ini hanya ada satu (halaman Brand Story), pendekatan terbaik adalah menggunakan **1 tabel tunggal** yang menyimpan semua field di atas, di mana kita hanya akan menggunakan record ID 1. Data Timeline bisa disimpan dalam bentuk `JSON`.

1. **Jalankan command untuk membuat Model & Migration:**
   ```bash
   php artisan make:model BrandStory -m
   ```

2. **Isi file Migration (create_brand_stories_table):**
   Tambahkan kolom-kolom berikut di dalam method `up()`:
   ```php
   Schema::create('brand_stories', function (Blueprint $table) {
       $table->id();
       // Header
       $table->string('header_title')->nullable();
       $table->text('header_description')->nullable();
       
       // Vision
       $table->string('vision_image')->nullable();
       $table->string('vision_title')->nullable();
       $table->text('vision_description')->nullable();
       
       // Mission
       $table->string('mission_image')->nullable();
       $table->string('mission_title')->nullable();
       $table->text('mission_description')->nullable();
       
       // Timeline
       $table->string('timeline_title')->nullable();
       $table->string('timeline_subtitle')->nullable();
       $table->json('timeline_items')->nullable(); // Simpan array timeline di sini
       
       $table->timestamps();
   });
   ```
   Lalu jalankan `php artisan migrate`.

3. **Isi file Model (`app/Models/BrandStory.php`):**
   Tambahkan `$guarded` dan casting untuk kolom JSON:
   ```php
   <?php

   namespace App\Models;

   use Illuminate\Database\Eloquent\Model;

   class BrandStory extends Model
   {
       protected $guarded = ['id'];

       protected $casts = [
           'timeline_items' => 'array',
       ];
   }
   ```

4. **(Opsional tapi Disarankan) Buat Seeder:**
   Agar ada data awal saat pertama kali dijalankan, buat seeder untuk `BrandStory` dengan id 1 dan jalankan seedernya.

---

### Langkah 2: Pembuatan Filament Resource (Singleton)
Di Filament v3, terdapat fitur **Singleton Resource** yang sangat cocok untuk mengelola tabel yang hanya berisi satu baris data (seperti halaman pengaturan atau profil web).

1. **Buat Singleton Resource:**
   ```bash
   php artisan make:filament-resource BrandStory --singleton
   ```
   *(Ini akan membuat file `BrandStoryResource.php` di dalam `app/Filament/Resources`)*

2. **Konfigurasi Form Schema (`app/Filament/Resources/BrandStoryResource.php`):**
   Buka file tersebut dan modifikasi method `form()`. Kita akan menggunakan komponen `Section` agar form terlihat rapi:

   ```php
   use Filament\Forms\Components\TextInput;
   use Filament\Forms\Components\Textarea;
   use Filament\Forms\Components\FileUpload;
   use Filament\Forms\Components\Repeater;
   use Filament\Forms\Components\Section;
   use Filament\Forms\Form;

   public static function form(Form $form): Form
   {
       return $form
           ->schema([
               Section::make('Header Section')
                   ->schema([
                       TextInput::make('header_title')->required(),
                       Textarea::make('header_description')->required(),
                   ]),

               Section::make('Vision Section')
                   ->schema([
                       FileUpload::make('vision_image')->image()->directory('brand-story'),
                       TextInput::make('vision_title')->required(),
                       Textarea::make('vision_description')->required(),
                   ])->columns(1),

               Section::make('Mission Section')
                   ->schema([
                       FileUpload::make('mission_image')->image()->directory('brand-story'),
                       TextInput::make('mission_title')->required(),
                       Textarea::make('mission_description')->required(),
                   ])->columns(1),

               Section::make('Timeline Section')
                   ->schema([
                       TextInput::make('timeline_title')->required(),
                       TextInput::make('timeline_subtitle')->required(),
                       
                       Repeater::make('timeline_items')
                           ->schema([
                               TextInput::make('year')
                                   ->label('Tahun')
                                   ->numeric()
                                   ->required(),
                               Textarea::make('description')
                                   ->label('Deskripsi')
                                   ->required(),
                           ])
                           ->label('Data Timeline')
                           ->addActionLabel('Tambah Timeline Baru')
                           ->reorderable()
                           ->collapsible(),
                   ]),
           ]);
   }
   ```

---

### Langkah 3: Menghubungkan Data ke View Frontend
Setelah admin bisa mengubah data, kita harus menampilkan data tersebut di file `resources/views/brand-story.blade.php`.

1. **Passing Data dari Controller / Route:**
   Buka file controller tempat halaman ini dipanggil, atau jika menggunakan Route closure di `routes/web.php`, ubah kodenya menjadi:
   ```php
   use App\Models\BrandStory;

   Route::get('/brand-story', function () {
       // Ambil data pertama (atau kembalikan object kosong jika belum ada)
       $brandStory = BrandStory::first() ?? new BrandStory();
       return view('brand-story', compact('brandStory'));
   });
   ```

2. **Ubah file `resources/views/brand-story.blade.php`:**
   Ganti semua teks statis dengan variabel dari database.

   **Contoh untuk Header (Baris 14-21):**
   ```blade
   <h3 class="text-4xl lg:text-5xl font-bold text-center text-blue-950 leading-tight tracking-tight mb-2">
       {{ $brandStory->header_title ?? 'Default Title' }}
   </h3>
   <p class="text-normal text-center text-blue-950 mx-auto max-w-4xl">
       {{ $brandStory->header_description ?? 'Default Description' }}
   </p>
   ```

   **Contoh untuk Gambar & Teks Visi:**
   ```blade
   <img src="{{ $brandStory->vision_image ? asset('storage/' . $brandStory->vision_image) : asset('img/vision-mission/smi-negative.png') }}" alt="Steril Medical Indonesia Vision" class="w-60">
   <h2 class="...">{{ $brandStory->vision_title ?? 'Brand Vision' }}</h2>
   <p class="...">{{ $brandStory->vision_description ?? 'Deskripsi Visi' }}</p>
   ```
   *(Lakukan hal yang sama untuk bagian Misi)*

   **Contoh untuk Timeline (Versi Looping untuk Mobile & PC):**
   Ganti kode div-div hardcode yang berisi tahun 1988, 2011, dst. dengan perulangan `@foreach`:
   ```blade
   <div class="mb-10 text-center">
       <h2 class="text-4xl lg:text-5xl font-bold text-blue-900 mb-4 tracking-wide">
           {{ $brandStory->timeline_title ?? 'Awal Perjalanan Brand' }}
       </h2>
       <p class="text-gray-800 font-bold text-sm md:text-base tracking-wide">
           {{ $brandStory->timeline_subtitle ?? 'Subtitle default' }}
       </p>
   </div>

   {{-- LOOPING UNTUK ITEM TIMELINE --}}
   @if(!empty($brandStory->timeline_items) && is_array($brandStory->timeline_items))
       @foreach($brandStory->timeline_items as $item)
           <div class="relative pl-12 pb-10">
               {{-- Element styling timeline ... --}}
               <h4 class="font-bold text-gray-900 text-lg md:text-xl">{{ $item['year'] ?? '' }}</h4>
               <p class="text-sm md:text-base italic text-gray-700 mt-1">
                   {{ $item['description'] ?? '' }}
               </p>
           </div>
       @endforeach
   @endif
   ```
   > **Catatan:** Jangan lupa lakukan `php artisan storage:link` agar gambar hasil upload dari Filament bisa diakses melalui URL `asset('storage/...')`.

---

## Kriteria Sukses (Acceptance Criteria)
1. Migration dan Model `BrandStory` berhasil dibuat.
2. Menu "Brand Story" muncul di sidebar admin panel Filament v3.
3. Form di Filament dapat menyimpan dan memperbarui teks, gambar, dan list timeline (repeater) dengan baik ke dalam 1 record database.
4. Halaman frontend `/brand-story` menampilkan data terbaru sesuai yang diinputkan dari admin panel Filament, bukan data hardcode.
5. Gambar yang diupload dari Filament dapat dirender dengan baik (image storage terhubung).

## Referensi Dokumentasi
- Filament v3 Singletons: [https://filamentphp.com/docs/3.x/panels/resources/singletons](https://filamentphp.com/docs/3.x/panels/resources/singletons)
- Filament v3 Repeater Field: [https://filamentphp.com/docs/3.x/forms/fields/repeater](https://filamentphp.com/docs/3.x/forms/fields/repeater)
