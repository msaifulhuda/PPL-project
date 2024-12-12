<x-siswa-layout>
    <div class="p-2 mx-4 my-6 bg-white rounded-lg shadow xl:p-6">
        {{-- Breadcrumb --}}
        {{-- @php
            $breadcrumbs = [
                ['label' => 'Dashboard', 'route' => route('siswa.dashboard')],
                ['label' => 'UJIAN', 'route' => route('siswa.dashboard.ujian')],
            ];
        @endphp --}}

        {{-- <x-breadcrumb :breadcrumbs="$breadcrumbs" /> --}}
    </div>

    {{-- Main Content --}}
    <div class="p-6 bg-white rounded shadow">
        <h2 class="text-lg font-bold text-gray-800">Daftar Ujian</h2>
        <table class="w-full mt-4 border-collapse border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-2 border border-gray-300">Judul</th>
                    <th class="p-2 border border-gray-300">Deskripsi</th>
                    <th class="p-2 border border-gray-300">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ujians as $ujian)
                <tr>
                    <td class="p-2 border border-gray-300">{{ $ujian->judul }}</td>
                    <td class="p-2 border border-gray-300">{{ $ujian->deskripsi }}</td>
                    <td class="p-2 border border-gray-300">
                        <a href="{{ route('siswa.ujian.start', $ujian->id_ujian) }}" class="text-blue-500">Mulai Ujian</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="p-2 text-center border border-gray-300">Tidak ada ujian tersedia</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-siswa-layout>
