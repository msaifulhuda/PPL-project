<x-app-guru-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profil Guru/Siswa') }}
        </h2>
    </x-slot>
    <div class="pt-6 pb-6 bg-gray-100 flex justify-center items-center">
        <div class="w-full max-w-6xl bg-white px-12 py-6 rounded-lg shadow-lg relative">
            <!-- Ikon Kembali -->
            <a href="{{ route('guru.dashboard') }}" 
               class="absolute top-6 left-6 text-black hover:text-blue-500 flex items-center gap-2 transition-colors duration-200">
                <!-- Ikon Panah Kembali -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span class="text-lg font-semibold">Kembali</span>
            </a>

            <div class="flex gap-6 items-center">
                <!-- Foto Profil -->
                <div class="flex flex-col items-center w-1/3">
                    <div class="w-[240px] h-[240px] rounded-full overflow-hidden border-4 border-blue-500 shadow-md">
                        <img id="profileImage" src="{{ $guru->foto_guru ? asset('images/guru/' . $guru->foto_guru) : 'https://cdn.pixabay.com/photo/2018/11/13/21/43/avatar-3814049_640.png' }}" 
                             alt="Foto Profil" class="object-cover w-full h-full cursor-pointer">
                    </div>                    
                    <h1 class="text-gray-600 mt-3"><b>{{ $guru->nama_guru ?? 'Nama Tidak Ditemukan' }}</b></h1>
                    <p class="text-gray-500">{{ $guru->nip ?? 'NIP Tidak Ditemukan' }}</p>
                </div>

                <!-- Form -->
                <div class="flex flex-col w-2/3">
                    <h1 class="text-2xl font-bold text-center text-gray-800 ">Profil Saya</h1>

                    <form method="POST" action="{{ route('profil.update') }}" id="updateForm" class="space-y-4" novalidate>
                        @csrf
                        @method('PUT')

                        <!-- Username -->
                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                            <input type="text" id="username" name="username" value="{{ old('username', $guru->username) }}"
                                   class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none @error('username') border-red-500 @enderror"
                                   placeholder="Masukkan username Anda" >
                            @error('username')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $guru->email) }}"
                                   class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none @error('email') border-red-500 @enderror"
                                   placeholder="email@contoh.com">
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Nomor Telepon -->
                        <div>
                            <label for="nomor_wa_guru" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                            <input type="text" id="nomor_wa_guru" name="nomor_wa_guru" value="{{ old('nomor_wa_guru', $guru->nomor_wa_guru) }}"
                                   class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none @error('nomor_wa_guru') border-red-500 @enderror"
                                   placeholder="Masukkan nomor telepon">
                            @error('nomor_wa_guru')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password Lama -->
                        <div>
                            <label for="current_password" class="block text-sm font-medium text-gray-700">Password Lama</label>
                            <input type="password" id="current_password" name="current_password"
                                   class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none @error('current_password') border-red-500 @enderror"
                                   placeholder="Masukkan password lama Anda">
                            @error('current_password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password Baru -->
                        <div>
                            <label for="new_password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                            <input type="password" id="new_password" name="new_password"
                                   class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none @error('new_password') border-red-500 @enderror"
                                   placeholder="Masukkan password baru">
                            @error('new_password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Konfirmasi Password Baru -->
                        <div>
                            <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                   class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                   placeholder="Ulangi password baru">
                        </div>

                        <!-- Submit -->
                        <div class="flex justify-center">
                            <button type="submit" 
                                    class="px-4 py-2 bg-blue-500 text-white rounded-md transition-colors duration-300 hover:bg-green-500">
                                Perbarui Profil
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Pop-up -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 hidden items-center justify-center z-50">
        <div class="relative">
            <button id="closeModal" class="absolute top-2 right-2 text-white text-lg">
                ✕
            </button>
            <img id="modalImage" src="" alt="Foto Besar" class="max-w-full max-h-[80vh] rounded-lg shadow-lg">
        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Menampilkan SweetAlert jika ada pesan sukses
        @if(session('success') && !$errors->any())
            Swal.fire({
                title: 'Berhasil!',
                text: 'Profil Anda berhasil diperbarui.',
                icon: 'success',
                showConfirmButton: false, // Menghilangkan tombol OK
                timer: 3000 // Popup otomatis hilang setelah 3 detik
            });
        @endif

        // JavaScript Modal
        document.addEventListener('DOMContentLoaded', function () {
            const profileImage = document.getElementById('profileImage');
            const imageModal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            const closeModal = document.getElementById('closeModal');

            profileImage.addEventListener('click', () => {
                modalImage.src = profileImage.src; // Set the modal image source
                imageModal.classList.remove('hidden'); // Show the modal
                imageModal.classList.add('flex'); // Add flexbox classes for centering
            });

            closeModal.addEventListener('click', () => {
                imageModal.classList.add('hidden'); // Hide the modal
            });

            // Close the modal when clicking outside the image
            imageModal.addEventListener('click', (e) => {
                if (e.target === imageModal) {
                    imageModal.classList.add('hidden');
                }
            });
        });
    </script>
</x-app-guru-layout>
