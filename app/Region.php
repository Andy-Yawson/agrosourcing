<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = "regions";

    protected $fillable = ['id','name'];

    public function farm(){
        return $this->belongsTo(Farm::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }

    public function districts(){
        return $this->hasMany(District::class);
    }
}
