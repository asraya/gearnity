<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <title>{{ $app_name }}</title>

    <!-- theme meta -->
    <meta name="theme-name" content="wallet" />

    <!-- # Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- # CSS Plugins -->
    <link rel="stylesheet" href="{{ asset('web') }}/assets/plugins/slick/slick.css">
    <link rel="stylesheet" href="{{ asset('web') }}/assets/plugins/font-awesome/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('web') }}/assets/plugins/font-awesome/brands.css">
    <link rel="stylesheet" href="{{ asset('web') }}/assets/plugins/font-awesome/solid.css">

    <!-- # Main Style Sheet -->
	<link rel="stylesheet" href="{{ asset('web') }}/assets/css/style.css">
  </head>
<body>      
 <header class="navigation bg-tertiary"> 
  <nav class="navbar navbar-expand-xl navbar-light text-center py-3">
		<div class="container">
			<a class="navbar-brand" href="index.html">
				<img loading="prelaod" decoding="async" class="img-fluid" width="160" src="{{ $app_logo }}" alt="Wallet">
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mx-auto mb-2 mb-lg-0">
					<li class="nav-item"> <a class="nav-link" href="/">{{ $app_home }}</a>
					</li>
          <li class="nav-item"> <a class="nav-link" href="/">Job</a>
					</li>
          <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Partnership</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item " href="blog.html">For company</a>
							</li>
						</ul>
					</li>
					<li class="nav-item "> <a class="nav-link" href="{{ route('frontend.blog.show') }}">Blog</a>
					</li>
					<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Grow</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item " href="blog.html">Pendanaan UMKN</a>
							</li>
							<li><a class="dropdown-item " href="blog-details.html">Affiliate</a>
							</li>
						</ul>
					</li>
          <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Courses</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li>
                @foreach ($global_category as $category)
                <a class="dropdown-item " href="{{ route('frontend.category.show',$category->slug) }}">{{ $category->name }}</a>
                @endforeach
							</li>
						</ul>
					</li>
				</ul>        
        @auth
        @if (auth()->user()->role_name == 'user'||'mitra')
       	<!-- account btn --> <a href="{{ route('frontend.user.dashboard') }}" class="btn btn-outline-primary">{{ auth()->user()->name }}</a>
         @endif
        @if (auth()->user()->role_name == 'admin')
       	<!-- account btn --> <a href="{{ route('backend.dashboard') }}" class="btn btn-outline-primary">{{ auth()->user()->name }}</a>
         @endif
        @endauth
         @auth
         @else
        <!-- account btn --> <a href="#!" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#applyLoan">{{$app_login}}</a>
        <!-- account btn --> <a href="{{ route('register') }}" class="btn btn-primary ms-2 ms-lg-3">{{$app_signup}}</a>
        @endauth
			</div>
		</div>
	</nav>

  <div class="modal applyLoanModal fade" id="applyLoan" tabindex="-1" aria-labelledby="applyLoanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <h4 class="modal-title" id="exampleModalLabel">{{$app_login}}</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <center> 
              <a class="btn btn-primary w-100" href="{{ route('user.login.google') }}">
                  <img src="{{ asset('web') }}/assets/images/ic_google.svg" class="img-fluid" alt="login google"> Sign In with Google
              </a>
            </center>
            <br><br>      
            <div class="row">
              <div class="col-lg-12 mb-4 pb-2">
                <div class="form-group">
                  <label for="loan_email_address" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control shadow-none" id="loan_email_address">
                </div>
              </div>
              <div class="col-lg-12 mb-4 pb-2">
                <div class="form-group">
                  <label for="loan_email_password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control shadow-none" id="loan_email_password">
                </div>
              </div>
              <div class="col-lg-12">
                <button type="submit" class="btn btn-primary w-100">Login</button>
              </div>
              <center> 
              <div class="col-lg-12">
                <br>      
                <a href="{{ route('forgot-password') }}"> Forgot Your Password?
              </div>
              <div class="col-lg-12">
                <br>      
                <a href="{{route('register')}}"> Create A New Account</a>           
              </div>
              <br>
              <p>
                This site is protected by <strong>reCAPTCHA</strong> and the <strong>Google Privacy Policy and Terms of Service apply</strong>.
              </p>
            </center> 
            </div>
           
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="page-content">
    @yield('content')
  </div>

  <footer class="section-sm bg-tertiary">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-2 col-md-4 col-6 mb-4">
          <div class="footer-widget">
            <h5 class="mb-4 text-primary font-secondary">Service</h5>
            <ul class="list-unstyled">
              <li class="mb-2"><a href="service-details.html">Personal loans</a>
              </li>
              <li class="mb-2"><a href="service-details.html">Home Equity Loans</a>
              </li>
              <li class="mb-2"><a href="service-details.html">Student Loans</a>
              </li>
              <li class="mb-2"><a href="service-details.html">Mortgage Loans</a>
              </li>
              <li class="mb-2"><a href="service-details.html">Payday Loans</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mb-4">
          <div class="footer-widget">
            <h5 class="mb-4 text-primary font-secondary">About</h5>
            <ul class="list-unstyled">
              <li class="mb-2"><a href="#!">Benefits</a>
              </li>
              <li class="mb-2"><a href="#!">Careers</a>
              </li>
              <li class="mb-2"><a href="#!">Our Story</a>
              </li>
              <li class="mb-2"><a href="#!">Team</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mb-4">
          <div class="footer-widget">
            <h5 class="mb-4 text-primary font-secondary">Help</h5>
            <ul class="list-unstyled">
              <li class="mb-2"><a href="">Contact Us</a>
              </li>
              <li class="mb-2"><a href="faq.html">FAQs</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 newsletter-form">
          <div style="background-color: #F4F4F4; padding: 35px;">
            <h5 class="mb-4 text-primary font-secondary">Subscribe</h5>
            <div class="pe-0 pe-xl-5">
              <form action="#!" method="post" name="mc-embedded-subscribe-form" target="_blank">
                @csrf
                <div class="input-group mb-3">
                  <input type="text" class="form-control shadow-none bg-white border-end-0" placeholder="Email address"> <span class="input-group-text border-0 p-0">
                      <button class="input-group-text border-0 bg-primary" type="submit" name="subscribe"
                        aria-label="Subscribe for Newsletter"><i class="fas fa-arrow-right"></i></button>
                    </span>
                </div>
                <div style="position: absolute; left: -5000px;" aria-hidden="true">
                  <input type="text" name="b_463ee871f45d2d93748e77cad_a0a2c6d074" tabindex="-1">
                </div>
              </form>
            </div>
            <p class="mb-0">Lorem ipsum dolor sit amet, rdghds consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat</p>
          </div>
        </div>
      </div>
      <div class="row align-items-center mt-5 text-center text-md-start">
        <div class="col-lg-4">
          <a href="index.html">
            <img loading="prelaod" decoding="async" class="img-fluid" width="160" src="{{$app_logo}}" alt="Wallet">
          </a>
        </div>
        <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
          <ul class="list-unstyled list-inline mb-0 text-lg-center">
            <li class="list-inline-item me-4"><a class="text-black" href="privacy-policy.html">Privacy Policy</a>
            </li>
            <li class="list-inline-item me-4"><a class="text-black" href="terms.html">Terms &amp; Conditions</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-6 text-md-end mt-4 mt-md-0">
          <ul class="list-unstyled list-inline mb-0 social-icons">
            <li class="list-inline-item me-3"><a title="Explorer Facebook Profile" class="text-black" href="{{$facebook_link}}"><i class="fab fa-facebook-f"></i></a>
            </li>
            <li class="list-inline-item me-3"><a title="Explorer Linkedin Profile" class="text-black" href="{{$linkedin_link}}"><i class="fab fa-linkedin"></i></a>
            </li>
            <li class="list-inline-item me-3"><a title="Explorer Instagram Profile" class="text-black" href="{{$instagram_link}}"><i class="fab fa-instagram"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

   <!-- # JS Plugins -->
<script src="{{ asset('web') }}/assets/plugins/jquery/jquery.min.js"></script>
<script src="{{ asset('web') }}/assets/plugins/bootstrap/bootstrap.min.js"></script>
<script src="{{ asset('web') }}/assets/plugins/slick/slick.min.js"></script>
<script src="{{ asset('web') }}/assets/plugins/scrollmenu/scrollmenu.min.js"></script>

<!-- Main Script -->
<script src="{{ asset('web') }}/assets/js/script.js"></script>

</body>
</html>

{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $app_name }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('elearning') }}/assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('elearning') }}/assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('elearning') }}/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('elearning') }}/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('elearning') }}/assets/css/style.css" rel="stylesheet">
</head>

<body>       

 <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>Gearnity</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="/" class="nav-item nav-link">Home</a>
                <a href="media.html" class="nav-item nav-link">Media</a>
                <a href="karir.html" class="nav-item nav-link">Career</a>
                <div class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Grow</a>
                  <div class="dropdown-menu fade-down m-0">
                        <a href="grow.html" class="dropdown-item">Pendanaan UMKN</a>
                        <a href="grow.html" class="dropdown-item">Affiliate</a>
                        <a href="grow.html" class="dropdown-item">Job Connection</a>
                  </div>
              </div>
                <div class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Courses</a>
                  <div class="dropdown-menu fade-down m-0">
                      @foreach ($global_category as $category)
                        <a href="{{ route('frontend.category.show',$category->slug) }}" class="dropdown-item">{{ $category->name }}</a>
                      @endforeach
                  </div>
              </div>
                @auth
                <div class="nav-item dropdown ">
                  <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ auth()->user()->name }}</a>
                  <div class="dropdown-menu fade-down m-0">
                    @if (auth()->user()->role_name == 'mitra')
                      <a href="{{ route('frontend.user.dashboard') }}" class="dropdown-item">Dashboard</a>
                      @endif
                      @if (auth()->user()->role_name == 'admin')
                      <a href="{{ route('backend.dashboard') }}" class="dropdown-item">Dashboard</a>
                      @endif
                      <li>
                        <form method="POST" action="{{ route('logout') }}">
                          @csrf
                          <a class="dropdown-item" href="#"  href="{{ route('logout')  }}" onclick="event.preventDefault();
                          this.closest('form').submit();">
                          <i class="dropdown-item"></i>Logout</a></li>
                      </form>
                      </li>
                  </div>
              </div>            
                @endauth
                @auth
                @else
                <a href="#" class="nav-item nav-link active"  data-toggle="modal" data-target="#sem-login">Masuk</a>
                <a href="{{ route('register') }}" class="nav-item nav-link">Join</a>
                @endauth
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
          
</head>
<body>
 
    
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
          <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
              <span class="sr-only">Loading...</span>
          </div>
      </div>
      <!-- Spinner End -->

      <div class="container">


        <!-- The Modal Login -->
        <div class="modal fade seminor-login-modal" data-backdrop="static" id="sem-login">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
        
            <!-- Modal body -->
            <div class="modal-body seminor-login-modal-body">
             <h5 class="modal-title text-center">LOGIN TO MY ACCOUNT</h5>
              <button type="button" class="close" data-dismiss="modal">
                  <span><i class="fa fa-times-circle" aria-hidden="true"></i></span>
              </button>
              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
            <form method="POST" action="{{ route('login') }}" class="seminor-login-form">
              @csrf  
              <div class="form-group">
                <input type="email" class="form-control" name="email" required autocomplete="off">
                <label class="form-control-placeholder" for="name">Email address</label>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" required autocomplete="off">
                <label class="form-control-placeholder" for="password">Password</label>
              </div>
              <div class="form-group">
                <label class="container-checkbox">
                  Keep me logged in
                  <input type="checkbox" value="" checked="checked">
                <span class="checkmark-box"></span>
                </label>
                </div>
        
                <div class="btn-check-log">
                    <button type="submit" class="btn-check-login">LOGIN</button>
                </div>

                <br><br>
        
                <center>
                  <a class="btn btn-border btn-google-login" href="{{ route('user.login.google') }}">
                      <img src="{{ asset('elearning') }}/assets/img/ic_google.svg" class="img-fluid" alt="login google"> Sign In with Google
                  </a>
              </center>
        
               <div class="forgot-pass-fau text-center pt-3">
                                         <a href="{{ route('forgot-password') }}" class="text-secondary">Forgot Your Password?</a>
        
                                       </div>
                                       <div class="create-new-fau text-center pt-3">
                                           <a href="{{ route('register') }}" class="text-primary-fau"><span>Create A New Account</span></a>
                                       </div>
        
        
        
              </form>
        
            </div>
          </div>
        </div>
        </div>
      
        </div>
      
  
        <div class="page-content">
          @yield('content')
        </div>

        <!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
  <div class="container py-5">
      <div class="row g-5">
          <div class="col-lg-3 col-md-6">
              <h4 class="text-white mb-3">Quick Link</h4>
              <a class="btn btn-link" href="">Media Online</a>
              <a class="btn btn-link" href="">Seputar Investment</a>
              <a class="btn btn-link" href="">Kelas teknologi</a>
              <a class="btn btn-link" href="">Terms & Condition</a>
              <a class="btn btn-link" href="">FAQs & Help</a>
          </div>
          <div class="col-lg-3 col-md-6">
              <h4 class="text-white mb-3">Contact</h4>
              <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jakarta, Indonesia</p>
              <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@gearnity.com</p>
              <div class="d-flex pt-2">
                  <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                  <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                  <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                  <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <h4 class="text-white mb-3">Payment</h4>
              <div class="row g-2 pt-2">
                  <div class="col-4">
                      <img class="img-fluid bg-light p-1" src="{{ asset('elearning') }}/assets/img/mandiri.jpg" alt="">
                  </div>
                  <div class="col-4">
                      <img class="img-fluid bg-light p-1" src="{{ asset('elearning') }}/assets/img/bri.jpg" alt="">
                  </div>
                  <div class="col-4">
                      <img class="img-fluid bg-light p-1" src="{{ asset('elearning') }}/assets/img/bni.jpg" alt="">
                  </div>
                  <div class="col-4">
                      <img class="img-fluid bg-light p-1" src="{{ asset('elearning') }}/assets/img/permata.jpg" alt="">
                  </div>
                  <div class="col-4">
                      <img class="img-fluid bg-light p-1" src="{{ asset('elearning') }}/assets/img/gopay.jpg" alt="">
                  </div>
                  <div class="col-4">
                      <img class="img-fluid bg-light p-1" src="{{ asset('elearning') }}/assets/img/qris.png" alt="">
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <h4 class="text-white mb-3">Newsletter</h4>
              <p>Dapatkan berita terbaru dari kami.</p>
              <div class="position-relative mx-auto" style="max-width: 400px;">
                  <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                  <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
              </div>
          </div>
      </div>
  </div>
  <div class="container">
      <div class="copyright">
          <div class="row">
              <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                  2023 &copy; <a class="border-bottom" href="#"></a>All Right Reserved.
                  Designed By <a class="border-bottom" href="https://htmlcodex.com">{{ $app_name }}</a>
              </div>
              <div class="col-md-6 text-center text-md-end">
                  <div class="footer-menu">
                      <a href="">Home</a>
                      <a href="">Cookies</a>
                      <a href="">Help</a>
                      <a href="">FQAs</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- Footer End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('elearning') }}/assets/lib/wow/wow.min.js"></script>
    <script src="{{ asset('elearning') }}/assets/lib/easing/easing.min.js"></script>
    <script src="{{ asset('elearning') }}/assets/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('elearning') }}/assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('elearning') }}/assets/js/main.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> --}}


{{-- 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $app_name }}</title>

    <link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css/main/app.css" />
    <link
      rel="shortcut icon"
      href="{{ asset('dashboard') }}/assets/images/logo/favicon.svg"
      type="image/x-icon"
    />
    <link
      rel="shortcut icon"
      href="{{ asset('dashboard') }}/assets/images/logo/favicon.png"
      type="image/png"
    />

    <link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css/shared/iconly.css" />
  </head>

  <body>
    <div id="app">
      <div id="main" class="layout-horizontal">
        <header class="mb-5">
          <div class="header-top">
            <div class="container">
              <div class="logo">
                <a href="index.html"
                  ><img src="{{ $app_logo }}" alt="Logo"
                /></a>
              </div>
              <div class="header-top-right">
                @auth
                <div class="dropdown">
                  <a
                    href="#"
                    id="topbarUserDropdown"
                    class="user-dropdown d-flex align-items-center dropend dropdown-toggle"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <div class="avatar avatar-md2">
                      <img src="{{ asset('dashboard') }}/assets/images/faces/1.jpg" alt="Avatar" />
                    </div>
                    <div class="text">
                      <h6 class="user-dropdown-name">{{ auth()->user()->name }}</h6>
                      <p class="user-dropdown-status text-sm text-muted text-capitalize">
                       Member
                      </p>
                    </div>
                  </a>
                  <ul
                    class="dropdown-menu dropdown-menu-end shadow-lg"
                    aria-labelledby="topbarUserDropdown"
                  >
                    <li><a class="dropdown-item" href="{{ route('frontend.user.dashboard') }}">My Dashboard</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    
                    @auth
                    <li>
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="#"  href="{{ route('logout')  }}" onclick="event.preventDefault();
                        this.closest('form').submit();">
                        <i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                    </form>
                    </li>
                    @endauth
                  </ul>
                </div>
                @else
                <a href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
                @endauth

                <!-- Burger button responsive -->
               <a href="#" class="burger-btn d-block d-xl-none">
                  <i class="bi bi-justify fs-3"></i>
                </a>
              </div>
            </div>
          </div>
          <nav class="main-navbar">
            <div class="container">
              <ul>
                <li class="menu-item">
                  <a href="{{ url('/') }}" class="menu-link">
                    <span><i class="bi bi-grid-fill"></i> Home</span>
                  </a>
                </li>

                <li class="menu-item active has-sub">
                  <a href="#" class="menu-link">
                    <span><i class="bi bi-grid-1x2-fill"></i> {{ __('sidebar.category') }}</span>
                  </a>
                  <div class="submenu"> -->
                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                    <div class="submenu-group-wrapper">
                      <ul class="submenu-group">
                        @foreach ($global_category as $category)
                        <li class="submenu-item">
                          <a href="{{ route('frontend.category.show',$category->slug) }}" class="submenu-link">{{ $category->name }}</a>
                        </li>
                        @endforeach                         
                      </ul>
                    </div>
                  </div>
                </li>

              </ul>
            </div>
          </nav>
        </header>

        <div class="content-wrapper container">
          <div class="page-content">
            @yield('content')
          </div>
        </div>

       
      </div>
    </div>
    <script src="{{ asset('dashboard') }}/assets/js/bootstrap.js"></script>
    <script src="{{ asset('dashboard') }}/assets/js/app.js"></script>
    <script src="{{ asset('dashboard') }}/assets/js/pages/horizontal-layout.js"></script>

    <script src="{{ asset('dashboard') }}/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('dashboard') }}/assets/js/pages/dashboard.js"></script>
  </body>
</html> --}}