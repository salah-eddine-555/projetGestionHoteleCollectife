<?php

namespace App\Models;
use App\Models\Chambre;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['name'];
    public function chambres(){
        return $this->belongsToMany(Chambre::class, 'chambre_proprite');
    }
}
