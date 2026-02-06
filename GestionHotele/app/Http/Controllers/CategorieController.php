<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate(['name' => 'required|string|max:50']);
        $validated['slug'] = Str::slug($validated['name']);
        Tag::create($validated);
        return redirect()->route('tags.index');
    }

    public function destroy(Tag $tag){
        $tag->delete();
        return redirect()->route('tages.index');
    }}
