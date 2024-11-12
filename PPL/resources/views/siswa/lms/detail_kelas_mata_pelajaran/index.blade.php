<x-siswa-layout>
    <div class="p-2 mx-4 my-6 bg-white rounded-lg shadow xl:p-6">
        {{-- Breadcrumb --}}
        @php
            $breadcrumbs = [
                ['label' => 'Dashboard', 'route' => route('siswa.dashboard')],
                ['label' => 'LMS', 'route' => route('siswa.dashboard.lms')],
                ['label' => $mataPelajaran->nama_matpel, 'route' => route('siswa.dashboard.lms.detail', $id)],
            ];
        @endphp

        <x-breadcrumb :breadcrumbs="$breadcrumbs" />


        {{-- Main Content --}}
        <div class="px-3">
            {{-- Tabs --}}
            <div class="flex gap-2 mb-4 mt-6">
                <button
                    class="px-6 py-2 border border-black font-semibold text-gray-700 bg-gray-100 rounded-lg">Forum</button>
                <button class="px-6 py-2 border border-black font-semibold text-gray-700 bg-gray-100 rounded-lg">Tugas
                    Kelas</button>
                <button
                    class="px-6 py-2 border border-black font-semibold text-gray-700 bg-gray-100 rounded-lg">Anggota</button>
            </div>

            {{-- Main Content with Sidebar and Material/Tugas --}}
            <div class="flex flex-col md:flex-row gap-4">
                {{-- Left Sidebar --}}
                <div class="flex flex-col gap-4 w-full md:w-1/3">
                    {{-- Instructor Info --}}
                    <div class="p-4 bg-gray-100 rounded-lg  border border-black">
                        <div class="flex items-center gap-2">
                            <div>
                                <h3 class="font-semibold text-gray-800">{{ $guru->nama_guru }}</h3>
                                <p class="text-sm text-gray-500">{{ $hari->nama_hari }}, {{ $waktu_mulai }} -
                                    {{ $waktu_selesai }} WIB</p>
                            </div>
                        </div>
                    </div>

                    {{-- Upcoming Assignments --}}
                    <div class="p-4  rounded-lg border border-black">
                        <h4 class="font-semibold text-gray-800 mb-2">Mendatang</h4>
                        <ul class="text-sm text-gray-600 space-y-3">
                            <!-- Adjusted space-y-1 to space-y-3 for more spacing -->
                            <li>
                                <p class="text-gray-600">Tanggal: Kamis, 07 November 2024</p>
                                <a href="#" class="text-blue-500 underline">Tugas 1 - Pembuatan UI/UX Desain</a>
                            </li>
                            <li>
                                <p class="text-gray-600">Tanggal: Sabtu, 09 November 2024</p>
                                <a href="#" class="text-blue-500 underline">Tugas Harian - Analisis tentang UX</a>
                            </li>
                        </ul>
                        <a href="#" class="text-blue-500 text-sm underline mt-2 block">Lihat Semua</a>
                    </div>

                </div>

                {{-- Right Sidebar/Main Content --}}
                <div class="flex flex-col gap-4 w-full md:w-2/3">
                    {{-- List of Materi & Tugas --}}
                    <div class="space-y-4">
                        {{-- Sample Item --}}
                        <div
                            class="flex items-center p-4 bg-white border border-black rounded-lg shadow hover:bg-gray-100 transition duration-200">
                            <div class="mr-4 bg-purple-100 p-2 rounded-full">
                                <svg width="18" height="20" viewBox="0 0 18 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.954915 2.06107C0 3.3754 0 5.25027 0 9V11C0 14.7497 0 16.6246 0.954915 17.9389C1.26331 18.3634 1.6366 18.7367 2.06107 19.0451C3.3754 20 5.25027 20 9 20C12.7497 20 14.6246 20 15.9389 19.0451C16.3634 18.7367 16.7367 18.3634 17.0451 17.9389C18 16.6246 18 14.7497 18 11V9C18 5.25027 18 3.3754 17.0451 2.06107C16.7367 1.6366 16.3634 1.26331 15.9389 0.954915C14.6246 0 12.7497 0 9 0C5.25027 0 3.3754 0 2.06107 0.954915C1.6366 1.26331 1.26331 1.6366 0.954915 2.06107ZM5 5.25C4.58579 5.25 4.25 5.58579 4.25 6C4.25 6.41421 4.58579 6.75 5 6.75H13C13.4142 6.75 13.75 6.41421 13.75 6C13.75 5.58579 13.4142 5.25 13 5.25H5ZM5 9.25C4.58579 9.25 4.25 9.58579 4.25 10C4.25 10.4142 4.58579 10.75 5 10.75H13C13.4142 10.75 13.75 10.4142 13.75 10C13.75 9.58579 13.4142 9.25 13 9.25H5ZM5 13.25C4.58579 13.25 4.25 13.5858 4.25 14C4.25 14.4142 4.58579 14.75 5 14.75H13C13.4142 14.75 13.75 14.4142 13.75 14C13.75 13.5858 13.4142 13.25 13 13.25H5Z"
                                        fill="#2D264B" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-800">Materi Baru: Mengenal Nama-Nama Malaikat</h4>
                                <p class="text-sm text-gray-500">28 Oktober 2024</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-siswa-layout>
