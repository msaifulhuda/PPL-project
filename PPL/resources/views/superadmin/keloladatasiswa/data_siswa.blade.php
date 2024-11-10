<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Data Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <nav class="text-sm text-gray-500 mb-4">
                    <a href="{{ route('superadmin.dashboard') }}" class="text-black-500 hover:underline">Dashboard</a> > Kelola Akun > <b>Kelola Data Siswa</b>
                </nav>     
                <h3 class="text-lg font-semibold mb-4">Kelola Data Siswa</h3>
                <div class="mb-4 flex justify-between items-center">
                    <div>
                        <a href="{{ route('data.siswa.tambah') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Tambah Data</a>
                    </div>
                    <form action="{{ route('superadmin.searchSiswa') }}" method="GET" class="flex space-x-2">
                        <input type="text" name="searchsiswa" placeholder="Cari NISN" value="{{ request('search') }}" 
                               class="border border-gray-300 rounded-md px-4 py-2 focus:border-blue-500 focus:outline-none">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Cari</button>
                    </form>
                </div>

                <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 text-sm leading-normal">
                            <th class="py-3 px-4 text-left">Foto</th>
                            <th class="py-3 px-4 text-left">Nama Siswa</th>
                            <th class="py-3 px-4 text-left">Jenis Kelamin</th>
                            <th class="py-3 px-4 text-left">NISN</th>
                            <th class="py-3 px-4 text-left">Kelas</th>
                            <th class="py-3 px-4 text-left">Alamat</th>
                            <th class="py-3 px-4 text-left">Telephone</th>
                            <th class="py-3 px-4 text-left">E-Mail</th>
                            <th class="py-3 px-4 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($siswaData as $siswa)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-4 text-left">
                                    <img src="{{ asset('images/siswa/' . $siswa->foto_siswa) }}" alt="Foto" class="w-10 h-10 rounded-full">
                                </td>
                                <td class="py-3 px-4">{{ $siswa->nama_siswa }}</td>
                                <td class="py-3 px-4">{{ $siswa->jenis_kelamin_siswa }}</td>
                                <td class="py-3 px-4">{{ $siswa->nisn }}</td>
                                <td class="py-3 px-4">{{ $siswa->kelas_id }}</td>
                                <td class="py-3 px-4">{{ $siswa->alamat_siswa }}</td>
                                <td class="py-3 px-4">{{ $siswa->nomor_wa_siswa }}</td>
                                <td class="py-3 px-4">{{ $siswa->email }}</td>
                                <td class="py-3 px-4 flex space-x-2">
                                    <a href="{{ route('siswa.edit', $siswa->id_siswa) }}" class="bg-blue-500 text-white px-2 py-1 rounded-md hover:bg-blue-600">Edit</a>
                                    <form action="{{ route('siswa.destroy', $siswa->id_siswa) }}" method="POST" onsubmit="return confirmDelete(event)" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $siswaData->links() }}
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(event) {
            event.preventDefault();
            const confirmation = confirm("Apakah Anda yakin ingin menghapus data ini?");
            if (confirmation) {
                event.target.submit();
            }
        }

        // Hide success message smoothly
        document.addEventListener("DOMContentLoaded", function () {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.opacity = '0';
                    setTimeout(() => successMessage.remove(), 500);
                }, 3000);
            }
        });
    </script>
</x-admin-layout>
