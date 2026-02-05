<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index(){
        return view('tags.index',['tag' => Tag::all()]);
    }

    public function store(Request $request){
        $validated = $request->validate(['name' => 'required|string|max:50']);
        $validated['slug'] = Str::slug($validated['name']);
        Tag::create($validated);
        return redirect()->route('tags.index');
    }

    public function destroy(Tag $tag){
        $tag->delete();
        return redirect()->route('tages.index');
    }
}
