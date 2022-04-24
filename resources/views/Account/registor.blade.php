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

  




    <!-- Login Start -->
    <div class="login">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <form action="registor/add" method="post" id="resgistorForm">
            {{ csrf_field() }}
              <div class="register-form">
                <div class="row">
                  <div class="col-md-6">
                    <label>full Name</label>
                    <input name="fullname" id="fullname"
                      class="form-control"
                      type="text"
                      placeholder="full Name"
                    />
                  </div>
                  <div class="col-md-6">
                    <label>E-mail</label>
                    <input name="email" id="email"
                      class="form-control"
                      type="text"
                      placeholder="E-mail"
                    />
                  </div>
                  <div class="col-md-6">
                    <label>Mobile No</label>
                    <input name="mobile" id="mobile"
                      class="form-control"
                      type="text"
                      placeholder="Mobile No"
                    />
                  </div>
                  <div class="col-md-6">
                    <label>address</label>
                    <input name="address" id="address"
                      class="form-control"
                      type="text"
                      placeholder="address"
                    />
                  </div>
                  <div class="col-md-6">
                    <label>Password</label>
                    <input name="password" id="password"
                      class="form-control"
                      type="text"
                      placeholder="Password"
                    />
                  </div>
                  <div class="col-md-6">
                    <label>Retype Password</label>
                    <input name="repassword" id="repassword"
                      class="form-control"
                      type="text"
                      placeholder="Password"
                    />
                  </div>
                  <div class="col-md-12">
                    <button type="button" class="btn" id="button__submit" onclick="registor()">create</button>
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
