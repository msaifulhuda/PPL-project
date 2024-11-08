<x-siswa-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    <!-- Search and Filter -->
                    <div class="flex items-center justify-between mb-6">
                        <form action="{{ route('perpustakaan') }}" method="GET" class="flex w-full gap-4">
                            @csrf
                            <input 
                                type="text" 
                                name="search" 
                                placeholder="Search" 
                                class="border border-gray-300 rounded-lg px-4 py-2 w-1/3" 
                                value="{{ old('search', request('search')) }}"
                            />
                            <select 
                                name="kategori_buku" 
                                class="border border-gray-300 rounded-lg px-4 py-2 w-1/5"
                                onchange="this.form.submit()"
                            >
                                <option value="">All</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id_kategori_buku }}" 
                                        {{ old('kategori_buku', request('kategori_buku')) == $cat->id_kategori_buku ? 'selected' : '' }}>
                                        {{ $cat->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>

                    <!-- Book List -->
                    <div class="flex flex-wrap gap-4">
                        @foreach ($pages as $buku)
                        <div class="w-500 bg-white p-4 rounded-lg shadow-md text-center flex flex-col">
                            <img src="{{ asset('images/Perpustakaan/Narutos.jpg') }}" alt="{{ $buku->judul_buku }}" class="h-40 rounded-md">
                            <h3 class="w-9 text-lg font-semibold">{{ $buku->judul_buku }}</h3>
                            <p class="text-gray-600">Stok: {{ $buku->stok_buku }}</p>
                            <a href="{{ route('siswa.dashboard.perpustakaan.detail', $buku->id_buku) }}" class="w-50 mt-4 bg-blue-500 text-white rounded-full px-4 py-2">
                                Detail
                            </a>
                        </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-8">
                        {{ $pages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-siswa-layout>
