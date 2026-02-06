<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiscsController extends Controller
{

    private TagController $tag;
    private ProprtieController $proprty;
    private CategorieController $category;

    public function __construct(TagController $tag, ProprtieController $proprty, CategorieController $category)
    {
        $this->tag = $tag;
        $this->proprty = $proprty;
        $this->category = $category;
    }


    public function create()
    {
        return view('admin.create-miscs');
    }
    public function store(Request $request)
    {

        $validated = $request->validate([
            'type' => 'required|string',
            'name' => 'required|string|max:50'
        ]);
        $data = [
            "name" => $validated['name']
        ];
        switch ($validated['type']) {
            case 'tag':

                $this->tag->store($data);
                break;
            case 'property':
                $this->proprty->store($data);
                break;
            case 'category':
                $this->category->store($data);
                break;
        }

        return redirect('/admin/miscs');
    }
}
