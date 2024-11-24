<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Models\Foto;
use App\Models\User;
use App\Models\Album;
use App\Models\Agenda;
use App\Models\Informasi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index()
    {
        $stats = [
            'total_visitors' => Visitor::count(),
            'unique_visitors' => Visitor::distinct('ip_address')->count(),
            'total_photos' => Foto::count(),
            'total_users' => User::count(),
            'total_albums' => Album::count(),
            'total_agendas' => Agenda::count(),
            'total_informasi' => Informasi::count(),
            'total_categories' => Kategori::count(),
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
        ];

        return view('dashboard', compact('stats'));
    }
}