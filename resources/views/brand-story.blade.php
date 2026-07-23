@extends('layout')
@section('konten')
    <!-- Visi Misi Section -->
    <section class="relative bg-linear-to-b from-sky-50 via-white to-blue-50/30 overflow-hidden">
        <!-- Background decorative blobs -->
        <div class="absolute top-0 right-0 -mt-24 -mr-24 w-96 h-96 rounded-full bg-blue-100/40 blur-3xl pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 left-0 -mb-24 -ml-24 w-96 h-96 rounded-full bg-sky-100/50 blur-3xl pointer-events-none">
        </div>

        <div class="max-w-6xl mx-auto px-4 pt-2 flex flex-col gap-16 mt-15 lg:mt-23 lg:gap-12 transform-gpu">

            <div class="w-full p-10 mb-2 lg:mb-4" data-aos="fade-up">
                <h1 class="text-4xl lg:text-5xl font-bold text-center text-blue-950 leading-tight tracking-tight mb-2">
                    {{ $brandStory->header_title ?? 'Cerita Merk Steril Medical' }}
                </h1>
                <p class="text-normal text-center text-blue-950 mx-auto max-w-4xl">
                    {{ $brandStory->header_description ?? 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum ut, fuga aliquid optio voluptate iste aliquam? Explicabo dolorem modi placeat!' }}
                </p>
            </div>

            <div class="w-full flex flex-col lg:flex-row gap-4">
                <div data-aos="fade-right"
                    class="bg-blue-950 text-white rounded-3xl px-6 py-10 flex flex-col items-center text-center w-full lg:w-1/2">
                    <img src="{{ $brandStory->vision_image ? asset('storage/' . $brandStory->vision_image) : asset('img/vision-mission/smi-negative.png') }}"
                        alt="Steril Medical Indonesia Vision" class="w-60 max-h-36 object-contain mb-4">
                    <h2 class="text-2xl sm:text-3xl lg:text-5xl font-bold tracking-wider uppercase mb-4 leading-snug">
                        {{ $brandStory->vision_title ?? 'Brand Vision' }}
                    </h2>
                    <p class="text-base sm:text-lg lg:text-xl font-medium leading-relaxed text-gray-100">
                        {{ $brandStory->vision_description ?? 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, nesciunt. Perspiciatis ipsum neque sequi ullam reiciendis dignissimos assumenda quo iusto?' }}
                    </p>
                </div>

                <div data-aos="fade-left"
                    class="bg-blue-950 text-white rounded-3xl px-6 py-10 flex flex-col items-center text-center w-full lg:w-1/2">
                    <img src="{{ $brandStory->mission_image ? asset('storage/' . $brandStory->mission_image) : asset('img/vision-mission/smi-negative.png') }}"
                        alt="Steril Medical Indonesia Mission" class="w-60 max-h-36 object-contain mb-4">
                    <h2 class="text-2xl sm:text-3xl lg:text-5xl font-bold tracking-wider uppercase mb-4 leading-snug">
                        {{ $brandStory->mission_title ?? 'Brand Mission' }}
                    </h2>
                    <p class="text-base sm:text-lg lg:text-xl font-medium leading-relaxed text-gray-100">
                        {{ $brandStory->mission_description ?? 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Saepe adipisci, numquam deleniti architecto voluptates repudiandae? Excepturi eligendi aliquid ad repellat.' }}
                    </p>
                </div>
            </div>

        </div>

        <!-- Brand Story Mobile-->
        <div class="lg:hidden w-full py-20 overflow-hidden" data-aos="fade-up">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="mb-10 text-center">
                    <h2 class="text-4xl lg:text-5xl  font-bold text-blue-900 mb-4 tracking-wide">
                        {{ $brandStory->timeline_title ?? 'Awal Perjalanan Brand Steril Medical' }}
                    </h2>
                    <p class="text-gray-800 font-bold text-sm md:text-base tracking-wide">
                        {{ $brandStory->timeline_subtitle ?? 'Kami memulai perjalanan ini dengan penuh keyakinan' }}
                    </p>
                </div>

                <div class="flex flex-col lg:flex-row gap-12 lg:gap-20 items-start">

                    <div class="w-full">

                        <div class="mt-8 flex flex-col">
                            @if (!empty($brandStory->timeline_items) && is_array($brandStory->timeline_items))
                                @foreach ($brandStory->timeline_items as $index => $item)
                                    <div class="relative pl-12 pb-10">
                                        @if (!$loop->last)
                                            <div class="absolute left-2.75 top-2 -bottom-2 w-0.5 bg-blue-900 z-0"></div>
                                        @endif
                                        <div
                                            class="absolute left-0.5 top-1 w-5 h-5 rounded-full border-4 border-blue-900 bg-white z-10">
                                        </div>
                                        <h4 class="font-bold text-gray-900 text-lg md:text-xl">{{ $item['year'] ?? '' }}
                                        </h4>
                                        <p class="text-sm md:text-base italic text-gray-700 mt-1">
                                            {{ $item['description'] ?? '' }}
                                        </p>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Brand Story PC -->
        <div class="hidden lg:flex w-full py-20 overflow-hidden" data-aos="fade-up">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="flex flex-col md:flex-row items-center justify-center mb-16">
                    <div class="w-full md:w-1/2 text-center">
                        <h2 class="text-5xl font-bold text-blue-900 mb-4">
                            {{ $brandStory->timeline_title ?? 'Awal Perjalanan Brand Steril Medical' }}
                        </h2>
                        <p class="text-gray-800 font-semibold text-sm md:text-base">
                            {{ $brandStory->timeline_subtitle ?? 'Kami memulai perjalanan ini dengan penuh keyakinan' }}
                        </p>
                    </div>
                </div>

                <div class="relative w-full group">

                    <button id="slideLeft"
                        class="absolute left-0 lg:-left-6 top-6.5 -translate-y-1/2 z-20 w-10 h-10 bg-white border border-gray-200 rounded-full flex items-center justify-center shadow-md hover:bg-gray-100 hover:scale-110 transition-all focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="text-blue-900">
                            <path d="m15 18-6-6 6-6" />
                        </svg>
                    </button>

                    <div id="timelineContainer"
                        class="flex flex-row overflow-x-auto hide-scrollbar snap-x snap-mandatory pb-8 pt-4 scroll-smooth">

                        @if (!empty($brandStory->timeline_items) && is_array($brandStory->timeline_items))
                            @foreach ($brandStory->timeline_items as $index => $item)
                                <div class="relative flex-none w-72 sm:w-80 px-4 snap-start pt-8">
                                    @if (!$loop->last)
                                        <div class="absolute top-2.25 left-1/2 w-full h-0.5 bg-blue-900 z-0"></div>
                                    @endif
                                    <div
                                        class="absolute top-0 left-1/2 -translate-x-1/2 w-5 h-5 rounded-full border-4 border-blue-900 bg-white z-10">
                                    </div>
                                    <div class="text-center mt-6">
                                        <h4 class="font-bold text-gray-900 text-lg md:text-xl mb-2">
                                            {{ $item['year'] ?? '' }}</h4>
                                        <p class="text-sm italic text-gray-700 leading-relaxed">
                                            {{ $item['description'] ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>

                    <button id="slideRight"
                        class="absolute right-0 lg:-right-6 top-6.5 -translate-y-1/2 z-20 w-10 h-10 bg-white border border-gray-200 rounded-full flex items-center justify-center shadow-md hover:bg-gray-100 hover:scale-110 transition-all focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="text-blue-900">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </button>

                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="max-w-6xl py-20 mx-auto px-4 sm:px-6 lg:px-8 transform-gpux" data-aos="zoom-in">
            <div class="mb-10 text-center">
                <h2 class="text-4xl font-bold text-blue-900 mb-4 tracking-wide">
                    Persebaran Produk Kami
                </h2>
                <p class="text-gray-800 font-semibold text-base">
                    Tersedia di berbagai kota besar di seluruh Indonesia
                </p>
            </div>

            <div id="map" class="w-full h-[500px] rounded-3xl shadow-lg border border-gray-200 z-0"></div>
        </div>
    </section>


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Inisialisasi Peta (Center default ke tengah Indonesia)
            var map = L.map('map').setView([-2.5489, 118.0148], 5);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            // Ambil data kota dari PHP
            var productCities = @json($brandStory->product_cities ?? []);

            if (productCities && productCities.length > 0) {
                productCities.forEach(function(item) {
                    if (item.latitude && item.longitude && item.city) {
                        var marker = L.marker([parseFloat(item.latitude), parseFloat(item.longitude)])
                            .addTo(map);
                        marker.bindPopup(`<b>Produk Tersedia di:</b><br>${item.city}`);
                    }
                });
            }
        });
    </script>
@endsection
