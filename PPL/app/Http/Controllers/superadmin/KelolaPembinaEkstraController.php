<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KelolaPembinaEkstraRequest;
use App\Models\Ekstrakurikuler;
use App\Models\Guru;

class KelolaPembinaEkstraController extends Controller
{
    public function index()
    {
        $pembinas = Guru::where('role_guru', 'pembina')->with('ekstrakurikuler')->latest()->paginate(10);
        return view('superadmin.kelola_data_pembina_ekstra.index',compact('pembinas'));
    }

    public function create()
    {
        $ekstras = Ekstrakurikuler::all();
        return view('superadmin.kelola_data_pembina_ekstra.create',compact('ekstras'));
    }

    public function edit($id)
    {
        $pembina = Guru::where('id_guru',$id)->first();
        return view('superadmin.kelola_data_pembina_ekstra.edit',compact('pembina'));
    }

    public function store(KelolaPembinaEkstraRequest $request)
    {
        
        // Enkripsi password sebelum disimpan
        $validatedData = $request->validated();
        // Enkripsi password sebelum disimpan
        $validatedData['password'] = bcrypt($validatedData['password']);
        // Simpan data ke dalam database
        Guru::create($validatedData);
        
        // Redirect atau berikan respon sukses
        return redirect()->route('superadmin.kelola_pembina_ekstrakurikuler')->with('success', 'User created successfully!');
    }

    public function update(KelolaPembinaEkstraRequest $request)
    {
        // Enkripsi password sebelum disimpan
        $validatedData = $request->validated();
        if($request->password){
            $validatedData['password'] = bcrypt($validatedData['password']);
        }
        else{
            unset($validatedData['password']);
        }
        // Simpan data ke dalam database
        $staffperpus = Guru::find($request->id_guru);
        $staffperpus->update($validatedData);
    
        // Redirect atau berikan respon sukses
        return redirect()->route('superadmin.kelola_pembina_ekstrakurikuler')->with('success', 'User created successfully!');
    }

    public function destroy($id)
    {
        // Find the staff record by ID
        $staff = Guru::findOrFail($id);

        // Attempt to delete the record
        $staff->delete();

        // Redirect with a success message
        return redirect()->route('superadmin.kelola_pembina_ekstrakurikuler')->with('success', 'User deleted successfully');
    }
}
