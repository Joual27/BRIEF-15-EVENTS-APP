<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = [
        'title',
        'description' ,
        'date'  ,
        'venue' ,
        'number_of_seats',
        'price_per_seat',
        'validation_type',
        'category_id',
        'image',
        'organizer_id'
    ];

    use HasFactory;
}
