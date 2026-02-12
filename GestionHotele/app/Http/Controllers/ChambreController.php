<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Chambre;
use App\Models\Property;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Chambre::with('tags', 'properties');


        if ($tagId = $request->get('tag')) {
            $query->whereHas('tags', fn($q) => $q->where('tags.id', $tagId));
        }
        if ($propertyId = $request->get('property')) {
            $query->whereHas('properties', fn($q) => $q->where('properties.id', $propertyId));
        }
        $chambres = $query->paginate(10)->withQueryString();
        $allTags = Tag::all();
        $allProperties = Property::all();
        return view('client.chambres', compact('chambres', 'allTags','allProperties'));

        if (null !==$request->get('startDate')) {

        }
        if (null !==$request->get('endDate')) {
            
        }

        $endDate = $request->get("startDate");
        $startDate = $request->get("startDate");

        $rooms = DB::table('chambres')
            ->whereNotIn(
                'id',
                DB::table('reservations')
                    ->where('start_date', '<', "$endDate")
                    ->where('end_date', '>', "$startDate")
                    ->pluck('chambre_id')
            )->orwhere(
                'quantity',
                '>',
                DB::table('reservations')
                    ->where('start_date', '<', "$endDate")
                    ->where('end_date', '>', "$startDate")
                    ->count()

            )->get();




        $chambres = $rooms;
        $allTags = Tag::all();
        $allProperties = Property::all();
        return view('client.chambres', compact('chambres', 'allTags', 'allProperties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('manager.chambres.create', compact('categories'));
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
            'categorie' => 'required',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($request->Hasfile('image')) {
            $file = $request->file('image');
            $name = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAS('images', $name, 'public');
            $validated['image'] = $path;
        }
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

        return view('client.chambre-details', compact('chambre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chambre $chambre)
    {
        $categories = Categorie::all();
        return view('manager.chambres.edit',compact('chambre','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chambre $chambre)
    {
        $validated = $request->validate([
        'quantity' => 'required|integer',
        'price_per_night' => 'required|numeric|min:0',
        'capacite' => 'required|integer|min:1',
        'categorie' => 'required',  
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        // dd($validated);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAS('images', $name, 'public');
            $validated['image'] = $path;
        }
        $chambre->update($validated);
        return redirect('manager/chambres')->with('success', 'chambre updated successfully.');
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
