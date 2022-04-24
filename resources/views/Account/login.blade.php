<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>E Store - eCommerce HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="eCommerce HTML Template Free Download" name="keywords" />
    <meta content="eCommerce HTML Template Free Download" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap"
      rel="stylesheet"
    />

    <!-- CSS Libraries -->
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <link href="{{ URL::asset('lib/slick/slick.css')}} " rel="stylesheet" />
    <link href="{{ URL::asset('lib/slick/slick-theme.css') }}" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <!-- <link href="{{ asset('css/style.css') }}" rel="stylesheet" /> -->
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
  </head>

  <body>
    <!-- Top bar Start -->
    <div class="top-bar">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <i class="fa fa-envelope"></i>
            support@email.com
          </div>
          <div class="col-sm-6">
            <i class="fa fa-phone-alt"></i>
            +012-345-6789
          </div>
        </div>
      </div>
    </div>
    <!-- Top bar End -->
    <!-- Nav Bar End -->
    <div style="height:64px">

        @if ($message = Session::get('fail'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
        @endif
    </div>
    <!-- Login Start -->
    <div class="login ">
      <div class="container-fluid ">
        <div class="row">
          <div class="col-lg-6 mx-auto mt-5">
            <div class="login-form">
            <form action="/login/check" method="post" id="login__form">
            {{ csrf_field() }}
              <div class="row">
                    <div class="col-md-12 ">
                    <label>E-mail / Username</label>
                    <input
                        class="form-control"
                        type="text"
                        placeholder="E-mail / Username"
                        id="email" name="email"
                        
                    />
                    </div>
                    <div class="col-md-12">
                    <label>Password</label>
                    <input
                        class="form-control"
                        type="text"
                        placeholder="Password"
                        id="password" name="password"
                    />
                    </div>
                    <div class="col-md-12">
                    <div class="custom-control custom-checkbox">
                        <input
                        type="checkbox"
                        class="custom-control-input"
                        id="newaccount"
                        />
                        <label class="custom-control-label" for="newaccount"
                        >Keep me signed in</label
                        >
                    </div>
                    </div>
                    <div class="col-md-12 text-right">
                    <button type="button"class="btn" id="submit__login" onclick="login()">Submit</button>
                    </div>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Login End -->
    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="js/registor.js"></script>
  </body>
</html>
