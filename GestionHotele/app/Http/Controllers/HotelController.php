<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::paginate(20);
        return view("admin.dashboard", compact('hotels'));
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

        Hotel::create();
        return redirect()->route('/');
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
    public function edit(Hotel $hotel)
    {
        return view('hotels.edit', compact('hotel'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Hotel $hotel)
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

        $hotel->update();
        return redirect()->route('hotles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect()->route('hotles.index');
    }
}
