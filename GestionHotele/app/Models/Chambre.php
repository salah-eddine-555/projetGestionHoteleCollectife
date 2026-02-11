<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chambre extends Model
{
    protected $fillable = ['capacite','image','description','number','price_per_night'];

    public function tags(){
        return $this->belongsToMany(Tag::class,'chambre_tag');
    }

    public function properties(){
        return $this->belongsToMany(Property::class, 'chambre_property');
    }

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
}
