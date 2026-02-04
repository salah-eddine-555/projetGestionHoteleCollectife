<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HoteleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotele::all();
        return view("hotels.index", compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=> 'required|string|max:255',
            'addresse'=> 'required|string|max:255',
            'rating' => 'required|integer',
            'description'=> 'required|string',
            'image'=> 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);
    

        if($request->Hasfile('image')){
            $file = $request->file('name');
            $name =time().'_'.$file->getClientOriginalName();
            $path = $file->storeAS('images', $name, 'public');
            $validated['image'] = $path;
        }

        Hotele::create();
        return redirect()->route('hotles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotele $hotele)
    {
        return view('hotels.edit', compact('hotele'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validated = $request->validate([
            'name'=> 'required|string|max:255',
            'addresse'=> 'required|string|max:255',
            'rating' => 'required|integer',
            'description'=> 'required|string',
            'image'=> 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);
    

        if($request->Hasfile('image')){
            $file = $request->file('name');
            $name =time().'_'.$file->getClientOriginalName();
            $path = $file->storeAS('images', $name, 'public');
            $validated['image'] = $path;
        }

        hotele->update();
        return redirect()->route('hotles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotele $hotel)
    {
        $hotel->delete();
        return redirect()->route('hotles.index');
    }
}
