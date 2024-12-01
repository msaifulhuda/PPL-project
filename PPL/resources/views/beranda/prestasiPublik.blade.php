<x-guest-layout>
    <section class="bg-gray-200 py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12">Prestasi SMPN 2 Kamal</h2>

            <!-- Swiper Container -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @for ($i = 0; $i < 2; $i++)
                                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                                    <img src="{{ $prestasi[$i]->gambar }}" alt="Prestasi Akademik" class="w-full h-40 object-cover">
                                    <div class="p-6">
                                        <h3 class="text-lg font-semibold text-gray-800">{{ $prestasi[$i]->judul }}</h3>
                                        <p class="text-gray-600 text-sm mt-2">{{ $prestasi[$i]->deskripsi }}</p>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Prestasi Non-Akademik -->
    <section class="bg-gray-100 py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Prestasi SMAN 2 Kamal</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($prestasi as $item)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="{{ $item->gambar }}" alt="" class="w-full h-40 object-cover">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $item->judul }}</h3>
                            <p class="text-gray-600 text-sm mt-2">{{  $item->deskripsi }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const swiper = new Swiper('.swiper-container', {
                loop: false,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                slidesPerView: 1,
                spaceBetween: 16,
            });
        });
    </script>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
</x-guest-layout>
