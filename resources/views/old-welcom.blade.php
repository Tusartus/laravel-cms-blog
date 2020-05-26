@extends('layouts.app')
@section('title', 'Page home')
@section('css')
  <link href="{{ asset('css/appnw.css') }}" rel="stylesheet">
  <!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

@endsection

@section('content')



         <div class="m-3"></div>
          <section class="mx-2 my-2">
        <div class="row">
        <div class="col">

          <ul class="nav justify-content-center">
             @forelse($categories as $category)
            <li class="nav-item card  m-2 item autoplay">
              <a class="nav-link" href="{{ route('category.posts',$category->slug) }}">
            <span class="mr-2 mb-2 text-dark display-5"><b>{{ $category->name }}</b></span>

          <img class="img-responsive" src="{{url('storage/category/slider/'.$category->image)}}" alt="" width="340" height="150">
              </a>
            </li>


            @empty

            <li class="nav-item card  m-2 item">
              <a class="nav-link" href="#">
            <span class="mr-2 mb-2 text-dark display-5"><b>no data found</b></span>

          </a>
        </li>


          @endforelse
          </ul>




        </div>
        </div>
          </section>

         <div class="m-5 "></div>
         <hr>
        <div class="container">
        <div class="row">

        <div class="col-md-8">
          <div class="row">
                @forelse($posts as $post)
            <div class="col-sm-4">
             <a class="nav-link" href="{{ route('post.details',$post->slug) }}"><h3>{{ $post->title }}</h3></a>
             <img class="img-responsive w-100" src="{{url('storage/post/'.$post->image)}}" alt="{{ $post->title }}" width="360" height="100">
              <a class="nav-link" href="{{ route('post.details',$post->slug) }}">
                <p class="my-2">{{ $post->title }}</p>
              </a>
             <p class="my-2">
               <ul class="nav">
              <li class="nav-item m-0">
                <a class="nav-link" href="{{ route('post.details',$post->slug) }}">view more</a>
              </li>

              <li class="nav-item m-0">
                <a class="nav-link" href="#">{{ $post->view_count }} views <i class="fa fa-eye"></i></a>
              </li>

            </ul>
             </p>
           </div>

           @empty
               <div class="col-sm-10">
                   <div class="card h-100">
                       <div class="single-post post-style-1 p-2">
                          <strong>No Post Found :(</strong>
                       </div><!-- single-post -->
                   </div><!-- card -->
               </div><!-- col-lg-4 col-md-6 -->
           @endforelse













  <a class="load-more-btn btn btn-warning" href="{{ route('post.index') }}"><b>LOAD MORE</b></a>













        </div>
        </div>

        <div class="col-md-3 mx-1">
          <div class="jumbotron text-center">
            <h1>My First Bootstrap Page</h1>
            <p>Resize this responsive page to see the effect!</p>
          </div>

        <div class="">
          <h1 class="my-2 mx-2"> CATEGORY</h1>
          <ul class="nav flex-column">

                     @foreach($categories as $category)
              <li class="nav-item">
            <a class="nav-link" href="{{route('category.posts',$category->slug) }}">{{ $category->name }}</a>
            </li>
                           @endforeach
           </ul>

        </div>


        <div class="my-4 ">
          <h1 class="my-2 mx-2"> Tags:</h1>
          <ul class="nav flex-column">

                @foreach($post->tags as $tag)
           <li><a href="{{ route('tag.posts',$tag->slug) }}">{{ $tag->name }}</a></li>
               @endforeach


           </ul>

        </div>





        </div>





        </div>
        </div>


        <!--
        start test new html bootstra
        -->
        <!-- Start category Area -->
        						<section class="category-area section-gap" id="news">
        							<div class="container">



        								<div class="active-cat-carusel mt-4">
        									<div class="item single-cat">
        										<img src="bloger/img/c1.jpg" alt="">
        										<p class="date">10 Jan 2018</p>
        										<h4><a href="#">It S Hurricane Season Visiting Hilton</a></h4>
        									</div>
        									<div class="item single-cat">
        										<img src="bloger/img/c2.jpg" alt="">
        										<p class="date">10 Jan 2018</p>
        										<h4><a href="#">What Makes A Hotel Boutique</a></h4>
        									</div>

        									<div class="item single-cat">
        										<img src="bloger/img/c3.jpg" alt="">
        										<p class="date">10 Jan 2018</p>
        										<h4><a href="#">Les Houches The Hidden Gem Valley</a></h4>
        									</div>
        								</div>
        							</div>
        						</section>
        						<!-- End category Area -->






        <!-- end  test new html bootstra -->


@endsection
@push('js')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">



</script>


@endpush
