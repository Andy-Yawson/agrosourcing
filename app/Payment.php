<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "payments";

    protected $fillable = ['method','status','order_id'];

    public function order(){
        return $this->belongsTo(Order::class,'order_id','id','orders');
    }
}
