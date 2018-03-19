<?php

namespace Modules\Concession\Controllers;

use Illuminate\Http\Request;
use Modules\Concession\Transformers\ProductTransformer;
use Modules\Concession\Repositories\ProductRepository;
use App\Http\Controllers\Controller as BaseController;


class ProductController extends BaseController
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
        if($product) return ['done'];
    }

    public function update($product_id, Request $request)
    {
        $this->validate($request, [
            'name'       => 'required',
            'description'    => 'required',
            'price'    => 'required',
            'category_id'    =>    'required',
        ]);

        $data = $request->all();
        $product = $this->product->update($product_id, $data);
        if($product) return ['done'];
    }


    public function getProduct($product_id)
    {
        $product = $this->product->getProduct($product_id);
        return $this->response->paginator($product, $this->transformer);
    }

    public function list($category_id = null)
    {
        $products = $this->product->list($category_id);
        return $this->response->paginator($products, $this->transformer);
    }

    public function delete($product_id)
    {
        $product = $this->product->delete($product_id);
        if($product != 0) return ['done'];
    }

}
