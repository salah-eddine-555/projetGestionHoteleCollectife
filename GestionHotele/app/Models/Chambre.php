<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    protected $fillable = ['capacite','image','description','number','price_per_night'];

    public function tags(){
        return $this->belongsToMany(Tag::class,'chambre_tag');
    }

    public function proprties(){
        return $this->belongsToMany(Proprtie::class, 'chambre_proprite');
    }
}
