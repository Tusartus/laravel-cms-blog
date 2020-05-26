


@extends('layouts.master')

@section('title', 'Tag')
@push('css')
<!-- Styles -->
<link href="{{ asset('admin/css/test.css') }}" rel="stylesheet">

@endpush
@section('content')



          <div class="d-flex mt-5 justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2 mt-5"> Post detail
             </h1>

        </div>

          </div>

          <canvas class="my-0" id="myChart" width="0" height="0"> </canvas>



  <section class="col-sm-10 justify-content-center mx-2">
    <div class="container-fluid">
           <!-- Vertical Layout | With Floating Label -->
           <a href="{{ route('admin.post.index') }}" class="btn btn-danger waves-effect">BACK</a>
           @if($post->is_approved == false)
           <button type="submit"   class="btn btn-success waves-effect pull-right">

               <span>not Approve</span>
           </button>
               <form method="post" action="{{ route('admin.post.approve',$post->id) }}" id="approval-form" style="display: none">
                   @csrf
                   @method('PUT')

               </form>
           @else
               <button type="button" class="btn btn-success pull-right" disabled>

                   <span>Approved</span>
               </button>
           @endif
           <br>
           <br>
               <div class="row clearfix">
                   <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
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
                   <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                       <div class="card">
                           <div class="header bg-cyan">
                               <h2>
                                   Categoryies
                               </h2>
                           </div>
                           <div class="body">
                               @foreach($post->categories as $category)
                                   <span class="label bg-cyan">{{ $category->name }}</span>
                               @endforeach
                           </div>
                       </div>
                       <div class="card">
                           <div class="header bg-green">
                               <h2>
                                   Tags
                               </h2>
                           </div>
                           <div class="body">
                               @foreach($post->tags as $tag)
                                   <span class="label bg-green">{{ $tag->name }}</span>
                               @endforeach
                           </div>
                       </div>
                       <div class="card">
                           <div class="header bg-amber">
                               <h2>
                                   Featured Image
                               </h2>
                           </div>
                           <div class="body">
                               <img class="img-responsive thumbnail" src="{{url('storage/post/'.$post->image)}}" width="180" height="85" alt="">
                           </div>
                       </div>

                   </div>
               </div>
       </div>



 </section>




        </main>





@endsection

@push('js')
<script>




</script>

@endpush
