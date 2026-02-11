<?php

namespace App\Models;
use App\Models\Chambre;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name','slug'];
    public function chambres(){
        return $this->belongsToMany(Chambre::class,'chambre_tag');
    }
}
