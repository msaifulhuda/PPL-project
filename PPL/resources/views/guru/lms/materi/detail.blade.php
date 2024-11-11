<x-app-guru-layout>
    <div class="px-3 py-5 mx-4 my-6 bg-white rounded-lg shadow xl:p-6">
        {{-- Breadcrumb --}}
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="flex px-3 space-x-2 text-sm">
                <li class="flex">
                    <a href="{{ route('guru.dashboard') }}" class="text-gray-400 hover:text-gray-700">
                        <span>Dashboard</span>
                    </a>
                </li>
                <div class="flex justify-center py-1">
                    <svg class="flex w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                    </svg>
                </div>
                <li class="flex">
                    <a href="{{ route('guru.dashboard.lms') }}" class="text-gray-400 hover:text-gray-700">
                        <span>LMS</span>
                    </a>
                </li>
                <div class="flex justify-center py-1">
                    <svg class="flex w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                    </svg>
                </div>
                <li class="flex">
                    <a href="{{ route('guru.dashboard.lms.materi') }}" class="text-gray-400 hover:text-gray-700">
                        <span>Materi</span>
                    </a>
                </li>
                <div class="flex justify-center py-1">
                    <svg class="flex w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                    </svg>
                </div>
                <li class="flex">
                    <p class="font-semibold text-gray-700">
                        <span>{{ $materi->judul_materi }}</span>
                    </p>
                </li>
            </ol>
        </nav>


        {{-- Main Content --}}
        <div class="flex flex-col gap-6 px-3 mt-8">
            {{-- Header --}}
            <div class="flex gap-3 m-auto md:w-1/2">
                <div class="w-1/12">
                    <svg class="w-10 h-10 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-6 8a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1 3a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
                    </svg>
                </div>

                <div class="flex justify-between w-full pb-2 border-b-2 border-gray-300">
                    <div>
                        <h4 class="text-2xl font-semibold text-gray-700">{{ $materi->judul_materi }}</h4>
                        <span class="text-sm">{{ $materi->kelas_mata_pelajaran->guru->nama_guru }} . {{ $materi->created_at->format('d F Y') }}</span>
                    </div>

                   <div>
                        <button>
                            <svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01"/>
                            </svg>
                        </button>
                   </div>
                </div>
            </div>

            {{-- Content --}}
            <div class="flex gap-3 m-auto md:w-1/2">
                <div class="w-1/12"></div>

                <div class="w-full">
                    <div class="mb-4">
                        <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, ea. Pariatur nobis, velit possimus nam dolor distinctio quidem, debitis consectetur suscipit at non molestias aperiam et praesentium vitae quae laudantium!</p>
                    </div>

                    <div class="flex gap-4 card-container">
                        <div class="w-1/2 h-20 border border-gray-400 rounded-md">

                        </div>
                        <div class="w-1/2 h-20 border border-gray-400 rounded-md">

                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
</x-app-guru-layout>
