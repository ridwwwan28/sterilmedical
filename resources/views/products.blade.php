@extends('layout')
@section('konten')
    <section id="products" class="relative min-h-screen w-full bg-blue-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 pt-20 lg:pt-25 py-5 lg:px-8">

            <div class="w-full p-10 mb-2 lg:mb-4">
                <h3 class="text-4xl font-bold text-center text-blue-950 mb-2">Lorem ipsum dolor sit amet.</h3>
                <p class="text-normal text-center text-blue-950 mx-auto max-w-4xl">Lorem ipsum dolor sit amet consectetur,
                    adipisicing elit.
                    Cum ut, fuga aliquid optio voluptate iste
                    aliquam? Explicabo dolorem modi placeat!</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-10">

                <div
                    class="relative bg-white rounded-3xl p-6 group transition-all duration-300 hover:bg-gray-100 hover:shadow-2xl">
                    <img src="{{ asset('img/products/produk_1.jpg') }}" alt="">
                </div>

                <div
                    class="relative bg-white rounded-3xl p-6 group transition-all duration-300 hover:bg-gray-100 hover:shadow-2xl">
                    <img src="{{ asset('img/products/produk_2.jpg') }}" alt="">
                </div>

                <div
                    class="relative bg-white rounded-3xl p-6 group transition-all duration-300 hover:bg-gray-100 hover:shadow-2xl">
                    <img src="{{ asset('img/products/produk_3.jpg') }}" alt="">
                </div>

                <div
                    class="relative bg-white rounded-3xl p-6 group transition-all duration-300 hover:bg-gray-100 hover:shadow-2xl">
                    <img src="{{ asset('img/products/produk_4.jpg') }}" alt="">
                </div>

                <div
                    class="relative bg-white rounded-3xl p-6 group transition-all duration-300 hover:bg-gray-100 hover:shadow-2xl">
                    <img src="{{ asset('img/products/produk_5.jpg') }}" alt="">
                </div>

                <div
                    class="relative bg-white rounded-3xl p-6 group transition-all duration-300 hover:bg-gray-100 hover:shadow-2xl">
                    <img src="{{ asset('img/products/produk_6.jpg') }}" alt="">
                </div>

            </div>
        </div>
    </section>
@endsection
