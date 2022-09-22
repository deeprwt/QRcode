<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ZoomController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            '*'=>'required',
           ]);
           if($validator->fails()){
               return back()->withInput()->withErrors($validator);
           }
           $path = 'bucket/'.$request->path;
        if (! File::exists($path)) {
                mkdir($path, 0777, true);
           }
        //    else{
        //        return back()->with('error','dir exits');
        //    }
           foreach($request->file('file') as $item){
               $file = $item;
            $fileName = $file->getClientOriginalName();
            $disk = Storage::disk('local');
            $disk->put($path.'/'.$fileName, fopen($file, 'r+'));
            $uri[] = array(
                'url'=>url($path.'/'.$fileName),
            );

           }
        //    return $uri;
        //    if(count($uri) == 1){
        //        return $uri;
            return view('pages.zoom_step2')->with('data',$uri);
        //    }
        //    return $uri;
          
            //return back()->with('success','file uploaded sucessfully');
       
    }
    public function createCode(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            '*'=>'required',
           ]);
      
           if($validator->fails()){
               return redirect('admin/home')->with('error','Fill data proper');
           }
          
           $qr = 'code/'.$request->qr;
           if (! File::exists($qr)) {
            mkdir($qr, 0777, true);
             }
            //  else{
            //      return redirect('admin/home')->with('error','dir exists');
            //  }

             if(count($request->path) == 1 ){
                 foreach($request->path as $it){
                    $codes = url('doNotTouch/single_media.html');
                    //  return $codes;
                      $strToFind = 'mediaFileUrlByAtul';
                      $codeFile =  file_get_contents('doNotTouch/single_media.html');
                     
                      $file_contents = str_replace($strToFind,$it,$codeFile);
                      $disk = Storage::disk('local');
                      $disk->put($qr.'/index.html', $file_contents);
         
                 }
              
             }else{
                $vdoname = $request->name;
                $vdotag = '';
                $num =1 ;
                $arrycheck = 0;
              foreach($request->path as $item){
                  $vdotag .= '<a href="javascript:void(0)" data="'.$item.'"  id="card'.$num.'" class="col-lg-2 col-md-3 col-5 p-0 m-2 d-flex flex-column justify-content-start align-items-center rounded">
                  <div class="container-fluid text-center bg-light">
                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="100px" viewBox="0 0 24 24" width="100px" fill="#6611f2"><g><rect fill="none" height="24" width="24"/></g><g><path d="M12,2C6.48,2,2,6.48,2,12s4.48,10,10,10s10-4.48,10-10S17.52,2,12,2z M9.5,16.5v-9l7,4.5L9.5,16.5z"/></g></svg>
                  </div>
                  <br>
                  <h4  class="text-center">'.$vdoname[$arrycheck].'</h4>
                  <br>
                </a>';
                $num++;
                $arrycheck++;
              }
            
                $codes = url('doNotTouch/single_media.html');
                //  return $codes;
                  $strToFind = 'VediaTagByAtul';
                  $codeFile =  file_get_contents('doNotTouch/multi_media.html');
                 
                  $file_contents = str_replace($strToFind,$vdotag,$codeFile);
                  $disk = Storage::disk('local');
                  $disk->put($qr.'/index.html', $file_contents);
     
             }
           
             return redirect('admin/zoom')->with('success','Code file created successfully');
             
    }
}
