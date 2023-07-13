<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Burak Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('web/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('web/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('web/css/style.css')}}" rel="stylesheet">

</head>
<body>
        @auth

        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="https://www.linkedin.com/in/burak-tamince/">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="instagram.com/tmncburak">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">B</span>Tobacco</h1>
                </a>
            </div>
        </div>
    </div>
    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    @foreach($categories as $category)
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown" >{{$category->name}} <i class="fa fa-angle-down float-right mt-1"></i></a>

                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                            @foreach($subcategories as $subcategory)
                            @if($subcategory->category_id == $category->id)
                        <a href="#{{$subcategory->name}}" class="dropdown-item subcategory" >{{$subcategory->name}}</a>
                    @endif
                                @endforeach
                            </div>

                        </div>
                        @endforeach

                    </div>


                </nav>
            </div>

            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">B</span>Tobacco</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{route('home.index')}}" class="nav-item nav-link">Home</a>
                            <a href="{{route('home.detail')}}" class="nav-item nav-link">Shop Detail</a>

                        <div class="navbar-nav ml-auto py-0">
                            @auth

                            <li class="list-group-item"> Welcome<br/>{{ auth()->user()->username }}</li>


                            <div class="text-end">
                                <a href="{{ route('logout.perform') }}" class="nav-item nav-link">Logout</a>
                                 </div>
                            @endauth
                                            </div>
                                            <div class="navbar-nav ml-auto py-0">
                                            @guest
                                            <div class="text-end">
                                                <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
                                                <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a>
                                            </div>
                                            @endguest
                                            </div>
                        </div>
                </nav>
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="{{ asset('web/img/istockphoto-940856708-640x640.jpg ')}}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Great Tobaccos</h3>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="{{ asset('web/img/desktop-wallpaper-tobacco-nicotine.jpg') }}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Best Experience</h3>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Navbar End -->
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0 px-2">-</p>
                <p class="m-0">Home</p>
            </div>
        </div>
    </div>

    <!-- Page Header End -->

    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Trandy Products</span></h2>
        </div>
        @foreach($products as $product)
        <div class="row px-xl-5 pb-3">

            <div >

                <div >
                    <div class="d-flex justify-content-center">
                       <h6 class="text-muted ml-2" id="{{$product->sub_category}}"><del></del></h6>
                    </div>
                        <div class="position-relative bg-secondary -center text-md-right text-white mb-2 py-5 px-5">
                            <img src="{{ asset('storage/'.$product->image) }}" alt="Product Image" style="width:500px" >
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3"value="{{$product->name}}">{{$product->name}}</h6>

                            <div class="d-flex justify-content-center">
                                <h6>{{ $product->discount }}</h6><h6 class="text-muted ml-2"><del>{{ $product->price }}</del></h6>
                            </div>
                        </div>

                        <div class="btn-group">
                            <form action="{{route('increaseItem',$product->id)}}" method="POST">
                                @csrf
                            <button type="submit">Add to Cart</button>
                                </form>
                        </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">B</span>Tobacco</h1>
                </a>
                <p>Dolore erat dolor sit lorem vero amet. Sed sit lorem magna, ipsum no sit erat lorem et magna ipsum dolore amet erat.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="{{route('home.index')}}"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="{{route('home.detail')}}"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a target="_blank" class="text-dark font-weight-semi-bold" href="#"></a>All Rights Reserved. Designed
                    by
                    <a target="_blank" class="text-dark font-weight-semi-bold" href="https://www.linkedin.com/in/burak-tamince/">Burak Tamince</a><br>
                    Distributed By <a href="https://github.com/Athena65" target="_blank">BTobacco</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                < class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- Java Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('web/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('web/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('web/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('web/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('web/js/main.js')}}"></script>
    @endauth
@guest
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Burak Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="http://127.0.0.1:8000/web/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="http://127.0.0.1:8000/web/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->


</head>
<body>
                    <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                <!-- SEO Meta Tags -->
                <meta name="description" content="Tivo is a HTML landing page template built with Bootstrap to help you crate engaging presentations for SaaS apps and convert visitors into users.">
                <meta name="author" content="Inovatik">

                <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
                <meta property="og:site_name" content="" /> <!-- website name -->
                <meta property="og:site" content="" /> <!-- website link -->
                <meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
                <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
                <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
                <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
                <meta property="og:type" content="article" />

                <!-- Website Title -->
                <title>Tivo - SaaS App HTML Landing Page Template</title>

                <!-- Styles -->
                <link href="http://127.0.0.1:8000/web/css/style.css" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
                <link href="http://127.0.0.1:8000/login-web/css/bootstrap.css" rel="stylesheet">
                <link href="http://127.0.0.1:8000/login-web/css/fontawesome-all.css" rel="stylesheet">
                <link href="http://127.0.0.1:8000/login-web/css/swiper.css" rel="stylesheet">
                <link href="http://127.0.0.1:8000/login-web/css/magnific-popup.css" rel="stylesheet">
                <link href="http://127.0.0.1:8000/login-web/css/styles.css" rel="stylesheet">

                <!-- Favicon  -->
                <link rel="icon" href="http://127.0.0.1:8000/login-web/images/favicon.png">
            </head>
            <body data-spy="scroll" data-target=".fixed-top">

                <!-- Preloader -->
                <div class="spinner-wrapper">
                    <div class="spinner">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>
                </div>
                <!-- end of preloader -->


<header id="header" class="header">
    <div class="header-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-5">
                    <div class="text-container">
                        <h1>SaaS App HTML Landing Page</h1>
                        <p class="p-large">To View Burak's Tobacco Web Page Please Login</p>
                        <a class="btn-solid-lg page-scroll" href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a>
                        <a class="btn-solid-lg page-scroll" href="{{ route('login.perform') }}" class="btn btn-success">Login</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6 col-xl-7">
                    <div class="image-container">
                        <div class="img-wrapper">
                            <img class="img-fluid" src="{{ asset('login-web/images/header-software-app.png') }}" alt="alternative">
                        </div> <!-- end of img-wrapper -->
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of header-content -->
</header> <!-- end of header -->
<svg class="header-frame" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 310"><defs><style>.cls-1{fill:#5f4def;}</style></defs><title>header-frame</title><path class="cls-1" d="M0,283.054c22.75,12.98,53.1,15.2,70.635,14.808,92.115-2.077,238.3-79.9,354.895-79.938,59.97-.019,106.17,18.059,141.58,34,47.778,21.511,47.778,21.511,90,38.938,28.418,11.731,85.344,26.169,152.992,17.971,68.127-8.255,115.933-34.963,166.492-67.393,37.467-24.032,148.6-112.008,171.753-127.963,27.951-19.26,87.771-81.155,180.71-89.341,72.016-6.343,105.479,12.388,157.434,35.467,69.73,30.976,168.93,92.28,256.514,89.405,100.992-3.315,140.276-41.7,177-64.9V0.24H0V283.054Z"/></svg>
<!-- end of header -->
</html>
        <script src="{{asset('login-web/js/jquery.min.js') }}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
        <script src="{{asset('login-web/js/popper.min.js') }}"></script> <!-- Popper tooltip library for Bootstrap -->
        <script src="{{asset('login-web/js/bootstrap.min.js') }}"></script> <!-- Bootstrap framework -->
        <script src="{{asset('login-web/js/jquery.easing.min.js') }}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
        <script src="{{asset('login-web/js/swiper.min.js') }}"></script> <!-- Swiper for image and text sliders -->
        <script src="{{asset('login-web/js/jquery.magnific-popup.js') }}"></script> <!-- Magnific Popup for lightboxes -->
        <script src="{{asset('login-web/js/validator.min.js') }}"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
        <script src="{{asset('login-web//js/scripts.js') }}"></script> <!-- Custom scripts -->
        @endguest
</body>

</html>
