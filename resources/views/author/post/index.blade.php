@extends('layouts.app')

@section('content')

        <div class="col-md-7">


          <div class="block-header">
                      <a class="btn btn-primary waves-effect" href="{{ route('author.post.create') }}">
                          <i class="material-icons">add</i>
                          <span>Add New Post</span>
                      </a>
                  </div>
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
                                                              <span class="badge bg-blue btn btn-info">Approved</span>
                                                          @else
                                                              <span class="badge bg-pink btn btn-danger">Pending</span>
                                                          @endif
                                                      </td>
                                                      <td>
                                                          @if($post->status == true)
                                                              <span class="badge bg-blue btn btn-info">Published</span>
                                                          @else
                                                              <span class="badge bg-pink btn btn-danger">Pending</span>
                                                          @endif
                                                      </td>
                                                      <td>{{ $post->created_at }}</td>
                                                      {{--<td>{{ $post->updated_at }}</td>--}}
                                                      <td class="text-center">
                                                          <a href="{{ route('author.post.show',$post->id) }}" class="btn btn-info waves-effect mb-1">
                                                              <i class="material-icons">visibility</i>
                                                          </a>
                                                          <a href="{{ route('author.post.edit',$post->id) }}" class="btn btn-info waves-effect mb-1">
                                                              <i class="material-icons">edit</i>
                                                          </a>
                                                          <form action="{{route('author.post.destroy',$post->id )}}" id="delete" class="form-inline mb-1" method="post">
                                                          @csrf
                                                           @method('DELETE')

                                                           <button class="btn btn-danger" type="submit">
                                                             Delete
                                                            </button>
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














                  </div>




              </div>
          </div>
          @endsection
