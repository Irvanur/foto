<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function ubahpassword(Request $request){
        $pesan =[
            'password_lama.required'  => 'password lama harus di isi',
            'password_baru.required'  => 'password baru harus di isi',
            'password_baru.min'  => 'password minimal 8 karakter',
            'confirm_password.required'  => 'konfirmasi password harus di isi',
            'confirm_password.same'  => 'konfirmasi password harus sama dengan password baru'
        ];

        $request->validate ([
            'password_lama'  => 'required',
            'password_baru'  => 'required|min:8',
            'confirm_password'  => 'required | same:password_baru'
        ],$pesan);
        $user = auth()->user();

        if (!Hash::check($request->password_lama, $user->password)){
            return redirect()->back()->with('error', 'password_lama salah');
        } else{
            $user->update([
                'password'  => bcrypt($request->password_baru)
            ]);
            return redirect()->back()->with('success', 'Password berhasil di ubah');
        }
    }
}
