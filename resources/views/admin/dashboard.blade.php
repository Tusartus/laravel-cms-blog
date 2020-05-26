


@extends('layouts.master')

@section('title', 'Dashboard')
@push('css')
<!-- Styles -->
<link href="{{ asset('admin/css/test.css') }}" rel="stylesheet">

@endpush
@section('content')



          <div class="d-flex mt-5 justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2 mt-5">Resume</h1>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-sm-3 w-50">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">

                        </div>
                        <div class="content">
                            <div class="text">TOTAL POSTS</div>
                            <div class="number count-to " data-from="0" data-to="{{ $posts->count() }}" data-speed="15" data-fresh-interval="20">{{ $posts->count() }}</div>
                        </div>
                    </div>
                </div>
                <div class="info-box bg-pink hover-zoom-effect col-sm-3 w-50">
                      <div class="icon">

                      </div>
                      <div class="content">
                          <div class="text">CATEGORIES</div>
                          <div class="number count-to" data-from="0" data-to="{{ $category_count }}" data-speed="15" data-fresh-interval="20">{{ $category_count }}</div>
                      </div>
                  </div>
                  <div class="info-box bg-blue-grey hover-zoom-effect col-sm-3 w-50">
                      <div class="icon">

                      </div>
                      <div class="content">
                          <div class="text">TAGS</div>
                          <div class="number count-to" data-from="0" data-to="{{ $tag_count }}" data-speed="15" data-fresh-interval="20">{{ $tag_count }}</div>
                      </div>
                  </div>
                  <div class="info-box bg-purple hover-zoom-effect col-sm-3 w-50">
                      <div class="icon">

                      </div>
                      <div class="content">
                          <div class="text">TOTAL AUTHOR</div>
                          <div class="number count-to" data-from="0" data-to="{{ $author_count }}" data-speed="15" data-fresh-interval="20">{{ $author_count }}</div>
                      </div>
                  </div>
                  <div class="info-box bg-deep-purple hover-zoom-effect col-sm-3 w-50">
                      <div class="icon">

                      </div>
                      <div class="content">
                          <div class="text">TODAY AUTHOR</div>
                          <div class="number count-to" data-from="0" data-to="{{ $new_authors_today }}" data-speed="15" data-fresh-interval="20">{{ $new_authors_today }}</div>
                      </div>
                  </div>

                <div class="col-sm-3 w-50">
                    <div class="info-box bg-orange hover-expand-effect">

                        <div class="content">
                            <div class="text">TOTAL VIEWS</div>
                            <div class="number count-to" data-from="0" data-to="{{ $all_views }}" data-speed="1000" data-fresh-interval="20">{{ $all_views }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
          </div>

          <canvas class="my-0" id="myChart" width="0" height="0">   </canvas>



        <section class="col-sm-11 justify-content-center mx-2">
          <h2 class="m-2 color">Dashboard</h2>
          <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
     <div class="card">
         <div class="header">
             <h2>MOST POPULAR POST</h2>
         </div>
         <div class="body">
             <div class="table-responsive">
                 <table class="table table-hover dashboard-task-infos">
                     <thead>
                         <tr>
                             <th>Rank</th>
                             <th>Title</th>
                             <th>Author</th>
                             <th>Views</th>

                             <th>Comments</th>
                             <th>Status</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach($popular_posts as $key=>$post)
                             <tr>
                                 <td>{{ $key + 1 }}</td>
                                 <td>{{ str_limit($post->title,'20') }}</td>
                                 <td>{{ $post->user->name }}</td>
                                 <td>{{ $post->view_count }}</td>

                                 <td>{{ $post->comments_count }}</td>
                                 <td>
                                     @if($post->status == true)
                                         <span class="label bg-green">Published</span>
                                     @else
                                         <span class="label bg-red">Pending</span>
                                     @endif
                                 </td>
                                 <td>
                                     <a class="btn btn-sm btn-primary waves-effect" target="_blank" href="{{ route('post.details',$post->slug) }}">View</a>
                                 </td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
</div>
<!-- #END# Widgets -->

<div class="row clearfix mt-5">
 <!-- Task Info -->
 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
     <div class="card">
         <div class="header">
             <h2>TOP 10 ACTIVE AUTHOR</h2>
         </div>
         <div class="body">
             <div class="table-responsive">
                 <table class="table table-hover dashboard-task-infos">
                     <thead>
                     <tr>
                         <th>Rank List</th>
                         <th>Name</th>
                         <th>Posts</th>
                         <th>Comments</th>

                     </tr>
                     </thead>
                     <tbody>
                         @foreach($active_authors as $key=>$author)
                             <tr>
                                 <td>{{ $key + 1 }}</td>
                                 <td>{{ $author->name }}</td>
                                 <td>{{ $author->posts_count }}</td>
                                 <td>{{ $author->comments_count }}</td>

                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
 <!-- #END# Task Info -->

       </section>



        </main>





@endsection
