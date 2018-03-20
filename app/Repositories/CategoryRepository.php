<?php

namespace App\Repositories;

use Modules\Concession\Models\Category;
use File;
class CategoryRepository extends BaseRepository
{
    public function create($data)
    {
        return Category::create([
            'id'            =>    $this->generateUuid(),
            'name'          =>    $data->name,
            'description'   =>    $data->picture,
        ]);
    }

    public function getAllCategories()
    {
        return Category::all();
    }

    public function list($perpage = 10)
    {
        return Category::paginate($perpage);
    }

    public function update($category_id, $data)
    {
        $update['name'] = $data['name'];
        $update['description'] = $data['description'];

        return Category::where('id', $category_id)->update($update);
    }

    public function delete($category_id)
    {
        $done = Category::where('id', $category_id)->delete();
        return true;
    }

    public function getCategory($category_id)
    {
        return Category::where('id', $category_id)->paginate();
    }
}
