<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class MarketController extends Controller
{
    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->allProducts();

        $data['products'] = $products;

        return view('front.marketplace', $data);
    }

    public function getItem($id)
    {
        $product = $this->product->getProduct($id);
        if(!$product) abort(404);
        $data['product'] = $product;
        return view('front.marketplace-two', $data);
    }


}
