<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WebFotoController;
use App\Http\Controllers\WebInformasiController;
use App\Http\Controllers\WebAgendaController;
use App\Http\Controllers\WebAlbumController;

class HomeController extends Controller
{
    public function index()
    {
        $judul = 'Map'; // Judul yang ingin diambil
        // Memanggil controller lainnya
        $fotoController = new WebFotoController();
        $informasiController = new WebInformasiController();
        $agendaController = new WebAgendaController();
        $albumController = new WebAlbumController();

        // Mengambil data berdasarkan judul
        $fotos = $fotoController->index();
        $fotosByJudul = $fotoController->getByJudul($judul); // Ganti dari albumID ke judul
        $informasis = $informasiController->index();
        $agendas = $agendaController->index();
        $album = $albumController->index();

        // Return view dengan data yang telah disesuaikan
        return view('welcome', compact('fotos','fotosByJudul', 'informasis', 'agendas'));
    }
}
