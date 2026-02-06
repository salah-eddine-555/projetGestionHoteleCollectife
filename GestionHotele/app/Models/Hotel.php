<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Hotel extends Model
{
   use softDeletes;
   use HasFactory;

    protected $fillable = ['name','address', 'rating','description', 'image', 'is_active'];

    public function gerant() {
        return $this->belongsToMany(User::class, 'gerant_hotel')->whereHas('roles', function($query){
            $query->where('name', 'gerant');
        });
    }

}
