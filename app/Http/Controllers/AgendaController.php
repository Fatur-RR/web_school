<?php

namespace App\Http\Controllers;

use App\Models\agenda;
use App\Models\Kategori; // Pastikan untuk mengimpor model Kategori
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tampil(Request $request)
    {
        // Ambil parameter pencarian dan kategori jika ada
        $search = $request->input('search');
        $kategoriId = $request->input('kategori');

        // Ambil semua kategori untuk filter dropdown
        $kategoris = Kategori::all();

        // Query dasar
        $query = agenda::query();

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
        $agendas = $query->paginate(10);

        // Kirim data ke view agenda
        return view('agenda', [
            'agendas' => $agendas,
            'search' => $search,
            'kategoris' => $kategoris,
            'selectedKategori' => $kategoriId
        ]);
    }


    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategoris = Kategori::all(); // Ambil semua kategori
        $agendas = Agenda::when($search, function ($query) use ($search) {
            return $query->where('judul', 'like', '%' . $search . '%')
                         ->orWhere('isi', 'like', '%' . $search . '%');
        })->with(['kategori', 'user'])->paginate(10); // Mengambil semua agenda beserta kategori dan user
        return view('crudAgenda', compact('agendas', 'kategoris', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all(); // Mengambil semua kategori untuk dropdown
        return view('agenda.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'KategoriID' => 'required|exists:kategoris,KategoriID',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'status' => 'required|string|max:50',
            'user_id' => 'required|exists:users,id',
        ]);

        // Membuat agenda baru
        Agenda::create([
            'KategoriID' => $request->KategoriID,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'status' => $request->status,
            'user_id' => $request->user_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        return view('agenda.show', compact('agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agenda $agenda)
    {
        $kategoris = Kategori::all(); // Mengambil semua kategori untuk dropdown
        return view('agenda.edit', compact('agenda', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agenda $agenda)
    {

        // Validasi input
        $request->validate([
            'KategoriID' => 'required|exists:kategoris,KategoriID',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'status' => 'required|string|max:50',
            'user_id' => 'required|exists:users,id',
        ]);

        // Update agenda
        $agenda->update([
            'KategoriID' => $request->KategoriID,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'status' => $request->status,
            'user_id' => $request->user_id,
            'updated_at' => now(),
        ]);

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda)
    {
        // Hapus agenda
        $agenda->delete();
        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil dihapus');
    }
}
