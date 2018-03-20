@extends('layouts.dash-layout')
@section('content')


 <div class="general-contact-div">
     @forelse ($contacts as $key => $contact)
         <div class="row contact-row pt-2 mb-0">
            <div class="col-md-2">
              <img src="/img/profile-pic.svg"  class="img-responsive img-fluid bg-light p-1 links" width="40%;">
            </div>
            <div class="col-md-3">
              <p class="font-weight-bold links">{{ $contact->user->name }}</p>
            </div>
            <div class="col-md-2 op links">
              <p>{{ $contact->user->location }}</p>
            </div>
            <div class="col-md-5 op links" style="overflow-x:hidden;">
              {{ $contact->farmproducts ? $product->farmproducts : 'None Added' }}
            </div>
          </div>
     @empty
         <h3>You have not added anyone to your contact list. Click add above to add people to your list.</h3>
     @endforelse

    <!-- <div class="row contact-row mt-0 pt-2 mb-0 contact-row-active">
          <div class="col-md-2">
            <img src="/img/profile-pic.svg"  class="img-responsive img-fluid bg-light p-1 links" width="40%;">
          </div>
          <div class="col-md-3">
            <p class="font-weight-bold links" >Mercy Udensi</p>
          </div>
          <div class="col-md-2 op links">
            <p>Abia</p>
          </div>
          <div class="col-md-5 op links" style="overflow-x:hidden;">
            <span>Rice</span>; <span>Cassava</span>; <span>Wheat</span>;
          </div>

     </div>

     <div class="row contact-row mt-0 pt-2">
          <div class="col-md-2">
            <img src="/img/profile-pic.svg"  class="img-responsive img-fluid bg-light p-1 links" width="40%;">
          </div>
          <div class="col-md-3">
            <p class="font-weight-bold links" >Alberto  Kenzi</p>
          </div>
          <div class="col-md-2 op links">
            <p>Agbor</p>
          </div>
          <div class="col-md-5 op links" style="overflow-x:hidden;">
            Millet</span>; <span>Wheat</span>;
          </div>
     </div>-->
 </div>
@endsection


@section('after_script')
    <script>
      var btns = header.getElementsByClassName("contact-row");
      for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
          var current = document.getElementsByClassName("contact-row-active");
          current[0].className = current[0].className.replace(" contact-row-active", "");
          this.className += " contact-row-active";
        });
      }
    </script>
@endsection
