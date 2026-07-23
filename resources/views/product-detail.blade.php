@extends('layout')

@section('konten')
    <div class="relative min-h-screen w-full bg-blue-50 pt-24 lg:pt-28 pb-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Product Showcase Box -->
            <div class="bg-white rounded-3xl shadow-xs border border-gray-100 overflow-hidden mb-12">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12 p-6 sm:p-8 lg:p-12">

                    <!-- Left: Product Image -->
                    <div class="flex flex-col space-y-4" data-aos="zoom-in">
                        <div
                            class="relative w-full aspect-square bg-gray-50 rounded-2xl border border-gray-100 flex items-center justify-center overflow-hidden group">
                            @php
                                $prodImg = $product->image;
                                if (\Illuminate\Support\Str::startsWith($prodImg, ['http://', 'https://'])) {
                                    $prodImgUrl = $prodImg;
                                } elseif ($prodImg && \Illuminate\Support\Facades\Storage::disk('public')->exists($prodImg)) {
                                    $prodImgUrl = asset('storage/' . $prodImg);
                                } else {
                                    $prodImgUrl = asset($prodImg ?? 'img/products/produk_1.jpg');
                                }
                            @endphp
                            <img src="{{ $prodImgUrl }}" alt="{{ $product->name }}"
                                class="object-cover w-full h-full group-hover:scale-102 transition-transform duration-500">

                            <!-- Category Float Badge -->
                            <div
                                class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-bold uppercase tracking-wider px-3.5 py-1.5 rounded-full shadow-md">
                                {{ $product->category->name ?? '' }}
                            </div>
                        </div>
                    </div>

                    <!-- Right: Product Information -->
                    <div class="flex flex-col justify-between" data-aos="fade-left" data-aos-delay="100">
                        <div>
                            <div class="flex items-center gap-2 mb-2 flex-wrap">
                                @if($product->is_featured)
                                    <span class="inline-flex items-center gap-1 text-xs font-black uppercase tracking-wider text-amber-950 bg-amber-400 px-3 py-0.5 rounded-full shadow-xs border border-amber-300">
                                        <svg class="w-3.5 h-3.5 fill-current text-amber-950" viewBox="0 0 24 24">
                                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                        </svg>
                                        Produk Unggulan
                                    </span>
                                @endif
                                @if($product->category && $product->category->group)
                                    <span class="text-xs font-semibold text-gray-500 bg-gray-100 px-2.5 py-0.5 rounded-full">
                                        {{ $product->category->group->name }}
                                    </span>
                                @endif
                                <span class="text-xs font-bold uppercase tracking-wider text-blue-600 bg-blue-50 px-2.5 py-0.5 rounded-full">
                                    {{ $product->category->name ?? '' }}
                                </span>
                            </div>
                            <h1 class="text-3xl lg:text-4xl font-extrabold text-blue-950 leading-tight mb-4">
                                {{ $product->name }}
                            </h1>

                            <hr class="border-gray-100 my-6">

                            <!-- Description -->
                            <div class="mb-8">
                                <h2 class="text-lg font-bold text-blue-950 mb-3">Deskripsi Produk</h2>
                                <p class="text-gray-600 leading-relaxed text-base">
                                    {{ $product->description }}
                                </p>
                            </div>

                            <!-- Specifications -->
                            <div class="mb-8">
                                <h2 class="text-lg font-bold text-blue-950 mb-4">Spesifikasi Teknis</h2>
                                @if(!empty($product->specifications) && is_array($product->specifications))
                                    <div class="border border-gray-100 rounded-2xl overflow-hidden shadow-xs">
                                        <table class="w-full text-left border-collapse text-sm">
                                            <tbody>
                                                @foreach ($product->specifications as $key => $val)
                                                    <tr
                                                        class="odd:bg-white even:bg-gray-50/50 border-b border-gray-100 last:border-0">
                                                        <td
                                                            class="px-4 py-3.5 font-bold text-blue-950/80 w-1/3 border-r border-gray-100 bg-gray-50/30">
                                                            {{ $key }}
                                                        </td>
                                                        <td class="px-4 py-3.5 text-gray-600">
                                                            {{ $val }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="text-gray-500 italic text-sm">Tidak ada spesifikasi teknis.</p>
                                @endif
                            </div>
                        </div>

                        <!-- CTA Actions -->
                        <div class="flex justify-end mt-6 pt-6 border-t border-gray-100">
                            <!-- Back to Products -->
                            <a href="/produk"
                                class="inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-white hover:bg-gray-50 active:bg-gray-100 text-blue-950 font-bold rounded-2xl border border-gray-200 transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-arrow-left">
                                    <line x1="19" y1="12" x2="5" y2="12"></line>
                                    <polyline points="12 19 5 12 12 5"></polyline>
                                </svg>
                                Kembali ke Produk
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products Section -->
            @if(isset($relatedProducts) && $relatedProducts->count() > 0)
                <div class="mt-16" data-aos="fade-up">
                    <h2 class="text-2xl font-extrabold text-blue-950 mb-6">Produk Terkait</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach ($relatedProducts as $rel)
                            <div data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                                <x-product-card :product="$rel" cardClass="flex flex-col bg-white rounded-3xl p-5 border border-gray-100 shadow-xs hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300 group" />
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
