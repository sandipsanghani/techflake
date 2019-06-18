<?php
/*
* Module Name : User management
* create on : 18-jun-2019
* Developed by : Sandip Developer
* Description : this module is created for managing users details
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Description : This function is used for fetching all user from database 
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		if (isset($request->q) && !empty($request->q) ){
			
			/*
			* Note : I am not putting here '%'.$request->q.'%' for name and email because of indexing is not supported for that.
			*/
			$userList = User::where( 'name', 'LIKE',$request->q.'%')->orWhere( 'email', 'LIKE',$request->q.'%')->orderBy('updated_at')->paginate(20);
			
			$userList->appends(['q' =>$request->q]);
			
		}else{
			$userList = User::orderBy('updated_at',"DESC")->paginate(20);
		}
		if($request->ajax()){
            return $userList;
        }
		return view('users',["userList"=>$userList]);
    }
	
	/**
     * Description : This function is used for post method API call
     */
	public function postGuzzleRequest(Request $request)
	{
		$client = new \GuzzleHttp\Client();
		$url = "http://besmartgodigital.com/money/api/wallet_type";
		$response = $client->post($url,[]);
		
		//This is used to get response status code
		//echo $response->getStatusCode();

		return $response->getBody();
	}
	
	/**
     * Description : This function is used for get method API call
     */
	public function getGuzzleRequest()
	{
		$client = new \GuzzleHttp\Client();
		$response = $client->get('https://jsonplaceholder.typicode.com/posts');
		$response = $response->getBody();
	   
		dd($response);
	}

    /**
     * Description : This function is used for fetching specific user detail.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$userDetails = User::find($id);
		
        return response()->json($userDetails);
    }    
}
