@extends('layout')
@section('konten')
    <!-- Hero Section (Slider) -->
    <section id="hero" class="relative w-full h-[50vh] md:h-[60vh] lg:h-screen overflow-hidden bg-blue-950" x-data="{
        activeSlide: 0,
        slidesCount: {{ count($heroSlides) > 0 ? count($heroSlides) : 1 }},
        timer: null,
        init() {
            if (this.slidesCount > 1) {
                this.timer = setInterval(() => {
                    this.activeSlide = (this.activeSlide + 1) % this.slidesCount;
                }, 5000);
            }
        }
    }">

        @if (count($heroSlides) > 0)
            @foreach ($heroSlides as $index => $slide)
                @php
                    $slideImg = $slide->image;
                    if (\Illuminate\Support\Str::startsWith($slideImg, ['http://', 'https://'])) {
                        $slideImgUrl = $slideImg;
                    } elseif ($slideImg && \Illuminate\Support\Facades\Storage::disk('public')->exists($slideImg)) {
                        $slideImgUrl = asset('storage/' . $slideImg);
                    } else {
                        $slideImgUrl = asset($slideImg ?? 'img/hero/hero.jpg');
                    }
                @endphp
                <div x-show="activeSlide === {{ $index }}" x-transition:enter="transition ease-out duration-1000"
                    x-transition:enter-start="opacity-0 scale-105" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-700" x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95" class="absolute inset-0 w-full h-full flex items-center">

                    <!-- Background Image -->
                    <div class="absolute inset-0 z-0">
                        <img src="{{ $slideImgUrl }}" alt="Hero Slide {{ $index + 1 }}"
                            class="w-full h-full object-cover object-center">
                    </div>
                </div>
            @endforeach
        @else
            <!-- Fallback Static Hero Slide jika belum ada data di admin -->
            <div class="absolute inset-0 w-full h-full flex items-center">
                <div class="absolute inset-0 z-0">
                    <img src="{{ asset('img/hero/hero.jpg') }}" alt="Medical Image"
                        class="w-full h-full object-cover object-right lg:object-center opacity-80">
                </div>
            </div>
        @endif

        <!-- Slider Navigation Controls -->
        @if (count($heroSlides) > 1)
            <!-- Prev & Next Buttons -->
            <button @click="activeSlide = (activeSlide - 1 + slidesCount) % slidesCount"
                class="absolute left-2 md:left-4 top-1/2 -translate-y-1/2 z-30 p-2 md:p-3 rounded-full bg-black/20 hover:bg-black/40 text-white backdrop-blur-xs transition-colors focus:outline-none">
                <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button @click="activeSlide = (activeSlide + 1) % slidesCount"
                class="absolute right-2 md:right-4 top-1/2 -translate-y-1/2 z-30 p-2 md:p-3 rounded-full bg-black/20 hover:bg-black/40 text-white backdrop-blur-xs transition-colors focus:outline-none">
                <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <!-- Indicators (Dots) -->
            <div class="absolute bottom-6 inset-x-0 z-30 flex justify-center gap-3">
                <template x-for="(slide, index) in slidesCount" :key="index">
                    <button @click="activeSlide = index"
                        :class="activeSlide === index ? 'w-8 bg-blue-500' : 'w-2.5 bg-white/50 hover:bg-white/80'"
                        class="h-2.5 rounded-full transition-all duration-300 focus:outline-none">
                    </button>
                </template>
            </div>
        @endif

        <div
            class="absolute inset-x-0 bottom-0 h-24 bg-linear-to-t from-blue-50 via-blue-50/50 to-transparent z-10 pointer-events-none">
        </div>
    </section>

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
        <img src="{{ $secImgUrl }}" alt="Secondary Banner" class="w-full object-cover object-center min-h-[150px] md:min-h-[250px] max-h-[500px] lg:min-h-0 lg:max-h-none lg:h-auto">
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
                    <a href="{{ route('products.detail', $prod->slug) }}"
                        class="product-item w-full md:w-[calc(50%-1.5rem)] lg:w-[calc(25%-1.5rem)] relative flex flex-col bg-white rounded-3xl p-6 transition-all duration-300 border border-gray-100 shadow-xs hover:shadow-2xl hover:-translate-y-1 group">

                        <!-- Image -->
                        <div
                            class="relative w-full aspect-square overflow-hidden rounded-2xl bg-gray-50 flex items-center justify-center mb-6">
                            @php
                                $prodImg = $prod->image;
                                if (\Illuminate\Support\Str::startsWith($prodImg, ['http://', 'https://'])) {
                                    $prodImgUrl = $prodImg;
                                } elseif (
                                    $prodImg &&
                                    \Illuminate\Support\Facades\Storage::disk('public')->exists($prodImg)
                                ) {
                                    $prodImgUrl = asset('storage/' . $prodImg);
                                } else {
                                    $prodImgUrl = asset($prodImg ?? 'img/products/produk_1.jpg');
                                }
                            @endphp
                            <img src="{{ $prodImgUrl }}" alt="{{ $prod->name }}"
                                class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-500">
                        </div>

                        <!-- Content -->
                        <div class="flex flex-col grow">
                            <div class="flex items-center gap-2 mb-3 flex-wrap">
                                @if ($prod->category && $prod->category->group)
                                    <span
                                        class="text-[11px] font-semibold text-gray-500 bg-gray-100 px-2.5 py-0.5 rounded-full">
                                        {{ $prod->category->group->name }}
                                    </span>
                                @endif
                                <span
                                    class="text-xs font-bold uppercase tracking-wider text-blue-600 bg-blue-50 px-3 py-1 rounded-full">
                                    {{ $prod->category->name ?? 'UMUM' }}
                                </span>
                            </div>

                            <h4
                                class="text-lg font-extrabold text-blue-950 group-hover:text-blue-700 transition-colors duration-300 line-clamp-2">
                                {{ $prod->name }}
                            </h4>

                            <p class="mt-2 text-sm text-gray-500 line-clamp-3 leading-relaxed grow">
                                {{ $prod->description }}
                            </p>

                            <div
                                class="mt-6 pt-4 border-t border-gray-100 flex items-center text-blue-700 font-bold text-sm gap-1 group-hover:gap-2 transition-all duration-300">
                                <span>Lihat Detail</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-arrow-right">
                                    <path d="M5 12h14" />
                                    <path d="m12 5 7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </a>
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
