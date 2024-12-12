<x-app-guru-layout>
    <div class="p-2 mx-4 my-6 bg-white rounded-lg shadow xl:p-6">
        {{-- Breadcrumb --}}
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="flex px-3 space-x-2">
                <li class="flex">
                    <a href="{{ route('guru.dashboard') }}" class="text-gray-400 hover:text-gray-700">
                        <span>Dashboard</span>
                    </a>
                </li>
                <div class="flex justify-center py-1">
                    <svg class="flex w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                    </svg>
                </div>
                <li class="flex">
                    <a href="{{ route('guru.dashboard') }}" class="text-gray-400 hover:text-gray-700">
                        <span>Ujian</span>
                    </a>
                </li>
                <div class="flex justify-center py-1">
                    <svg class="flex w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                    </svg>
                </div>
                <li class="flex">
                    <p class="font-semibold text-gray-700">
                        <span>Soal Ujian</span>
                    </p>
                </li>
            </ol>
        </nav>


        {{-- Main Content --}}
        <div class="container mx-auto mt-10">
            <h2 class="text-2xl font-bold mb-4">Daftar Soal Ujian</h2>

            <!-- Button for Importing Excel -->
            <div class="mb-4">
                <form action="{{ route('soal_ujian.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label class="block mb-2 text-sm font-medium text-gray-700" for="file_input">Import Soal Ujian dari Excel</label>
                    <input name="file" type="file" class="file-input block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="file_input">
                    <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Upload</button>
                </form>
            </div>

            <!-- Table for CRUD -->
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th class="py-3 px-6">No.</th>
                            <th class="py-3 px-6">Judul Ujian</th>
                            <th class="py-3 px-6">Soal</th>
                            <th class="py-3 px-6">Opsi A</th>
                            <th class="py-3 px-6">Opsi B</th>
                            <th class="py-3 px-6">Opsi C</th>
                            <th class="py-3 px-6">Opsi D</th>
                            <th class="py-3 px-6">Kunci Jawaban</th>
                            <th class="py-3 px-6">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($soalUjian as $soal)
                        <tr class="bg-white border-b">
                            <td class="py-4 px-6">{{ $loop->iteration }}</td>
                            <td class="py-4 px-6">{{ $soal->ujian->judul ?? 'Tidak ada' }}</td>
                            <td class="py-4 px-6">{{ $soal->teks_soal }}</td>
                            <td class="py-4 px-6">{{ $soal->opsi_a }}</td>
                            <td class="py-4 px-6">{{ $soal->opsi_b }}</td>
                            <td class="py-4 px-6">{{ $soal->opsi_c }}</td>
                            <td class="py-4 px-6">{{ $soal->opsi_d }}</td>
                            <td class="py-4 px-6">{{ $soal->kunci_jawaban }}</td>
                            <td class="py-4 px-6">
                                <a href="{{ route('soal_ujian.edit', ['id' => $soal->id_soal_ujian]) }}" class="text-blue-600 hover:underline">Edit</a> |
                                <form action="{{ route('soal_ujian.destroy', $soal->id_soal_ujian) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-guru-layout>
