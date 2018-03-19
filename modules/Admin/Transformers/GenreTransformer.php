<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11/10/2017
 * Time: 3:42 PM
 */

namespace Modules\Admin\Transformers;

use App\Models\Gener;
use League\Fractal;

class GenreTransformer  extends Fractal\TransformerAbstract
{
    public function transform(Gener $genre)
    {
        return [
            'id'=>$genre->id,
            'name' =>$genre->name,
            'slug' =>$genre->slug,
        ];
    }
}