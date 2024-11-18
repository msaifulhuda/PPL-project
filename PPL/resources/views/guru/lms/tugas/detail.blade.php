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

        <div class="mt-6">
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
                                            <span class="text-sm text-gray-600">{{ $file->file_path }}</span>
                                        </div>
                                        <a  href="{{ asset('storage/' . $file->file_path) }}" target="_blank"
                                            class="text-indigo-600 hover:text-indigo-800">
                                            Download
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-900">Informasi Tugas</h3>
                        <dl class="mt-4 space-y-3">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Topik</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $tugas->topik->judul_topik }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Tenggat</dt>
                                <dd class="mt-1 text-sm text-gray-900">
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
                        <a href=""
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Edit Tugas
                        </a>
                        <button type="button" onclick="deleteTugas({{ $tugas->id }})"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Hapus Tugas
                        </button>
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
