<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Psy\CodeCleaner\FunctionContextPass;

use function Termwind\render;

class SessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('authentication.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'min:8'],
        ]);
        // dd($validate);
        if (Auth::attempt($validate)) {
            // $request->session()->regenerate();
            $user = DB::table('users')->where('email', $validate['email'])->first();
            // dd($user);
            if ($user->role_id == 1) {
                return redirect('/');
            } elseif ($user->role_id == 2) {
                // dd($user->is_active ); 
                if ($user->is_active == 1) {
                    return redirect('manager/dashboard');
                } else {
                    return redirect('manager.wait');
                }
            } elseif ($user->role_id == 3) {
                return redirect('/admin/dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'email not much'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //

        Auth::logout();

        return view('authentication/register');
    }

    public function validate(User $user)
    {
        // dd($user);
        if ($user->is_active == 0) {
            $user->is_active = 1;
            $user->save();
            // $user->update([
            //     "is_active" => 1
            // ]);
            // dd($user);


        } else {
            $user->is_active = 0;
            $user->save();
            // dd($user);
            // $user->update([
            //     "is_active" => 0
            // ]);
        }



        return redirect()->back();
    }
}
