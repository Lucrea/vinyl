<?php

namespace App\Http\Controllers;

use App\Models\Vinyl;

class HomeController extends Controller
{
    public function index()
    {
        // Slider: 5 nieuwste platen
        $featuredVinyls = Vinyl::orderBy('created_at', 'desc')->take(3)->get();

        // Overzicht: 8 platen
        $vinyls = Vinyl::orderBy('created_at', 'desc')->take(6)->get();

        return view('home', compact('featuredVinyls', 'vinyls'));
    }
}
