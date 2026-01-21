<?php

namespace App\Http\Controllers;

use App\Models\Vinyl;       // <- BELANGRIJK
use Illuminate\Http\Request;

class VinylController extends Controller
{
    public function index(Request $request)
    {
        $query = Vinyl::query();

        if ($request->search) {
            $query->where('titel', 'like', "%{$request->search}%")
                ->orWhere('artiest', 'like', "%{$request->search}%")
                ->orWhere('genre', 'like', "%{$request->search}%");
        }

        $vinyls = $query->orderBy('created_at', 'desc')->paginate(9);

        return view('vinyl.index', compact('vinyls'));
    }

    public function show(Vinyl $vinyl)
    {
        return view('vinyl.show', compact('vinyl'));
    }
}
