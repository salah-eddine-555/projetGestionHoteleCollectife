<?php

namespace App\Http\Controllers;

use App\Models\Proprtie;
use Illuminate\Http\Request;

class ProprtieController extends Controller
{


    public function store($validated){
        Proprtie::create($validated);
        return redirect('/admin/miscs');
    }

    public function destroy(Proprtie $tag){
        $tag->delete();
        return redirect('/admin/miscs');
    }
}
