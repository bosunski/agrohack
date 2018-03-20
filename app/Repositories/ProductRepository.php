<?php

namespace App\Repositories;

use App\Product;
use Auth;

use File;

class ProductRepository extends BaseRepository
{
    public function create($data)
    {
        // if ($data->picture != '') {
        //     $exploded = explode(',', $data->picture);
        //     $decoded = base64_decode($exploded[1]);
        //
        //     if(str_contains($exploded[0], 'jpeg'))
        //         $extension = 'jpg';
        //     else
        //         $extension = 'png';
        //     $filename = 'product-' . time() . "." . $extension;
        //     $destinationPath = public_path() . '/img/products/' . $filename;
        //
        //     file_put_contents($destinationPath, $decoded);
        //     $data->picture = $filename;
        //
        // }

        return Product::create([
            'id'            =>    $this->generateUuid(),
            'user_id'       =>    Auth::user()->id,
            'name'          =>    $data->name,
            'price'         =>    $data->price,
            'picture'       =>    $data->picture,
            'description'    => $data->description
        ]);
    }

    public function update($product_id, $data)
    {
        // if ($data['picture'] != '') {
        //     $exploded = explode('.', $data['picture']);
        //     $decoded = base64_decode($exploded[1]);
        //
        //     if(str_contains($exploded[0], 'jpeg'))
        //         $extension = 'jpg';
        //     else
        //         $extension = 'png';
        //     $filename = 'product-' . time() . "." . $extension;
        //     $destinationPath = public_path() . '/img/products/' . $filename;
        //
        //     file_put_contents($destinationPath, $decoded);
        //
        //     $data['picture'] = $filename;
        // }

        if($data['picture'] != '' && $data['picture'] != null) $update['picture'] = $data['picture'];

        $update['name'] = $data['name'];
        $update['description'] = $data['description'];
        $update['price'] = $data['price'];

        return Product::where('id', $product_id)->update($update);
    }

    public function list($category_id = null, $perpage = 10)
    {
        $products = Product::where('user_id', Auth::user()->id)->get();
        return $products;
    }

    public function updateProduct($product_id, $data)
    {
        $product = Product::where('id', $product_id)->update($data);
    }

    public function delete($product_id)
    {
        $product = Product::where('id', $product_id)->first();
        $picturePath = public_path() . '/img/products/' . $product['picture'];

        $done = Product::where('id', $product_id)->delete();
        if(file_exists($picturePath)) File::delete($picturePath);
        return true;
    }

    public function getProduct($product_id)
    {
        return Product::where('id', $product_id)->first();
    }
}
