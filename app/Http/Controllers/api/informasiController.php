<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class informasiController extends Controller
{
    public function tampil(Request $request)
{
    $search = $request->input('search');

    $informasi = Informasi::when($search, function ($query) use ($search) {
        return $query->where('judul', 'like', '%' . $search . '%')
                     ->orWhere('isi', 'like', '%' . $search . '%');
    })
    ->limit(10) // Batasi jumlah data maksimal 10
    ->get(); // Ambil data tanpa pagination

    // Ubah path file menjadi URL publik dengan asset()
    $informasi->transform(function ($info) {
        if ($info->file) {
            $info->file = asset('storage/' . $info->file);
        }
        return $info;
    });

    return response()->json($informasi);
}


public function index(Request $request)
{
    $search = $request->input('search');
    $kategoriId = $request->input('kategori');

    // Ambil semua informasi dengan pencarian, filter kategori dan sertakan kategori
    $informasi = Informasi::with('kategori') // Mengambil data kategori
        ->when($search, function ($query) use ($search) {
            return $query->where('judul', 'like', '%' . $search . '%')
                         ->orWhere('isi', 'like', '%' . $search . '%');
        })
        ->when($kategoriId, function ($query) use ($kategoriId) {
            return $query->where('KategoriID', $kategoriId);
        })
        ->get(); // Mengambil semua data tanpa batasan

    // Ubah path file menjadi URL publik dengan asset()
    $informasi->transform(function ($info) {
        if ($info->file) {
            $info->file = asset('storage/' . $info->file);
        }
        return $info;
    });

    return response()->json($informasi);
}



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'ringkasan' => 'nullable|string',
            'isi' => 'required',
            'KategoriID' => 'required|integer|exists:kategoris,KategoriID',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:102400',
            'status' => 'required|max:255',
        ]);

        $filePath = $request->file('file')->store('uploads', 'public');

        $informasi = Informasi::create([
            'judul' => $validatedData['judul'],
            'ringkasan' => $validatedData['ringkasan'],
            'isi' => $validatedData['isi'],
            'KategoriID' => $validatedData['KategoriID'],
            'file' => $filePath,
            'status' => $validatedData['status'],
            'user_id' => auth()->id()
        ]);

        $informasi->file = asset('storage/' . $informasi->file);

        return response()->json(['success' => 'Informasi berhasil ditambahkan!', 'informasi' => $informasi], 201);
    }

    public function show(Informasi $informasi)
    {
        $informasi->file = $informasi->file ? asset('storage/' . $informasi->file) : null;

        return response()->json($informasi);
    }

    public function update(Request $request, Informasi $informasi)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'ringkasan' => 'nullable|string',
            'isi' => 'required',
            'KategoriID' => 'required|integer|exists:kategoris,KategoriID',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:102400',
            'status' => 'required|max:255',
        ]);

        $data = $request->except('file');

        if ($request->hasFile('file')) {
            if (\Storage::disk('public')->exists($informasi->file)) {
                \Storage::disk('public')->delete($informasi->file);
            }
            $filePath = $request->file('file')->store('uploads', 'public');
            $data['file'] = $filePath;
        }

        $informasi->update($data);

        $informasi->file = $informasi->file ? asset('storage/' . $informasi->file) : null;

        return response()->json(['success' => 'Informasi berhasil diperbarui!', 'informasi' => $informasi]);
    }

    public function destroy(Informasi $informasi)
    {
        if (\Storage::disk('public')->exists($informasi->file)) {
            \Storage::disk('public')->delete($informasi->file);
        }

        $informasi->delete();

        return response()->json(['success' => 'Informasi berhasil dihapus']);
    }
}
