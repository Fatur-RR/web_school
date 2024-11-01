<?php

namespace App\Http\Controllers;
use App\Models\agenda;
use Illuminate\Http\Request;

class WebAgendaController extends Controller
{
    public function index()
    {
        return agenda::all(); // Mengembalikan semua data Foto
    }
}
