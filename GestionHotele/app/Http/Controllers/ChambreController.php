<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\Property;
use App\Models\Tag;
use Illuminate\Http\Request;

class ChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function test(){

        return view("chambres.test");
    }
    public function index(Request $request)
    {
        $query = Chambre::with('tags', 'properties');
        if ($tagId = $request->get('tag')) {
            $query->whereHas('tags', fn($q) => $q->where('tags.id', $tagId));
        }
        if ($propertyId = $request->get('property')) {
            $query->whereHas('properties', fn($q) => $q->where('properties.id',$propertyId));
        }
        $chambres = $query->get();
        $allTags = Tag::all();
        $allProperties = Property::all();
        return view('client.home', compact('chambres', 'allTags','allProperties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('manager.chambres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'hotel_id' => 'required|integer',
        'number' => 'required|string',
        'price_per_night' => 'required|numeric|min:0',
        'capacity' => 'required|integer|min:1',
        'description' => 'nullable|string',
        ]);
        $chambre = Chambre::create($validated);
        $chambre->tags()->sync($request->get('tags', []));
        $chambre->properties()->sync($request->get('properties', []));
        return redirect()->route('chambres.show', $chambre);
    }

    /**
     * Display the specified resource.
     */
    public function show(Chambre $chambre)
    {
        // $chambre = Chambre::with('tags','properties');
        $chambre->load(['tags', 'properties']);
        
        return view('client.chambre-details',compact('chambre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chambre $chambre)
    {
        return view('client.chambres.edit',compact('chambre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chambre $chambre)
    {
        $validated = $request->validate([
        'hotel_id' => 'required|integer',
        'number' => 'required|string',
        'price_per_night' => 'required|numeric|min:0',
        'capacite' => 'required|integer|min:1',
        'description' => 'nullable|string',
        ]);
        $chambre->update($validated);
        return redirect()->route('chambres.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chambre $chambre)
    {
        $chambre->delete();
        return redirect()->route('chambres.index');
    }
}
