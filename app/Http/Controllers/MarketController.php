<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('front.marketplace');
    }
}
