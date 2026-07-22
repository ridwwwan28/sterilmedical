@extends('layout')

@section('konten')
    <!-- Hero Section -->
    <section
        class="relative pt-24 pb-16 lg:pt-36 lg:pb-24 bg-linear-to-b from-sky-50 via-white to-blue-50/30 overflow-hidden">
        <!-- Background decorative blobs -->
        <div class="absolute top-0 right-0 -mt-24 -mr-24 w-96 h-96 rounded-full bg-blue-100/40 blur-3xl pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 left-0 -mb-24 -ml-24 w-96 h-96 rounded-full bg-sky-100/50 blur-3xl pointer-events-none">
        </div>

        <div class="max-w-6xl mx-auto px-4 relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-blue-950 leading-tight tracking-tight mb-6 max-w-4xl mx-auto">
                {{ $quality->header_title ?? 'Lorem ipsum.' }} <br class="hidden md:inline">
                <span class="text-blue-950 bg-clip-text">{{ $quality->header_subtitle ?? 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.' }}</span>
            </h1>
            <p class="text-base md:text-lg lg:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed mb-8">
                {{ $quality->header_description ?? 'Lorem ipsum dolor sit amet...' }}
            </p>
        </div>

        <div class="max-w-6xl mx-auto px-2 py-2 flex justify-center items-center">
            <div
                class="w-full max-w-xs md:max-w-2xl lg:max-w-4xl rounded-2xl shadow-xl border border-slate-100 transition-transform transform-gpu duration-300 hover:scale-105">
                <img src="{{ $quality->certificate_image ? asset('storage/' . $quality->certificate_image) : asset('img/quality/piagam.jpeg') }}" alt="Piagam Steril Medical"
                    class="w-full h-auto object-contain rounded-xl">
            </div>
        </div>

        <!-- Achievements / Statistik Pencapaian -->
        @if(!empty($quality->achievements) && is_array($quality->achievements))
            <div class="max-w-6xl mx-auto px-4 mt-16 relative z-10">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 py-8 px-6 bg-linear-to-r from-blue-50 to-sky-50/50 rounded-3xl border border-blue-100/50 shadow-md">
                    @foreach($quality->achievements as $stat)
                        <div class="text-center flex flex-col justify-center items-center p-4">
                            <span class="text-4xl md:text-5xl font-black text-blue-950 mb-2 tracking-tight">
                                {{ $stat['value'] ?? '' }}
                            </span>
                            <span class="text-sm md:text-base font-semibold text-gray-600 uppercase tracking-wider">
                                {{ $stat['label'] ?? '' }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="w-full p-10 bg-blue-950 mt-15 lg:mt-20 transform-gpu">
            <div class="max-w-6xl w-full mx-auto transform-gpu">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 lg:gap-4">
                    <div class="w-full p-4 flex flex-col justify-center">
                        <h3
                            class="text-2xl md:text-4xl text-center md:text-left leading-tight tracking-tight font-bold text-white p-2">
                            {{ $quality->info_title ?? 'Perlengkapan Medis untuk Seluruh Komunitas' }}
                        </h3>
                        <p class="text-base text-center md:text-left md:text-xl text-gray-300 p-2">
                            {{ $quality->info_description ?? 'Steril Medical memasok perlengkapan medis ke rumah sakit, laboratorium, klinik, layanan perawatan dirumah, tenaga medis, instansi pemerintah, dan lembaga medis' }}
                        </p>
                    </div>

                    <div
                        class="w-full p-4 grid gap-2 grid-cols-1 lg:grid-cols-2 transition-transform duration-300 hover:scale-100">
                        @if(!empty($quality->info_images) && is_array($quality->info_images))
                            @foreach($quality->info_images as $img)
                                <div class="">
                                    <img src="{{ asset('storage/' . $img) }}" alt=""
                                        class="w-full h-auto object-contain rounded-xl">
                                </div>
                            @endforeach
                        @else
                            <div class="">
                                <img src="{{ asset('img/quality/photo1.jpg') }}" alt=""
                                    class="w-full h-auto object-contain rounded-xl">
                            </div>
                            <div class="">
                                <img src="{{ asset('img/quality/photo2.jpg') }}" alt=""
                                    class="w-full h-auto object-contain rounded-xl">
                            </div>
                            <div class="">
                                <img src="{{ asset('img/quality/photo3.jpg') }}" alt=""
                                    class="w-full h-auto object-contain rounded-xl">
                            </div>
                            <div class="">
                                <img src="{{ asset('img/quality/photo4.jpg') }}" alt=""
                                    class="w-full h-auto object-contain rounded-xl">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full mt-15 lg:mt-20 transform-gpu">
            <div class="max-w-6xl mb-10 w-full mx-auto flex justify-center">
                <h1 class="text-2xl md:text-4xl text-center leading-tight tracking-tight font-bold text-blue-950">
                    {{ $quality->trusted_title ?? 'Dipercaya Oleh Para Pemimpin Industri' }}
                </h1>
            </div>

            <div class="relative w-full overflow-hidden bg-transparent py-4">
                <div id="marqueeInner" class="flex items-center w-max will-change-transform">
                    <div id="group1" class="flex items-center gap-30 shrink-0">
                        @if(!empty($quality->trusted_logos) && is_array($quality->trusted_logos))
                            @foreach($quality->trusted_logos as $logo)
                                @php
                                    $logoImg = $logo['image'] ?? '';
                                    if (\Illuminate\Support\Str::startsWith($logoImg, ['http://', 'https://'])) {
                                        $logoUrl = $logoImg;
                                    } elseif (\Illuminate\Support\Facades\Storage::disk('public')->exists($logoImg)) {
                                        $logoUrl = asset('storage/' . $logoImg);
                                    } else {
                                        $logoUrl = asset($logoImg);
                                    }
                                @endphp
                                <div class="w-32 md:w-50 flex justify-center items-center">
                                    <img src="{{ $logoUrl }}" alt="{{ $logo['alt_text'] ?? '' }}"
                                        class="h-30 object-contain transition-all">
                                </div>
                            @endforeach
                        @else
                            <div class="w-32 md:w-50 flex justify-center items-center"><img
                                    src="{{ asset('img/quality/Akurat.png') }}" alt="Akurat"
                                    class="h-30 object-contain transition-all"></div>
                            <div class="w-32 md:w-50 flex justify-center items-center"><img
                                    src="{{ asset('img/quality/Arjoena.png') }}" alt="Parkway"
                                    class="h-30 object-contain transition-all"></div>
                            <div class="w-32 md:w-50 flex justify-center items-center"><img
                                    src="{{ asset('img/quality/Logo-01.png') }}" alt="Alexandra"
                                    class="h-30 object-contain transition-all"></div>
                            <div class="w-32 md:w-50 flex justify-center items-center"><img
                                    src="{{ asset('img/quality/Logo-02.png') }}" alt="A*STAR"
                                    class="h-30 object-contain transition-all"></div>
                            <div class="w-32 md:w-50 flex justify-center items-center"><img
                                    src="{{ asset('img/quality/logo-Onestep2.png') }}" alt="KK Hospital"
                                    class="h-30 object-contain transition-all"></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
