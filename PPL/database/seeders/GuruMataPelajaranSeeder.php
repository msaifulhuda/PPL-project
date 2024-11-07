<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Support\Str;
use App\Models\mata_pelajaran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GuruMataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guruIds = Guru::pluck('id_guru')->toArray();
        $mataPelajaranIds = mata_pelajaran::pluck('id_matpel')->toArray();

        foreach ($guruIds as $guruId) {
            $mataPelajaranId = $mataPelajaranIds[array_rand($mataPelajaranIds)];

            DB::table('guru_mata_pelajaran')->insert([
                'id_guru_mata_pelajaran' => Str::uuid(),
                'guru_id' => $guruId,
                'matpel_id' => $mataPelajaranId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
