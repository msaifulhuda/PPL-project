<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Guru;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guru::create([
            'nip'=>'nip 1',
            'nama_guru'=>'Guru 1',
        ]);
        Guru::create([
            'nip'=>'nip 2',
            'nama_guru'=>'Guru 2',
        ]);
        Guru::create([
            'nip'=>'nip 3',
            'nama_guru'=>'Guru 3',
        ]);
        Guru::create([
            'nip'=>'nip 4',
            'nama_guru'=>'Guru 4',
        ]);
        Guru::create([
            'nip'=>'nip 5',
            'nama_guru'=>'Guru 5',
        ]);
        Guru::create([
            'nip'=>'nip 6',
            'nama_guru'=>'Guru 6',
        ]);
        
    }
}
