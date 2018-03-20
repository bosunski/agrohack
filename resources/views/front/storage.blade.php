<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Storage Facilities</title>

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

    <div class="container-fluid storage-header p-4">        
        <h4 class="storage-header-text p-4 text-center">
            Find Storage Facilities Shop Closest to You
        </h4>  

        <div class="storage-search mx-auto">
            <form class="form-inline">
                <select class="custom-select mb-4" id="inlineFormCustomSelect" name="search" id="Search">
                  <option value="" selected="selected">Search</option>
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
                </select>
            </form>
        </div>

        <div class="row">

        </div>
    </div>

    <div class="container">
        <div class="content">
            <!-- Start:: Accordion -->
            <div class="row">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header pt-4 border-0" id="headingOne">
                                <div class="card-body border-0">
                                    <div class="row card-row mx-auto p-4">
                                        <div class="col-md-3">
                                            <img src="/img/funding4.jpg" class="storage-img" alt="" srcset="">
                                        </div>
                                        <div class="col-md-6">
                                            <span class="accordion_heading">Capital Self Storage - East York</span><br/>
                                            <span class="accordion_sub_heading">570-571 Riverside Drive, New York, NY, 10031<br/>
                                            7.8 miles away</span>
                                            <button class="btn btn-link pull-right icons" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">                                            </button>
                                            <p>
                                                <a href="" class="storage-link mr-3"><i class="fas fa-car 2x"></i>  Get Directions</a>
                                                <a href="" class="storage-link"><i class="fas fa-phone 2x"></i>  Call Now</a>                                                
                                            </p>                                            
                                            <p class="storage-link"> 
                                                Items Available: Barns, Fertilizers, Feed for Poultry                                          
                                            </p>                                          
                                       </div>
                                    </div><br/>

                                    <!-- second one -->

                                    <div class="row card-row mx-auto p-4">
                                        <div class="col-md-3">
                                            <img src="/img/funding4.jpg" class="storage-img" alt="" srcset="">
                                        </div>
                                        <div class="col-md-6">
                                            <span class="accordion_heading">Capital Self Storage - East York</span><br/>
                                            <span class="accordion_sub_heading">570-571 Riverside Drive, New York, NY, 10031<br/>
                                            7.8 miles away</span>
                                            <button class="btn btn-link pull-right icons" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">                                            </button>
                                            <p>
                                                <a href="" class="storage-link mr-3"><i class="fas fa-car 2x"></i>  Get Directions</a>
                                                <a href="" class="storage-link"><i class="fas fa-phone 2x"></i>  Call Now</a>                                                
                                            </p>                                            
                                            <p class="storage-link"> 
                                                Items Available: Barns, Fertilizers, Feed for Poultry                                          
                                            </p>                                
                                        </div>
                                    </div> <br/>
                                    
                                     <!-- Third one -->

                                    <div class="row card-row mx-auto p-4">
                                        <div class="col-md-3">
                                            <img src="/img/funding4.jpg" class="storage-img" alt="" srcset="">
                                        </div>
                                        <div class="col-md-6">
                                            <span class="accordion_heading">Capital Self Storage - East York</span><br/>
                                            <span class="accordion_sub_heading">570-571 Riverside Drive, New York, NY, 10031<br/>
                                            7.8 miles away</span>
                                            <button class="btn btn-link pull-right icons" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">                                            </button>
                                            <p>
                                                <a href="" class="storage-link mr-3"><i class="fas fa-car 2x"></i>  Get Directions</a>
                                                <a href="" class="storage-link"><i class="fas fa-phone 2x"></i>  Call Now</a>                                                
                                            </p>                                            
                                            <p class="storage-link"> 
                                                Items Available: Barns, Fertilizers, Feed for Poultry                                          
                                            </p>                                
                                        </div>
                                    </div>  
                                    
                                    
                                 </div>
                                 </div>
                                 
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>

  <script src="/js/jquery/jquery.min.js"></script>
  <script src="/js/botstrap/bootstrap.min.js"></script>
  <script src="/js/items.js"></script>
  <script src="/js/sweetalert2.min.js"></script>
</body>
</html>
