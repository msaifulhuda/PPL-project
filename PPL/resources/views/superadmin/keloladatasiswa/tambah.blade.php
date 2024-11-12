<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Siswa') }}
        </h2>
    </x-slot>

    <div class="flex items-center justify-center min-h-screen bg-gray-50 py-8">
        <div class="max-w-6xl w-full p-8 bg-white rounded-lg shadow-md border-2 border-black">
            <nav class="text-sm text-gray-500 mb-4">
                <a href="{{ route('superadmin.dashboard') }}" class="text-black-500 hover:underline">Dashboard</a> > Kelola Akun > <a href="{{ route('superadmin.keloladatasiswa') }}" class="text-black-500 hover:underline">Kelola Data Siswa</a> > <b>Tambah Data Siswa</b>
            </nav>

            <h2 class="text-lg font-semibold text-gray-800">Tambah Data Siswa</h2>
            <p class="text-sm text-gray-600 mb-6">Ini adalah halaman untuk menambah data siswa</p>

            <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Username -->
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username :</label>
                    <input type="text" name="username" id="username" class="w-full border border-black rounded-md p-2.5 focus:outline-none focus:border-blue-500" required>
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password :</label>
                    <input type="password" name="password" id="password" class="w-full border border-black rounded-md p-2.5 focus:outline-none focus:border-blue-500" required>
                </div>

                <!-- Nama Siswa -->
                <div class="mb-4">
                    <label for="nama_siswa" class="block text-sm font-medium text-gray-700 mb-1">Nama Siswa :</label>
                    <input type="text" name="nama_siswa" id="nama_siswa" class="w-full border border-black rounded-md p-2.5 focus:outline-none focus:border-blue-500" required>
                </div>

                <!-- Jenis Kelamin -->
                <div class="mb-4">
                    <label for="jenis_kelamin_siswa" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin :</label>
                    <select id="jenis_kelamin_siswa" name="jenis_kelamin_siswa" class="w-full border border-black rounded-md p-2.5 focus:outline-none focus:border-blue-500" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <!-- NISN -->
                <div class="mb-4">
                    <label for="nisn" class="block text-sm font-medium text-gray-700 mb-1">NISN :</label>
                    <input type="text" name="nisn" id="nisn" class="w-full border border-black rounded-md p-2.5 focus:outline-none focus:border-blue-500" required>
                </div>

                <!-- Tanggal Lahir -->
                <div class="mb-4">
                    <label for="tgl_lahir_siswa" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir :</label>
                    <input type="date" name="tgl_lahir_siswa" id="tgl_lahir_siswa" class="w-full border border-black rounded-md p-2.5 focus:outline-none focus:border-blue-500" required>
                </div>

                <!-- Role Siswa -->
                <div class="mb-4">
                    <label for="role_siswa" class="block text-sm font-medium text-gray-700 mb-1">Role Siswa :</label>
                    <select id="role_siswa" name="role_siswa" class="w-full border border-black rounded-md p-2.5 focus:outline-none focus:border-blue-500" required>
                        <option value="">Pilih Role</option>
                        <option value="siswa">Siswa</option>
                        <option value="pengurus">Pengurus</option>
                    </select>
                </div>

                <!-- Alamat Siswa -->
                <div class="mb-4">
                    <label for="alamat_siswa" class="block text-sm font-medium text-gray-700 mb-1">Alamat :</label>
                    <input type="text" name="alamat_siswa" id="alamat_siswa" class="w-full border border-black rounded-md p-2.5 focus:outline-none focus:border-blue-500">
                </div>

                <!-- Foto Siswa Upload -->
                <div class="mb-4">
                    <label for="foto_siswa" class="block text-sm font-medium text-gray-700 mb-1">Foto :</label>
                    <div class="flex flex-col items-center justify-center w-full h-32 border-2 border-black rounded-md cursor-pointer bg-gray-50 relative"
                         onclick="document.getElementById('foto_siswa').click()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16v4h10v-4M5 12l7-7 7 7M12 5v13" />
                        </svg>
                        <div class="text-center text-sm">
                            <span class="text-blue-500">Click to Upload</span>
                            <span class="text-gray-500">or drag and drop</span>
                            <br>
                            <span class="text-gray-500">(Max. file size: 25 MB)</span>
                        </div>
                        <input type="file" name="foto_siswa" id="foto_siswa" class="hidden">
                    </div>
                </div>

                <!-- No. WA -->
                <div class="mb-4">
                    <label for="nomor_wa_siswa" class="block text-sm font-medium text-gray-700 mb-1">No. WA :</label>
                    <input type="text" name="nomor_wa_siswa" id="nomor_wa_siswa" class="w-full border border-black rounded-md p-2.5 focus:outline-none focus:border-blue-500">
                </div>

                <!-- E-Mail -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email :</label>
                    <input type="email" name="email" id="email" class="w-full border border-black rounded-md p-2.5 focus:outline-none focus:border-blue-500" required>
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
</x-admin-layout>