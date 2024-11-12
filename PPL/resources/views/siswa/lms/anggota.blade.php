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


            {{-- Main Content with Sidebar and Material/Tugas --}}

        </div>
    </div>
</x-siswa-layout>
