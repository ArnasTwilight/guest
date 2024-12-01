<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Guest extends Model
{
    use HasFactory;

    protected $table = 'guests';
    protected $guarded;
}
