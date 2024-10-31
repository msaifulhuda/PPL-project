<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Jadwal Kelas') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <!-- Tombol Tambah Jadwal -->
                <div class="flex justify-end mb-4">
                    <a href="{{ route('staff_akademik.jadwal.create') }}" 
                       class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Tambah Jadwal
                    </a>
                </div>

                <div class="mb-4">
                    <label for="kelasFilter" class="block text-sm font-medium text-gray-700">Filter Kelas:</label>
                    <select id="kelasFilter" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" onchange="filterTable()">
                        <option value="">Semua Kelas</option>
                        @foreach($kelas as $item)
                            <option value="{{ $item->nama_kelas }}">{{ $item->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div id="jadwalTableContainer">
                    <!-- Tabel akan dimasukkan secara dinamis melalui JavaScript -->
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
<script>
    const data = @json($data);

    function filterTable() {
        const kelasFilter = document.getElementById('kelasFilter').value;
        const filteredData = kelasFilter ? data.filter(item => item.nama_kelas === kelasFilter) : data;

        let tableHTML = `<h3 class="text-lg font-semibold mb-4">Jadwal Kelas ${kelasFilter || "Semua Kelas"}</h3>
            <table class="min-w-full bg-white border border-gray-300 rounded-md overflow-hidden">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase">Hari</th>
                        <th class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase">Jam</th>
                        <th class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama Mata Pelajaran</th>
                        <th class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama Guru</th>
                    </tr>
                </thead>
                <tbody>`;

        if (filteredData.length > 0) {
            filteredData.forEach(item => {
                tableHTML += `
                    <tr class="border-b">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.nama_hari}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.waktu_mulai} - ${item.waktu_selesai}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.nama_matpel}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.nama_guru}</td>
                    </tr>`;
            });
        } else {
            tableHTML += `
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada jadwal untuk kelas ini.</td>
                </tr>`;
        }

        tableHTML += `</tbody></table>`;

        document.getElementById('jadwalTableContainer').innerHTML = tableHTML;
    }

    // Load table for the first time
    document.addEventListener("DOMContentLoaded", filterTable);
</script>
