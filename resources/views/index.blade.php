@extends('layout')
@section('konten')
    <!-- Hero Section -->
    <section id="hero" class="relative h-screen w-full flex items-center bg-transparent">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('img/hero/hero.jpg') }}" alt="Medical Image"
                class="w-full h-full object-cover object-right lg:object-center opacity-80">
        </div>

        <div class="absolute inset-x-0 bottom-0 h-48 bg-linear-to-t from-blue-50 via-white/70 to-transparent z-10">
        </div>

        <div class="relative z-20 w-full max-w-full mx-auto px-4 sm:px-6 lg:px-8 pt-16">
            <div class="max-w-6xl mx-auto lg:px-8">
                <div class="">
                    <img src="{{ asset('img/hero/smi_logo.png') }}" alt="Steril Medical Indonesia" class="w-xl">
                </div>

                <h1 class="text-3xl md:text-4xl lg:text-5xl text-blue-900 font-medium tracking-wide">
                    <span
                        class="text-3xl md:text-4xl lg:text-5xl font-extrabold italic mt-2 block leading-tight text-shadow-lg/20">
                        A Smart Medical Disposable Solution
                    </span>
                </h1>

                <p class="mt-4 text-shadow-lg/20 text-blue-950 font-normal text-sm lg:text-xl">
                    Kami lebih dari sekedar penyedia produk medis, kami membantu meningkatkan kinerja layanan kesehatan
                    dengan solusi cerdas. Kami memastikan untuk mengoptimalkan kinerja para profesional kesehatan,
                    karena kami peduli dengan masa depan dunia yang lebih sehat
                </p>
            </div>
        </div>
    </section>

    <section id="products" class="w-full py-16 bg-blue-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            <a href="/produk?category=umum"
                class="flex flex-col md:flex-row bg-white rounded-2xl shadow-sm hover:shadow-lg transition-shadow duration-300 border border-gray-100 overflow-hidden group">
                <div class="md:w-1/5 p-6 md:p-8 flex items-center justify-center bg-white">
                    <img src="{{ asset('img/hero/smi_logo.png') }}" alt="Steril Medical"
                        class="max-h-12 md:max-h-16 object-contain">
                </div>
                <div class="md:w-1/4 p-6 flex items-center justify-center bg-white text-[#25345d] relative overflow-hidden">
                    <div class="absolute inset-0 bg-white/0 group-hover:bg-white/10 transition-colors duration-300"></div>
                    <h3 class="font-bold text-xl md:text-2xl tracking-wider text-center relative z-10">UMUM<br>ICU, UGD, OK
                    </h3>
                </div>
                <div class="md:w-[55%] p-6 md:p-8 flex flex-row items-center justify-center gap-6 md:gap-12 bg-[#25345d]">
                    <img src="{{ asset('img/products/product-umum.png') }}" alt="Umum Kit"
                        class="h-24 md:h-32 w-auto object-contain hover:scale-110 transition-transform duration-300 cursor-pointer">
                </div>
            </a>

            <a href="/produk?category=obgyn"
                class="flex flex-col md:flex-row bg-white rounded-2xl shadow-sm hover:shadow-lg transition-shadow duration-300 border border-gray-100 overflow-hidden group">
                <div class="md:w-1/5 p-6 md:p-8 flex items-center justify-center bg-white">
                    <img src="{{ asset('img/hero/smi_logo.png') }}" alt="Steril Medical"
                        class="max-h-12 md:max-h-16 object-contain">
                </div>
                <div class="md:w-1/4 p-6 flex items-center justify-center bg-white text-[#25345d] relative overflow-hidden">
                    <div class="absolute inset-0 bg-white/0 group-hover:bg-white/10 transition-colors duration-300"></div>
                    <h3 class="font-bold text-xl md:text-2xl tracking-wider text-center relative z-10">OBGYN</h3>
                </div>
                <div class="md:w-[55%] p-6 md:p-8 flex flex-row items-center justify-center gap-6 md:gap-12 bg-[#25345d]">
                    <img src="{{ asset('img/products/product-umum.png') }}" alt="Umum Kit"
                        class="h-24 md:h-32 w-auto object-contain hover:scale-110 transition-transform duration-300 cursor-pointer">
                </div>
            </a>

            <a href="/produk?category=dinkes pkm"
                class="flex flex-col md:flex-row bg-white rounded-2xl shadow-sm hover:shadow-lg transition-shadow duration-300 border border-gray-100 overflow-hidden group">
                <div class="md:w-1/5 p-6 md:p-8 flex items-center justify-center bg-white">
                    <img src="{{ asset('img/hero/smi_logo.png') }}" alt="Steril Medical"
                        class="max-h-12 md:max-h-16 object-contain">
                </div>
                <div class="md:w-1/4 p-6 flex items-center justify-center bg-white text-[#25345d] relative overflow-hidden">
                    <div class="absolute inset-0 bg-white/0 group-hover:bg-white/10 transition-colors duration-300"></div>
                    <h3 class="font-bold text-xl md:text-2xl tracking-wider text-center relative z-10">DINKES PKM</h3>
                </div>
                <div class="md:w-[55%] p-6 md:p-8 flex flex-row items-center justify-center gap-6 md:gap-12 bg-[#25345d]">
                    <img src="{{ asset('img/products/product-umum.png') }}" alt="Umum Kit"
                        class="h-24 md:h-32 w-auto object-contain hover:scale-110 transition-transform duration-300 cursor-pointer">
                </div>
            </a>

            <a href="/produk?category=homecare"
                class="flex flex-col md:flex-row bg-white rounded-2xl shadow-sm hover:shadow-lg transition-shadow duration-300 border border-gray-100 overflow-hidden group">
                <div class="md:w-1/5 p-6 md:p-8 flex items-center justify-center bg-white">
                    <img src="{{ asset('img/hero/smi_logo.png') }}" alt="Steril Medical"
                        class="max-h-12 md:max-h-16 object-contain">
                </div>
                <div class="md:w-1/4 p-6 flex items-center justify-center bg-white text-[#25345d] relative overflow-hidden">
                    <div class="absolute inset-0 bg-white/0 group-hover:bg-white/10 transition-colors duration-300"></div>
                    <h3 class="font-bold text-xl md:text-2xl tracking-wider text-center relative z-10">HOMECARE</h3>
                </div>
                <div class="md:w-[55%] p-6 md:p-8 flex flex-row items-center justify-center gap-6 md:gap-12 bg-[#25345d]">
                    <img src="{{ asset('img/products/product-umum.png') }}" alt="Umum Kit"
                        class="h-24 md:h-32 w-auto object-contain hover:scale-110 transition-transform duration-300 cursor-pointer">
                </div>
            </a>

            <a href="/produk?category=hemodialisa"
                class="flex flex-col md:flex-row bg-white rounded-2xl shadow-sm hover:shadow-lg transition-shadow duration-300 border border-gray-100 overflow-hidden group">
                <div class="md:w-1/5 p-6 md:p-8 flex items-center justify-center bg-white">
                    <img src="{{ asset('img/hero/smi_logo.png') }}" alt="Steril Medical"
                        class="max-h-12 md:max-h-16 object-contain">
                </div>
                <div class="md:w-1/4 p-6 flex items-center justify-center bg-white text-[#25345d] relative overflow-hidden">
                    <div class="absolute inset-0 bg-white/0 group-hover:bg-white/10 transition-colors duration-300"></div>
                    <h3 class="font-bold text-xl md:text-2xl tracking-wider text-center relative z-10">HEMODIALISA</h3>
                </div>
                <div class="md:w-[55%] p-6 md:p-8 flex flex-row items-center justify-center gap-6 md:gap-12 bg-[#25345d]">
                    <img src="{{ asset('img/products/product-umum.png') }}" alt="Umum Kit"
                        class="h-24 md:h-32 w-auto object-contain hover:scale-110 transition-transform duration-300 cursor-pointer">
                </div>
            </a>

        </div>
    </section>
@endsection
