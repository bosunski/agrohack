<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create General Notification</title>

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
            <div class="col-md-4">

            </div>

            <div class="col-md-4">
                <div class="logo-banner mt-5 text-center">
                    <img src="/img/logo.png" alt="Logo" srcset="">
                    <h5 class="signupheader text-center mt-1 pb-5 bold">
                     SEND GENERAL NOTIFICATION
                    </h3>
                </div>

                <div class="signupcontent mt-0">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('notify') }}" method="post" class="form">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Title:</label>
                            <input name="title" type="text" class="rounded-0 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Title">

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <textarea name="message" class="form-control" placeholder="Your Message"></textarea>
                            <!--<input name="password" type="password" class="rounded-0 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="exampleInputPassword1" placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif-->
                        </div>

                        <div class="dflex justify-content-end ">
                            <button type="submit" class="btn btn-primary col-xs-4 col-md-4 sm-btn ">Post!</button>
                        </div>

                        <div>
                            <!--<p class="login-text">
                                Forgot Password?
                            </p>-
                            <p class="login-text mt-3">
                                Click <a href="{{ route('register') }}">here</a> to register
                            </p>-->
                        </div>


                    </form>
                </div>
            </div>

            <div class="col-md-4">

            </div>
        </div>
    </div>
</body>
</html>
