<x-siswa-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" ">
                    Search Bar

                    <div class="flex items-center justify-between mb-6">
                        <form action=" " method="GET" class="flex w-full gap-4">
                            <input 
                                type="text" 
                                name="search" 
                                placeholder="Search" 
                                class="border border-gray-300 rounded-lg px-4 py-2 w-1/3" 
                                value=" "
                            />
                            <select 
                                name="category" 
                                class="border border-gray-300 rounded-lg px-4 py-2 w-1/5"
                                onchange="this.form.submit()"
                            >
                                 
                            </select>
                        </form>
                    </div>

                    Konten

                    <div class="grid grid-cols-5 gap-4">
                        
                    </div>

                    Pagination
                </div>
            </div>
        </div>
    </div>

</x-siswa-layout>


