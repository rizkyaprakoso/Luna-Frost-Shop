<?php

namespace App\Controllers;

class LunaFrostController extends BaseController
{
    public function index(): string
    {
        return view('users/lunafrost/index');
    }

    public function about(): string
    {
        return view('users/lunafrost/about');
    }

    public function product(): string
    {
        return view('users/lunafrost/menshirt');
    }

    public function singleproduct(): string
    {
        return view('users/lunafrost/single-product');
    }
}
