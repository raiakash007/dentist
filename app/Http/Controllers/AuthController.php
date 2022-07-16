<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\Mail\doctorMail;
use App\Mail\OTPMail;
use Mail;

class AuthController extends Controller
{
    public $successStatus = 200;  
        /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
     
    public function doctor_register_login(Request $request) 
        { 
            $count = User::where('phone', $request->phone)->orWhere('email', $request->email)->first();           
            if($count){
                if($count->phone != $request->phone){
                    // $success['token'] =  $user->createToken('MyApp')-> accessToken; 
                    return response()->json(['success' => false, 'message' => 'This email already registered with this **** *** '. substr($count->phone, -3) . ' kindly type correct phone no. so that OTP can be send']); 
                }

                if($count->email != $request->email){
                    // $success['token'] =  $user->createToken('MyApp')-> accessToken; 
                    return response()->json(['success' => false, 'message' => 'This phone already registered with this ************'. substr($count->email, 10) . ' kindly type correct email id so that OTP can be send']); 
                }

                if($request->phone == '1122334455' &&  $request->email == 'doctor@gmail.com'){

                    if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
                        $user = Auth::user(); 
                         $success['token'] =  $user->createToken('MyApp')-> accessToken; 
                                return response()->json(['success' => $success, 'message' => 'User Logged in Successfully'], $this-> successStatus); 
                    }
                    else{
                        return response()->json(['success' => false, 'error'=>'Please check your Phone Number or Password'], 401); 
                    }
                }     
                else{
 
                    if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){         
                        $otp = random_int(100000, 999999);
                        $data = User::where('phone', $request->email)->update(['otp'=> $otp]);
                        $user = Auth::user(); 

                        // ****OTP Send
                        $url = "https://smsapi.24x7sms.com/api_2.0/SendUnicodeSMS.aspx?APIKEY=crDCpeZ4Mh7&MobileNo=".$count->phone."&SenderID=DRTETH&Message=OTP%20to%20login%20to%20DOCTOR-DENTIST%20is%20".$otp.".%20Keep%20Smiling%20!%20&ServiceName=TEMPLATE_BASED&DLTTemplateID=1007163342408187064";
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_POST, 0);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec ($ch);
                        curl_close ($ch);


                        $myEmail = $count->email;

                        $details = [
                            'title' => 'OTP Request',
                            'otp' => $otp
                        ];
                        $sub="Here is your Login OTP";
                        $dataMail = Mail::to($myEmail)->send(new OTPMail($details,$sub));
                     

                        // print_r($dataMail); die;

                        $success['token'] =  $user->createToken('MyApp')-> accessToken; 
                        return response()->json(['success' => $success, 'message' => 'User Logged in Successfully', 'otp' => $otp], $this-> successStatus); 
                    }
                    else{ 
                        return response()->json(['success' => false, 'error'=>'Please check your Phone Number or Password'], 401); 
                    }
                }

            }else{
                $validator = Validator::make($request->all(), [ 
                    // 'name' => 'required', 
                    'phone' => 'required|unique:users', 
                    'email' => 'required|email|unique:users', 
                    'userType' => 'required', 
                    // 'city' => 'required|string', 
                    // 'state' => 'required|string', 
                    // 'password' => 'required', 
                    // 'c_password' => 'required|same:password', 
                ]);
                    $errors = [];
                    foreach ($validator->errors()->messages() as $key => $value) {
                        if($key == 'email' || $key == 'phone')
                            $key = 'message';
                        $errors[$key] = is_array($value) ? implode(',', $value) : $value;
                        //implode is for when you have multiple errors for a same key
                        //like email should valid as well as unique
                    }
                if ($validator->fails()) { 
                //  return response()->json(['success' => false, 'error'=>$validator->errors()], 401); 
                    $result = array("status" => count($errors)?false:true, 'data'=>$errors);
                    return $result;           
                }
                $otp = random_int(100000, 999999);
                
                 // ****OTP Send
                $url = "https://smsapi.24x7sms.com/api_2.0/SendUnicodeSMS.aspx?APIKEY=crDCpeZ4Mh7&MobileNo=".$request->phone."&SenderID=DRTETH&Message=OTP%20to%20login%20to%20DOCTOR-DENTIST%20is%20".$otp.".%20Keep%20Smiling%20!%20&ServiceName=TEMPLATE_BASED&DLTTemplateID=1007163342408187064";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec ($ch);
                curl_close ($ch);
                
                $input = $request->all(); 
                $input['password'] = bcrypt($input['password']); 
                $user = User::create($input); 
                $success['token'] =  $user->createToken('MyApp')-> accessToken; 
                return response()->json(['success'=>$success, 'message' => 'User Register Successfully', 'otp' => $otp], $this-> successStatus);
            }
        }



    public function user_register(Request $request) 
        { 
            $count = User::where(['phone' => $request->phone, 'email' => $request->email])->count();           
            if($count){
                $errors['message'] = 'Email & Phone No. already registered. Enter a new email & phone no. to signup.';
                return response()->json(['status' => false, 'data'=>$errors]); 
            }else{
            
            $validator = Validator::make($request->all(), [ 
                'name' => 'required', 
                'phone' => 'required|unique:users', 
                'email' => 'required|email|unique:users', 
                'password' => 'required', 
                'c_password' => 'required|same:password',
                'city' => 'required|string', 
                'state' => 'required|string', 
                'login' => 'required',
            ],
            [   
            'email.unique'    => 'E-Mail ID already registered. Enter a new email ID to signup.',
            'phone.unique'      => 'Phone No. already registered. Enter a new phone no. to signup',
            ]
            );

            $errors = [];
            foreach ($validator->errors()->messages() as $key => $value) {
                if($key == 'name' ||$key == 'email' || $key == 'phone' || $key == 'password' || $key == 'c_password'|| $key == 'city' || $key == 'state' || $key == 'userType')
                    $key = 'message';
                $errors[$key] = is_array($value) ? implode(',', $value) : $value;
                //implode is for when you have multiple errors for a same key
                //like email should valid as well as unique
            }

            if ($validator->fails()) { 
                 // return response()->json(['success' => false, 'error'=>$validator->errors()], 401); 
                $result = array("status" => count($errors)?false:true, 'data'=>$errors);
                return $result;              
            }

            $input = $request->all(); 
            $input['password'] = bcrypt($input['password']); 
            $user = User::create($input); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            $success['message'] ='User Register Successfully';
            return response()->json(['success'=>$success], $this-> successStatus); 
            }
        }


/** 
     * Login api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function login(Request $request){
       if(is_numeric($request->email)){ 
        if(Auth::attempt(['phone' => request('email'), 'password' => request('password')])){         
            $otp = random_int(100000, 999999);
            $data = User::where('phone', $request->email)->update(['otp'=> $otp]);
            $user = Auth::user(); 

            // ****OTP Send
            $url = "https://smsapi.24x7sms.com/api_2.0/SendUnicodeSMS.aspx?APIKEY=crDCpeZ4Mh7&MobileNo=".$request->email."&SenderID=DRTETH&Message=OTP%20to%20login%20to%20DOCTOR-DENTIST%20is%20".$otp.".%20Keep%20Smiling%20!%20&ServiceName=TEMPLATE_BASED&DLTTemplateID=1007163342408187064";
                 $ch = curl_init();
                 curl_setopt($ch, CURLOPT_URL, $url);
                 curl_setopt($ch, CURLOPT_POST, 0);
                 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                 $response = curl_exec ($ch);
                  // $err = curl_error($ch);  //if you need
                 curl_close ($ch);
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['success' => $success, 'message' => 'User Logged in Successfully', 'OTP' => $otp], $this-> successStatus); 
        }
        else{ 
            return response()->json(['success' => false, 'error'=>'Please check your Phone Number or Password'], 401); 
        } 
      }
      elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $otp = random_int(100000, 999999);
            $data = User::where('email', $request->email)->update(['otp'=> $otp]);
            $user = Auth::user(); 


            $myEmail = 'deepakmishra1166@gmail.com';
   
            $details = [
                'title' => 'Mail Demo from doctor-dentist.com',
                'url' => 'https://www.doctor-dentist.com'
            ];
      
            Mail::to($myEmail)->send(new OTPMail($details));
       
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['success' => $success, 'message' => 'User Logged in Successfully', 'OTP' => $otp], $this-> successStatus); 
        }
        else{ 
            return response()->json(['success' => false, 'error'=>'Please check your Email or Password'], 401); 
        } 
      }
    }

    public function forgot_password(Request $request){
         $count = User::where('phone', $request->phone)->orWhere('email', $request->email)->first();
         if($count){
             $otp = random_int(100000, 999999);
                    if($request->phone){
                        $data = User::where('phone', $request->phone)->update(['otp'=> $otp]);
                             $url = "https://smsapi.24x7sms.com/api_2.0/SendUnicodeSMS.aspx?APIKEY=crDCpeZ4Mh7&MobileNo=".$request->phone."&SenderID=DRTETH&Message=OTP%20to%20login%20to%20DOCTOR-DENTIST%20is%20".$otp.".%20Keep%20Smiling%20!%20&ServiceName=TEMPLATE_BASED&DLTTemplateID=1007163342408187064";
                             $ch = curl_init();
                             curl_setopt($ch, CURLOPT_URL, $url);
                             curl_setopt($ch, CURLOPT_POST, 0);
                             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                             $response = curl_exec ($ch);
                             curl_close ($ch);    
                        
                    }else{
                        $data = User::where('email', $request->email)->update(['otp'=> $otp]);
                            $myEmail = $request->email;
                            $details = [
                                'title' => 'OTP Request',
                                'otp' => $otp
                            ];
                            $sub="Here is your Login OTP";
                            $dataMail = Mail::to($myEmail)->send(new OTPMail($details,$sub));
                        
                    }
                // $user = Auth::user(); 

                // $success['token'] =  $user->createToken('MyApp')-> accessToken; 
                return response()->json(['success' => true, 'message' => 'OTP send', 'OTP' => $otp], $this-> successStatus); 
         }else{
            return response()->json(['success' => false, 'message'=>'Please check your Email or Password'], 401); 
         } 
         
    } 

       public function set_new_password(Request $request){
        $validator = Validator::make($request->all(), [ 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);
        $errors = [];
        foreach ($validator->errors()->messages() as $key => $value) {
            if($key == 'password' || $key == 'c_password')
                $key = 'message';
            $errors[$key] = is_array($value) ? implode(',', $value) : $value;
            //implode is for when you have multiple errors for a same key
            //like email should valid as well as unique
        }
        if ($validator->fails()) { 
             // return response()->json(['success' => false, 'error'=>$validator->errors()], 401); 
            $result = array("status" => count($errors)?false:true, 'data'=>$errors);
            return $result;              
        }

        if($request->email){
            $data = User::where('email', $request->email)->update(['password'=> bcrypt($request->password)]);
            $user = User::first(); 
        }else{
            $data = User::where('phone', $request->phone)->update(['password'=> bcrypt($request->password)]);
            $user = User::first();
        }

        // print_r($user); die;
            if($data){
                $success['token'] =  $user->createToken('MyApp')->accessToken;
                return response()->json(['success' => $success, 'status' =>true ,'message' => 'Password Reset Successfully'], $this->successStatus);
            }else{
                return response()->json(['message'=>'No User Registered'], 401);
            }       
    }   
    
    public function resend_otp(Request $request){
        $count = User::where('phone', $request->phone)->orWhere('email', $request->email)->first();
         if($count){
             $otp = random_int(100000, 999999);
                    if($request->phone){
                        $data = User::where('phone', $request->phone)->update(['otp'=> $otp]);
                    }else{
                        $data = User::where('email', $request->email)->update(['otp'=> $otp]);
                    }
                // $user = Auth::user(); 

                // ****OTP Send
                $url = "https://smsapi.24x7sms.com/api_2.0/SendUnicodeSMS.aspx?APIKEY=crDCpeZ4Mh7&MobileNo=".$count->phone."&SenderID=DRTETH&Message=OTP%20to%20login%20to%20DOCTOR-DENTIST%20is%20".$otp.".%20Keep%20Smiling%20!%20&ServiceName=TEMPLATE_BASED&DLTTemplateID=1007163342408187064";
                     $ch = curl_init();
                     curl_setopt($ch, CURLOPT_URL, $url);
                     curl_setopt($ch, CURLOPT_POST, 0);
                     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                     $response = curl_exec ($ch);
                     curl_close ($ch);


                $myEmail = $count->email;

                $details = [
                    'title' => 'OTP Request',
                    'otp' => $otp
                ];
                $sub="Here is your Login OTP";
                $dataMail = Mail::to($myEmail)->send(new OTPMail($details,$sub));
                
                // $success['token'] =  $user->createToken('MyApp')-> accessToken; 
                return response()->json(['success' => true, 'message' => 'OTP send Successfully', 'OTP' => $otp], $this-> successStatus); 
         }else{
            return response()->json(['success' => false, 'message'=>'Please check your Email or Password'], 401); 
         }       
    } 


    public function logout(Request $request){
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully Logged Out'
        ]); 
    } 
    
 
}
