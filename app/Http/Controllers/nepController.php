<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class nepController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            '*'=>'required',
           ]);
           if($validator->fails()){
               return back()->withInput()->withErrors($validator);
           }
           $bucketpath = 'bucket/'.$request->path;
        if (! File::exists($bucketpath)) {
                mkdir($bucketpath, 0777, true);
           }
           else{
               return back()->with('error','dir exits');
           }

           $serverPath = 'SERVER/'.$request->path;
           if (! File::exists($serverPath)) {
            mkdir($serverPath, 0777, true);
            }
            else{
                return back()->with('error','dir exits');
            }

         
               $file = $request->file('file');
            $fileName = $file->getClientOriginalName().'_'.time().'.'.$file->getClientOriginalExtension();
            $disk = Storage::disk('local');
            $disk->put($bucketpath.'/'.$fileName, fopen($file, 'r+'));
            // cpoy js pdf
            $createCodes = File::copyDirectory('doNotTouch-js/', $bucketpath);
            if(!$createCodes){
                return back()->with('error','no copy data');
            }
            // update PDF NAME
            $strToFind = 'FILENAME';
            $codeFile =  file_get_contents($bucketpath.'/viewer.html');
           
            $file_contents = str_replace($strToFind,$fileName,$codeFile);
             $disk = Storage::disk('local');
             $disk->put($bucketpath.'/viewer.html', $file_contents);
            if(!$file_contents){
                if(!$createCodes){
                    return back()->with('error','data');
                }
            }
           
              $strToFind = 'PDFFILEPATH';
              $codeFile =  file_get_contents('doNotTouch/index-pdf.html');
             $vdotag = url($bucketpath.'/viewer.html');
              $file_contents = str_replace($strToFind,$vdotag,$codeFile);
              $disk = Storage::disk('local');
              $disk->put($serverPath.'/index.html', $file_contents);
            return back()->with('info','data copied');
       
        }
       
    }
  
