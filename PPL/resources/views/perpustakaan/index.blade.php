<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perpustakaan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-red-500">
                    <p>Akhirnya! aku ingat!!!!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-end mb-4">
        <a href="{{ route('staff_akademik.jadwal.create') }}" 
            class="bg-red-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Tambah Jadwal
        </a>
    </div>
</x-app-layout>