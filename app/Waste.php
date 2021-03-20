<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{
    protected $fillable = ['id','name','crop_id'];

    public function crop(){
        return $this->belongsTo(Crop::class);
    }
}
