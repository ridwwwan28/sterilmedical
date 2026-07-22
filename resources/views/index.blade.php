@extends('layout')
@section('konten')
    <!-- Hero Section (Slider Component) -->
    <x-hero-slider :heroSlides="$heroSlides" />

    <!-- Secondary Banner Section -->
    <section id="secondary-banner" class="w-full">
        @php
            $secImg = $homeSetting->secondary_banner_image ?? null;
            if ($secImg && \Illuminate\Support\Str::startsWith($secImg, ['http://', 'https://'])) {
                $secImgUrl = $secImg;
            } elseif ($secImg && \Illuminate\Support\Facades\Storage::disk('public')->exists($secImg)) {
                $secImgUrl = asset('storage/' . $secImg);
            } else {
                $secImgUrl = asset('img/hero/hero.jpg');
            }
        @endphp
        <img src="{{ $secImgUrl }}" alt="Secondary Banner Steril Medical" class="w-full object-cover object-center min-h-[150px] md:min-h-[250px] max-h-[500px] lg:min-h-0 lg:max-h-none lg:h-auto">
    </section>

    <!-- Featured Products Section (Maksimal 4 Produk Unggulan) -->
    <section id="featured-products" class="w-full py-16 bg-linear-to-b from-blue-50 via-white to-blue-50/40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center max-w-3xl mx-auto mb-12">
                <h2 class="text-3xl md:text-4xl font-extrabold text-blue-950 tracking-tight">
                    Produk Kami
                </h2>
                <p class="mt-3 text-base text-gray-600">
                    Koleksi produk medis pilihan yang menjadi kepercayaan utama rumah sakit dan klinik kesehatan.
                </p>
            </div>

            <!-- Products Grid -->
            <div class="flex flex-wrap justify-center gap-6 mb-12">
                @forelse($featuredProducts as $prod)
                    <x-product-card :product="$prod" cardClass="product-item w-full md:w-[calc(50%-1.5rem)] lg:w-[calc(25%-1.5rem)] relative flex flex-col bg-white rounded-3xl p-6 transition-all duration-300 border border-gray-100 shadow-xs hover:shadow-2xl hover:-translate-y-1 group" />
                @empty
                    <div class="col-span-full text-center py-12 bg-white rounded-3xl border border-gray-100">
                        <p class="text-gray-500 text-base">Belum ada produk unggulan yang dipilih.</p>
                    </div>
                @endforelse
            </div>

            <!-- View All Products CTA -->
            <div class="text-center">
                <a href="{{ url('/produk') }}"
                    class="inline-flex items-center gap-2 px-8 py-3.5 rounded-xl bg-blue-950 hover:bg-blue-900 text-white font-bold text-base shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                    <span>Lihat Semua Produk</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
@endsection
