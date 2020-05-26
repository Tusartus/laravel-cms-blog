

<!-- Start Header Area -->
<header class="default-header">
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">

            <a class="navbar-brand" href="{{ url('/') }}">
              {{ config('app.name', 'Blog in Laravel') }}
            </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
          <ul class="navbar-nav">
          <li><a href="{{ url('/') }}">Home</a></li>
          <li><a href="{{ route('post.index') }}">Posts</a></li>


            <li>
                    <form class="form-inline"  method="GET" action="{{ route('search') }}">
        <input class="form-control mr-sm-2" type="text" value="{{ isset($query) ? $query : '' }}" name="query" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
                  </li>


            @guest

                <li>
                    <a  href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li>
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @else

              <li><a href="{{ route('post.index') }}">login as : {{ Auth::user()->name }}</a></li>

              <li>
              <a href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>

            </li>
            <!-- Dropdown -->
              <li class="dropdown">
                <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Setting
                </a>
                <div class="dropdown-menu">
                     @if(Auth::user()->role->id == 2)
                  <a class="dropdown-item" href="{{ route('author.dashboard') }}">Dashboard</a>
     @endif
      @if(Auth::user()->role->id == 1)

                  <a class="dropdown-item" href="{{ route('admin.dashboard') }}"> Dashboard</a>
   @endif





                </div>
              </li>

          @endguest




          </ul>













        </div>
    </div>
  </nav>
</header>
<!-- End Header Area -->
