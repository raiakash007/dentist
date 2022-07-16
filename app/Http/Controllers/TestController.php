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

class TestController extends Controller{
    public function sendmail(Request $request){ 
        echo "hi";
        $otp = random_int(100000, 999999);
        $myEmail = "preetishpro@gmail.com";
        $details = [
            'title' => 'OTP Request',
            'otp' => $otp
        ];
        $sub="Here is your Login OTP";
        $dataMail = Mail::to($myEmail)->send(new OTPMail($details,$sub));

        print_r($dataMail); die;
        
    }
    
}