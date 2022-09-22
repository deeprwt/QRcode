@extends('layout.template')
@section('main')
  <div class="row">
      <div class="col-12">
          <div class="title">
            <h3>Nep </h3>
          </div>
        <section class="my-4">
          <form action="{{ url('admin/nep-store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="">QR code path</label>
              <div class="input-group">
                <div class="input-group-prepend">
                    
                </div>
                <input type="text" name="path" class="form-control" placeholder="nep/gmr/" required>
              
              </div>
            </div>
            <div class="form-group">
             
              <input type="file" name="file"  id="" class="form-control"  aria-describedby="helpId" accept="application/pdf">
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