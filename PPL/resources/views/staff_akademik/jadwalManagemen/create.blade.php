<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Jadwal') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Form Tambah Jadwal -->
                <form action="{{ route('staff_akademik.jadwal.store') }}" method="POST">
                    @csrf
                    {{-- Mendapatkan id tahun ajaran --}}
                    <input type="hidden" name="tahun_ajaran_id" value="{{ $tahunAjaran->id_tahun_ajaran }}">

                    <!-- Pilih Kelas -->
                    <div class="mb-4">
                        <label for="kelas_id" class="block text-gray-700">Kelas:</label>
                        <select name="kelas_id" id="kelas_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @foreach ($kelas as $kls)
                                <option value="{{ $kls->id_kelas }}">{{ $kls->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Table Input Jadwal -->
                    <table class="w-full text-left border mt-4">
                        <thead>
                            <tr>
                                <th>Hari</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                                <th>Guru dan Mata Pelajaran</th>
                            </tr>
                        </thead>
                        <tbody id="jadwal-rows">
                            <tr>
                                <td>
                                    <select name="jadwal[0][hari_id]" class="border-gray-300 rounded">
                                        @foreach ($hari as $h)
                                            <option value="{{ $h->id_hari }}">{{ $h->nama_hari }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="time" name="jadwal[0][waktu_mulai]" class="border-gray-300 rounded"></td>
                                <td><input type="time" name="jadwal[0][waktu_selesai]" class="border-gray-300 rounded"></td>
                                <td>
                                    <select name="jadwal[0][guru_id]" class="border-gray-300 rounded">
                                        @foreach ($guruMataPelajaran as $guruMatpel)
                                            <option value="{{ $guruMatpel->id_guru }}_{{ $guruMatpel->id_matpel }}">
                                                {{ $guruMatpel->nama_guru }} - {{ $guruMatpel->nama_matpel }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Tombol Tambah Row -->
                    <button type="button" onclick="addRow()" class="mt-4 text-blue-500">Tambah</button>

                    <!-- Tombol Submit -->
                    <div class="mt-6">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script untuk menambah row baru -->
    <script>
        let rowCount = 1;

        function addRow() {
            const tbody = document.getElementById('jadwal-rows');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
                <td>
                    <select name="jadwal[${rowCount}][hari_id]" class="border-gray-300 rounded">
                        @foreach ($hari as $h)
                            <option value="{{ $h->id_hari }}">{{ $h->nama_hari }}</option>
                        @endforeach
                    </select>
                </td>
                <td><input type="time" name="jadwal[${rowCount}][waktu_mulai]" class="border-gray-300 rounded"></td>
                <td><input type="time" name="jadwal[${rowCount}][waktu_selesai]" class="border-gray-300 rounded"></td>
                <td>
                    <select name="jadwal[${rowCount}][guru_id]" class="border-gray-300 rounded">
                        @foreach ($guruMataPelajaran as $guruMatpel)
                            <option value="{{ $guruMatpel->id_guru }}_{{ $guruMatpel->id_matpel }}">
                                {{ $guruMatpel->nama_guru }} - {{ $guruMatpel->nama_matpel }}
                            </option>
                        @endforeach
                    </select>
                </td>
            `;

            tbody.appendChild(newRow);
            rowCount++;
        }
    </script>
</x-app-layout>