


@extends('layouts.master')

@section('title', 'Post')
<!-- Styles -->
@push('css')
<link href="{{ asset('admin/css/test.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.16/css/bootstrap-select.min.css" integrity="sha256-g19F2KOr/H58l6XdI/rhCdEK3NmB8OILHwP/QYBQ8M4=" crossorigin="anonymous" />
@endpush
@section('content')



          <div class="d-flex mt-5 justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2 mt-5">Add new Post</h1>

          </div>

          <canvas class="my-0" id="myChart" width="0" height="0"> </canvas>



           <section class="col-sm-9 justify-content-center mx-2">
          <h2 class="m-2 color">ADD NEW POST</h2>
          <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="row clearfix">
                   <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">

                           <div class="body">
                                   <div class="form-group form-float">
                                       <div class="form-line">
                                          <label class="form-label">Post Title</label>
                                           <input type="text" id="title" class="form-control" name="title">

                                       </div>
                                   </div>

                                   <div class="form-group">
                                       <label for="image">Featured Image</label>
                                       <input type="file" name="image">
                                   </div>

                               <div class="form-group">
                                   <input type="checkbox" id="publish" class="filled-in" name="status" value="1">
                                   <label for="publish">Publish</label>
                               </div>
                               <div class="form-group">
  <label for="comment">Body:</label>
  <textarea class="form-control" rows="5" name="body" id="comment"></textarea>
</div>

                           </div>
                       </div>
                   </div>
                   <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 mb-5">
                       <div class="card">
                           <div class="header">
                               <h2>
                                   Categories and Tags
                               </h2>
                           </div>
                           <div class="body">
                               <div class="form-group p-2">
                                   <div class="form-line {{ $errors->has('categories') ? 'focused error' : '' }}">
                                       <label for="category">Select Category:</label>
                                       <select name="categories[]" id="category" class="form-control" >
                                           @foreach($categories as $category)
                                               <option value="{{ $category->id }}">{{ $category->name }}</option>
                                           @endforeach
                                       </select>
                                   </div>
                               </div>

                               <div class="form-group p-2">
                                   <div class="form-line {{ $errors->has('tags') ? 'focused error' : '' }}">
                                       <label for="tag">Select Tags:</label>
                                       <select name="tags[]" id="tag" class="form-control">
                                           @foreach($tags as $tag)
                                               <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                           @endforeach
                                       </select>
                                   </div>
                               </div>


                           </div>
                       </div>
                       <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.category.index') }}">BACK</a>
                       <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>

                   </div>
               </div>


               </div>
           </form>

           </section>



        </main>





@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.16/js/bootstrap-select.min.js" integrity="sha256-COIM4OdXvo3jkE0/jD/QIEDe3x0jRuqHhOdGTkno3uM=" crossorigin="anonymous"></script>

<script>

    </script>





@endpush
