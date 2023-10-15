<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable=[
      'name','img','phone',
      'map_link','address',
      'city_id'
    ];

    protected $casts=[
        'phone'=>'array'
       ];


    function city() {
        return $this->belongsTo(City::class);
    }
}
