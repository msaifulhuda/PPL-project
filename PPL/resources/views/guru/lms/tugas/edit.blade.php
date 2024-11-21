<x-app-guru-layout>
    <div class="px-3 py-5 mx-4 my-6 bg-white rounded-lg shadow xl:p">
        {{-- Breadcrumb --}}
        @php
            $breadcrumbs = [
                ['label' => 'Dashboard', 'route' => route('guru.dashboard')],
                ['label' => 'LMS', 'route' => route('guru.dashboard.lms')],
                ['label' => 'Edit Tugas ' . $mataPelajaran->nama_matpel . ' ' . $kelas->nama_kelas],
            ];
        @endphp
        <x-breadcrumb :breadcrumbs="$breadcrumbs" />

        @if (session()->has('success'))
            <x-alert-notification :color="'blue'">
                {{ session('success') }}
            </x-alert-notification>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('guru.dashboard.lms.tugas.update', $tugas->id_tugas) }}" method="POST"
            enctype="multipart/form-data" class="mt-6" id="editTaskForm">
            @csrf
            @method('PUT')
            <input type="hidden" name="kelas_mata_pelajaran_id" value="{{ $tugas->kelas_mata_pelajaran_id }}">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-2 space-y-6">
                    <!-- Judul -->
                    <div>
                        <label for="judul" class="block text-sm font-medium text-gray-700">Judul Tugas</label>
                        <input type="text" name="judul_tugas" id="judul" value="{{ $tugas->judul }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            required>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi Materi
                            (Optional)</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $tugas->deskripsi }}</textarea>
                    </div>

                    <!-- Existing Files -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">File Tugas Sebelumnya</label>
                        <div id="existing-files" class="mt-2 space-y-2">
                            @foreach ($tugas->filetugas as $file)
                                <div class="flex items-center justify-between p-2 bg-gray-100 rounded-md"
                                    data-file-id="{{ $file->id_file_tugas }}">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                        <span>{{ $file->original_name }}</span>
                                    </div>
                                    <button type="button" class="text-red-500 hover:text-red-700 remove-existing-file"
                                        data-file-id="{{ $file->id_file_tugas }}">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <input type="hidden" name="removed_files" id="removed-files-input" value="">
                    </div>

                    <!-- File Upload -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tambah File Tugas</label>
                        <div
                            class="mt-1 flex justify-center px-4 py-4 md:px-6 md:pt-5 md:pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <div class="flex flex-col items-center">
                                    <label for="files"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:underline">
                                        <span>Upload files</span>
                                        <input id="files" name="files[]" type="file" class="sr-only" multiple
                                            accept=".pdf,.doc,.docx,.ppt,.pptx">
                                    </label>
                                    <p class="text-xs mt-4 text-gray-500">PDF, DOC, DOCX, PPT, PPTX up to 10MB each</p>
                                </div>
                                <div id="file-list" class="mt-4 text-sm text-gray-500"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <!-- Tenggat -->
                    <div>
                        <label for="tenggat" class="block text-sm font-medium text-gray-700">Tenggat</label>
                        <input type="datetime-local" name="tenggat" id="tenggat"
                            value="{{ \Carbon\Carbon::parse($tugas->deadline)->format('Y-m-d\TH:i') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <!-- Topik -->
                    <div>
                        <label for="topik_id" class="block text-sm font-medium text-gray-700">Topik</label>
                        <select name="topik_id" id="topik_id"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="">Pilih Topik</option>
                            @foreach ($topiks as $topik)
                                <option value="{{ $topik->id_topik }}"
                                    {{ $tugas->topik_id == $topik->id_topik ? 'selected' : '' }}>
                                    {{ $topik->judul_topik }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col gap-y-3">
                        <button type="submit"
                            class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Perbarui Tugas
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let selectedFiles = [];
            const fileInput = document.getElementById('files');
            const fileList = document.getElementById('file-list');
            const maxFileSize = 10 * 1024 * 1024; // 10MB in bytes
            const removedFilesInput = document.getElementById('removed-files-input');
            let removedFiles = [];

            // Function to validate and add files
            function addFiles(newFiles) {
                const validatedFiles = newFiles.filter(file => {
                    if (file.size > maxFileSize) {
                        alert(`File ${file.name} terlalu besar. Maksimal ukuran file adalah 10MB.`);
                        return false;
                    }

                    const validTypes = ['application/pdf', 'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        'application/vnd.ms-powerpoint',
                        'application/vnd.openxmlformats-officedocument.presentationml.presentation'
                    ];
                    if (!validTypes.includes(file.type)) {
                        alert(
                            `File ${file.name} tidak didukung. Format yang didukung: PDF, DOC, DOCX, PPT, PPTX.`
                        );
                        return false;
                    }

                    // Check for duplicate files
                    const isDuplicate = selectedFiles.some(existingFile =>
                        existingFile.name === file.name && existingFile.size === file.size
                    );

                    if (isDuplicate) {
                        alert(`File ${file.name} sudah ada dalam daftar.`);
                        return false;
                    }

                    return true;
                });

                selectedFiles = [...selectedFiles, ...validatedFiles];
                updateFileList();
            }

            // Event listener for file input
            fileInput.addEventListener('change', function(e) {
                addFiles(Array.from(this.files));
                // Reset file input to allow re-selecting same files
                this.value = '';
            });

            // Update file list UI
            function updateFileList() {
                fileList.innerHTML = '';
                selectedFiles.forEach((file, index) => {
                    const fileItem = `
            <div class="flex gap-4 items-center justify-between underline" data-file-index="${index}">
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span class="text-sm text-gray-600">${file.name}</span>
                </div>
                <button type="button" onclick="removeNewFile(${index})" class="text-red-500 hover:text-red-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            `;
                    fileList.insertAdjacentHTML('beforeend', fileItem);
                });
            }

            // Remove new file from list
            window.removeNewFile = function(index) {
                selectedFiles.splice(index, 1);
                updateFileList();
            };

            // Handle removing existing files
            document.querySelectorAll('.remove-existing-file').forEach(button => {
                button.addEventListener('click', function() {
                    const fileId = this.getAttribute('data-file-id');
                    const fileElement = this.closest('[data-file-id]');

                    // Add to removed files list
                    if (!removedFiles.includes(fileId)) {
                        removedFiles.push(fileId);
                    }
                    removedFilesInput.value = removedFiles.join(',');

                    // Remove from UI
                    fileElement.remove();
                });
            });

            document.getElementById('editTaskForm').addEventListener('submit', function(e) {
                e.preventDefault();

                // Validasi
                const requiredFields = ['judul_tugas', 'tenggat'];
                let isValid = true;

                requiredFields.forEach(field => {
                    const input = this.querySelector(`[name="${field}"]`);
                    if (!input.value.trim()) {
                        isValid = false;
                        input.classList.add('border-red-500');
                    } else {
                        input.classList.remove('border-red-500');
                    }
                });

                if (!isValid) {
                    alert('Mohon lengkapi semua field yang wajib diisi');
                    return;
                }

                // Persiapan FormData
                const formData = new FormData(this);

                // Tambahkan file baru
                selectedFiles.forEach(file => {
                    formData.append('files[]', file);
                });

                // Tambahkan file yang dihapus
                formData.append('removed_files', removedFiles.join(','));

                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;

                // Nonaktifkan tombol dan tampilkan loading
                submitBtn.disabled = true;
                submitBtn.innerHTML = `Memperbarui...`;

                // Kirim data dengan fetch
                fetch(this.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.text().then(text => {
                                throw new Error(text);
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            window.location.href = data.redirect;
                        } else {
                            throw new Error(data.message || 'Gagal memperbarui tugas');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert(error.message);

                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalText;
                    });
            });
        });
    </script>   

</x-app-guru-layout>
