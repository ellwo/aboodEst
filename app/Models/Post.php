<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        'titel',
        'type',
        'content',
        'img',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getUpdatedAtAttribute($value){

        $d=new Carbon($value,"Asia/Aden");


        $days=now()->diffInDays($d);


        $day=$d->format('Y-M-d');

        switch($days){
            case 0 : $day="اليوم منذ ";
            $hours=now()->diffInHours($d);

            if($hours==0){
                $mins=now()->diffInMinutes($d);
                $day.=$mins."دقيقة";
            }

            else{
                $day.=$hours."ساعة";

            }
            break;

            case 1 : $day="الامس";

            $day=$d->format(' h:i A  ').$day;

            break;
            case 2 : $day="منذ يومين";

            $day=$d->format(' h:i A  ').$day;

            break;
            case 7 :$day="منذ اسبوع";

            $day=$d->format(' h:i A  ').$day;
            break;
            case 10 :$day="منذ عشرة ايام ";

            $day=$d->format(' h:i A  ').$day;
            break;
            case 15 :$day="منذ نصف شهر";

        $day=$d->format(' h:i A  ').$day;

            break;
        }

        return $day;

      }
    public function getCreatedAtAttribute($value){

        $d=new Carbon($value,"Asia/Aden");

        $days=now()->diffInDays($d);

        $day=$d->format('Y-M-d');

        switch($days){
            case 0 : $day="اليوم منذ ";
            $hours=now()->diffInHours($d);

            if($hours==0){
                $mins=now()->diffInMinutes($d);
                $day.=$mins."دقيقة";
            }

            else{
                $day.=$hours."ساعة";

            }
            break;

            case 1 : $day="الامس";

            $day=$d->format(' h:i A  ').$day;

            break;
            case 2 : $day="منذ يومين";

            $day=$d->format(' h:i A  ').$day;

            break;
            case 7 :$day="منذ اسبوع";

            $day=$d->format(' h:i A  ').$day;
            break;
            case 10 :$day="منذ عشرة ايام ";

            $day=$d->format(' h:i A  ').$day;
            break;
            case 15 :$day="منذ نصف شهر";

        $day=$d->format(' h:i A  ').$day;

            break;
        }

        return $day;


   }

}
