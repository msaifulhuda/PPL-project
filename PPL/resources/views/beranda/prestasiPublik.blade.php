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
                            <!-- Card 1 -->
                            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                                <img src="{{ asset('images/beranda/prestasi.jpg') }}" alt="Prestasi Akademik" class="w-full h-40 object-cover">
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-gray-800">Juara 1 Olimpiade Matematika</h3>
                                    <p class="text-gray-600 text-sm mt-2">Siswa SMPN 2 Kamal berhasil meraih juara 1 di Olimpiade Matematika tingkat provinsi tahun 2023.</p>
                                </div>
                            </div>
                            <!-- Card 2 -->
                            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                                <img src="{{ asset('images/beranda/prestasi.jpg') }}" alt="Prestasi Non-Akademik" class="w-full h-40 object-cover">
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-gray-800">Juara 2 Lomba Tari Tradisional</h3>
                                    <p class="text-gray-600 text-sm mt-2">Tim tari SMPN 2 Kamal meraih juara 2 dalam lomba tari tradisional tingkat kabupaten.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Card 3 -->
                            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                                <img src="{{ asset('images/beranda/prestasi.jpg') }}" alt="Prestasi Olahraga" class="w-full h-40 object-cover">
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-gray-800">Juara 1 Kejuaraan Sepak Bola</h3>
                                    <p class="text-gray-600 text-sm mt-2">Tim sepak bola SMPN 2 Kamal menjadi juara 1 dalam turnamen sepak bola pelajar se-Kabupaten Bangkalan.</p>
                                </div>
                            </div>
                            <!-- Card 4 -->
                            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                                <img src="{{ asset('images/beranda/prestasi.jpg') }}" alt="Prestasi Akademik" class="w-full h-40 object-cover">
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-gray-800">Juara Harapan 1 Lomba Sains</h3>
                                    <p class="text-gray-600 text-sm mt-2">SMPN 2 Kamal mendapatkan Juara Harapan 1 di tingkat kabupaten dalam lomba sains.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="swiper-slide">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Card 5 -->
                            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                                <img src="{{ asset('images/beranda/prestasi.jpg') }}" alt="Prestasi Ekstrakurikuler" class="w-full h-40 object-cover">
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-gray-800">Juara 1 Paduan Suara</h3>
                                    <p class="text-gray-600 text-sm mt-2">Kelompok paduan suara SMPN 2 Kamal meraih juara 1 dalam kompetisi tingkat nasional.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-button-prev" style="display: none;"></div>
                <div class="swiper-button-next" style="display: none;"></div>
            </div>
        </div>
    </section>

    <!-- Prestasi Akademik -->
    <section class="bg-white py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Prestasi Akademik</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-100 shadow-md rounded-lg overflow-hidden">
                    <img src="{{ asset('images/beranda/prestasi.jpg') }}" alt="Olimpiade Matematika" class="w-full h-40 object-cover">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800">Juara 1 Olimpiade Matematika</h3>
                        <p class="text-gray-600 text-sm mt-2">Siswa SMPN 2 Kamal berhasil meraih juara 1 di Olimpiade Matematika tingkat provinsi tahun 2023.</p>
                    </div>
                </div>
                <div class="bg-gray-100 shadow-md rounded-lg overflow-hidden">
                    <img src="{{ asset('images/beranda/prestasi.jpg') }}" alt="Lomba Sains" class="w-full h-40 object-cover">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800">Juara Harapan 1 Lomba Sains</h3>
                        <p class="text-gray-600 text-sm mt-2">SMPN 2 Kamal mendapatkan Juara Harapan 1 di tingkat kabupaten dalam lomba sains.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Prestasi Non-Akademik -->
    <section class="bg-gray-100 py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Prestasi Non-Akademik</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="{{ asset('images/beranda/prestasi.jpg') }}" alt="Lomba Tari" class="w-full h-40 object-cover">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800">Juara 2 Lomba Tari Tradisional</h3>
                        <p class="text-gray-600 text-sm mt-2">Tim tari SMPN 2 Kamal meraih juara 2 dalam lomba tari tradisional tingkat kabupaten.</p>
                    </div>
                </div>
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="{{ asset('images/beranda/prestasi.jpg') }}" alt="Paduan Suara" class="w-full h-40 object-cover">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800">Juara 1 Paduan Suara</h3>
                        <p class="text-gray-600 text-sm mt-2">Kelompok paduan suara SMPN 2 Kamal meraih juara 1 dalam kompetisi tingkat nasional.</p>
                    </div>
                </div>
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
