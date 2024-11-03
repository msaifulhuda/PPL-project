<x-app-layout>
    <div class="p-4 bg-gray-100 min-h-screen">
        <!-- Header Anggota Ekstrakurikuler -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <!-- Breadcrumb -->
            <div class="text-sm text-gray-500 mb-4">
                Dashboard > <span class="font-semibold text-gray-700">Anggota</span>
            </div>
            <h2 class="text-2xl font-semibold text-gray-800">Anggota Ekstrakurikuler</h2>
            <div class="mt-2 text-gray-600">
                <p>Pengurus: <span class="font-semibold text-gray-700">Ayu Ayuan</span></p>
                <p>Tahun Ajaran: <span class="font-semibold text-gray-700">2024/2025</span></p>
                <p>Total Anggota: <span class="font-semibold text-gray-700">9999</span></p>
            </div>
        </div>

        <!-- Tabel Nama Anggota Ekstrakurikuler -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Nama Anggota Ekstrakurikuler</h3>
            <p class="text-sm text-gray-500 mb-4">Ini adalah list untuk anggota ekstrakurikuler</p>

            <table class="w-full table-auto">
                <thead>
                    <tr class="text-left text-gray-600">
                        <th class="p-2 border-b">Nama Siswa</th>
                        <th class="p-2 border-b">NISN</th>
                        <th class="p-2 border-b">Alamat</th>
                        <th class="p-2 border-b">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data Dummy -->
                    <tr class="hover:bg-gray-50">
                        <td class="p-2 border-b">Budi budian</td>
                        <td class="p-2 border-b">12345678910</td>
                        <td class="p-2 border-b">Lorem Ipsum</td>
                        <td class="p-2 border-b">
                            <a href="#" class="text-blue-500 hover:text-blue-700 mr-2">
                                <i class="fas fa-pencil-alt"></i> Edit
                            </a>
                            <a href="#" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash-alt"></i> Delete
                            </a>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="p-2 border-b">Ayu ayuan</td>
                        <td class="p-2 border-b">12345678911</td>
                        <td class="p-2 border-b">Lorem Ipsum</td>
                        <td class="p-2 border-b">
                            <a href="#" class="text-blue-500 hover:text-blue-700 mr-2">
                                <i class="fas fa-pencil-alt"></i> Edit
                            </a>
                            <a href="#" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash-alt"></i> Delete
                            </a>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="p-2 border-b">Toni tonian</td>
                        <td class="p-2 border-b">12345678912</td>
                        <td class="p-2 border-b">Lorem Ipsum</td>
                        <td class="p-2 border-b">
                            <a href="#" class="text-blue-500 hover:text-blue-700 mr-2">
                                <i class="fas fa-pencil-alt"></i> Edit
                            </a>
                            <a href="#" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash-alt"></i> Delete
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
