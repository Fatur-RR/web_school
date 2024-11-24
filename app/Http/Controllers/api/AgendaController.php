<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tampil(Request $request)
    {
        $search = $request->input('search');

        // Ambil semua agenda dengan pencarian dan batasi hasil hingga 10
        $agendas = Agenda::with(['kategori', 'user'])
            ->when($search, function ($query) use ($search) {
                return $query->where('judul', 'like', "%{$search}%")
                             ->orWhere('isi', 'like', "%{$search}%");
            })
            ->limit(10) // Batasi hasil hingga 10
            ->get(); // Mengambil data tanpa paginasi

        return response()->json($agendas);
    }


    
    public function index(Request $request)
{
    $search = $request->input('search');
    $kategoriId = $request->input('kategori');

    // Ambil semua agenda dengan pencarian dan filter kategori
    $agendas = Agenda::with(['kategori', 'user'])
        ->when($search, function ($query) use ($search) {
            return $query->where('judul', 'like', "%{$search}%")
                         ->orWhere('isi', 'like', "%{$search}%");
        })
        ->when($kategoriId, function ($query) use ($kategoriId) {
            return $query->where('KategoriID', $kategoriId);
        })
        ->get();

    return response()->json($agendas);
}



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'KategoriID' => 'required|exists:kategoris,KategoriID',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'status' => 'required|string|max:50',
            'user_id' => 'required|exists:users,id',
        ]);

        // Membuat agenda baru
        $agenda = Agenda::create([
            'KategoriID' => $validatedData['KategoriID'],
            'judul' => $validatedData['judul'],
            'isi' => $validatedData['isi'],
            'status' => $validatedData['status'],
            'user_id' => $validatedData['user_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['success' => 'Agenda berhasil ditambahkan', 'agenda' => $agenda], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        return response()->json($agenda);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agenda $agenda)
    {
        $validatedData = $request->validate([
            'KategoriID' => 'required|exists:kategoris,KategoriID',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'status' => 'required|string|max:50',
            'user_id' => 'required|exists:users,id',
        ]);

        // Update agenda
        $agenda->update($validatedData);

        return response()->json(['success' => 'Agenda berhasil diperbarui', 'agenda' => $agenda]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        return response()->json(['success' => 'Agenda berhasil dihapus']);
    }
}
