<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Property;
use App\Models\Tag;

class Chambre extends Model
{
    protected $fillable = ['capacite','image','description','number','price_per_night'];

    public function tags(){
        return $this->belongsToMany(Tag::class,'chambre_tag');
    }

    public function properties(){
        return $this->belongsToMany(Property::class, 'chambre_property');
    }
}
