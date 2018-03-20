

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

        <!-- ONLY EDIT CODE BELOW THIS LINE -->
        <div id="content">
              <button type="button" id="sidebarCollapse" class="btn bg-transparent border-0 rounded-0 btn-cut">
                  <i class="fa fa-cut icons"></i>
                  <i class="fa fa-bars icons" style="display: none;"></i>
                  <span></span>
              </button>
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

    });
  </script>
 
</script>
</html>
 