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

<div class="slider display-table center-text jumbotron btn btn-info col-md-12">
        <h1 class="title display-table-cell text-white b-5"><b>{{ $category->name }}</b></h1>
    </div><!-- slider -->

    <section class="blog-area section">
        <div class="container">

            <div class="row">
                    @forelse($posts as $post)
                        <div class="col-md-4 mt-2">
                            <div class="card w-100">
                                <div class="single-post post-style-1">

                                    <div class="blo img-responsive"><img class="img-thumbnail img-responsive" src="{{ url('storage/post/'.$post->image) }}" width="340" height="190" alt="{{ $post->title }}"></div>


                                    <div class="blog-info mt-3">

                                        <h4 class="display-6"><a href="{{ route('post.details',$post->slug) }}"><b>{{ $post->title }}</b></a></h4>

                                        <ul class="post-footer">


                                            <li><a href="#"><i class="fa fa-eye "></i>{{ $post->view_count }}</a></li>
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

            {{--{{ $posts->links() }}--}}

        </div><!-- container -->
    </section><!-- section -->


@endsection
@push('js')
<script type="text/javascript">


</script>


@endpush
