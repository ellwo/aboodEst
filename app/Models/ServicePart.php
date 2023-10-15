<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePart extends Model
{
    use HasFactory;
     protected $fillable=[
        'titel','steps','note',
        'service_id'
    ];

    protected $casts=[
     'steps'=>'array'
    ];

    function service() {

        return $this->belongsTo(Service::class);
    }
}
