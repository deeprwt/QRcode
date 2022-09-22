@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block custom-alert">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block custom-alert">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-block custom-alert">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('DelSuccess'))
<div class="alert alert-info alert-block custom-alert">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('success'))
<div class="alert alert-info alert-block custom-alert">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
@isset($success)
@if ($message = $success)
<div class="alert alert-info alert-block custom-alert">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif  
@endisset
@isset($error)
@if ($message = $error)
<div class="alert alert-danger alert-block custom-alert">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif  
@endisset
@if ($message = Session::get('DelError'))
<div class="alert alert-info alert-block custom-alert">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    Check the following errors :(
</div>
@endif

@if ($errors->any())
@foreach ($errors->all() as $error)

<div class="m-1 ">
<div class="alert text-left alert-danger " style="display:inline-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {{ $error }}
</div>
</div>
  @endforeach

@endif