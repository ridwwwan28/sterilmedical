@extends('layout')
@section('konten')
    <section class="relative bg-linear-to-b from-sky-50 via-white to-blue-50/30 overflow-hidden">
        <!-- Background decorative blobs -->
        <div class="absolute top-0 right-0 -mt-24 -mr-24 w-96 h-96 rounded-full bg-blue-100/40 blur-3xl pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 left-0 -mb-24 -ml-24 w-96 h-96 rounded-full bg-sky-100/50 blur-3xl pointer-events-none">
        </div>

        <div class="max-w-6xl mx-auto px-4 pt-2 sm:px-6 mt-15 lg:mt-23 lg:px-8 transform-gpu">

            <div class="w-full p-10 mb-2 lg:mb-4">
                <h3 class="text-4xl lg:text-5xl font-bold text-center text-blue-950 leading-tight tracking-tight mb-2">Lorem
                    ipsum dolor sit amet.</h3>
                <p class="text-normal text-center text-blue-950 mx-auto max-w-4xl">Lorem ipsum dolor sit amet consectetur,
                    adipisicing elit.
                    Cum ut, fuga aliquid optio voluptate iste
                    aliquam? Explicabo dolorem modi placeat!</p>
            </div>

            <div class="mb-8 flex justify-center lg:justify-end px-4">
                <div class="relative w-full max-w-xs">
                    <select id="categoryFilter"
                        class="w-full appearance-none bg-white border border-gray-200 text-blue-950 font-semibold py-3 px-4 pr-10 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all cursor-pointer">
                        <option value="all">Semua Kategori</option>
                        <option value="Umum">Umum, ICU, UGD, OK</option>
                        <option value="Obgyn">Obgyn</option>
                        <option value="Dinkes PKM">Dinkes PKM</option>
                        <option value="Homecare">Homecare</option>
                        <option value="Hemodialisa">Hemodialisa</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-blue-950">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                @foreach ($products as $prod)
                    <a href="{{ route('products.detail', $prod['slug']) }}" data-category="{{ $prod['category'] }}"
                        class="product-item relative flex flex-col bg-white rounded-3xl p-6 transition-all duration-300 border border-gray-100 shadow-xs hover:shadow-2xl hover:-translate-y-1 group">
                        <div
                            class="w-full aspect-square overflow-hidden rounded-2xl bg-gray-50 flex items-center justify-center mb-6">
                            <img src="{{ asset($prod['image']) }}" alt="{{ $prod['name'] }}"
                                class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="flex flex-col grow">
                            <span
                                class="inline-block self-start text-xs font-bold uppercase tracking-wider text-blue-600 bg-blue-50 px-3 py-1 rounded-full mb-3">
                                {{ $prod['category'] }}
                            </span>
                            <h4
                                class="text-xl font-extrabold text-blue-950 group-hover:text-blue-700 transition-colors duration-300 line-clamp-2">
                                {{ $prod['name'] }}
                            </h4>
                            <p class="mt-2 text-sm text-gray-500 line-clamp-3 leading-relaxed grow">
                                {{ $prod['description'] }}
                            </p>
                            <div
                                class="mt-6 pt-4 border-t border-gray-50 flex items-center text-blue-700 font-bold gap-1 group-hover:gap-2 transition-all duration-300">
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
                @endforeach
            </div>
        </div>
    </section>
@endsection
