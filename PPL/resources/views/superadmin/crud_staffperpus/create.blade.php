<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Tambahkan div ini untuk membuat form di tengah layar -->
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-xs">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{route('superadmin.kelola_staff_perpus.store')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="username" class="block text-gray-700">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" class="w-full border border-gray-300 p-2 rounded">
                    @error('username')
                    <x-input-error :messages="$message" class="mt-2 text-red-500 text-sm" />
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="w-full border border-gray-300 p-2 rounded">
                    @error('password')
                    <x-input-error :messages="$message" class="mt-2 text-red-500 text-sm" />
                    @enderror
                </div>

                <!-- Nama Field -->
                <div class="mb-4">
                    <label for="nama_staff_perpustakaan" class="block text-gray-700">Nama</label>
                    <input type="text" id="nama_staff_perpustakaan" name="nama_staff_perpustakaan" value="{{ old('nama_staff_perpustakaan') }}" class="w-full border border-gray-300 p-2 rounded">
                    @error('nama_staff_perpustakaan')
                    <x-input-error :messages="$message" class="mt-2 text-red-500 text-sm" />
                    @enderror
                </div>

                <!-- Alamat Field -->
                <div class="mb-4">
                    <label for="alamat_staff_perpustakaan" class="block text-gray-700">Alamat</label>
                    <input type="text" id="alamat_staff_perpustakaan" name="alamat_staff_perpustakaan" value="{{ old('alamat_staff_perpustakaan') }}" class="w-full border border-gray-300 p-2 rounded">
                    @error('alamat_staff_perpustakaan')
                    <x-input-error :messages="$message" class="mt-2 text-red-500 text-sm" />
                    @enderror
                </div>

                <!-- WA (WhatsApp) Field -->
                <div class="mb-4">
                    <label for="wa_staff_perpustakaan" class="block text-gray-700">Nomor WhatsApp</label>
                    <input type="text" id="wa_staff_perpustakaan" name="wa_staff_perpustakaan" value="{{ old('wa_staff_perpustakaan') }}" class="w-full border border-gray-300 p-2 rounded">
                    @error('wa_staff_perpustakaan')
                    <x-input-error :messages="$message" class="mt-2 text-red-500 text-sm" />
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
            </form>
        </div>
    </div>
</x-admin-layout>