@extends('layouts.dash-layout')

@section('content')

    <div class="p-5">
        <div class="d-flex justify-content-end">
             <button type="button" id="add-product" class="btn btn-primary pull-right text-center" name="button">Add Product</button>
        </div>
      <p class="h3 mb-4"> <span class="font-weight-bold">Showcase and Sell</span></p>


          <!-- <div class="card-div bg-light"> -->
            <!-- <div class="row">
              <div></div>
            </div> -->
            <div class="card-deck text-center " style="height: 250px">
            @forelse ($products as $key => $product)
                  <div class="card about-card pt-5 pb-1 rounded-0" style="width: 15rem">
                    <div class="row">
                        <div class="img-div d-flex justify-content-center mx-auto">
                          <img class="img-responsive img-fluid text-center img-icon" src="/img/products/{{ $product->picture }}" alt="Card image cap" height="50px">
                        </div>
                    </div>
                    <div class="row">
                        <div class="card-body mb-0 pb-0">
                          <h5 class="card-title h4 mb-0 pb-0">{{ $product->name }}</h5>
                          <form id="form-{{ $product->id }}" action="{{ route('delete-product', $product->id) }}" method="post">
                              @csrf
                              <button id="{{ $product->id }}"type="submit" class="del-product btn btn-sm btn-danger" name="button">Delete</button>
                              <button id="{{ $product->id }}"type="submit" class="ed-product btn btn-sm btn-primary" name="button">Edit</button>
                          </form>
                        </div>
                    </div>
                 </div>

            @empty
                <h3>You don't have any product added, click the button up there to add products.</h3>
            @endforelse
            </div>
             <!-- <div class="card about-card pt-5 pb-1 rounded-0" style="width: 15rem">
                <div class="img-div d-flex justify-content-center mx-auto">
                  <img class="img-responsive img-fluid text-center img-icon" src="/img/maize.jpg" alt="Card image cap" height="50px">
                </div>
                <div class="card-body mb-0 pb-0">
                  <h5 class="card-title h4 mb-0 pb-0">MAIZE</h5>
                  </div>
              </div>
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

@section('after_scripts')
    <script type="text/javascript">
        $(function() {
            $(".del-product").click(function(e) {
                e.preventDefault();
                var button = $(this);
                swal({
                  title: "Are you sure?",
                  text: "Once deleted, you will not be able to recover this product.",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                }).then((willDelete) => {
                  if (willDelete) {
                      var id = '#form-' + button.attr('id');
                      $(id).submit();
                  } else {
                    swal("Your product is still safe.");
                  }
                });

            });


            $(".ed-product").click(function(event) {
                event.preventDefault();
                var button = $(this);
                $.get("/product/"+button.attr('id'), function(response) {
                    $("#p-name").val(response.name);
                    $("#p-price").val(response.price);
                    $("#p-description").val(response.description);

                    $("#newProductModal").modal();
                    $("#product-form").attr('action', '/product/update/'+button.attr('id'));
                });
            });


            $("#add-product").click(function(event) {
                event.preventDefault();
                var button = $(this);
                $("#product-form").attr('action', '{{ route('create-product') }}');
                $('#newProductModal').modal();
            });
        });



    </script>
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
