<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use PhpParser\Builder\Function_;
use Psy\CodeCleaner\FunctionContextPass;

use function Laravel\Prompts\password;

class RegisteredUserController extends Controller
{
    //

    public function create()
    {
        return view('authentication.register');
    }

    public function store(Request $request)
    {

        // dd($request->all());
        //validate the request
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'min:8'],
            'roles' => ['required']
        ]);
        // dd($request);
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => (int)$request->roles
        ]);

        Auth::login($user );
        if ((int)$request->roles  == 1) {
            return redirect('/');
        } else if ((int)$request->roles  == 2) {
            return redirect('/manager/home');
        } else {
            return redirect('/authentication/login');
        }
        //creat the use rin the database
        //loh thim in
        //redirect to the home

    }
}
