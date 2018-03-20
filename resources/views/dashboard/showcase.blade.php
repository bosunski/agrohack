@extends('layouts.dash-layout')

@section('content')

    <div class="p-5">
        <div class="d-flex justify-content-end">
             <button type="button" data-toggle="modal" data-target="#newProductModal" class="btn btn-primary pull-right text-center" name="button">Add Product</button>
        </div>
      <p class="h3 mb-4"> <span class="font-weight-bold">Showcase and Sell</span></p>


          <!-- <div class="card-div bg-light"> -->
            <!-- <div class="row">
              <div></div>
            </div> -->
            @forelse ($products as $key => $product)
                <div class="card-deck text-center " style="height: 250px">
                  <div class="card about-card pt-5 pb-1 rounded-0" style="width: 15rem">
                    <div class="img-div d-flex justify-content-center mx-auto">
                      <img class="img-responsive img-fluid text-center img-icon" src="/img/products/{{ $product->picture }}" alt="Card image cap" height="50px">
                    </div>
                    <div class="card-body mb-0 pb-0">
                      <h5 class="card-title h4 mb-0 pb-0">{{ $product->name }}</h5>
                      <button type="button" class="btn btn-sm btn-danger" name="button">Delete</button>
                    </div>
                 </div>
            @empty
                <h3>You don't have any product added, click the button up there to add products.</h3>
            @endforelse
            <!--<div class="card-deck text-center " style="height: 250px">
              <div class="card about-card pt-5 pb-1 rounded-0" style="width: 15rem">
                <div class="img-div d-flex justify-content-center mx-auto">
                  <img class="img-responsive img-fluid text-center img-icon" src="/img/maize.jpg" alt="Card image cap" height="50px">
                </div>
                <div class="card-body mb-0 pb-0">
                  <h5 class="card-title h4 mb-0 pb-0">MAIZE</h5>
                  </div>
              </div>-->
             <!-- <div class="card about-card pt-5 pb-1 rounded-0">
                  <div class="img-div d-flex justify-content-center mx-auto">
                    <img class="img-responsive img-fluid text-center img-icon" src="/img/rice.jpg" alt="Card image cap" height="50px">
                  </div>
                  <div class="card-body mb-0 pb-0">
                    <h5 class="card-title h4 mb-0 pb-0">RICE</h5>
                    </div>
                </div>
              <div class="card about-card pt-5 pb-1 rounded-0">
                  <div class="img-div d-flex justify-content-center mx-auto">
                    <img class="img-responsive img-fluid text-center img-icon" src="/img/wheat.jpg" alt="Card image cap" height="50px">
                  </div>
                  <div class="card-body mb-0 pb-0">
                    <h5 class="card-title h4 mb-0 pb-0">WHEAT</h5>
                    </div>
                </div>
                <div class="card about-card pt-5 pb-1 rounded-0">
                  <div class="img-div d-flex justify-content-center mx-auto">
                    <img class="img-responsive img-fluid text-center img-icon" src="/img/barley.jpg" alt="Card image cap" height="50px">
                  </div>
                  <div class="card-body mb-0 pb-0">
                    <h5 class="card-title h4 mb-0 pb-0">BARLEY</h5>
                    </div>
                </div>
            </div>

            <div class="card-deck text-center mt-3 " style="height: 250px">
              <div class="card about-card pt-5 pb-1 rounded-0">
                <div class="img-div d-flex justify-content-center mx-auto">
                  <img class="img-responsive img-fluid text-center img-icon" src="/img/rice.jpg" alt="Card image cap" height="50px">
                </div>
                <div class="card-body mb-0 pb-0">
                  <h5 class="card-title h4 mb-0 pb-0">SORGHUM</h5>
                  </div>
              </div>
              <div class="card about-card pt-5 pb-1 rounded-0">
                  <div class="img-div d-flex justify-content-center mx-auto">
                    <img class="img-responsive img-fluid text-center img-icon" src="/img/millet.jpg" alt="Card image cap" height="50px">
                  </div>
                  <div class="card-body mb-0 pb-0">
                    <h5 class="card-title h4 mb-0 pb-0">MILLET</h5>
                    </div>
                </div>
              <div class="card about-card pt-5 pb-1 rounded-0">
                  <div class="img-div d-flex justify-content-center mx-auto">
                    <img class="img-responsive img-fluid text-center img-icon" src="/img/rye.jpg" alt="Card image cap" height="50px">
                  </div>
                  <div class="card-body mb-0 pb-0">
                    <h5 class="card-title h4 mb-0 pb-0">RYE</h5>
                    </div>
                </div>
                <div class="card about-card pt-5 pb-1 rounded-0">
                  <div class="img-div d-flex justify-content-center mx-auto">
                    <img class="img-responsive img-fluid text-center img-icon" src="/img/oat.jpg" alt="Card image cap" height="50px">
                  </div>
                  <div class="card-body mb-0 pb-0">
                    <h5 class="card-title h4 mb-0 pb-0">OATS</h5>
                    </div>
                </div>-->
            </div>

          <!-- </div> -->



    </div>
    @include('modal.new-product-modal')
@endsection

@if($errors->any())
    <!--<div class="alert alert-danger">

    </div>-->
    @section('after_scripts')
        <script type="text/javascript">
          $(function() {
              $('#newProductModal').modal();
          });
        </script>
    @endsection
@endif
