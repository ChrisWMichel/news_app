<?php

namespace App\Http\Controllers;

use App\Mail\CreateNewAdmin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index(){

        return view('admin/index');
    }

    public function newAdmin(){
        return view('admin/new-admin');
    }

    public function getAdmins(){
        $admins = User::where('is_permission', 1)->get();

        return response()->json(['admins' => $admins]);
    }

    public function notifyNewAdmin(Request $data){
        $this->validate($data, [
          'firstname' => 'required|string|max:255',
          'lastname' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
        ]);

        $user = User::create([
          'firstname' => $data['firstname'],
          'lastname' => $data['lastname'],
          'email' => $data['email'],
          'email_token' => User::generateVerificationCode(),
          'password' => 'Temp',
          'is_permission' => 1
        ]);

        Mail::to($user)->send(new CreateNewAdmin($user));


        return response()->json(['status' => 'true']);
    }

    public function receiveResetPassword($token){
        $user = User::where('email_token', $token)->first();

        if($user){
            return view('auth/passwords/reset', compact('user'));
        }else{
            return view('errors/404');
        }


    }


}
