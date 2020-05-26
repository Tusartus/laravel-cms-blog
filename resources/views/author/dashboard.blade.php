@extends('layouts.app')

@section('content')





        <div class="col-md-10 offset-md-2">
            <div class="card">
                <div class="card-header"> Dashboard</div>

                <div class="card-body mb-2 mt-2">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                </div>

                <div class="col-sm-10">
                  <ul class="nav">
                    <li class="nav-item w-50 h-50 btn btn-success ">
                      <a class="nav-link text-white" href="#">Total posts  <i class="fa fa-eye"></i> {{ $posts->count() }}</a>
                    </li>
                    <li class="nav-item w-50 h-50 btn btn-info float-right">
                      <a class="nav-link text-white" href="#">Total views  <i class="fa fa-eye"></i> {{ $all_views }}</a>
                    </li>


                  </ul>
                </div>
                <!-- Task Info -->
                     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                         <div class="card">
                             <div class="header">
                                 <h2>TOP 5 POPULAR POSTS</h2>
                             </div>
                             <div class="body">
                                 <div class="table-responsive">
                                     <table class="table table-hover dashboard-task-infos">
                                         <thead>
                                         <tr>
                                             <th>Rank List</th>
                                             <th>Title</th>
                                             <th>Views</th>

                                             <th>Comments</th>
                                             <th>Status</th>
                                         </tr>
                                         </thead>
                                         <tbody>
                                             @foreach($popular_posts as $key=>$post)
                                                 <tr>
                                                     <td>{{ $key + 1 }}</td>
                                                     <td>{{ str_limit($post->title,30) }}</td>
                                                     <td>{{ $post->view_count }}</td>

                                                     <td>{{ $post->comments_count }}</td>
                                                     <td>
                                                         @if($post->status == true)
                                                             <span class="label bg-green">Published</span>
                                                         @else
                                                             <span class="label bg-red">Pending</span>
                                                         @endif
                                                     </td>
                                                 </tr>
                                             @endforeach
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- #END# Task Info -->



            </div>

        </div>

    </div>
</div>
@endsection
