@extends('layouts.dash-layout')
@section('content')


 <div class="general-contact-div">
     @forelse ($notifications as $key => $notification)
         <div class=" contact-row pt-2 mb-0">
            <a class="read-note" id="note-{{ $key }}" href="#">{{ $notification['title'] }}</a> <span style="opacity: 0.7">{{ substr($notification['message'], 0, 100) }}</span>
          </div>
     @empty
         <h6 style="opacity: 0.7">You have no notification.</h6>
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


@section('after_scripts')
    <script>
        var notifications = {!!  json_encode($notifications) !!};
      // var btns = header.getElementsByClassName("contact-row");
      // for (var i = 0; i < btns.length; i++) {
      //   btns[i].addEventListener("click", function() {
      //     var current = document.getElementsByClassName("contact-row-active");
      //     current[0].className = current[0].className.replace(" contact-row-active", "");
      //     this.className += " contact-row-active";
      //   });
      // }

      $(document).ready(function() {
          $(".read-note").click(function(event) {
              event.preventDefault();

              var iid = $(this).attr('id');
              var key = iid.split('-')[1];

              $("#note-message").html(notifications[key].message);
              $("#note-title").html(notifications[key].tilte);

              $(".prf-boxer").hide();
              $("#note-boxer").fadeIn('fast');
          });

          $(".delete-c").click(function(event) {
              id = '#form-'+$(this).attr('id');
              swal({
                title: "Are you sure?",
                text: "Once this contact is deleted, you will not be able to recover it.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              }).then((willDelete) => {
                if (willDelete) {
                    $(id).submit();
                } else {
                  swal("Your contact is still safe.");
                }
              });
          });
      });
    </script>
@endsection
