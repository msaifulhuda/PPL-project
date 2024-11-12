<x-siswa-layout>
    <div class="p-2 mx-4 my-6 bg-white rounded-lg shadow xl:p-6">
        {{-- Breadcrumb --}}
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="flex px-3 space-x-2">
                <li class="flex">
                    <a href="{{ route('siswa.dashboard') }}" class="text-gray-400 hover:text-gray-700">
                        <span>Dashboard</span>
                    </a>
                </li>
                <div class="flex justify-center py-1">
                    <svg class="flex w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                    </svg>
                </div>
                <li class="flex">
                    <a href="{{ route('siswa.dashboard') }}" class="text-gray-400 hover:text-gray-700">
                        <span>LMS</span>
                    </a>
                </li>
                <div class="flex justify-center py-1">
                    <svg class="flex w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                    </svg>
                </div>
                <li class="flex">
                    <p class="font-semibold text-gray-700">
                        <span>Materi</span>
                    </p>
                </li>
            </ol>
        </nav>

        {{-- Main Content --}}
        <div class="flex flex-col justify-between gap-6 px-3 md:flex-row">
            {{-- Materi Pelajaran --}}
            <div class="flex flex-col gap-4 mt-6 basis-1/2">
                <h2 class="mb-2 text-3xl font-semibold text-gray-800">Materi Pelajaran</h2>

                {{-- Content --}}
                <div class="p-4 border-2 border-gray-500 rounded-xl card">
                    <h4 class="mb-3 text-2xl font-semibold">Pendidikan Agama Islam</h4>
                    <ul class="space-y-2">
                        <li><a href="" class="text-gray-700 underline hover:text-gray-900">Mengenal Nama-Nama Malaikat</a></li>
                        <li><a href="" class="text-gray-700 underline hover:text-gray-900">Mengenal Nama-Nama Malaikat</a></li>
                        <li><a href="" class="text-gray-700 underline hover:text-gray-900">Mengenal Nama-Nama Malaikat</a></li>
                    </ul>
                </div>
                {{-- Content --}}
                <div class="p-4 border-2 border-gray-500 rounded-xl card">
                    <h4 class="mb-3 text-2xl font-semibold">Pendidikan Agama Islam</h4>
                    <ul class="space-y-2">
                        <li><a href="" class="text-gray-700 underline hover:text-gray-900">Mengenal Nama-Nama Malaikat</a></li>
                        <li><a href="" class="text-gray-700 underline hover:text-gray-900">Mengenal Nama-Nama Malaikat</a></li>
                        <li><a href="" class="text-gray-700 underline hover:text-gray-900">Mengenal Nama-Nama Malaikat</a></li>
                    </ul>
                </div>
                {{-- Content --}}
                <div class="p-4 border-2 border-gray-500 rounded-xl card">
                    <h4 class="mb-3 text-2xl font-semibold">Pendidikan Agama Islam</h4>
                    <ul class="space-y-2">
                        <li><a href="" class="text-gray-700 underline hover:text-gray-900">Mengenal Nama-Nama Malaikat</a></li>
                        <li><a href="" class="text-gray-700 underline hover:text-gray-900">Mengenal Nama-Nama Malaikat</a></li>
                        <li><a href="" class="text-gray-700 underline hover:text-gray-900">Mengenal Nama-Nama Malaikat</a></li>
                    </ul>
                </div>
                {{-- Content --}}
                <div class="p-4 border-2 border-gray-500 rounded-xl card">
                    <h4 class="mb-3 text-2xl font-semibold">Pendidikan Agama Islam</h4>
                    <ul class="space-y-2">
                        <li><a href="" class="text-gray-700 underline hover:text-gray-900">Mengenal Nama-Nama Malaikat</a></li>
                        <li><a href="" class="text-gray-700 underline hover:text-gray-900">Mengenal Nama-Nama Malaikat</a></li>
                        <li><a href="" class="text-gray-700 underline hover:text-gray-900">Mengenal Nama-Nama Malaikat</a></li>
                    </ul>
                </div>
            </div>

            {{-- Materi Terbaru --}}
            <div class="flex flex-col order-first gap-4 mt-6 md:order-last basis-1/2">
                <h2 class="mb-2 text-3xl font-semibold text-gray-800">Materi Terbaru</h2>

                {{-- Content --}}
                <div class="flex flex-col gap-4 content-materi">
                    {{-- Tanggal --}}
                    <div class="materi-date">
                        <span class="text-xl font-semibold">28 Oktober 2024</span>
                    </div>
                    {{-- Materi --}}
                    <div class="px-3 py-4 border-2 border-gray-500 md:px-6 rounded-xl card">
                        <div class="flex gap-2 align-items-center">
                            <div class="flex flex-col justify-center">
                                <svg class="w-12 h-12 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-6 8a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1 3a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
                                </svg>
                            </div>

                            <div class="flex flex-col">
                                <a href="#" class="text-xl font-semibold text-gray-900 underline">Materi Baru: Mengenal Nama-Nama Malaikat</a>
                                <span>Pendidikan Agama Islam dan Budi Pekerti</span>
                            </div>
                        </div>
                    </div>
                    {{-- Materi --}}
                    <div class="px-3 py-4 border-2 border-gray-500 md:px-6 rounded-xl card">
                        <div class="flex gap-2 align-items-center">
                            <div class="flex flex-col justify-center">
                                <svg class="w-12 h-12 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-6 8a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1 3a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
                                </svg>
                            </div>

                            <div class="flex flex-col">
                                <a href="#" class="text-xl font-semibold text-gray-900 underline">Materi Baru: Mengenal Nama-Nama Malaikat</a>
                                <span>Pendidikan Agama Islam dan Budi Pekerti</span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Content --}}
                <div class="flex flex-col gap-4 content-materi">
                    {{-- Tanggal --}}
                    <div class="materi-date">
                        <span class="text-xl font-semibold">28 Oktober 2024</span>
                    </div>
                    {{-- Materi --}}
                    <div class="px-3 py-4 border-2 border-gray-500 md:px-6 rounded-xl card">
                        <div class="flex gap-2 align-items-center">
                            <div class="flex flex-col justify-center">
                                <svg class="w-12 h-12 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-6 8a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1 3a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
                                </svg>
                            </div>

                            <div class="flex flex-col">
                                <a href="#" class="text-xl font-semibold text-gray-900 underline">Materi Baru: Mengenal Nama-Nama Malaikat</a>
                                <span>Pendidikan Agama Islam dan Budi Pekerti</span>
                            </div>
                        </div>
                    </div>
                    {{-- Materi --}}
                    <div class="px-3 py-4 border-2 border-gray-500 md:px-6 rounded-xl card">
                        <div class="flex gap-2 align-items-center">
                            <div class="flex flex-col justify-center">
                                <svg class="w-12 h-12 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-6 8a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1 3a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
                                </svg>
                            </div>

                            <div class="flex flex-col">
                                <a href="#" class="text-xl font-semibold text-gray-900 underline">Materi Baru: Mengenal Nama-Nama Malaikat</a>
                                <span>Pendidikan Agama Islam dan Budi Pekerti</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-siswa-layout>
