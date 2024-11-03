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
    <div class="overview_transaksi_peminjaman p-16 bg-white m-4 drop-shadow-sm rounded-md">
        <h1 class="font-bold text-xl leading-8">Transaksi Peminjaman</h1>
        <span class="text-[#6B7280] text-lg leading-8">Ini adalah sekilas list untuk peminjaman buku perpustakaan untuk 7
            hari
            terakhir</span>

        <table class="w-full rounded-t-lg">
            <tr class="mx-auto bg-[#F9FAFB]">
                <td>Aktivitas</td>
                <td>Tanggal Peminjam</td>
                <td>Tanggal Peminjam</td>
                <td>Tanggal Kembali</td>
                <td>Judul Buku</td>
                <td>Kategori</td>
                <td>Status</td>
            </tr>
            <tr>
                <td>{{ $Nama_Kategori ?? 'Buku' }} dipinjam oleh <b>{{ $Nama_Peminjam ?? 'Anonymous' }}</b></td>
                <td>{{ $Tanggal_Pinjam ?? 'Unknown' }}</td>
                <td>{{ $Tanggal_Kembali ?? 'Tidak ada batas kembali' }} <a href="#">Edit</a></td>
                <td>{{ $Judul_Buku ?? 'Lorem, ipsum dolor sit amet.' }}</td>
                <td>{{ $Nama_Kategori ?? 'Tidak Memiliki Kategori' }}</td>
                <td>{{ $Status ?? 'None' }}</td>
            </tr>
        </table>
    </div>
</x-app-layout>
