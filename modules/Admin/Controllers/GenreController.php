<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11/10/2017
 * Time: 3:41 PM
 */

namespace Modules\Admin\Controllers;

use Modules\Admin\Transformers\GenreTransformer;
use Dingo\Api\Http\Request;
use App\Models\Gener;

class GenreController extends Controller
{

    public function getGenres(Request $request, GenreTransformer $transformer)
    {
        $per_page = $request->input('per_page', 15);

        $genres = Gener::paginate($per_page);

        return $this->response->paginator($genres, $transformer);
    }

    public function createGenre(Request $request, GenreTransformer $transformer)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $name = $request->input('name');
        $slug = str_replace(' ', '_', $name);

        $genre = Gener::create([
            'name' => $name,
            'slug' => $slug,
        ]);
        return $this->item($genre, $transformer);
    }

    public function removeGenre(GenreTransformer $transformer,$id){
        $genre = Gener::find($id);
        $genre->delete();
        // TODO: change all shows types;
        return ['status' => 'success', 'message' => 'Genre Deleted'];
    }
}