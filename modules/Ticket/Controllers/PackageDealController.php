<?php

namespace Modules\Ticket\Controllers;

use App\Models\PackageDeal;
use App\Transformer\PackageDealTransformer;
use Illuminate\Http\Request;

class PackageDealController extends Controller
{
    public function getPackageDeal(Request $request, PackageDealTransformer $transformer)
    {
        $this->validate($request, [
            'theater_id' => 'required'
        ]);

        $theater_id = $request->input('theater_id');
        $per_page = $request->input('per_page', 10); //pagination

        $packageDeal = PackageDeal::where('theater_id', $theater_id)->paginate($per_page);
        return $this->response->paginator($packageDeal, $transformer);

    }

    public function createPackageDeal(Request $request, PackageDealTransformer $transformer)
    {
        $this->validate($request, [
            'name' => 'required',
            'theater_id' => 'required',
            'agency_id' => 'required'
        ]);

        $agency_id = $request->input('agency_id');
        $theater_id = $request->input('theater_id');
        $name  = $request->input('name');
        $color = $request->input('color');
        $price = $request->input('price');
        $count = $request->input('count');

        $packageDeal = PackageDeal::create([
            'agency_id'  => $agency_id,
            'theater_id' => $theater_id,
            'name'       => $name,
            'color'      => $color,
            'price'      => $price,
            'count'      => $count,
        ]);

        return $this->item($packageDeal, $transformer);
    }

    public function deletePackageDeal($id)
    {
        PackageDeal::destroy($id);

        return json_encode(['status' => 'success', 'message' => 'Package Deal Deleted']);

    }
}