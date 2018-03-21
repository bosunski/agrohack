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
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/sweetalert2.css">

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

   <div class="container-fluid storage-header">
        <div class="storage-search mx-auto">
            <h4 class="storage-header-text pt-5 pb-3 text-center">
               Market Place
            </h4>
            <!-- <form class="form-inline">
                <select class="custom-select mb-4" id="inlineFormCustomSelect" name="search" id="Search">

                </select>
            </form> -->
        </div>
    </div>

  <div class="">
    <p class="text-center mb-5 mt-4"> Nigeria has an annual deficit of over 60 million <br>tons of chicken meat processed from boiler valued</p>
  </div>

  <div class="row mp2 mx-auto">

    @forelse ($products as $key => $product)
        <div class="col-md-3 mb-5">
            <div class="card" style="width: 13rem; height: 11rem;">
               <div class="card-body text-center pepper">
                <img class="mp-img" src="/img/products/{{ $product->picture ? $product->picture : 'default.png' }}" alt="Card image cap">
              </div>
            </div>
            <h5 class="card-title c-t-1">{{ $product->name }}</h5>
            <p class="card-text text-center">&#8358; {{ number_format($product->price) }}</p>
            <div class="d-flex justify-content-center">
               <a href="/market/item/{{ $product->id }}" type="submit" class="btn btn-primary col-xs-4 col-md-4 ">BUY NOW</a>
            </div>
       </div>
    @empty
        <h3>No product in the Market place. Please check back.</h3>
    @endforelse

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
  @include('sweet::alert')
 </body>
</html>
