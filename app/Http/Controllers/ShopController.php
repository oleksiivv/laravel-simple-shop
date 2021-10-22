<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductItem;

class ShopController extends Controller
{
    /**
     * @param Request $request
     * @return string
     */
    public function home(Request $request){
        $categories = Category::all();
        return view('shop-main', [
            'categories' => $categories,
        ]);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function singleItem(Request $request,int $category_id, int $product_id){
        return view('single-shop-item', [
            'item' => ProductItem::find($product_id),
        ]);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function singleCategory(Request $request, int $category_id){
        $category = Category::find($category_id);
        $items = ProductItem::where('category_id', $category->id)->get();
        return view('single-shop-category', [
            'category' => $category,
            'items' => $items,

        ]);
    }
}
