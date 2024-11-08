<?php

namespace App\Http\Controllers\pengurusekstra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
    // Dummy data
        $dummyData = [
            ['name' => 'Budi Budian', 'nisn' => '12345678910', 'address' => 'Lorem Ipsum'],
            ['name' => 'Ayu Ayuan', 'nisn' => '12345678911', 'address' => 'Lorem Ipsum'],
            ['name' => 'Toni Tonian', 'nisn' => '12345678912', 'address' => 'Lorem Ipsum'],
            ['name' => 'Siti Sitiya', 'nisn' => '12345678913', 'address' => 'Lorem Ipsum'],
            ['name' => 'Udin Udina', 'nisn' => '12345678914', 'address' => 'Lorem Ipsum'],
            ['name' => 'Mira Miranti', 'nisn' => '12345678915', 'address' => 'Lorem Ipsum'],
            ['name' => 'Rina Rini', 'nisn' => '12345678916', 'address' => 'Lorem Ipsum'],
            ['name' => 'Bambang Bambangin', 'nisn' => '12345678917', 'address' => 'Lorem Ipsum'],
            ['name' => 'Joko Jokian', 'nisn' => '12345678918', 'address' => 'Lorem Ipsum'],
            ['name' => 'Sukri Sukriya', 'nisn' => '12345678919', 'address' => 'Lorem Ipsum'],
        ];

        $perPage = 7; // Items per page
        $currentPage = $request->input('page', 1); // Current page from query string, default to 1
        $totalItems = count($dummyData);
        $totalPages = (int) ceil($totalItems / $perPage);

        // Calculate the start and end indices for slicing the array
        $start = ($currentPage - 1) * $perPage;
        $members = array_slice($dummyData, $start, $perPage);

        return view('pengurus_ekstra.anggota.index', [
            'members' => $members,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
        ]);
    }
}
