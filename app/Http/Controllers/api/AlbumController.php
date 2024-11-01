<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Query albums berdasarkan nama atau deskripsi, termasuk cover image dan kategori
        $albums = Album::with(['coverImage', 'kategori'])
            ->when($search, function ($query, $search) {
                $query->where('Nama', 'like', "%{$search}%")
                      ->orWhere('Deskripsi', 'like', "%{$search}%");
            })
            ->get();

        // Mengubah path file coverImage menjadi URL dengan asset()
        $albums->transform(function ($album) {
            if ($album->coverImage && $album->coverImage->file) {
                $album->coverImage->file = asset('storage/' . $album->coverImage->file);
            }
            return $album;
        });

        return response()->json($albums);
    }


    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'KategoriID' => 'required|exists:kategoris,KategoriID',
            'Nama' => 'required|string|max:255',
            'Deskripsi' => 'required|string|max:255',
        ]);

        // Membuat album baru
        $album = Album::create([
            'KategoriID' => $validatedData['KategoriID'],
            'Nama' => $validatedData['Nama'],
            'Deskripsi' => $validatedData['Deskripsi'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['message' => 'Album berhasil ditambahkan', 'data' => $album], 201);
    }

    public function show($id)
{
    $album = Album::with('fotos')->findOrFail($id); // Mengambil album beserta foto-fotonya

    // Ubah path file pada setiap foto menjadi URL publik
    $album->fotos->transform(function ($foto) {
        if ($foto->file) {
            $foto->file = asset('storage/' . $foto->file);
        }
        return $foto;
    });

    return response()->json($album);
}


    public function update(Request $request, $id)
    {
        $album = Album::findOrFail($id);

        // Validasi input
        $validatedData = $request->validate([
            'KategoriID' => 'required|exists:kategoris,KategoriID',
            'Nama' => 'required|string|max:255',
            'Deskripsi' => 'required|string|max:255',
        ]);

        // Update album
        $album->update([
            'KategoriID' => $validatedData['KategoriID'],
            'Nama' => $validatedData['Nama'],
            'Deskripsi' => $validatedData['Deskripsi'],
            'updated_at' => now(),
        ]);

        return response()->json(['message' => 'Album berhasil diperbarui', 'data' => $album]);
    }

    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $album->delete();

        return response()->json(['message' => 'Album berhasil dihapus']);
    }
}
