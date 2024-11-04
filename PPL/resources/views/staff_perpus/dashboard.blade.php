<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('staff_perpus!') }}
                </div>
            </div>
        </div>
    </div> --}}
    <div class="overview_transaksi_peminjaman px-16 py-4 bg-white m-4 drop-shadow-sm rounded-md">
        <h1 class="font-bold text-xl leading-8">Transaksi Peminjaman</h1>
        <span class="text-[#6B7280] text-lg leading-8">Ini adalah sekilas list untuk peminjaman buku perpustakaan untuk 7
            hari
            terakhir</span>
        <table class="rounded-t-3xl w-full text-sm overfow-hidden">
            <tr class="mx-auto bg-[#F9FAFB] leading-10 font-bold text-gray-500">
                <td class="w-1/6 text-left">Aktivitas</td>
                <td class="w-1/6 text-left">Tanggal Peminjam</td>
                <td class="w-1/6 text-left">Tanggal Kembali</td>
                <td class="w-1/6 text-left">Judul Buku</td>
                <td class="w-1/6 text-left">Kategori</td>
                <td class="w-1/6 text-left">Status</td>
            </tr>
            <tr class="mx-auto leading-10">
                <td class="w-1/6 text-left">{{ $Nama_Kategori ?? 'Buku' }} dipinjam oleh
                    <b>{{ $Nama_Peminjam ?? 'Anonymous' }}</b>
                </td>
                <td class="w-1/6 text-left text-gray-500">{{ $Tanggal_Pinjam ?? 'Unknown' }}</td>
                <td class="w-1/6 text-left text-gray-500">{{ $Tanggal_Kembali ?? 'Tidak ada batas kembali' }} <a
                        href="#">Edit</a>
                </td>
                <td class="w-1/6 text-left text-gray-500">{{ $Judul_Buku ?? 'Lorem, ipsum dolor sit amet.' }}</td>
                <td class="w-1/6 text-left">{{ $Nama_Kategori ?? 'Tidak Memiliki Kategori' }}</td>
                <td class="w-1/6 text-left">{{ $Status ?? 'None' }}</td>
            </tr>
        </table>
</x-app-layout>
