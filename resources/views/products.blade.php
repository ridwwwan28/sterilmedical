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

            <div class="w-full p-10 mb-2 lg:mb-4" data-aos="fade-up">
                <h1 class="text-4xl lg:text-5xl font-bold text-center text-blue-950 leading-tight tracking-tight mb-2">
                    {{ $setting->header_title ?? 'Katalog Produk Steril Medical' }}
                </h1>
                <p class="text-normal text-center text-blue-950 mx-auto max-w-4xl">
                    {{ $setting->header_description ?? 'Pilihan perlengkapan dan peralatan medis habis pakai berkualitas tinggi.' }}
                </p>
            </div>

            <!-- Form Search & Filter Bertingkat -->
            <form id="filterForm" method="GET" action="{{ url('/produk') }}" data-aos="fade-up" data-aos-delay="100"
                class="mb-8 grid grid-cols-1 {{ count($availableCategories) > 0 ? 'md:grid-cols-3' : 'md:grid-cols-2' }} gap-4 px-4">
                <!-- Search Input -->
                <div class="relative w-full">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari nama atau deskripsi produk..."
                        class="w-full bg-white border border-gray-200 text-blue-950 font-semibold py-3 px-4 pl-10 rounded-xl shadow-xs focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all placeholder:text-gray-400 placeholder:font-normal">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>

                <!-- Select Filter Utama (Group) -->
                <div class="relative w-full">
                    <select id="groupFilter" name="group" onchange="this.form.submit()"
                        class="w-full appearance-none bg-white border border-gray-200 text-blue-950 font-semibold py-3 px-4 pr-10 rounded-xl shadow-xs focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all cursor-pointer">
                        <option value="all" {{ request('group') === 'all' || !request('group') ? 'selected' : '' }}>Semua
                            Filter Utama</option>
                        @foreach ($groups as $grp)
                            <option value="{{ $grp->id }}"
                                {{ (string) request('group') === (string) $grp->id ? 'selected' : '' }}>
                                {{ $grp->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-blue-950">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

                <!-- Select Kategori Produk (Hanya Tampil Jika Filter Utama Dipilih) -->
                @if (count($availableCategories) > 0)
                    <div class="relative w-full">
                        <select id="categoryFilter" name="category" onchange="this.form.submit()"
                            class="w-full appearance-none bg-white border border-gray-200 text-blue-950 font-semibold py-3 px-4 pr-10 rounded-xl shadow-xs focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all cursor-pointer">
                            <option value="all"
                                {{ request('category') === 'all' || !request('category') ? 'selected' : '' }}>Semua Kategori
                            </option>
                            @foreach ($availableCategories as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ (string) request('category') === (string) $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-blue-950">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </div>
                    </div>
                @endif
            </form>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
                @forelse ($products as $prod)
                    <div data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 50 }}">
                        <x-product-card :product="$prod" cardClass="product-item relative flex flex-col bg-white rounded-3xl p-6 transition-all duration-300 border border-gray-100 shadow-xs hover:shadow-2xl hover:-translate-y-1 group" />
                    </div>
                @empty
                    <div class="col-span-full text-center py-12" data-aos="fade-up">
                        <p class="text-gray-500 text-lg">Tidak ada produk ditemukan.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination Links -->
            <div class="mt-8 flex justify-center pb-16">
                {{ $products->links() }}
            </div>
        </div>
    </section>
@endsection
