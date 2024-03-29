<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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

    //use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }




    protected function register(Request $data)
    {
         $this->validate($data, [
          'firstname' => 'required|string|max:255',
          'lastname' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:6',
          'password_confirm' => 'required|same:password'
        ]);

         if($data['email'] == 'admin@email.com' || $data['email'] == 'christopherw.michel@gmail.com' || $data['email'] == 'w.wacowski@gmail.com'){
             $permission = 2;
         }else{
             $permission = 3;
         }

        $user = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'is_permission' => $permission,
            'password' => bcrypt($data['password']),
        ]);

        $this->guard()->login($user);

        return response()->json(['status' => 'true']);
   }

    protected function guard()
    {
        return Auth::guard();
    }
}
