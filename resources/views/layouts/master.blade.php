<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<!--
<title>{{ config('app.name', 'Laravel') }}</title>
-->
    <title>
  @yield('title')
   </title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">


    <style>
 ul li.active{
   width: 160px;
   background-color: blue;
   opacity: 0.12;
   }



    </style>

    @stack('css')
</head>
<body>
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name admin</a>
  <a class="navbar-brand content-justify-center mx-2" href="#"> {{ Auth::user()->email }}</a>
  <ul class="navbar-nav px-3">

  <li class="nav-item dropdown">
      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->name }} <span class="caret"></span>
      </a>

      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
      </div>
  </li>
  </ul>
  </nav>
  <hr>

        <main class="py-4">



          <div class="container-fluid">
            <div class="row">

            <div class="col-md-2">
              <nav class="navbar navbar-expand-md  bg-dark navbar-dark">

                <!-- Navbar links -->
                   @if(Request::is('admin*'))
           <div class="collaspe" id="#navbarToggleExternalContent">



                               <ul class="nav flex-column p-2">
                                  <li class="nav-item">
                              <a class="nav-link active" href="#">
                        @if('Auth::user()->image != default.png' )
                         <img src="{{ url('storage/profile/'.Auth::user()->image) }}" width="50" height="50" class="rounded" alt="Cinque Terre">
                        @else
                         <img src="{{asset('storage/default.png') }}" width="50" height="50" class="rounded" alt="Cinque Terre">
                       @endif


                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#"><strong class="text-white">{{ Auth::user()->name }} </strong></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#"><strong class="text-white">{{ Auth::user()->email }}</strong></a>
                            </li>
                            <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                <a href="{{ route('admin.settings') }}">

                    <span class="text-white">Settings</span>
                </a>
            </li>
                          </ul>

                        <br>
   <hr>
                  <ul class="navbar-nav flex-column ">

                    <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                      <a class="nav-link active text-white" href="{{ route('admin.dashboard') }}">
                        <span data-feather="home"></span>
                        Dashboard <span class="sr-only">(current)</span>
                      </a>
                    </li>

                    <li class="nav-item  {{ Request::is('admin/tag*') ? 'active' : '' }}">
                      <a class="nav-link text-white" href="{{ route('admin.tag.index') }}">
                        <span data-feather="file"></span>
                      Tags
                      </a>
                    </li>
                    <li class="nav-item  {{ Request::is('admin/category*') ? 'active' : '' }}">
                      <a class="nav-link text-white" href="{{ route('admin.category.index') }}">
                        <span data-feather="file"></span>
                      Category
                      </a>
                    </li>
                    <li class="nav-item  {{ Request::is('admin/post*') ? 'active' : '' }}">
                      <a class="nav-link text-white" href="{{ route('admin.post.index') }}">
                        <span data-feather="file"></span>
                      Posts
                      </a>
                    </li>
                    <li class="text-white {{ Request::is('admin/pending/post') ? 'active' : '' }}">
                     <a class="text-whit" href="{{ route('admin.post.pending') }}">

                         <span class="text-white">Pending Posts</span>
                     </a>
                 </li>
                 <li class="{{ Request::is('admin/subscriber') ? 'active' : '' }}">
              <a href="{{ route('admin.subscriber.index') }}">

                  <span class="text-white">Subscribers</span>
              </a>
                 </li>



                  </ul>



                </div>
                @endif
              </nav>
            </div>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
              @if (session('status'))

                    <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong> {{ session('status') }}</strong>
                  </div>
              @endif



            @yield('content')
        </main>
    </div>
  @section('scripts')
 <script src="{{ asset('assets/js/dataTables.min.js') }}" ></script>
 <script src="{{ asset('assets/js/jquery.min.js') }}" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js" integrity="sha256-sfG8c9ILUB8EXQ5muswfjZsKICbRIJUG/kBogvvV5sY=" crossorigin="anonymous"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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

@stack('js')

</body>
</html>
