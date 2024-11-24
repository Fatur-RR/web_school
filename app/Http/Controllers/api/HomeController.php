<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Album;
use App\Models\Foto;
use App\Models\Informasi;
use App\Models\Kategori;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        try {
            // Mengambil data dari tabel informasis dan agendas dengan relasi user
            $data = [
                'agendas' => Agenda::with(['kategori', 'user'])
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get(),

                'informasi' => Informasi::with(['kategori', 'user'])
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get(),

                'albums' => Album::with(['kategori'])
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get(),

                'fotos' => Foto::with(['album'])
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get(),

                'kategoris' => Kategori::withCount(['agendas', 'informasis'])
                    ->get(),

                'total_stats' => [
                    'total_agendas' => Agenda::count(),
                    'total_informasi' => Informasi::count(),
                    'total_albums' => Album::count(),
                    'total_fotos' => Foto::count(),
                    'total_kategoris' => Kategori::count(),
                    'total_visitors' => Visitor::count(),
                    'unique_visitors' => Visitor::distinct('ip_address')->count(),
                ],

                'visitor_stats' => [
                    'popular_pages' => Visitor::select('page_visited', DB::raw('count(*) as total'))
                        ->groupBy('page_visited')
                        ->orderByDesc('total')
                        ->limit(5)
                        ->get(),
                    'daily_visitors' => Visitor::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
                        ->groupBy('date')
                        ->orderBy('date', 'desc')
                        ->limit(7)
                        ->get()
                ]
            ];

            return response()->json([
                'status' => 'success',
                'data' => $data
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getAllData()
    {
        try {
            $data = [
                'agendas' => Agenda::with(['kategori', 'user'])->get(),
                'informasi' => Informasi::with(['kategori', 'user'])->get(),
                'albums' => Album::with(['kategori'])->get(),
                'fotos' => Foto::with(['album'])->get(),
                'kategoris' => Kategori::withCount(['agendas', 'informasis'])->get(),
                'visitor_stats' => [
                    'total_visitors' => Visitor::count(),
                    'unique_visitors' => Visitor::distinct('ip_address')->count(),
                    'popular_pages' => Visitor::select('page_visited', DB::raw('count(*) as total'))
                        ->groupBy('page_visited')
                        ->orderByDesc('total')
                        ->limit(5)
                        ->get(),
                    'daily_visitors' => Visitor::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
                        ->groupBy('date')
                        ->orderBy('date', 'desc')
                        ->limit(7)
                        ->get()
                ]
            ];

            return response()->json([
                'status' => 'success',
                'data' => $data
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}
