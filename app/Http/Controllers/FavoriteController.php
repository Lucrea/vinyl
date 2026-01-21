<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Vinyl;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = auth()->user()->favorites()->with('vinyl')->get();
        return view('favorites.index', compact('favorites'));
    }

    public function store(Vinyl $vinyl)
    {
        auth()->user()->favorites()->firstOrCreate([
            'vinyl_id' => $vinyl->id
        ]);

        return back();
    }

    public function destroy(Favorite $favorite)
    {
        $favorite->delete();
        return back();
    }
}
