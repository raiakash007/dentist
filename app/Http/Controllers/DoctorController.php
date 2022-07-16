<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
 use App\User;
 use App\Slider;
use App\DoctorBooking; 
use Illuminate\Support\Facades\Auth; 
use Validator;

// use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public $successStatus = 200;
    
/** 
     * Doctor Code Api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function doctor_code(Request $request){ 
        // $validator = Validator::make($request->all(), [ 
        //     'phone' => 'required', 
        //     'email' => 'required', 
        // ]);
        // if ($validator->fails()) { 
        //     return response()->json(['error'=>$validator->errors()], 401);            
        // }
        $patient_id = User::where('email', $request->email)->orWhere('phone', $request->phone)->first();
        if($patient_id){
            $data = DoctorBooking::with('doctor')->where('patient_id',$patient_id->id)->get();
            return response()->json(['success' => $data], $this-> successStatus);
        }else{
            return response()->json(['success' => '', 'message' => 'Not Registerted'], $this-> successStatus);
        }
    }

    

    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus); 
    }  
    
    

    public function abc() 
    { 
        echo 'hel';
    } 
}
