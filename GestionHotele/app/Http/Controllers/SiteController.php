<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Chambre;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Proprtie;
use App\Models\Tag;
use App\Models\User;

class SiteController extends Controller
{
    public function ClientHomepage()
    {
        $hotels = Hotel::where('is_active', true)->paginate(10);
        return view('client.home', compact('hotels'));
    }

    public function MangerDashboard()
    {   
        $user = auth()->user();

        $hotels = Hotel::whereHas('gerant', function($query) use($user) {
            $query->where('user_id', $user->id);
        })->get();
        
        return view('manager.dashboard', compact('hotels'));
    }

    public function MangerHotles()
    {
        $hotels = Hotel::all();
        return view('manager.hotels', compact('hotels'));
    }

    public function MangerChambres()
    {
        $chambres = Hotel::all();
        return view('manager.chambres', compact('chambres'));
    }

    public function MangerMiscs()
    {
        $tags = Hotel::all();
        return view('manager.miscs', compact('tags'));
    }


    public function AdminDashboard()
    {
        $users = User::all();
        return view('admin.dashboard', compact('users'));
    }

    public function AdminHotels()
    {
        $hotels = Hotel::all();
        return view('admin.hotels', compact('hotels'));
    }

    public function AdminChambres()
    {
        $chambres = Chambre::all();
        return view('admin.chambres', compact('chambres'));
    }

    public function AdminMiscs()
    {
        $tags = Tag::all();
        $properties = Proprtie::all();
        $categories = Categorie::all();
        return view('admin.miscs', compact('tags', 'properties', 'categories'));
    }

    

    public function show()
    {
        $hotels = Hotel::paginate(10);
        return view('client.home', compact('hotels'));
    }
}
