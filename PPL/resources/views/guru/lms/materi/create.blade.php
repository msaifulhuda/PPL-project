<x-app-guru-layout>
    <div class="px-3 py-5 mx-4 my-6 bg-white rounded-lg shadow xl:p-6">
        {{-- Breadcrumb --}}
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="flex px-3 space-x-2 text-sm">
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
                    <a href="{{ route('guru.dashboard.lms') }}" class="text-gray-400 hover:text-gray-700">
                        <span>LMS</span>
                    </a>
                </li>
                <div class="flex justify-center py-1">
                    <svg class="flex w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                    </svg>
                </div>
                <li class="flex">
                    <a href="{{ route('guru.dashboard.lms.materi') }}" class="text-gray-400 hover:text-gray-700">
                        <span>Materi</span>
                    </a>
                </li>
                <div class="flex justify-center py-1">
                    <svg class="flex w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                    </svg>
                </div>
                <li class="flex">
                    <a href="{{ route('guru.dashboard.lms.materi.create_view') }}" class="text-gray-400 hover:text-gray-700">
                        <span>Tambah Materi</span>
                    </a>
                </li>
                <div class="flex justify-center py-1">
                    <svg class="flex w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                    </svg>
                </div>
                <li class="flex">
                    <p class="font-semibold text-gray-700">
                        <span>{{ $kelas_mata_pelajaran->mata_pelajaran->nama_matpel }} {{ $kelas_mata_pelajaran->kelas->nama_kelas }}</span>
                    </p>
                </li>
            </ol>
        </nav>


        {{-- Main Content --}}
        <div class="mt-8 x-3 ">
            <form action="{{ route('guru.dashboard.lms.materi.store', $kelas_mata_pelajaran->id_kelas_mata_pelajaran) }}" method="POST" class="flex gap-6" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_kelas_mata_pelajaran" value="{{ $materi_old ? $materi_old->kelas_mata_pelajaran : $kelas_mata_pelajaran->id_kelas_mata_pelajaran }}">

                <div class="w-3/4 border rounded-lg">
                    <div class="flex flex-col gap-6 p-6">
                        <div class="flex flex-col gap-3">
                            <label for="judul_materi" class="text-gray-700">Judul Materi</label>
                            <input type="text" name="judul_materi" id="judul_materi" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" value="{{ $materi_old ? $materi_old->judul_materi : old('judul_materi') }}">
                            @error('judul_materi')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-3">
                            <label for="deskripsi_materi" class="text-gray-700">Deskripsi Materi (Optional)</label>
                            <textarea name="deskripsi_materi" id="deskripsi_materi" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" rows="4" value="{{ $materi_old ? $materi_old->deskripsi_materi : old('deskripsi_materi') }}"></textarea>
                        </div>

                        <div class="flex flex-col gap-3">
                            <label for="file_materi" class="text-gray-700">File Materi</label>
                            <input type="file" name="file_materi" id="file_materi" class="w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                            @error('file_materi')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="w-1/3 border rounded-lg">
                    <div class="flex flex-col gap-6 p-6">
                        <div class="flex flex-col gap-3">
                            <label for="topik_id" class="text-gray-700">Topik</label>
                            <select name="topik_id" id="topik_id" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                                <option selected disabled>Pilih Topik</option>
                                @foreach ($topik as $item)
                                    @php
                                        $selected = $materi_old ? $materi_old->topik_id : old('topik_id');
                                    @endphp
                                    <option value="{{ $item->id_topik }}" {{ $selected == $item->id_topik ? 'selected' : '' }}>{{ $item->judul_topik }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex justify-end">
                            <a href="" class="px-6 py-2 mr-3 text-white bg-gray-600 rounded-md hover:bg-gray-700">Tambah Topik</a>

                            <button type="button" name="post" class="px-6 py-2 font-thin text-gray-400 bg-gray-300 cursor-default rounded-l-md">Posting</button>
                            <button type="button" class="flex px-2 pt-2 text-sm bg-blue-500 rounded-r-md" id="topik-menu-button-2" aria-expanded="false" data-dropdown-toggle="dropdown-3">
                                <span class="sr-only">Open topik</span>
                                <svg class="w-6 h-6 text-slate-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Dropdown Submit --}}
               <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow" id="dropdown-3">
                   <ul class="py-1" role="none">
                       <li>
                           <button type="submit" name="post" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Posting</button>
                       </li>
                       <li>
                           <button type="submit" name="draft" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Draft</button>
                       </li>
                       <li>
                           <div class="border-t border-gray-100"></div>
                       </li>
                       <li>
                           <button type="submit" name="delete" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Hapus</button>
                       </li>
                   </ul>
               </div>

            </form>
        </div>

    </div>
</x-app-guru-layout>
<script>
    function cekJudul(judulInput, postButton) {
        if (judulInput.value.trim() !== '') {
            postButton.type = 'submit';
            postButton.classList.remove('cursor-default', 'bg-gray-300', 'text-gray-400');
            postButton.classList.add('bg-blue-500', 'text-white');
        } else {
            postButton.type = 'button';
            postButton.classList.add('cursor-default', 'bg-gray-300', 'text-gray-400');
            postButton.classList.remove('bg-blue-500', 'text-white');
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const judulInput = document.getElementById('judul_materi');
        const postButton = document.querySelector('button[name="post"]');

        cekJudul(judulInput, postButton);

        judulInput.addEventListener('input', function () {
            cekJudul(judulInput, postButton);
        });
    });
</script>
