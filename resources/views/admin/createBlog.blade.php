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
   <script src="/js/tinymce/tinymce/tinymce.min.js"></script>
    <script>
      tinymce.init({
      selector: 'textarea',  // change this value according to your HTML
      plugin: 'a_tinymce_plugin advlist autolink link image lists charmap print preview',
        
      toolbar: 'undo redo | styleselect | bold italic | link image | image',
      a_plugin_option: true,
      a_configuration_option: 400,

      image_list: [
        {title: 'My image 1', value: 'https://www.tinymce.com/my1.gif'},
        {title: 'My image 2', value: 'http://www.moxiecode.com/my2.gif'}
      ]
    });

</script>

</head>
<body class="bg-light">
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

 

  <div class="">
    <h4 class="blog-h1">Create a post</h4>
  </div>

   <div class=" d-flex justify-content-center pt-5">
           <div class="" style="width: 40%">
                <form>
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Title">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Post Type</label>
                          <select class="form-control ml-3" id="exampleFormControlSelect1" style="width:78%;">
                            <option>blog post</option>
                            <option>tutorials</option>
                            <option>...</option>
                            <option>4</option>
                            <option>5</option>
                          </select>
                        </div>
                        <fieldset class="form-group">
                          <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Body</legend>
                            <div class="col-sm-10">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                            </div>
                          </div>
                        </fieldset>
                        
                        <div class="form-group row ml-5">
                          <div class=" btn">
                            <button type="submit" class="btn btn-primary ml-5">Create Post</button>
                          </div>

                          <div class=" btn">
                            <button type="submit" class="btn btn-white border ml-5">Cancel</button>
                          </div>
                        </div>
                      </form>
             
           </div>

        


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