<?php

namespace App\Http\Controllers;
use App\Models\profile;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $profiles = profile::all();
// Mengirim data ke view about
return view('about', ['profiles' => $profiles]);

    }  
}
