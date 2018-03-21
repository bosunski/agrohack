<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class SearchController extends Controller
{
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function find(Request $request)
    {
        $data = (object)$request->all();
        $type = $data->user_type;
        $query = $data->query;

        $users = $this->user->search($query, $type);
        $vdata['contacts'] = $users;

        return view('dashboard.search-result', $vdata);
    }
}
