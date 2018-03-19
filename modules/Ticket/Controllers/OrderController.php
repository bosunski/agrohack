<?php

namespace Modules\Ticket\Controllers;

use Illuminate\Http\Request;
//Tranformers
use Modules\Ticket\Transformers\OrderTransformer;
use Modules\Ticket\Transformers\TheaterTransformer;
use Modules\Ticket\Transformers\AgencyTransformer;
//Models
use App\Models\Agency;
use App\Models\Location;
use App\Models\Theater;
use App\Models\Order;
use App\Models\User;


use Tymon\JWTAuth\JWTAuth;
use JWTAuthException;

class OrderController extends Controller
{

    private $user;
    private $jwtauth;

    public function __construct(User $user, JWTAuth $jwtauth){
      $this->jwtauth = $jwtauth;
      $this->user = $this->jwtauth->parseToken()->authenticate();
    }

    public function superAdminOrders(Request $request, OrderTransformer $transformer){
        $order_id   = $request->input('order_id', '');
        $payment_id =   $request->input('payment_id', '');
        $from       = $request->input('from', null);
        $to         = $request->input('to', null);
        $per_page   = (int)$request->input('per_page');
        $agency_ids = $request->input('agency_id', '');

        $location_ids   =   $request->input('location_id', '');
        $show_id        =   $request->input('show_id', '');
        $stage_id       =   $request->input('stage_id', '');
        $email          = $request->input('user_email', '');

        $stages         =   $stage_id == '' ? [] : explode(',', $stage_id);
        $shows          =   $show_id == '' ? [] : explode(',', $show_id);

        //for sorting
        $direction      = $request->input('direction',null);
        $ordered        = $request->input('ordered',null);

        $orders = Order::location($location_ids)
                            ->id($order_id)
                            ->show($shows)
                            ->stage($stages)
                            ->user($email)
                            ->from($from)->to($to)
                            ->agency($agency_ids)
                            ->ordered($ordered,$direction)
                            ->paymentId($payment_id);
                            //->paginate($per_page);

        if ($per_page) {
            $orders = $orders->paginate($per_page);
            return $this->response->paginator($orders, $transformer);
        }
        $orders = $orders->get();
        return $this->response->collection($orders, $transformer);
    }

    public function agencyOrders(Request $request, OrderTransformer $transformer){
        $order_id = $request->input('order_id', '');
        $payment_id = $request->input('payment_id', '');
        $agency_id = $request->input('agency_id');
        $from = $request->input('from', null);
        $to = $request->input('to', null);
        $per_page = (int)$request->input('per_page');
        $location_ids = $request->input('location_id', '');
        $theater_ids = $request->input('theater_id');
        $show_id = $request->input('show_id', '');
        $stage_id = $request->input('stage_id', '');
        $email = $request->input('user_email', '');

        $stages = $stage_id == '' ? [] : explode(',', $stage_id);
        $shows = $show_id == '' ? [] : explode(',', $show_id);
        $theater_ids = $theater_ids == '' ? [] : explode(',', $theater_ids);

        //for sorting
        $direction      = $request->input('direction',null);
        $ordered        = $request->input('ordered',null);

        $orders = Order::Where('agency_id', $agency_id)
            ->id($order_id)
            ->theaters($theater_ids)
            ->paymentId($payment_id)
            ->location($location_ids)
            ->show($shows)
            ->stage($stages)
            ->user($email)
            ->from($from)->to($to)
            ->ordered($ordered,$direction);
            //->paginate($per_page);

        if ($per_page) {
            $orders = $orders->paginate($per_page);
            return $this->response->paginator($orders, $transformer);
        }
        $orders = $orders->get();
        return $this->response->collection($orders, $transformer);
    }

    public function theaterOrders(Request $request, OrderTransformer $transformer)
    {
        $order_id = $request->input('order_id', null);
        $payment_id = $request->input('payment_id', null);
        $theater_id = $request->input('theater_id');
        $location_ids = $request->input('location_ids', '');

        $from = $request->input('from', null);
        $to = $request->input('to', null);
        $per_page = $request->input('per_page', null);

        $show_id = $request->input('show_id', '');
        $stage_id = $request->input('stage_id', '');
        $email = $request->input('user_email', '');

        $stages = $stage_id == '' ? [] : explode(',', $stage_id);
        $shows = $show_id == '' ? [] : explode(',', $show_id);

        //for sorting
        $direction = $request->input('direction', null);
        $ordered = $request->input('ordered', null);

        if ($this->user->theater_id != $theater_id) {
            abort(422, 'unauthorized_request');
        }
        if ($location_ids) {
            $location_ids = explode(",", $location_ids);
        }

        $orders = Order::with(['event'])->where('theater_id', $theater_id)
            ->id($order_id)
            ->paymentId($payment_id)
            ->location($location_ids)
            ->show($shows)
            ->stage($stages)
            ->user($email)
            ->from($from)->to($to)
            ->ordered($ordered, $direction);

        if ($per_page) {
            $orders = $orders->paginate((int)$per_page);
            return $this->response->paginator($orders, $transformer);
        }
        $orders = $orders->get();
        return $this->response->collection($orders, $transformer);

    }

    /**
     * Get user orders
     * @param $user_id $request->user_id
     */

    public function getUserOrders(Request $request, OrderTransformer $transformer,$user_id)
    {
        $from           =   $request->input('from',null);
        $to             =   $request->input('to',null);
        $per_page       =   $request->input('per_page',50);
        $orders = Order::where('user_id',$user_id)->orderBy('created_at','DESC')
                  ->from($from)->to($to)->paginate($per_page);

        return $this->response->paginator($orders, $transformer);

    }
}