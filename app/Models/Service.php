<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable=[
        'titel','img','note'
    ];



   public function service_parts(){

        return $this->hasMany(ServicePrice::class);

    }

    function service_prices() {

        return $this->hasMany(ServicePrice::class);

    }

}
