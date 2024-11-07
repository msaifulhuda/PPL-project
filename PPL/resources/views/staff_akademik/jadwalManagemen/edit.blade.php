<x-staffakademik-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Jadwal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <!-- Tombol Back -->
                <a href="{{ route('staff_akademik.jadwal') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mb-4 inline-block">
                    Kembali
                </a>

                <!-- Form Edit Jadwal -->
                <form action="{{ route('staff_akademik.jadwal.update', $jadwal->id_kelas_mata_pelajaran) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="kelas_id" class="block text-gray-700">Kelas:</label>
                        <select name="kelas_id" id="kelas_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @foreach ($kelas as $kls)
                                <option value="{{ $kls->id_kelas }}" {{ $jadwal->kelas_id == $kls->id_kelas ? 'selected' : '' }}>
                                    {{ $kls->nama_kelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="hari_id" class="block text-gray-700">Hari:</label>
                        <select name="hari_id" id="hari_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @foreach ($hari as $h)
                                <option value="{{ $h->id_hari }}" {{ $jadwal->hari_id == $h->id_hari ? 'selected' : '' }}>
                                    {{ $h->nama_hari }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="jam_pelajaran" class="block text-gray-700">Jam Pelajaran:</label>
                        <select name="jam_pelajaran" id="jam_pelajaran" class="border-gray-300 rounded-md w-full">
                            <option value="07:00-09:00" {{ $jadwal->waktu_mulai . '-' . $jadwal->waktu_selesai == '07:00-09:00' ? 'selected' : '' }}>07:00-09:00</option>
                            <option value="10:00-12:00" {{ $jadwal->waktu_mulai . '-' . $jadwal->waktu_selesai == '10:00-12:00' ? 'selected' : '' }}>10:00-12:00</option>
                            <option value="13:00-14:00" {{ $jadwal->waktu_mulai . '-' . $jadwal->waktu_selesai == '13:00-14:00' ? 'selected' : '' }}>13:00-14:00</option>
                            <option value="14:00-16:00" {{ $jadwal->waktu_mulai . '-' . $jadwal->waktu_selesai == '14:00-16:00' ? 'selected' : '' }}>14:00-16:00</option>
                        </select>
                    </div>                    

                    <div class="mb-4">
                        <label for="guruid_matpelid" class="block text-gray-700">Guru dan Mata Pelajaran:</label>
                        <select name="guruid_matpelid" id="guruid_matpelid" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @foreach ($guruMataPelajaran as $guruMatpel)
                                <option value="{{ $guruMatpel->id_guru }}_{{ $guruMatpel->id_matpel }}" {{ $jadwal->guru_id == $guruMatpel->id_guru ? 'selected' : '' }}>
                                    {{ $guruMatpel->nama_guru }} - {{ $guruMatpel->nama_matpel }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Jadwal</button>
                </form>
            </div>
        </div>
    </div>
</x-staffakademik-layout>
