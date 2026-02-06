<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{

    public function store($validated)
    {   
        $validated = [
            "name" => $validated['name'],
            "slug" => strtolower($validated['name'])
        ];
        Tag::create($validated);
        return redirect('/admin/miscs');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect('/admin/miscs');
    }
}
