<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class SiteController extends Controller
{
    public function ClientHomepage()
    {
        $hotels = Hotel::where('is_active', false)->paginate(10);
        return view('client.home', compact('hotels'));
    }

    public function MangerDashboard()
    {
        $hotels = Hotel::paginate(10);
        return view('manager.dashboard', compact('hotels'));
    }

    public function MangerHotles()
    {
        $hotels = Hotel::paginate(10);
        return view('manager.hotels', compact('hotels'));
    }

    public function MangerChambres()
    {
        $chambres = Hotel::paginate(10);
        return view('manager.chambres', compact('chambres'));
    }


    public function AdminDashboard()
    {
        $hotels = Hotel::paginate(10);
        return view('admin.dashboard', compact('hotels'));
    }

    public function show()
    {
        $hotels = Hotel::paginate(10);
        return view('client.home', compact('hotels'));
    }
}
