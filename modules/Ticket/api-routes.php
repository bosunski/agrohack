<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $groupOptions = [
        'namespace' => 'Modules\Ticket\Controllers',
        'middleware' => ['jwt.auth'],
        'prefix'=>'ticket'
    ];

    $api->group($groupOptions, function ($api) {
        
        //Order Theater Routing
        //$api->get('/theater/orders', 'OrderController@theaterOrders')->name('theater-orders');
           
        // Ticket routes
        $api->get('event/tickets/list', 'TicketController@getEventTickets')->name('event-tickets-list');
        $api->get('tickets/list', 'TicketController@getTickets')->name('ticket-list');
        $api->post('reservation/new', 'TicketController@newReservation')->name('reserve-ticket');
        $api->post('checkin', 'TicketController@scanTicket');
        // User orders Routing
        $api->post('order/pay','TicketController@payForTickets')->name('order-pay');
        $api->post('order/pos/pay','TicketController@payWithPOS')->name('order-pos-pay');
        $api->post('order/history/{user_id}','OrderController@getUserOrders')->name('order-history');
        
        $api->post('order/cancel','TicketController@cancelReservation')->name('order-cancel-reservation');
        $api->get('order/{orderId}/tickets','TicketController@getTicketsByOrder')->name('order-tickets');
        
        $api->get('donations/list','DonationController@getDonations')->name('donation-list');
        

         //Ticket Type Routing
         $api->get('ticketType/list', 'TicketTypeController@getTicketTypes')->name('ticket-type-list')->middleware('ability:ticket-type-list');
         $api->post('ticketType/create', 'TicketTypeController@createTicketType')->name('ticket-type-create')->middleware('ability:ticket-type-create');
         $api->post('ticketType/{id}/remove', 'TicketTypeController@deleteTicketType')->name('ticket-type-remove')->middleware('ability:ticket-type-remove');

         //Membership Period Routing
         $api->get('membershipPeriod/list', 'MembershipPeriodsController@getMembershipPeriods')->name('membership-periods-list')->middleware('ability:membership-periods-list');
         $api->post('membershipPeriod/create', 'MembershipPeriodsController@createMembershipPeriod')->name('membership-periods-create')->middleware('ability:membership-periods-create');
         $api->post('membershipPeriod/{id}/remove', 'MembershipPeriodsController@deleteMembershipPeriod')->name('membership-periods-remove')->middleware('ability:membership-periods-remove');

         //Package Deal Routing
         $api->get('packageDeal/list', 'PackageDealController@getPackageDeal')->name('package-deals-list')->middleware('ability:package-deals-list');
         $api->post('packageDeal/create', 'PackageDealController@createPackageDeal')->name('package-deals-create')->middleware('ability:package-deals-create');
         $api->post('packageDeal/{id}/remove', 'PackageDealController@deletePackageDeal')->name('package-deals-remove')->middleware('ability:package-deals-remove');
         //Discunt Codes Routing
         $api->get('discountCodes/list', 'DiscountCodeController@getDisocuntCodes')->name('discount-cards-create')->middleware('ability:discount-cards-create');
         $api->post('discountCodes/create', 'DiscountCodeController@createDiscountCode')->name('discount-cards-create')->middleware('ability:discount-cards-create');
         $api->post('discountCodes/{id}/remove', 'DiscountCodeController@removeDiscountCode')->name('discount-cards-remove')->middleware('ability:discount-cards-remove');
         $api->get('discountCodes/check','DiscountCodeController@checkDiscountCodeForApi')->name('discount-card-check');


         // Superadmin route
         $api->any('superadmin/orders', 'OrderController@superAdminOrders');
         $api->any('agency/orders', 'OrderController@agencyOrders')->name('agency-orders');
        $api->get('theater/orders', 'OrderController@theaterOrders')->name('theater-orders');
           
    });

    $api->version('v1', function ($api) {

        $groupOptions = [
            'namespace' => 'Modules\Ticket\Controllers',
            'middleware' => ['jwt.auth','isscaner']
        ];

        $api->group($groupOptions, function ($api) {
            //Users Routing
            $api->post('scan/ticket', 'TicketController@scanTicket');
            $api->get('ticket/getTicketByCode', 'TicketController@getTicketByCode');
        
            
        });
    });

    // Guest and auth routes
    $api->group(['namespace' => 'Modules\Ticket\Controllers'], function ($api) {        
        
        $api->post('ticket/area/reservations', 'TicketController@getReservations')->name('ticket-reservation');


    });
});