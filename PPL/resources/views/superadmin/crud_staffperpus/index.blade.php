<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-12 ">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold">Kelola Akun Staff perpustakaan</h1>
            <a href="{{ route('superadmin.kelola_staff_perpus.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah User</a>
        </div>

        <div class="bg-white shadow-md rounded overflow-hidden">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6 text-left">Username</th>
                        <th class="py-3 px-6 text-left">Email</th>
                        <th class="py-3 px-6 text-left">Nama</th>
                        <th class="py-3 px-6 text-left">kontak</th>
                        <th class="py-3 px-6 text-left">Alamat</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                        <th class="py-3 px-6 text-center">Reset Password</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($staffperpus as $staff)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $staff->username }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $staff->email }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                <span>{{ $staff->nama_staff_perpustakaan }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                <span>{{ $staff->wa_staff_perpustakaan }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                <span>{{ $staff->nama_staff_perpustakaan }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center justify-center">
                                <!-- Edit Button -->
                                <a href="{{ route('superadmin.kelola_staff_perpus.edit', $staff->id_staff_perpustakaan) }}" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 mr-2">
                                    Edit
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('superadmin.kelola_staff_perpus.destroy', $staff->id_staff_perpustakaan) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                                <!-- Delete Button -->
                                <form action="{{ route('superadmin.kelola_staff_perpus.reset', $staff->id_staff_perpustakaan) }}" method="POST" onsubmit="return confirm('Are you sure you want to reset password this user?');">
                                    @csrf
                                    <button type="submit" class="bg-pink-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                        Reset
                                    </button>
                                </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>