<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regency;


class RegencyController extends Controller
{
    public function index()
    {
        $regencies = Regency::all();
        return view('regency',  compact('regencies'));
    }
    public function show()
    {
        $regencies = Regency::all();
        return view('kepadatan',  compact('regencies'));
    }
    public function kawin()
    {
        $regencies = Regency::all();
        return view('kawin',  compact('regencies'));
    }
    public function gdp()
    {
        $regencies = Regency::all();
        return view('gdp',  compact('regencies'));
    }
}
