<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11/20/2017
 * Time: 10:10 PM
 */

namespace Modules\Ticket\Controllers;


use App\Models\MembershipPeriod;
use App\Transformer\MembershipPeriodTransformer ;
use Dingo\Api\Http\Request;

class MembershipPeriodsController extends Controller
{

    public function getMembershipPeriods(Request $request, MembershipPeriodTransformer $transformer)
    {
        $this->validate($request, [
            'theater_id' => 'required'
        ]);

        $theater_id = $request->input('theater_id');
        $per_page = $request->input('per_page', 10); //pagination

        $membershipPeriods = MembershipPeriod::where('theater_id', $theater_id)->paginate($per_page);

        return $this->response->paginator($membershipPeriods, $transformer);
    }

    public function createMembershipPeriod(Request $request, MembershipPeriodTransformer $transformer)
    {
        $this->validate($request, [
            'name' => 'required',
            'theater_id' => 'required',
            'agency_id' => 'required'
        ]);

        $agency_id = $request->input('agency_id');
        $theater_id = $request->input('theater_id');
        $name = $request->input('name');
        $color = $request->input('color');
        $price= $request->input('price');
        $period = $request->input('period');

        $membershipPeriod = MembershipPeriod::create([
            'agency_id' => $agency_id,
            'theater_id' => $theater_id,
            'name' => $name,
            'color' => $color,
            'period'=>$period,
            'price'=>$price
        ]);

        return $this->item($membershipPeriod, $transformer);
    }

    public function deleteMembershipPeriod($id)
    {
            MembershipPeriod::destroy($id);

            return json_encode(['status' => 'success', 'message' => 'Type Deleted']);

    }
}