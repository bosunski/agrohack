<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Funding</title>

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
            <a class="nav-link text-white nav-link-bold" href="/funding">FUNDING</a>
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

    <div class="container-fluid storage-header">
        <div class="storage-search mx-auto">
            <h4 class="storage-header-text pt-5 pb-3 text-center">
                Loans And Grants
            </h4>
            <form class="form-inline">
                <select class="custom-select mb-4" id="inlineFormCustomSelect" name="search" id="Search">
                <option value="loan" selected="selected">Loans</option>
                <option value="Grants">Grant</option>
                </select>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="row mt-5 pt-5">
            <div class="col-md-1">

            </div>

            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card funding-card">
                            <a href=""><img class="card-img-top pr-1" src="../img/funding.jpg" alt="funding"></a>
                            <div class="card-body pl-0">
                                <h5 class="card-title mycardtitle"><a href="">U.S. Department of State, Bureau of DRL: Supporting Civil Society and Media in Ukraine</a></h5>
                                <p class="mycardtext">
                                    Deadline: 18 May 2018
                                    <a href="">Medium term Loan</a>
                                </p>
                                <p class="card-text">The U.S. Department of State, Bureau of Democracy, Human Rights and Labor (DRL) announces Each organization can submit up to…</p>
                                <a href="#" class="btn btn-primary">View More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card funding-card">
                            <a href=""><img class="card-img-top pr-1" src="../img/funding2.jpg" alt="funding"></a>
                            <div class="card-body pl-0">
                                <a href=""><h5 class="card-title mycardtitle">U.S. Department of State, Bureau of DRL: Supporting Civil Society and Media in Ukraine</a></h5>
                                <p class="mycardtext">
                                    Deadline: 18 May 2018
                                    <a href="">Short term Loan</a>
                                </p>
                                <p class="card-text">The U.S. Department of State, Bureau of Democracy, Human Rights and Labor (DRL) announces Each organization can submit up to…</p>
                                <a href="#" class="btn btn-primary">View More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card funding-card">
                            <a href=""><img class="card-img-top pr-1" src="../img/funding3.jpg" alt="funding"></a>
                            <div class="card-body pl-0">
                                <h5 class="card-title mycardtitle"><a href="">U.S. Department of State, Bureau of DRL: Supporting Civil Society and Media in Ukraine</a></h5>
                                <p class="mycardtext">
                                    Deadline: 18 May 2018
                                    <a href="">Long term Loan</a>
                                </p>
                                <p class="card-text"> The U.S. Department of State, Bureau of Democracy, Human Rights and Labor (DRL) announces Each organization can submit up to…</p>
                                <a href="#" class="btn btn-primary">View More</a>
                            </div>
                        </div>
                    </div>                    
                </div><br/>



                <!-- second row -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card funding-card">
                            <a href=""><img class="card-img-top pr-1" src="../img/funding.jpg" alt="funding"></a>
                            <div class="card-body pl-0">
                                <h5 class="card-title mycardtitle"><a href="">U.S. Department of State, Bureau of DRL: Supporting Civil Society and Media in Ukraine</a></h5>
                                <p class="mycardtext">
                                    Deadline: 18 May 2018
                                    <a href="">Medium term Loan</a>
                                </p>
                                <p class="card-text">The U.S. Department of State, Bureau of Democracy, Human Rights and Labor (DRL) announces Each organization can submit up to…</p>
                                <a href="#" class="btn btn-primary">View More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card funding-card" style="width: 16rem;">
                            <a href=""><img class="card-img-top pr-1" src="../img/funding2.jpg" alt="funding"></a>
                            <div class="card-body pl-0">
                                <h5 class="card-title mycardtitle"><a href="">U.S. Department of State, Bureau of DRL: Supporting Civil Society and Media in Ukraine</a></h5>
                                <p class="mycardtext">
                                    Deadline: 18 May 2018
                                    <a href="">Short term Loan</a>
                                </p>
                                <p class="card-text">The U.S. Department of State, Bureau of Democracy, Human Rights and Labor (DRL) announces Each organization can submit up to…</p>
                                <a href="#" class="btn btn-primary">View More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card funding-card" style="width: 16rem;">
                            <a href=""><img class="card-img-top pr-1" src="../img/funding3.jpg" alt="funding"></a>
                            <div class="card-body pl-0">
                                <h5 class="card-title mycardtitle"><a href="">U.S. Department of State, Bureau of DRL: Supporting Civil Society and Media in Ukraine</a></h5>
                                <p class="mycardtext">
                                    Deadline: 18 May 2018
                                    <a href="">Long term Loan</a>
                                </p>
                                <p class="card-text"> The U.S. Department of State, Bureau of Democracy, Human Rights and Labor (DRL) announces Each organization can submit up to…</p>
                                <a href="#" class="btn btn-primary">View More</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
                

                
            </div>

            <div class="col-md-1">

            </div>
        </div>
    </div>
</body>
</html>