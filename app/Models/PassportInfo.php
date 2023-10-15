<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PassportInfo extends Model
{
    use HasFactory;

    protected $fillable=[
        'pass_num',
        'name' ,
        'agency_name',
        'received_date' ,
        'sending_embassy_date' ,
        'departure_embassy_date',
        'delivery_date',
        'state_info',
        'office_name'
    ];
}
