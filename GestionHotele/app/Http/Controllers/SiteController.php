<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Chambre;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Property;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class SiteController extends Controller
{
    public function ClientHomepage()
    {
        $hotels = Hotel::where('is_active', true)->paginate(20);
        return view('client.home', compact('hotels'));
    }

    public function MangerDashboard()
    {
        Gate::authorize('manager-dashboard');

        $user = Auth()->user();

        $hotels = Hotel::whereHas('gerant', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        return view('manager.dashboard', compact('hotels'));
    }

    public function MangerHotles()
    {
        Gate::authorize('manager-dashboard');

        $hotels = Hotel::all();
        return view('manager.hotels', compact('hotels'));
    }

    public function MangerChambres()
    {
        Gate::authorize('manager-dashboard');

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
        Gate::authorize('admin-dashboard');

        $users = User::all();
        return view('admin.dashboard', compact('users'));
    }

    public function AdminHotels()
    {
        Gate::authorize('admin-dashboard');

        $hotels = Hotel::all();
        return view('admin.hotels', compact('hotels'));
    }

    public function AdminChambres()
    {
        Gate::authorize('admin-dashboard');

        $chambres = Chambre::all();
        return view('admin.chambres', compact('chambres'));
    }

    public function AdminMiscs()
    {
        Gate::authorize('admin-dashboard');

        $tags = Tag::all();
        $properties = Property::all();
        $categories = Categorie::all();
        return view('admin.miscs', compact('tags', 'properties', 'categories'));
    }



    public function show()
    {
        $hotels = Hotel::paginate(10);
        return view('client.home', compact('hotels'));
    }
}
