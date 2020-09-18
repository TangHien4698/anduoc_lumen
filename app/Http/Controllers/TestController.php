<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class TestController extends Controller
{
    //
    public function viewHome()
    {
        return view('HTML.Home');
    }
    public function viewDetailProduct()
    {
        return view('HTML.DetailProduct');
    }
    public function viewSearch()
    {
        return view('HTML.SearchProduct');
    }
    public function viewCategory()
    {
        return view('HTML.Category');
    }
}

