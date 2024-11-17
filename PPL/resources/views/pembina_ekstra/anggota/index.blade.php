<x-app-guru-layout>
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <div class="p-4 bg-gray-100 min-h-screen">
        <!-- Header Anggota Ekstrakurikuler -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <div class="text-sm text-gray-500 mb-4">
                Dashboard > <span class="font-semibold text-gray-700">Anggota</span>
            </div>
            <h2 class="text-2xl font-semibold text-gray-800">Anggota Ekstrakurikuler</h2>
            <div class="mt-2 text-gray-600">
                <p>Pembina: <span class="font-semibold text-gray-700">{{ $loggedInUsername }}</span></p>
                <p>Tahun Ajaran: <span class="font-semibold text-gray-700">2024/2025</span></p>
                <p>Total Anggota: <span class="font-semibold text-gray-700">{{ $totalItems }}</span></p>
            </div>
        </div>

        <!-- Tabel Nama Anggota Ekstrakurikuler -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Nama Anggota Ekstrakurikuler</h3>
            <p class="text-sm text-gray-500 mb-4">Ini adalah list untuk anggota ekstrakurikuler</p>

            <table class="w-full table-auto">
                <thead>
                    <tr class="text-left text-gray-600">
                        <th class="p-2 border-b">No</th>
                        <th class="p-2 border-b">Nama Siswa</th>
                        <th class="p-2 border-b">NISN</th>
                        <th class="p-2 border-b">Alamat</th>
                        <th class="p-2 border-b">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $index => $member)
                    <tr class="hover:bg-gray-50">
                        <td class="p-2 border-b">{{ ($currentPage - 1) * $perPage + $loop->iteration }}</td>
                        <td class="p-2 border-b">{{ $member->name }}</td>
                        <td class="p-2 border-b">{{ $member->nisn }}</td>
                        <td class="p-2 border-b">{{ $member->address }}</td>
                        <td class="p-2 border-b">{{ $member->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Custom Pagination Links -->
            <div class="mt-4 flex justify-center">
                @if ($currentPage > 1)
                    <a href="?page={{ $currentPage - 1 }}" class="px-4 py-2 border rounded-l-lg bg-gray-200 hover:bg-gray-300">Previous</a>
                @endif

                @for ($i = 1; $i <= $totalPages; $i++)
                    <a href="?page={{ $i }}" class="px-4 py-2 border-t border-b {{ $i === $currentPage ? 'bg-blue-500 text-white font-bold' : 'bg-gray-200 hover:bg-gray-300' }}">
                        {{ $i }}
                    </a>
                @endfor

                @if ($currentPage < $totalPages)
                    <a href="?page={{ $currentPage + 1 }}" class="px-4 py-2 border rounded-r-lg bg-gray-200 hover:bg-gray-300">Next</a>
                @endif
            </div>
        </div>
    </div>
</x-app-guru-layout>
