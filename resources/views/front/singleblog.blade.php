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
            <img src="../img/logo.png" class="img-fluid mt-3" width="50%" >
        </div>

        <div class="col-12 col-md-3 text-right d-flex">
            <i class="fa fa-map-marker-alt text-primary pt-3"></i>
            <div class="mt-1">
                <p class="mb-0 pb-0 index-text">11, Elekahia Road,</p>
                <p class="my-0 py-0 pr-4 index-text">Port Harcourt</p>
                <em class="mb-0 pb-0 text-primary index-text">or find agent near you</em>
            </div>
        </div>

        <div class="col-12 col-md-3 text-left d-flex">
            <i class="fa fa-info text-primary pt-4 mr-2"></i>
            <div class="mt-3 ">
                <p class="mb-0 pb-0 index-text">info@openfarm.com.ng</p>
                <p class="mb-0 pb-0 pr-2 index-text">+234 809 773 7457</p>
            </div>
        </div>

        <div class="col-12 col-md-3 text-right pt-2">
            <a href="{{ route('login') }}" class="btn btn-primary py-2 px-5"><span class="login-btn-text" >REGISTER/LOGIN</span></a>
        </div>

    </div>

    <nav class="navbar navbar-expand-lg navbar-light nav-bg my-0">
      <a class="navbar-brand" href="#">
        <img src="img/logo.svg" >
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse header-no-auth " id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item mr-4 active">
            <a class="nav-link text-white nav-link-bold" href="/index">HOME <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link text-white nav-link-bold" href="/funding">FUNDNG</a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link text-white nav-link-bold" href="/marketplace">MARKET</a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link text-white nav-link-bold" href="/blog/training">TRAINING</a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link text-white nav-link-bold" href="/blog/news">NEWS</a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link text-white nav-link-bold" href="/about-us">ABOUT US</a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link text-white nav-link-bold" href="/contact-us">CONTACT US</a>
          </li>

          <li class="nav-item mr-4 btn-toggle d-flex justify-content-center">
            <a href="{{ route('login') }}" class="btn btn-primary-toggle btn-lg rounded-0"><span class="login-btn-text">REGISTER/LOGIN</span></a>
          </li>
        </ul>
        <form class="form-inline my-0 my-lg-0  mx-0 ">
          <input class="form-control form-control-lg border-0 rounded-0 bg-deep-blue" type="search" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;search for produce/farmer &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#x1F50D;" size="45">
        </form>
      </div>
    </nav>
  <!-- End of Header -->
  <!-- Main Body -->

  <div class="">
    <div class="centered">BROWSE THE LATEST ARTICLES AND NEWS</div>
  </div>

  <div class=" mb-5 ">
    <h4 class="blog-h1">Blog</h4>
  </div>    

   <!--  <div class="first">
      <img src="/img/img-11.jpg">
     </div> -->
     <div class="text-center">
       <img src="/img/img-11.jpg" class="img-thumbnail" alt="...">
     </div>
     <div>
       <h3 class="first-1 mt-3">Everything You Need to Know About Backyard Farming</h3>
     </div>

     <div class="second">
       <p class="second-1">How does it feel to wake up on a Saturday morning and what you want for breakfast is a bowl of salad, but then you realize you would have to get up and drive all the way to the market to get the vegetables. Stressful I bet. How about waking up and having the same desire but instead of driving all the way downtown, you walk to your farm at the back of your house and get the vegetables you need. Amazing! That defines the essence of Backyard farming.</p>

       <p class="second-1">Backyard farming as used here refers to farming on a mini or micro landscape, mostly within a person’s neighborhood or backyard just for personal consumption.</p>

        <h4 class="first-1 mt-3 mb-2">Conclusion...</h4>

     <p class="second-1">It’s taking an active approach to growing crops organically within your environment as opposed to buying crops that must have been preserved with chemicals or harvested too early just for a long-lasting shelf life. It’s taking a deliberate action to grow your own fruits, vegetables and developing your personal food cycle.</p>

    <p class="second-1">To start, you would need to take some things into consideration. This includes the location, soil texture, availability of sunlight, direct access to rainfall, the amount of time you can dedicate to this and crop type.</p>
     </div>

 


  <!-- Footer
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