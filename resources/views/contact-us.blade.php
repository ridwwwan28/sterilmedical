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
                    Hubungi Steril Medical Indonesia
                </h1>
                <p class="text-normal text-center text-blue-950 mx-auto max-w-4xl">
                    Tim kami siap membantu Anda dengan informasi produk, konsultasi pemesanan, dan kemitraan layanan kesehatan.
                </p>
            </div>

            <div class="flex flex-col lg:flex-row gap-10 lg:gap-12 w-full mb-20 items-center lg:items-start">
                <div class="w-full px-2" data-aos="fade-right">
                    <h3 class="text-2xl font-semibold uppercase text-center mb-5 text-blue-950">Kantor Pusat</h3>
                    <div class="flex gap-2 text-blue-950 mb-4">
                        <div class="flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-map-pin-icon lucide-map-pin">
                                <path
                                    d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                        </div>
                        <span>{!! nl2br(
                            e($websiteSettings?->address ?? 'Green Sedayu Biz Park Blok DM5 No. 31E Jl. Daan Mogot KM 18 Jakarta Barat 11840'),
                        ) !!}</span>
                    </div>

                    @php
                        $contactPhones = collect(
                            explode("\n", $websiteSettings?->phone_numbers ?? "0812 8693 3933\n021 543 133 55"),
                        )
                            ->map(fn($item) => trim($item))
                            ->filter()
                            ->all();
                    @endphp

                    @foreach ($contactPhones as $phone)
                        <div class="flex gap-2 text-blue-950 mb-4">
                            <div class="flex items-center justify-center rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-phone-icon lucide-phone">
                                    <path
                                        d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" />
                                </svg>
                            </div>
                            <span>{{ $phone }}</span>
                        </div>
                    @endforeach

                    @if (!empty($websiteSettings?->email))
                        <div class="flex gap-2 text-blue-950 mb-4">
                            <div class="flex items-center justify-center rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-mail-icon lucide-mail">
                                    <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7" />
                                    <rect x="2" y="4" width="20" height="16" rx="2" />
                                </svg>
                            </div>
                            <span>{{ $websiteSettings->email }}</span>
                        </div>
                    @endif

                    <div class="flex gap-2 text-blue-950 mb-4">
                        <div class="flex items-center justify-center rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-clock9-icon lucide-clock-9">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 6v6H8" />
                            </svg>
                        </div>
                        <div>Senin - Jumat</div>
                        <div>08.30 - 17.30</div>
                    </div>
                </div>
                <div class="w-full mx-auto" data-aos="fade-left">
                    @if (!empty($websiteSettings?->google_map_embed))
                        <iframe src="{{ $websiteSettings->google_map_embed }}" style="border:0;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                            class="rounded-3xl w-full h-72 lg:h-100"></iframe>
                    @else
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d416.9588180512204!2d106.69072656277265!3d-6.157114161319921!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f9dfc2f303c5%3A0x7393f2e7035fc931!2sPT.%20Danpac%20Pharma!5e0!3m2!1sid!2sid!4v1781858674435!5m2!1sid!2sid"
                            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                            class="rounded-3xl w-full h-72 lg:h-100"></iframe>
                    @endif
                </div>

            </div>
        </div>

    </section>
@endsection
