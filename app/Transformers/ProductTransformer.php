<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/17/2017
 * Time: 5:49 PM
 */

namespace App\Transformers;

use App\Product;
use App\Category;

use League\Fractal;

class ProductTransformer extends Fractal\TransformerAbstract
{
    public function transform(Product $product)
    {
        return [
            'id'            =>    $product->id,
            'name'          =>    $product->name,
            'price'         =>    $product->price,
            'picture'       =>    $product->picture,
            'category'      =>    $this->getCategory($product->category_id),
        ];
    }

    private function getCategory($id)
    {
        return Category::where('id', $id)->first();
    }
}
