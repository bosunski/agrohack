@extends('layouts.dash-layout')
@section('content')
    <div class="card-deck text-center ">
      <div class="card about-card pt-4 pb-0 rounded-0" style="width: 15rem">
        <div class="img-div d-flex justify-content-center mx-auto">
          <img class="img-responsive img-fluid text-center img-icon" src="/img/messages.svg" alt="Card image cap" width="70px">
        </div>
        <div class="card-body">
          <h5 class="card-title h6">Messages</h5>
          </div>
      </div>
      <div class="card about-card pt-4 pb-0 rounded-0">
          <div class="img-div d-flex justify-content-center mx-auto">
            <img class="img-responsive img-fluid text-center img-icon" src="/img/notifications.svg" alt="Card image cap" style="width: 150px">
          </div>
          <div class="card-body">
            <h5 class="card-title h6">Notifications</h5>
            </div>
        </div>
      <div class="card about-card pt-4 pb-0 rounded-0">
          <div class="img-div d-flex justify-content-center mx-auto">
            <img class="img-responsive img-fluid text-center img-icon" src="/img/access-fund-icon.svg" alt="Card image cap" width="70px">
          </div>
          <div class="card-body">
            <h5 class="card-title h6">Funding</h5>
            </div>
        </div>
    </div>

    <div class="card-deck text-center mt-3 ">
      <div class="card about-card pt-4 pb-0 rounded-0">
        <div class="img-div d-flex justify-content-center mx-auto">
          <img class="img-responsive img-fluid text-center img-icon" src="/img/showcase.svg" alt="Card image cap" width="70px">
        </div>
        <div class="card-body">
          <h5 class="card-title h6">Showcase & Sell</h5>
          </div>
      </div>
      <div class="card about-card pt-4 pb-0 rounded-0">
          <div class="img-div d-flex justify-content-center mx-auto">
            <img class="img-responsive img-fluid text-center img-icon" src="/img/trainings.svg" alt="Card image cap" width="70px">
          </div>
          <div class="card-body">
            <h5 class="card-title h6">Trainings</h5>
            </div>
        </div>
      <div class="card about-card pt-4 pb-0 bg-transparent border-0">
          <!-- <div class="img-div d-flex justify-content-center mx-auto">
            <img class="img-responsive img-fluid text-center" src="img/link.svg" alt="Card image cap" width="70px">
          </div>
          <div class="card-body">
            <h5 class="card-title h1">Values</h5>
            <p class="card-text">Explore the histroy of the lorem Ipsum passage and genrate your own text using</p>
            </div> -->
        </div>
    </div>
@endsection
