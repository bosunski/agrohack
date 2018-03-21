

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Agrohack</title>

  <!-- favicon -->
  <link rel="icon" href="/img/logo-fav.png" sizes="16x16" type="image/png">
  <!--Bootstrap CSS -->
  <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
  <!--Font Awesome -->
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

  <link rel="stylesheet" href="/css/weather/weather-icons.min.css">
  <!--Main CSS-->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/sweetalert2.css">



</head>

<body>

    <div class="row header-1">
        <div class="col-12 col-md-3 ">
            <img src="../img/logo.png" class="img-fluid mt-3" width="50%">
        </div>

        <div class="col-12 col-md-3 text-right d-flex">
            <i class="fa fa-map-marker-alt text-primary pt-3"></i>
            <div>
                <p class="mb-0 pb-0 index-text">11, Elekahia Road,</p>
                <p class="mb-0 pb-0 pr-4 index-text">Port Harcourt</p>
                <em class="text-primary mb-0 pb-0 index-text">or find agent near you</em>
            </div>
        </div>

        <div class="col-12 col-md-3 text-left d-flex">
            <i class="fa fa-info text-primary pt-3 mr-4"></i>
            <div>
                <p class="mb-0 pb-0 index-text">info@openfarm.com.ng</p>
                <p class="mb-0 pb-0 pr-2 index-text">+234 809 773 7457</p>
            </div>
        </div>
        @guest
            <div class="col-12 col-md-3 text-right">

                <a  class="btn btn-primary py-2 px-5">
                    <span class="login-btn-text">LOGIN / REGISTER</span>
                </a>
            </div>
        @else
            <div class="col-12 col-md-3 text-right">

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <button type="button" class="btn btn-primary btn-lg" style="width: 70%;" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    <span class="login-btn-text">LOGOUT</span>
                </button>
            </div>
        @endguest


    </div>


    <nav class="navbar navbar-expand-lg navbar-light nav-bg my-0 nav-2">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" width="20%" >
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse header-no-auth " id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item mr-4 active">
            <a class="nav-link text-white nav-link-bold" href="/">HOME <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link text-white nav-link-bold" href="/dashboard">DASHBOARD</a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link text-white nav-link-bold" href="/funding">FUNDING</a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link text-white nav-link-bold" href="/training">TRAINING</a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link text-white nav-link-bold" href="/news">NEWS</a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link text-white nav-link-bold" href="/storage">STORAGE FACILITIES</a>
          </li>

          <li class="nav-item mr-4 btn-toggle d-flex justify-content-center">
            <button type="button" class="btn btn-primary-toggle btn-lg rounded-0"><span class="login-btn-text">LOGOUT</span></button>
          </li>
        </ul>
        <form method="post" class="form-inline my-0 my-lg-0  mx-0" action="{{ route('find') }}">
            @csrf
          <input required name="query" class="form-control form-control-lg border-0 rounded-0 text-white bg-deep-blue" type="search" placeholder="Search for produce/farmer &#x1F50D;" size="45">
          <select required class="form-control form-control-lg border-0 rounded-0 text-white bg-deep-blue" name="user_type">
              <option value=""> Select Type </option>
              <option value="farmer">Farmer</option>
              <option value="doctor">Doctor</option>
              <option value="investor">Investor</option>
              <option value="produce">Farm produce</option>
          </select>
        </form>
      </div>
    </nav>

    <!-- MAIN -->
    <div class="wrapper">
        @if(Auth::user()->user_type != 'farmer')
            @include('partials.empty')
        @else
            @include('partials.weather')
        @endif
        <!-- Page Content Holder -->

        <!-- ONLY EDIT CODE BELOW THIS LINE -->
        <div id="content" class="content ">
            <!-- <nav class="" > -->
              <div class=" d-flex stretch pt-3 pb-0 mb-0">

                  <div class=" space">
                     <!--  <button type="button" id="sidebarCollapse" class="btn bg-transparent border-0 rounded-0 btn-cut mr-auto">
                        <i class="fa fa-cut icons" style="transform: rotateY(180deg);"></i>
                        <i class="fa fa-bars icons" style="display: none;"></i>
                      </button> -->
                  </div>

                  <div class="side-list pb-0 mb-0">
                    <div class="d-flex mr-5 pt-3">
                      <p class=" pr-0 text-right">View as:</p>
                      <button class="btn bg-transparent view-active p-0 my-0  mx-3 btn-sm">LIST</button>
                      <button class="btn bg-transparent m-0 p-0 btn-sm">CARD</button>
                    </div>

                    <div id="newContact" class=" mr-o links mr-5 text-center  mb-0 pb-0 ">
                      <!-- <i class="fa fa-user-plus f-2"></i> -->
                      <img src="/img/add-user.svg" class="img-fluid img-responsive" width="150%">
                      <p class="mb-0 pb-0">New</p>
                    </div>

                    <div id="send-report" class="mr-o mr-5 text-center links  mb-0 pb-0">
                      <!-- <i class="fa fa-file-alt f-2"></i> -->
                      <img src="/img/report.svg" class="img-fluid img-responsive" width="55%">
                      <form id="report-form" action="{{ route('report') }}" method="post">
                          @csrf
                      </form>
                      <p>Report</p>
                    </div>

                    <div  id="to-contacts" class="mr-o mr-5 text-center links mb-0 pb-0">
                      <!-- <i class="fa fa-comments f-2"></i> -->
                      <img src="/img/chats.svg" class="img-fluid img-responsive" width="120%">
                      <p>Chat</p>
                    </div>

                    <div  class="profile-eye links mr-5 text-center mb-0 pb-0">
                      <!-- <i class="fa fa-eye f-2"></i> -->
                      <img src="/img/profile-view.svg" class=" img-fluid img-responsive" width="80%">
                      <p>My Profile</p>
                    </div>
                  </div>
              </div>
            <!-- </nav> -->
          <div class="px-5 pb-0">
            <!--<p class="h3 mb-4">Welcome <span class="font-weight-bold">Gino</span></p>-->


            <div class="row bg-white" style="">

              <div class="col-12 col-md-8 mx-0 px-0">

                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a href="{{ route('contacts') }}" class="tab-shit nav-link {{ Route::current()->getName() == 'contacts' ? 'active ' : '' }}" id="home-tab" data-toggle="tab" href="{{ route('contacts') }}" role="tab" aria-controls="home" aria-selected="true">Chat</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('notifications') }}" class="tab-shit nav-link {{ Route::current()->getName() == 'notifications' ? 'active ' : '' }}" id="profile-tab" data-toggle="tab" href="{{ route('notifications') }}" role="tab" aria-controls="profile" aria-selected="false">Notification</a>
                    </li>

                  </ul>

                  <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active pt-4 bg-white" id="nav-chat" role="tabpanel" aria-labelledby="chat-tab">

                      <p class="text-center d-flex mb-0" style="opacity: 0.7; margin-top: 0%; display:none;">
                           @yield('content')

                      </p>
                    </div>

                    <div class="tab-pane fade pt-4 " id="nav-notify" role="tabpanel" aria-labelledby="notify-tab">

                      <p class="text-center d-flex mb-0" style="opacity: 0.7; margin-top: 0%; display:none;">
                           @yield('tab')
                           <!-- bfcbwfbfbsf -->

                      </p>
                    </div>

                  </div>



                    <!-- <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">

                        <a class="nav-item nav-link active" id="nav-chat-tab" data-toggle="tab" href="#nav-chat" role="tab" aria-controls="nav-chat" aria-selected="true">Home</a>
                        <a class="nav-item nav-link" id="nav-notify-tab" data-toggle="tab" href="#nav-notify" role="tab" aria-controls="nav-notify" aria-selected="false">Profile</a>

                      </div>
                    </nav>

                    <div class="tab-content" id="nav-tabContent">

                      <div class="tab-pane fade show active" id="nav-chat" role="tabpanel" aria-labelledby="nav-chat-tab">...</div>
                      <div class="tab-pane fade" id="nav-notify" role="tabpanel" aria-labelledby="nav-notify-tab">...</div>

                    </div>
 -->
              </div>


              @include('partials.profile')
            </div>


        </div>


    </div>

@include('modal.new-contact-modal')





    <!-- <footer>
        <p class="text-center footer-text">&copy OpenFarm 2018. All Rights Reserved</p>
    </footer> -->
</body>
  <script src="/js/jquery/jquery.min.js"></script>
  <script src="/js/bootstrap/bootstrap.min.js"></script>
  <script src="/js/items.js"></script>
  <script type="text/javascript" src="/js/all.js"></script>
  <script src="/js/sweetalert2.min.js"></script>

 @include('sweet::alert')
 @yield('after_scripts')

 <script type="text/javascript">
     $(document).ready(function(){
       var city = "{{ Auth::user()->location }}";
       var searchtext = "select * from weather.forecast where woeid in (select woeid from geo.places(1) where text='" + city + "') and u='c'"
       //change city variable dynamically as required
       $.getJSON("https://query.yahooapis.com/v1/public/yql?q=" + searchtext + "&format=json", function(response){
        console.log(response);

        var data = response.query.results.channel;
        var atmosphere = data.atmosphere;
        var condition = data.item.condition;
        var astronomy = data.astronomy;
        var units = data.units;
        var wind = data.item.wind;
        var forecast = data.item.forecast;
        var temp = forecast[0];

        var rising = atmosphere.rising == 0 ? 'Not Rising' : 'Rising';

        $('.w-temp-high').html(temp.high + "C");
        $('.w-temp-low').html(temp.low + "C");
        $('.w-humidity').html(atmosphere.humidity + "%");
        $('.w-pressure').html(atmosphere.pressure + units.pressure);
        $('.w-rising').html(rising);
        $('.w-text').html(condition.text);
        //$('.w-wind-angle').html(wind.direction ? wind.direction +'&deg;' : '');
        //$('.w-wind-speed').html(wind.speed + + units.speed);
       });


       var fullDate = new Date()
       console.log(fullDate);
       document.querySelector('.date').innerHTML = fullDate;
     });
 </script>
  <script>
    var auth_id = "{{ Auth::user()->id }}";
    $(document).ready(function () {

        $(".tab-shit").click(function(event) {
            event.preventDefault();
            window.location = $(this).attr('href');
        });
        $("#to-contacts").click(function(event) {
            window.location = "{{ route('contacts') }}";
        });
        var auth_id = "{{ Auth::user()->id }}";
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $('.icons').toggle();
        });

        $("#newContact").click(function() {
            $("#newContactModal").modal();
        });

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $('.icons').toggle();
        });

        $('.btn-close').on('click', function (){
            $('#profile-boxer').toggle();
        })

        $('.profile-eye').on('click', function() {
          /* Act on the event */
           $(".prf-boxer").hide();
           $('#profile-boxer').toggle();
        });

        $("#prv-image").click(function() {
            $("#picture").click();
        });

        $("#picture").change(function(e) {
            var fileReader = new FileReader();
            fileReader.readAsDataURL(e.target.files[0])
            fileReader.onload = (e) => {
                $("#prv-image").attr('src', e.target.result);
            }
        });

        $("#pr-gender").val('{{ Auth::user()->gender }}');
        $("#pr-state").val('{{ Auth::user()->state }}');




        // //Script to simulate back and forth messaging between user and account officer;
        // const msgForm = document.querySelector('.message-form');
        // const msgsArea = document.querySelector('.messages-area');
        // const typingHtml = `
        //                     <div class="received-message typing">
        //                         <p class="message received show-typing">...</p>
        //                     </div>`; //Show when a reply is being typed
        //
        // msgForm.addEventListener('submit', addMessage);
        //
        // function addMessage(e) {
        //     e.preventDefault();
        //     const msgInput = document.querySelector('.message-input');
        //     if (msgInput.value !== '') {
        //         let message = msgInput.value;
        //         let msgHtml = `
        //             <div class="sent-message text-left">
        //                 <p class="message sent">
        //                          ${message}
        //                 </p>
        //            </div>
        //         `;
        //         msgsArea.innerHTML += msgHtml;
        //         msgInput.value = '';
        //         simulateReply()
        //     } else {
        //         return
        //     }
        // }
        //
        // function simulateReply() {
        //     showTyping();
        //     const replies = [
        //         'Hey thank you for that message',
        //         "Just hold on we'll be with you",
        //         "What it do my nigs"
        //     ];
        //     setTimeout(() => {
        //         let num = Math.round(Math.random() * replies.length);
        //         console.log(num)
        //         let randomMessage = replies[num];
        //         let replyHtml = `
        //             <div class="received-message text-left">
        //                 <p class="message received">
        //                          ${randomMessage}
        //                 </p>
        //            </div>
        //         `;
        //         msgsArea.innerHTML += replyHtml;
        //         let msgAreaHeight = msgsArea.scrollHeight;
        //         msgsArea.scrollTop = msgAreaHeight;
        //     }, 3000)
        // }
        //
        // function showTyping() {
        //     msgsArea.innerHTML += typingHtml;
        //     let msgAreaHeight = msgsArea.scrollHeight;
        //     msgsArea.scrollTop = msgAreaHeight;
        //     setTimeout(() => {
        //         let typing = document.querySelector('.typing');
        //         typing.remove()
        //     }, 3000)
        // };

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

        $(".add-c").click(function(event) {
            id = '#form-'+$(this).attr('id');
            swal({
              title: "Are you sure?",
              text: "This person will be added to your contact list so you can chat.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            }).then((willDelete) => {
              if (willDelete) {
                  $(id).submit();
              } else {
                //swal("Your contact is still safe.");
              }
            });
        });

    });
  </script>

</script>
</html>
