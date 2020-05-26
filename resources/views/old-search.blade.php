@extends('layouts.app')
@section('title')
{{ $query }}
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



<div class="slider display-table center-text">
        <h1 class="title display-table-cell"><b>{{ $posts->count() }} Results for {{ $query }}</b></h1>
    </div><!-- slider -->

    <section class="blog-area section">
        <div class="container">

            <div class="row">
                    @forelse($posts as $post)
                        <div class="col-sm-4 col-md-6 m-2">
                            <div class="card h-100">
                                <div class="single-post post-style-1">

                                    <div class="blog-image"><img class="blog-image img-responsive" src="{{ url('storage/post/'.$post->image) }}" width="360" height="100" alt="{{ $post->title }}"></div>



                                    <div class="blog-info">

                                        <h4 class="display-5"><a href="{{ route('post.details',$post->slug) }}"><b>{{ $post->title }}</b></a></h4>

                                        <ul class="post-footer nav">


                                            <li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-comments"></i>{{ $post->comments->count() }}</a></li>
                                            <li class="nav-item"><a class="nav-link" ref="#"><i class="fa fa-eye"></i>{{ $post->view_count }}</a></li>
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

@endpush
