<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelolaStaffAkademikRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        if (request('id_staff_akademik')) {
            return [
                'username' => 'required|string|max:255',
                'nama_staff_akademik'=> 'required|string|max:255',
                'alamat_staff_akademik'=> 'required|string|max:255',
                'wa_staff_akademik'=> 'required|digits_between:12,13',
            ];
        }
        else{
            return [
                'username' => 'required|string|max:255',
                'password' => 'required|string|min:8',
                'nama_staff_akademik'=> 'required|string|max:255',
                'alamat_staff_akademik'=> 'required|string|max:255',
                'wa_staff_akademik'=> 'required|digits_between:12,13',
            ];
        }

    }

    /**
     * Pesan kesalahan kustom untuk setiap aturan validasi.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah terdaftar.',
            'username.max' => 'Username maksimal 255 karakter.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'nama_staff_akademik.required' => 'Nama wajib diisi.',
            'nama_staff_akademik.max' => 'Nama maksimal 255 karakter.',
            'alamat_staff_akademik.required' => 'Alamat wajib diisi.',
            'alamat_staff_akademik.max' => 'Alamat maksimal 255 karakter.',
            'wa_staff_akademik.required' => 'Nomor WhatsApp wajib diisi.',
            'wa_staff_akademik.digits_between' => 'Nomor WhatsApp harus antara 12 hingga 13 digit.',
        ];
    }
}
