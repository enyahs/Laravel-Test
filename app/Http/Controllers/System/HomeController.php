<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * View the homepage.
     * 
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('web/pages/system/home', [
            "title" => "Home",
        ]);
    }
}
