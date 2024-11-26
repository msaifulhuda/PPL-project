<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Pembina Ekstrakurikuler') }}
        </h2>
    </x-slot>

    <div class="flex items-center justify-center min-h-screen bg-gray-50 py-8">
        <div class="max-w-6xl w-full p-8 bg-white rounded-lg shadow-md border-2 border-black">
            <nav class="text-sm text-gray-500 mb-4">
                <ol class="flex px-0 space-x-1">
                    <li class="flex">
                        <a href="{{ route('superadmin.dashboard') }}" class="text-gray-400 hover:text-gray-700">
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <div class="flex justify-center py-1">
                        <svg class="flex w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                        </svg>
                    </div>
                    <li class="flex">
                        <a href="{{ route('superadmin.kelola_pembina_ekstrakurikuler') }}" class="text-gray-400 hover:text-gray-700">
                            <span>Kelola Data Pembina Ekstrakurikuler</span>
                        </a>
                    </li>
                    <div class="flex justify-center py-1">
                        <svg class="flex w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                        </svg>
                    </div>
                    <li class="flex">
                        <a href="#" class="text-black-500 hover:underline">
                            <span><b>Tambah Data Pembina Ekstrakurikuler</b></span>
                        </a>
                    </li>
                </ol>
            </nav>  

            <h2 class="text-lg font-semibold text-gray-800">Tambah Data Pembina Ekstrakurikuler</h2>
            <p class="text-sm text-gray-600 mb-6">Ini adalah halaman untuk menambah data Pembina Ekstrakurikuler</p>

            <form action="{{ route('kelola_pembina_ekstrakurikuler.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Username -->
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username :</label>
                    <input type="text" name="username" id="username" class="w-full border border-black rounded-md p-2.5 focus:outline-none focus:border-blue-500" value="{{ old('username') }}" >
                    @error('username')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password :</label>
                    <input type="password" name="password" id="password" class="w-full border border-black rounded-md p-2.5 focus:outline-none focus:border-blue-500" >
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Nama Pembina -->
                <div class="mb-4">
                    <label for="nama_guru" class="block text-sm font-medium text-gray-700 mb-1">Nama :</label>
                    <input type="text" name="nama_guru" id="nama_guru" class="w-full border border-black rounded-md p-2.5 focus:outline-none focus:border-blue-500" value="{{ old('nama_guru') }}" >
                    @error('nama_guru')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- NIP -->
                <div class="mb-4">
                    <label for="nip" class="block text-sm font-medium text-gray-700 mb-1">NIP :</label>
                    <input type="number" name="nip" id="nip" class="w-full border border-black rounded-md p-2.5 focus:outline-none focus:border-blue-500" value="{{ old('nip') }}" >
                    @error('nip')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Alamat -->
                <div class="mb-4">
                    <label for="alamat_guru" class="block text-sm font-medium text-gray-700 mb-1">Alamat :</label>
                    <textarea type="text" name="alamat_guru" id="alamat_guru" class="w-full border border-black rounded-md p-2.5 focus:outline-none focus:border-blue-500">{{ old('alamat_guru') }}</textarea>
                    @error('alamat_guru')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Role Guru -->
                <div class="mb-4">
                    <label for="role_guru" class="block text-sm font-medium text-gray-700 mb-1">Role Guru :</label>
                    <input type="text" name="role_guru" id="role_guru" class="w-full border border-black rounded-md p-2.5 focus:outline-none focus:border-blue-500" value="pembina" readonly>
                    @error('role_guru')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Foto Guru Upload -->
                <div class="mb-4">
                    <label for="foto_guru" class="block text-sm font-medium text-gray-700 mb-1">Foto :</label>
                
                    <!-- Upload Container -->
                    <div id="file-input-container" class="flex flex-col items-center justify-center w-full h-32 border-2 border-black rounded-md cursor-pointer bg-gray-50 relative" onclick="document.getElementById('foto_guru').click()" aria-label="Click to upload teacher photo">
                        <svg id="upload-icon" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16v4h10v-4M5 12l7-7 7 7M12 5v13" />
                        </svg>
                        <div id="upload-text" class="text-center text-sm">
                            <span class="text-blue-500">Click to Upload</span>
                            <br>
                            <span class="text-gray-500">(Max. file size: 25 MB)</span>
                        </div>
                        <input type="file" name="foto_guru" id="foto_guru" class="hidden" accept="image/*" onchange="previewImage(event)">
                    </div>
                
                    <!-- Preview Container -->
                    <div id="preview-container" class="hidden mt-2">
                        <div class="relative">
                            <img id="foto_guru_preview" class="w-32 h-32 object-cover rounded-md" alt="Preview image" />
                            <div class="absolute top-2 right-2 flex gap-2">
                                <button type="button" onclick="changeImage()" class="bg-blue-500 p-1 rounded-full" aria-label="Change photo">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>
                                <button type="button" onclick="removeImage()" class="bg-red-500 p-1 rounded-full" aria-label="Remove photo">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                
                    <!-- Error Message -->
                    @error('foto_guru')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- No. WA -->
                <div class="mb-4">
                    <label for="nomor_wa_guru" class="block text-sm font-medium text-gray-700 mb-1">No. WA :</label>
                    <input type="text" name="nomor_wa_guru" id="nomor_wa_guru" class="w-full border border-black rounded-md p-2.5 focus:outline-none focus:border-blue-500" value="{{ old('nomor_wa_guru') }}" >
                    @error('nomor_wa_guru')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- E-Mail -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email :</label>
                    <input type="email" name="email" id="email" class="w-full border border-black rounded-md p-2.5 focus:outline-none focus:border-blue-500" value="{{ old('email') }}" >
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit -->
                <div class="flex justify-center">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-full mt-4">
                        Tambahkan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        const MAX_FILE_SIZE = 25 * 1024 * 1024; // 25 MB
        const ALLOWED_FILE_TYPES = ['image/jpeg', 'image/png', 'image/jpg'];
    
        function previewImage(event) {
            const input = event.target;
            const file = input.files[0];
    
            // Validate file size
            if (file.size > MAX_FILE_SIZE) {
                alert('File size exceeds 25 MB.');
                input.value = ''; // Clear the input
                return;
            }
    
            // Validate file type
            if (!ALLOWED_FILE_TYPES.includes(file.type)) {
                alert('Only JPG, JPEG, and PNG images are allowed.');
                input.value = ''; // Clear the input
                return;
            }
    
            const reader = new FileReader();
            reader.onload = function(e) {
                // Create an image element to scale it to 512x512
                const img = new Image();
                img.src = e.target.result;
    
                img.onload = function() {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');
    
                    // Set canvas size to 512x512
                    canvas.width = 512;
                    canvas.height = 512;
    
                    // Draw the image on the canvas, scaling it
                    ctx.drawImage(img, 0, 0, 512, 512);
    
                    // Get the scaled image data URL
                    const scaledImageUrl = canvas.toDataURL(file.type);
    
                    // Set the preview image source to the scaled image
                    document.getElementById('foto_guru_preview').src = scaledImageUrl;
    
                    // Hide the file input container and show the preview container
                    document.getElementById('file-input-container').classList.add('hidden');
                    document.getElementById('preview-container').classList.remove('hidden');
                };
            };
            reader.readAsDataURL(file);
        }
    
        function changeImage() {
            document.getElementById('foto_guru').click();
        }
    
        function removeImage() {
            document.getElementById('foto_guru').value = '';
            document.getElementById('preview-container').classList.add('hidden');
            document.getElementById('file-input-container').classList.remove('hidden');
        }
    </script>
</x-admin-layout>
