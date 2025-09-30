<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'username' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $auth_check = Auth::attempt($validation->validated());
        $user = User::where('email', $request->input('email'))->first();
        if($user){
            if ($auth_check) {
                $request->session()->regenerate();
                return  response()->json(['user' => Auth::user()]);
            }else{
                return response()->json(['error' => 'username or password is incorrect!']);
            }
        }
        return response()->json(['error' => 'This email was not found in our database, please feel free to register.']);
    }

}
