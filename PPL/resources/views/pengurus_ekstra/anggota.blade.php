@extends('layouts.sidebar')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 rounded-lg">
        {{-- Breadcrumb --}}
        <nav class="flex mb-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('siswa.pengurus.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Anggota</span>
                    </div>
                </li>
            </ol>
        </nav>

        {{-- Header Card --}}
        <div class="w-full p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    {{-- <h5 class="text-xl font-bold">Anggota Ekstrakurikuler {{ $ekstrakurikuler->nama }}</h5> --}}
                    <h5 class="text-xl font-bold">Anggota Ekstrakurikuler Voli</h5>
                    {{-- <p class="mt-1 text-sm text-gray-500">Pengurus: {{ Auth::guard('web-siswa')->user()->nama }}</p> --}}
                    <p class="mt-1 text-sm text-gray-500">Pengurus: Budi budian</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Tahun Ajaran</p>
                    <p class="font-medium">2024/2025</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Anggota</p>
                    <p class="font-medium">9999</p>
                </div>
            </div>
        </div>

        {{-- Nama Anggota Section --}}
        <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="flex justify-between items-center mb-4">
                <h6 class="text-lg font-medium">Nama Anggota Ekstrakurikuler</h6>
                <p class="text-sm text-gray-500">Ini adalah list untuk anggota ekstrakurikuler</p>
            </div>

            {{-- Table --}}
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nama Siswa</th>
                            <th scope="col" class="px-6 py-3">NISN</th>
                            <th scope="col" class="px-6 py-3">Alamat</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($anggota as $member)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4">{{ $member['nama'] }}</td>
                            <td class="px-6 py-4">{{ $member['nisn'] }}</td>
                            <td class="px-6 py-4">{{ $member['alamat'] }}</td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <button type="button" class="text-blue-500 hover:text-blue-700">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="text-red-500 hover:text-red-700">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr class="bg-white border-b">
                            <td colspan="4" class="px-6 py-4 text-center">Tidak ada data anggota</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
