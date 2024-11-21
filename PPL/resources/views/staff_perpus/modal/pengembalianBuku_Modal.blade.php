<!-- Main modal -->
<div id="update-modal-{{ $transaction->id_transaksi_peminjaman }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-[50vw] max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Edit Kategori
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="update-modal-{{ $transaction->id_transaksi_peminjaman }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form action="{{ route('updateStatus', $transaction->id_transaksi_peminjaman) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <ul
                        class="max-w-[48vw] text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                        <li class="flex pb-3 justify-between">
                            <span>{{ $transaction->id_transaksi_peminjaman }}</span>
                            <select name="status_pengembalian" class="form-select">
                                <option value="0" {{ $transaction->status_pengembalian == 0 ? 'selected' : '' }}>Telat</option>
                                <option value="1" {{ $transaction->status_pengembalian == 1 ? 'selected' : '' }}>Aman</option>
                                <option value="2" {{ $transaction->status_pengembalian == 2 ? 'selected' : '' }}>Hilang</option>
                            </select>
                        </li>
                        <li class=" pb-3 justify-between">
                            <h3 class="my-5">Jumlah buku yang dipinjam: {{ $transaction->stok }}</h3>
                            <input type="number" name="jumlah_dikembalikan" class="form-input border-gray-300 rounded-lg w-3/5"
                                placeholder="Jumlah buku yang dikembalikan" min="1" max="{{ $transaction->stok }}" required>
                            <span class="text-sm ml-2">/ {{ $transaction->stok }}</span>
                        </li>
                    </ul>

                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Konfirmasi
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>