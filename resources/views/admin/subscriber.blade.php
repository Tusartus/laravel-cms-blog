


@extends('layouts.master')

@section('title', 'Tag')
@push('css')
<!-- Styles -->
<link href="{{ asset('admin/css/test.css') }}" rel="stylesheet">

@endpush
@section('content')



          <div class="d-flex mt-5 justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2 mt-5"></h1>
            <div class="block-header">
              <div class="header">
                                  <h2>
                                      ALL SUBSCRIBERS
                                      <span class="badge bg-blue">{{ $subscribers->count() }}</span>
                                  </h2>
                              </div>
        </div>

          </div>

          <canvas class="my-0" id="myChart" width="0" height="0"> </canvas>



  <section class="col-sm-12 justify-content-center mx-2">
    <div class="body">
                           <div class="table-responsive">
                               <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                   <thead>
                                   <tr>
                                       <th>ID</th>
                                       <th>Email</th>
                                       <th>Created At</th>
                                       <th>Updated At</th>
                                       <th>Action</th>
                                   </tr>
                                   </thead>
                                   <tfoot>
                                   <tr>
                                       <th>ID</th>
                                       <th>Email</th>
                                       <th>Created At</th>
                                       <th>Updated At</th>
                                       <th>Action</th>
                                   </tr>
                                   </tfoot>
                                   <tbody>
                                       @foreach($subscribers as $key=>$subscriber)
                                           <tr>
                                               <td>{{ $key + 1 }}</td>
                                               <td>{{ $subscriber->email }}</td>
                                               <td>{{ $subscriber->created_at }}</td>
                                               <td>{{ $subscriber->updated_at }}</td>
                                               <td class="text-center">

                                                   <form id="delete-form-{{ $subscriber->id }}" action="{{ route('admin.subscriber.destroy',$subscriber->id) }}" method="POST" >
                                                       @csrf
                                                       @method('DELETE')
                                                       <button class="btn btn-danger waves-effect" type="submit" >
                                                           delete
                                                       </button>
                                                   </form>
                                               </td>
                                           </tr>
                                       @endforeach
                                   </tbody>
                               </table>
                           </div>
                       </div>




 </section>




        </main>





@endsection

@push('js')
<script>




</script>

@endpush
