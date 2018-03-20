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
            <button type="button" class="btn btn-primary btn-lg"><span class="login-btn-text">REGISTER/LOGIN</span></button>
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
            <button type="button" class="btn btn-primary-toggle btn-lg rounded-0"><span class="login-btn-text">REGISTER/LOGIN</span></button>
          </li>
        </ul>
        <form class="form-inline my-0 my-lg-0  mx-0 ">
          <input class="form-control form-control-lg border-0 rounded-0 text-white bg-deep-blue" type="search" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;search for produce/farmer &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#x1F50D;" size="45">
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
            <form class="form-inline">
                <select class="custom-select mb-4" id="inlineFormCustomSelect" name="search" id="Search">

                </select>
            </form>
        </div>
    </div>

  <div class="">
    <p class="text-center mb-5 mt-4"> Nigeria has an annual deficit of over 60 million <br>tons of chicken meat processed from boiler valued</p>
  </div>
  <!-- blog posts -->
  <div class="">
    <div class="row bg-white card-div">
      <div class="col-12 col-md-4">
        <img src="/img/products/{{ $product->picture ? $product->picture : 'default.png' }}" class="img-fluid" alt="Responsive image">
      </div>
      <div class="col-12 col-md-4">
        <p class="date">Nov 29 2017 &nbsp;| &nbsp;<span class="name1">Okoye Chidi</span></p>
        <h3>{{ $product->name }}</h3>
        <p class="text-justify">
          <ul>
            <li style="list-style-type: none; font-weight: bold; font-size:17px; ">3 Months Old</li>
             <li style="list-style-type: none; font-weight: bold; font-size:17px; ">3 Months Old</li>
              <li style="list-style-type: none; font-weight: bold; font-size:17px; ">3 Months Old</li>
          </ul>
        </p>
        <form class="" action="{{ route('pay') }}" method="post">
            <div class="form-group">
                <input type="text" id="shipping_address" class="form-control" name="shipping_address" required>
            </div>
            @csrf
            <input type="hidden" name="email" value="bosunski@gmail.com"> {{-- required --}}
            <input type="hidden" name="orderID" value="345">
            <input type="hidden" name="amount" value="{{ $product->price * 100 }}"> {{-- required in kobo --}}
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" id="metadata" name="metadata" value="" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
            <button class="btn  read-btn btn-primary">Pay &#8358; {{ number_format($product->price) }} Now!</button>
        </form>
      </div>
    </div>



  <!-- pagination -->
  <!-- <div aria-label="">
      <ul class="pagination justify-content-center pagination-lg">
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-label="Previous">
              <span aria-hidden="true"><i class="fa fa-angle-left "></i><span>
              <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item active"><a class="page-link " href="#">1<span class="sr-only">(current)</span></a></li>
        <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
        <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true"><i class="fa fa-angle-right text-dark"></i></span>
              <span class="sr-only">Next</span>
            </a>
        </li>
      </ul>
  </div> -->


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
  <script type="text/javascript">
      $(function() {
          $("#shipping_address").keyup(function() {
              var input = $(this);
              var obj = {
                  product_id: "{{ $product->id }}",
                  shipping_address: input.val()
              };
              $("#metadata").val(JSON.stringify(obj));
          });
      });
  </script>
 </body>
</html>
