<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Agrohack</title>

  <!-- favicon -->
  <!-- <link rel="icon" href="/img/PNG/Icon.png" sizes="16x16" type="image/png"> -->
  <!--Bootstrap CSS -->
  <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
  <!--Font Awesome -->
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!--Main CSS-->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <link rel="stylesheet" href="/css/custom.css">
  <link rel="stylesheet" href="/css/style.css">

</head>
<body>
  <!-- Header -->
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
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg"><span class="login-btn-text">REGISTER/LOGIN</span></a>
        </div>

    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-primary my-0">
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
            <a class="nav-link text-white nav-link-bold" href="#">FUNDNG</a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link text-white nav-link-bold" href="#">TRAINING</a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link text-white nav-link-bold" href="#">NEWS</a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link text-white nav-link-bold" href="#">ABOUT US</a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link text-white nav-link-bold" href="#">CONTACT US</a>
          </li>

          <li class="nav-item mr-4 btn-toggle d-flex justify-content-center">
            <a href="{{ route('login') }}" class="btn btn-primary-toggle btn-lg rounded-0"><span class="login-btn-text">REGISTER/LOGIN</span></a>
          </li>
        </ul>
        <form class="form-inline my-0 my-lg-0  mx-0 ">
          <input class="form-control form-control-lg border-0 rounded-0 text-white bg-deep-blue" type="search" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;search for produce/farmer &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#x1F50D;" size="45">
        </form>
      </div>
    </nav>
  <!-- End of Header -->

  <!-- Main body -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="carousel-caption d-none d-md-block">
    <h5 class="carousel-1">CONNECT WITH FARMERS,<br>FUNDING AND MARKET</h5>
    <p class="p-01">With over 10 years experience of helping</p>
    <button type="button" class="btn btn-primary btn-01">GET STARTED</button>
  </div>
      <img class="d-block w-100" src="/img/hero1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
       <div class="carousel-caption d-none d-md-block">
    <h5 class="carousel-1">CONNECT WITH FARMERS,<br>FUNDING AND MARKET</h5>
    <p class="p-01">With over 10 years experience of helping</p>
    <button type="button" class="btn btn-primary btn-01">GET STARTED</button>
  </div>
      <img class="d-block w-100" src="/img/hero1.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
       <div class="carousel-caption d-none d-md-block">
    <h5 class="carousel-1">CONNECT WITH FARMERS,<br>FUNDING AND MARKET</h5>
    <p class="p-01">With over 10 years experience of helping</p>
    <button type="button" class="btn btn-primary btn-01">GET STARTED</button>
  </div>
      <img class="d-block w-100" src="/img/hero1.jpg" alt="Third slide">
    </div>

  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<!-- End of Carousel -->

<div>
      <h4 class="head">How it Works</h4>
    </div>

 <div class="row ml-5">

  <div class="col-md-3">
        <div class="card" style="width: 13rem; height: 11rem;">
          <div class="card-body text-center mt-5">
            <img class=" " src="/img/access-fund-icon.svg" alt="Card image cap">
          </div>
        </div>
        <h5 class="card-title c-t-1">Access Funding</h5>
       <p class="card-text c-text">This is a wider card with this card has <br>even longer content than the first.</p>
  </div>


  <div class="col-md-3">
        <div class="card" style="width: 13rem; height: 11rem;">
           <div class="card-body text-center mt-5">
            <img class=" " src="/img/list-produce-icon.svg" alt="Card image cap">
          </div>
        </div>
        <h5 class="card-title c-t-1">Access Funding</h5>
       <p class="card-text c-text">This is a wider card with this card has <br>even longer content than the first.</p>
  </div>



  <div class="col-md-3">
        <div class="card" style="width: 13rem; height: 11rem;">
           <div class="card-body text-center mt-5">
            <img class=" " src="/img/access-fund-icon.svg" alt="Card image cap">
          </div>
        </div>
        <h5 class="card-title c-t-1">Access Funding</h5>
       <p class="card-text c-text">This is a wider card with this card has <br>even longer content than the first.</p>
  </div>


  <div class=" col-md-3">
        <div class="card" style="width: 13rem; height: 11rem;">
           <div class="card-body text-center mt-5">
            <img class=" " src="/img/connect-icon.svg" alt="Card image cap">
          </div>
        </div>
        <h5 class="card-title c-t-1">Access Funding</h5>
       <p class="card-text c-text">This is a wider card with this card has <br>even longer content than the first.</p>
  </div>


 </div>


 <div class="section2">
  <h4 class="text-center section2-h">We are here to help you grow</h4>
  <p class="mt-2 text-center p-0">This is a wider card with this card has </p>
   <p class="p-1 text-center">Mix and match multiple content types to create the card you need,or throw everything in there. Shown below are image styles, blocks,<br> text styles, and a list group—all wrapped in a fixed-width card.</p>
 </div>

  <div class="section3 text-center">
      <button type="button" class="btn btn-primary btn-1">SEE MORE ABOUT US</button>
  </div>

  <div class="section4">
    <h3 class="text-center section4-h">LATEST NEWS</h3>
    <p class="mt-2 text-center p-0">This is a wider card with this card has </p>

    <div class="row mt-5 ml-5">

      <div class="col-12 col-md-3">
        <p class="h-1">Are farmers Getting Adeq</p>
        <p>Growth through innovation, Rather<br> than be constrained</p>
        <img src="/img/img-1.jpg" width="80%;">
      </div>


       <div class="col-12 col-md-3">
         <p class="h-1">Low cost Fertilizer</p>
         <p>The effort vastly improved the farm-<br>ers planning and other...</p>
         <img src="/img/img-2.jpg" width="80%;">
      </div>


       <div class="col-12 col-md-3">
         <p class="h-1">The best time to Stud</p>
        <p>Supported by a robust sales froce and <br>tight cost...</p>
        <img src="/img/img-3.jpg" width="80%;">
      </div>


       <div class="col-12 col-md-3">
         <p class="h-1">Why Farmers need</p>
         <p>In particular , The Initial state of the<br>company's sale..</p>
         <img src="/img/img-4.jpg" width="80%;">
      </div>

    </div><hr>

  </div>
    <!-- Footer -->
     <footer>
        <p class="text-center footer-text mt-5">&copy OpenFarm 2018. All Rights Reserved</p>
    </footer>

   <!-- Bootstrap JS -->
  <script src="/js/jquery/jquery.min.js"></script>
  <script src="/js/bootstrap/bootstrap.min.js"></script>
  <script src="/js/items.js"></script>
  <script src="/js/sweetalert2.min.js"></script>
 </body>
</html>
