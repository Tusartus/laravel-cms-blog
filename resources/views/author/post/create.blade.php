@extends('layouts.app')

@section('content')

        <div class="col-md-7">
          <form action="{{ route('author.post.store') }}" method="POST" enctype="multipart/form-data">
           @csrf
           <div class="row clearfix">
               <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                   <div class="card">
                       <div class="header">
                           <h2>
                              ADD NEW POST
                           </h2>
                       </div>
                       <div class="body p-2">
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

                       </div>
                   </div>
               </div>
               <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                   <div class="card p-2">
                       <div class="header">
                           <h2>
                               Categories and Tags
                           </h2>
                         <hr>
                       </div>
                       <div class="body">
                           <div class="form-group for">
                               <div class="form-line {{ $errors->has('categories') ? 'focused error' : '' }}">
                                   <label for="category">Select Category:</label>
                                   <select name="categories[]" id="category" class="form-control">
                                       @foreach($categories as $category)
                                           <option value="{{ $category->id }}">{{ $category->name }}</option>
                                       @endforeach
                                   </select>
                               </div>
                           </div>

                           <div class="form-group form-float">
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
               </div>
           </div>
           <div class="row clearfix m-3">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <div class="card p-3">
                       <div class="header">
                           <h2>
                              BODY:
                           </h2>
                       </div>
                       <div class="body">
                           <textarea id="tinymce" rows="5" cols="50" name="body"></textarea>
                       </div>
                   </div>
                   <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('author.post.index') }}">BACK</a>
                   <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>

               </div>
           </div>
       </form>








        </div>




    </div>
</div>
@endsection
