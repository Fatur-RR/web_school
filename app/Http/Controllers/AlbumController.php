<?php

namespace App\Http\Controllers;

use App\Models\album;
use App\Models\kategori;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tampil(Request $request)
    {
        $search = $request->input('search');
        $kategoriId = $request->input('kategori');

        // Ambil semua kategori untuk filter dropdown
        $kategoris = Kategori::all();

        // Query albums berdasarkan nama, deskripsi dan kategori
        $albums = Album::with('coverImage')
            ->when($search, function ($query, $search) {
                $query->where('Nama', 'like', "%{$search}%")
                      ->orWhere('Deskripsi', 'like', "%{$search}%");
            })
            ->when($kategoriId, function($query) use ($kategoriId) {
                $query->where('KategoriID', $kategoriId);
            })
            ->get();

        return view('album', [
            'albums' => $albums,
            'search' => $search,
            'kategoris' => $kategoris,
            'selectedKategori' => $kategoriId
        ]);
    }


    public function index(Request $request)
    {
        $search = $request->input('search');


        $album = Album::with('coverImage')
            ->when($search, function ($query, $search) {
                $query->where('Nama', 'like', "%{$search}%")
                      ->orWhere('Deskripsi', 'like', "%{$search}%");
            })
            ->get();
        $kategori = kategori::all();
        return view('crudAlbum', compact('album', 'kategori', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk menambahkan informasi baru
        $kategori = kategori::all();
        return view('album.create', compact('kategori'));

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'KategoriID' => 'required|exists:kategoris,KategoriID',
            'Nama' => 'required|string|max:255',
            'Deskripsi' => 'required|string|max:255',
        ]);

        // Membuat agenda baru
        Album::create([
            'KategoriID' => $request->KategoriID,
            'Nama' => $request->Nama,
            'Deskripsi' => $request->Deskripsi,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('album.index')->with('success', 'Album berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $album = Album::with('fotos')->findOrFail($id); // Mengambil album beserta foto-fotonya
        return view('albumShow', compact('album'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(album $album)
    {
        $kategoris = Kategori::all(); // Mengambil semua kategori untuk dropdown
        return view('album.edit', compact('album', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, album $album)
    {
        // Validasi input
        $request->validate([
            'KategoriID' => 'required|exists:kategoris,KategoriID',
            'Nama' => 'required|string|max:255',
            'Deskripsi' => 'required|string|max:255',
        ]);

        // Update agenda
        $album->update([
           'KategoriID' => $request->KategoriID,
            'Nama' => $request->Nama,
            'Deskripsi' => $request->Deskripsi,
            'updated_at' => now(),
        ]);

        return redirect()->route('album.index')->with('success', 'Album berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(album $album)
    {
           // Hapus agenda
           $album->delete();
           return redirect()->route('album.index')->with('success', 'Album berhasil dihapus');
    }
}
