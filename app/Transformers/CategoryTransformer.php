<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/17/2017
 * Time: 5:49 PM
 */

namespace App\Transformers;

use App\Category;

use League\Fractal;

class CategoryTransformer extends Fractal\TransformerAbstract
{
    public function transform(Category $category)
    {
        return [
            'id'                => $category->id,
            'name'              => $category->name,
         ];
    }
}
