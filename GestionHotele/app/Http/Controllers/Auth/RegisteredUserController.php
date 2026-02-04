<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use Psy\CodeCleaner\FunctionContextPass;

class RegisteredUserController extends Controller
{
    //

    public Function create(){
        return view('auth.register');
    }
}
