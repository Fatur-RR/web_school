<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use Illuminate\Http\Request;

class fotoController extends Controller
{
    public function tampil(Request $request)
{
    $search = $request->input('search');

    // Ambil semua foto dengan pencarian dan batasi hasil hingga 10
    $foto = Foto::when($search, function ($query) use ($search) {
            return $query->where('judul', 'like', "%{$search}%")
                         ->orWhere('deskripsi', 'like', "%{$search}%");
        })->limit(10) // Batasi hasil hingga 10
        ->get(); // Mengambil data tanpa paginasi

    // Ubah path file menjadi URL menggunakan asset()
    $foto->transform(function ($item) {
        $item->file = $item->file ? asset('storage/' . $item->file) : null;
        return $item;
    });

    return response()->json($foto);
}


public function index(Request $request)
{
    $search = $request->input('search');

    // Ambil semua foto dengan pencarian tanpa batasan jumlah hasil dan sertakan nama album
    $foto = Foto::with('album') // Tambahkan eager loading untuk album
        ->when($search, function ($query) use ($search) {
            return $query->where('judul', 'like', "%{$search}%")
                         ->orWhere('deskripsi', 'like', "%{$search}%");
        })->get();

    // Ubah path file menjadi URL menggunakan asset() dan tambahkan nama album
    $foto->transform(function ($item) {
        $item->file = $item->file ? asset('storage/' . $item->file) : null;
        $item->nama_album = $item->album ? $item->album->nama : 'Album tidak tersedia';
        return $item;
    });

    return response()->json($foto);
}




    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'AlbumID' => 'required|integer',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:102400',
        ]);

        $filePath = $request->file('file') ? $request->file('file')->store('uploads', 'public') : null;

        $foto = Foto::create([
            'judul' => $validatedData['judul'],
            'deskripsi' => $validatedData['deskripsi'],
            'AlbumID' => $validatedData['AlbumID'],
            'file' => $filePath,
        ]);

        return response()->json(['message' => 'Foto berhasil ditambahkan!', 'data' => $foto], 201);
    }

    public function show($FotoID)
    {
        $foto = Foto::with('album')->findOrFail($FotoID);

        return response()->json([
            'judul' => $foto->judul,
            'file' => $foto->file,
            'deskripsi' => $foto->deskripsi,
            'created_at' => $foto->created_at,
            'album' => $foto->album ? $foto->album->Nama : 'Album tidak tersedia',
        ]);
    }

    public function update(Request $request, $FotoID)
    {
        $foto = Foto::findOrFail($FotoID);

        $request->validate([
            'judul' => 'required|string|max:255',
            'AlbumID' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:102400',
        ]);

        $foto->judul = $request->judul;
        $foto->deskripsi = $request->deskripsi;
        $foto->AlbumID = $request->AlbumID;

        if ($request->hasFile('file')) {
            if (\Storage::disk('public')->exists($foto->file)) {
                \Storage::disk('public')->delete($foto->file);
            }

            $file = $request->file('file');
            $path = $file->store('uploads', 'public');
            $foto->file = $path;
        }

        $foto->save();

        return response()->json(['message' => 'Foto berhasil diperbarui.', 'data' => $foto]);
    }

    public function destroy($FotoID)
    {
        $foto = Foto::findOrFail($FotoID);

        if (\Storage::disk('public')->exists($foto->file)) {
            \Storage::disk('public')->delete($foto->file);
        }

        $foto->delete();

        return response()->json(['message' => 'Foto berhasil dihapus.']);
    }
}
