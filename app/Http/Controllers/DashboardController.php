<?php

namespace App\Http\Controllers;

use App\Models\kensa;
use App\Models\racking_t;
use App\Models\Stok;
use App\Models\unracking_t;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home(){
        $stok = Stok::count();
        $kensa = kensa::count();
        $unracking = unracking_t::count();
        $racking = racking_t::count();
        return view('dashboard', compact('stok','kensa','unracking', 'racking'));
    } 
}
