<x-app-guru-layout>
    <div class="p-2 mx-4 my-6 bg-white rounded-lg shadow xl:p-6">
        {{-- Breadcrumb --}}
        @php
            $breadcrumbs = [
                ['label' => 'Dashboard', 'route' => route('guru.dashboard')],
                ['label' => 'LMS', 'route' => route('guru.dashboard.lms')],
                ['label' => $mataPelajaran->nama_matpel . " " . $kelas->nama_kelas],
            ];
        @endphp

        <x-breadcrumb :breadcrumbs="$breadcrumbs" />



        <div class="px-3">
            {{-- Tabs --}}
            <div class="flex gap-2 mb-4 mt-6">
                <x-nav-button-lms route="guru.dashboard.lms.forum" :id="$id" label="Forum" />
                <x-nav-button-lms route="guru.dashboard.lms.forum.tugas" :id="$id" label="Tugas" />
                <x-nav-button-lms route="guru.dashboard.lms.forum.anggota" :id="$id" label="Anggota" />
                <x-nav-button-lms route="guru.dashboard.lms.forum.nilai_kelas" :id="$id" label="Nilai" />
            </div>

            {{-- Main --}}
        </div>
    </div>
</x-app-guru-layout>