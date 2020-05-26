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
  <hr class="bg-info w-100">





      <!-- Start post Area -->
         <div class="post-wrapper pt-100">
             <!-- Start post Area -->
             <section class="post-area">
                 <div class="container">
                     <div class="row justify-content-center">

                         <div class="col-lg-8">
                             <div class="single-page-post">
                                 <img class="img-fluid" src="{{url('storage/post/'.$post->image)}}" alt="{{ $post->title }}">
                                 <div class="top-wrapper ">
                                     <div class="row d-flex justify-content-between">
                                         <h2 class="col-lg-8 col-md-12 text-uppercase">
                                             {{ $post->title }}
                                         </h2>
                                         <div class="col-lg-4 col-md-12 right-side d-flex justify-content-end">
                                             <div class="desc">
                                                <h2>by {{ $post->user->name }}</h2>
                                                 <h3>on:  {{ $post->created_at-> format('d/m/y H:i') }}</h3>
                                             </div>

                                         </div>
                                     </div>
                                 </div>
                                 <div class="tags">
                                     <ul>

                                         @foreach($categories as $category)
                                          <li>
                                        <a  href="{{ route('category.posts',$category->slug) }}">{{ $category->name }}</a>
                                        </li>
                                                       @endforeach
                                     </ul>
                                 </div>
                                 <div class="single-post-content">


                                     <blockquote> {{ ($post->body) }}
                                     <cite>by {{ $post->user->name }}</cite></blockquote>


                                 </div>

                                 <div class="bottom-wrapper">
                                     <div class="row">
                                         <div class="col-lg-4 single-b-wrap col-md-12">
                                             <i class="fa fa-eye" aria-hidden="true"></i>
                                             {{ $post->view_count }} views
                                         </div>
                                         <div class="col-lg-4 single-b-wrap col-md-12">
                                             <i class="fa fa-comment-o" aria-hidden="true"></i> {{ $post->comments->count() }} comments
                                         </div>
                                         <div class="col-lg-4 single-b-wrap col-md-12">


                                         </div>
                                     </div>
                                 </div>



                                 <!-- Start comment-sec Area -->
                                 <section class="comment-sec-area pt-80 pb-80">
                                     <div class="container">
                                         <div class="row flex-column">
                                             <h5 class="text-uppercase pb-80"> {{ $post->comments->count() }} Comments</h5>
                                             <br>

                                             @if($post->comments->count() > 0)
                                                 @foreach($post->comments as $comment)
                                             <div class="comment-list">
                                                 <div class="single-comment justify-content-between d-flex">
                                                     <div class="user justify-content-between d-flex">
                                                         <div class="thumb">
                                                             <img class="rounded" src="{{ url('storage/profile/'.Auth::user()->image)}}" width="40" height="50"  alt="Profile Image">
                                                         </div>
                                                         <div class="desc">
                                                             <h5><a href="#"> {{ $comment->user->name }}</a></h5>
                                                             <p class="date"> {{ $comment->created_at->diffForHumans()}}</p>
                                                             <p class="comment">
                                                                 {{ $comment->comment }}
                                                             </p>
                                                         </div>
                                                     </div>

                                                 </div>
                                             </div>
                                             @endforeach
                                         @else

                                         <div class="commnets-area  single-comment">

                                             <div class="comment">
                                                 <p>No Comment yet. Be the first :)</p>
                                         </div>
                                         </div>

                                         @endif










                                     </div>
                                 </section>
                                 <!-- End comment-sec Area -->

                                 <!-- Start commentform Area -->
                                 <section class="commentform-area  pb-120 pt-80 mb-100">
                                     <div class="container">
                                         <h5 class="text-uppercas pb-50">Leave a Reply</h5>
                                         @guest
                                   <span>For post a new comment. You need to login first. <a class="bt" href="{{ route('login') }}">Login</a></span>
                                         @else
                                   <form method="post" action="{{ route('comment.store',$post->id) }}">
                                       @csrf

                                            <div class="row flex-row d-flex">


                                             <div class="col-lg-6">
                                                 <textarea class="form-control mb-10"name="comment" rows="4" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>

                                                   <button class="submit-btn btn btn-info mt-20" type="submit" id="form-submit"><b>POST COMMENT</b></button>
                                             </div>
                                         </div>
                                       </form>
                                     @endguest


                                     </div>
                                 </section>
                                 <!-- End commentform Area -->

                             </div>
                         </div>
                         <div class="col-lg-4 sidebar-area ">



                             <div class="single_widget cat_widget">
                                 <h4 class="text-uppercase pb-20">post categories</h4>
                                 <ul>

                                     @foreach($categories as $category)
                                      <li>
                                    <a  href="{{ route('category.posts',$category->slug) }}">{{ $category->name }}</a>
                                    </li>
                                     @endforeach

                             </div>

                             <div class="single_widget recent_widget">
                                 <h4 class="text-uppercase pb-20">Recent Posts</h4>
                                 <div class="active-recent-carusel">

                                          @foreach($randomposts as $randompost)
                                     <div class="itema">
                                         <img src="{{ url('storage/post/'.$randompost->image) }}" width="240" height="150" alt="imagaesa">
                                         <p class="mt-2  text-uppercase">
                                           <a href="{{ route('post.details',$randompost->slug) }}"><b class="display-5">{{ $randompost->title }}</b></a><br>
                                         </p>

                                          <i class="fa fa-eye" aria-hidden="true"></i><span>{{ $randompost->view_count }}</span></p>
                                     </div>
                                   <hr>
                                         @endforeach





                                 </div>
                             </div>


                             <div class="single_widget tag_widget">
                                 <h4 class="text-uppercase pb-20">Tag </h4>
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
         </div>
         <!-- End post Area -->


         @endsection

         @push('js')

         @endpush
