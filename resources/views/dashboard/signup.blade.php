
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign Up</title>

  <!-- favicon -->
  <link rel="icon" href="/img/PNG/Icon.png" sizes="16x16" type="image/png">
  <!--Bootstrap CSS -->
  <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
  <!--Font Awesome -->
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!--Main CSS-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link rel="stylesheet" href="/css/main.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-0 col-md-3">

      </div>

      <div class=" col-12 col-md-6">
        <div class="logo-banner mt-4 text-center">
          <img src="/img/logo.png" alt="Logo" srcset="">
          <h5 class="signupheader text-center mt-1 pb-5 bold">
            CREATE FARMERS PROFILE
          </h3>
        </div>

        <div class="signupcontent mt-5">
            <div class="profile-img border text-center pt-2 pb-1">
                <span class="profile-imgtext">Click to change.</span>
                <img id="prv-image" src="/img/profile-pic.svg" alt="profile pics" srcset="">
            </div>
            <form action="/register" method="post" class="form">
              <label class="mr-sm-2" for="inlineFormCustomSelect">Business Category</label>
              <select selected="{{ old('business_category') }}" required name="business_category" class="rounded-0 {{ $errors->has('business_category') ? ' is-invalid' : '' }} custom-select border-top-0 border-left-0 border-right-0 mb-3 profile-form" required id="inlineFormCustomSelect">
                <option value="">Choose Category</option>
                <option value="Poultry">Poultry</option>
                <option value="Foodstuff">Foodstuffs</option>
                <option value="Animals">Animals</option>
                <option value="Crops">Crops</option>
              </select>
              @if ($errors->has('business_category'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('business_category') }}</strong>
                  </span>
              @endif

              <div class="form-group mb-3">
                <input value="{{ old('name') }}" name="name" type="text" class="rounded-0 profile-form form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
              </div>

              <label class="mr-sm-2" for="inlineFormCustomSelect">Who Are You?</label>
              <select selected="{{ old('user_type') }}" required name="user_type" class="rounded-0 profile-form {{ $errors->has('user_type') ? ' is-invalid' : '' }} custom-select border-top-0 border-left-0 border-right-0 mb-3" id="inlineFormCustomSelect">
                <option value="">Select</option>
                <option value="farmer">Farmer</option>
                <option value="investor">Investor</option>
                <option value="doctor">Doctor</option>
                <option value="buyer">Buyer</option>
              </select>

              @if ($errors->has('user_type'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('user_type') }}</strong>
                  </span>
              @endif

              <div class="form-group mb-3">
                <input value="{{ old('email') }}" name="email" type="email" class="form-control  profile-form rounded-0{{ $errors->has('email') ? ' is-invalid' : '' }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>

              <div class="form-group mb-3">
                <input name="password" type="password" class="form-control profile-form rounded-0{{ $errors->has('password') ? ' is-invalid' : '' }}" id="exampleInputPassword1" placeholder="Password">

                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
             </div>

              <div class="form-group mb-3">
                <input name="password_confirmation" type="password" class="form-control profile-form rounded-0{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" id="exampleInputPassword1" placeholder="Password Again">

                @if ($errors->has('password_confirmation'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
              </div>

              <select selected="{{ old('state') }}" name="state" class="rounded-0 profile-form custom-select border-top-0 border-left-0 border-right-0 mb-3" id="inlineFormCustomSelect" name="state" id="state" required>
                  <option >State</option>
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
                  <option value="Outside Nigeria">Outside Nigeria</option>
                </select>

                @if ($errors->has('state'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('state') }}</strong>
                    </span>
                @endif
            <div class="form-group mb-3">
              <input value="{{ old('location') }}" name="location" type="text" class="form-control profile-form rounded-0 {{ $errors->has('location') ? ' is-invalid' : '' }}" id="exampleInputPassword1" placeholder="Location">

              @if ($errors->has('location'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('location') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group mb-3">
              <select selected="{{ old('gender') }}" required name="gender" class="rounded-0 profile-form {{ $errors->has('gender') ? ' is-invalid' : '' }} custom-select border-top-0 border-left-0 border-right-0 mb-3" id="inlineFormCustomSelect" name="state" id="state">
                  <option value="">Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
              </select>

              @if ($errors->has('gender'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('gender') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group mb-3">
              <input value="{{ old('phone') }}" name="phone" type="number" class="rounded-0 profile-form form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" id="exampleInputPassword1" placeholder="Phone">

              @if ($errors->has('phone'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('phone') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group mb-3">
              <input style="display:none;" name="picture" type="file" class="rounded-0 profile-form form-control" id="picture" placeholder="Phone">
            </div>

              <p class="login-text mb-3 text-justify">By clicking Register, You are indicating that you have read and agreed to the <a href="" class="terms">terms and conditions</a> of this service


              <div class="row ">
                  <button type="submit" class="btn btn-default col-xs-4 col-md-4 mr-auto sm-btn">No,thanks!</button>
                  <button type="submit" class="btn btn-primary col-xs-4 col-md-4">Register</button>
              </div>

              @csrf
            </form>
            </div>
          </div>

        </div>
          </div>

          <div class="col-0 col-md-3">

          </div>
    </div>

  </div>


  <script src="/js/jquery/jquery.min.js"></script>
  <script src="/js/botstrap/bootstrap.min.js"></script>
  <script src="/js/items.js"></script>
  <script src="/js/sweetalert2.min.js"></script>
  <script type="text/javascript">
      $("#prv-image").click(function() {
          $("#picture").click();
      });

      $("#picture").change(function(e) {
          var fileReader = new FileReader();
          fileReader.readAsDataURL(e.target.files[0])
          fileReader.onload = (e) => {
              $("#prv-image").attr('src', e.target.result);
              $("#picture").val(e.target.result);
          }
      })
  </script>

</body>
</html>
