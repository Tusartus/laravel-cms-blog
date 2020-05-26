

@extends('layouts.app')
@section('title')
blog
@endsection

@push('css')
    <link href="{{ asset('assets/frontend/css/category/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/category/responsive.css') }}" rel="stylesheet">
    <style>
        .favorite_posts{
            color: blue;
        }
    </style>
@endpush

@section('content')





<!-- Start fashion Area -->
<section class="fashion-area section-gap" id="fashion">
  <div class="container">


    <?php
    $textline = "Fashion News This Week from variable";
    $allpost = "All Posts"


    ?>



    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-70 col-lg-8">
        <div class="title text-center">
          <h1 class="mb-10"> <?php echo $allpost;?></h1>
      
        </div>
      </div>
    </div>

    <div class="row">
    @forelse($posts as $post)
      <div class="col-lg-3 col-md-6 single-fashion">
        <img class="img-fluid" src="{{ url('storage/post/'.$post->image) }}" alt="{{ $post->title }}">
        <p class="date"> {{ $post->created_at->diffForHumans()}}</p>
        <h4><a href="{{ route('post.details',$post->slug) }}"> {{ $post->title }}
             </a></h4>
        <p>
          {{ str_limit( $post->body , 20) }}....
        </p>
        <div class="meta-bottom d-flex justify-content-between">
          <p><span class="lnr lnr-eye"></span> {{ $post->view_count }} views</p>
          <p><span class="lnr lnr-enter"></span>   <a  href="{{ route('post.details',$post->slug) }}"> read more</a>
          </p>
        </div>

      </div>
      @empty
          <div class="col-lg-12 col-md-12">
              <div class="card h-100">
                  <div class="single-post post-style-1 p-2">
                     <strong>No Post Found :(</strong>
                  </div><!-- single-post -->
              </div><!-- card -->
          </div><!-- col-lg-4 col-md-6 -->
      @endforelse




  </div>
  <div class="row m-3 nav justify-content-center">
      <div class="col-lg-10 travel-right">
      <div class="form-group">

        <div class="nav justify-content-center m-3">
                    {{ $posts->links() }}
          </div>
    </div>
      </div>
        </div>

</section>
<!-- End fashion Area -->


















@endsection

@push('js')

@endpush
