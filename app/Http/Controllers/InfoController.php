<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * @param Request $request
     * @return string
     */
    public function about(Request $request){
        return "Info page";
    }

    /**
     * @param Request $request
     * @return string
     */
    public function delivery(Request $request){
        return "About delivery";
    }

    /**
     * @param Request $request
     * @return string
     */
    public function contacts(Request $request){
        return "Contact us";
    }
}
