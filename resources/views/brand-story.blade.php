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

            <div class="w-full p-10 mb-2 lg:mb-4">
                <h3 class="text-4xl lg:text-5xl font-bold text-center text-blue-950 leading-tight tracking-tight mb-2">Lorem
                    ipsum dolor sit amet.</h3>
                <p class="text-normal text-center text-blue-950 mx-auto max-w-4xl">Lorem ipsum dolor sit amet consectetur,
                    adipisicing elit.
                    Cum ut, fuga aliquid optio voluptate iste
                    aliquam? Explicabo dolorem modi placeat!</p>
            </div>

            <div class="flex flex-col lg:flex-row items-center w-full">
                <div class="w-full lg:w-4/12 z-10">
                    <img src="{{ asset('img/vision-mission/vision.jpg') }}" alt="Steril Medical Vision"
                        class="w-full h-auto object-cover rounded-2xl shadow-lg aspect-4/3 lg:aspect-5/4">
                </div>

                <div
                    class="w-full lg:w-8/12 bg-sky-700 text-white rounded-3xl p-8 lg:p-12 lg:-ml-12 z-0 mt-6 lg:mt-0 shadow-md">
                    <div class="lg:pl-16 flex flex-col items-center lg:items-end text-center lg:text-right">
                        <img src="{{ asset('img/vision-mission/smi-negative.png') }}" alt="Steril Medical Indonesia Vision"
                            class="w-60">
                        <h2 class="text-2xl sm:text-3xl lg:text-5xl font-bold tracking-wider uppercase mb-4 leading-snug">
                            Brand Vision
                        </h2>
                        <p class="text-base sm:text-lg lg:text-xl font-medium leading-relaxed text-gray-100">
                            Menciptakan dunia yang lebih sehat dengan pengalaman perawatan kesehatan yang cerdas.
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col-reverse lg:flex-row items-center w-full mt-4 lg:mt-0">
                <div
                    class="w-full lg:w-8/12 bg-sky-700 text-white rounded-3xl p-8 lg:p-12 lg:-mr-12 z-0 mt-6 lg:mt-0 shadow-md">
                    <div class="lg:pr-16 flex flex-col items-center lg:items-start text-center lg:text-left">
                        <img src="{{ asset('img/vision-mission/smi-negative.png') }}" alt="Steril Medical Indonesia Mission"
                            class="w-60">
                        <h2 class="text-2xl sm:text-3xl lg:text-5xl font-bold tracking-wider uppercase mb-4 leading-snug">
                            Brand Mission
                        </h2>
                        <p class="text-base sm:text-lg lg:text-xl font-medium leading-relaxed text-gray-100">
                            Meningkatkan kesehatan manusia dengan menyediakan produk medis sekali pakai yang unggul
                            untuk mendukung penyedia layanan kesehatan
                        </p>
                    </div>
                </div>

                <div class="w-full lg:w-4/12 z-10">
                    <img src="{{ asset('img/vision-mission/mision.jpg') }}" alt="Steril Medical Mission"
                        class="w-full h-auto object-cover rounded-2xl shadow-lg aspect-video lg:aspect-4/3 bg-white">
                </div>
            </div>
        </div>

        <!-- Brand Story Mobile-->
        <div class="lg:hidden w-full py-20 overflow-hidden">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="mb-10 text-center">
                    <h2 class="text-4xl lg:text-5xl  font-bold text-blue-900 mb-4 tracking-wide">
                        Awal Perjalanan Brand Steril Medical
                    </h2>
                    <p class="text-gray-800 font-bold text-sm md:text-base tracking-wide">
                        Kami memulai perjalanan ini dengan penuh keyakinan
                    </p>
                </div>

                <div class="flex flex-col lg:flex-row gap-12 lg:gap-20 items-start">

                    <div class="w-full">

                        <div class="mt-8 flex flex-col">

                            <div class="relative pl-12 pb-10">
                                <div class="absolute left-2.75 top-2 -bottom-2 w-0.5 bg-blue-900 z-0"></div>
                                <div
                                    class="absolute left-0.5 top-1 w-5 h-5 rounded-full border-4 border-blue-900 bg-white z-10">
                                </div>
                                <h4 class="font-bold text-gray-900 text-lg md:text-xl">1988</h4>
                                <p class="text-sm md:text-base italic text-gray-700 mt-1">
                                    Sejak Tahun 1988. Bersama-sama, kami memproduksi dan mendistribusi alat kesehatan habis
                                    pakai yang berkualitas dan steril pada saat penggunaan
                                </p>
                            </div>

                            <div class="relative pl-12 pb-10">
                                <div class="absolute left-2.75 top-2 -bottom-2 w-0.5 bg-blue-900 z-0"></div>
                                <div
                                    class="absolute left-0.5 top-1 w-5 h-5 rounded-full border-4 border-blue-900 bg-white z-10">
                                </div>
                                <h4 class="font-bold text-gray-900 text-lg md:text-xl">2011</h4>
                                <p class="text-sm md:text-base italic text-gray-700 mt-1">
                                    Pada Tahun 2011 berdirilah PT STERIL MEDICAL INDONESIA
                                </p>
                            </div>

                            <div class="relative pl-12 pb-10">
                                <div class="absolute left-2.75 top-2 -bottom-2 w-0.5 bg-blue-900 z-0"></div>
                                <div
                                    class="absolute left-0.5 top-1 w-5 h-5 rounded-full border-4 border-blue-900 bg-white z-10">
                                </div>
                                <h4 class="font-bold text-gray-900 text-lg md:text-xl">2013</h4>
                                <p class="text-sm md:text-base italic text-gray-700 mt-1">
                                    Sejalan dengan perkembangan bisnis didirikan PT. STERIL MEDICAL INDUSTRI dengan
                                    kerjasama dengan PT. STERIL MEDICAL Ltd untuk mendukung alat kesehatan dalam negeri
                                </p>
                            </div>

                            <div class="relative pl-12 pb-10">
                                <div class="absolute left-2.75 top-2 -bottom-2 w-0.5 bg-blue-900 z-0"></div>
                                <div
                                    class="absolute left-0.5 top-1 w-5 h-5 rounded-full border-4 border-blue-900 bg-white z-10">
                                </div>
                                <h4 class="font-bold text-gray-900 text-lg md:text-xl">2017</h4>
                                <p class="text-sm md:text-base italic text-gray-700 mt-1">
                                    Pada tahun ini mulai membangun pasar indonesia untuk produk alat kesehatan habis pakai
                                    yang di import dari PT STERIL MEDICAL Ltd
                                </p>
                            </div>

                            <div class="relative pl-12 pb-10">
                                <div class="absolute left-2.75 top-2 -bottom-2 w-0.5 bg-blue-900 z-0"></div>
                                <div
                                    class="absolute left-0.5 top-1 w-5 h-5 rounded-full border-4 border-blue-900 bg-white z-10">
                                </div>
                                <h4 class="font-bold text-gray-900 text-lg md:text-xl">2018</h4>
                                <p class="text-sm md:text-base italic text-gray-700 mt-1">
                                    Dengan perkembangan PT. STERIL MEDICAL INDONESIA kami membangun jaringan penjualan
                                    nasional dan juga business to business
                                </p>
                            </div>

                            <div class="relative pl-12">
                                <div
                                    class="absolute left-0.5 top-1 w-5 h-5 rounded-full border-4 border-blue-900 bg-white z-10">
                                </div>
                                <h4 class="font-bold text-gray-900 text-lg md:text-xl">2025</h4>
                                <p class="text-sm md:text-base italic text-gray-700 mt-1">
                                    Penggabungan PT. STERIL MEDICAL INDONESIA dengan PT. DANPAC PHARMA
                                </p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Brand Story PC -->
        <div class="hidden lg:flex w-full py-20 overflow-hidden">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="flex flex-col md:flex-row items-center justify-center mb-16">
                    <div class="w-full md:w-1/2 text-center">
                        <h2 class="text-5xl font-bold text-blue-900 mb-4">
                            Awal Perjalanan Brand Steril Medical
                        </h2>
                        <p class="text-gray-800 font-semibold text-sm md:text-base">
                            Kami memulai perjalanan ini dengan penuh keyakinan
                        </p>
                    </div>
                </div>

                <div class="relative w-full group">

                    <button id="slideLeft"
                        class="absolute left-0 lg:-left-6 top-[26px] -translate-y-1/2 z-20 w-10 h-10 bg-white border border-gray-200 rounded-full flex items-center justify-center shadow-md hover:bg-gray-100 hover:scale-110 transition-all focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="text-blue-900">
                            <path d="m15 18-6-6 6-6" />
                        </svg>
                    </button>

                    <div id="timelineContainer"
                        class="flex flex-row overflow-x-auto hide-scrollbar snap-x snap-mandatory pb-8 pt-4 scroll-smooth">

                        <div class="relative flex-none w-72 sm:w-80 px-4 snap-start pt-8">
                            <div class="absolute top-2.25 left-1/2 w-full h-0.5 bg-blue-900 z-0"></div>
                            <div
                                class="absolute top-0 left-1/2 -translate-x-1/2 w-5 h-5 rounded-full border-4 border-blue-900 bg-white z-10">
                            </div>
                            <div class="text-center mt-6">
                                <h4 class="font-bold text-gray-900 text-lg md:text-xl mb-2">1988</h4>
                                <p class="text-sm italic text-gray-700 leading-relaxed">
                                    Sejak Tahun 1988. Bersama-sama, kami memproduksi dan mendistribusi alat kesehatan habis
                                    pakai yang berkualitas dan steril pada saat penggunaan
                                </p>
                            </div>
                        </div>

                        <div class="relative flex-none w-72 sm:w-80 px-4 snap-start pt-8">
                            <div class="absolute top-2.25 left-1/2 w-full h-0.5 bg-blue-900 z-0"></div>
                            <div
                                class="absolute top-0 left-1/2 -translate-x-1/2 w-5 h-5 rounded-full border-4 border-blue-900 bg-white z-10">
                            </div>
                            <div class="text-center mt-6">
                                <h4 class="font-bold text-gray-900 text-lg md:text-xl mb-2">2011</h4>
                                <p class="text-sm italic text-gray-700 leading-relaxed">
                                    Pada Tahun 2011 berdirilah PT STERIL MEDICAL INDONESIA
                                </p>
                            </div>
                        </div>

                        <div class="relative flex-none w-72 sm:w-80 px-4 snap-start pt-8">
                            <div class="absolute top-2.25 left-1/2 w-full h-0.5 bg-blue-900 z-0"></div>
                            <div
                                class="absolute top-0 left-1/2 -translate-x-1/2 w-5 h-5 rounded-full border-4 border-blue-900 bg-white z-10">
                            </div>
                            <div class="text-center mt-6">
                                <h4 class="font-bold text-gray-900 text-lg md:text-xl mb-2">2013</h4>
                                <p class="text-sm italic text-gray-700 leading-relaxed">
                                    Sejalan dengan perkembangan bisnis didirikan PT. STERIL MEDICAL INDUSTRI dengan
                                    kerjasama
                                    dengan PT. STERIL MEDICAL Ltd untuk mendukung alat kesehatan dalam negeri
                                </p>
                            </div>
                        </div>

                        <div class="relative flex-none w-72 sm:w-80 px-4 snap-start pt-8">
                            <div class="absolute top-2.25 left-1/2 w-full h-0.5 bg-blue-900 z-0"></div>
                            <div
                                class="absolute top-0 left-1/2 -translate-x-1/2 w-5 h-5 rounded-full border-4 border-blue-900 bg-white z-10">
                            </div>
                            <div class="text-center mt-6">
                                <h4 class="font-bold text-gray-900 text-lg md:text-xl mb-2">2017</h4>
                                <p class="text-sm italic text-gray-700 leading-relaxed">
                                    Pada tahun ini mulai membangun pasar indonesia untuk produk alat kesehatan habis pakai
                                    yang
                                    di import dari PT STERIL MEDICAL Ltd
                                </p>
                            </div>
                        </div>

                        <div class="relative flex-none w-72 sm:w-80 px-4 snap-start pt-8">
                            <div class="absolute top-2.25 left-1/2 w-full h-0.5 bg-blue-900 z-0"></div>
                            <div
                                class="absolute top-0 left-1/2 -translate-x-1/2 w-5 h-5 rounded-full border-4 border-blue-900 bg-white z-10">
                            </div>
                            <div class="text-center mt-6">
                                <h4 class="font-bold text-gray-900 text-lg md:text-xl mb-2">2018</h4>
                                <p class="text-sm italic text-gray-700 leading-relaxed">
                                    Dengan perkembangan PT. STERIL MEDICAL INDONESIA kami membangun jaringan penjualan
                                    nasional
                                    dan juga business to business
                                </p>
                            </div>
                        </div>

                        <div class="relative flex-none w-72 sm:w-80 px-4 snap-start pt-8">
                            <div
                                class="absolute top-0 left-1/2 -translate-x-1/2 w-5 h-5 rounded-full border-4 border-blue-900 bg-white z-10">
                            </div>
                            <div class="text-center mt-6">
                                <h4 class="font-bold text-gray-900 text-lg md:text-xl mb-2">2025</h4>
                                <p class="text-sm italic text-gray-700 leading-relaxed">
                                    Penggabungan PT. STERIL MEDICAL INDONESIA dengan PT. DANPAC PHARMA
                                </p>
                            </div>
                        </div>

                    </div>

                    <button id="slideRight"
                        class="absolute right-0 lg:-right-6 top-[26px] -translate-y-1/2 z-20 w-10 h-10 bg-white border border-gray-200 rounded-full flex items-center justify-center shadow-md hover:bg-gray-100 hover:scale-110 transition-all focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="text-blue-900">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </button>

                </div>
            </div>
        </div>
    </section>
@endsection
