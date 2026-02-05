<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
   use softDeletes;
   use HasFactory;

    protected $fillable = ['name','address', 'rating','description', 'image','is_active'];

}
