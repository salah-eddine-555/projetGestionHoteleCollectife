<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class SiteController extends Controller
{
    public function index()
    {
        $hotels = Hotel::paginate(10);
        return view('client.home', compact('hotels'));
    }
    public function show()
    {
        $hotels = Hotel::paginate(10);
        return view('client.home', compact('hotels'));
    }
}
