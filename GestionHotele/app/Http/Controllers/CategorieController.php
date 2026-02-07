<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function store($validated)
    {
        Categorie::create($validated);
        return redirect('/admin/miscs');
    }

    public function destroy(Categorie $category)
    {
        $category->delete();
        return redirect()->back();
    }
}
