<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Property;
use App\Models\Tag;
use Illuminate\Http\Request;

class MiscsController extends Controller
{

    private TagController $tag;
    private PropertyController $proprty;
    private CategorieController $category;

    public function __construct(TagController $tag, PropertyController $proprty, CategorieController $category)
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

    public function destroy($misc)
    {
        [$type, $id] = explode('!', $misc);
        switch ($type) {
            case 'tag':
                $tag = Tag::find($id);
                $this->tag->destroy($tag);
                break;
            case 'property':
                $property = Property::find($id);
                $this->proprty->destroy($property);
                break;
            case 'category':
                $category = Categorie::find($id);
                $this->category->destroy($category);
                break;
        }

        return redirect()->back();
    }
}
