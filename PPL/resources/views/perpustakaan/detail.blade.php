<x-siswa-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Tombol Kembali -->
    <div>
        <a href="{{ route('siswa.dashboard.perpustakaan') }}" class="text-blue-500 hover:text-blue-700 flex items-center">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Kembali
        </a>
    </div>

    <!-- Konten Buku -->
    <div class="mt-6 max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6 flex">
        <!-- Gambar Buku -->
        <div class="w-1/3">
            <img src="{{ asset('storage/' . $buku->foto_buku) }}" alt="Cover Buku" class="rounded-md w-full">
        </div>
        
        <!-- Informasi Buku -->
        <div class="w-2/3 ml-6">
            <h2 class="text-2xl font-bold">{{ $buku->judul_buku }}</h2>
            <p class="text-gray-700"><strong>Author:</strong> {{ $buku->author_buku }}</p>
            <p class="text-gray-700"><strong>Publisher:</strong> {{ $buku->publisher_buku }}</p>
            <p class="text-gray-700"><strong>Kategori:</strong> {{ $buku->nama_kategori }}</p>
            <p class="text-gray-700"><strong>Tahun Terbit:</strong> {{ $buku->tahun_terbit }}</p>
            <p class="text-gray-700"><strong>Bahasa:</strong> {{ $buku->bahasa_buku }}</p>
            <p class="text-gray-700"><strong>Rak:</strong> {{ $buku->rak_buku }}</p>

            <!-- Tombol Detail Buku -->
            
        </div>
    </div>

    <!-- Stok Buku -->
    <div class="mt-4 max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
        <p class="text-gray-700"><strong>Stok:</strong> {{ $buku->stok_buku }}</p>
    </div>

</x-siswa-layout>
