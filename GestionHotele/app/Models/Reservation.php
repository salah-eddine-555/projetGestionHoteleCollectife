<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable= ['start_date', 'end_date', 'user_id','chambre_id'];

    Use HasFactory;

    public function client(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function chambre(){
        return $this->hasOne(Chambre::class, 'chambre_id');
    }
}
