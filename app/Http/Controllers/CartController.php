<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vinyl;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Vinyl $vinyl, Request $request)
    {
        $cart = session('cart', []);

        if(isset($cart[$vinyl->id])) {
            $cart[$vinyl->id]['quantity'] += 1;
        } else {
            $cart[$vinyl->id] = [
                'titel' => $vinyl->titel,
                'prijs' => $vinyl->prijs,
                'quantity' => 1,
            ];
        }

        session(['cart' => $cart]);

        return back()->with('success', 'Vinyl toegevoegd aan de mand.');
    }

    public function update(Request $request, Vinyl $vinyl)
    {
        $cart = session('cart', []);

        if(isset($cart[$vinyl->id])) {
            $cart[$vinyl->id]['quantity'] = $request->quantity;
            session(['cart' => $cart]);
        }

        return back();
    }

    public function remove(Vinyl $vinyl)
    {
        $cart = session('cart', []);

        if(isset($cart[$vinyl->id])) {
            unset($cart[$vinyl->id]);
            session(['cart' => $cart]);
        }

        return back();
    }
}
