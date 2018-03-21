<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Paystack;
use App\Transaction;
use App\Repositories\ProductRepository;
use Alert;
use App\Notification;

class PaymentController extends Controller
{

    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        $data = (object) $paymentDetails['data'];
        $tr = new Transaction;

        if($data->status == 'success')
        {
            $product = $this->product->getProduct($data->metadata['product_id']);
            $tr->user_id = $product->user_id;
            $tr->product_id   = $data->metadata['product_id'];
            $tr->shipping_address   = $data->metadata['shipping_address'];
            $tr->reference = $data->reference;
            $tr->price = $product->price;
            $tr->status = $data->status;
            $tr->save();

            $notification = new Notification;
            $notification->user_id = $product->user_id;
            $notification->type = 'user';
            $notification->title = 'Product Sale';
            $notification->message = 'Congrats, Your Product ' . $product->name .' has been paid for.';
            $notification->save();

            if($tr) {
                Alert::success('Purchased Successfully', 'Your product has been purchased and will be shipped to you soon!')->persistent('Close');
                return redirect('/marketplace');
            }
        }
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }

    public function sub(Request $request)
    {
        $request->request->add(["business_name"=> 'Bursewave']);
        $request->request->add(["settlement_bank"=> 'MFBcc']);
        $request->request->add(["account_number"=> '0175045063']);
        $request->request->add(["percentage_charge" => 1.2]);
        $request->request->add(["primary_contact_email"=> 'bosunski@gmail.com']);
        $request->request->add(["primary_contact_name"=> 'Bosun Egberinde']);
        $request->request->add(["primary_contact_phone"=> '08169545481']);
        $request->request->add(["metadata"=> json_encode(['key' => 'value'])]);
        $request->request->add(['settlement_schedule'=> 'auto']);
        return Paystack::createSubAccount();
    }
}
