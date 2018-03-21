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


  <!-- Main Body -->

  <div class="container-fluid storage-header pb-3 ">
        <div class="storage-search m-auto">
            <h4 class="storage-header-text pt-5 pb-3 text-center">
                Browse The Latest Articles and News
            </h4>
            <form class="form mb-5">
                <input type="text" class="form-control mb-5 training-input"  placeholder="Search" >
            </form>
        </div>
    </div>

  <!-- <div class="row ml-3">
    
    <div class="col-12 col-md-3 mb-3">
              <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="/img/img-1.jpg" alt="Card image cap">
          <div class="card-body">
              <h5 class="card-title">Utilizing Arable Farmland</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">It takes time, money and a lot of effort to start and successfully run an agribusiness, either as a </p>
              <a href="#" class="card-link">Top Posts </a>
              <a href="#" class="card-link cl-01">Innovation</a>
            </div>
        </div>

    </div>


      <div class="col-12 col-md-3 mb-3">
              <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="/img/img-3.jpg" alt="Card image cap">
          <div class="card-body">
             <h5 class="card-title">Community Index</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="card-link">View Points</a>
              <a href="#" class="card-link">Technology</a>
            </div>
        </div>
    </div>


     <div class="col-12 col-md-3 mb-3">
              <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="/img/img-3.jpg" alt="Card image cap">
          <div class="card-body">
              <h5 class="card-title">Farming in the Niger-Delta</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="card-link">Top Posts</a>
              <a href="#" class="card-link">Population</a>
            </div>
        </div>
    </div>


    <div class="col-12 col-md-3 mb-3">
              <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="/img/img-3.jpg" alt="Card image cap">
          <div class="card-body">
             <h5 class="card-title">Utilizing various Channels</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="card-link">Curations</a>
              <a href="#" class="card-link">Investments</a>
            </div>
        </div>
    </div>



     <div class="col-12 col-md-3">
              <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="/img/img-1.jpg" alt="Card image cap">
          <div class="card-body">
              <h5 class="card-title">Utilizing Arable Farmland</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">It takes time, money and a lot of effort to start and successfully run an agribusiness, either as a </p>
              <a href="#" class="card-link">Top Posts </a>
              <a href="#" class="card-link cl-01">Innovation</a>
            </div>
        </div>

    </div>


    <div class="col-12 col-md-3 mb-3">
              <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="/img/img-4.jpg" alt="Card image cap">
          <div class="card-body">
             <h5 class="card-title">Utilizing Arable Farmland</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    </div>


     <div class="col-12 col-md-3">
              <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="/img/img-2.jpg" alt="Card image cap">
          <div class="card-body">
              <h5 class="card-title">Utilizing Arable Farmland</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="card-link">Recent</a>
              <a href="#" class="card-link">New Oil</a>
            </div>
        </div>
    </div>


    <div class="col-12 col-md-3">
              <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="/img/img-3.jpg" alt="Card image cap">
          <div class="card-body">
             <h5 class="card-title">Utilizing Arable Farmland</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="card-link">Personal</a>
              <a href="#" class="card-link">Earth</a>
            </div>
        </div>
    </div>


     <div class="col-12 col-md-3 mb-3">
              <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="/img/img-1.jpg" alt="Card image cap">
          <div class="card-body">
              <h5 class="card-title">Utilizing Arable Farmland</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">It takes time, money and a lot of effort to start and successfully run an agribusiness, either as a </p>
              <a href="#" class="card-link">Top Posts </a>
              <a href="#" class="card-link cl-01">Innovation</a>
            </div>
        </div>

    </div>


      <div class="col-12 col-md-3 mb-3">
              <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="/img/img-4.jpg" alt="Card image cap">
          <div class="card-body">
             <h5 class="card-title">Utilizing Arable Farmland</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="card-link">Personal</a>
              <a href="#" class="card-link">Harvest</a>
            </div>
        </div>
    </div>


     <div class="col-12 col-md-3 mb-3">
              <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="/img/img-1.jpg" alt="Card image cap">
          <div class="card-body">
              <h5 class="card-title">Utilizing Arable Farmland</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    </div>


    <div class="col-12 col-md-3 mb-3">
              <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="/img/img-3.jpg" alt="Card image cap">
          <div class="card-body">
             <h5 class="card-title">Utilizing Arable Farmland</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    </div>



     <div class="col-12 col-md-3">
              <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="/img/img-2.jpg" alt="Card image cap">
          <div class="card-body">
              <h5 class="card-title">Utilizing Arable Farmland</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">It takes time, money and a lot of effort to start and successfully run an agribusiness, either as a </p>
              <a href="#" class="card-link">Top Posts </a>
              <a href="#" class="card-link cl-01">Innovation</a>
            </div>
        </div>

    </div>


    <div class="col-12 col-md-3 mb-3">
              <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="/img/img-4.jpg" alt="Card image cap">
          <div class="card-body">
             <h5 class="card-title">Utilizing Arable Farmland</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    </div>


     <div class="col-12 col-md-3">
              <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="/img/img-1.jpg" alt="Card image cap">
          <div class="card-body">
              <h5 class="card-title">Utilizing Arable Farmland</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    </div>


    <div class="col-12 col-md-3">
              <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="/img/img-4.jpg" alt="Card image cap">
          <div class="card-body">
             <h5 class="card-title">Utilizing Arable Farmland</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    </div>



  </div>
 -->

 <div class="d-flex justify-content-end d-div">
        <div class="dropdown">
          <button class="btn bg-white btn-lg" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Large button &nbsp;<i class="fa fa-angle-down"></i>
          </button>
          <div class="dropdown-menu">
            <button class="dropdown-item" type="button">Action</button>
            <div class="dropdown-divider"></div>
              <button class="dropdown-item" type="button">Another action</button>
              <div class="dropdown-divider"></div>
              <button class="dropdown-item" type="button">Something else here</button>
          </div>
        </div>
      </div>
      
  <!-- blog posts -->
  <div class="">
    <div class="row bg-white card-div">
      <div class="col-12 col-md-4">
        <img src="/img/img-5.jpg" class="img-fluid" alt="Responsive image">
      </div>
      <div class="col-12 col-md-8">
        <p class="date">Nov 29 2017 &nbsp;| &nbsp;<span class="name1">Naveen Rao</span></p>
        <h3>Artificial Intelligence at the Edge</h3>
        <p class="text-justify">
          Imagine being able to… … have a camera-enabled assistant monitor your aging parents to make sure they are alert and healthy … autonomously  watch for product imperfections in factories without human interference … identify and locate lost hikers by using vision-enhanced drones to automatically send help … automatically recognize your petsitter and let him or…
        </p>
        <button class="btn btn-blue read-btn"><a href="/singleblog">Read more</a></button>
        <button class="btn btn-blue">#News</button>
      </div>
    </div>

    <div class="row bg-white card-div">
      <div class="col-12 col-md-4">
        <img src="/img/img-6.jpg" class="img-fluid" alt="Responsive image">
      </div>
      <div class="col-12 col-md-8">
        <p class="date">Nov 29 2017 &nbsp;| &nbsp;<span class="name1">Naveen Rao</span></p>
        <h3>Artificial Intelligence at the Edge</h3>
        <p class="text-justify">
          Imagine being able to… … have a camera-enabled assistant monitor your aging parents to make sure they are alert and healthy … autonomously  watch for product imperfections in factories without human interference … identify and locate lost hikers by using vision-enhanced drones to automatically send help … automatically recognize your petsitter and let him or…
        </p>
         <button class="btn btn-blue read-btn"><a href="/singleblog">Read more</a></button>
        <button class="btn btn-blue">#News</button>
      </div>
    </div>

    <div class="row bg-white card-div">
      <div class="col-12 col-md-4">
        <img src="/img/img-7.jpg" class="img-fluid" alt="Responsive image">
      </div>
      <div class="col-12 col-md-8">
        <p class="date">Nov 29 2017 &nbsp;| &nbsp;<span class="name1">Naveen Rao</span></p>
        <h3>Artificial Intelligence at the Edge</h3>
        <p class="text-justify">
          Imagine being able to… … have a camera-enabled assistant monitor your aging parents to make sure they are alert and healthy … autonomously  watch for product imperfections in factories without human interference … identify and locate lost hikers by using vision-enhanced drones to automatically send help … automatically recognize your petsitter and let him or…
        </p>
         <button class="btn btn-blue read-btn"><a href="/singleblog">Read more</a></button>
        <button class="btn btn-blue">#News</button>
      </div>
    </div>

    <div class="row bg-white card-div">
      <div class="col-12 col-md-4">
        <img src="/img/img-8.jpg" class="img-fluid" alt="Responsive image">
      </div>
      <div class="col-12 col-md-8">
        <p class="date">Nov 29 2017 &nbsp;| &nbsp;<span class="name1">Naveen Rao</span></p>
        <h3>Artificial Intelligence at the Edge</h3>
        <p class="text-justify">
          Imagine being able to… … have a camera-enabled assistant monitor your aging parents to make sure they are alert and healthy … autonomously  watch for product imperfections in factories without human interference … identify and locate lost hikers by using vision-enhanced drones to automatically send help … automatically recognize your petsitter and let him or…
        </p>
         <button class="btn btn-blue read-btn"><a href="/singleblog">Read more</a></button>
        <button class="btn btn-blue">#News</button>
      </div>
    </div>

    <div class="row bg-white card-div">
      <div class="col-12 col-md-4">
        <img src="/img/img-9.jpg" class="img-fluid" alt="Responsive image">
      </div>
      <div class="col-12 col-md-8">
        <p class="date">Nov 29 2017 &nbsp;| &nbsp;<span class="name1">Naveen Rao</span></p>
        <h3>Artificial Intelligence at the Edge</h3>
        <p class="text-justify">
          Imagine being able to… … have a camera-enabled assistant monitor your aging parents to make sure they are alert and healthy … autonomously  watch for product imperfections in factories without human interference … identify and locate lost hikers by using vision-enhanced drones to automatically send help … automatically recognize your petsitter and let him or…
        </p>
         <button class="btn btn-blue read-btn"><a href="/singleblog">Read more</a></button>
        <button class="btn btn-blue">#News</button>
      </div>
    </div>

    <div class="row bg-white card-div">
      <div class="col-12 col-md-4">
        <img src="/img/img-10.jpg" class="img-fluid" alt="Responsive image">
      </div>
      <div class="col-12 col-md-8">
        <p class="date">Nov 29 2017 &nbsp;| &nbsp;<span class="name1">Naveen Rao</span></p>
        <h3>Artificial Intelligence at the Edge</h3>
        <p class="text-justify">
          Imagine being able to… … have a camera-enabled assistant monitor your aging parents to make sure they are alert and healthy … autonomously  watch for product imperfections in factories without human interference … identify and locate lost hikers by using vision-enhanced drones to automatically send help … automatically recognize your petsitter and let him or…
        </p>
         <button class="btn btn-blue read-btn"><a href="/singleblog">Read more</a></button>
        <button class="btn btn-blue">#News</button>
      </div>
    </div>

    <div class="row bg-white card-div">
      <div class="col-12 col-md-4">
        <img src="/img/img-11.jpg" class="img-fluid" alt="Responsive image">
      </div>
      <div class="col-12 col-md-8">
        <p class="date">Nov 29 2017 &nbsp;| &nbsp;<span class="name1">Naveen Rao</span></p>
        <h3>Artificial Intelligence at the Edge</h3>
        <p class="text-justify">
          Imagine being able to… … have a camera-enabled assistant monitor your aging parents to make sure they are alert and healthy … autonomously  watch for product imperfections in factories without human interference … identify and locate lost hikers by using vision-enhanced drones to automatically send help … automatically recognize your petsitter and let him or…
        </p>
         <button class="btn btn-blue read-btn"><a href="/singleblog">Read more</a></button>
        <button class="btn btn-blue">#News</button>
      </div>
    </div>

    <div class="row bg-white card-div">
      <div class="col-12 col-md-4">
        <img src="/img/img-12.jpg" class="img-fluid" alt="Responsive image">
      </div>
      <div class="col-12 col-md-8">
        <p class="date">Nov 29 2017 &nbsp;| &nbsp;<span class="name1">Naveen Rao</span></p>
        <h3>Artificial Intelligence at the Edge</h3>
        <p class="text-justify">
          Imagine being able to… … have a camera-enabled assistant monitor your aging parents to make sure they are alert and healthy … autonomously  watch for product imperfections in factories without human interference … identify and locate lost hikers by using vision-enhanced drones to automatically send help … automatically recognize your petsitter and let him or…
        </p>
         <button class="btn btn-blue read-btn"><a href="/singleblog">Read more</a></button>
        <button class="btn btn-blue">#News</button>
      </div>
    </div>

    <div class="row bg-white card-div">
      <div class="col-12 col-md-4">
        <img src="/img/img13.jpg" class="img-fluid" alt="Responsive image">
      </div>
      <div class="col-12 col-md-8">
        <p class="date">Nov 29 2017 &nbsp;| &nbsp;<span class="name1">Naveen Rao</span></p>
        <h3>Artificial Intelligence at the Edge</h3>
        <p class="text-justify">
          Imagine being able to… … have a camera-enabled assistant monitor your aging parents to make sure they are alert and healthy … autonomously  watch for product imperfections in factories without human interference … identify and locate lost hikers by using vision-enhanced drones to automatically send help … automatically recognize your petsitter and let him or…
        </p>
         <button class="btn btn-blue read-btn"><a href="/singleblog">Read more</a></button>
        <button class="btn btn-blue">#News</button>
      </div>
    </div>

    <div class="row bg-white card-div">
      <div class="col-12 col-md-4">
        <img src="/img/img-14.jpg" class="img-fluid" alt="Responsive image">
      </div>
      <div class="col-12 col-md-8">
        <p class="date">Nov 29 2017 &nbsp;| &nbsp;<span class="name1">Naveen Rao</span></p>
        <h3>Artificial Intelligence at the Edge</h3>
        <p class="text-justify">
          Imagine being able to… … have a camera-enabled assistant monitor your aging parents to make sure they are alert and healthy … autonomously  watch for product imperfections in factories without human interference … identify and locate lost hikers by using vision-enhanced drones to automatically send help … automatically recognize your petsitter and let him or…
        </p>
        <button class="btn btn-blue read-btn"><a href="/singleblog">Read more</a></button>
        <button class="btn btn-blue">#News</button>
      </div>
    </div>
  </div>  

  <!-- pagination -->
  <div aria-label="">
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