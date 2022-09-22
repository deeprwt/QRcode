@extends('layout.template')
@section('main')
  <div class="row">
      <div class="col-12">
          <div class="title">
            <h3>Zoom </h3>
          </div>
        <section class="my-4">
            <div class="card">
                <div class="card-body">
                
                  <table class="table table-striped">
                   <tbody>
                       @foreach ($data as $item)
                       <tr>
                        <th>media file Url {{ $loop->iteration  }} </th>
                        <td><a target="blank" href="{{ $item['url'] }}">{{ $item['url'] }}</a></td>
                    </tr>
                       @endforeach
                    
                   </tbody>
                  </table>
                </div>
              </div>
        </section>
        <section class="my-4">
            <div class="card">
                <div class="card-body">
                
                 <form action="{{ url('admin/create-files') }}" method="post"   >
                     @csrf
                   @if (count($data)!= 1)
                   @foreach ($data as $item)
                   <div class="row">
                     <div class="col-md-12">
                      <div class="form-group">
                        <label for="">{{ $item['url'] }}<sup class="text-danger">*</sup></label>
                        <div class="input-group">
                         <div class="input-group-prepend">
                          
                         </div>
                         <input type="text" class="form-control" name="name[]" required>
                        
                       </div>
                      </div>
                     </div>
                   </div>
                   <input type="hidden" name="path[]" value="{{ $item['url'] }}">
                   @endforeach
                   @else
                   <input type="hidden" name="path[]" value="{{ $item['url'] }}">
                
                   @endif
                 
                     <div class="form-group">
                       <label for="">Qr Url<sup class="text-danger">*</sup></label>
                       <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-gradient-primary text-white">code/</span>
                        </div>
                        <input type="text" class="form-control" name="qr" required>
                       
                      </div>
                     </div>
                    
                      <div class="text-right">
                        <div class="form-group">
                            <div class="custom-control custom-switch dis">
                                <input required type="checkbox" class="custom-control-input fa-3x" checked value="1" id="switch1">
                                <label class="custom-control-label pt-1" for="switch1">Downloadable</label>
                              </div>
                          </div>
                          <div class="my-3">
                            <button type="submit"  class="btn btn-success btn-fw">Create Files</button>
                          </div>
                      </div>
                 </form>
                </div>
              </div>
        </section>
      </div>
  </div>
@endsection