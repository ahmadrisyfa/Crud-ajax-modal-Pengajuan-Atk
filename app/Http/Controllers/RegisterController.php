<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('template.register.index');
    }
    public function store(Request $request)
    {
       $validatedData = $request->validate([
           'name'=> 'required|max:255',
           'email' => 'required|unique:users',
           'password'=>'required|min:5|max:255'
       ]) ;

        $validatedData['password'] = Hash::make($validatedData['password']);

       User::create($validatedData);
        return redirect('/login')->with('berhasil_registrasi','Registrasi Berhasil! Silahkan Login');
    }
}
