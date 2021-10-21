<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * @param Request $request
     * @return string
     */
    public function home(Request $request){
        return view('shop-main');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function singleItem(Request $request, int $id){
        return view('single-shop-item', [
            'id' => $id,
        ]);
    }
}
