<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>

    <!-- favicon -->
  <link rel="icon" href="/img/PNG/Icon.png" sizes="16x16" type="image/png">
  <!--Bootstrap CSS -->
  <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
  <!--Font Awesome -->
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!--Main CSS-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/style.css"> 
  <link rel="stylesheet" href="/css/lol.css"> 
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
            <a class="nav-link text-white nav-link-bold" href="/training">TRAINING</a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link text-white nav-link-bold" href="/blog">NEWS</a>
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


<main>
		<div class="">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.0326191682857!2d7.461071814786891!3d9.060789093498817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e0b19a5b9cc39%3A0x75b984352035ec9c!2s53+Mambolo+St%2C+Wuse%2C+Abuja!5e0!3m2!1sen!2sng!4v1521035559982" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>

		<div class="container-fluid contact-div">
			<div class="row">
				<div class="col-12 col-md-7 ">
					<div class="container-fluid bg-lighter contact-form">
						<div class="contact-form-text mb-5">
							<p class="h6">CONTACT US</p>
							<p class="h2">Get In Touch</p>
						</div>

						<form class="form">
						  <div class="form-row">
						    <div class="form-group col-md-6">
						      <input type="email" class="form-control rounded-0" id="inputEmail4" placeholder="Name*">
						    </div>
						    <div class="form-group col-md-6">
						      <input type="password" class="form-control rounded-0" id="inputPassword4" placeholder="Email*">
						    </div>
						  </div>
						  <div class="form-group">
						    <input type="text" class="form-control rounded-0" id="inputAddress" placeholder="Message type">
						  </div>
						  
						  <div class="form-row">
						    <div class="form-group col-md-12">
						     <!--  <input type="text" class="form-control rounded-0" id="inputCity"> -->

						      <textarea class="form-control rounded-0 mb-2" id="exampleFormControlTextarea1" placeholder="Message*" rows="6"></textarea>
						    </div>

						  </div>
						  <button type="submit" class="btn btn-primary btn-send rounded-0">Send</button>
						</form>
					</div>
				</div>


				<div class="col-12 col-md-5">
					<div class="details-div">
						<div class="container-fluid bg-lighter text-center details-div-1 pb-1 mb-5">
							<i class="fa fa-map-marker-alt fa-border  rounded-circle"></i>
							<p class="h5">Location</p>
							<p class="">No 53, Mambolo Street, Wuse Zone 2,<br> Abuja, Nigeria.</p>
						</div>

						<div class="container-fluid bg-lighter text-center details-div-1 pb-3 mb-5">
							<i class="fa fa-envelope fa-border  rounded-circle"></i>
							<p class="h5">Email</p>
							<p class="">info@openfarm.com.ng</p>
						</div>

						<div class="container-fluid bg-lighter text-center details-div-1 pb-3">
							<i class="fa fa-phone fa-border  rounded-circle"></i>
							<p class="h5">Phone</p>
							<p class="">+23490 5555 3302,  +23470 1555 5938</p>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>
		

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