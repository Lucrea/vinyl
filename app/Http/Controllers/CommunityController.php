<?php

namespace App\Http\Controllers;

use App\Models\CommunityPost;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index()
    {
        $posts = CommunityPost::latest()->get();
        return view('community.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bericht' => 'required|string|max:1000',
        ]);

        $request->user()->posts()->create([
            'bericht' => $request->bericht,
        ]);

        return back()->with('success', 'Bericht geplaatst!');
    }





    public function destroy(CommunityPost $post)
    {
        $post->delete();
        return back();
    }
}
