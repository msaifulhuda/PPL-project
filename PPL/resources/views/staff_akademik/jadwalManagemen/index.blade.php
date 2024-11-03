<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jadwal Kelas') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Tombol Tambah Jadwal -->
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('staff_akademik.jadwal.create') }}" 
                           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Tambah Jadwal
                        </a>
                    </div>

                    <!-- Pesan Bentrok -->
                    @if(session('error'))
                        <div class="bg-red-500 text-white p-4 rounded mb-4">
                            <strong>List jadwal bentrok</strong>
                            <ul class="list-disc pl-5">
                                @foreach(session('bentrok') as $item)
                                    <li>
                                        @if($item['tipe'] == 'guru')
                                            Guru {{ $item['nama_guru'] }} memiliki jadwal bentrok di kelas lain pada hari {{ $item['nama_hari'] }} jam {{ $item['jam_pelajaran'] }}.
                                        @elseif($item['tipe'] == 'kelas')
                                            Kelas {{ $item['nama_kelas'] }} sudah memiliki jadwal pada hari {{ $item['nama_hari'] }} jam {{ $item['jam_pelajaran'] }}.
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Pesan Update Bentrok -->
                    @if(session('error-update'))
                        <div class="bg-red-500 text-white p-4 rounded mb-4">
                            <strong>List jadwal bentrok</strong>
                            <ul class="list-disc pl-5">
                                <li>{{ session('error-update') }}</li>
                            </ul>
                        </div>
                    @endif

                    <!-- Pesan Sukses -->
                    @if(session('success'))
                        <div class="bg-green-500 text-white p-4 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div>
                        @foreach ($kelas as $kls)
                            <h3 class="text-lg font-semibold mb-4">Jadwal Kelas {{ $kls->nama_kelas }}</h3>
                            <table class="min-w-full bg-white border border-gray-300 rounded-md overflow-hidden mb-6">
                                <thead class="bg-gray-100 border-b">
                                    <tr>
                                        <th class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase">Hari</th>
                                        <th class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase">Jam</th>
                                        <th class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama Mata Pelajaran</th>
                                        <th class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama Guru</th>
                                        <th class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        @if ($item->nama_kelas == $kls->nama_kelas && $item->nama_hari=="Senin")
                                            <tr class="border-b">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->nama_hari }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->waktu_mulai }} - {{ $item->waktu_selesai }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->nama_matpel }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->nama_guru }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                    <a href="{{ route('staff_akademik.jadwal.edit', $item->id_kelas_mata_pelajaran) }}" class="text-blue-500 hover:underline">Edit</a>
                                                    <form action="{{ route('staff_akademik.jadwal.delete', $item->id_kelas_mata_pelajaran) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach ($data as $item)
                                        @if ($item->nama_kelas == $kls->nama_kelas && $item->nama_hari=="Selasa")
                                            <tr class="border-b">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->nama_hari }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->waktu_mulai }} - {{ $item->waktu_selesai }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->nama_matpel }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->nama_guru }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                    <a href="{{ route('staff_akademik.jadwal.edit', $item->id_kelas_mata_pelajaran) }}" class="text-blue-500 hover:underline">Edit</a>
                                                    <form action="{{ route('staff_akademik.jadwal.delete', $item->id_kelas_mata_pelajaran) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach ($data as $item)
                                        @if ($item->nama_kelas == $kls->nama_kelas && $item->nama_hari=="Rabu")
                                            <tr class="border-b">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->nama_hari }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->waktu_mulai }} - {{ $item->waktu_selesai }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->nama_matpel }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->nama_guru }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                    <a href="{{ route('staff_akademik.jadwal.edit', $item->id_kelas_mata_pelajaran) }}" class="text-blue-500 hover:underline">Edit</a>
                                                    <form action="{{ route('staff_akademik.jadwal.delete', $item->id_kelas_mata_pelajaran) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach ($data as $item)
                                        @if ($item->nama_kelas == $kls->nama_kelas && $item->nama_hari=="Kamis")
                                            <tr class="border-b">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->nama_hari }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->waktu_mulai }} - {{ $item->waktu_selesai }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->nama_matpel }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->nama_guru }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                    <a href="{{ route('staff_akademik.jadwal.edit', $item->id_kelas_mata_pelajaran) }}" class="text-blue-500 hover:underline">Edit</a>
                                                    <form action="{{ route('staff_akademik.jadwal.delete', $item->id_kelas_mata_pelajaran) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach ($data as $item)
                                        @if ($item->nama_kelas == $kls->nama_kelas && $item->nama_hari=="Jumat")
                                            <tr class="border-b">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->nama_hari }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->waktu_mulai }} - {{ $item->waktu_selesai }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->nama_matpel }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->nama_guru }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                    <a href="{{ route('staff_akademik.jadwal.edit', $item->id_kelas_mata_pelajaran) }}" class="text-blue-500 hover:underline">Edit</a>
                                                    <form action="{{ route('staff_akademik.jadwal.delete', $item->id_kelas_mata_pelajaran) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach ($data as $item)
                                        @if ($item->nama_kelas == $kls->nama_kelas && $item->nama_hari=="Sabtu")
                                            <tr class="border-b">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->nama_hari }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->waktu_mulai }} - {{ $item->waktu_selesai }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->nama_matpel }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->nama_guru }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                    <a href="{{ route('staff_akademik.jadwal.edit', $item->id_kelas_mata_pelajaran) }}" class="text-blue-500 hover:underline">Edit</a>
                                                    <form action="{{ route('staff_akademik.jadwal.delete', $item->id_kelas_mata_pelajaran) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach ($data as $item)
                                        @if ($item->nama_kelas == $kls->nama_kelas && $item->nama_hari=="Minggu")
                                            <tr class="border-b">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->nama_hari }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->waktu_mulai }} - {{ $item->waktu_selesai }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->nama_matpel }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->nama_guru }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                    <a href="{{ route('staff_akademik.jadwal.edit', $item->id_kelas_mata_pelajaran) }}" class="text-blue-500 hover:underline">Edit</a>
                                                    <form action="{{ route('staff_akademik.jadwal.delete', $item->id_kelas_mata_pelajaran) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>