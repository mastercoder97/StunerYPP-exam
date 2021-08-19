<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Carbon\Carbon;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getLogin()
    {   
        if (Auth::check()) {
            
            $user = Auth::user();
            
            return redirect('/');

        } else {
            return view('auth.login');
        }
    }
    public function postLogin(Request $request)
    {
        $userdata = array(
            'email'  => $request->email,
            'password'  => $request->password
        );
    
        if (Auth::attempt($userdata)) {

            $user = Auth::user();
            
            return redirect('/');
                
        } else {      

            Session::flash('danger', "The credentials you entered did not match to our records.");
            return back();
            
        }
        
    }
    public function logout() {

        if (Auth::user()){

            Auth::logout();
            Session::flush();
            return redirect('/login');

        } else {
            return redirect('/login');  
        }
    }

}