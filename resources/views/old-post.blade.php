@extends('layouts.app')
@section('title', 'Page home')
@section('css')
  <link href="{{ asset('css/appnw.css') }}" rel="stylesheet">


@endsection

@section('content')



         <div class="m-3"></div>
          <section class="mx-2 my-2">
        <div class="row">
        <div class="col">

          <ul class="nav justify-content-center responsive">
             @forelse($categories as $category)
            <li class="nav-item card  m-2 item">
              <a class="nav-link" href="#">
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

                  <div class="blog-post-inner col-sm-12">




                          <span class="post-info">
                <img class="img-responsive w-100" src="{{url('storage/post/'.$post->image)}}" alt="{{ $post->title }}" width="360" height="300">
                         </span>

                            <strong class="name" href="#">By  <b>{{ $post->user->name }}</b></strong>
                                 <span class="date">on {{ $post->created_at->diffForHumans() }}</span>




                         <h3 class="title"><b>{{ $post->title }}</b></h3>

                         <div class="para">
                             {{ ($post->body) }}
                         </div>


                     </div><!-- blog-post-inner -->

                     <div class="post-icons-area">
                       <ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#"> <i class="fa fa-comments"></i>{{ $post->comments->count() }}</a></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#"> <i class='fa fa-eye' style='font-size:20px'></i>{{ $post->view_count }}</a></a>
  </li>

</ul>

                                          </div>

                                          <section class="comment-section" style="margin-top:150px;">
                                                 <div class="container">
                                                     <h4><b>POST COMMENT</b></h4>
                                                     <div class="row">

                                                         <div class="col-sm-7 mt-5">
                                                             <div class="comment-form">
                                                                           @guest
                                                                     <span>For post a new comment. You need to login first. <a class="bt" href="{{ route('login') }}">Login</a></span>
                                                                           @else
                                                                     <form method="post" action="{{ route('comment.store',$post->id) }}">
                                                                         @csrf
                                                                         <div class="row">
                                                                             <div class="col-sm-12 form-group">
                                                                                 <textarea name="comment" rows="4" class="text-area-messge form-control"
                                                                                           placeholder="Enter your comment" aria-required="true" aria-invalid="false"></textarea >
                                                                             </div><!-- col-sm-12 -->
                                                                             <div class="col-sm-12 m-3">
                                                                                 <button class="submit-btn btn btn-info" type="submit" id="form-submit"><b>POST COMMENT</b></button>
                                                                             </div><!-- col-sm-12 -->

                                                                         </div><!-- row -->
                                                                     </form>
                                                                   @endguest
                                                             </div><!-- comment-form -->
<hr>


                    <h4><b>COMMENTS({{ $post->comments()->count() }})</b></h4>
                    @if($post->comments->count() > 0)
                        @foreach($post->comments as $comment)
                            <div class="commnets-area ">

                                <div class="comment">

                                    <div class="post-info">

                                        <div class="left-area flaot-left">
                                            <a class="avatar" href="#">
                                              <img class="rounded" src="{{ url('storage/profile/'.Auth::user()->image) }}"  width="40" height="50"  alt="Profile Image">
                                            </a>
                                           </div>
                                        <div class="middle-area float-right">
                                            <a class="name" ><b>{{ $comment->user->name }}</b></a>
                                            <h6 class="date">on {{ $comment->created_at->diffForHumans()}}</h6>
                                        </div>
                            <p>{{ $comment->comment }}</p>
                                    </div><!-- post-info -->



                                </div>

                            </div><!-- commnets-area -->
                        @endforeach
                    @else

                    <div class="commnets-area ">

                        <div class="comment">
                            <p>No Comment yet. Be the first :)</p>
                    </div>
                    </div>

                    @endif


                                                         </div><!-- col-lg-8 col-md-12 -->

                                                     </div><!-- row -->

                                                 </div><!-- container -->
                                             </section>





                                             <section class="recomended-area section">
                                               <h4 class="display-5"> Recommend posts   </h4>
                                                 <div class="container">
                                                     <div class="row">

                                                         @foreach($randomposts as $randompost)
                                                             <div class="col-sm-4 ">
                                                                 <div class="card h-100">
                                                                     <div class="single-post post-style-1">

                                                                         <div class="blog-image"><img class="img-thumbnail"  src="{{ url('storage/post/'.$randompost->image) }}" width="160" height="100" alt="{{ $randompost->title }}"></div>



                                                                         <div class="blog-info">

                                                                             <h4 class="display-5"><a href="{{ route('post.details',$randompost->slug) }}"><b>{{ $randompost->title }}</b></a></h4>

                                                                             <ul class="post-footer">


                                                                                 <li><a href="#"><i class="ion-eye"></i>{{ $randompost->view_count }}</a></li>
                                                                             </ul>

                                                                         </div><!-- blog-info -->
                                                                     </div><!-- single-post -->
                                                                 </div><!-- card -->
                                                             </div><!-- col-lg-4 col-md-6 -->
                                                         @endforeach
                                                     </div><!-- row -->

                                                 </div><!-- container -->
                                             </section>




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
            <a class="nav-link" href="{{ route('category.posts',$category->slug) }}">{{ $category->name }}</a>
            </li>
                           @endforeach
           </ul>

        </div>


        <div class="my-4 card">
          <h1 class="my-2 mx-2"> Tags</h1>
          <ul class="nav flex-column">


                      @foreach($post->tags as $tag)
                                  <li><a href="{{ route('tag.posts',$tag->slug) }}">{{ $tag->name }}</a></li>
                              @endforeach

           </ul>

        </div>





        </div>





        </div>
        </div>



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
