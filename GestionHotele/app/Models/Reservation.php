<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable= ['start_date', 'end_date', 'user_id','chambre_id'];

    public function client(){
        return $this->belongsTo(User::class);
    }
}
