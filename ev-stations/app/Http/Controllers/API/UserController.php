<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


use App\User;
use Carbon\Carbon;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\City;
use App\Company;
use App\BrandType;
use App\VehicleType;
use App\ConnectorType;
use App\NetworkTypes;

class UserController extends Controller
{
   
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

     public $loginAfterSignUp = true;

    public function register(Request $request)
    {
      
       // dd($request);
       $user = User::create([
        'username' => $request->username,
        'firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'role_id' => $request->role_id,
        'email' => $request->email,
        'mobile' => $request->mobile,
        'alternatecontact' => $request->alternatecontact,
        'address' => $request->address,
        'gender' => $request->gender,
        'city_id' => $request->city_id,
        'state_id' => $request->state_id,
        'country_id' => $request->country_id,
        'company_id' => '1',
        'image'    => $request->image,
        'status' => $request->status,
        'password' => bcrypt($request->password),
       ]);
      // dd($user);
      $token = auth()->login($user);

      return $this->respondWithToken($token);

    }

    public function login(Request $request)
    {
     
     
      $credentials = $request->only(['email', 'password']);
      if (!$token = auth()->attempt($credentials)) {
        return response()->json(['error' => 'Unauthorized'], 401);
      }

      return $this->respondWithToken($token);
    }



    public function getAuthUser(Request $request)
    {
        return response()->json(auth()->user());
    }
    public function logout()
    {
        auth()->logout();
        return response()->json(['message'=>'Successfully logged out']);
    }
   
          /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
        }
    ############SEARCH
    public function usershow($slug)
    {
           $user = User::where('id', $slug)->first();
           $companylist=Company::all();

           return view('admin.user.show',compact('user','companylist'));
    }
   
}
