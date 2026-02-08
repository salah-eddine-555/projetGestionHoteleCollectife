<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $hotels = Hotel::all();

    //     return view("admin.hotels", compact('hotels'));
    // }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('manager.create-hotel');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'rating' => 'required|integer',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png'
        ]);

        
        if ($request->Hasfile('image')) {
            $file = $request->file('image');
            $name = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAS('images', $name, 'public');
            $validated['image'] = $path;
        }
        $user = auth()->user();
    
        $hotel = Hotel::create($validated);
       
        $hotel->gerant()->attach($user->id);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
        public function show($id)
        {
    
            $hotel = Hotel::findOrFail($id);
            return view('client.hotel-details', compact('hotel'));
        }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        return view('manager.edit-hotel', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, Hotel $hotel)
        {
            
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'rating' => 'required|integer',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
            ]);

            
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $name = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAS('images', $name, 'public');
                $validated['image'] = $path;
            }

            $hotel->update($validated);
            return redirect()->back();
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {   
        $hotel->delete();
        return redirect()->back();
    }

    public function validateHotel(Hotel $hotel){

      
        if($hotel->is_active == false){
             $hotel->update([
            "is_active" => true,
            ]);
        }else {
            $hotel->update([
            "is_active" => false,
            ]);
        }
        return redirect()->back();
       
    }
}
