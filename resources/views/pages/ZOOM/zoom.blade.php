@extends('layout.template')
@section('main')
  <div class="row">
      <div class="col-12">
          <div class="title">
            <h3>Zoom </h3>
          </div>
        <section class="my-4">
          <form action="{{ url('admin/zoom-store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="">Video Path</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-gradient-primary text-white">bucket/</span>
                </div>
                <input type="text" name="path" class="form-control" required>
              
              </div>
            </div>
            <div class="form-group">
             
              <input type="file" name="file[]" multiple id="" class="form-control" accept="video/mp4,video/x-m4v,video/*"  aria-describedby="helpId">
              <small class="text-danger">Support only less then 100mb</small>
            </div>

            <div class="text-right">
              <button type="submit" class="btn btn-success ">Submit</button>
            </div>
          </form>
        </section>
      </div>
  </div>
@endsection