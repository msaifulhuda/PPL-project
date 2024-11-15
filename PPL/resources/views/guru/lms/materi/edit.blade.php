<x-app-guru-layout>
    <div class="px-3 py-5 mx-4 my-6 bg-white rounded-lg shadow xl:p-6">
        {{-- Breadcrumb --}}
        @php
            $kelas = $kelas_mata_pelajaran->mataPelajaran->nama_matpel . " " . $kelas_mata_pelajaran->kelas->nama_kelas;
            $breadcrumbs = [
                ['label' => 'Dashboard', 'route' => route('guru.dashboard')],
                ['label' => 'LMS', 'route' => route('guru.dashboard.lms')],
                ['label' => 'Materi', 'route' => route('guru.dashboard.lms.materi')],
                ['label' => $materi->judul_materi, 'route' => route('guru.dashboard.lms.materi.detail', $materi->id_materi)],
                ['label' => "Edit Materi"],
            ];
        @endphp
        <x-breadcrumb :breadcrumbs="$breadcrumbs" />

        {{-- Main Content --}}
        <div class="px-3 mt-8">
            <form action="{{ route('guru.dashboard.lms.materi.update', $materi->id_materi) }}" method="POST" class="flex gap-6" enctype="multipart/form-data">
                @method('put')
                @csrf
                <input type="hidden" name="id_kelas_mata_pelajaran" value="{{ $kelas_mata_pelajaran->id_kelas_mata_pelajaran }}">

                <div class="w-3/4 border rounded-lg">
                    <div class="flex flex-col gap-6 p-6">
                        <div class="flex flex-col gap-3">
                            <label for="judul_materi" class="text-gray-700">Judul Materi</label>
                            <input type="text" name="judul_materi" id="judul_materi" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" value="{{ old('judul_materi') ?? $materi->judul_materi }}">
                            @error('judul_materi')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-3">
                            <label for="deskripsi" class="text-gray-700">Deskripsi Materi (Optional)</label>
                            <textarea name="deskripsi" id="deskripsi" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" rows="6">{{ old('deskripsi') ?? $materi->deskripsi }}</textarea>
                        </div>

                        <div class="flex flex-col gap-3">
                            <label for="file_materi" class="text-gray-700">File Materi</label>
                            <i class="text-sm text-blue-500">*File yang anda pilih akan menghapus file yang sudah dimasukkan sebelumnya</i>
                            <input type="file" name="file_materi[]" id="file_materi" class="w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" multiple>
                            @error('file_materi')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div id="filePreview" class="grid gap-4 sm:grid-cols-1 md:grid-cols-3 xl:grid-cols-3 2xl:grid-cols-4">

                        </div>
                    </div>
                </div>

                <div class="w-1/3 border rounded-lg">
                    <div class="flex flex-col gap-6 p-6">
                        <div class="flex flex-col gap-3">
                            <label for="topik_id" class="text-gray-700">Topik</label>
                            <select name="topik_id" id="topik_id" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                                <option selected disabled>Pilih Topik</option>
                                @php
                                    $selected = old('topik_id') ?? $materi->topik_id;
                                @endphp
                                @foreach ($topik as $item)
                                    <option value="{{ $item->id_topik }}" {{ $selected == $item->id_topik ? 'selected' : '' }}>{{ $item->judul_topik }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-wrap justify-end">
                            <a href="" class="px-6 py-2 mr-3 text-white bg-gray-600 rounded-md hover:bg-gray-700">Tambah Topik</a>

                            <button type="button" id="update" name="update" class="px-6 py-2 font-thin text-gray-400 bg-gray-300 cursor-default rounded-l-md">Simpan</button>
                            <button type="button" class="flex px-2 pt-2 text-sm bg-blue-500 rounded-r-md" id="topik-menu-button-2" aria-expanded="false" data-dropdown-toggle="dropdown-3">
                                <span class="sr-only">Open topik</span>
                                <svg class="w-6 h-6 text-slate-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Dropdown Submit Modal --}}
                <div class="z-10 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow" id="dropdown-3">
                    <ul class="py-1" role="none">
                        <li>
                            <button type="submit" name="update" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Simpan</button>
                        </li>
                        <li>
                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="z-10 block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" type="button">Hapus</button>
                        </li>
                    </ul>
                </div>
            </form>

             {{-- Delete Button Modal --}}
             <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-gray-800 bg-opacity-50">
                <div class="relative w-full max-w-md max-h-full p-4">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 text-center md:p-5">
                            <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah kamu yakin ingin menghapus?</h3>
                            <form action="{{ route('guru.dashboard.lms.materi.destroy', ['id' => $materi->id_materi]) }}" method="post" class="inline-flex">
                                @method('delete')
                                @csrf
                                <button type="submit" name="delete" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                    Hapus
                                </button>
                            </form>
                            <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-guru-layout>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>
    $(function () {
        // File Preview
        const selectIcon = function (fileType) {
            if (fileType == 'pdf') {
                return `<svg class="w-10 h-10 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/
                                            2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M3 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h18a2 2 0 0 0 2-2V9l-6-6H3Zm6 2h6v2H9V5Zm0 3h6v2H9V8Zm0 3h6v2H9v-2Zm0 3h4v2H9v-2Zm11 8H3V5h6v4h8v2h4v10Zm-2-8h-4V7h4v2Z">
                                                </path>
                                            </svg>`;
            } else if (fileType == 'docx' || fileType == 'doc') {
                return `<svg class="w-10 h-10 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/
                                            2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M3 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h18a2 2 0 0 0 2-2V9l-6-6H3Zm6 2h6v2H9V5Zm0 3h6v2H9V8Zm0 3h6v2H9v-2Zm0 3h4v2H9v-2Zm11 8H3V5h6v4h8v2h4v10Zm-2-8h-4V7h4v2Z">
                                                </path>
                                            </svg>`;
            } else if (fileType == 'pptx' || fileType == 'ppt') {
                return `<svg class="w-10 h-10 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/
                                            2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M3 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h18a2 2 0 0 0 2-2V9l-6-6H3Zm6 2h6v2H9V5Zm0 3h6v2H9V8Zm0 3h6v2H9v-2Zm0 3h4v2H9v-2Zm11 8H3V5h6v4h8v2h4v10Zm-2-8h-4V7h4v2Z">
                                                </path>
                                            </svg>`;
            } else if (fileType == 'xlsx') {
                return `<svg class="w-10 h-10 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/
                                            2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M3 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h18a2 2 0 0 0 2-2V9l-6-6H3Zm6 2h6v2H9V5Zm0 3h6v2H9V8Zm0 3h6v2H9v-2Zm0 3h4v2H9v-2Zm11 8H3V5h6v4h8v2h4v10Zm-2-8h-4V7h4v2Z">
                                                </path>
                                            </svg>`;
            } else {
                return `<svg class="w-10 h-10 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/
                                            2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M3 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h18a2 2 0 0 0 2-2V9l-6-6H3Zm6 2h6v2H9V5Zm0 3h6v2H9V8Zm0 3h6v2H9v-2Zm0 3h4v2H9v-2Zm11 8H3V5h6v4h8v2h4v10Zm-2-8h-4V7h4v2Z">
                                                </path>
                                            </svg>`;
            }
        }
        const previewFile = function (input, imgPreviewPlaceholder) {
            if (input.files) {
                let filesAmount = input.files.length;

                for (let i=0; i<filesAmount; i++) {
                    const reader = new FileReader();

                    reader.onload = function (event) {
                        const fileType = input.files[i].name.split('.').pop().toLowerCase();
                        const fileName = input.files[i].name.substring(0, 30) + (input.files[i].name.length > 30 ? '...' : '');
                        $(imgPreviewPlaceholder).append(`
                            <div class="h-20 p-4 border border-gray-400 rounded-md fw-1/2">
                                <div class="flex items-center w-full h-full gap-2">
                                    ${selectIcon(fileType)}
                                    <span class="text-sm file_name">${fileName}</span>
                                </div>
                            </div>
                        `);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        }
        const previewFileOld = function (file, imgPreviewPlaceholder) {
            const fileType = file.split('.').pop().toLowerCase();
            const fileName = file.split('/').pop().substring(0, 30) + (file.split('/').pop().length > 30 ? '...' : '');
            $(imgPreviewPlaceholder).append(`
                <div class="h-20 p-4 border border-gray-400 rounded-md fw-1/2">
                    <div class="flex items-center w-full h-full gap-2">
                        ${selectIcon(fileType)}
                        <span class="text-sm file_name">${fileName}</span>
                    </div>
                </div>
            `);
        }
        @foreach ($file_materi_old as $item)
            previewFileOld('{{ $item->file_path }}', '#filePreview');
        @endforeach


        $('#file_materi').on('change', function () {
            $('#filePreview').empty();
            previewFile(this, '#filePreview');
        });

        // Dropdown
        const cekJudul = function (judulInput, postButton) {
            if (judulInput.val().trim() !== '') {
                postButton.attr('type', 'submit');
                postButton.removeClass('cursor-default bg-gray-300 text-gray-400');
                postButton.addClass('bg-blue-500 text-white');
            } else {
                postButton.attr('type', 'button');
                postButton.addClass('cursor-default bg-gray-300 text-gray-400');
                postButton.removeClass('bg-blue-500 text-white');
            }
        }
        const judulInput = $('#judul_materi');
        const postButton = $('button#update');
        cekJudul(judulInput, postButton);
        judulInput.on('input', function () {
            cekJudul(judulInput, postButton);
        });
    })

</script>
