@extends('layouts.app')
@section('title', 'Page home')
@push('css')
    <link href="{{ asset('assets/frontend/css/category/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/category/responsive.css') }}" rel="stylesheet">
    <style>
        .favorite_posts{
            color: blue;
        }
        div img{
          width:100%;
          height:auto;
        }

    </style>
@endpush

@section('content')

<div class="slider display-table center-text jumbotron col-md-12">
        <h1 class="title display-table-cell"><b>ALL POSTS</b></h1>
    </div><!-- slider -->

    <section class="blog-area section col-md-12">
        <div class="container">

            <div class="row">
                @forelse($posts as $post)
                    <div class="col-sm-4">
                        <div class="card h-100">
                            <div class="single-post post-style-1">

                                <div class="blog-image"><img class="img-responsive" src="{{ url('storage/post/'.$post->image) }}" width="340" height="190" alt="{{ $post->title }}"></div>


                                <div class="blog-info">

                                    <h4 class="display-5"><a href="{{ route('post.details',$post->slug) }}"><b>{{ $post->title }}</b></a></h4>

                                    <ul class="post-footer">



                                        <li><a href="#"><i class="fa fa-eye"></i>{{ $post->view_count }}</a></li>
                                    </ul>

                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @empty
                    <div class="col-lg-12 col-md-12">
                        <div class="card h-100">
                            <div class="single-post post-style-1 p-2">
                               <strong>No Post Found :(</strong>
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @endforelse
            </div><!-- row -->
<div class="nav justify-content-center m-3">
            {{ $posts->links() }}
  </div>
        </div><!-- container -->
    </section><!-- section -->










@endsection
@push('js')
<script type="text/javascript">

$('.responsive').slick({
 dots: true,
 infinite: false,
 speed: 300,

 slidesToShow: 3,
slidesToScroll: 1,
autoplay: true,
autoplaySpeed: 2000,
 responsive: [
   {
     breakpoint: 1024,
     settings: {
       slidesToShow: 3,
       slidesToScroll: 3,
       infinite: true,
       dots: true
     }
   },
   {
     breakpoint: 600,
     settings: {
       slidesToShow: 2,
       slidesToScroll: 2
     }
   },
   {
     breakpoint: 480,
     settings: {
       slidesToShow: 1,
       slidesToScroll: 1
     }
   }
   // You can unslick at a given breakpoint now by adding:
   // settings: "unslick"
   // instead of a settings object
 ]
});
</script>


@endpush
