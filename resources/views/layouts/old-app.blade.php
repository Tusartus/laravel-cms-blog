<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/appnw.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />


<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="{{ asset('bloger/css/linearicons.css') }}">
			<link rel="stylesheet" href="{{ asset('bloger/css/font-awesome.min.css') }}">
			<link rel="stylesheet" href="{{ asset('bloger/css/bootstrap.css') }}">
			<link rel="stylesheet" href="{{ asset('bloger/css/owl.carousel.css')}}">
			<link rel="stylesheet" href="{{ asset('bloger/css/main.css') }}">




@yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Blog in Laravel') }}
                </a>



                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                      </li>
                      <li class="nav-item">

                         <li><a class="nav-link" href="{{ route('post.index') }}">Posts</a></li>
                      </li>

                      <li class="nav-item">

                      </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item">

                        <form class="form-inline"  method="GET" action="{{ route('search') }}">
   <input class="form-control mr-sm-2" type="text" value="{{ isset($query) ? $query : '' }}" name="query" placeholder="Search" aria-label="Search">
   <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
 </form>
                      </li>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else

                        @if(Auth::user()->role->id == 1)
                 <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
             @endif
             @if(Auth::user()->role->id == 2)
                 <li class="nav-item"><a class="nav-link" href="{{ route('author.dashboard') }}">Dashboard</a></li>
             @endif
                              <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                              </li>
                              <li class="nav-item">
                                    <a class="nav-link"> <span  >Login as: </span class="display-5"><span class=" border border-info p-1">{{ Auth::user()->name }} </span></a>
                              </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
          <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-4">
                    @guest

                    @else




                  <ul class="nav flex-column card p-2">
                     @if(Request::is('author*'))

                <li class="nav-item">
               @if('Auth::user()->image >= 0' )
                <img src="{{ url('storage/profile/'.Auth::user()->image) }}" width="50" height="50" class="rounded" alt="Cinque Terre">
               @else

              @endif
              </li>

               <li class="nav-item">
                 <a class="nav-link" href="#"><strong>{{ Auth::user()->name }} </strong></a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="#"><strong>{{ Auth::user()->email }}</strong></a>
               </li>

             </ul>

           <br>
             <ul class="nav flex-column card p-2 mt-1">

          <li class="nav-item {{ Request::is('author/dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('author/dashboard') }}">Dashboard</a>
          </li>
          <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item {{ Request::is('author/post*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('author.post.index') }}">Posts</a>

         </li>
         <li class="nav-item {{ Request::is('author/settings*') ? 'active' : '' }}">
               <a class="nav-link" href="{{ route('author.settings') }}">Setting</a>

        </li>


 @endif
          </ul>
               @endguest
                  </div>
            @yield('content')
        </main>
    </div>


 <footer class="mt-5">
   <?php

   $categories = DB::table('categories')
                   ->get();




   ?>
     <div class="container">
         <div class="row">

             <div class="col-lg-4 col-md-6">
                 <div class="footer-section">

                     <a class="logo" href="#"><img src="{{asset('images/logo.png')}}" width="35"   height="30" alt="Logo Image"></a>
                     <p class="copyright">. All rights reserved.</p>
                     <p class="copyright"><strong> Developed &amp; <i class="fa fa-heart"></i> by  </strong>
                         <a href="" target="_blank">  Me</a></p>
                     <ul class="icons">
                         <li><a target="_blank" href=""><i class="fa fa-facebook-official" style="font-size:24px"></i></a></li>
                         <li><a target="_blank" href=""> <i class="fa fa-twitter-square" style="font-size:24px"></i></a></li>
                         <li><a target="_blank" href=""> <i class="fa fa-twitter-square" style="font-size:24px"></i></a></li>
                         <li><a target="_blank" href=""><i class="fa fa-twitter-square" style="font-size:24px"></i></a></li>
                     </ul>

                 </div><!-- footer-section -->
             </div><!-- col-lg-4 col-md-6 -->

             <div class="col-lg-4 col-md-6">
                 <div class="footer-section">
                     <h4 class="display-5"><b>CATAGORIES</b></h4>
                     <ul>


                               @foreach($categories as $category)
                    <li><a href="{{ route('category.posts',$category->slug) }}">{{ $category->name }}</a></li>
                @endforeach
                     </ul>
                 </div><!-- footer-section -->

             </div><!-- col-lg-4 col-md-6 -->

             <div class="col-lg-4 col-md-6">
                 <div class="footer-section">

                     <h4 class="display-5"><b>SUBSCRIBE</b></h4>
                     <div class="input-area form-group"">
                         <form method="POST" action="{{ route('subscriber.store') }}">
                             @csrf
                             <input class="email-input w-75" name="email" type="email" class="form-control" placeholder="Enter your email">
                             <button class="submit-btn btn btn-info" type="submit">submit</button>
                         </form>
                     </div>

                 </div><!-- footer-section -->
             </div><!-- col-lg-4 col-md-6 -->

         </div><!-- row -->
     </div><!-- container -->
 </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <script src="{{ asset('bloger/js/vendor/jquery-2.2.4.min.js') }}"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
			<script src="{{ asset('bloger/js/vendor/bootstrap.min.js') }}"></script>
			<script src="{{ asset('bloger/js/jquery.ajaxchimp.min.js') }}"></script>
			<script src="{{ asset('bloger/js/parallax.min.js') }}"></script>
			<script src="{{ asset('bloger/js/owl.carousel.min.js') }}></script>
			<script src="{{ asset('bloger/js/jquery.magnific-popup.min.js') }}"></script>
			<script src="{{ asset('bloger/js/jquery.sticky.js') }}"></script>
			<script src="{{ asset('bloger/js/main.js') }}"></script>







 <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.2.0/jquery-migrate.min.js" integrity="sha256-04lIChOgWF7jIOxGWaIMJE5y+W/0xUVDlh2+nwJuB28=" crossorigin="anonymous"></script>
 <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

 <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
 {!! Toastr::message() !!}
 <script>

   @if($errors->any())
        @foreach($errors->all() as $error)
           toastr.error('{{$error}}', 'Error', {
           closeButton:true,
           progressBar:true,

            });

        @endforeach



   @endif




  </script>
  <script src="{{ asset('js/code2.js') }}" defer></script>
  @stack('js')
</body>
</html>
