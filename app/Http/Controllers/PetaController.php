<?php

namespace App\Http\Controllers;
use App\Models\Provinsi;
use App\Models\Kabkota;
use Illuminate\Http\Request;

class PetaController extends Controller
{
    public function index(){
        $list_provinsi = Provinsi::all();
        return view('peta.index',[
            'list_provinsi' => $list_provinsi
        ]);
    }
    public function provinsi(){
        $list_provinsi = Provinsi::all();
        return view('provinsi',[
            'list_provinsi' => $list_provinsi
        ]);
    }
    public function kabkota(){
        $list_kabkota = Kabkota::all();
        return view('kabkota',[
            'list_kabkota' => $list_kabkota
        ]);
    }
}