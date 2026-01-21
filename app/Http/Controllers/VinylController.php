<?php

namespace App\Http\Controllers;

use App\Models\Vinyl;       // <- BELANGRIJK
use Illuminate\Http\Request;

class VinylController extends Controller
{
    public function index(Request $request)
    {
        // Start query
        $query = Vinyl::query();

        // Filteren op artiest
        if ($request->filled('artiest')) {
            $query->where('artiest', $request->artiest);
        }

        // Filteren op genre
        if ($request->filled('genre')) {
            $query->where('genre', $request->genre);
        }

        // Filteren op prijs (optioneel)
        if ($request->filled('prijs')) {
            $query->orderBy('prijs', $request->prijs); // prijs=asc of prijs=desc
        }

        $vinyls = $query->paginate(9);

        // Haal unieke artiesten en genres op
        $artiesten = Vinyl::select('artiest')->distinct()->pluck('artiest');
        $genres = Vinyl::select('genre')->distinct()->pluck('genre');

        return view('vinyl.index', compact('vinyls', 'artiesten', 'genres'));
    }




    public function show(Vinyl $vinyl)
    {
        return view('vinyl.show', compact('vinyl'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q', '');

        $vinyls = \App\Models\Vinyl::where('titel', 'like', "%{$query}%")
            ->orWhere('artiest', 'like', "%{$query}%")
            ->limit(5)
            ->get(['id', 'titel', 'artiest']);

        return response()->json($vinyls);
    }


}
