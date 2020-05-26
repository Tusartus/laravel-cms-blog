
@include('partials.head');
<body>

@include('partials.nav');
<article class="mt-5 mb-5">
    <main class="row justify-content-center">
<div class="col-md-10 offset-md-2">


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
</main>
</article>
@yield('content')






  <div class="mt-5 mb-5"></div>

  @include('partials.footer');


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
