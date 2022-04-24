<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Shop bán Tranh</title>
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
                            <!-- <a href="product-detail.html" class="nav-item nav-link">Chi Tiết</a> -->
                            <!-- <a href="cart.html" class="nav-item nav-link">Thẻ</a> -->
                            <!-- <a href="checkout.html" class="nav-item nav-link">Thông Tin</a> -->
                            <!-- <a href="my-account.html" class="nav-item nav-link">Người dùng</a> -->
                            <!-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Thêm</a>
                                <div class="dropdown-menu">
                                    <a href="wishlist.html" class="dropdown-item">Wishlist</a>
                                    <a href="login.html" class="dropdown-item">Đăng nhập đăng xuất</a>
                                    <a href="contact.html" class="dropdown-item"></a>
                                </div>
                            </div> -->
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
                        <form method = "post" action="{{route('products.search',$user->id)}}">
                            @csrf
                            <div class="search">
                                <input name="keyword" id="keyword" type="text" placeholder="Tìm Kiếm">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
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
        
        <!-- Main Slider Start -->
        @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
        @endif
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                @foreach($categories as $item)        
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('product.categories',[$user->id,$item->id])}}"><i class="fa fa-shopping-bag"></i>{{$item->Categoriesname}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-6">
                        <div class="header-slider normal-slider">
                            <div class="header-slider-item">
                                <img style="width:100% ;height:360px"src="https://m.media-amazon.com/images/I/71QGkIQ7OUL._SL1024_.jpg" />
                                <div class="header-slider-caption">
                                    <p>Thủ công - chi tiết - sáng tạo</p>
                                    <a class="btn" href="{{route('home.products',$user->id)}}"><i class="fa fa-shopping-cart"></i>Mua Ngay</a>
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img style="width:100% ;height:360px"src="https://cdn.mos.cms.futurecdn.net/qBSnKWhpftE8x4Q6YkpH9E.jpg" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <p>Sử dụng chất liệu tự nhiên để tạo ra tác phẩm</p>
                                    <a class="btn" href="{{route('home.products',$user->id)}}"><i class="fa fa-shopping-cart"></i>Mua Ngay</a>
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img style="width:100% ;height:360px"src="https://s.abcnews.com/images/International/painting-defaced_hpMain_20210402-223501_16x9_1600.jpg" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <p>Tử những họa sĩ nổi tiếng</p>
                                    <a class="btn" href="{{route('home.products',$user->id)}}"><i class="fa fa-shopping-cart"></i>Mua Ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="header-img">
                            <div class="img-item">
                                <img src="https://cdn11.bigcommerce.com/s-x49po/images/stencil/500x659/products/21069/109206/Speculating_Buddha_02__92694.1627712614.jpg" />
                                <a class="img-text" href="{{route('home.products',$user->id)}}">
                                    <p>Chất Liệu sơn Dầu</p>
                                </a>
                            </div>
                            <div class="img-item">
                                <img src="https://cdn11.bigcommerce.com/s-x49po/images/stencil/500x659/products/12561/22654/31Basketball19__42683.1506574393.jpg" />
                                <a class="img-text" href="{{route('home.products',$user->id)}}">
                                    <p>Đăng kí bản quyền hình ảnh</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Slider End -->      
        
          <!-- Brand Start -->
        <div class="brand">
            <div class="container-fluid">
                <div class="brand-slider">
                    <div class="brand-item"><img src="{{URL::asset('image/brand-1.png')}}" alt=""></div>
                    <div class="brand-item"><img src="{{URL::asset('image/brand-2.png')}}" alt=""></div>
                    <div class="brand-item"><img src="{{URL::asset('image/brand-3.png')}}" alt=""></div>
                    <div class="brand-item"><img src="{{URL::asset('image/brand-4.png')}}" alt=""></div>
                    <div class="brand-item"><img src="{{URL::asset('image/brand-5.png')}}" alt=""></div>
                    <div class="brand-item"><img src="{{URL::asset('image/brand-6.png')}}" alt=""></div>
                </div>
            </div>
        </div>
        <!-- Brand End -->   
        
        <!-- Feature Start-->
        <div class="feature">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fab fa-cc-mastercard"></i>
                            <h2>bảo mật</h2>
                            <p>
                                Mọi thông tin của khách hàng đều được bảo mật
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-truck"></i>
                            <h2>FreeShip</h2>
                            <p>
                                Free Ship trung tâm nội thành.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-sync-alt"></i>
                            <h2>Hỗ trợ Hoàn trả</h2>
                            <p>
                                Đổi trả sản phẩm trong vòng 12 ngày
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-comments"></i>
                            <h2>Hỗ trợ trực tuyến</h2>
                            <p>
                                hỗ trợ 24/7
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End-->      
        
        <!-- Category Start-->
        <div class="category">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="https://tranhsondaunghethuat.com.vn/wp-content/uploads/2016/09/tranh-son-dau-thieu-nu-Pino-Daeni1.jpg" />
                            <a class="category-name" href="">
                                <p>Nghệ thuật là sự lừa gạt đẹp nhất giữa mọi điều dối trá.</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-250">
                            <img src="https://i.ytimg.com/vi/f3iQmyaJuB4/hqdefault.jpg" />
                            <a class="category-name" href="">
                                <p>đưa ánh sáng vào trái tim con người.</p>
                            </a>
                        </div>
                        <div class="category-item ch-150">
                            <img src="https://cmavn.org/wp-content/themes/cmavn/add-on/images/nguyen-thanh-nhan-artwork-06.jpg" />
                            <a class="category-name" href="">
                                <p>đi cùng thời đại của mình.</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-150">
                            <img src="https://www.voicesofyouth.org/sites/voy/files/images/2020-07/zeekmystories_1.jpg" />
                            <a class="category-name" href="">
                                <p>Mọi môn khoa học đều bắt đầu là triết học và kết thúc là nghệ thuật.</p>
                            </a>
                        </div>
                        <div class="category-item ch-250">
                            <img src="https://classbento.com.au/images/class/abstract-art-painting-workshop-sydney-600.jpg" />
                            <a class="category-name" href="">
                                <p>Nghệ thuật là con đường đẹp đẽ.</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="https://previews.123rf.com/images/photominus/photominus1701/photominus170100605/69921867-macro-close-up-of-different-color-oil-paint-colorful-acrylic-modern-art-concept-.jpg" />
                            <a class="category-name" href="">
                                <p>Yêu cái đẹp là thưởng thức. Tạo ra cái đẹp là nghệ thuật.</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category End-->       
        
        <!-- Call to Action Start -->
        <div class="call-to-action">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1>Liên Hệ với chúng tôi</h1>
                    </div>
                    <div class="col-md-6">
                        <a href="tel:0123456789">+8490909090909</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action End -->       
        
        <!-- Featured Product Start -->
        <div class="featured-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Sản Phẩm Nổi bật</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                    <!-- begin product -->
                    @foreach($products as $product)
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="{{route('product.detail',[$user->id,$product->id])}}">{{$product->ProductsName}}</a>
                                <div class="ratting stars">
                                    {{$product->reviews['star']}}
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="{{route('product.detail',[$user->id,$product->id])}}">
                                    <img src="{{URL::asset('uploads/product/'. $product->imagePath)}}" alt="Product Image" style="width:100%;height:auto">
                                </a>
                                <div class="product-action">
                                    <a href="{{route('addToCart',[$user->id,$product->id])}}"><i class="fa fa-cart-plus"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>đ</span>{{$product->Price}}</h3>
                                <a class="btn" href="{{route('buynow',[$user->id,$product->id])}}"><i class="fa fa-shopping-cart"></i>Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- end product -->
                </div>
            </div>
        </div>
        <!-- Featured Product End -->       

        <!-- Recent Product Start -->
        <div class="recent-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Sản Phẩm gần đây</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                    <!-- begin product -->
                    @foreach($newestProducts as $product)
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="{{route('product.detail',[$user->id,$product->id])}}">{{$product->ProductsName}}</a>
                                <div class="ratting stars">
                                    {{$product->reviews['star']}}
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="{{route('product.detail',[$user->id,$product->id])}}">
                                    <img src="{{URL::asset('uploads/product/'. $product->imagePath)}}" alt="Product Image" style="width:100%;height:auto">
                                </a>
                                <div class="product-action">
                                    <a href="{{route('addToCart',[$user->id,$product->id])}}"><i class="fa fa-cart-plus"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>đ</span>{{$product->Price}}</h3>
                                <a class="btn" href="{{route('buynow',[$user->id,$product->id])}}"><i class="fa fa-shopping-cart"></i>Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- end product -->
                </div>
            </div>
        </div>
        <!-- Recent Product End -->
        <!-- Brand Start -->
        <div class="brand">
            <div class="container-fluid">
                <div class="brand-slider">
                    <div class="brand-item"><img src="{{URL::asset('image/brand-1.png')}}" alt=""></div>
                    <div class="brand-item"><img src="{{URL::asset('image/brand-2.png')}}" alt=""></div>
                    <div class="brand-item"><img src="{{URL::asset('image/brand-3.png')}}" alt=""></div>
                    <div class="brand-item"><img src="{{URL::asset('image/brand-4.png')}}" alt=""></div>
                    <div class="brand-item"><img src="{{URL::asset('image/brand-5.png')}}" alt=""></div>
                    <div class="brand-item"><img src="{{URL::asset('image/brand-6.png')}}" alt=""></div>
                </div>
            </div>
        </div>
        <!-- Brand End -->     
        <!-- Review Start -->
        <div class="review">
            <div class="container-fluid">
                <div class="row align-items-center review-slider normal-slider">
                    <!-- review begin -->
                    @foreach($reviews as $item)
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
    
                            </div>
                            <div class="review-text">
                                <h2>{{$item->ReviewsName}}</h2>
                                <h3>{{$item->account['fullname']}}</h3>
                                <div>
                                    <span class="ratting stars">{{$item->star}}</span>
                                </div>
                                <p>
                                {{$item->comment}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- review end -->
                </div>
            </div>
        </div>
        <!-- Review End -->        
        
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
