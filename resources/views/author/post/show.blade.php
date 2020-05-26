@extends('layouts.app')

@section('content')

        <div class="col-md-7">
          <a href="{{ route('author.post.index') }}" class="btn btn-danger waves-effect">BACK</a>
          @if($post->is_approved == false)
              <button type="button" class="btn btn-danger waves-effect pull-right" disabled>
                  <span>Pending</span>
              </button>
          @else
              <button type="button" class="btn btn-success waves-effect pull-right" disabled>
                  <i class="material-icons">done</i>
                  <span>Approved</span>
              </button>
          @endif
          <br>
          <br>
           <div class="row clearfix">
               <div class=" col-sm-12 ">
                   <div class="card">
                     <div class="header">
                          <h2>
                            {{ $post->title }}
                              <small>Posted By <strong> <a href="">{{ $post->user->name }}</a></strong> on {{ $post->created_at->toFormattedDateString() }}</small>
                          </h2>
                        </div>
                          <div class="body">
                          {!! $post->body !!}
                        </div>
</div>
 </div>


 <div class=" col-sm-11 mt-2 ">
     <div class="card p-2">
         <div class="header">
             <h2>
                 Categories and Tags
             </h2>
           <hr>
         </div>
         <div class="body">
             <div class="form-group form-float">
                 <div class="form-line">
                     <label for="category">Category:</label>
                     <div class="body">
           @foreach($post->categories as $category)
               <span class="label bg-cyan">{{ $category->name }}</span>
           @endforeach
       </div>

                 </div>
             </div>

             <div class="form-group form-float">
                 <div class="form-line">
                     <label for="tag"> Tags:</label>
                     <div class="body">
        @foreach($post->tags as $tag)
            <span class="label bg-green">{{ $tag->name }}</span>
        @endforeach
    </div>
                 </div>
             </div>



         </div>
     </div>
 </div>
</div>


<div class="row clearfix m-3">
    <div class="col-sm-12">
        <div class="card p-3">
            <div class="header">
                <h2>
                 Image
                </h2>
            </div>
            <div class="body">
               <img class="img-responsive thumbnail" src="{{url('storage/post/'.$post->image)}}" width="400" height="120" alt="">
            </div>
        </div>


    </div>
</div>






                   </div>
               </div>











        </div>




    </div>
</div>
@endsection
