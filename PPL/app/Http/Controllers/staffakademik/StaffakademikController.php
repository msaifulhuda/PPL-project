<?php

namespace App\Http\Controllers\staffakademik;

use App\Http\Controllers\Controller;
use App\Models\Staffakademik;
use Illuminate\Http\Request;

class StaffakademikController extends Controller
{
    public function profile() {
        $profile=Staffakademik::where('id_staff_akademik', auth()->guard('web-staffakademik')->user()->id_staff_akademik)->first();
        return view('staff_akademik.profile.index',compact('profile'));
    }
    public function update(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'wa_staff_akademik' => 'required|numeric|digits_between:12,13',
        ], [
            'email.required' => 'Email harus terisi',
            'email.email' => 'Email harus berisi format yang benar',
            'wa_staff_akademik.required' => 'Nomer Wa perlu diisi',
            'wa_staff_akademik.numeric' => 'Nomer wa harus numeric',
            'wa_staff_akademik.digits_between' => 'Nomer wa harus 12-13 angka',
        ]);

        $profile=Staffakademik::where('id_staff_akademik', auth()->guard('web-staffakademik')->user()->id_staff_akademik)->first();
        $profile->update([
            'email' => $request->email,
            'wa_staff_akademik' => $request->wa_staff_akademik,
        ]);
        return view('staff_akademik.profile.index',compact('profile'));
    }
}
