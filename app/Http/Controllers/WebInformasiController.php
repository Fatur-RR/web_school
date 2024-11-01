<?php

namespace App\Http\Controllers;
use App\Models\informasi;
use Illuminate\Http\Request;

class WebInformasiController extends Controller
{
    public function index()
    {
        return informasi::all(); // Mengembalikan semua data Foto
    }

}
