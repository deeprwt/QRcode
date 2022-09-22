@extends('layout.template')
@section('main')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Student Report Status</h4>
 
        <form class="form-inline" method="post" action="{{ url('admin/student-resource-getstudnet') }}">
            @csrf
           
          <label class="sr-only" for="inlineFormInputName2">ISFO Roll No</label>
          <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="sid" placeholder="ISFO2021..">
         
          <button type="submit" class="btn btn-gradient-primary mb-2">Submit</button>
        </form>
      </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-body">
            @isset($data)
                {{ $data }}
            @endisset
        </div>
    </div>
  </div>
@endsection