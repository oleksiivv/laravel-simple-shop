<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductItem;

class AdminPanelController extends Controller
{
    /**
     * @param Request $request
     * @return string
     */
    public function main(Request $request){
        return view('admin-panel');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function addNewProduct(Request $request){
        $newItem = ProductItem::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $request->input('image'),
            'price' => $request->input('price'),
            'category_id' => 1,
        ]);

        return redirect()->route('shop');
    }

}
