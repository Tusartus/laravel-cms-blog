


@extends('layouts.master')

@section('title', 'dashboard')
@push('css')
<!-- Styles -->
<link href="{{ asset('admin/css/test.css') }}" rel="stylesheet">

@endpush
@section('content')



          <div class="d-flex mt-5 justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2 mt-5">All Tag</h1>
            <div class="block-header">
        <a class="btn btn-primary waves-effect" href="{{ route('admin.tag.create') }}">
        <!--    <i class="material-icons">add</i> -->
            <span>Add New Tag</span>
        </a>
        </div>
            <!--
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary mr-3">nameadmin</button>
                <button type="button" class="btn btn-sm btn-outline-secondary mr-3">name@gmail.com</button>
              </div>
              <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div>-->
          </div>

          <canvas class="my-0" id="myChart" width="0" height="0"> </canvas>



  <section class="col-sm-10 justify-content-center mx-2">
 <h2 class="m-2 color">Tags: </h2>

    <div class="table-responsive">
      <table id="datatage" class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>name</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>

          @foreach($tags as $key=> $tag)


          <tr>
            <td>{{$key + 1}}</td>

            <td>{{$tag->name }}</td>
            <td>{{ $tag->created_at }}</td>
            <td>{{ $tag->updated_at }}</td>
            <td>
              <a href="{{route('admin.tag.edit',$tag->id) }}" class="btn btn-success mr-2">Edit</a>

            </td>
            <td>

              <form action="{{route('admin.tag.destroy',$tag->id )}}" id="delete" method="post">
                 {{ csrf_field() }}
                 {{ method_field('DELETE') }}

                 <button    class="btn btn-danger" type="submit">
                             Delete
                     </button>
                </form>
            </td>
          </tr>






        @endforeach
        </tbody>
      </table>
    </div>

 </section>




        </main>





@endsection

@push('js')
<script>




</script>

@endpush
