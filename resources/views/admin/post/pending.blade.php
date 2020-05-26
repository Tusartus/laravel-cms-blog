


@extends('layouts.master')

@section('title', 'Tag')
@push('css')
<!-- Styles -->
<link href="{{ asset('admin/css/test.css') }}" rel="stylesheet">

@endpush
@section('content')



          <div class="d-flex mt-5 justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2 mt-5">All Posts  </h1>
        <a class="btn btn-primary waves-effect" href="{{ route('admin.post.create') }}">
        <!--    <i class="material-icons">add</i> -->
            <span>Add New Post</span>
        </a>
        </div>

          </div>

          <canvas class="my-0" id="myChart" width="0" height="0"> </canvas>



  <section class="col-sm-12 justify-content-center mx-2">
    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        ALL POSTS
                        <span class="badge bg-blue">{{ $posts->count() }}</span>
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th><i class="material-icons">visibility</i></th>
                                <th>Is Approved</th>
                                <th>Status</th>
                                <th>Created At</th>
                                {{--<th>Updated At</th>--}}
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th><i class="material-icons">visibility</i></th>
                                <th>Is Approved</th>
                                <th>Status</th>
                                <th>Created At</th>
                                {{--<th>Updated At</th>--}}
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                @foreach($posts as $key=>$post)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ str_limit($post->title,'10') }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ $post->view_count }}</td>
                                        <td>
                                            @if($post->is_approved == true)
                                                <span class="badge bg-blue">Approved</span>
                                            @else
                                                <span class="badge bg-pink">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($post->status == true)
                                                <span class="badge bg-blue">Published</span>
                                            @else
                                                <span class="badge bg-pink">Pending</span>
                                            @endif
                                        </td>
                                        <td>{{ $post->created_at }}</td>
                                        {{--<td>{{ $post->updated_at }}</td>--}}
                                        <td class="text-center">
                                            @if($post->is_approved == false)

                                                <form method="post" action="{{ route('admin.post.approve',$post->id) }}"  class="form-inline" id="approval-form-{{ $post->id }}" >
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-danger" type="submit">
                                                    Done
                                                     </button>
                                                </form>
                                            @endif

                                          
                                            <a href="{{ route('admin.post.show',$post->id) }}" class="btn btn-info waves-effect">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                            <a href="{{ route('admin.post.edit',$post->id) }}" class="btn btn-info waves-effect">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <button class="btn btn-danger waves-effect" type="button" onclick="deletePost({{ $post->id }})">
                                                <i class="material-icons">delete</i>
                                            </button>
                                            <form id="delete-form-{{ $post->id }}" action="{{ route('admin.post.destroy',$post->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
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
    <!-- #END# Exportable Table -->



 </section>




        </main>





@endsection

@push('js')
<script>




</script>

@endpush
