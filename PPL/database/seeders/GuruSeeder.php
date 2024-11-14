<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $gurus = [
            ['nip' => '1985123456', 'nama_guru' => 'Guru Matematika', 'email' => 'guru.matematika@example.com', 'foto_guru' => 'foto1.jpg', 'nomor_wa_guru' => '081234567890', 'username' => 'matematika', 'password' => bcrypt('password123'), 'alamat_guru' => 'Alamat 1', 'role_guru' => 'guru'],
            ['nip' => '1985123457', 'nama_guru' => 'Guru Bahasa Indonesia', 'email' => 'guru.bahasaindo@example.com', 'foto_guru' => 'foto2.jpg', 'nomor_wa_guru' => '081234567891', 'username' => 'bahasa_indo', 'password' => bcrypt('password123'), 'alamat_guru' => 'Alamat 2', 'role_guru' => 'guru'],
            ['nip' => '1985123458', 'nama_guru' => 'Guru Bahasa Inggris', 'email' => 'guru.bahasainggris@example.com', 'foto_guru' => 'foto3.jpg', 'nomor_wa_guru' => '081234567892', 'username' => 'bahasa_inggris', 'password' => bcrypt('password123'), 'alamat_guru' => 'Alamat 3', 'role_guru' => 'guru'],
            ['nip' => '1985123459', 'nama_guru' => 'Guru IPA', 'email' => 'guru.ipa@example.com', 'foto_guru' => 'foto4.jpg', 'nomor_wa_guru' => '081234567893', 'username' => 'ipa', 'password' => bcrypt('password123'), 'alamat_guru' => 'Alamat 4', 'role_guru' => 'guru'],
            ['nip' => '1985123460', 'nama_guru' => 'Guru IPS', 'email' => 'guru.ips@example.com', 'foto_guru' => 'foto5.jpg', 'nomor_wa_guru' => '081234567894', 'username' => 'ips', 'password' => bcrypt('password123'), 'alamat_guru' => 'Alamat 5', 'role_guru' => 'guru'],
            ['nip' => '1985123461', 'nama_guru' => 'Guru PKN', 'email' => 'guru.pkn@example.com', 'foto_guru' => 'foto6.jpg', 'nomor_wa_guru' => '081234567895', 'username' => 'pkn', 'password' => bcrypt('password123'), 'alamat_guru' => 'Alamat 6', 'role_guru' => 'guru'],
            ['nip' => '1985123462', 'nama_guru' => 'Guru Seni Budaya', 'email' => 'guru.senibudaya@example.com', 'foto_guru' => 'foto7.jpg', 'nomor_wa_guru' => '081234567896', 'username' => 'seni_budaya', 'password' => bcrypt('password123'), 'alamat_guru' => 'Alamat 7', 'role_guru' => 'guru'],
            ['nip' => '1985123463', 'nama_guru' => 'Guru Pendidikan Agama', 'email' => 'guru.pendidikanagama@example.com', 'foto_guru' => 'foto8.jpg', 'nomor_wa_guru' => '081234567897', 'username' => 'pendidikan_agama', 'password' => bcrypt('password123'), 'alamat_guru' => 'Alamat 8', 'role_guru' => 'guru'],
            ['nip' => '1985123464', 'nama_guru' => 'Guru Pendidikan Jasmani', 'email' => 'guru.penjas@example.com', 'foto_guru' => 'foto9.jpg', 'nomor_wa_guru' => '081234567898', 'username' => 'pendidikan_jasmani', 'password' => bcrypt('password123'), 'alamat_guru' => 'Alamat 9', 'role_guru' => 'guru'],
            ['nip' => '1985123465', 'nama_guru' => 'Guru TIK', 'email' => 'guru.tik@example.com', 'foto_guru' => 'foto10.jpg', 'nomor_wa_guru' => '081234567899', 'username' => 'tik', 'password' => bcrypt('password123'), 'alamat_guru' => 'Alamat 10', 'role_guru' => 'guru'],
            ['nip' => '1985123466', 'nama_guru' => 'Guru Prakarya', 'email' => 'guru.prakarya@example.com', 'foto_guru' => 'foto11.jpg', 'nomor_wa_guru' => '081234567900', 'username' => 'prakarya', 'password' => bcrypt('password123'), 'alamat_guru' => 'Alamat 11', 'role_guru' => 'guru'],
            ['nip' => '1985123467', 'nama_guru' => 'Guru Bahasa Madura', 'email' => 'guru.bahasa@example.com', 'foto_guru' => 'foto12.jpg', 'nomor_wa_guru' => '081234567901', 'username' => 'bahasa_madura', 'password' => bcrypt('password123'), 'alamat_guru' => 'Alamat 12', 'role_guru' => 'guru'],
        ];

        foreach ($gurus as $guru) {
            Guru::create($guru);
        }
    }
}
