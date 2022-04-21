<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marker extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "description",
        'lat',
        'lng'
    ];
}
