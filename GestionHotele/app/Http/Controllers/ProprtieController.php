<?php

namespace App\Http\Controllers;

use App\Models\Proprtie;
use Illuminate\Http\Request;

class ProprtieController extends Controller
{
    public function index(){
        return view('tags.index',['tag' => Proprtie::all()]);
    }

    public function store(Request $request){
        $validated = $request->validate(['name' => 'required|string|max:50']);
        Proprtie::create($validated);
        return redirect()->route('proprtie.index');
    }

    public function destroy(Proprtie $tag){
        $tag->delete();
        return redirect()->route('proprtie.index');
    }
}
