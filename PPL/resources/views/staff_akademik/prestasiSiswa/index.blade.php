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
                                class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-primary-500">Pages</a>
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
                                aria-current="page">Playground</span>
                        </div>
                    </li>
                </ol>
            </nav>
            
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Kelola Prestasi
            </h1>
            <p class="mb-2 text-gray-300 dark:text-gray-200">Ini merupakan halaman kelola Prestasi</p>
            <div class="flex items-center space-x-4">
            <!-- Button untuk membuka modal -->
            <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800" 
            data-modal-target="authentication-modal" data-modal-toggle="authentication-modal">
            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
            Tambah Data
            </span>
            </button>

            <!-- Modal dengan backdrop blur -->
            <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-sm bg-opacity-70">
            <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Data Prestasi Siswa
                    </h3>
                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="#">
                        <div>
                            <label for="id_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID Siswa</label>
                            <input type="text" id="id_siswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        </div>
                        <div>
                            <label for="id_prestasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID Prestasi</label>
                            <input type="text" id="id_prestasi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        </div>
                        <div>
                            <label for="nama_prestasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Prestasi</label>
                            <input type="text" id="nama_prestasi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        </div>
                        <div>
                            <label for="bukti" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bukti</label>
                            <input type="file" id="bukti" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                        </div>
                        <div>
                            <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                            <textarea id="deskripsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan Data</button>
                        <!-- Button Cancel untuk kembali ke halaman tertentu -->
                        <button type="button" class="w-full text-gray-700 bg-gray-300 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-500 dark:hover:bg-gray-600 dark:focus:ring-gray-700 mt-3" 
                        onclick="window.location.href='{{ route('prestasi.index') }}'" data-modal-hide="authentication-modal">
                        Batal
                        </button>
                    </form>
                </div>
            </div>
            </div>
            </div>

                <!-- Vertical Divider Line -->
                <span class="h-11 w-px bg-gray-300"></span>
                <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
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
                        <tbody class="text-gray-700 dark:text-gray-300 text-sm font-light">
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="py-3 px-6 text-center font-semibold">1.</td>
                                <td class="py-3 px-6">172893</td>
                                <td class="py-3 px-6">123456789</td>
                                <td class="py-3 px-6">Akademik</td>
                                <td class="py-3 px-6 text-blue-500 underline cursor-pointer">Lihat detail</td>
                                <td class="py-3 px-6">Juara I Lomba Membaca Puisi</td>
                                <td class="py-3 px-6 flex space-x-2">
                                    <button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-xs px-3 py-1.5 text-center">
                                        Edit
                                    </button>
                                    <button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-xs px-3 py-1.5 text-center">
                                        Delete
                                    </button>
                                </td> 
                                <td class="py-3 px-6">
                                    <span class="px-3 py-1 text-green-600 bg-green-100 rounded-full">Accepted</span>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="py-3 px-6 text-center font-semibold">2.</td>
                                <td class="py-3 px-6">123990</td>
                                <td class="py-3 px-6">876543210</td>
                                <td class="py-3 px-6">Non-Akademik</td>
                                <td class="py-3 px-6 text-blue-500 underline cursor-pointer">Lihat detail</td>
                                <td class="py-3 px-6">Juara II Lomba Melukis</td>
                                <td class="py-3 px-6 flex space-x-2">
                                    <button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-xs px-3 py-1.5 text-center">
                                        Edit
                                    </button>
                                    <button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-xs px-3 py-1.5 text-center">
                                        Delete
                                    </button>
                                </td> 
                                <td class="py-3 px-6">
                                    <span class="px-3 py-1 text-red-600 bg-red-100 rounded-full">Rejected</span>
                                </td>
                            </tr>
                             <!-- Repeat more rows as needed -->
            </tbody>
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