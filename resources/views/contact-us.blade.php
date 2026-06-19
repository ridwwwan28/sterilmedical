@extends('layout')
@section('konten')
    <section class="relative w-full bg-blue-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-35">
            <div class="w-full mb-10 lg:mb-16">
                <h3 class="text-4xl font-bold text-center text-blue-950 mb-2">Lorem ipsum dolor sit amet.</h3>
                <p class="text-normal text-center text-blue-950 mx-auto max-w-4xl">Lorem ipsum dolor sit amet consectetur,
                    adipisicing elit.
                    Cum ut, fuga aliquid optio voluptate iste
                    aliquam? Explicabo dolorem modi placeat!</p>
            </div>

            <div class="flex flex-col lg:flex-row gap-10 lg:gap-12 w-full items-center lg:items-start">
                <div class="w-full px-2">
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
                        <span>Green Sedayu Biz Park Blok DM5 No. 31E Jl. Daan Mogot KM 18 Jakarta Barat 11840</span>
                    </div>

                    <div class="flex gap-2 text-blue-950 mb-4">
                        <div class="flex items-center justify-center rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-phone-icon lucide-phone">
                                <path
                                    d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" />
                            </svg>
                        </div>
                        <span>0812 8693 3933</span>
                    </div>

                    <div class="flex gap-2 text-blue-950 mb-4">
                        <div class="flex items-center justify-center rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-mail-icon lucide-mail">
                                <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7" />
                                <rect x="2" y="4" width="20" height="16" rx="2" />
                            </svg>
                        </div>
                        <span>info@sterilmedical.co.id</span>
                    </div>

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
                <div class="w-full mx-auto">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d416.9588180512204!2d106.69072656277265!3d-6.157114161319921!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f9dfc2f303c5%3A0x7393f2e7035fc931!2sPT.%20Danpac%20Pharma!5e0!3m2!1sid!2sid!4v1781858674435!5m2!1sid!2sid"
                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        class="rounded-3xl w-full h-72 lg:h-100"></iframe>
                </div>

            </div>
        </div>

    </section>
@endsection
