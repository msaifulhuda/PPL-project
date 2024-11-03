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

                    <!-- Pesan Bentrok -->
                    @if(session('error'))
                        <div class="bg-red-500 text-white p-4 rounded mb-4">
                            <strong>List jadwal bentrok</strong>
                            <ul class="list-disc pl-5">
                                @foreach(session('bentrok') as $item)
                                    <li>
                                        @if($item['tipe'] == 'guru')
                                            Guru {{ $item['nama_guru'] }} memiliki jadwal bentrok di kelas lain pada hari {{ $item['nama_hari'] }} jam {{ $item['jam_pelajaran'] }}.
                                        @elseif($item['tipe'] == 'kelas')
                                            Kelas {{ $item['nama_kelas'] }} sudah memiliki jadwal pada hari {{ $item['nama_hari'] }} jam {{ $item['jam_pelajaran'] }}.
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Filter Kelas -->
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
        // const data = @json($data);
    
        function filterTable() {
            const kelasFilter = document.getElementById('kelasFilter').value;
    
            // Filter data sesuai kelas yang dipilih
            const filteredData = kelasFilter ? data.filter(item => item.nama_kelas === kelasFilter) : data;
            
            // Jika Semua Kelas dipilih, data akan dikelompokkan berdasarkan kelas
            let groupedData = kelasFilter ? { [kelasFilter]: filteredData } : groupByKelas(filteredData);
            
            // Render tabel per kelas
            let containerHTML = '';
            Object.keys(groupedData).forEach(kelas => {
                containerHTML += `
                    <h3 class="text-lg font-semibold mb-4">Jadwal Kelas ${kelas}</h3>
                    <table class="min-w-full bg-white border border-gray-300 rounded-md overflow-hidden mb-6">
                        <thead class="bg-gray-100 border-b">
                            <tr>
                                <th class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase">Hari</th>
                                <th class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase">Jam</th>
                                <th class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama Mata Pelajaran</th>
                                <th class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama Guru</th>
                            </tr>
                        </thead>
                        <tbody>`;
    
                const kelasData = groupedData[kelas];
                console.log(kelasData);
                if (kelasData.length > 0) {
                    kelasData.forEach(item => {
                        if (item.nama_hari=="Senin"){
                            containerHTML += `
                            <tr class="border-b">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.nama_hari}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.waktu_mulai} - ${item.waktu_selesai}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.nama_matpel}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.nama_guru}</td>
                            </tr>`;
                        }
                    });
                    kelasData.forEach(item => {
                        if (item.nama_hari=="Selasa"){
                            containerHTML += `
                            <tr class="border-b">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.nama_hari}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.waktu_mulai} - ${item.waktu_selesai}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.nama_matpel}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.nama_guru}</td>
                            </tr>`;
                        }
                    });
                    kelasData.forEach(item => {
                        if (item.nama_hari=="Rabu"){
                            containerHTML += `
                            <tr class="border-b">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.nama_hari}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.waktu_mulai} - ${item.waktu_selesai}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.nama_matpel}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.nama_guru}</td>
                            </tr>`;
                        }
                    });
                    kelasData.forEach(item => {
                        if (item.nama_hari=="Kamis"){
                            containerHTML += `
                            <tr class="border-b">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.nama_hari}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.waktu_mulai} - ${item.waktu_selesai}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.nama_matpel}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.nama_guru}</td>
                            </tr>`;
                        }
                    });
                    kelasData.forEach(item => {
                        if (item.nama_hari=="Jumat"){
                            containerHTML += `
                            <tr class="border-b">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.nama_hari}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.waktu_mulai} - ${item.waktu_selesai}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.nama_matpel}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.nama_guru}</td>
                            </tr>`;
                        }
                    });
                    kelasData.forEach(item => {
                        if (item.nama_hari=="Sabtu"){
                            containerHTML += `
                            <tr class="border-b">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.nama_hari}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.waktu_mulai} - ${item.waktu_selesai}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.nama_matpel}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.nama_guru}</td>
                            </tr>`;
                        }
                    });
                    kelasData.forEach(item => {
                        if (item.nama_hari=="Minggu"){
                            containerHTML += `
                            <tr class="border-b">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.nama_hari}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.waktu_mulai} - ${item.waktu_selesai}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.nama_matpel}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.nama_guru}</td>
                            </tr>`;
                        }
                    });
                } else {
                    containerHTML += `
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada jadwal untuk kelas ini.</td>
                        </tr>`;
                }
    
                containerHTML += `</tbody></table>`;
            });
    
            document.getElementById('jadwalTableContainer').innerHTML = containerHTML;
        }
    
        // Helper function to group data by nama_kelas
        function groupByKelas(data) {
            return data.reduce((acc, item) => {
                if (!acc[item.nama_kelas]) {
                    acc[item.nama_kelas] = [];
                }
                acc[item.nama_kelas].push(item);
                return acc;
            }, {});
        }
    
        // Load table for the first time
        document.addEventListener("DOMContentLoaded", filterTable);
    </script>