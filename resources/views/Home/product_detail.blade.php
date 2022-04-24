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
                        <a href="{{route('home',$user->id)}}" class="nav-item nav-link ">Trang Chủ</a>
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
        
        <!-- Bottom Bar Start -->
        <div class="bottom-bar" style="background-color:#f6f6f6">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="">
                                <img src="https://p.kindpng.com/picc/s/16-169054_nintendo-eshop-logo-png-png-download-nintendo-3ds.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <input type="text" placeholder="Tìm Kiếm">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="user">
                            <a href="{{route('cart',$user->id)}}" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span>({{count($carts)}})</span>
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
                    <li class="breadcrumb-item active">Product Detail</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Product Detail Start -->
        <div class="product-detail">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="product-detail-top">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <div class="product-slider-single normal-slider">
                                        <img src="{{URL::asset('uploads/product/'. $product->imagePath)}}" alt="Product Image">
                                    
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="product-content">
                                        <div class="title"><h2>{{$product->ProductsName}}</h2></div>
                                        <div class="ratting stars">
                                            {{$product->reviews['star']}}
                                        </div>
                                        <div class="price">
                                            <h4>Giá:</h4>
                                            <p>đ {{$product->Price}}</p>
                                        </div>
                                        <div class="p-size">
                                            <h4>Size:</h4>
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn">S</button>
                                                <button type="button" class="btn">M</button>
                                                <button type="button" class="btn">L</button>
                                                <button type="button" class="btn">XL</button>
                                            </div> 
                                        </div>
                                        <div class="action">
                                            <a class="btn" href="{{route('addToCart',[$user->id,$product->id])}}"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ Hàng</a>
                                            <a class="btn" href="{{route('buynow',[$user->id,$product->id])}}"><i class="fa fa-shopping-bag"></i>Mua Luôn</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row product-detail-bottom">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#description">Mô Tả thông tin</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#reviews">Nhận xét</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="description" class="container tab-pane active">
                                        <h4>Thông tin sản phẩm</h4>
                                        <p>
                                            {{$product->description}}
                                        </p>
                                    </div>
                                    <div id="reviews" class="container tab-pane fade">
                                        <div class="reviews-submitted">
                                            <div class="reviewer">
                                                {{$product->reviews['ReviewsName']}}
                                            </div>
                                            <div class="ratting stars">
                                                {{$product->reviews['star']}}
                                            </div>
                                            <p>
                                                {{$product->reviews['comment']}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="product">
                            <div class="section-header">
                                <h1>Sản Phẩm Liên quan</h1>
                            </div>

                            <div class="row align-items-center product-slider product-slider-3">
                                @foreach($thisCategories['product'] as $item)
                                <div class="col-lg-12 ">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="{{route('product.detail',[$user->id,$item->id])}}">{{$item->ProductsName}}</a>
                                            <div class="ratting star">
                                                {{$item->star}}
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html">
                                                <img src="{{URL::asset('uploads/product/'. $item->imagePath)}}" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="{{route('addToCart',[$user->id,$item->id])}}"><i class="fa fa-cart-plus"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price" >
                                            <h3 style="font-size:18px"><span>đ</span>{{$item->Price}}</h3>
                                            <a class="btn" style="font-size:12px;" href="{{route('buynow',[$user->id,$item->id])}}"><i class="fa fa-shopping-cart"></i>Mua Luôn</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget category">
                                <h2 class="title">Phân Loại</h2>
                                <nav class="navbar bg-light">
                                    <ul class="navbar-nav">
                                        @foreach($categories as $item)
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('product.categories',[$user->id,$item->id])}}"><i class="fas fa-angle-double-right"></i>{{$item->Categoriesname}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                        <div class="sidebar-widget brands">
                            <h2 class="title">Our Brands</h2>
                            <ul>
                                <li><a href="#">Nulla </a><span>(45)</span></li>
                                <li><a href="#">Curabitur </a><span>(34)</span></li>
                                <li><a href="#">Nunc </a><span>(67)</span></li>
                                <li><a href="#">Ullamcorper</a><span>(74)</span></li>
                                <li><a href="#">Fusce </a><span>(89)</span></li>
                                <li><a href="#">Sagittis</a><span>(28)</span></li>
                            </ul>
                        </div>
                        
                        <div class="sidebar-widget tag">
                            <h2 class="title">Tags Cloud</h2>
                            <a href="#">Lorem ipsum</a>
                            <a href="#">Vivamus</a>
                            <a href="#">Phasellus</a>
                            <a href="#">pulvinar</a>
                            <a href="#">Curabitur</a>
                            <a href="#">Fusce</a>
                            <a href="#">Sem quis</a>
                            <a href="#">Mollis metus</a>
                            <a href="#">Sit amet</a>
                            <a href="#">Vel posuere</a>
                            <a href="#">orci luctus</a>
                            <a href="#">Nam lorem</a>
                        </div>
                    </div>
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <!-- Product Detail End -->
        
        <!-- Brand Start -->
        <div class="brand">
            <div class="container-fluid">
                <div class="brand-slider">
                    <div class="brand-item"><img src="img/brand-1.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-2.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-3.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-4.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-5.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-6.png" alt=""></div>
                </div>
            </div>
        </div>
        <!-- Brand End -->
        
        <!-- Footer Start -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Liên hệ</h2>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>Hà Nội, Việt Nam</p>
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
                            <h2>Thông tin shop</h2>
                            <ul>
                                <li><a href="#">Về Chúng tôi</a></li>
                                <li><a href="#">riêng tư và bảo mật</a></li>
                                <li><a href="#">Điều khoản và điều kiện</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Mua Hàng</h2>
                            <ul>
                                <li><a href="#">Điều Khoản mua hàng</a></li>
                                <li><a href="#">Điều Khoản giao hàng</a></li>
                                <li><a href="#">Hoàn Trả đơn hàng</a></li>
                            </ul>á
                        </div>
                    </div>
                </div>
                
                <div class="row payment align-items-center">
                    <div class="col-md-6">
                        <div class="payment-method">
                            <h2>Phương thức thanh toán</h2>
                            <img src="https://d1nhio0ox7pgb.cloudfront.net/_img/g_collection_png/standard/512x512/credit_card.png" alt="Payment Method" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="payment-security">
                            <h2>Bảo Mật bởi</h2>
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
                        <p>báo Cáo Môn <a href="">lập trình web nâng cao</a></p>
                    </div>
                    <div class="col-md-6 template-by">
                        <p>Người thực hiện  <a href="">Lê Khánh Toàn</a></p>
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
