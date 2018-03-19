<?php

namespace Modules\Concession\Controllers;

use App\Models\Show;
use App\Helpers\ShowHelper;
use Illuminate\Http\Request;
use Modules\Concession\Transformers\CategoryTransformer;
use Modules\Concession\Repositories\CategoryRepository;
use App\Http\Controllers\Controller as BaseController;


class CategoryController extends BaseController
{
    public function __construct(CategoryRepository $category, CategoryTransformer $transformer)
    {
        $this->category     = $category;
        $this->transformer = $transformer;
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name'       => 'required',
            'description'    => 'required',
        ]);

        $data = (object) $request->all();
        $category = $this->category->create($data);
        if($category) return ['done'];
    }

    public function update($category_id, Request $request)
    {
        $this->validate($request, [
            'name'       => 'required',
            'description'    => 'required',
        ]);

        $data = $request->all();
        $category = $this->category->update($category_id, $data);
        if($category) return ['done'];
    }

    public function delete($category_id)
    {
        $category = $this->category->delete($category_id);
        if($category != 0) return ['done'];
    }


    public function getCategory($category_id)
    {
        $category = $this->category->getCategory($category_id);
        //return $category;
        return $this->response->paginator($category, $this->transformer);
    }


    public function list()
    {
        $categories = $this->category->list();
        //return $categories;
        return $this->response->paginator($categories, $this->transformer);
    }

    public function all()
    {
        return $this->category->getAllCategories();
    }
}
