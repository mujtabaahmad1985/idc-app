<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
Use Redirect;
use App\Activities;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {//dd('test');
        //$this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    public function postLogin(Request $request){

        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|min:8',
        ]);
        if($validator->fails()){

            Redirect::to('/')
                ->withErrors($validator)
                ->withInput()->send();

        }else {
            $credentials = $request->only( 'email', 'password' );
      //      echo bcrypt("mujtabaahmad1985@gmail.com@123#!");echo "<br >";
    //       echo bcrypt($credentials['password']);exit;
           //  dd($credentials);
//$credentials = ['email' => $request->username, 'password' => bcrypt($request->password),'status' => 'approved'];
//dd($credentials);
            if (Auth::attempt(['email' => $credentials['email'], 'password' => ($credentials['password'])],true)) {
                // Authentication passed...

                //dd(Auth::user()->permissions);
                if(Auth::user()->status=='approved'){

                    if(Auth::user()->role=='administrator'){
                        return redirect()->intended('/dashboard');
                    }

                    if(Auth::user()->role=='staff'){
                       // dd( );
                        $page_redirect_permissions = Auth::user()->permissions->pluck('id')->all();
                        if(in_array(1,$page_redirect_permissions)) // If dashboard is allow
                            return redirect()->intended('/my-dashboard');
                        if(in_array(5,$page_redirect_permissions)) // If Calendar is allow
                            return redirect()->intended('/calendar');
                        if(in_array(2,$page_redirect_permissions)) // If Patient is allow
                            return redirect()->intended('/patient/list');
                    }
                }

                else
                    return redirect()->intended('/')->withErrors([$this->username()=>'Your account is inactive, contact administrator']);

            } else {
                // Redirect::to('/cs-admin/')->send();
                return redirect()->intended('/')->withErrors([$this->username()=>'You have entered an invalid email or password']);
            }
        }

    }

    public function showLoginForm(){
        // echo "Mujtaba";
        return view('login');
    }
}
