<x-staffperpustakaan-layout>
    <div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Daftar Transaksi Peminjaman</h1>
        <div class="flex items-center justify-between mb-6">
            <!-- Form Pencarian -->
            <form action="{{ route('staff_perpus.transaksi.daftartransaksi') }}" method="GET" class="mb-4">
                <input type="text" name="search" placeholder="Cari berdasarkan NISN/NIP" value="{{ request('search') }}" 
                class="border rounded-lg px-4 py-2 w-64 focus:outline-none focus:ring focus:ring-blue-200">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-600 transition duration-300">Cari</button>
            </form>
            
            <!-- Tombol Tambah Transaksi -->
            <div class="mb-4 text-right">
                <a href="{{ route('staff_perpus.transaksi.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-600 transition duration-300">Tambah Transaksi</a>
            </div>
            
        </div>
        <!-- Tabel Transaksi -->
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="border px-4 py-2 text-left">Kode Peminjam</th>
                    <th class="border px-4 py-2 text-left">Nama Buku</th>
                    <th class="border px-4 py-2 text-left">Jumlah Stok Dipinjam</th>
                    <th class="border px-4 py-2 text-left">Jenis Peminjam</th>
                    <th class="border px-4 py-2 text-left">Tanggal Awal</th>
                    <th class="border px-4 py-2 text-left">Tenggat Pengembalian</th>
                    <th class="border px-4 py-2 text-left">Status Pengembalian</th>
                    <th class="border px-4 py-2 text-left">Denda</th>
                    <th class="border px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $data)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $data->kode_peminjam }}</td>
                        <td class="border px-4 py-2">{{ $data->buku->judul_buku ?? 'Tidak tersedia' }}</td>
                        <td class="border px-4 py-2">{{ $data->stok }}</td>
                        <td class="border px-4 py-2">{{ $data->jenis_peminjam == 1 ? 'Siswa' : 'Guru' }}</td>
                        <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($data->tgl_awal_peminjaman)->format('d/m/Y') }}</td>
                        <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($data->tgl_pengembalian)->format('d/m/Y') }}</td>
                        <td class="border px-4 py-2">{{ $data->status_pengembalian ? 'Sudah Dikembalikan' : 'Belum Dikembalikan' }}</td>
                        <td class="border px-4 py-2">{{ $data->denda }}</td>
                        <td class="border px-4 py-2 text-center">
                            <!-- Tombol Edit -->
                            <a href="{{ route('staff_perpus.transaksi.edit', $data->id_transaksi_peminjaman) }}" class="text-yellow-500 hover:underline">Edit</a>
                            
                            <!-- Form Delete -->
                            <form action="{{ route('staff_perpus.transaksi.destroy', $data->id_transaksi_peminjaman) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline ml-2" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-staffperpustakaan-layout>
