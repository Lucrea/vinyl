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
