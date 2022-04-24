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

    <!-- Nav Bar Start -->
    <div class="nav">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
          <a href="#" class="navbar-brand">MENU</a>
          <button
            type="button"
            class="navbar-toggler"
            data-toggle="collapse"
            data-target="#navbarCollapse"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div
            class="collapse navbar-collapse justify-content-between"
            id="navbarCollapse"
          >
            <div class="navbar-nav mr-auto">
              <a href="{{route('home',$user->id)}}" class="nav-item nav-link active">Trang Chủ</a>
              <a href="{{route('home.products',$user->id)}}" class="nav-item nav-link">Sản Phẩm</a>
              <div class="nav-item dropdown">
                  <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Người Dùng</a>
                  <div class="dropdown-menu">
                      <a href="{{route('account.changeinformation',$user->id)}}" class="dropdown-item">thông tin cá nhân</a>
                      <a href="{{route('login')}}" class="dropdown-item">tài khoản khác</a>
                  </div>
              </div>
              <a href="{{route('home.contact',$user->id)}}" class="nav-item nav-link">Liên hệ</a>
            </div>
            <div class="navbar-nav ml-auto">
              <div class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{$user->fullname}}</a>
                  <div class="dropdown-menu">
                      <a href="{{route('login')}}" class="dropdown-item">đăng xuất</a>
                  </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <!-- Nav Bar End -->


    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap mt-">
      <div class="container-fluid">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Products</a></li>
          <li class="breadcrumb-item active">Register</li>
        </ul>
      </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Login Start -->
    <div class="login">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <form action="{{route('account.updateInformation',$id)}}" method="post" id="resgistorForm">
            {{ csrf_field() }}
              <div class="register-form">
                <div class="row">
                  <div class="col-md-6">
                    <label>full Name</label>
                    <input name="fullname" id="fullname"
                      class="form-control"
                      type="text"
                      placeholder="full Name"
                      value="{{$user->fullname}}"
                    />
                  </div>
                  <div class="col-md-6">
                    <label>E-mail</label>
                    <input name="email" id="email"
                      class="form-control"
                      type="text"
                      value="{{$user->email}}"
                      placeholder="E-mail"
                    />
                  </div>
                  <div class="col-md-6">
                    <label>Mobile No</label>
                    <input name="mobile" id="mobile"
                      class="form-control"
                      type="text"
                      placeholder="Mobile No"
                      value="{{$user->mobile}}"
                    />
                  </div>
                  <div class="col-md-6">
                    <label>address</label>
                    <input name="address" id="address"
                      class="form-control"
                      type="text"
                      placeholder="address"
                      value="{{$user->address}}"
                    />
                  </div>
                  <div class="col-md-6">
                    <label>Password</label>
                    <input name="password" id="password"
                      class="form-control"
                      type="text"
                      placeholder="Password"
                      value="{{$user->password}}"
                    />
                  </div>
                  <div class="col-md-6">
                    <label>Retype Password</label>
                    <input name="repassword" id="repassword"
                      class="form-control"
                      type="text"
                      placeholder="Password"
                      value="{{$user->password}}"
                    />
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class="btn" id="button__submit" >Thay đổi</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Login End -->

    <!-- Footer Start -->
    <div class="footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="footer-widget">
              <h2>Get in Touch</h2>
              <div class="contact-info">
                <p>
                  <i class="fa fa-map-marker"></i>123 E Store, Los Angeles, USA
                </p>
                <p><i class="fa fa-envelope"></i>email@example.com</p>
                <p><i class="fa fa-phone"></i>+123-456-7890</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="footer-widget">
              <h2>Follow Us</h2>
              <div class="contact-info">
                <div class="social">
                  <a href=""><i class="fab fa-twitter"></i></a>
                  <a href=""><i class="fab fa-facebook-f"></i></a>
                  <a href=""><i class="fab fa-linkedin-in"></i></a>
                  <a href=""><i class="fab fa-instagram"></i></a>
                  <a href=""><i class="fab fa-youtube"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="footer-widget">
              <h2>Company Info</h2>
              <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms & Condition</a></li>
              </ul>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="footer-widget">
              <h2>Purchase Info</h2>
              <ul>
                <li><a href="#">Pyament Policy</a></li>
                <li><a href="#">Shipping Policy</a></li>
                <li><a href="#">Return Policy</a></li>
              </ul>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
    <!-- Footer Bottom Start -->
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-6 copyright">
            <p>
              Copyright &copy; <a href="https://htmlcodex.com">HTML Codex</a>.
              All Rights Reserved
            </p>
          </div>

          <div class="col-md-6 template-by">
            <p>Template By <a href="https://htmlcodex.com">HTML Codex</a></p>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer Bottom End -->

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    event script
    <script src="js/registor.js"></script>
  </body>
</html>
