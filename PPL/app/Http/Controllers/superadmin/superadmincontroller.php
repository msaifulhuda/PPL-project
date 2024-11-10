<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Siswa;

class SuperadminController extends Controller
{
    // Method for the dashboard
    public function index()
    {
        return view('superadmin.dashboard');
    }
    public function showDataGuru()
    {
        $guruData = Guru::paginate(5); 
        return view('superadmin.keloladataguru.data_guru', compact('guruData'));
    }
    public function showDataSiswa()
    {
        $siswaData = Siswa::paginate(5);
        return view('superadmin.keloladatasiswa.data_siswa', compact('siswaData'));
    }


    // In SuperadminController
    public function searchGuru(Request $request)
    {
        $query = $request->input('search');
        $guruData = Guru::where('nip', 'LIKE', '%' . $query . '%')->paginate(5);

        return view('superadmin.keloladataguru.data_guru', compact('guruData'));
    }

    public function searchSiswa(Request $request)
    {
        $query = $request->input('searchsiswa');
        $siswaData = Siswa::where('nisn', 'LIKE', '%' . $query . '%')->paginate(5);

        return view('superadmin.keloladatasiswa.data_siswa', compact('siswaData'));
    }

    public function create()
    {
    return view('superadmin.keloladataguru.tambah');
    }
    
    public function createSiswa()
    {
    return view('superadmin.keloladatasiswa.tambah');
    }    

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();
        return redirect()->route('superadmin.keloladataguru')->with('success', 'Data guru berhasil dihapus.');
    }

    public function siswaDestroy($id_siswa)
    {
        $siswa = Siswa::findOrFail($id_siswa);
        $siswa->delete();
        return redirect()->route('superadmin.keloladatasiswa')->with('success', 'Data guru berhasil dihapus.');
    }
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('superadmin.keloladataguru.edit_guru', compact('guru'));
    }

    public function siswaEdit($id)
    {
        $siswa = Siswa::findOrFail($id); // Ensure it finds the correct student record
        return view('superadmin.keloladatasiswa.edit_siswa', compact('siswa'));
    }
    
    public function store(Request $request)
{
    // Validasi data dari form
    // $request->validate([
    //     'nama_guru' => 'required|string|max:255',
    //     'nip' => 'required|string|unique:guru,nip',
    //     'username' => 'required|string|unique:guru,username',
    //     'password' => 'required|string|min:8',
    //     'alamat_guru' => 'nullable|string',
    //     'nomor_wa_guru' => 'nullable|string',
    //     'email' => 'required|email|unique:guru,email',
    //     'foto_guru' => 'nullable|image|max:2048',
    // ]);
    $guru = new Guru();
    $guru->nama_guru = $request->nama_guru;
    $guru->nip = $request->nip;
    $guru->username = $request->username;
    $guru->password = bcrypt($request->password);
    $guru->alamat_guru = $request->alamat_guru;
    $guru->nomor_wa_guru = $request->nomor_wa_guru;
    $guru->email = $request->email;
    $guru->role_guru = $request->input('role_guru');
    if ($request->hasFile('foto_guru')) {
        $fileName = time() . '.' . $request->foto_guru->extension();
        $request->foto_guru->move(public_path('images/guru'), $fileName);
        $guru->foto_guru = $fileName;
    }
    $guru->save();
    return redirect()->route('superadmin.keloladataguru')->with('success', 'Data guru berhasil ditambahkan.');
}
public function update(Request $request, $id_guru)
{
    // $request->validate([
    //     'nama_guru' => 'required|string|max:255',
    //     'nip' => 'required|string|unique:guru,nip,' . $id_guru . ',id_guru',
    //     'username' => 'required|string|unique:guru,username,' . $id_guru . ',id_guru',
    //     'email' => 'required|email|unique:guru,email,' . $id_guru . ',id_guru',
    //     'foto_guru' => 'nullable|image|max:2048',
    //     'password' => 'nullable|string|min:8',
    // ]);
    $guru = Guru::findOrFail($id_guru);
    $guru->nama_guru = $request->nama_guru;
    $guru->nip = $request->nip;
    $guru->username = $request->username;
    $guru->alamat_guru = $request->alamat_guru;
    $guru->nomor_wa_guru = $request->nomor_wa_guru;
    $guru->email = $request->email;
    $guru->role_guru = $request->input('role_guru');
    if ($request->filled('password')) {
        $guru->password = bcrypt($request->password);
    }
    if ($request->hasFile('foto_guru')) {
        $fileName = time() . '.' . $request->foto_guru->extension();
        $request->foto_guru->move(public_path('images/guru'), $fileName);
        $guru->foto_guru = $fileName;
    }
    $guru->save();
    return redirect()->route('superadmin.keloladataguru')->with('success', 'Data guru berhasil diperbarui.');
}
public function storeSiswa(Request $request)
    {
        // Validate the incoming request data
        // $request->validate([
        //     'nisn' => 'required|string|max:20|unique:siswa,nisn',
        //     'nama_siswa' => 'required|string|max:255',
        //     'tgl_lahir_siswa' => 'required|date',
        //     'jenis_kelamin_siswa' => 'required|string|max:10',
        //     'alamat_siswa' => 'nullable|string|max:255',
        //     'nomor_wa_siswa' => 'nullable|string|max:15',
        //     'username' => 'required|string|max:20|unique:siswa,username',
        //     'password' => 'required|string|min:6',
        //     'email' => 'required|email|unique:siswa,email',
        // ]);
        $siswa = new Siswa();
        $siswa->nisn = $request->nisn;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->tgl_lahir_siswa = $request->tgl_lahir_siswa;
        $siswa->jenis_kelamin_siswa = $request->jenis_kelamin_siswa;
        $siswa->alamat_siswa = $request->alamat_siswa;
        $siswa->password = bcrypt($request->password);
        $siswa->nomor_wa_siswa = $request->nomor_wa_siswa;
        $siswa->username = $request->username;
        $siswa->email = $request->email;
        $siswa->role_siswa = $request->input('role_siswa');
        $siswa->tgl_lahir_siswa = $request->tgl_lahir_siswa;
        if ($request->hasFile('foto_siswa')) {
            $fileName = time() . '.' . $request->foto_siswa->extension();
            $request->foto_siswa->move(public_path('public/images/siswa'), $fileName);
            $siswa->foto_siswa = $fileName;
        }
        $siswa->save();
        return redirect()->route('superadmin.keloladatasiswa')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function siswaUpdate(Request $request, $id_siswa)
{
    // Validate the form data
    // $request->validate([
    //     'nama_siswa' => 'required|string|max:255',
    //     'nisn' => 'required|string|unique:siswa,nisn,' . $id_siswa . ',id_siswa',
    //     'username' => 'required|string|unique:siswa,username,' . $id_siswa . ',id_siswa',
    //     'email' => 'required|email|unique:siswa,email,' . $id_siswa . ',id_siswa',
    //     'foto_siswa' => 'nullable|image|max:2048',
    //     'password' => 'nullable|string|min:8',
    // ]);
    $siswa = Siswa::findOrFail($id_siswa);
    $siswa->nama_siswa = $request->nama_siswa;
    $siswa->nisn = $request->nisn;
    $siswa->username = $request->username;
    $siswa->alamat_siswa = $request->alamat_siswa;
    $siswa->nomor_wa_siswa = $request->nomor_wa_siswa;
    $siswa->email = $request->email;
    $siswa->jenis_kelamin_siswa = $request->jenis_kelamin_siswa;
    $siswa->kelas_id = $request->class; 
    $siswa->role_siswa = $request->input('role_siswa');
    $siswa->tgl_lahir_siswa = $request->tgl_lahir_siswa;
    if ($request->filled('password')) {
        $siswa->password = bcrypt($request->password);
    }
    if ($request->hasFile('foto_siswa')) {
        $fileName = time() . '.' . $request->foto_siswa->extension();
        $request->foto_siswa->move(public_path('images/siswa/'), $fileName);
        $siswa->foto_siswa = $fileName;
    }
    $siswa->save();
    return redirect()->route('superadmin.keloladatasiswa')->with('success', 'Data siswa berhasil diperbarui.');
}

}
