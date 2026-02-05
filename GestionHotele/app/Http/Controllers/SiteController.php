<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
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
        $hotels = Hotel::all();
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

    public function show()
    {
        $hotels = Hotel::paginate(10);
        return view('client.home', compact('hotels'));
    }
}
