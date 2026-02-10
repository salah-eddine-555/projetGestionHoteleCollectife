<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Property;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chambre extends Model
{
    protected $fillable = ['capacite','image','description','quantity','price_per_night'];

    Use HasFactory;

    public function tags(){
        return $this->belongsToMany(Tag::class,'chambre_tag');
    }

    public function properties(){
        return $this->belongsToMany(Property::class, 'chambre_property');
    }

    public function category(){
        return $this->belongsTo(Categorie::class, 'chambre.categorie_id');
    }
}
