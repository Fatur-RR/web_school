<?php

namespace App\Http\Controllers;
use App\Models\album;
use Illuminate\Http\Request;

class WebAlbumController extends Controller
{
    public function index()
    {
        return album::all(); // Mengembalikan semua data Foto
    }
}
