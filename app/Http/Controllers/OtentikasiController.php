<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtentikasiController extends Controller
{
    public function login()
    {
        return view('otentikasi.login');
    }
}
