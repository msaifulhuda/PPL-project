<x-app-guru-layout>
    <div class="px-3 py-5 mx-4 my-6 bg-white rounded-lg shadow xl:p">
        @php
            $breadcrumbs = [
                ['label' => 'Dashboard', 'route' => route('guru.dashboard')],
                ['label' => 'LMS', 'route' => route('guru.dashboard.lms')],
                ['label' => 'Detail Tugas'],
            ];
        @endphp

        <x-breadcrumb :breadcrumbs="$breadcrumbs" />

        <div class="mt-6 px-3">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Main Content -->
                <div class="md:col-span-2 space-y-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">{{ $tugas->judul }}</h2>
                        <p class="mt-2 text-gray-600">{{ $tugas->deskripsi }}</p>
                    </div>

                    @if ($tugas->filetugas->count() > 0)
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">File Materi</h3>
                            <div class="mt-4 space-y-3">
                                @foreach ($tugas->filetugas as $file)
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                        <div class="flex items-center space-x-3">
                                            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                </path>
                                            </svg>
                                            <span class="text-sm text-gray-600">{{ $file->original_name }}</span>
                                        </div>
                                        <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank"
                                            class="text-indigo-600 hover:text-indigo-800">
                                            Lihat
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <div class="bg-gray-50 p-4 rounded-lg ">
                        <h3 class="text-lg font-semibold text-gray-900">Informasi Tugas</h3>
                        <dl class="mt-4 space-y-3">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Topik</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $tugas->topik->judul_topik }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Tenggat</dt>
                                <dd class="mt-1 text-sm  text-red-600">
                                    {{ $tugas->deadline ? $tugas->deadline->format('d M Y H:i') : 'Tidak ada tenggat' }}


                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Dibuat pada</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $tugas->created_at->format('d M Y') }}</dd>
                            </div>
                        </dl>
                    </div>

                    <div class="flex flex-col gap-y-3">

                        <div class="flex gap-x-2">
                            <a href="{{ route('guru.dashboard.lms.tugas.edit', $tugas->id_tugas) }}"
                                class="flex-1 font-semibold inline-flex justify-center py-2 px-4 border border-black rounded-lg hover:bg-yellow-400">
                                Edit Tugas
                            </a>
                            <a href=""
                                class=" flex-1 inline-flex justify-center py-2 px-4 border border-black rounded-lg font-semibold hover:bg-red-500">
                                Hapus Tugas
                            </a>
                        </div>
                        <a href=""
                            class="font-semibold inline-flex justify-center py-2 px-4 border border-black rounded-lg hover:bg-blue-500">
                            Tugas Siswa
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteTugas(id) {
            if (confirm('Apakah Anda yakin ingin menghapus tugas ini?')) {
                fetch(`/guru/dashboard/lms/tugas/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            window.location.href = "{{ route('guru.dashboard.lms') }}";
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        }
    </script>
</x-app-guru-layout>

`
        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        Memperbarui...
    `;
