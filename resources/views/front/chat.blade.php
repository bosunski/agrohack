

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
  <!--Main CSS-->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">



</head>

<body>
   <!--  
    <div class="row header-1">
        <div class="col-12 col-md-3 "> 
            <img src="../img/logo.png" class="img-fluid " width="100%">
        </div>
    
        <div class="col-12 col-md-3 text-center d-flex"> 
            <i class="fa fa-map-marker-alt text-primary pt-3"></i>
            <div>
                <p class="mb-0 pb-0">11, Elekahia Road,</p>
                <p class="mb-0 pb-0 pr-4">Port Harcourt</p>
                <span class="mt-0 pt-0 pl-3"><em class="text-primary">or find agent near you</em></span>
            </div>
        </div>

        <div class="col-12 col-md-3 text-center d-flex"> 
            <i class="fa fa-info text-primary pt-3 mr-4"></i>
            <div>
                <p class="mb-0 pb-0">info@openfarm.com.ng</p>
                <p class="mb-0 pb-0 pr-4">+234 809 773 7457</p>
            </div>
        </div>

        <div class="col-12 col-md-3 text-right"> 
            <button type="button" class="btn btn-primary btn-lg" style="width: 70%;"><span class="login-btn-text">LOGOUT</span></button>
        </div>
    
    </div>
 -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary my-0 nav-2">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" width="20%" >
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse header-no-auth " id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item mr-4 active">
            <a class="nav-link text-white nav-link-bold" href="#">HOME <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link text-white nav-link-bold" href="#">DASHBOARD</a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link text-white nav-link-bold" href="#">FUNDING</a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link text-white nav-link-bold" href="#">TRAINING</a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link text-white nav-link-bold" href="#">NEWS</a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link text-white nav-link-bold" href="#">STORAGE FACILITIES</a>
          </li>

          <li class="nav-item mr-4 btn-toggle d-flex justify-content-center">      
            <button type="button" class="btn btn-primary-toggle btn-lg rounded-0"><span class="login-btn-text">LOGOUT</span></button>
          </li>
        </ul>
        <form class="form-inline my-0 my-lg-0  mx-0 ">
          <input class="form-control form-control-lg border-0 rounded-0 text-white bg-deep-blue" type="search" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;search for produce/farmer &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#x1F50D;" size="45">
        </form>
      </div>
    </nav>

    <!-- MAIN -->
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar" class="sidebar px-4">
            <p class="text-right date">Sunday <span class="font-weight-bold">August 9, 2018</span></p>

                      <div class="d-flex">
                        <i class="fa fa-cloud text-white f-2 mt-4 mr-auto"></i>
                        <span class="f-4">27</span>
                        <span class="fa fa-genderless f-1 mt-3"></span>
                      </div>

                      <p class=" side-text-1">It will be sunny today. See recommended best farm practice for different crops today.<span class="font-weight-bold em text-primary " id="read-more">Read more</span></p>
                      
                      <div class="api">
                        <div>
                          <header>TEMPERATURE</header>
                          <div class="d-flex">

                            <div class="d-flex mr-auto">
                              <p class="mr-2">High</p>
                              <p class="mr-1 rate">46</p>
                              <span class="fa fa-genderless f-half"></span>
                            </div>

                             <div class="d-flex">
                              <p class="mr-2">Low</p>
                              <p class="mr-1 rate text-primary">30</p>
                              <span class="fa fa-genderless f-half text-primary"></span>
                            </div>
                          </div>
                        </div>

                        <div>
                          <header>HUMIDITY</header>
                          <div class="d-flex">

                            <div class="d-flex mr-auto">
                              <p class="mr-2">Rising</p>
                              <p class="mr-1 rate">87%</p>
                              <!-- <span class="fa fa-genderless f-half"></span> -->
                            </div>

                             <!-- <div class="d-flex">
                              <p class="mr-2">Low</p>
                              <p class="mr-1 text-primary">30</p>
                              <span class="fa fa-genderless f-half text-primary"></span>
                            </div> -->
                          </div>
                        </div>

                        <div>
                          <header>PRESSURE</header>
                          <div class="d-flex">

                            <div class="d-flex mr-auto">
                              <p class="mr-2">High</p>
                              <p class="mr-1 rate">30.90</p>
                              <!-- <span class="fa fa-genderless f-half"></span> -->
                            </div>

                             <div class="d-flex">
                              <p class="mr-2">Current</p>
                              <p class="mr-1 rate text-primary">30.29</p>
                              <!-- <span class="fa fa-genderless f-half text-primary"></span> -->
                            </div>
                          </div>
                        </div>

                        <div>
                          <header>RAINFALL</header>
                          <div class="d-flex">

                            <div class="d-flex mr-auto">
                              <p class="mr-2">Cummul.</p>
                              <p class="mr-1 rate">0"</p>
                              <!-- <span class="fa fa-genderless f-half"></span> -->
                            </div>

                             <div class="d-flex">
                              <p class="mr-2">Current</p>
                              <p class="mr-1 rate text-primary">0"</p>
                              <!-- <span class="fa fa-genderless f-half text-primary"></span> -->
                            </div>
                          </div>
                        </div>

                        <div>
                          <header>WIND SPEED</header>
                          <div class="d-flex">

                            <div class=" mr-auto">
                              <p class="mr-2 mb-0 pb-0 mt-2">AVG</p>
                              <p class="mr-1 rate my-0 py-0">3</p>
                              <p class="mr-1 rate my-0 py-0">3 mph</p>
                              <!-- <span class="fa fa-genderless f-half"></span> -->
                            </div>
                            
                            <div class="mr-auto">
                              <p class="mr-2 my-1">&nbsp;</p>
                              <p class="mr-1 rate text-primary my-0 py-0">&nbsp;</p>
                              <div class="d-flex">
                                <p class="mr-1 rate">315</p>
                                <span class="fa fa-genderless f-half "></span>
                              </div>
                            </div>

                             <div class="">
                              <p class="mr-2 mb-0 pb-0 mt-2">GUST</p>
                              <p class="mr-1 rate text-primary my-0 py-0">5</p>
                              <p class="mr-1 rate text-primary my-0 py-0">NW</p>
                              <!-- <span class="fa fa-genderless f-half text-primary"></span> -->
                            </div>
                          </div>
                        </div>


                      </div>
        </nav>
      
        <!-- Page Content Holder -->

       
        <div id="content">
              <button type="button" id="sidebarCollapse" class="btn bg-transparent border-0 rounded-0 btn-cut">
                  <i class="fa fa-cut icons"></i>
                  <i class="fa fa-bars icons" style="display: none;"></i>
                  <span></span>
              </button>
          </div> 
              <!-- ONLY EDIT CODE BELOW THIS LINE -->
        
        <div class="row">

          <div class="col-12 col-md-8">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Chat with Farmers</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Notification</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Chat With Doctors</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam nibh. Nunc varius facilisis eros. Sed erat. In in velit quis arcu ornare laoreet. Curabitur adipiscing luctus massa. Integer ut purus ac augue commodo commodo. Nunc nec mi eu justo tempor consectetuer.</div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam nibh. Nunc varius facilisis eros. Sed erat. In in velit quis arcu ornare laoreet. Curabitur adipiscing luctus massa. Integer ut purus ac augue commodo commodo. Nunc nec mi eu justo tempor consectetuer.</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam nibh. Nunc varius facilisis eros. Sed erat. In in velit quis arcu ornare laoreet. Curabitur adipiscing luctus massa. Integer ut purus ac augue commodo commodo. Nunc nec mi eu justo tempor consectetuer.</div>
</div>

          </div>


           <div class="col-12 col-md-4 profile-div px-5 pb-5 pt-2 border-left">

           <div class="d-flex">
             <h4 class="text-center mr-auto">EDIT MY PROFILE</h4>
             <span class="text-right btn bg-transparent btn-close"  style="cursor: pointer;">X</span>
           </div>

             <div class="signupcontent mt-5">
                <div class="profile-img border text-center py-3">
              <img src="/img/profile-pic.svg" alt="profile pics" srcset="">
            </div>     
            <form class="form">
              <div class="form-group  mb-3">          
                <input type="text" class="form-control  border-top-0 border-left-0 border-right-0 rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name">
              </div>

              <div class="form-group  mb-3">          
                <input type="text" class="form-control  border-top-0 border-left-0 border-right-0 rounded-0" id="exampleInputPassword1" placeholder="Middle Name">
              </div>
            
              <div class="form-group   mb-3">          
                <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" id="exampleInputPassword1" placeholder="Last Name">
              </div>

              <!-- <label class="mr-sm-2" for="inlineFormCustomSelect"></label> -->
              <select class="custom-select border-top-0 border-left-0 border-right-0 rounded-0 mb-3" id="inlineFormCustomSelect">
                <option selected>Gender</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
                
              </select>
            
              <div class="form-group mb-3">          
                <input type="text" class="form-control  border-top-0 border-left-0 border-right-0 rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Address /Location">
              </div>

              <select class="custom-select  border-top-0 border-left-0 border-right-0 rounded-0mb-3" id="inlineFormCustomSelect" name="state" id="state">
                  <option value="" selected="selected">State</option>
                  <option value="Abuja FCT">Abuja FCT</option>
                  <option value="Abia">Abia</option>
                  <option value="Adamawa">Adamawa</option>
                  <option value="Akwa Ibom">Akwa Ibom</option>
                  <option value="Anambra">Anambra</option>
                  <option value="Bauchi">Bauchi</option>
                  <option value="Bayelsa">Bayelsa</option>
                  <option value="Benue">Benue</option>
                  <option value="Borno">Borno</option>
                  <option value="Cross River">Cross River</option>
                  <option value="Delta">Delta</option>
                  <option value="Ebonyi">Ebonyi</option>
                  <option value="Edo">Edo</option>
                  <option value="Ekiti">Ekiti</option>
                  <option value="Enugu">Enugu</option>
                  <option value="Gombe">Gombe</option>
                  <option value="Imo">Imo</option>
                  <option value="Jigawa">Jigawa</option>
                  <option value="Kaduna">Kaduna</option>
                  <option value="Kano">Kano</option>
                  <option value="Katsina">Katsina</option>
                  <option value="Kebbi">Kebbi</option>
                  <option value="Kogi">Kogi</option>
                  <option value="Kwara">Kwara</option>
                  <option value="Lagos">Lagos</option>
                  <option value="Nassarawa">Nassarawa</option>
                  <option value="Niger">Niger</option>
                  <option value="Ogun">Ogun</option>
                  <option value="Ondo">Ondo</option>
                  <option value="Osun">Osun</option>
                  <option value="Oyo">Oyo</option>
                  <option value="Plateau">Plateau</option>
                  <option value="Rivers">Rivers</option>
                  <option value="Sokoto">Sokoto</option>
                  <option value="Taraba">Taraba</option>
                  <option value="Yobe">Yobe</option>
                  <option value="Zamfara">Zamfara</option>
                  <option value="Outside Nigeria">Outside Nigeria</option>
                </select>
               
                 <div class="form-group mb-3">          
                <input type="number" class="form-control  border-top-0 border-left-0 border-right-0 rounded-0" id="exampleInputPassword1" placeholder="Phone number">
              </div>
            
              <div class="form-group mb-3">          
                <input type="text" class="form-control  border-top-0 border-left-0 border-right-0 rounded-0 " id="exampleInputPassword1" placeholder="Farm produce">
              </div>
          
        </div>


        </div>







    <!-- <footer>
        <p class="text-center footer-text">&copy OpenFarm 2018. All Rights Reserved</p>
    </footer> -->
</body>
  <script src="/js/jquery/jquery.min.js"></script>
  <script src="/js/bootstrap/bootstrap.min.js"></script>
  <script src="/js/items.js"></script>
  <script src="/js/sweetalert2.min.js"></script>

  <script>
    $(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $('.icons').toggle();
        });

        $('.btn-close').on('click', function (){
            $(this).parent().parent().hide();
        })
    });
  </script>
 
</script>
</html>
 