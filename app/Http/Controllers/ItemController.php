<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'data.title' => 'required|string',
            'data.price' => 'required',
        ]);

        $item = Item::create([
            'title' => $request->data['title'],
            'price' => $request->data['price'],
            'category_id' => $request->data['category_id'],
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Item Added!',
        ]);

    }
}
