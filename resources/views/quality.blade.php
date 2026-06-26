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
                Lorem ipsum. <br class="hidden md:inline">
                <span class="text-blue-950 bg-clip-text">Lorem
                    ipsum dolor sit, amet consectetur adipisicing elit.</span>
            </h1>
            <p class="text-base md:text-lg lg:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed mb-8">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Est sed minus cupiditate ipsa ullam nostrum
                inventore rerum laborum incidunt! Suscipit iure quia fugiat quas vero!
            </p>
        </div>

        <div class="max-w-6xl mx-auto px-2 py-2 flex justify-center items-center">
            <div
                class="w-full max-w-xs md:max-w-2xl lg:max-w-4xl rounded-2xl shadow-xl border border-slate-100 transition-transform transform-gpu duration-300 hover:scale-105">
                <img src="{{ asset('img/quality/piagam.jpeg') }}" alt="Piagam Steril Medical"
                    class="w-full h-auto object-contain rounded-xl">
            </div>

        </div>

        <div class="w-full p-10 bg-blue-950 mt-15 lg:mt-20 transform-gpu">
            <div class="max-w-6xl w-full mx-auto transform-gpu">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 lg:gap-4">
                    <div class="w-full p-4 flex flex-col justify-center">
                        <h3
                            class="text-2xl md:text-4xl text-center md:text-left leading-tight tracking-tight font-bold text-white p-2">
                            Perlengkapan Medis untuk Seluruh Komunitas
                        </h3>
                        <p class="text-base text-center md:text-left md:text-xl text-gray-300 p-2">
                            Steril Medical memasok perlengkapan medis ke rumah sakit, laboratorium, klinik, layanan
                            perawatan
                            dirumah, tenaga medis, instansi pemerintah, dan lembaga medis
                        </p>
                    </div>

                    <div
                        class="w-full p-4 grid gap-2 grid-cols-1 lg:grid-cols-2 transition-transform duration-300 hover:scale-100">
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
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="max-w-6xl w-full mx-auto mt-15 lg:mt-20 transform-gpu p-5">

            <!-- Bagian Judul -->
            <div class="mb-10 w-full flex justify-center">
                <p
                    class="text-2xl md:text-4xl text-center lg:text-left leading-tight tracking-tight font-bold text-blue-950">
                    Dipercaya Oleh Para Pemimpin Industri
                </p>
            </div>

            <!-- Bagian Slider Logo -->
            <div class="relative w-full px-8 sm:px-12">

                <!-- Tombol Geser Kiri (Panah transparan/abu-abu tipis seperti digambar) -->
                <button id="prevPartner"
                    class="absolute left-0 top-1/2 -translate-y-1/2 z-10 text-gray-200 hover:text-gray-400 focus:outline-none transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m15 18-6-6 6-6" />
                    </svg>
                </button>

                <!-- Container Logo (Bisa di-scroll) -->
                <div id="partnerContainer"
                    class="flex items-center justify-between gap-12 overflow-x-auto hide-scrollbar snap-x snap-mandatory scroll-smooth pb-4">

                    <!-- Ganti src dengan asset logomu -->
                    <!-- Item 1 -->
                    <div class="flex-none w-32 md:w-40 lg:w-48 snap-center flex justify-center items-center">
                        <img src="{{ asset('img/quality/Akurat.png') }}" alt="Polyclinics SingHealth"
                            class="max-w-full h-auto object-contain hover:scale-105 transition-transform duration-300">
                    </div>

                    <!-- Item 2 -->
                    <div class="flex-none w-32 md:w-40 lg:w-48 snap-center flex justify-center items-center">
                        <img src="{{ asset('img/quality/Arjoena.png') }}" alt="Parkway Shenton"
                            class="max-w-full h-auto object-contain hover:scale-105 transition-transform duration-300">
                    </div>

                    <!-- Item 3 -->
                    <div class="flex-none w-32 md:w-40 lg:w-48 snap-center flex justify-center items-center">
                        <img src="{{ asset('img/quality/essencia.png') }}" alt="Alexandra Hospital"
                            class="max-w-full h-auto object-contain hover:scale-105 transition-transform duration-300">
                    </div>

                    <!-- Item 4 -->
                    <div class="flex-none w-32 md:w-40 lg:w-48 snap-center flex justify-center items-center">
                        <img src="{{ asset('img/quality/logo-Onestep2.png') }}" alt="A*STAR"
                            class="max-w-full h-auto object-contain hover:scale-105 transition-transform duration-300">
                    </div>

                    <!-- Item 5 -->
                    <div class="flex-none w-32 md:w-40 lg:w-48 snap-center flex justify-center items-center">
                        <img src="{{ asset('img/quality/Logo-01.png') }}" alt="KK Women's and Children's Hospital"
                            class="max-w-full h-auto object-contain hover:scale-105 transition-transform duration-300">
                    </div>

                    <!-- Item 6 -->
                    <div class="flex-none w-32 md:w-40 lg:w-48 snap-center flex justify-center items-center">
                        <img src="{{ asset('img/quality/Logo-02.png') }}" alt="KK Women's and Children's Hospital"
                            class="max-w-full h-auto object-contain hover:scale-105 transition-transform duration-300">
                    </div>

                </div>

                <!-- Tombol Geser Kanan -->
                <button id="nextPartner"
                    class="absolute right-0 top-1/2 -translate-y-1/2 z-10 text-gray-200 hover:text-gray-400 focus:outline-none transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                </button>

            </div>
        </div> --}}

        <div class="w-full mt-15 lg:mt-20 transform-gpu">

            <div class="max-w-6xl mb-10 w-full mx-auto flex justify-center">
                <h1 class="text-2xl md:text-4xl text-center leading-tight tracking-tight font-bold text-blue-950">
                    Dipercaya Oleh Para Pemimpin Industri
                </h1>
            </div>

            <div class="relative w-full overflow-hidden bg-transparent py-4">

                <div id="marqueeInner" class="flex items-center w-max will-change-transform">
                    <div id="group1" class="flex items-center gap-30 shrink-0">
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
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
