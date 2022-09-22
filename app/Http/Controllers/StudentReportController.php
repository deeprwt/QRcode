<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StudentReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getStundet(Request $request)
    {
      
        $validator = Validator::make($request->all(), [
            '*'=>'required',
           ]);
           if($validator->fails()){
               return back()->withInput()->withErrors($validator);
           }
           $data = array();
           $sid  = $request->sid;
           $check = DB::table('at_final_result')->where('sid',$sid)->get();
           if(count($check) == 0 ){
               $check1 = DB::table('final_test_timer01')->where('sid',$sid)->get();
               if(count($check1) != 0){
                    foreach($check1 as $item){
                        if($item->subject == 'Mathematics'){
                            $subject = 'Maths';
                        }else{
                            $subject = $item->subject;
                        }
                     //  return $subject;
                        if($item->types == 'old'){
                            $check2 = DB::table('final_test_result_old')->where([['sid',$sid],['subject',$subject]])->count();
                            if($check2 == 0){
                                $data = array(
                                    'status'=>'error',
                                    'message'=>'Studnet  attempt exam but not submitted',
                                );
                            }else{
                                $data = array(
                                    'status'=>'error',
                                    'message'=>'check result on master excel ',
                                );
                            }
                        }
                        if($item->types == 'new'){
                            $check2 = DB::table('final_test_result')->where([['sid',$sid],['subject',$subject]])->count();
                            if($check2 == 0){
                                $data = array(
                                    'status'=>'error',
                                    'message'=>'Studnet  attempt exam but not submitted',
                                );
                            }else{
                                $data = array(
                                    'status'=>'error',
                                    'message'=>'check result on master excel ',
                                );
                            }
                        }
                    }
               }else{
                $data = array(
                    'status'=>'error',
                    'message'=>'Studnet  not attempted exam',
                );
               }
           }else{
            $data = array(
                'status'=>'error',
                'message'=>'check result on master excel',
            );
           }
       //return back()->with('data',$data);
       return $data;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
