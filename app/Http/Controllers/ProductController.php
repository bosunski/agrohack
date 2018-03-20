<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transformers\ProductTransformer;
use App\Repositories\ProductRepository;
use App\Http\Controllers\Controller;
use Alert;

class ProductController extends Controller
{
    public function __construct(ProductRepository $product, ProductTransformer $transformer)
    {
        $this->product     = $product;
        $this->transformer = $transformer;
    }

    public function index()
    {
        $products = $this->product->list();

        $data['products'] = $products;
        return view('dashboard.showcase', $data);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name'             =>     'required',
            'description'      =>     'required',
            'price'            =>     'required',
            'picture'          =>     'required',
        ]);
        $picture = $request->file('picture');
        $imageName = 'product-'.time().'.'.$picture->getClientOriginalExtension();
        $picture->move(public_path('img/products'), $imageName);

        $data = (object) $request->all();
        $data->picture = $imageName;
        //dd($data->picture);

        $product = $this->product->create($data);
        if($product) {
            Alert::success('Product Created!', 'Your Product has been created Successfully.')->persistent('Close');
            return redirect()->back();
        } else {
            Alert::error('Product Created!', 'Your Product has been created Successfully.')->autoclose(3000);
            return redirect()->back();
        }
    }

    public function update($product_id, Request $request)
    {
        $this->validate($request, [
            'name'             =>     'required',
            'description'      =>     'required',
            'price'            =>     'required',
            'picture'          =>     'required',
        ]);

        $data = $request->all();
        $picture = $request->file('picture');
        if($picture) {
            $imageName = 'product-'.time().'.'.$picture->getClientOriginalExtension();
            $picture->move(public_path('img/products'), $imageName);

            // $data =  $request->all();
            $data['picture'] = $imageName;
        }

        $product = $this->product->update($product_id, $data);
        if($product) {
            Alert::success('Product Updated!', 'Your Product has been updated')->persistent('Close');
            return redirect()->back();
        }
    }


    public function getProduct($product_id)
    {
        $product = $this->product->getProduct($product_id);
        return $product;
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
        if($product != 0) {
                Alert::success('Product Deleted!', 'Your Product has been deleted')->persistent('Close');
                return redirect()->back();
        }
    }

}
