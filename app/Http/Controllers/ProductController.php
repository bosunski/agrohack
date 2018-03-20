<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transformers\ProductTransformer;
use App\Repositories\ProductRepository;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function __construct(ProductRepository $product, ProductTransformer $transformer)
    {
        $this->product     = $product;
        $this->transformer = $transformer;
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name'             =>     'required',
            'description'      =>     'required',
            'price'            =>     'required',
            'category_id'      =>     'required'
        ]);

        $data = (object) $request->all();
        $product = $this->product->create($data);
        if($product) {
            Alert::success('Product Created!', 'Your Product has been created Successfully.')->persistent('Close');
            return redirect()->back();
        }
    }

    public function update($product_id, Request $request)
    {
        $this->validate($request, [
            'name'            =>     'required',
            'description'     =>     'required',
            'price'           =>     'required',
            'category_id'     =>     'required',
        ]);

        $data = $request->all();
        $product = $this->product->update($product_id, $data);
        if($product) {
            Alert::success('Product Updated!', 'Your Product has been updated')->persistent('Close');
            return redirect()->back();
        }
    }


    public function getProduct($product_id)
    {
        $product = $this->product->getProduct($product_id);
        $data['product'] = $product;

        //return $this->response->paginator($product, $this->transformer);
    }

    public function list($category_id = null)
    {
        $products = $this->product->list($category_id);
        $data['products'] = $products;

        //return $this->response->paginator($products, $this->transformer);
    }

    public function delete($product_id)
    {
        $product = $this->product->delete($product_id);
        if($product != 0) return ['done'];
    }

}
