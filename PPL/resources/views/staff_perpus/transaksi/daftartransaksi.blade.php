<x-staffperpustakaan-layout>
    <div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Daftar Transaksi Peminjaman</h1>
        <div class="flex items-center justify-between mb-6">
            <div class="container mx-auto p-6">
                <!-- Search bar -->
                <form method="GET" action="{{ route('staff_perpus.transaksi.daftartransaksi') }}" class="mb-6">
                    <input class="basis-2/4 rounded-lg" type="text" name="query"
                        value="{{ request()->input('query') }}" placeholder="Cari nama peminjam..."
                        class="border border-gray-300 rounded-lg p-2 w-full">
                    <!-- Tombol Tambah Transaksi -->
                    <div class=" basis- 1/4 text-right">
                        <a href="{{ route('staff_perpus.transaksi.create') }}"
                            class="bg-blue-500 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-600 transition duration-300">Tambah
                            Transaksi</a>
                    </div>
                </form>

                <!-- Transactions Table -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <table class="w-full text-left table-auto">
                        <thead>
                            <tr class="bg-gray-100 text-gray-600 uppercase text-sm">
                                <th class="py-3 px-6">Nama Peminjam</th>
                                <th class="py-3 px-6">Tanggal Pengembalian</th>
                                <th class="py-3 px-6">Status</th>
                                <th class="py-3 px-6">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                @include('staff_perpus/modal/pengembalianBuku_Modal')
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-6">{{ $transaction->kode_peminjam }}</td>
                                    <td class="py-3 px-6">
                                        {{ \Carbon\Carbon::parse($transaction->tgl_pengembalian)->format('d F Y') }}
                                    </td>
                                    <td class="py-3 px-6">
                                        @if ($transaction->isOverdue())
                                            <span
                                                class="inline-block px-3 py-1 bg-red-500 text-white rounded-full text-xs">Telat
                                                Mengembalikan</span>
                                        @else
                                            <span
                                                class="inline-block px-3 py-1 bg-blue-500 text-white rounded-full text-xs">Belum
                                                Dikembalikan</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button
                                            data-modal-target="update-modal-{{ $transaction->id_transaksi_peminjaman }}"
                                            data-modal-toggle="update-modal-{{ $transaction->id_transaksi_peminjaman }}"
                                            type="button" class="flex">
                                            <span>Edit</span>
                                            <svg class="w-5 h-5 ml-2 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M14 4.182A4.136 4.136 0 0 1 16.9 3c1.087 0 2.13.425 2.899 1.182A4.01 4.01 0 0 1 21 7.037c0 1.068-.43 2.092-1.194 2.849L18.5 11.214l-5.8-5.71 1.287-1.31.012-.012Zm-2.717 2.763L6.186 12.13l2.175 2.141 5.063-5.218-2.141-2.108Zm-6.25 6.886-1.98 5.849a.992.992 0 0 0 .245 1.026 1.03 1.03 0 0 0 1.043.242L10.282 19l-5.25-5.168Zm6.954 4.01 5.096-5.186-2.218-2.183-5.063 5.218 2.185 2.15Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
</x-staffperpustakaan-layout>
