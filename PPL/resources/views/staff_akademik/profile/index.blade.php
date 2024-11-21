<x-staffakademik-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>
    <div class="py-6">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 ">
            {{-- FOTO PROFIL --}}
            <div class="p-4 sm:p-8 bg-white shadow-lg rounded-lg ">
                <div class="mb-4 relative ">
                    <label for="gambar" class="relative flex justify-center">
                        <img id="profile-picture" src="{{ asset('images/profile-none.jpeg') }}" alt="Profile Picture" class="sm:w-64 sm:h-auto w-44 h-auto rounded-full cursor-pointer ring-blue-400 ring-offset-base-100 rounded-full ring ring-offset-4">
                    </label>
                </div>
                <div class="text-center space-y-2">
                    <h1 class="text-4xl font-bold">{{$profile->nama_staff_akademik}}</h1>
                    <h1 class="text-2xl font-medium">Staff Akademik</h1>
                </div>
            </div>
            <form method="post" action="{{route('staff_akademik.profile.update')}}"  class="mt-6 space-y-6 ">
                @csrf
                {{-- EMAIL --}}

                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" :value="old('email', $profile->email)" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>
                {{-- TELEPON --}}
                <div>
                    <x-input-label for="wa_staff_akademik" :value="__('Nomor Telepon')" />
                    <x-text-input id="wa_staff_akademik" name="wa_staff_akademik" type="text" class="mt-1 block w-full" :value="old('wa_staff_akademik', $profile->wa_staff_akademik)" placeholder="-" />
                    <x-input-error class="mt-2" :messages="$errors->get('wa_staff_akademik')" />
                </div>
                {{-- TOMBOL SIMPAN --}}
                <div class="flex items-center justify-end gap-4">
                    <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                </div>

            </form>
        </div>
    </div>

</x-staffakademik-layout>
