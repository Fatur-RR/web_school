<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\kategori;
use App\Models\informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformasiController extends Controller
{
    public function tampil(Request $request)
    {
        // Mencari query string dari request
        $search = $request->input('search');
        $kategoriId = $request->input('kategori');

        // Mengambil semua kategori untuk filter dropdown
        $kategoris = kategori::all();

        // Query dasar
        $query = informasi::query();

        // Filter berdasarkan pencarian jika ada
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('isi', 'like', '%' . $search . '%');
            });
        }

        // Filter berdasarkan kategori jika dipilih
        if ($kategoriId) {
            $query->where('KategoriID', $kategoriId);
        }

        // Eksekusi query dengan paginasi
        $informasi = $query->paginate(10);

        // Mengembalikan ke view dengan informasi yang sudah diproses
        return view('informasi', [
            'informasis' => $informasi, 
            'search' => $search,
            'kategoris' => $kategoris,
            'selectedKategori' => $kategoriId
        ]);
    }


    public function index(Request $request)
    {
        $search = $request->input('search');
        $informasi = informasi::when($search, function ($query) use ($search) {
            return $query->where('judul', 'like', '%' . $search . '%')
                         ->orWhere('isi', 'like', '%' . $search . '%');
        })->paginate(10);
        $kategori = kategori::all();
        return view('crudInformasi', compact('informasi', 'kategori', 'search'));
    }

    public function create()
    {
        // Menampilkan form untuk menambahkan informasi baru
        $kategori = kategori::all();
        return view('informasi.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'ringkasan' => 'nullable|string',
            'isi' => 'required',
            'KategoriID' => 'required|integer',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:102400',
            'status' => 'required|max:255',
        ]);

        // Menyimpan file ke storage
        $filePath = $request->file('file')->store('uploads', 'public');

        // Menyimpan data ke database
        informasi::create([
            'judul' => $validatedData['judul'],
            'ringkasan' => $validatedData['ringkasan'],
            'isi' => $validatedData['isi'],
            'KategoriID' => $validatedData['KategoriID'],
            'file' => $filePath,
            'status' => $validatedData['status'],
            'user_id' => auth()->id()
        ]);

        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil ditambahkan!');
    }



    public function show(informasi $informasi)
    {
        return view('informasi.show', compact('informasi'));
    }

    public function edit(informasi $informasi)
    {
        // Menampilkan form untuk mengedit informasi yang sudah ada
        $kategori = kategori::all();
        return view('informasi.edit', compact('informasi', 'kategori'));
    }

    public function update(Request $request, Informasi $informasi)
{
    $request->validate([
        'judul' => 'required|max:255',
        'ringkasan' => 'nullable|string',
        'isi' => 'required',
        'KategoriID' => 'required|integer',
        'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:102400',
        'status' => 'required|max:255',
        // 'user_id' => 'required|integer|exists:users,id' // Hapus jika tidak diperlukan
    ]);

    // Buat array untuk menyimpan data yang akan diupdate
    $data = $request->except('file');

    // Update file jika ada
    if ($request->hasFile('file')) {
        // Hapus file yang lama
        if (\Storage::disk('public')->exists($informasi->file)) {
            \Storage::disk('public')->delete($informasi->file);
        }
        $filePath = $request->file('file')->store('uploads', 'public');
        $data['file'] = $filePath; // Tambahkan file baru ke data
    }

    // Update data lainnya
    $informasi->update($data);

    return redirect()->route('informasi.index')->with('success', 'Informasi berhasil diperbarui!');
}


    public function destroy(informasi $informasi)
    {
        // Menghapus informasi dari database

         // Cek apakah file foto benar-benar ada di storage sebelum menghapus
    if (\Storage::disk('public')->exists($informasi->file)) {
        // Hapus file dari storage
        \Storage::disk('public')->delete($informasi->file);
    }

        $informasi->delete();

        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil dihapus');
    }
}
