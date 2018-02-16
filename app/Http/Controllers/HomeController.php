<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('home');
    }

    public function allUsers()
    {
        dd('Access All Users');
    }

    public function allMembers()
    {
        dd('Access All Members');
    }

    public function adminSuperadmin()
    {
        dd('Access Admin and Superadmin');
    }

    public function superadmin()
    {
        dd('Access only Superadmin');
    }

}
