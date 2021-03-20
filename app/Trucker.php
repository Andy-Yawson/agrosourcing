<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trucker extends Model
{
    protected $fillable = ['capacity','truck_id','user_id','region_id','location','unit'];

    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function truck(){
        return $this->belongsTo(Truck::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
