<x-app-guru-layout>
    <div class="p-2 mx-4 my-6 bg-white shadow rounded-xl md:flex md:items-center md:justify-between md:p-6 xl:p-6">
        {{-- create breadcrumb --}}
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="flex px-6 space-x-4">
                <li class="flex">
                    <a href="{{ route('guru.dashboard') }}" class="text-gray-400 hover:text-gray-500">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="flex">
                    <a href="{{ route('guru.dashboard') }}" class="font-semibold text-gray-700">
                        <span>LMS</span>
                    </a>
                </li>
            </ol>
        </nav>
    </div>
</x-app-guru-layout>
