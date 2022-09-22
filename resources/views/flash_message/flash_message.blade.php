
    @if ($message = Session::get('error'))
    <div class="alert text-left alert-danger border-0 bg-white    alert-block " style="box-shadow:0px 2px 2px 0px #d9544f48;  position:absolute;top:1rem;right:1rem;min-width:20vw;max-width:100%;border-left:4px solid #d9534f !important;
    ">
        <button type="button" class="close mt-2" data-dismiss="alert">×</button>
        <strong class="text-danger">ERROR </strong><br>
        <p class="text-dark" style="margin-top:-5px"> {{ $message }}</p>
    </div>
    @endif
    
    @if ($message = Session::get('warning'))
    <div class="text-right m-1 ">
    <div class="alert text-left alert-warning alert-block "  style="box-shadow:0px 2px 2px 0px #f0ac4e36;  position:absolute;top:1rem;right:1rem;min-width:20vw;max-width:100%;border-left:4px solid #f0ad4e !important;
    " >
         <button type="button" class="close mt-2" data-dismiss="alert">×</button>
         <strong class="text-danger">WARNING </strong><br>
         <p class="text-dark" style="margin-top:-5px"> {{ $message }}</p>
    </div>
    </div>
    @endif
    
    @if ($message = Session::get('info'))
    <div class="text-right m-1 ">
    <div class="alert text-left alert-info alert-block "  style="box-shadow:0px 2px 2px 0px #5bc0de41;  position:absolute;top:1rem;right:1rem;min-width:20vw;max-width:100%;border-left:4px solid #5bc0de !important;
    " >
        <button type="button" class="close mt-2" data-dismiss="alert">×</button>
        <strong class="text-danger">INFO </strong><br>
        <p class="text-dark" style="margin-top:-5px"> {{ $message }}</p>
    </div>
    </div>
    @endif
    
    @if ($message = Session::get('DelSuccess'))
    <div class="text-right m-1 ">
    <div class="alert text-left alert-info alert-block "  style="box-shadow:0px 2px 2px 0px #5cb85c48;  position:absolute;top:1rem;right:1rem;min-width:20vw;max-width:100%;border-left:4px solid #5cb85c !important;
    " >
         <button type="button" class="close mt-2" data-dismiss="alert">×</button>
         <strong class="text-danger">success </strong><br>
         <p class="text-dark" style="margin-top:-5px"> {{ $message }}</p>
    </div>
    </div>
    @endif
    @if ($message = Session::get('success'))
    <div class="text-right m-1 ">
    <div class="alert text-left alert-info alert-block "  style="box-shadow:0px 2px 2px 0px #5cb85c48;  position:absolute;top:1rem;right:1rem;min-width:20vw;max-width:100%;border-left:4px solid #5cb85c !important;
    " >
       <button type="button" class="close mt-2" data-dismiss="alert">×</button>
       <strong class="text-danger">success </strong><br>
       <p class="text-dark" style="margin-top:-5px"> {{ $message }}</p>
    </div>
    </div>
    @endif
    {{-- @isset($success)
    @if ($message = $success)
    <div class="alert text-left alert-info alert-block "  style="box-shadow:0px 2px 2px 0px #d9544f48;  position:absolute;top:1rem;right:1rem;min-width:20vw;max-width:100%;border-left:4px solid #d9534f !important;
    " >
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif  
    @endisset --}}
    
    
    @if ($message = Session::get('DelError'))
    <div class="text-right m-1 ">
    <div class="alert text-left alert-info alert-block "  style="box-shadow:0px 2px 2px 0px #d9544f48;  position:absolute;top:1rem;right:1rem;min-width:20vw;max-width:100%;border-left:4px solid #d9534f !important;
    " >
       <button type="button" class="close mt-2" data-dismiss="alert">×</button>
       <strong class="text-danger">ERROR </strong><br>
       <p class="text-dark" style="margin-top:-5px"> {{ $message }}</p>
    </div>
    </div>
    @endif
    
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    
    <div class="text-right m-1 ">
    <div class="alert text-left alert-danger " style="display:inline-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong class="text-danger">ERROR </strong><br>
        <p class="text-dark" style="margin-top:-5px">  {{ $error }}</p>
       
    </div>
    </div>
      @endforeach
    
    @endif
   
    {{-- @if($errors->has())
    @foreach ($errors->all() as $error)
    <p class="yellow-text font lato-normal center">{{ $error }}</p>
    @endforeach
    @endif --}}
