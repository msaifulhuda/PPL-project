<!DOCTYPE html>
<html lang="en" class="scroll-smooth text-xs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <title>SMPN 71 Kamal</title>
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased">
    <header class="bg-white shadow">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <img src="{{ asset('images/beranda/logo.png') }}" alt="Logo" class="h-16">
        </div>

        <nav class="space-x-8">
            <a href="#" class="text-gray-700 hover:text-blue-600">Home</a>
            <a href="#tentang-kami" class="text-gray-700 hover:text-blue-600">Tentang Kami</a>
            <a href="#" class="text-gray-700 hover:text-blue-600">Perpustakaan</a>
            <a href="#" class="text-gray-700 hover:text-blue-600">Tenaga Pengajar</a>
            <a href="#" class="text-gray-700 hover:text-blue-600">Ekstrakurikuler</a>
        </nav>

        @if(session()->has('username'))
            <div class="relative">
                <button id="dropdownUserAvatar" data-dropdown-toggle="dropdownUserMenu" class="flex items-center space-x-2 text-gray-700 font-semibold focus:outline-none">
                    <svg class="w-10 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>
                    <span class="font-lg">{{ auth()->guard('web-siswa')->user()->nama_siswa }}</span>
                </button>
                <div id="dropdownUserMenu" class="hidden z-10 w-44 bg-white rounded-lg shadow divide-y divide-gray-100">
                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownUserAvatar">
                        <li>
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left text-red-700 block px-4 py-2 hover:bg-gray-100">Log out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @else
            <a href="{{ route("login") }}" class="inline-block px-6 py-2 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-md rounded-lg text-md text-center transition">Login</a>
        @endif
        {{-- @endauth --}}
    </div>
</header>


<section class="bg-gray-200 py-16 scroll-smooth">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold text-gray-800 mb-4">Selamat Datang di <span class="text-blue-600">SMPN 71 Kamal</span></h2>
        <p class="text-lg text-gray-600 mb-6 p-5">SMPN 71 Kamal adalah lembaga pendidikan yang tidak hanya berfokus pada pencapaian akademik, tetapi juga pada pembentukan karakter siswa yang kuat dan berintegritas. Dengan kurikulum yang didesain khusus untuk mempersiapkan siswa menghadapi tantangan masa depan, kami mengajarkan nilai-nilai moral, etika, dan empati yang menjadi dasar kehidupan bermasyarakat. Di SMPN 71 Kamal, siswa tidak hanya diajak untuk belajar secara intelektual, tetapi juga didorong untuk mengembangkan potensi kreatif dan sosial mereka dalam lingkungan yang penuh dukungan.</p>
        <p class="text-lg text-gray-600 mb-6 font-bold">Jl. Merpati No. 25, Kelurahan Sukajaya, Kecamatan Kamal, Kabupaten Bangkalan, Jawa Timur, 16913</p>
        <a href="#main-banner" class="inline-block px-6 py-3 bg-blue-600 text-white text-lg font-semibold rounded-md hover:bg-blue-800 transition">Lihat Selengkapnya →</a>
    </div>
</section>

<section id="main-banner" class="relative bg-cover bg-center py-16" style="background-image: url({{ asset('images/beranda/sekolah2.jpg') }});">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative container mx-auto px-4 flex flex-col md:flex-row items-center text-white">
        <div class="w-full md:w-1/2 text-center md:text-left mb-8 md:mb-0">
            <h1 class="text-4xl font-bold">SMPN 71 Kamal</h1>
            <p class="text-lg mt-4 pr-12">Tempat kami membentuk generasi berprestasi dengan dedikasi dan bimbingan dari tenaga pengajar berpengalaman, fasilitas lengkap, dan lingkungan yang mendukung perkembangan siswa.</p>
        </div>

        <div class="w-full md:w-1/2 grid grid-cols-1 sm:grid-cols-2 gap-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="{{ asset('images/beranda/perpus.jpg') }}" alt="Perpustakaan" class="w-full h-32 object-cover">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Perpustakaan</h3>
                    <p class="text-gray-600 text-sm mt-2">Koleksi buku lengkap dan nyaman untuk mendukung kegiatan belajar siswa.</p>
                    <!-- Button -->
                    <a href="#" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded-full font-semibold text-sm hover:bg-blue-800 transition">Lihat Selengkapnya →</a>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="{{ asset('images/beranda/tenaga-kerja.jpg') }}" alt="Tenaga Pengajar" class="w-full h-32 object-cover">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Tenaga Pengajar</h3>
                    <p class="text-gray-600 text-sm mt-2">Guru-guru berpengalaman yang berdedikasi dalam mendidik siswa dengan sepenuh hati.</p>
                    <a href="#" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded-full font-semibold text-sm hover:bg-blue-800 transition">Lihat Selengkapnya →</a>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="{{ asset('images/beranda/prestasi.jpg') }}" alt="Prestasi" class="w-full h-32 object-cover">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Prestasi</h3>
                    <p class="text-gray-600 text-sm mt-2">Berbagai pencapaian siswa di bidang akademik dan non-akademik.</p>
                    <a href="#" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded-full font-semibold text-sm hover:bg-blue-800 transition">Lihat Selengkapnya →</a>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="{{ asset('images/beranda/ekstra.jpg') }}" alt="Ekstrakulikuler" class="w-full h-32 object-cover">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Ekstrakulikuler</h3>
                    <p class="text-gray-600 text-sm mt-2">Pilihan kegiatan ekstrakurikuler untuk mengembangkan minat dan bakat siswa.</p>
                    <a href="#" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded-full font-semibold text-sm hover:bg-blue-800 transition">Lihat Selengkapnya →</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="tentang-kami" class="py-16 bg-gray-200">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-bold text-center mb-12">Tentang Kami</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Visi & Misi</h3>
                <p class="text-gray-600 text-center text-base">Visi kami adalah menjadi lembaga pendidikan unggulan yang menghasilkan generasi yang tidak hanya berprestasi akademik, tetapi juga memiliki karakter yang baik. Misi kami adalah untuk menyediakan pendidikan berkualitas tinggi yang relevan dengan kebutuhan zaman, memfasilitasi pembelajaran yang aktif dan kreatif, serta membangun lingkungan yang mendukung perkembangan sosial dan emosional siswa.</p>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-8">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Tujuan</h3>
                <p class="text-gray-600 text-center text-base">Tujuan utama kami adalah untuk menciptakan sistem pendidikan yang dapat memenuhi kebutuhan dan harapan siswa, orang tua, serta masyarakat. Kami berkomitmen untuk memberikan akses pendidikan yang adil dan berkualitas, membekali siswa dengan pengetahuan dan keterampilan yang dibutuhkan di masa depan, serta mengembangkan potensi individu mereka melalui berbagai kegiatan ekstrakurikuler.</p>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-8">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Sejarah</h3>
                <p class="text-gray-600 text-center text-base">SMPN 71 Kamal didirikan pada tahun 2005 sebagai bagian dari upaya pemerintah untuk meningkatkan akses pendidikan di wilayah Kamal. Sejak awal, kami telah berkomitmen untuk memberikan pendidikan yang berkualitas, dengan fokus pada pengembangan karakter dan kemampuan akademik siswa. Dalam perjalanan kami, kami telah mencapai berbagai prestasi yang membanggakan di tingkat lokal dan nasional, serta terus berinovasi untuk memenuhi tuntutan zaman.</p>
            </div>
        </div>
    </div>
</section>


<footer class="bg-gray-800 py-8">
    <div class="container mx-auto px-4 text-center text-white">
        <p>© 2024 Sistem Sekolah Terintegrasi . SMPN 71 Kamal</p>
    </div>
</footer>

    <script src="https://unpkg.com/flowbite@1.6.4/dist/flowbite.min.js"></script>
</body>
</html>
