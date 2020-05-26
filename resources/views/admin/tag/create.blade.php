


@extends('layouts.master')

@section('title', 'Tag')
@push('css')
<!-- Styles -->
<link href="{{ asset('admin/css/test.css') }}" rel="stylesheet">

@endpush
@section('content')



          <div class="d-flex mt-5 justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2 mt-5">add Tag</h1>
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



        <section class="col-sm-9 justify-content-center mx-2">
          <h2 class="m-2 color">Add Tag</h2>
          <form action="{{ route('admin.tag.store') }}" method="POST">
                          @csrf
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" id="name" class="form-control" name="name">
                                  <label class="form-label">Tag Name</label>
                              </div>
                          </div>

                          <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.tag.index') }}">BACK</a>
                          <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                      </form>
       </section>



        </main>





@endsection
