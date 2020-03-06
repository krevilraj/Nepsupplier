<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerification;
use App\Mail\Welcome;
use App\User;
use Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */


    public function register(Request $request)
    {
        $validation = $this->validator($request->all());
        if ($validation->fails())  {
            return response()->json($validation->errors()->toArray());
        }
        else{
            $user = $this->create_user($request->all());
            Auth::login($user);
            if (Auth::user()){
//                event(new Registered($user = $this->create($request->all())));
                $data = [
                    'email_token'=>$user->email_token
                ];

//        Mail::to($request->email)->send(new EmailVerification($data));

//                return view('auth.vertification');
                return response()->json(['response' => '']);
            }
        }

    }

    protected function create_user(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function verify($token)
    {
        $user = User::where('email_token', $token)->first();

        $user->verified ='1';
        $data2 = [

            'name'=>$user->first_name
        ];
        if ($user->save()) {

            Mail::to($user->email)->send(new Welcome($data2));

            return view('emailconfirm', ['user' => $user]);
        }


    }
}
