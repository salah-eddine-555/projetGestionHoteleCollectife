<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiscsController extends Controller
{
    public function create()
    {
        return view('admin.create-miscs');
    }
}
