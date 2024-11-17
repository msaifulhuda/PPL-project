<x-app-guru-layout>
    <div class="px-3 py-5 mx-4 my-6 bg-white rounded-lg shadow xl:p-6">
        {{-- Breadcrumb --}}
        @php
            $breadcrumbs = [
                ['label' => 'Dashboard', 'route' => route('guru.dashboard')],
                ['label' => 'LMS', 'route' => route('guru.dashboard.lms')],
                ['label' => 'Materi'],
            ];
        @endphp

        <x-breadcrumb :breadcrumbs="$breadcrumbs" />

        {{-- Add button --}}
        <div class="px-3 mt-5 mb-3">
            <a href="{{ route('guru.dashboard.lms.materi.create_view') }}"
                class="px-3 py-2 text-white bg-blue-500 rounded-full">
                <svg class="inline-block w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12h14m-7 7V5" />
                </svg>
                <span class="text-sm">Tambah Materi</span>
            </a>
        </div>

        @if (session('success'))
            <div id="alert-3"
                class="flex items-center p-4 my-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="text-sm font-medium ms-3">
                    {{ session('success') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif

        {{-- Main Content --}}
        <div class="flex flex-col justify-between gap-6 px-3 md:flex-row">
            {{-- Materi Pelajaran --}}
            <div class="flex flex-col gap-4 mt-6 basis-1/2">
                <h2 class="mb-2 text-2xl font-semibold text-gray-800">Materi Pelajaran</h2>

                @foreach ($kelas_mata_pelajaran as $item)
                    {{-- Content --}}
                    <div class="p-4 border-2 border-gray-500 rounded-xl card">
                        <h4 class="mb-3 text-xl font-semibold">
                            {{ $item->mataPelajaran->nama_matpel . ' ' . $item->kelas->nama_kelas }}</h4>
                        <ul class="space-y-2 text-sm">
                            @foreach ($materi as $m)
                                @if ($m->kelas_mata_pelajaran_id == $item->id_kelas_mata_pelajaran)
                                    <li><a href="{{ route('guru.dashboard.lms.materi.detail', ['id' => $m->id_materi]) }}"
                                            class="text-gray-700 underline hover:text-gray-900">{{ $m->judul_materi }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>

            {{-- Materi Terbaru --}}
            <div class="flex flex-col order-first gap-4 mt-6 md:order-last basis-1/2">
                <h2 class="mb-2 text-2xl font-semibold text-gray-800">Materi Terbaru</h2>


                @foreach ($materi_baru_date as $date)
                    {{-- Content --}}
                    <div class="flex flex-col gap-4 content-materi">
                        {{-- Tanggal --}}
                        <div class="materi-date">
                            <span class="text-lg font-semibold">{{ $date }}</span>
                        </div>
                        @foreach ($materi_baru as $mb)
                            @if ($mb->updated_at->format('d F Y') == $date)
                                {{-- Materi --}}
                                <div
                                    class="px-3 py-4 border-2 border-gray-500 md:px-4 rounded-xl card {{ $mb->status == 0 ? 'bg-gray-200' : '' }}">
                                    <div class="flex gap-2 align-items-center">
                                        <div class="flex flex-col justify-center">
                                            <svg class="w-10 h-10 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-6 8a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1 3a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>

                                        <div class="flex flex-col">
                                            @if ($mb->status == 0)
                                                <a href="{{ route('guru.dashboard.lms.materi.create', ['id' => $mb->kelas_mata_pelajaran_id]) }}"
                                                    class="text-base font-semibold text-gray-900 underline">Materi Baru:
                                                    {{ $mb->judul_materi }}</a>
                                            @else
                                                <a href="{{ route('guru.dashboard.lms.materi.detail', ['id' => $mb->id_materi]) }}"
                                                    class="text-base font-semibold text-gray-900 underline">Materi Baru:
                                                    {{ $mb->judul_materi }}</a>
                                            @endif
                                            <span
                                                class="text-sm">{{ $mb->kelasMataPelajaran->mataPelajaran->nama_matpel }}
                                                {{ $mb->kelasMataPelajaran->kelas->nama_kelas }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-guru-layout>
