<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePrice extends Model
{
    use HasFactory;
    protected $fillable=[
        'titel','img','note',
        'price',
        'active',
        'service_id'
    ];


    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}
