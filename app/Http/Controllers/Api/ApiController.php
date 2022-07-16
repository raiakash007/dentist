<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\User; 


class ApiController extends Controller
{
     //Get All Users
     public function GetAllUsers(){
         $Users = User::all();
         return response()->json($Users,200);
     }
}
