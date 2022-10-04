<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Get User's Menu
    public function get()
    {
        return auth()->user()->load('menu');
    }
    // Add New Menu
    public function add(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'discount' => 'nullable'
        ]);
        if(auth()->user()->menu) {
            return response()->json([
                'status' => 'danger',
                'message' => 'You Can\'t Add Another Menu.'
            ], 400);
        }
        Menu::create([
            'title' => $request->title,
            'discount' => $request->discount,
            'user_id' => auth()->id()
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Menu Added!'
        ], 201);
    }
    // Get All Menus
    public function all()
    {
        $menus = Menu::withCount('categories')->latest()->get();
        return response()->json($menus, 200);
    }
}
