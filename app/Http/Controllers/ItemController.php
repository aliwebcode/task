<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Add Item
    public function add(Request $request)
    {
        $request->validate([
            'data.title' => 'required|string',
            'data.price' => 'required',
        ]);

        $item = Item::create([
            'title' => $request->data['title'],
            'price' => $request->data['price'],
            'discount' => $request->data['discount'],
            'category_id' => $request->data['category_id'],
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Item Added!',
        ]);
    }
    // Get Items By Category ID
    public function get_category_items($id)
    {
        $items = Item::with('category')->where('category_id', $id)->get();
        return response()->json($items, 200);
    }
}
