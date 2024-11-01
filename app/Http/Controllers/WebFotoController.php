<?php

namespace App\Http\Controllers;

use App\Models\foto;
use Illuminate\Http\Request;

class WebFotoController extends Controller
{
    public function index()
    {
        return foto::all(); // Mengembalikan semua data Foto
    }

    public function getByJudul($judul)
    {
        // Mengambil foto berdasarkan judul
        return Foto::where('judul', $judul)->get();
    }
}
