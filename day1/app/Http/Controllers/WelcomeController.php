<?php

namespace App\Http\Controllers;

use Facade\Ignition\Exceptions\ViewExceptionWithSolution;

class WelcomeController extends Controller
{
    public function index($name = '')
    {
        //return 'Welcome '.$name;
        // return view('home');
        return view('new-welcome', ['enteredName' => $name]);
    }
}
