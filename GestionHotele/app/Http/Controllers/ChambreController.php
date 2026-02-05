<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use Illuminate\Http\Request;

class ChambreController extends Controller
{
    public function show(Chambre $chambre){
        $chambre->load('tags' ,'proprties');
        return view('chambre.show', compact('chambre'));
    }

    public function index(){
        $chambres = Chambre::with('tags','proprties')->get();
        return view('chambre.index',compact('chambres'));
    }
}
