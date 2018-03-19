<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FundingController extends Controller
{
    public function __construct(FundingRepository $funding)
    {
        $this->funding = $funding;
    }

    public function requestFund(Request $request)
    {
        $fund = $this->funding->create($request->all());
        if($fund) {
            // Process Alert
        }
    }

    public function deleteFundingRequest($funding_id)
    {
        $done = $this->funding->deleteFunding($funding_id);
        if($done) {
            // Process Alert
        }
    }

    public function listMyRequests()
    {
        $fundings = $this->funding->list($funding_id);
        return $fundings;
    }

    public function getAllFundingRequests()
    {
        $fundings = $this->funding->all();
        return $fundings;
    }
}
