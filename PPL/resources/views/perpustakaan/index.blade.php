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
                            <input 
                                type="text" 
                                name="search" 
                                placeholder="Search" 
                                class="border border-gray-300 rounded-lg px-4 py-2 w-1/3" 
                                value="{{ request('search') }}"
                            />
                            <select 
                                name="category" 
                                class="border border-gray-300 rounded-lg px-4 py-2 w-1/5"
                                onchange="this.form.submit()"
                            >
                                <option value="">All</option>
                                <!-- Tambahkan kategori pilihan di sini -->
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                                <!-- Tambahkan kategori lain sesuai kebutuhan -->
                            </select>
                        </form>
                    </div>

                    <!-- Book List -->
                    <div class="grid grid-cols-5 gap-4">
                        @foreach ($pages as $buku)
                        <div class="bg-white max-w-[500px] h-[1000px] p-4 rounded-lg shadow-md text-center">
                            <img src="{{ $buku->foto_buku }}" alt="{{ $buku->judul_buku }}" class="w-full h-3/4 object-cover rounded-lg mb-4">
                            <h3 class="text-lg font-semibold">{{ $buku->judul_buku }}</h3>
                            <p class="text-gray-600">Stok: {{ $buku->stock }}</p>
                            <a href="{{ route('siswa.dashboard.perpustakaan.detail', $buku->id_buku) }}" class="mt-4 bg-blue-500 text-white rounded-full px-4 py-2">
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


