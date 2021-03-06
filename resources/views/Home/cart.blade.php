<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>E Store - eCommerce HTML Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{ URL::asset('lib/slick/slick.css')}}" rel="stylesheet">
        <link href="{{ URL::asset('lib/slick/slick-theme.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
    </head>

    <body>
        <!-- Top bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                        {{$user->email}}
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        {{$user->mobile}}
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
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="index.html" class="nav-item nav-link active">Trang Ch???</a>
                            <a href="{{route('home.products',$user->id)}}" class="nav-item nav-link">S???n Ph???m</a>
                            <!-- <a href="product-detail.html" class="nav-item nav-link">Chi Ti???t</a> -->
                            <!-- <a href="cart.html" class="nav-item nav-link">Th???</a> -->
                            <!-- <a href="checkout.html" class="nav-item nav-link">Th??ng Tin</a> -->
                            <!-- <a href="my-account.html" class="nav-item nav-link">Ng?????i d??ng</a> -->
                            <!-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Th??m</a>
                                <div class="dropdown-menu">
                                    <a href="wishlist.html" class="dropdown-item">Wishlist</a>
                                    <a href="login.html" class="dropdown-item">????ng nh???p ????ng xu???t</a>
                                    <a href="contact.html" class="dropdown-item"></a>
                                </div>
                            </div> -->
                        </div>
                        <div class="navbar-nav ml-auto">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{$user->fullname}}</a>
                                <div class="dropdown-menu">
                                    <a href="{{route('login')}}" class="dropdown-item">????ng xu???t</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->      
        
        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.html">
                            <img src="https://p.kindpng.com/picc/s/16-169054_nintendo-eshop-logo-png-png-download-nintendo-3ds.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="user">
                            <a href="cart.html" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span>(0)</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Bar End -->
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Cart</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Cart Start -->
        <div class="cart-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>S???n Ph???m</th>
                                            <th>Gi??</th>
                                            <th>Danh M???c</th>
                                            <th>t???ng ti???n</th>
                                            <th>X??a</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        @foreach($products as $item)
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="{{URL::asset('uploads/product/'.$item->imagePath)}}" alt="Image"></a>
                                                    <p>{{$item->ProductsName}}</p>
                                                </div>
                                            </td>
                                            <td>??{{$item->Price}}</td>
                                            <td>
                                                {{$item->categories['Categoriesname']}}
                                            </td>
                                            <td>??{{$item->Price}}</td>
                                            <td>
                                                <form action="{{route('cart.destroy',[$user->id,$item->id])}}" method="post">
                                                    @csrf
                                                    <button><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart-page-inner">
                            <div class="row">
                                <form action="{{route('cart.order',$user->id)}}" method="post">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="coupon" style="width:325px">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="cart-summary">
                                            <div class="cart-content">
                                                <h1>C??c s???n ph???m</h1>
                                                @foreach($products as $item)
                                                    <p>{{$item->ProductsName}}<span>{{$item->Price}}</span></p>
                                                @endforeach
                                                <h2>T???ng ti???n<span>
                                                    <?php
                                                        $total = 0;
                                                        foreach($products as $item){
                                                            $total += (int)$item->Price;
                                                        }
                                                        echo $total; 
                                                    ?>
                                                    
                                                </span></h2>
                                            </div>
                                            <div class="cart-btn">
                                                <button>H???y B???</button>
                                                <button type="submit">Mua h??ng</buttont>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart End -->
        
        <!-- Footer Start -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Li??n h???</h2>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>H?? N???i, Vi???t Nam</p>
                                <p><i class="fa fa-envelope"></i>PaintShop@gmail.com</p>
                                <p><i class="fa fa-phone">+8490909090909</i></p>
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
                            <h2>Th??ng tin shop</h2>
                            <ul>
                                <li><a href="#">V??? Ch??ng t??i</a></li>
                                <li><a href="#">ri??ng t?? v?? b???o m???t</a></li>
                                <li><a href="#">??i???u kho???n v?? ??i???u ki???n</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Mua H??ng</h2>
                            <ul>
                                <li><a href="#">??i???u Kho???n mua h??ng</a></li>
                                <li><a href="#">??i???u Kho???n giao h??ng</a></li>
                                <li><a href="#">Ho??n Tr??? ????n h??ng</a></li>
                            </ul>??
                        </div>
                    </div>
                </div>
                
                <div class="row payment align-items-center">
                    <div class="col-md-6">
                        <div class="payment-method">
                            <h2>Ph????ng th???c thanh to??n</h2>
                            <img src="https://d1nhio0ox7pgb.cloudfront.net/_img/g_collection_png/standard/512x512/credit_card.png" alt="Payment Method" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="payment-security">
                            <h2>B???o M???t b???i</h2>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/GoDaddy_logo.svg/1280px-GoDaddy_logo.svg.png" alt="Payment Security" />
                            <img src="https://cdn.freelogovectors.net/wp-content/uploads/2020/11/norton-logo.png" alt="Payment Security" />

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 copyright">
                        <p>b??o C??o M??n <a href="">l???p tr??nh web n??ng cao</a></p>
                    </div>
                    <div class="col-md-6 template-by">
                        <p>Ng?????i th???c hi???n  <a href="">L?? Kh??nh To??n</a></p>
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
        <script src="{{URL::asset('lib/easing/easing.min.js')}}"></script>
        <script src="{{URL::asset('lib/slick/slick.min.js')}}"></script>
        
        <!-- Template Javascript -->
        <script src="{{URL::asset('js/main.js')}}"></script>
        <!-- my own js file -->
        <script src="{{URL::asset('js/script.js')}}"></script>
    </body>
</html>
