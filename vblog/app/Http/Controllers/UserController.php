<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        // TODO
    }

    public function index()
    {

        
        $user = User::findOrFail(2);
        
  

    }
}