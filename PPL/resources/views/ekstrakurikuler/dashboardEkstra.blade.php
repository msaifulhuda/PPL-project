<style>
    /* Animasi untuk pembesaran */
    .scale-animation {
        animation: scaleUpDown 3s ease-in-out infinite;
    }

    /* Keyframes untuk animasi pembesaran dan pengurangan */
    @keyframes scaleUpDown {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.15); /* Skala pembesaran ditingkatkan */
        }
    }
    .grid-item {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .grid-item:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
    }


</style>

<x-guest-layout>
    <!-- Carousel Section dengan Efek Pembesaran Bergantian -->
    <section x-data="{ activeSlide: 0 }" x-init="setInterval(() => { activeSlide = (activeSlide + 1) % 3 }, 3000)" class="relative w-full max-w-7xl mx-auto overflow-hidden mt-6 flex justify-around space-x-4">
        <!-- Slide 1 -->
        <div :class="{ 'scale-animation': activeSlide === 0 }" class="w-1/3 flex items-center justify-center">
            <img src="{{ asset('images/ekstra/animasi1.jpg') }}" alt="Slide 1" class="w-full h-64 object-cover rounded-lg">
        </div>
        <!-- Slide 2 -->
        <div :class="{ 'scale-animation': activeSlide === 1 }" class="w-1/3 flex items-center justify-center">
            <img src="{{ asset('images/ekstra/animasi2.png') }}" alt="Slide 2" class="w-full h-64 object-cover rounded-lg">
        </div>
        <!-- Slide 3 -->
        <div :class="{ 'scale-animation': activeSlide === 2 }" class="w-1/3 flex items-center justify-center">
            <img src="{{ asset('images/ekstra/animasi3.jpg') }}" alt="Slide 3" class="w-full h-64 object-cover rounded-lg">
        </div>
    </section>
    <div class="bg-gray-200 py-10 mt-8">
        <div class="max-w-6xl mx-auto px-4 lg:px-8 ">
            <section class="py-10 ">
                <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white p-8 rounded-lg shadow-lg md:col-span-1">
                        <h3 class="text-2xl font-bold text-primary-color mb-4">Tentang Ekstrakurikuler</h3>
                        <p class="text-gray-600">Ekstrakurikuler di sekolah kami bertujuan untuk membantu siswa mengembangkan bakat, minat, serta keterampilan mereka melalui berbagai kegiatan yang menyenangkan dan edukatif.</p>
                        <a href="#" class="inline-block mt-4 bg-primary-color text-white px-4 py-2 rounded hover:bg-secondary-color transition">Read More</a>
                    </div>

                    <!-- Ekstrakurikuler Options -->
                    <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Pramuka -->
                        @foreach($ekstrakurikulerList as $ekstra)
                        <a href="{{ route('ekstrakurikuler.detail', ['id' => $ekstra->id_ekstrakurikuler]) }}" class="block bg-white rounded-lg shadow-lg p-6 text-center grid-item">
                            {{-- <img src="{{ asset($ekstra->gambar) }}" alt="{{ $ekstra->nama_ekstrakurikuler }}" class="w-full h-32 object-cover rounded-lg mb-4"> --}}
                            <img src="{{ asset('images/ekstra/pramuka.jpeg') }}" alt="Pramuka" class="w-full h-32 object-cover rounded-lg mb-4">
                            <h4 class="text-xl font-bold text-primary-color mb-2">{{ $ekstra->nama_ekstrakurikuler }}</h4>
                            <p class="text-gray-600">{{ $ekstra->deskripsi }}</p>
                        </a>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
        <!-- Results Section -->
        <section class="py-12 prestasi-section bg-gray-50">
            <!-- Elemen latar belakang blur -->
            <div class="prestasi-background"></div>
        
            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <h3 class="text-2xl font-bold text-primary-color mb-6 text-center">Prestasi Ekstrakurikuler</h3>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-center">
                    <div class="bg-white rounded-lg p-6 shadow-md">
                        <img src="https://via.placeholder.com/100" alt="Student" class="w-24 h-24 mx-auto rounded-full mb-4">
                        <h4 class="font-bold text-gray-800">Shubhash T</h4>
                        <p class="text-primary-color">80%</p>
                    </div>
                    <div class="bg-white rounded-lg p-6 shadow-md">
                        <img src="https://via.placeholder.com/100" alt="Student" class="w-24 h-24 mx-auto rounded-full mb-4">
                        <h4 class="font-bold text-gray-800">Mina W</h4>
                        <p class="text-primary-color">80%</p>
                    </div>
                    <div class="bg-white rounded-lg p-6 shadow-md">
                        <img src="https://via.placeholder.com/100" alt="Student" class="w-24 h-24 mx-auto rounded-full mb-4">
                        <h4 class="font-bold text-gray-800">Rani T</h4>
                        <p class="text-primary-color">80%</p>
                    </div>
                    <div class="bg-white rounded-lg p-6 shadow-md">
                        <img src="https://via.placeholder.com/100" alt="Student" class="w-24 h-24 mx-auto rounded-full mb-4">
                        <h4 class="font-bold text-gray-800">Neetu G</h4>
                        <p class="text-primary-color">80%</p>
                    </div>
                </div>
            </div>
        </section>        
        
            <!-- Tombol Registrasi Ekstra -->
            <div class="text-center mt-8">
                @if (session()->has('username'))
                    <a href="{{ route('ekstrakurikuler.registrasi') }}" class="inline-block px-8 py-3 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition font-semibold">Registrasi Ekstra</a>
                @else
                    <a href="{{ route('login', ['redirect' => 'ekstrakurikuler.registrasi']) }}" class="inline-block px-8 py-3 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition font-semibold">Registrasi Ekstra</a>
                @endif
            </div>
        </div>
    </div>
</x-guest-layout>
