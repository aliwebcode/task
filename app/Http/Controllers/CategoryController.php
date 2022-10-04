<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'data.title' => 'required|string|max:50',
        ]);

        // Get User Menu
        $menu = auth()->user()->menu;

        // Check SubCategory Level And Children Type
        if($request->data['parent_id']) {
            $parent = Category::find($request->data['parent_id']);
            // CCheck SubCategory Level
            if($parent->parentCount() == Category::MAXIMUM_SUB_CATEGORIES) {
                return response()->json([
                    'message' => 'You Can\'t Add More Sub Categories!'
                ], 400);
            }
            // Check Children Type
            if($parent->checkChildrenType() == 'item') {
                return response()->json([
                    'message' => 'Parent Category Has Items!'
                ], 400);
            }
        }

        $category = Category::create([
            'title' => $request->data['title'],
            'parent_id' => $request->data['parent_id'],
            'menu_id' => $menu->id
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Category Added!',
            'category' => $category
        ]);
    }

    public function get_categories()
    {
        if(auth()->user()->menu) {
            $categories = Category::where('menu_id', auth()->user()->menu->id)->get();
            return response()->json($categories);
        } else {
            return -1;
        }
    }

    public function get_item_categories()
    {
        $categories = Category::where('menu_id', auth()->user()->menu)->get();
        return response()->json($categories);
    }
}
