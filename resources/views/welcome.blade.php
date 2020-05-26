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


          <!-- Start category Area -->
          <section class="category-area section-gap" id="news">
            <div class="container">



              <div class="row mt-4">
                 @forelse($categories as $category)

                <div class="item single-cat col-lg-3 h-25">
                     <a class="card p-2" href="{{ route('category.posts',$category->slug) }}">
                  <img src="{{url('storage/category/slider/'.$category->image)}}" alt="{{ $category->name }}">
                  <p class="date"> {{ $category->created_at->diffForHumans()}}</p>
                  <h4><a href="{{ route('category.posts',$category->slug) }}">{{ $category->name }}</a></h4>
                    </a>
                </div>


                @empty

                <div class="item single-cat">
                  <img src="bloger/img/c2.jpg" alt="">
                  <p class="date">no data</p>
                  <h4><a href="#"> No data found</a></h4>
                </div>


              @endforelse




              </div>
            </div>
          </section>
          <!-- End category Area -->






          <!-- Start post Area -->
               <section class="post-area">
                   <div class="container">
                       <div class="row justify-content-center d-flex">


<div class="col-lg-8">


  <div class="post-lists">
@forelse($posts as $post)
                            <div class="single-list flex-row d-flex">
                                <div class="thumb">
                                    <div class="date">
                                        <span> {{ $post->created_at->diffForHumans()}}</span><br>
                                    </div>
                                    <img src="{{url('storage/post/'.$post->image)}}" alt=" {{ $post->title }}" width="320" height="80">
                                </div>
                                <div class="detail">
                                    <a href="{{ route('post.details',$post->slug)}}"><h4 class="pb-20">
                                     {{ $post->title }}</h4></a>
                                    <p>
                                        {{ str_limit( $post->body , 35) }}....
                                    </p>
                                    <p class="footer pt-20">
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    <a href="">{{ $post->view_count }} views</a>     <i class="ml-20 fa fa-comment-o" aria-hidden="true"></i> <a href="{{ route('post.details',$post->slug) }}"> view more</a>
                                    </p>
                                </div>
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



                            <div class="justify-content-center d-flex">
                                <a class="text-uppercase primary-btn loadmore-btn mt-40 mb-60" href="{{ route('post.index') }}"> Load More</a>
                            </div>

                        </div>









      </div>





    <div class="col-lg-3 sidebar-area">



                     <div class="single_widget cat_widget">
                         <h4 class="text-uppercase pb-20">post categories</h4>
                         <ul>


                             @foreach($categories as $category)
                      <li class="nav-item">
                    <a  href="{{route('category.posts',$category->slug) }}">{{ $category->name }}</a>
                    </li>
                                   @endforeach

                         </ul>
                     </div>




                     <div class="single_widget tag_widget">
                         <h4 class="text-uppercase pb-20">Tag Clouds</h4>
                         <ul>




                             @foreach($post->tags as $tag)
                        <li><a href="{{ route('tag.posts',$tag->slug) }}">{{ $tag->name }}</a></li>
                             @endforeach
                         </ul>
                     </div>
                 </div>



               </div>
                   </div>
               </section>
               <!-- End post Area -->




    @endsection

    @push('js')

    @endpush
