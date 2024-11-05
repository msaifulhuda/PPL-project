<x-staffakademik-layout>
    <div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-3 xl:gap-4 dark:bg-gray-900">
        <div class="mb-4 col-span-full xl:mb-2">
            <div
            class="p-4 mb-4 space-y-6 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <nav class="flex mb-5" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="#"
                            class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-primary-500">
                            <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <a href="#"
                                class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-primary-500">Prestasi</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500"
                                aria-current="page">Kelola Prestasi</span>
                        </div>
                    </li>
                </ol>
            </nav>
            
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Kelola Prestasi
            </h1>
            <p class="mb-2 text-gray-300 dark:text-gray-200">Ini merupakan halaman kelola Prestasi</p>
            <div class="flex items-center space-x-4">
            <!-- Button untuk membuka modal -->
            <button onclick="window.location.href='{{ route('prestasi.create') }}'"
            class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800" 
            data-modal-target="authentication-modal" data-modal-toggle="authentication-modal">
            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
            Tambah Data
            </span>
            </button>

                <!-- Vertical Divider Line -->
                <span class="h-11 w-px bg-gray-300"></span>
                <button  onclick="window.location.href='{{ route('prestasi.pengajuan') }}'"
                class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Pengajuan
                    </span>
                </button>
            </div>
        </div>
        <!-- Right Content -->
        <div class="col-span-full xl:col-auto">
            <div
                class="p-4 mb-4 space-y-6 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="px-4 py-2 text-gray-700 border-b border-gray-200 dark:border-gray-600">
                    <h3 class="font-semibold text-lg">Data Prestasi</h3>
                </div>
            
                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 border border-gray-200 rounded-lg">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-sm leading-normal">
                            <tr>
                                <th class="py-3 px-6 text-left">No</th>
                                <th class="py-3 px-6 text-left">ID Siswa</th>
                                <th class="py-3 px-6 text-left">ID Prestasi</th>
                                <th class="py-3 px-6 text-left">Nama Prestasi</th>
                                <th class="py-3 px-6 text-left">Bukti</th>
                                <th class="py-3 px-6 text-left">Deskripsi</th>
                                <th class="py-3 px-6 text-left">Aksi</th>
                                <th class="py-3 px-6 text-left">Status</th>
                            </tr>
                        </thead>
                        
        </table>
    </div>
            </div>
            <div class="p-2 mb-2 space-y-2 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-4 dark:bg-gray-800">
            <!-- Pagination -->
            <div class="p-1 mb-1 space-y-1 bg-white rounded-lg shadow-sm sm:p-2 dark:bg-gray-300" style="border: 1px solid #e5e7eb;">
                <div class="flex justify-center mt-4">
                    <ul class="inline-flex items-center space-x-1">
                        <!-- Active Page Button -->
                        <li><button class="px-3 py-2 text-sm text-blue-600 border border-gray-300 rounded-lg bg-blue-100">1</button></li>
                        <!-- Other Page Buttons -->
                        <li><button class="px-3 py-2 text-sm text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-200">2</button></li>
                        <li><button class="px-3 py-2 text-sm text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-200">3</button></li>
                        <li><button class="px-3 py-2 text-sm text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-200">4</button></li>
                        <li><button class="px-3 py-2 text-sm text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-200">5</button></li>
                        <!-- Next Button -->
                        <li><button class="px-3 py-2 text-sm text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-200">Next</button></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-staffakademik-layout>