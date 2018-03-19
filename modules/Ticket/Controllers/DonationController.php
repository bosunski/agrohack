<?php

namespace Modules\Ticket\Controllers;

use Illuminate\Http\Request;

use App\Models\Donation;
use App\Models\Show;
use Modules\Ticket\Transformers\DonationTransformer;

class DonationController extends Controller
{

  public function getDonations(Request $request,DonationTransformer $transformer){
    $this->validate($request, [
        'theater_id' => 'required'
    ]);
    $theater_id = $request->input('theater_id');
    $show_id = $request->input('show_id','');
    $event_ids = [];
    if($show_id){
      $show = Show::find($show_id);
      if($show){
        foreach($show->events as $event){
          $event_ids[]=$event['_id'];
        }
      }
    }
    $donations = Donation::where('theater_id',$theater_id)->event($event_ids)->paginate(200000);
    return $this->response->paginator($donations, $transformer);
  }
}