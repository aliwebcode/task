<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function get()
    {
        return auth()->user()->load('menus');
    }
    public function add(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50'
        ]);
        if(auth()->user()->menus->count() > 0) {
            return response()->json([
                'status' => 'danger',
                'message' => 'You Can\'t Add Another Menu.'
            ], 403);
        }
        Menu::create([
            'title' => $request->title,
            'user_id' => auth()->id()
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Menu Added!'
        ], 201);
    }
}
