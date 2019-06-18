<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use DB;

class ApiController extends Controller
{
    public function getUsers()
	{
		$usersDetails = User::paginate(5);
		
		$response = [
            'status' => true,
            'data' => $usersDetails,
            'message' =>"",
        ];
		$response = json_decode(str_replace('null','""',json_encode($response)));
        return response()->json($response, 200);
	}
}
