<x-siswa-layout>
    <div class="p-2 mx-4 my-6 bg-white rounded-lg shadow xl:p-6">
        {{-- Breadcrumb --}}
        @php
            $breadcrumbs = [
                ['label' => 'Dashboard', 'route' => route('siswa.dashboard')],
                ['label' => 'LMS', 'route' => route('siswa.dashboard.lms')],
                ['label' => $mataPelajaran->nama_matpel, 'route' => route('siswa.dashboard.lms.forum', $id)],
            ];
        @endphp

        <x-breadcrumb :breadcrumbs="$breadcrumbs" />


        {{-- Main Content --}}
        <div class="px-3">
            {{-- Tabs --}}
            <div class="flex gap-2 mb-4 mt-6">
                <x-nav-button-lms route="siswa.dashboard.lms.forum" :id="$id" label="Forum" />

                <x-nav-button-lms route="siswa.dashboard.lms.forum.tugas" :id="$id" label="Tugas" />

                <x-nav-button-lms route="siswa.dashboard.lms.forum.anggota" :id="$id" label="Anggota" />
            </div>

            {{-- LIST TOPIK DAN TUGAS --}}
            @foreach ($listTopik as $topik)
                <h2 class="mt-6 text-lg font-semibold">Bab {{ $topik->judul_topik }}</h2>

                {{-- Daftar Tugas --}}
                @forelse ($topik->tugas as $tugas)
                    <div class="p-4 mt-2 border rounded-lg shadow">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M8.5 3a5.5 5.5 0 100 11h3a5.5 5.5 0 000-11h-3zm0 1h3a4.5 4.5 0 110 9h-3a4.5 4.5 0 010-9z" />
                            </svg>
                            <div class="ml-3">
                                <p class="text-base font-semibold">{{ $tugas->judul }}</p>
                                <p class="text-sm text-gray-600">
                                    Tenggat:
                                    {{ $tugas->deadline ? \Carbon\Carbon::parse($tugas->deadline)->format('d F Y, H:i') : 'Tidak ada tenggat' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">Tidak ada tugas untuk topik ini.</p>
                @endforelse
            @endforeach






        </div>
    </div>
</x-siswa-layout>
